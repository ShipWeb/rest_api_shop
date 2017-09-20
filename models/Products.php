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
class Products extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%products}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_api_id'], 'integer'],
            [['content','content_activation'], 'string'],
            [['date_create', 'date_create_gmt', 'date_modified', 'date_modified_gmt'], 'safe'],
            [['product_title', 'chpu', 'seo_title', 'seo_keywords','product_thumbnail_name','product_thumbnail_path'], 'string', 'max' => 255],
            [['seo_description'], 'string', 'max' => 512],
			[['product_price','product_discount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'product_api_id' => Yii::t('app', 'Product Api ID'),
            'product_title' => Yii::t('app', 'Product Title'),
            'chpu' => Yii::t('app', 'Chpu'),
            'content' => Yii::t('app', 'Content'),
            'content_activation' => Yii::t('app', 'Content Activation'),
            'seo_title' => Yii::t('app', 'Seo Title'),
            'seo_description' => Yii::t('app', 'Seo Description'),
            'seo_keywords' => Yii::t('app', 'Seo Keywords'),
			'product_price' => Yii::t('app', 'Product Price'),
			'product_discount' => Yii::t('app', 'Product Discount'),
			'product_thumbnail_name' => Yii::t('app', 'Product Thumbnail Name'),
			'product_thumbnail_path' => Yii::t('app', 'Product Thumbnail Path'),
            'date_create' => Yii::t('app', 'Date Create'),
            'date_create_gmt' => Yii::t('app', 'Date Create Gmt'),
            'date_modified' => Yii::t('app', 'Date Modified'),
            'date_modified_gmt' => Yii::t('app', 'Date Modified Gmt'),
        ];
    }

	/**
	 * Получение товаров
	 *
	 * @param $options
	 *
	 * @return mixed
	 */
	public function getAll($options,$pageSize = 20) {

		$currencies = Yii::$app->db->createCommand("SELECT * FROM {{%currencies}}")->queryAll();

		$active_currency=Currencies::activeCurrency();

		if (!empty($options['currency'])) {
			foreach ($currencies as $key => $val) {
				if ($options['currency'] === $val['currency_name']) {
					$active_currency = $val;
				}
			}
		}

		//Сортировка товаров
		if (!empty($options['sort'])) {
			$sort = self::addSort($options['sort']);
		}

		//Фильтрация товаров
		$filter= self::addFilters($options);

		$query = "SELECT *, prod.product_id as product_id,
CAST(
	IF(prod.product_discount IS NULL ,
	(prod.product_price * ".$active_currency['currency_course']."), 
	(prod.product_price * ".$active_currency['currency_course'].") / 100 * (100 - prod.product_discount) 
	) AS DECIMAL(12,2)) as final_product_price" . (!empty($filter['count_conditions']) ? ", count(prod.product_id) as count_conditions" : "")."
FROM {{%products}}  prod
	LEFT JOIN {{%products_properties}} as prod_prop ON prod_prop.product_id=prod.product_id 
	LEFT JOIN {{%properties}} as prop ON prop.property_id=prod_prop.property_id AND prop.active='Y' 
		" . (!empty($filter['query']) ? "WHERE 1=1 AND " . $filter['query'] : "") . " 
GROUP BY prod.product_id " .
			(!empty($filter['count_conditions']) ? " HAVING count_conditions=:filter_count_conditions " : "").(!empty($sort['order']) ? $sort['order'] : "");

		$command=Yii::$app->db->createCommand($query);

		foreach($filter['bind_param'] as $name=>$value){
			$command->bindValue($name,$value);
		}

		$count = count($command->queryAll());

		$dataProvider = new SqlDataProvider([
			'sql' => $query,
			'params' => $filter['bind_param'],
			'totalCount' => (int)$count,
			'pagination' => [
				// количество пунктов на странице
				'pageSize' => $pageSize,
				'totalCount' => (int)$count,
			]
		]);

		return [
			'products' => $dataProvider->getModels(),
			'pagination'=>$dataProvider->getPagination(),
			'currencies'=>$currencies,
			'active_currency'=>$active_currency,
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

		unset($filters['sort']);

		$where=[];
		$bind_param=[];
		$list_filters=[];
		$count_conditions=0;

		if (!empty($filters)) {

			$query = "SELECT * FROM {{%properties}} WHERE active='Y' AND show_index='Y'";
			$filter_properties = Yii::$app->db->createCommand($query)->queryAll();


			//Прохождение по фильтрам из запроса
			foreach ($filters as $fil_name => $fil_value) {

				//Прохождение по фильтрам из БД
				foreach ($filter_properties as $fil_prop_key => $fil_prop_value) {

					if ($fil_name === $fil_prop_value['property_name']) {

						$arr_type = Properties::getArrValueType();
						$val_type = Properties::setValueType($arr_type, $fil_prop_value['type']);

						//Выбор типа фильтра
						switch ($fil_prop_value['filter']) {
							case "SELECT":
								$list_filters['SELECT'][$fil_name] = $fil_value;
								$where[]= "(prop.property_name='" . $fil_name . "' AND prod_prop." . $val_type . "=:" . $fil_name.")";
								$bind_param[':' . $fil_name]=$list_filters['SELECT'][$fil_name];
								$count_conditions++;
								break;
							case "MULTISELECT":
								$list_filters['MULTISELECT'][$fil_name] = explode(',', $fil_value);
								$prop_arr=[];
								foreach ($list_filters['MULTISELECT'][$fil_name] as $key => $val) {
									$prop_arr[]= ':'.$fil_name . $key;
									$bind_param[':' . $fil_name . $key]=$val;
								}
								$where[]= "(prop.property_name='" . $fil_name . "' AND prod_prop." . $val_type . " IN (" . implode(',',$prop_arr)."))";
								$count_conditions++;
								break;
							case "LIST":
								$list_filters['LIST'][$fil_name] = $fil_value;
								$where[]= "(prop.property_name='" . $fil_name . "' AND prod_prop." . $val_type . "=:" . $fil_name.")";
								$bind_param[':' . $fil_name]=$list_filters['LIST'][$fil_name];
								$count_conditions++;
								break;
							case "RANGE":
								if (mb_strpos($fil_value, '_') !== false) {
									$range = explode('_', $fil_value);
									if ($fil_prop_value['type'] === 'INTEGER') {
										$list_filters['RANGE'][$fil_name]['first'] = (double)$range[0];
										$list_filters['RANGE'][$fil_name]['last'] = (double)$range[1];
									} else {
										$list_filters['RANGE'][$fil_name]['first'] = (double)$range[0];
										$list_filters['RANGE'][$fil_name]['last'] = (double)$range[1];
									}
								}
								$where[]= "(prop.property_name='" . $fil_name . "' AND prod_prop." . $val_type . ">=:" .
									$fil_name . "_first AND prod_prop." . $val_type . "<=:" . $fil_name . "_last)";
								$bind_param[':' . $fil_name . '_first']=$list_filters['RANGE'][$fil_name]['first'];
								$bind_param[':' . $fil_name . '_last']=$list_filters['RANGE'][$fil_name]['last'];
								$count_conditions++;
								break;
						}

					}

				}

			}

		}
		if (!empty($count_conditions) && $count_conditions > 0) {
			$bind_param[':filter_count_conditions'] = $count_conditions;
		}

		return ["data" => $list_filters, "query" => implode(' OR ', $where), "bind_param" => $bind_param, "count_conditions" => $count_conditions];
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

			$arr_sort_type=Properties::getArrValueType();

			//Сортировка по установленным свойствам
			foreach ($sort_properties as $key => $value) {

				if ($sort_name === $value['property_name'] . "_asc") {

					$sort['value'] = Properties::setValueType($arr_sort_type, $value['type']);
					$sort['property']="AND prod_prop.property_id=".(int)$value['property_id'];
					$sort['order'] = "ORDER BY IF(prod_prop.".$sort['value']." IS NULL, 1 ,0),prod_prop.".$sort['value']." ASC";

				} elseif ($sort_name === $value['property_name'] . "_desc") {

					$sort['value'] = Properties::setValueType($arr_sort_type, $value['type']);
					$sort['property']="AND prod_prop.property_id=".(int)$value['property_id'];
					$sort['order'] = "ORDER BY IF(prod_prop.".$sort['value']." IS NULL, 1 ,0),prod_prop.".$sort['value']." DESC";
				}

			}
			//Сортировка по наименованию и цене
			switch ($sort_name) {
				case "product_title_asc":
					$sort['order'] = "ORDER BY IF(prod.product_title IS NULL, 1 ,0),prod.product_title ASC";
					break;
				case "product_title_desc":
					$sort['order'] = "ORDER BY IF(prod.product_title IS NULL, 1 ,0),prod.product_title DESC";
					break;
				case "product_price_asc":
					$sort['order'] = "ORDER BY IF(prod.product_price IS NULL, 1 ,0),prod.product_price ASC";
					break;
				case "product_price_desc":
					$sort['order'] = "ORDER BY IF(prod.product_price IS NULL, 1 ,0),prod.product_price DESC";
					break;
			}
		}

		return $sort;
	}

	/**
	 * Получение товара
	 *
	 * @param $options
	 *
	 * @return mixed
	 */
	public function getOne($id, $alias) {

		$currencies = Yii::$app->db->createCommand("SELECT * FROM {{%currencies}}")->queryAll();

		$active_currency = Currencies::activeCurrency();

		$query = "SELECT *, product_id as product_id,
CAST(
	IF(product_discount IS NULL ,
	(product_price * " . $active_currency['currency_course'] . "), 
	(product_price * " . $active_currency['currency_course'] . ") / 100 * (100 - product_discount) 
	) AS DECIMAL(12,2)) as final_product_price
FROM {{%products}}
WHERE product_id=:product_id AND chpu=:chpu LIMIT 1
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

		$image_main=[];
		$images_big_screen=[];
		$images_small_screen=[];

		foreach ($images as $key=>$value){
			switch ($value['type_image']) {
				case "MAIN":
					$image_main=$value;
					break;
				case "BIG_SCREENSHOT":
					$images_big_screen[$value['image_big_small']]=$value;
					break;
				case "SMALL_SCREENSHOT":
					$images_small_screen[$value['image_big_small']]=$value;
					break;
			}

		}

		return [
			'image_main' => $image_main,
			'images_big_screen' => $images_big_screen,
			'images_small_screen' => $images_small_screen,
		];
	}

}
