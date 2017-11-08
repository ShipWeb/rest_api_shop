<?php

use app\components\ShopLinkPager;
use app\components\FiltersProducts;

if (!empty($_SESSION['view_products']) && $_SESSION['view_products'] == 'net') {
	$script = <<< JS
		viewProductsNet();
JS;
	//маркер конца строки, обязательно сразу, без пробелов и табуляции
	$this->registerJs($script, yii\web\View::POS_READY);
}

?>

<div class="container main catalog_wrapper row row-flex">
	<div class="col-sm-4 col-md-4 col-lg-4">
		<form class="list_sidebar" name="filtersproducts"  action="<?= Yii::$app->homeUrl . "product" ?>" method="get">
			<input type="hidden" name="sort" <?= !empty($_SESSION['sort']) ? 'value="' . $_SESSION['sort'] . '"' : '' ?> >
			<div class="column">
				<div class="filter">
					<a class="search_param" data-toggle="collapse" href="#collapseSearch" aria-expanded="true" aria-controls="collapseExample">
						<i class="fa fa-angle-up" aria-hidden="true"></i> Поиск
					</a>
					<div class="collapse in" id="collapseSearch">
						<div class="well">
							<input class="form-control" autocomplete="off" name="search_text" value="">
						</div>
					</div>
				</div>
				<div class="filter">
					<a class="search_param" data-toggle="collapse" href="#collapsePrice" aria-expanded="true" aria-controls="collapseExample">
						<i class="fa fa-angle-up" aria-hidden="true"></i> Цена
					</a>
					<div class="collapse in" id="collapsePrice">
						<div class="well">
							<input value="<?= !empty($_SESSION['product_price_first']) ? $_SESSION['product_price_first'] : "" ?>" class="form-control price_range" autocomplete="off" placeholder="От 0" name="product_price_first" >
							<input value="<?= !empty($_SESSION['product_price_last']) ? $_SESSION['product_price_last'] : "" ?>" class="form-control price_range" autocomplete="off" placeholder="До 9999" name="product_price_last">
							<input type="hidden" name="product_price">
						</div>
					</div>
				</div>

				<?php

				echo FiltersProducts::widget();

				?>

				<!--<div class="filter">
					<a class="search_param" data-toggle="collapse" href="#collapseActivate" aria-expanded="true" aria-controls="collapseExample">
						<i class="fa fa-angle-up" aria-hidden="true"></i> Активация
					</a>
					<div class="collapse in" id="collapseActivate">
						<div class="well">
							<input type="checkbox" class="check" id="steam">
							<label for="steam" class="label_check"><img src="images/steamlogo.png"> Steam</label>
							<input type="checkbox" class="check" id="origin">
							<label for="origin" class="label_check"><img src="images/Origin.png"> Origin</label>
							<input type="checkbox" class="check" id="uplay">
							<label for="uplay" class="label_check"><img src="images/uplay.png"> Uplay</label>
							<input type="checkbox" class="check" id="battle">
							<label for="battle" class="label_check"><img src="images/battlenet.png"> Battle.net</label>
						</div>
					</div>
				</div>

				<div class="filter">
					<a class="search_param" data-toggle="collapse" href="#collapseAccess" aria-expanded="true" aria-controls="collapseExample">
						<i class="fa fa-angle-up" aria-hidden="true"></i> Доступность
					</a>
					<div class="collapse in" id="collapseAccess">
						<div class="well row">
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<input type="checkbox" class="check" id="ready">
								<label for="ready" class="label_check"> Игра вышла</label>
								<input type="checkbox" class="check" id="early">
								<label for="early" class="label_check"> Ранний доступ</label>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<input type="checkbox" class="check" id="pre">
								<label for="pre" class="label_check"> Предзаказ</label>
							</div>
						</div>
					</div>
				</div>-->

				<div width="100%">
					<button type="submit" onclick="calculateFields();" class="show">Показать</button>
				</div>
				<span class="reset"><a href="<?= Yii::$app->homeUrl . "product?delete_filters=true" ?>">Сброс фильтров</a></span>
			</div>
		</form>
	</div>
	<div class="col-sm-8 col-md-8 col-lg-8">
		<div class="column">
			<div class="catalog_top">
				<div class="sort pull-right">
					<span>Сортировать по:</span>
					<span class="dropdown" id="sort_list">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="sort_type"><?= empty($_SESSION['sort_title']) ? 'Цене, сначала недорогие' : $_SESSION['sort_title'] ?></span><span class="caret"></span>
					</a>
				<ul class="dropdown-menu">
					<a class="sort_item" href="<?= insertValueInUrl('sort', 'product_price_asc') ?>"><li>Цене, сначала недорогие</li></a>
					<a class="sort_item" href="<?= insertValueInUrl('sort', 'product_price_desc') ?>"><li>Цене, сначала дорогие</li></a>
					<a class="sort_item" href="<?= insertValueInUrl('sort', 'product_title_asc') ?>"><li>Названию(A-Z)</li></a>
					<a class="sort_item" href="<?= insertValueInUrl('sort', 'product_title_desc') ?>"><li>Названию(Z-A)</li></a>
					<a class="sort_item" href="<?= insertValueInUrl('sort', 'data_vyhoda_desc') ?>"><li>Дате выхода, сначала новые</li></a>
					<a class="sort_item" href="<?= insertValueInUrl('sort', 'data_vyhoda_asc') ?>"><li>Дате выхода, сначала старые</li></a>
				</ul>
			</span>
					<i id="list" class="fa fa-list-ul active_state" aria-hidden="true" onclick="saveViewProducts('list');"></i>
					<i id="net" class="fa fa-th-large" aria-hidden="true" onclick="saveViewProducts('net');"></i>
				</div>
			</div>

			<?php foreach ($products as $key => $value): ?>
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

		</div>
		<nav aria-label="Page navigation" class="page_nav">

			<?php

			echo ShopLinkPager::widget([
				'pagination' => $pagination,
					'prevPageLabel' => '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
					'nextPageLabel' => '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
					'prevPageCssClass' => '',
					'nextPageCssClass' => '',
					'disabledPageCssClass' => '',
			]);
			?>

		</nav>
	</div>
</div>