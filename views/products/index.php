<?php

use yii\widgets\LinkPager;
// подключаем класс таблицы
use yii\grid\GridView;
// подключаем класс Pjax
use yii\widgets\Pjax;

?>


<div>
	<div>
		<?php foreach ($products as $key=>$value): ?>
			<article>
				<h2>
					<a href="<?= Yii::$app->homeUrl . 'product/' . $value['product_id'] . '/' . $value['chpu'] ?>">
						<? if (!empty($value['product_thumbnail_path']) && !empty($value['product_thumbnail_name'])) { ?>
							<img src="<?= Yii::$app->homeUrl . $value['product_thumbnail_path'] . '/' . $value['product_thumbnail_name'] ?>">
						<? } ?>
						<a href="<?= Yii::$app->homeUrl . 'product/' . $value['product_id'] . '/' . $value['chpu'] ?>">
							<?= $value['product_title'] ?>
							<?= $value['final_product_price'] ?>
							<?= ' '.$active_currency['currency_title'] ?>
							<?= !empty($value['product_discount']) ? '-' . $value['product_discount'] . ' %' : "" ?>
						</a>
				</h2>
			</article>
		<?php endforeach; ?>
	</div>
	<div>
		--
		<?php

		echo LinkPager::widget([
			'pagination' => $pagination
		]);

		?>
		**
	</div>
</div>

<div class="container main catalog_wrapper row">
	<div class="col-sm-4 col-md-4 col-lg-4">
		<form class="list_sidebar" action="">
			<div class="column">
				<div class="filter">
					<a class="search_param" data-toggle="collapse" href="#collapseSearch" aria-expanded="true" aria-controls="collapseExample">
						<i class="fa fa-angle-up" aria-hidden="true"></i> Поиск
					</a>
					<div class="collapse in" id="collapseSearch">
						<div class="well">
							<input class="form-control" autocomplete="off">
						</div>
					</div>
				</div>
				<div class="filter">
					<a class="search_param" data-toggle="collapse" href="#collapsePrice" aria-expanded="true" aria-controls="collapseExample">
						<i class="fa fa-angle-up" aria-hidden="true"></i> Цена
					</a>
					<div class="collapse in" id="collapsePrice">
						<div class="well">
							<input class="form-control price_range" autocomplete="off" placeholder="От 0">
							<input class="form-control price_range" autocomplete="off" placeholder="До 9999">
						</div>
					</div>
				</div>
				<div class="filter">
					<a class="search_param" data-toggle="collapse" href="#collapseActivate" aria-expanded="true" aria-controls="collapseExample">
						<i class="fa fa-angle-up" aria-hidden="true"></i> Активация
					</a>
					<div class="collapse in" id="collapseActivate">
						<div class="well">
							<input type="checkbox" class="check" id="steam">
							<label for="steam" class="label_check"><img src="images/steamlogo.png"> Steam</label>
							<input  type="checkbox" class="check" id="origin">
							<label for="origin" class="label_check"><img src="images/Origin.png"> Origin</label>
							<input type="checkbox" class="check" id="uplay">
							<label for="uplay" class="label_check"><img src="images/uplay.png"> Uplay</label>
							<input type="checkbox" class="check" id="battle">
							<label for="battle" class="label_check"><img src="images/battlenet.png"> Battle.net</label>
						</div>
					</div>
				</div>
				<div class="filter">
					<a class="search_param" data-toggle="collapse" href="#collapseRus" aria-expanded="true" aria-controls="collapseExample">
						<i class="fa fa-angle-up" aria-hidden="true"></i> Наличие русского языка
					</a>
					<div class="collapse in" id="collapseRus">
						<div class="well">
							<input type="checkbox" class="check" id="rus">
							<label for="rus" class="label_check"> Есть</label>
							<input type="checkbox" class="check" id="no_rus">
							<label for="no_rus" class="label_check"> Нет</label>
						</div>
					</div>
				</div>
				<div class="filter">
					<a class="search_param" data-toggle="collapse" href="#collapseGenre" aria-expanded="true" aria-controls="collapseExample">
						<i class="fa fa-angle-up" aria-hidden="true"></i> Жанры
					</a>
					<div class="collapse in" id="collapseGenre">
						<div class="well row">
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<input type="checkbox" class="check" id="shoot">
								<label for="shoot" class="label_check"> Шутер</label>
								<input type="checkbox" class="check" id="action">
								<label for="action" class="label_check"> Экшен</label>
								<input type="checkbox" class="check" id="ride">
								<label for="ride" class="label_check"> Гонки</label>
								<input type="checkbox" class="check" id="adventure">
								<label for="adventure" class="label_check"> Приклю&shy;чения</label>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<input type="checkbox" class="check" id="rpg">
								<label for="rpg" class="label_check"> РПГ</label>
								<input type="checkbox" class="check" id="horror">
								<label for="horror" class="label_check"> Хоррор</label>
								<input type="checkbox" class="check" id="indi">
								<label for="indi" class="label_check"> Инди</label>
								<input type="checkbox" class="check" id="strat">
								<label for="strat" class="label_check"> Стратегия</label>
							</div>
						</div>
					</div>
				</div>
				<div class="filter" style="position: relative">
					<a class="search_param" data-toggle="collapse" href="#collapseDate" aria-expanded="true" aria-controls="collapseExample">
						<i class="fa fa-angle-up" aria-hidden="true"></i> Дата выхода
					</a>
					<div class="collapse in" id="collapseDate">
						<div class="well">
							<div class="drop_scroll">
								<button type="button" id="btn_start" class="btn filter_btn filter_year">1990 <i class="fa fa-angle-down" aria-hidden="true"></i></button>
								<ul id="start" class="hover-menu years_begin scroll-pane">
									<a href=""><li>1990</li></a>
									<a href=""><li>2000</li></a>
									<a href=""><li>2001</li></a>
									<a href=""><li>2002</li></a>
									<a href=""><li>2017</li></a>
									<a href=""><li>2018</li></a>
								</ul>
							</div>
							<div class="drop_scroll">
								<button type="button" id="btn_end" class="btn filter_btn filter_year">1990 <i class="fa fa-angle-down" aria-hidden="true"></i></button>
								<ul id="end" class="hover-menu years_end scroll-pane">
									<a href=""><li>2000</li></a>
									<a href=""><li>2001</li></a>
									<a href=""><li>2002</li></a>
									<a href=""><li>2016</li></a>
									<a href=""><li>2017</li></a>
									<a href=""><li>2018</li></a>
								</ul>
							</div>
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
				</div>
				<span class="reset">Сброс фильтров</span>
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
						<span class="sort_type">Популярности </span><span class="caret"></span>
					</a>
				<ul class="dropdown-menu">
					<a class="sort_item" href=""><li>Цене, сначала недорогие</li></a>
					<a class="sort_item" href=""><li>Цене, сначала дорогие</li></a>
					<a class="sort_item" href=""><li>Популярности</li></a>
					<a class="sort_item" href=""><li>Названию</li></a>
					<a class="sort_item" href=""><li>Дате выхода, сначала новые</li></a>
					<a class="sort_item" href=""><li>Дате выхода, сначала старые</li></a>
				</ul>
			</span>
					<i id="list" class="fa fa-list-ul active_state" aria-hidden="true"></i>
					<i id="net" class="fa fa-th-large" aria-hidden="true"></i>
				</div>
			</div>
			<a href="#">
				<div class="result_main" data-view="true">
					<div class="preview main_search pull-left">
						<img src="images/GTA5_178x83.png" class="img-responsive">
					</div>
					<div class="item_name pull-left">
						<p>Grand Theft Auto V + GTA: Online</p>
					</div>
					<div class="item_price pull-right">
						<span>1699</span> <span class="valuta">руб</span> <span class="discount">-30%</span>
					</div>
				</div>
			</a>
			<hr>
			<a href="#">
				<div class="result_main" data-view="true">
					<div class="preview main_search pull-left">
						<img src="images/GTA4_110x52.png" class="img-responsive">
					</div>
					<div class="item_name pull-left">
						<p>Grand Theft Auto 4</p>
					</div>
					<div class="item_price pull-right">
						<span>249</span> <span class="valuta">руб</span><span class="discount">-50%</span>
					</div>
				</div>
			</a>
			<hr>
			<a href="#">
				<div class="result_main" data-view="true">
					<div class="preview main_search pull-left">
						<img src="images/prey_110x52.png" class="img-responsive">
					</div>
					<div class="item_name pull-left">
						<p>Prey</p>
					</div>
					<div class="item_price pull-right">
						<span>1100</span> <span class="valuta">руб</span><span class="discount">-20%</span>
					</div>
				</div>
			</a>
			<hr>
			<a href="#">
				<div class="result_main" data-view="true">
					<div class="preview main_search pull-left">
						<img src="images/skyrim_110x52.png" class="img-responsive">
					</div>
					<div class="item_name pull-left">
						<p>The Elder Scrolls V: Skyrim – Legendary Edition</p>
					</div>
					<div class="item_price pull-right">
						<span>499</span> <span class="valuta">руб</span>
					</div>
				</div>
			</a>
			<hr>
			<a href="#">
				<div class="result_main" data-view="true">
					<div class="preview main_search pull-left">
						<img src="images/GTA5_110x52.png" class="img-responsive">
					</div>
					<div class="item_name pull-left">
						<p>Grand Theft Auto V + GTA: Online</p>
					</div>
					<div class="item_price pull-right">
						<span>1699</span> <span class="valuta">руб</span>
					</div>
				</div>
			</a>
			<hr>
			<a href="#">
				<div class="result_main" data-view="true">
					<div class="preview main_search pull-left">
						<img src="images/GTA4_110x52.png" class="img-responsive">
					</div>
					<div class="item_name pull-left">
						<p>Grand Theft Auto 4</p>
					</div>
					<div class="item_price pull-right">
						<span>249</span> <span class="valuta">руб</span>
					</div>
				</div>
			</a>
			<hr>
			<a href="#">
				<div class="result_main" data-view="true">
					<div class="preview main_search pull-left">
						<img src="images/prey_110x52.png" class="img-responsive">
					</div>
					<div class="item_name pull-left">
						<p>Prey</p>
					</div>
					<div class="item_price pull-right">
						<span>1100</span> <span class="valuta">руб</span>
					</div>
				</div>
			</a>
			<hr>
			<a href="#">
				<div class="result_main" data-view="true">
					<div class="preview main_search pull-left">
						<img src="images/skyrim_178x83.png" class="img-responsive">
					</div>
					<div class="item_name pull-left">
						<p>The Elder Scrolls V: Skyrim – Legendary Edition</p>
					</div>
					<div class="item_price pull-right">
						<span>499</span> <span class="valuta">руб</span>
					</div>
				</div>
			</a>
		</div>
		<nav aria-label="Page navigation" class="page_nav">
			<ul class="pagination">
				<li>
					<a href="#" aria-label="Previous">
						<span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
					</a>
				</li>
				<li><a href="#" class="active_page">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li>
					<a href="#" aria-label="Next">
						<span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>