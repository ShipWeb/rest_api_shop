<?php

use yii\helpers\Html;

?>

<div class="admin-default-index">
	<h1>Управление интернет-магазином</h1>
	<ul>
		<li><a href="<?= Yii::$app->homeUrl ?>admin/products/index">Товары</a></li>
		<li><a href="<?= Yii::$app->homeUrl ?>admin/properties/index">Свойства товаров</a></li>
		<li><a href="<?= Yii::$app->homeUrl ?>admin/images/index">Изображения</a></li>
		<li><a href="<?= Yii::$app->homeUrl ?>admin/currencies/index">Валюты</a></li>
		<li><a href="<?= Yii::$app->homeUrl ?>admin/settings/index">Настройки</a></li>
		<li><a href="<?= Yii::$app->homeUrl ?>admin/user/index">Пользователи</a></li>
		<li><a href="<?= Yii::$app->homeUrl ?>admin/lock/index">Заблокированные IP</a></li>
		<li><a href="<?= Yii::$app->homeUrl ?>admin/login/index">Лог входа в административную часть</a></li>
		<li><?= Html::a("Выйти из интернет-магазина", ['/site/logout'], [
				'data'  => ['method' => 'post'],
				'class' => 'white text-center',
			]); ?></li>
	</ul>
</div>
