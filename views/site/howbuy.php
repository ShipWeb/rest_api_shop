<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Как покупать? '.Yii::$app->homeUrl;
$description='Как покупать?';
$keywords='Как покупать?';
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
	<li class="active">Как покупать?</li>
</ol>
<div>
	<h1>Как покупать?</h1>

</div>
