Новинки
<br>
<?php foreach ($new_products as $key => $value): ?>
	<a href="<?= Yii::$app->homeUrl . 'product/' . $value['product_id'] . '/' . $value['chpu'] ?>">
		<div class="result_main" data-view="true">
			<?php if (!empty($value['product_thumbnail_path']) and !empty($value['product_thumbnail_name'])) { ?>

				<div class="preview main_search pull-left">
					<img class="img-responsive" src="<?= Yii::$app->homeUrl . $value['product_thumbnail_path'] . '/' . $value['product_thumbnail_name'] ?>">
				</div>

			<?php } else { ?>
				<div class="preview main_search pull-left">
					<img class="img-responsive" src="<?= Yii::$app->homeUrl . 'images/thumbnails/1.jpg' ?>">
				</div>
			<?php } ?>
			<div class="item_name pull-left">
				<p>
					<?= $value['product_title'] ?>
				</p>
			</div>

			<div class="item_price pull-right">
				<span><?= $value['final_product_price'] ?></span>
				<span class="valuta"><?= ' ' . $active_currency['currency_title'] ?></span>
				<?php if (!empty($value['product_discount'])) { ?>
					<span nowrap class="discount">-<?= $value['product_discount'] ?> %</span>
				<?php } ?>
			</div>
		</div>
	</a>
	<hr>
<?php endforeach; ?>
Предзаказ
<br>
<?php foreach ($pre_order_products as $key => $value): ?>
	<a href="<?= Yii::$app->homeUrl . 'product/' . $value['product_id'] . '/' . $value['chpu'] ?>">
		<div class="result_main" data-view="true">
			<?php if (!empty($value['product_thumbnail_path']) and !empty($value['product_thumbnail_name'])) { ?>

				<div class="preview main_search pull-left">
					<img class="img-responsive" src="<?= Yii::$app->homeUrl . $value['product_thumbnail_path'] . '/' . $value['product_thumbnail_name'] ?>">
				</div>

			<?php } else { ?>
				<div class="preview main_search pull-left">
					<img class="img-responsive" src="<?= Yii::$app->homeUrl . 'images/thumbnails/1.jpg' ?>">
				</div>
			<?php } ?>
			<div class="item_name pull-left">
				<p>
					<?= $value['product_title'] ?>
				</p>
			</div>

			<div class="item_price pull-right">
				<span><?= $value['final_product_price'] ?></span>
				<span class="valuta"><?= ' ' . $active_currency['currency_title'] ?></span>
				<?php if (!empty($value['product_discount'])) { ?>
					<span nowrap class="discount">-<?= $value['product_discount'] ?> %</span>
				<?php } ?>
			</div>
		</div>
	</a>
	<hr>
<?php endforeach; ?>
Скидки
<br>
<?php foreach ($discount_products as $key => $value): ?>
	<a href="<?= Yii::$app->homeUrl . 'product/' . $value['product_id'] . '/' . $value['chpu'] ?>">
		<div class="result_main" data-view="true">
			<?php if (!empty($value['product_thumbnail_path']) and !empty($value['product_thumbnail_name'])) { ?>

				<div class="preview main_search pull-left">
					<img class="img-responsive" src="<?= Yii::$app->homeUrl . $value['product_thumbnail_path'] . '/' . $value['product_thumbnail_name'] ?>">
				</div>

			<?php } else { ?>
				<div class="preview main_search pull-left">
					<img class="img-responsive" src="<?= Yii::$app->homeUrl . 'images/thumbnails/1.jpg' ?>">
				</div>
			<?php } ?>
			<div class="item_name pull-left">
				<p>
					<?= $value['product_title'] ?>
				</p>
			</div>

			<div class="item_price pull-right">
				<span><?= $value['final_product_price'] ?></span>
				<span class="valuta"><?= ' ' . $active_currency['currency_title'] ?></span>
				<?php if (!empty($value['product_discount'])) { ?>
					<span nowrap class="discount">-<?= $value['product_discount'] ?> %</span>
				<?php } ?>
			</div>
		</div>
	</a>
	<hr>
<?php endforeach; ?>
