Каталог
<br>
<?php foreach ($genres as $key => $value): ?>
	<a href="<?= Yii::$app->homeUrl.'product?'.$value['property_name'].'='.$value['value_str']?>"><?=$value['value_str']?></a>
	<br>
<?php endforeach; ?>