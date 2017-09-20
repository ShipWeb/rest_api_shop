<div class="container main tabs">
	<div class="modul_tab">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#new" data-toggle="tab">Новинки</a></li>
			<li><a href="#preorder" data-toggle="tab">Предзаказ</a></li>
			<li><a href="#disc" data-toggle="tab">Скидки</a></li>
		</ul>

		<div class="tab-content">
			<!--Первая вкладка-->
			<div class="tab-pane fade in active" id="new">
				<?php foreach ($new_products as $key => $value): ?>
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

			<!--Вторая вкладка-->
			<div class="tab-pane fade" id="preorder">
				<?php foreach ($pre_order_products as $key => $value): ?>
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

			<!--Третья вкладка-->
			<div class="tab-pane fade" id="disc">
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