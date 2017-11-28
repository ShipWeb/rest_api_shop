<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\httpclient\Client;

class ApiController extends ActiveController
{
	public $modelClass = 'app\models\Apilog';



}