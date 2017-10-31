<?php foreach ($products as $key => $product) { ?>
	
	<a href="<?= Yii::$app->homeUrl . 'product/' . $product['product_id'] . '/' . $product['chpu'] ?>">
		<div class="result">
			<div class="preview pull-left">
				<?php if (!empty($product['product_thumbnail_path']) and !empty($product['product_thumbnail_name'])) { ?>


					<img width="110" height="52" class="img-responsive" src="<?= Yii::$app->homeUrl . $product['product_thumbnail_path'] . '/' . $product['product_thumbnail_name'] ?>">


				<?php } else { ?>

					<img width="110" height="52" class="img-responsive" src="<?= Yii::$app->homeUrl . 'images/thumbnails/1.jpg' ?>">

				<?php } ?>
			</div>
			<div class="item_name pull-left">
				<p><?= $product['product_title'] ?></p>
			</div>
			<div class="item_price pull-right">
				<span><?= $product['final_product_price'] ?></span>
				<span class="valuta"><?= $active_currency['currency_title'] ?></span>
				<?php if (!empty($product['product_discount'])) { ?>
					<span class="discount">-<?= $product['product_discount'] ?> %</span>
				<?php } ?>
			</div>
		</div>
	</a>
	<hr>

<?php } ?>