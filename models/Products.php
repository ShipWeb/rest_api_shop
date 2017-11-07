<?php

namespace app\models;

use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\data\SqlDataProvider;

/**
 * This is the model class for table "{{%products}}".
 *
 * @property string $product_id
 * @property string $product_api_id
 * @property string $title
 * @property string $chpu
 * @property string $content
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 * @property string $date_create
 * @property string $date_create_gmt
 * @property string $date_modified
 * @property string $date_modified_gmt
 */
class Products extends \yii\db\ActiveRecord {

	/**
	 * @inheritdoc
	 */
	public static function tableName() {

		return '{{%products}}';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {

		return [
			[['product_api_id'], 'integer'],
			[['content', 'content_activation'], 'string'],
			[['date_create', 'date_create_gmt', 'date_modified', 'date_modified_gmt'], 'safe'],
			[['date_create', 'date_create_gmt', 'date_modified', 'date_modified_gmt'], 'default', 'value' => date('Y-m-d H:i:s')],
			[['product_title', 'chpu', 'seo_title', 'seo_keywords', 'product_thumbnail_name', 'product_thumbnail_path'], 'string', 'max' => 255],
			[['seo_description'], 'string', 'max' => 512],
			[['product_price', 'product_discount'], 'number'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {

		return [
			'product_id'             => Yii::t('app', 'Product ID - ID товара'),
			'product_api_id'         => Yii::t('app', 'Product Api ID - ID товара в DigiSeller'),
			'product_title'          => Yii::t('app', 'Product Title - Название товара'),
			'chpu'                   => Yii::t('app', 'Chpu - ЧПУ'),
			'content'                => Yii::t('app', 'Content - Основной текст'),
			'content_activation'     => Yii::t('app', 'Content Activation - Инструкция по активации'),
			'seo_title'              => Yii::t('app', 'Seo Title - Сео название'),
			'seo_description'        => Yii::t('app', 'Seo Description - Сео описание'),
			'seo_keywords'           => Yii::t('app', 'Seo Keywords - Сео ключевые слов'),
			'product_price'          => Yii::t('app', 'Product Price - Цена товара'),
			'product_discount'       => Yii::t('app', 'Product Discount - Скидка на товар'),
			'product_thumbnail_name' => Yii::t('app', 'Product Thumbnail Name - Имя миниатюры с расширением'),
			'product_thumbnail_path' => Yii::t('app', 'Product Thumbnail Path -  Путь до миниатюры'),
			'date_create'            => Yii::t('app', 'Date Create - Дата Создания'),
			'date_create_gmt'        => Yii::t('app', 'Date Create Gmt - Дата Создания GMT'),
			'date_modified'          => Yii::t('app', 'Date Modified - Дата Модификации'),
			'date_modified_gmt'      => Yii::t('app', 'Date Modified Gmt - Дата Модификации GMT'),
		];
	}

	/**
	 * Получение товаров
	 *
	 * @param $options
	 *
	 * @return mixed
	 */
	public function getAll($options, $pageSize = 20) {

		//Вид отображения товаров
		if (!empty($options['view_products'])) {
			$_COOKIE['view_products'] = $_SESSION['view_products'] = $options['view_products'];
			exit();
		}

		//Переключение сортировки
		if (!empty($options['sort']) && !empty($options['save_sort']) && $options['save_sort']) {
			$_COOKIE['sort'] = $_SESSION['sort'] = $options['sort'];
			exit();
		}

		if (empty($options)) {
			self::addUrl();
		}

		$currencies = Yii::$app->db->createCommand("SELECT * FROM {{%currencies}}")->queryAll();

		$active_currency = Currencies::activeCurrency();

		if (!empty($options['currency'])) {
			foreach ($currencies as $key => $val) {
				if ($options['currency'] === $val['currency_name']) {
					$active_currency = $val;
				}
			}
		}

		//Сортировка товаров
		$sort = false;
		if (!empty($options['sort'])) {
			$sort = self::addSort($options['sort']);
		}

		//Фильтрация товаров
		$filter = self::addFilters($options);

		$result = self::queryGetAll($active_currency, $filter, $sort);

		$dataProvider = new SqlDataProvider([
			'sql'        => $result['query'],
			'params'     => $filter['bind_param'],
			'totalCount' => (int)$result['count'],
			'pagination' => [
				// количество пунктов на странице
				'pageSize'   => $pageSize,
				'totalCount' => (int)$result['count'],
			]
		]);

		return [
			'products'        => $dataProvider->getModels(),
			'pagination'      => $dataProvider->getPagination(),
			'currencies'      => $currencies,
			'active_currency' => $active_currency,
		];
	}

	/**
	 * Добавление фильтрации товаров
	 *
	 * @param bool $sort_name
	 *
	 * @return string
	 */
	public function addFilters($filters = false) {

		if (!empty($filters['sort'])) {
			unset($filters['sort']);
		}

		$where = [];
		$having = [];
		$bind_param = [];
		$list_filters = [];
		$count_conditions = 0;

		//Фильтры из БД
		if (!empty($filters)) {

			$query = "SELECT * FROM {{%properties}} WHERE active='Y' AND show_index='Y' ORDER BY property_id";
			$filter_properties = Yii::$app->db->createCommand($query)->queryAll();

			//Прохождение по фильтрам из БД
			foreach ($filter_properties as $fil_prop_key => $fil_prop_value) {

				if (!empty($_COOKIE[$fil_prop_value['property_name']])) {
					unset($_COOKIE[$fil_prop_value['property_name']]);
				}
				if (!empty($_SESSION[$fil_prop_value['property_name']])) {
					unset($_SESSION[$fil_prop_value['property_name']]);
				}

				//Прохождение по фильтрам из запроса
				foreach ($filters as $fil_name => $fil_value) {

					if ($fil_name === $fil_prop_value['property_name']) {

						$arr_type = Properties::getArrValueType();
						$val_type = Properties::setValueType($arr_type, $fil_prop_value['type']);

						$val_type = ($val_type === 'value_str' ? 'TRIM(prod_prop.' . $val_type . ')' : 'prod_prop.' . $val_type);

						//Выбор типа фильтра
						switch ($fil_prop_value['filter']) {
							case "SELECT":
								$list_filters['SELECT'][$fil_name] = $fil_value;

								$where[] = "(prop.property_name='" . $fil_name . "' AND " . $val_type . "=:" . $fil_name . ")";
								$bind_param[':' . $fil_name] = $_COOKIE[$fil_name] = $_SESSION[$fil_name] = $list_filters['SELECT'][$fil_name];
								$count_conditions++;
								break;
							case "MULTISELECT":
								$list_filters['MULTISELECT'][$fil_name] = explode(',', $fil_value);
								$prop_arr = [];
								$sess = [];
								foreach ($list_filters['MULTISELECT'][$fil_name] as $key => $val) {
									$prop_arr[] = ':' . $fil_name . $key;
									$bind_param[':' . $fil_name . $key] = $val;
									$sess[] = $val;
								}
								if (!empty($sess)) {
									$_COOKIE[$fil_name] = $_SESSION[$fil_name] = $sess;
								}
								$where[] = "(prop.property_name='" . $fil_name . "' AND " . $val_type . " IN (" . implode(',', $prop_arr) . "))";
								$count_conditions++;
								break;
							case "RANGE":
								if (mb_strpos($fil_value, '|') !== false) {
									$range = explode('|', $fil_value);
									$arr = [];
									if (!empty($range[0])) {
										$bind_param[':' . $fil_name . '_first'] = $_COOKIE[$fil_name . '_first'] = $_SESSION[$fil_name . '_first'] = $range[0];
										if ($fil_prop_value['type'] === 'DATE') {
											$_COOKIE[$fil_name . '_first'] = $_SESSION[$fil_name . '_first'] = date('Y', strtotime($_SESSION[$fil_name . '_first']));
										}
										$arr[] = $val_type . ">=:" . $fil_name . "_first";
									} else {
										if (!empty($_SESSION[$fil_name . '_first'])) {
											unset($_SESSION[$fil_name . '_first']);
										}
										if (!empty($_COOKIE[$fil_name . '_first'])) {
											unset($_COOKIE[$fil_name . '_first']);
										}
									}
									if (!empty($range[1])) {
										$bind_param[':' . $fil_name . '_last'] = $_COOKIE[$fil_name . '_last'] = $_SESSION[$fil_name . '_last'] = $range[1];
										if ($fil_prop_value['type'] === 'DATE') {
											$_COOKIE[$fil_name . '_last'] = $_SESSION[$fil_name . '_last'] = date('Y', strtotime($_SESSION[$fil_name . '_last']));
										}
										$arr[] = $val_type . "<=:" . $fil_name . "_last";
									} else {
										if (!empty($_SESSION[$fil_name . '_last'])) {
											unset($_SESSION[$fil_name . '_last']);
										}
										if (!empty($_COOKIE[$fil_name . '_last'])) {
											unset($_COOKIE[$fil_name . '_last']);
										}
									}
									if (!empty($range[0]) || !empty($range[1])) {
										$where[] = "(prop.property_name='" . $fil_name . "' AND " . implode(' AND ', $arr) . ")";
										$count_conditions++;
									}
								}
								break;
						}

					}

				}

			}

		}

		if (!empty($count_conditions) && $count_conditions > 0) {
			$bind_param[':filter_count_conditions'] = $count_conditions;
			$having[] = 'count_conditions>=:filter_count_conditions';
		}

		//Фильтр цен
		if (!empty($filters['product_price']) && mb_strpos($filters['product_price'], '|') !== false) {
			$range = explode('|', $filters['product_price']);
			$arr = [];
			if (!empty($range[0])) {
				$bind_param[':product_price_first'] = $_COOKIE['product_price_first'] = $_SESSION['product_price_first'] = $range[0];
				$arr[] = "final_product_price>=:product_price_first";
			} else {
				if (!empty($_SESSION['product_price_first'])) {
					unset($_SESSION['product_price_first']);
				}
				if (!empty($_COOKIE['product_price_first'])) {
					unset($_COOKIE['product_price_first']);
				}
			}
			if (!empty($range[1])) {
				$bind_param[':product_price_last'] = $_COOKIE['product_price_last'] = $_SESSION['product_price_last'] = $range[1];
				$arr[] = "final_product_price<=:product_price_last";
			} else {
				if (!empty($_SESSION['product_price_last'])) {
					unset($_SESSION['product_price_last']);
				}
				if (!empty($_COOKIE['product_price_last'])) {
					unset($_COOKIE['product_price_last']);
				}
			}
			if (!empty($range[0]) || !empty($range[1])) {
				$having[] = '(' . implode(' AND ', $arr) . ')';
			}
		}

		//Фильтр поискового запроса
		if (!empty($filters['search_text'])) {
			$bind_param[':search_text'] = $_COOKIE['search_text'] = $_SESSION['search_text'] = '%' . $filters['search_text'] . '%';
			$having[] = 'prod.product_title LIKE :search_text';
		}

		//Сброс фильтров
		if (!empty($filters['delete_filters']) && $filters['delete_filters'] == true) {

			foreach ($filter_properties as $fil_prop_key => $fil_prop_value) {

				switch ($fil_prop_value['filter']) {
					case "SELECT":
						if (!empty($fil_prop_value['property_name'])) {
							if (!empty($_COOKIE[$fil_prop_value['property_name']])) {
								unset($_COOKIE[$fil_prop_value['property_name']]);
							}
							if (!empty($_SESSION[$fil_prop_value['property_name']])) {
								unset($_SESSION[$fil_prop_value['property_name']]);
							}
						}
						break;
					case "MULTISELECT":
						if (!empty($fil_prop_value['property_name'])) {
							if (!empty($_COOKIE[$fil_prop_value['property_name']])) {
								unset($_COOKIE[$fil_prop_value['property_name']]);
							}
							if (!empty($_SESSION[$fil_prop_value['property_name']])) {
								unset($_SESSION[$fil_prop_value['property_name']]);
							}
						}
						break;
					case "RANGE":
						if (!empty($fil_prop_value['property_name'])) {
							if (!empty($_COOKIE[$fil_prop_value['property_name'] . '_first'])) {
								unset($_COOKIE[$fil_prop_value['property_name'] . '_first']);
							}
							if (!empty($_COOKIE[$fil_prop_value['property_name'] . '_last'])) {
								unset($_COOKIE[$fil_prop_value['property_name'] . '_last']);
							}
							if (!empty($_SESSION[$fil_prop_value['property_name'] . '_first'])) {
								unset($_SESSION[$fil_prop_value['property_name'] . '_first']);
							}
							if (!empty($_SESSION[$fil_prop_value['property_name'] . '_last'])) {
								unset($_SESSION[$fil_prop_value['property_name'] . '_last']);
							}
						}
						break;
				}
			}

			if (!empty($_SESSION['product_price_first'])) {
				unset($_SESSION['product_price_first']);
			}
			if (!empty($_COOKIE['product_price_first'])) {
				unset($_COOKIE['product_price_first']);
			}

			if (!empty($_SESSION['product_price_last'])) {
				unset($_SESSION['product_price_last']);
			}
			if (!empty($_COOKIE['product_price_last'])) {
				unset($_COOKIE['product_price_last']);
			}

		}

		return [
			"data"             => $list_filters,
			"where"            => implode(' OR ', $where),
			"having"           => implode(' AND ', $having),
			"bind_param"       => $bind_param,
			"count_conditions" => $count_conditions
		];
	}

	/**
	 * Добавление свойства для сортировки товаров
	 *
	 * @param bool $sort_name
	 *
	 * @return string
	 */
	public function addSort($sort_name = false) {

		$sort['order'] = "";
		$sort['property'] = "";
		$sort['value'] = "";

		if (!empty($sort_name)) {

			$query = "SELECT * FROM {{%properties}} WHERE active='Y' AND sort='Y' AND show_index='Y'";
			$sort_properties = Yii::$app->db->createCommand($query)->queryAll();

			$arr_sort_type = Properties::getArrValueType();

			//Сортировка по установленным свойствам
			foreach ($sort_properties as $key => $value) {

				if ($sort_name === $value['property_name'] . "_asc") {

					$sort['value'] = Properties::setValueType($arr_sort_type, $value['type']);
					$sort['property'] = "AND prod_prop.property_id=" . (int)$value['property_id'];
					$sort['order'] = "ORDER BY IF(prod_prop." . $sort['value'] . " IS NULL, 1 ,0),prod_prop." . $sort['value'] . " ASC";
					$_COOKIE['sort'] = $_SESSION['sort'] = $value['property_name'] . "_asc";
				} elseif ($sort_name === $value['property_name'] . "_desc") {

					$sort['value'] = Properties::setValueType($arr_sort_type, $value['type']);
					$sort['property'] = "AND prod_prop.property_id=" . (int)$value['property_id'];
					$sort['order'] = "ORDER BY IF(prod_prop." . $sort['value'] . " IS NULL, 1 ,0),prod_prop." . $sort['value'] . " DESC";
					$_COOKIE['sort'] = $_SESSION['sort'] = $value['property_name'] . "_desc";
				}

			}
			//Сортировка по наименованию и цене
			switch ($sort_name) {
				case "product_title_asc":
					$sort['order'] = "ORDER BY IF(prod.product_title IS NULL, 1 ,0),prod.product_title ASC";
					$_COOKIE['sort'] = $_SESSION['sort'] = "product_title_asc";
					$_COOKIE['sort_title'] = $_SESSION['sort_title'] = 'Названию(A-Z)';
					break;
				case "product_title_desc":
					$sort['order'] = "ORDER BY IF(prod.product_title IS NULL, 1 ,0),prod.product_title DESC";
					$_COOKIE['sort'] = $_SESSION['sort'] = "product_title_desc";
					$_COOKIE['sort_title'] = $_SESSION['sort_title'] = 'Названию(Z-A)';
					break;
				case "product_price_asc":
					$sort['order'] = "ORDER BY IF(final_product_price IS NULL, 1 ,0),final_product_price ASC";
					$_COOKIE['sort'] = $_SESSION['sort'] = "product_price_asc";
					$_COOKIE['sort_title'] = $_SESSION['sort_title'] = 'Цене, сначала недорогие';
					break;
				case "product_price_desc":
					$sort['order'] = "ORDER BY IF(final_product_price IS NULL, 1 ,0),final_product_price DESC";
					$_COOKIE['sort'] = $_SESSION['sort'] = "product_price_desc";
					$_COOKIE['sort_title'] = $_SESSION['sort_title'] = 'Цене, сначала дорогие';
					break;
			}
		}

		switch ($_SESSION['sort']) {
			case "data_vyhoda_desc":
				$_COOKIE['sort_title'] = $_SESSION['sort_title'] = 'Дате выхода, сначала новые';
				break;
			case "data_vyhoda_asc":
				$_COOKIE['sort_title'] = $_SESSION['sort_title'] = 'Дате выхода, сначала старые';
				break;
		}

		return $sort;
	}

	/**
	 * Получение товара по id и alias
	 *
	 * @param $options
	 *
	 * @return mixed
	 */
	public function getOneIdAlias($id, $alias) {

		$currencies = Yii::$app->db->createCommand("SELECT * FROM {{%currencies}}")->queryAll();

		$active_currency = Currencies::activeCurrency();

		$query = "SELECT *, prod.product_id as product_id, CEIL (prod.product_discount) as product_discount,
CEIL(
	CAST(
		IF(product_discount IS NULL ,
		(prod.product_price * " . $active_currency['currency_course'] . "), 
		(prod.product_price * " . $active_currency['currency_course'] . ") / 100 * (100 - product_discount)
		) AS DECIMAL(12,2)
	)
) as final_product_price
FROM {{%products}} prod
WHERE prod.product_id=:product_id AND prod.chpu=:chpu LIMIT 1
		";

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':product_id', (int)$id);
		$command->bindValue(':chpu', $alias);
		$product = $command->queryOne();

		return [
			'product'         => $product,
			'currencies'      => $currencies,
			'active_currency' => $active_currency,
		];
	}

	/**
	 * Получение товара по id
	 *
	 * @param $options
	 *
	 * @return mixed
	 */
	public function getOneId($id) {

		$currencies = Yii::$app->db->createCommand("SELECT * FROM {{%currencies}}")->queryAll();

		$active_currency = Currencies::activeCurrency();

		$query = "SELECT *, prod.product_id as product_id, CEIL (prod.product_discount) as product_discount,
CEIL(
	CAST(
		IF(product_discount IS NULL ,
		(prod.product_price * " . $active_currency['currency_course'] . "), 
		(prod.product_price * " . $active_currency['currency_course'] . ") / 100 * (100 - product_discount)
		) AS DECIMAL(12,2)
	)
) as final_product_price
FROM {{%products}} prod
WHERE prod.product_id=:product_id LIMIT 1
		";

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':product_id', (int)$id);
		$product = $command->queryOne();

		return [
			'product'         => $product,
			'currencies'      => $currencies,
			'active_currency' => $active_currency,
		];
	}

	public function getImagesProduct($id) {

		$query = "SELECT *
FROM {{%images}} img
	INNER JOIN {{%products_images}} prod_img ON prod_img.image_id=img.image_id 
	INNER JOIN {{%products}} prod ON prod.product_id=prod_img.product_id 
WHERE prod.product_id=:product_id
		";

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':product_id', (int)$id);
		$images = $command->queryAll();

		$image_main = [];
		$images_big_screen = [];
		$images_small_screen = [];

		foreach ($images as $key => $value) {
			switch ($value['type_image']) {
				case "MAIN":
					$image_main = $value;
					break;
				case "BIG_SCREENSHOT":
					$images_big_screen[$value['image_big_small']] = $value;
					break;
				case "SMALL_SCREENSHOT":
					$images_small_screen[$value['image_big_small']] = $value;
					break;
			}

		}

		return [
			'image_main'          => $image_main,
			'images_big_screen'   => $images_big_screen,
			'images_small_screen' => $images_small_screen,
		];
	}

	public function addUrl() {

		$addurl = [];
		if (!empty($_SESSION['sort'])) {
			$addurl[] = 'sort=' . $_SESSION['sort'];
		}
		$query = "SELECT * FROM {{%properties}} WHERE active='Y' AND show_index='Y' ORDER BY property_id";
		$filter_properties = Yii::$app->db->createCommand($query)->queryAll();

		foreach ($filter_properties as $key => $value) {
			if ($value['filter'] == 'RANGE' && !empty($_SESSION[$value['property_name'] . '_first']) && !empty($_SESSION[$value['property_name'] . '_last'])) {
				$addurl[] = $value['property_name'] . '=' . $_SESSION[$value['property_name'] . '_first'] . '_' . $_SESSION[$value['property_name'] . '_last'];
			}
			if ($value['filter'] == 'SELECT' && !empty($_SESSION[$value['property_name']])) {
				$addurl[] = $value['property_name'] . '=' . $_SESSION[$value['property_name']];
			}
			if ($value['filter'] == 'MULTISELECT' && !empty($_SESSION[$value['property_name']])) {
				$addurl[] = $value['property_name'] . '=' . implode(',', $_SESSION[$value['property_name']]);
			}
		}

		if (!empty($addurl)) {
			$url = Yii::$app->homeUrl . 'product?' . implode('&', $addurl);
			header('Location: ' . $url);
			exit();
		}
	}

	public function queryGetAll($active_currency, $filter = false, $sort = false, $limit = false) {

		$query = "
SELECT *, prod.product_id as product_id, CEIL (prod.product_discount) as product_discount, TRIM(prod_prop.value_str) as trim_value_str, 
CEIL(
	CAST(
		IF(product_discount IS NULL ,
		(prod.product_price * " . $active_currency['currency_course'] . "), 
		(prod.product_price * " . $active_currency['currency_course'] . ") / 100 * (100 - product_discount)
		) AS DECIMAL(12,2)
	)
) as final_product_price" .
			(!empty($filter['count_conditions']) ? ", count(prod.product_id) as count_conditions" : "") . "
FROM {{%products}}  prod
	LEFT JOIN {{%products_properties}} as prod_prop ON prod_prop.product_id=prod.product_id 
	LEFT JOIN {{%properties}} as prop ON prop.property_id=prod_prop.property_id AND prop.active='Y' " .
			(!empty($filter['where']) ? " WHERE 1=1 AND " . $filter['where'] : "") . " 
GROUP BY prod.product_id " .
			(!empty($sort['value']) ? ",prod_prop." . $sort['value'] . " " : " ") .
			(!empty($filter['having']) ? " HAVING " . $filter['having'] . " " : " ") .
			(!empty($sort['order']) ? $sort['order'] : " ") .
			(!empty($limit) ? " LIMIT " . (int)$limit : " ");

		$command = Yii::$app->db->createCommand($query);

		foreach ($filter['bind_param'] as $name => $value) {
			$command->bindValue($name, $value);
		}

		$count = count($command->queryAll());

		$data = $command->queryAll();

		return [
			'count' => $count,
			'query' => $query,
			'data'  => $data,
		];
	}

	public function checkLiveSearch() {

		if (!empty($_REQUEST['live_search_text']) && $_REQUEST['live_search_text'] == true && !empty($_REQUEST['search_text'])) {
			$filter = self::addFilters($_REQUEST);
			$result = self::queryGetAll(Currencies::activeCurrency(), $filter);
			ob_get_clean();
			ob_start();
			echo json_encode($result['data']);
			ob_end_flush();
			die;
		}

	}

	public function afterSave($insert, $changedAttributes) {

		parent::afterSave($insert, $changedAttributes);

		if (empty($_REQUEST['property']) || !is_array($_REQUEST['property'])
			|| empty($_REQUEST['property_type']) || !is_array($_REQUEST['property_type'])
			|| empty($_REQUEST['property_id']) || !is_array($_REQUEST['property_id'])
		) {

			return true;
		}

		foreach ($_REQUEST['property'] as $key => $property) {

			ProductsProperties::deleteProductProperty($this->product_id, $_REQUEST['property_id'][$key]);

			$property = explode(",", $property);

			foreach ($property as $k => $v) {

				if (!empty($v) && (($_REQUEST['property_filter'][$key] != "MULTISELECT" && $k == 0) || $_REQUEST['property_filter'][$key] == "MULTISELECT")) {
					ProductsProperties::insertProductProperty($this->product_id, $_REQUEST['property_id'][$key], $_REQUEST['property_type'][$key], $v);
				}

			}

		}

		return false;

	}

}
