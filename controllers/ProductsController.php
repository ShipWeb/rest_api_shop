<?php

namespace app\controllers;

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

class ProductsController extends \yii\web\Controller
{

	/**
	 * Каталог товаров
	 *
	 * @return string
	 */
	public function actionIndex() {

		$properties = Properties::getAll();

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

		$product_all = Products::getOne($id, $alias);

		if (empty($product_all['product'])) {
			throw new NotFoundHttpException('The requested page does not exist.');
		}

		$product_tech_req = Properties::getTechnicalProperties($id);
		$product_not_tech_req = Properties::getNotTechnicalProperties($id);

		$images = Products::getImagesProduct($id);

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

		return $this->render('basket');

	}
	
}
