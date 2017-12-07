<?php

use app\components\BreadcrumbsProduct;

?>

<div class="container main product_card">
	<div class="row goods_head">
		<div class="col-sm-6 col-md-6 col-lg-6">
			<ol class="breadcrumb">
				<li><a href="<?= Yii::$app->homeUrl ?>">Главная</a></li>
				<li><a href="<?= Yii::$app->homeUrl ?>product">Каталог</a></li>
				<li class="active"><?= $product['product_title'] ?></li>
			</ol>
			<h2>Купить <?= $product['product_title'] ?></h2>
			<?php if (!empty($product['product_thumbnail_path'])&&!empty($product['product_thumbnail_name'])) { ?>
				<img src="<?= Yii::$app->homeUrl . $product['product_thumbnail_path'] . '/' . $product['product_thumbnail_name'] ?>" alt="<?= $product['product_title'] ?>" class="img-responsive header_pic">
			<?php } ?>
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3" style="padding: 0">
			<ul class="game_info">
				<?php foreach ($product_not_tech_req as $key => $value): ?>
					<li>
						<span><?= $value['property_title'][0] ?>:</span>
						<?= implode(", ", $value[$value['value']]); ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 header_right">
			<div class="price_info">
				<div class="header_price">
					<span id="price"><?= $product['final_product_price'] ?></span><span class="valuta"><?= ' ' . $active_currency['currency_title'] ?></span>
					<?php if (!empty($product['product_discount'])) { ?>
						<div class="header_discount pull-right">
							<span>
								-<?= $product['product_discount'] ?> %
							</span>
						</div>
					<?php } ?>
				</div>
				<?php if ($product['in_stock'] == 1) { ?>
					<a href="<?= Yii::$app->homeUrl . 'basket?product_id=' . $product['product_id'] ?>" style="color: #fff">
						<button class="buy">
							Купить
						</button>
					</a>
				<?php } else { ?>
					<button class="buy">
						Нет в наличии
					</button>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-8 col-md-8 col-lg-8 col_left">
			<div class="inner">
				<div>
					<a class="goods_info" data-toggle="collapse" href="#collapseGameInfo" aria-expanded="true" aria-controls="collapseExample">
						<i class="fa fa-minus" aria-hidden="true"></i> Информация о игре
					</a>
					<div class="collapse in" id="collapseGameInfo">
						<div class="well description">
							<p>
								<?= $product['content'] ?>
							</p>
						</div>
					</div>
				</div>
				<div>
					<a class="goods_info" data-toggle="collapse" href="#collapseSustemReqire" aria-expanded="true" aria-controls="collapseExample">
						<i class="fa fa-minus" aria-hidden="true"></i> Минимальные системные требования:
					</a>
					<div class="collapse in" id="collapseSustemReqire">
						<div class="well description">
							<table class="table table-striped">
								<tbody>
								<?php foreach ($product_tech_req as $key => $value): ?>
									<tr>
										<td><?= $value['property_title'][0] ?>:</td>
										<td><?= implode(",", $value[$value['value']]); ?></td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
					<div>
						<a class="goods_info" data-toggle="collapse" href="#collapseInstruction" aria-expanded="true" aria-controls="collapseExample">
							<i class="fa fa-plus" aria-hidden="true"></i> Инструкция по активации:
						</a>
						<div class="collapse" id="collapseInstruction">
							<div class="well description">
								<?= $product['content_activation'] ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 col_right">
			<div class="inner">
				<!--Рекламные блоки 170x220px-->
				<div class="adv">
					<a href="<?= Yii::$app->homeUrl ?>product/9/prey"><img src="<?= Yii::$app->homeUrl ?>images/prey_banner.jpg" alt="Купить Prey за 999р"></a>
					<a href="<?= Yii::$app->homeUrl ?>product/26/rust"><img src="<?= Yii::$app->homeUrl ?>images/rust_bunner.jpg" alt="Купить Rust за 295р"></a>
				</div>
				<span class="goods_info">Скриншоты</span>
				<div class="galery">
					<?php if (!empty($images_small_screen)&&!empty($images_big_screen)) { ?>
						<?php foreach ($images_small_screen as $key => $value): ?>
							<div class="galery_image">
								<a href="<?= Yii::$app->homeUrl . $images_big_screen[$key]['image_path'] . $images_big_screen[$key]['image_name'] ?>" class="fancyimage" data-fancybox-group="group">
									<img class="img-responsive" src="<?= Yii::$app->homeUrl . $value['image_path'] . $value['image_name'] ?>">
								</a>
							</div>
						<?php endforeach; ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>