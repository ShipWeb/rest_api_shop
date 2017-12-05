<?php

namespace app\components;

use Yii;
use yii\base\Widget;
use app\models\Currencies;

class MainSliderGames extends Widget {

	public function init() {

		parent::init();

	}

	public function run() {

		$query = "SELECT setting_value FROM {{%settings}} WHERE setting_name='MainSliderGames' LIMIT 1";
		$main_slider_games = Yii::$app->db->createCommand($query)->queryOne();
		$setting_value=$main_slider_games['setting_value'];
		$setting_value=explode(',',$setting_value);

		$active_currency = Currencies::activeCurrency();

		if (!empty($setting_value)) {
			$plist=':product_id_'.implode(',:product_id_', array_keys($setting_value));
			$query = "
SELECT *, prod.product_id as product_id, CEIL (prod.product_discount) as product_discount,
CEIL(
	CAST(
		IF(product_discount IS NULL ,
		(prod.product_price * ".$active_currency['currency_course']."), 
		(prod.product_price * ".$active_currency['currency_course'].")
		" . (Yii::$app->params['enableCalcDiscount'] == true ? "/ 100 * (100 - product_discount)" : "") . "
		) AS DECIMAL(12,2)
	)
) as final_product_price 
FROM {{%products_images}} prod_img
	INNER JOIN {{%images}} img ON img.image_id=prod_img.image_id 
	INNER JOIN {{%products}} prod ON prod.product_id=prod_img.product_id 
WHERE prod_img.product_id IN (".$plist.") AND prod_img.type_image='MAIN'";
			$command = Yii::$app->db->createCommand($query);
			foreach ($setting_value as $key=>$value) {
				$command->bindValue(':product_id_'.$key, $value);
			}
			$slider_products=$command->queryAll();

		}

		return $this->render('MainSliderGamesView', [
			'slider_products' => $slider_products,
			'active_currency' => $active_currency,
		]);
	}


}