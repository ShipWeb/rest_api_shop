<?php

namespace app\controllers;

use app\models\Currencies;
use app\models\Products;
use app\models\Categories;
use app\models\Properties;
use yii\web\NotFoundHttpException;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class ProductsController extends \yii\web\Controller {

	/**
	 * Каталог товаров
	 *
	 * @return string
	 */
	public function actionIndex() {

		Currencies::checkCurrency();

		self::checkLiveSearch();

		$data = Products::getAll($_REQUEST);

		return $this->render('index', $data);
	}

	/**
	 * Карточка товара
	 *
	 * @param $id
	 * @param $alias
	 *
	 * @return string
	 */
	public function actionView($id, $alias) {

		Currencies::checkCurrency();

		self::checkLiveSearch();

		$product_all = Products::getOneIdAlias($id, $alias);

		if (empty($product_all['product'])) {
			throw new NotFoundHttpException('The requested page does not exist.');
		}

		$product_tech_req = Properties::getTechnicalProperties($id);
		$product_not_tech_req = Properties::getNotTechnicalProperties($id);

		$images = Products::getImagesProduct($id);

		$productInfo = ApiController::getProductInfo($product_all['product']['product_api_id']);

		Products::updateProduct($product_all['product'], $productInfo);

		return $this->render('view', [
			'product'              => $product_all['product'],
			'image_main'           => $images['image_main'],
			'images_big_screen'    => $images['images_big_screen'],
			'images_small_screen'  => $images['images_small_screen'],
			'product_tech_req'     => $product_tech_req,
			'product_not_tech_req' => $product_not_tech_req,
			'currencies'           => $product_all['currencies'],
			'active_currency'      => $product_all['active_currency'],
		]);

	}

	public function actionBasket($products = false) {

		Currencies::checkCurrency();

		self::checkLiveSearch();

		$product['product'] = false;
		$product['currencies'] = false;
		$product['active_currency'] = false;

		if (!empty($_REQUEST['product_id'])) {
			$_COOKIE['basket_product_id'] = $_SESSION['basket_product_id'] = $_REQUEST['product_id'];
		}

		if (!empty($_SESSION['basket_product_id'])) {
			$product = Products::getOneId((int)$_SESSION['basket_product_id']);
		}

		return $this->render('basket', [
			'product'         => $product['product'],
			'currencies'      => $product['currencies'],
			'active_currency' => $product['active_currency'],
		]);

	}

	public function checkLiveSearch() {

		if (!empty($_REQUEST['live_search_text']) && $_REQUEST['live_search_text'] == true) {
			$filter = Products::addFilters($_REQUEST);
			$currencies = Yii::$app->db->createCommand("SELECT * FROM {{%currencies}}")->queryAll();
			$active_currency = Currencies::activeCurrency();
			$result['data'] = false;
			$result = Products::queryGetAll($active_currency, $filter, false, 10);
			ob_clean();
			if (!empty($result['data'])) {
				echo $this->renderPartial('live_search', [
					'products'        => $result['data'],
					'currencies'      => $currencies,
					'active_currency' => $active_currency,
				]);
			} else {
				echo "";
			}
			die;
		}

	}

}
