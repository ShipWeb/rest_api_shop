<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Гарантии '.Yii::$app->homeUrl;
$description='Гарантии';
$keywords='Гарантии';
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
	<li class="active">Гарантии</li>
</ol>
<div>
	<h1>Гарантии</h1>

</div>
