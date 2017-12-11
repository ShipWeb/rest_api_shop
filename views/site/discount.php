<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Скидка '.Yii::$app->homeUrl;
$description='Скидка';
$keywords='Скидка';
$this->registerMetaTag([
	'name' => 'description',
	'content' => $description
]);

$this->registerMetaTag([
	'name' => 'keywords',
	'content' => $keywords
]);

?>
<ol class="breadcrumb">
	<li><a href="<?= Yii::$app->homeUrl ?>">Главная</a></li>
	<li class="active">Скидка</li>
</ol>
<div>
	<h1>Скидка</h1>
</div>
