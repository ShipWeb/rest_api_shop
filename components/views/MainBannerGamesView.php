Баннер
<br>
<?php foreach ($products as $key => $value): ?>
	<img src="<?= Yii::$app->homeUrl.$value['image_path'].$value['image_name']?>">
	<?= $value['final_product_price'] ?>&nbsp;<?= ' ' . $active_currency['currency_title'] ?>
	<br>
	<?php if (!empty($value['product_discount'])) { ?>
		-<?= $value['product_discount'] ?> %
	<?php } ?>
	<br>
<?php endforeach; ?>