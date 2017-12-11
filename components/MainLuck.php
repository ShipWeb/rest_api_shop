<?php

namespace app\components;

use Yii;
use yii\base\Widget;
use app\models\Products;
use app\models\Currencies;

class MainLuck extends Widget {

	public function init() {

		parent::init();

	}

	public function run() {

		$limit = 3;

		$active_currency = Currencies::activeCurrency();

		$query = "SELECT setting_value FROM {{%settings}} WHERE setting_name='MainLuck' LIMIT 1";
		$selected_products = Yii::$app->db->createCommand($query)->queryOne();
		$setting_value = $selected_products['setting_value'];
		$setting_value = explode(',', $setting_value);

		if (!empty($setting_value)) {
			$plist = ':product_id_' . implode(',:product_id_', array_keys($setting_value));
			$query = "
SELECT *, prod.product_id as product_id, CEIL (prod.product_discount) as product_discount,
CEIL(
	CAST(
		IF(product_discount IS NULL ,
		(prod.product_price * " . $active_currency['currency_course'] . "), 
		(prod.product_price * " . $active_currency['currency_course'] . ")
		" . (Yii::$app->params['enableCalcDiscount'] == true ? "/ 100 * (100 - product_discount)" : "") . "
		) AS DECIMAL(12,2)
	)
) as final_product_price 
FROM {{%products}} prod
WHERE prod.product_id IN (" . $plist . ") LIMIT :limit";
			$command = Yii::$app->db->createCommand($query);
			foreach ($setting_value as $key => $value) {
				$command->bindValue(':product_id_' . $key, $value);
			}
			$command->bindValue(':limit', (int)$limit);
			$products = $command->queryAll();

		}

		return $this->render('MainLuckView', [
			'active_currency' => $active_currency,
			'products'   => $products,
		]);

	}

}