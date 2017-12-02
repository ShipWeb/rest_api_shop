<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\httpclient\Client;

class ApiController extends ActiveController {

	public $modelClass = 'app\models\Apilog';

	public function checkProductInfo($product_api_id, $seller_id) {

		$client = new Client();
		$response = $client->createRequest()
			->setFormat(Client::FORMAT_XML)
			->setUrl(Yii::$app->params['urlProductInfo'])
			->setData('<digiseller.request>
  <product>
    <id>'.$product_api_id.'</id>
  </product>
  <seller>
    <id>'.$seller_id.'</id>
  </seller>
  
  <partner_uid>'.Yii::$app->params['partnerID'].'</partner_uid>
  <lang>'.Yii::$app->params['language'].'</lang>
</digiseller.request>')
			->send();
		if ($response->isOk) {
			echo 'Search results:<br>';
			echo $response->content;
		}


	}

}