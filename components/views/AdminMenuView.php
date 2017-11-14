<?php

use yii\helpers\Html;

?>
<div class="row">
	<div class="col-sm-2 col-md-2 col-lg-2">
		<?= Html::a("Главное меню", ['/admin/'], [
			'data'  => ['method' => 'post'],
			'class' => 'white text-center',
		]); ?>
	</div>
	<div class="col-sm-2 col-md-2 col-lg-2">
		<?= Html::a("Выйти из интернет-магазина", ['/site/logout'], [
			'data'  => ['method' => 'post'],
			'class' => 'white text-center',
		]); ?>
	</div>
</div>
