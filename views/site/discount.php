<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Скидка ' . Yii::$app->homeUrl;
$description = 'Скидка';
$keywords = 'Скидка';
$this->registerMetaTag([
	'name'    => 'description',
	'content' => $description
]);

$this->registerMetaTag([
	'name'    => 'keywords',
	'content' => $keywords
]);

?>
<ol class="breadcrumb">
	<li><a href="<?= Yii::$app->homeUrl ?>">Главная</a></li>
	<li class="active">Скидка</li>
</ol>
<div>
	<h1>Скидка</h1>
	<div class="modul_tab">
	<div class="tab-content">
		<div class="tab-pane fade in active" id="disc">
			<?php foreach ($discount_products as $key => $value): ?>
				<a href="<?= Yii::$app->homeUrl . 'product/' . $value['product_id'] . '/' . $value['chpu'] ?>">
					<div class="result">
						<?php if (!empty($value['product_thumbnail_path']) and !empty($value['product_thumbnail_name'])) { ?>

							<div class="preview prev_main pull-left">
								<img class="img-responsive" src="<?= Yii::$app->homeUrl . $value['product_thumbnail_path'] . '/' . $value['product_thumbnail_name'] ?>">
							</div>

						<?php } else { ?>
							<div class="preview prev_main pull-left">
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
		</div>
	</div>
	</div>
</div>
