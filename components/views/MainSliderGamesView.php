<div class="col-sm-9 col-md-9 col-lg-9 slider">
	<!--Сдайдер слайды 900х450-->
	<div id="carousel-example-generic" class="carousel fade" data-ride="carousel">

		<!-- Обертка для слайдов -->
		<div class="carousel-inner">
			<!--Слайд 1-->

			<?php foreach ($slider_products as $key => $value): ?>
				<div class="item <?= $key == 0 ? 'active' : '' ?>">
					<a href="<?= Yii::$app->homeUrl . 'product/' . $value['product_id'] . '/' . $value['chpu'] ?>"><img src="<?= Yii::$app->homeUrl . $value['image_path'] . $value['image_name'] ?>" alt="<?= $value['image_title'] ?>"></a>

					<div class="carousel-caption">
						<span class="slider_price"><?= $value['final_product_price'] ?>
							<span class="valuta"><?= ' ' . $active_currency['currency_title'] ?></span></span>
						<span class="slider_discount"><?php if (!empty($value['product_discount'])) { ?>
								-<?= $value['product_discount'] ?> %
							<?php } ?></span>
					</div>
				</div>
			<?php endforeach; ?>

			<!-- Переключатели -->
			<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
				<span class="fa fa-angle-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
				<span class="fa fa-angle-right"></span>
			</a>
		</div>
	</div>
</div>

