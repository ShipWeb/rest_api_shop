<div class="cards">
	<!--Размеры карточек: маленькие 295х295, средние 590х295, большая 590х590-->
	<!--Первый ряд карточек-->
	<div class="row">
		<a href="<?= Yii::$app->homeUrl . 'product/' . $products[0]['product_id'] . '/' . $products[0]['chpu'] ?>">
			<div class="col-xs-12 col-sm-6 col-md-6 col-sm-push-3 col-lg-6 card">
				<img class="img-responsive" src="<?= Yii::$app->homeUrl . $products[0]['image_path'] . $products[0]['image_name'] ?>">
				<div class="card_hover">
					<h4><?= $products[0]['product_title'] ?></h4>
					<span class="slider_price">Купить за <?= $products[0]['final_product_price'] ?>
						<span class="valuta">руб</span></span>
					<span class="slider_discount"><?php if (!empty($products[0]['product_discount'])) { ?>
							-<?= $products[0]['product_discount'] ?> %
						<?php } else { ?>
							Подробнее
						<?php } ?>
					</span>
				</div>
			</div>

		</a>
		<a href="<?= Yii::$app->homeUrl . 'product/' . $products[1]['product_id'] . '/' . $products[1]['chpu'] ?>">
			<div class="col-xs-6 col-sm-3 col-md-3 col-sm-pull-6 col-lg-3 card">
				<img class="img-responsive" src="<?= Yii::$app->homeUrl . $products[1]['image_path'] . $products[1]['image_name'] ?>">
				<div class="card_hover">
					<h4><?= $products[1]['product_title'] ?></h4>
					<span class="slider_price">Купить за <?= $products[1]['final_product_price'] ?>
						<span class="valuta">руб</span></span>
					<span class="slider_discount">
						<?php if (!empty($products[1]['product_discount'])) { ?>
							-<?= $products[1]['product_discount'] ?> %
						<?php } else { ?>
							Подробнее
						<?php } ?>
					</span>
				</div>
			</div>
		</a>
		<a href="<?= Yii::$app->homeUrl . 'product/' . $products[2]['product_id'] . '/' . $products[2]['chpu'] ?>">
			<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 card">
				<img class="img-responsive" src="<?= Yii::$app->homeUrl . $products[2]['image_path'] . $products[2]['image_name'] ?>">
				<div class="card_hover">
					<h4><?= $products[2]['product_title'] ?></h4>
					<span class="slider_price">Купить за <?= $products[2]['final_product_price'] ?>
						<span class="valuta">руб</span></span>
					<span class="slider_discount">
						<?php if (!empty($products[2]['product_discount'])) { ?>
							-<?= $products[2]['product_discount'] ?> %
						<?php } else { ?>
							Подробнее
						<?php } ?>
					</span>
				</div>
			</div>
		</a>
	</div>

	<!--Второй ряд карточек-->
	<div class="row">
		<a href="<?= Yii::$app->homeUrl . 'product/' . $products[3]['product_id'] . '/' . $products[3]['chpu'] ?>">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 card">
				<img class="img-responsive" src="<?= Yii::$app->homeUrl . $products[3]['image_path'] . $products[3]['image_name'] ?>">
				<div class="card_hover">
					<h4><?= $products[3]['product_title'] ?></h4>
					<span class="slider_price">Купить за <?= $products[3]['final_product_price'] ?>
						<span class="valuta">руб</span></span>
					<span class="slider_discount">
						<?php if (!empty($products[3]['product_discount'])) { ?>
							-<?= $products[3]['product_discount'] ?> %
						<?php } else { ?>
							Подробнее
						<?php } ?>
					</span>
				</div>
			</div>
		</a>
		<a href="<?= Yii::$app->homeUrl . 'product/' . $products[4]['product_id'] . '/' . $products[4]['chpu'] ?>">
			<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 card">
				<img class="img-responsive" src="<?= Yii::$app->homeUrl . $products[4]['image_path'] . $products[4]['image_name'] ?>">
				<div class="card_hover">
					<h4><?= $products[4]['product_title'] ?></h4>
					<span class="slider_price">Купить за <?= $products[4]['final_product_price'] ?>
						<span class="valuta">руб</span></span>
					<span class="slider_discount">
						<?php if (!empty($products[4]['product_discount'])) { ?>
							-<?= $products[4]['product_discount'] ?> %
						<?php } else { ?>
							Подробнее
						<?php } ?>
					</span>
				</div>
			</div>
		</a>
		<a href="<?= Yii::$app->homeUrl . 'product/' . $products[5]['product_id'] . '/' . $products[5]['chpu'] ?>">
			<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 card">
				<img class="img-responsive" src="<?= Yii::$app->homeUrl . $products[5]['image_path'] . $products[5]['image_name'] ?>">
				<div class="card_hover">
					<h4><?= $products[5]['product_title'] ?></h4>
					<span class="slider_price">Купить за <?= $products[5]['final_product_price'] ?>
						<span class="valuta">руб</span></span>
					<span class="slider_discount">
						<?php if (!empty($products[5]['product_discount'])) { ?>
							-<?= $products[5]['product_discount'] ?> %
						<?php } else { ?>
							Подробнее
						<?php } ?>
					</span>
				</div>
			</div>
		</a>
	</div>

	<div class="row">
		<div class="col-sm-6 col-md-6 col-lg-6">

			<!--Третий ряд карточек-->
			<div class="row">
				<a href="<?= Yii::$app->homeUrl . 'product/' . $products[6]['product_id'] . '/' . $products[6]['chpu'] ?>">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 card">
						<img class="img-responsive" src="<?= Yii::$app->homeUrl . $products[6]['image_path'] . $products[6]['image_name'] ?>">
						<div class="card_hover">
							<h4><?= $products[6]['product_title'] ?></h4>
							<span class="slider_price">Купить за <?= $products[6]['final_product_price'] ?>
								<span class="valuta">руб</span></span>
							<span class="slider_discount">
								<?php if (!empty($products[6]['product_discount'])) { ?>
									-<?= $products[6]['product_discount'] ?> %
								<?php } else { ?>
									Подробнее
								<?php } ?>
							</span>
						</div>
					</div>
				</a>
				<a href="<?= Yii::$app->homeUrl . 'product/' . $products[7]['product_id'] . '/' . $products[7]['chpu'] ?>">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 card">
						<img class="img-responsive" src="<?= Yii::$app->homeUrl . $products[7]['image_path'] . $products[7]['image_name'] ?>">
						<div class="card_hover">
							<h4><?= $products[7]['product_title'] ?></h4>
							<span class="slider_price">Купить за <?= $products[7]['final_product_price'] ?>
								<span class="valuta">руб</span></span>
							<span class="slider_discount">
								<?php if (!empty($products[7]['product_discount'])) { ?>
									-<?= $products[7]['product_discount'] ?> %
								<?php } else { ?>
									Подробнее
								<?php } ?>
							</span>
						</div>
					</div>
				</a>
			</div>
			<div class="row">
				<a href="<?= Yii::$app->homeUrl . 'product/' . $products[8]['product_id'] . '/' . $products[8]['chpu'] ?>">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 card">
						<img class="img-responsive" src="<?= Yii::$app->homeUrl . $products[8]['image_path'] . $products[8]['image_name'] ?>">
						<div class="card_hover">
							<h4><?= $products[8]['product_title'] ?></h4>
							<span class="slider_price">Купить за <?= $products[8]['final_product_price'] ?>
								<span class="valuta">руб</span></span>
							<span class="slider_discount">
								<?php if (!empty($products[8]['product_discount'])) { ?>
									-<?= $products[8]['product_discount'] ?> %
								<?php } else { ?>
									Подробнее
								<?php } ?>
							</span>
						</div>
					</div>
				</a>
				<a href="<?= Yii::$app->homeUrl . 'product/' . $products[9]['product_id'] . '/' . $products[9]['chpu'] ?>">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 card">
						<img class="img-responsive" src="<?= Yii::$app->homeUrl . $products[9]['image_path'] . $products[9]['image_name'] ?>">
						<div class="card_hover">
							<h4><?= $products[9]['product_title'] ?></h4>
							<span class="slider_price">Купить за <?= $products[9]['final_product_price'] ?>
								<span class="valuta">руб</span></span>
							<span class="slider_discount">
								<?php if (!empty($products[9]['product_discount'])) { ?>
									-<?= $products[9]['product_discount'] ?> %
								<?php } else { ?>
									Подробнее
								<?php } ?>
							</span>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">

			<!--Четвертый ряд карточек-->
			<div class="row">
				<a href="<?= Yii::$app->homeUrl . 'product/' . $products[10]['product_id'] . '/' . $products[10]['chpu'] ?>">
					<div class="hidden-xs col-sm-12 col-md-12 col-lg-12 card">
						<img class="img-responsive" src="<?= Yii::$app->homeUrl . $products[10]['image_path'] . $products[10]['image_name'] ?>">
						<div class="card_hover big_card">
							<h4><?= $products[10]['product_title'] ?></h4>
							<span class="slider_price">Купить за <?= $products[10]['final_product_price'] ?>
								<span class="valuta">руб</span></span>
							<span class="slider_discount">
								<?php if (!empty($products[10]['product_discount'])) { ?>
									-<?= $products[10]['product_discount'] ?> %
								<?php } else { ?>
									Подробнее
								<?php } ?>
							</span>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
