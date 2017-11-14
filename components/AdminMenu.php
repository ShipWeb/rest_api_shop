<?php

namespace app\components;

use Yii;
use yii\base\Widget;


class AdminMenu extends Widget {

	public function init() {

		parent::init();

	}

	/**
	 * Получение всех фильтров
	 *
	 * @return string
	 */
	public function run() {

		return $this->render('AdminMenuView', [
		]);

	}


}