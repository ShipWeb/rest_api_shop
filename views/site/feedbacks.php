<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Отзывы '.Yii::$app->homeUrl;
$description='Отзывы';
$keywords='Отзывы';
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
	<li class="active">Отзывы</li>
</ol>
<div>
	<h1>Отзывы</h1>

</div>
