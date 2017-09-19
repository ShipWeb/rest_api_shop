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
WHERE prop.property_name='genre'";
		$command = Yii::$app->db->createCommand($query);
		$genres = $command->queryAll();

		return $this->render('MainGenreGamesView', [
			'genres' => $genres,
		]);

	}

}