<?php

namespace app\controllers;

use app\models\Products;
use app\models\Categories;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class ProductsController extends \yii\web\Controller
{

	public function actionIndex() {

		$data = Products::getAll(1);
		$categories = Categories::getAll();

		return $this->render('index', [
			'products'   => $data['products'],
			'pagination' => $data['pagination'],
			'categories' => $categories
		]);
	}

	public function actionView($id, $alias) {

		$product = Products::findOne(['product_id' => $id, 'chpu' => $alias]);

		return $this->render('view',['product'=>$product]);

	}

}
