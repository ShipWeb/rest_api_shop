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

		$products = Products::sortProducts($_REQUEST);

		$categories = Categories::getAll();
		$properties = Properties::getAll();

		$this->render('index', [
			'products'   => $products['products'],
			'pagination' => $products['pagination'],
			'categories' => $categories,
			'properties' => $properties
		]);

		return $this->render('index', [
			'products'   => $products['products'],
			'pagination' => $products['pagination'],
			'categories' => $categories,
			'properties' => $properties
		]);
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
	
}
