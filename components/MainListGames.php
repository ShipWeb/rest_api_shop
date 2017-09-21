<?php

namespace app\components;

use Yii;
use yii\base\Widget;
use app\models\Products;
use app\models\Currencies;

class MainListGames extends Widget {

	public function init() {

		parent::init();

	}

	/**
	 * Получение всех фильтров
	 *
	 * @return string
	 */
	public function run() {

		$limit=5;

		$active_currency = Currencies::activeCurrency();

		$query = "
SELECT *,
CAST(
	IF(prod.product_discount IS NULL ,
	(prod.product_price * ".$active_currency['currency_course']."), 
	(prod.product_price * ".$active_currency['currency_course'].") / 100 * (100 - prod.product_discount)
	) AS DECIMAL(12,2)) as final_product_price 
FROM {{%properties}} prop
INNER JOIN {{%products_properties}} prod_prop ON prod_prop.property_id=prop.property_id 
INNER JOIN {{%products}} prod ON prod.product_id=prod_prop.product_id 
WHERE property_name='data-vyhoda' AND prod_prop.value_date<=:actual_date
ORDER BY prod_prop.value_date DESC LIMIT :limit";

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':actual_date',date("Y-m-d H:i:s"));
		$command->bindValue(':limit',(int)$limit);
		$new_products = $command->queryAll();

		$query = "
SELECT *,
CAST(
	IF(product_discount IS NULL ,
	(product_price * ".$active_currency['currency_course']."), 
	(product_price * ".$active_currency['currency_course'].") / 100 * (100 - product_discount)
	) AS DECIMAL(12,2)) as final_product_price 
FROM {{%products}}
ORDER BY product_discount DESC LIMIT :limit";

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':limit',(int)$limit);
		$discount_products = $command->queryAll();


		$query = "SELECT setting_value FROM {{%settings}} WHERE setting_name='MainPreOrderGames' LIMIT 1";
		$pre_order_products = Yii::$app->db->createCommand($query)->queryOne();
		$setting_value=$pre_order_products['setting_value'];
		$setting_value=explode(',',$setting_value);

		if (!empty($setting_value)) {
			$plist=':product_id_'.implode(',:product_id_', array_keys($setting_value));
			$query = "
SELECT *, prod.product_id as product_id, CEIL (prod.product_discount) as product_discount,
CEIL(
	CAST(
		IF(product_discount IS NULL ,
		(prod.product_price * ".$active_currency['currency_course']."), 
		(prod.product_price * ".$active_currency['currency_course'].") / 100 * (100 - product_discount)
		) AS DECIMAL(12,2)
	)
) as final_product_price 
FROM {{%products}} prod
WHERE prod.product_id IN (".$plist.") LIMIT :limit";
			$command = Yii::$app->db->createCommand($query);
			foreach ($setting_value as $key=>$value) {
				$command->bindValue(':product_id_'.$key, $value);
			}
			$command->bindValue(':limit',(int)$limit);
			$pre_order_products=$command->queryAll();

		}

		return $this->render('MainListGamesView', [
			'new_products'=>$new_products,
			'discount_products'=>$discount_products,
			'pre_order_products'=>$pre_order_products,
			'active_currency'=>$active_currency,
		]);
	}


}