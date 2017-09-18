<?php

namespace app\controllers;

use app\models\Products;
use app\models\Categories;
use app\models\Properties;
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

		$product = Products::findOne(['product_id' => $id, 'chpu' => $alias]);

		return $this->render('view',['product'=>$product]);

	}

	public function actionBasket($products = false) {

		return $this->render('basket');

	}
	
}
