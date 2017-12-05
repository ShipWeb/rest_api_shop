<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\httpclient\Client;
use Yii;

class ApiController extends ActiveController {

	public $modelClass = 'app\models\Apilog';

	public function getProductInfo($product_api_id, $seller_id = false) {

		$xml = '<digiseller.request>
					<product>
						<id>' . $product_api_id . '</id>
					</product>
  					<seller>
    					<id>' . $seller_id . '</id>
  					</seller>
  				<partner_uid>' . Yii::$app->params['partnerID'] . '</partner_uid>
  					<lang>' . Yii::$app->params['language'] . '</lang>
		</digiseller.request>
		';

		$answer = self::getAnswerXml(Yii::$app->params['urlProductInfo'], $xml);
		$xmlResult = simplexml_load_string($answer);

		return $xmlResult->product;

	}

	public function getAnswerXml($address, $xml) {

		$ch = curl_init($address);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		$result = curl_exec($ch);

		return $result;
	}

}