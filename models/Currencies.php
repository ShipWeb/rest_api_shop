<?php

namespace app\models;

use Yii;
use app\controllers\ApiController;

/**
 * This is the model class for table "{{%currencies}}".
 *
 * @property string $currency_id
 * @property string $currency_title
 * @property string $currency_name
 * @property string $currency_course
 * @property string $currency_active
 * @property string $currency_main
 */
class Currencies extends \yii\db\ActiveRecord {

	/**
	 * @inheritdoc
	 */
	public static function tableName() {

		return '{{%currencies}}';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {

		return [
			[['currency_course'], 'number'],
			[['currency_active', 'currency_main'], 'string'],
			[['currency_title'], 'string', 'max' => 100],
			[['currency_name'], 'string', 'max' => 50],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {

		return [
			'currency_id'     => Yii::t('app', 'Currency ID'),
			'currency_title'  => Yii::t('app', 'Currency Title'),
			'currency_name'   => Yii::t('app', 'Currency Name'),
			'currency_course' => Yii::t('app', 'Currency Course'),
			'currency_active' => Yii::t('app', 'Currency Active'),
			'currency_main'   => Yii::t('app', 'Currency Main'),
		];
	}

	/**
	 * @return array|false
	 */
	public function activeCurrency() {

		$query = "SELECT * FROM {{%currencies}} WHERE currency_active='Y' AND currency_main='Y' LIMIT 1";

		return Yii::$app->db->createCommand($query)->queryOne();
	}

	/**
	 * @param $currency_name
	 *
	 * @return bool
	 */
	public function changeCurrency($currency_name) {

		$query = "SELECT * FROM {{%currencies}} WHERE currency_active='Y' AND currency_name=:currency_name LIMIT 1";

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':currency_name', $currency_name);
		$currency = $command->queryOne();

		if (empty($currency) || empty($currency['currency_id'])) {
			return false;
		}

		$query = "UPDATE {{%currencies}} SET currency_main='N'";
		Yii::$app->db->createCommand($query)->query();

		$query = "UPDATE {{%currencies}} SET currency_main='Y' WHERE currency_id=:currency_id";

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':currency_id', $currency['currency_id'])->query();

		return true;
	}

	public function checkCurrency() {

		if (!empty($_REQUEST['active_currency'])) {
			if ($res = Currencies::changeCurrency($_REQUEST['active_currency'])) {
				$_COOKIE['active_currency'] = $_SESSION['active_currency'] = $_REQUEST['active_currency'];
			}
		}

	}

	public function updateCurrencies() {

		$result = ApiController::getCurrenciesInfo();

		$query = "SELECT currency_name FROM {{%currencies}} WHERE currency_name<>'RUB'";
		$currencies = Yii::$app->db->createCommand($query)->queryColumn();

		$data = [];
		foreach ($currencies as $value) {
			foreach ($result as $val) {
				if ($val->CharCode == $value) {
					$data[$value] = 1 / (float)$val->Value;
				}
			}
		}

		if (!empty($data)) {
			foreach ($data as $key=>$value) {
				$query = "UPDATE {{%currencies}} SET currency_course=:currency_course WHERE currency_name=:currency_name";
				Yii::$app->db->createCommand($query)->bindValue(':currency_course', $value)->bindValue(':currency_name', $key)->query();
			}
		}

	}

}
