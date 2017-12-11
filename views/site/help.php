<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Помощь '.Yii::$app->homeUrl;
$description='Помощь';
$keywords='Помощь';
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
	<li class="active">Помощь</li>
</ol>
<div>
	<h1>Помощь</h1>

</div>
