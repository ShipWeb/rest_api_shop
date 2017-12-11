<h3>Испытай удачу!</h3>
<div class="row">
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 luck luck_silver">
		<img class="img-responsive" src="images/luck_silver.jpg" alt="Испытай удачу Silver">
		<a href="<?= Yii::$app->homeUrl . 'product/' . $products[0]['product_id'] . '/' . $products[0]['chpu'] ?>">
			<div class="silver">
				<h4>Испытай удачу Silver</h4>
				<p>Вы получаете рабочий ключ для активации игры в сервисе Steam. Минимальная цена игры 99руб. Какая
					игра nдостанется вам? Определит случайность.</p>

				<span class="luck_discount pull-right"><?= $products[0]['final_product_price'] ?>
					<span class="valuta"><?= ' ' . $active_currency['currency_title'] ?></span></span>
				<?php if (!empty($products[0]['product_discount'])) { ?>
					<span class="luck_price pull-right"><?= $products[0]['final_product_price'] + ($products[0]['final_product_price'] / 100 * $products[0]['product_discount']) ?>
						<span class="valuta"><?= ' ' . $active_currency['currency_title'] ?></span></span>
				<?php } ?>

			</div>
		</a>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 luck luck_gold">
		<img class="img-responsive" src="images/luck_gold.jpg" alt="Испытай удачу Gold">
		<a href="<?= Yii::$app->homeUrl . 'product/' . $products[1]['product_id'] . '/' . $products[1]['chpu'] ?>">
			<div class="gold">
				<h4>Испытай удачу Gold</h4>
				<p>Вы получаете рабочий ключ для активации игры в сервисе Steam. Минимальная цена игры 149руб. Какая
					игра достанется вам? Определит случайность.</p>

				<span class="luck_discount pull-right"><?= $products[1]['final_product_price'] ?>
					<span class="valuta"><?= ' ' . $active_currency['currency_title'] ?></span></span>
				<?php if (!empty($products[1]['product_discount'])) { ?>
					<span class="luck_price pull-right"><?= $products[1]['final_product_price'] + ($products[1]['final_product_price'] / 100 * $products[1]['product_discount']) ?>
						<span class="valuta"><?= ' ' . $active_currency['currency_title'] ?></span></span>
				<?php } ?>

			</div>
		</a>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 luck luck_diamond">
		<img class="img-responsive" src="images/luck_diamond.jpg" alt="Испытай удачу Diamond">
		<a href="<?= Yii::$app->homeUrl . 'product/' . $products[2]['product_id'] . '/' . $products[2]['chpu'] ?>">
			<div class="diamond">
				<h4>Испытай удачу Diamond</h4>
				<p>Вы получаете рабочий ключ для активации игры в сервисе Steam. Вы гарантированно получаете игру из
					призового фонда! Какая игра достанется вам? Определит случайность.</p>

				<span class="luck_discount pull-right"><?= $products[2]['final_product_price'] ?>
					<span class="valuta"><?= ' ' . $active_currency['currency_title'] ?></span></span>
				<?php if (!empty($products[2]['product_discount'])) { ?>
					<span class="luck_price pull-right"><?= $products[2]['final_product_price'] + ($products[2]['final_product_price'] / 100 * $products[2]['product_discount']) ?>
						<span class="valuta"><?= ' ' . $active_currency['currency_title'] ?></span></span>
				<?php } ?>

			</div>
		</a>
	</div>
</div>