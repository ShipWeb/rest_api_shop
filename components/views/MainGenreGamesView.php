<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 aside_menu">
	<!--Боковое меню-->
	<a href="<?= Yii::$app->homeUrl ?>product"><h4>Каталог</h4></a>
	<hr class="hidden-xs">
	<ul class="hidden-xs">
<?php foreach ($genres as $key => $value): ?>
	<a href="<?= Yii::$app->homeUrl.'product?'.$value['property_name'].'='.$value['value_str']?>"><li><?=$value['value_str']?></li></a>

<?php endforeach; ?>
	</ul>
</div>

