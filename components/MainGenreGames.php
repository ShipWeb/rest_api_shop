<?php

namespace app\components;

use Yii;
use yii\base\Widget;

class MainGenreGames extends Widget {

	public function init() {

		parent::init();

	}

	public function run() {

		$query = "
SELECT * 
FROM {{%properties}} prop
	INNER JOIN {{%products_properties}} prod_prop ON prod_prop.property_id=prop.property_id 
WHERE prop.property_name='genre' 
GROUP BY TRIM(prod_prop.value_str)  
ORDER BY TRIM(prod_prop.value_str) ASC
		";
		$command = Yii::$app->db->createCommand($query);
		$genres = $command->queryAll();

		foreach ($genres as $key => $value) {
			if (!empty($value['value_str'])) {
				$filter_properties[$key]['value_str'] = trim($value['value_str']);
			}
		}

		return $this->render('MainGenreGamesView', [
			'genres' => $genres,
		]);

	}

}