<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>


<div class="container main wrapper">
	<div class="row row-flex">
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 aside_menu">
			<!--Боковое меню-->
			<a href="<?= Yii::$app->homeUrl ?>product"><h4>Каталог</h4></a>
			<hr class="hidden-xs">
			<ul class="hidden-xs">
				<a href="#">
					<li>Шутер</li>
				</a>
				<a href="#">
					<li>Экшен</li>
				</a>
				<a href="#">
					<li>Гонки</li>
				</a>
				<a href="#">
					<li>Приключения</li>
				</a>
				<a href="#">
					<li>rpg</li>
				</a>
				<a href="#">
					<li>Стратегия</li>
				</a>
				<a href="#">
					<li>Симулятор</li>
				</a>
				<a href="#">
					<li>Инди</li>
				</a>
				<a href="#">
					<li>Хоррор</li>
				</a>
			</ul>
		</div>
		<div class="col-sm-9 col-md-9 col-lg-9 slider">
			<!--Сдайдер слайды 900х450-->
			<div id="carousel-example-generic" class="carousel fade" data-ride="carousel">

				<!-- Обертка для слайдов -->
				<div class="carousel-inner">
					<!--Слайд 1-->
					<div class="item active">
						<a href="#"><img src="images/Prey.jpg" alt="Prey"></a>
						<div class="carousel-caption">
							<span class="slider_price">1199 <span class="valuta">руб</span></span>
							<span class="slider_discount">-40%</span>
						</div>
					</div>

					<!--Слайд 2-->
					<div class="item">
						<a href="#"><img src="images/far-cry-primal2.jpg" alt="Far Cry Rpimal"></a>
						<div class="carousel-caption">
							<span class="slider_price">1199 <span class="valuta">руб</span></span>
							<span class="slider_discount">-30%</span>
						</div>
					</div>

					<!--Слайд 3-->
					<div class="item">
						<a href="#"><img src="images/evil-within.jpg" alt="Evil Within 2"></a>
						<div class="carousel-caption">
							<span class="slider_price">1599 <span class="valuta">руб</span></span>
							<span class="slider_discount">-20%</span>
						</div>
					</div>
				</div>

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
	<h3>Испытай удачу!</h3>
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 luck luck_silver">
			<img class="img-responsive" src="images/luck_silver.jpg" alt="Испытай удачу Silver">
			<a href="#">
				<div class="silver">
					<h4>Испытай удачу Silver</h4>
					<p>Вы получаете рабочий ключ для активации игры в сервисе Steam. Минимальная цена игры 99руб. Какая
						игра nдостанется вам? Определит случайность.</p>
					<span class="luck_discount pull-right">59 <span class="valuta"><sub>руб</sub></span></span>
					<span class="luck_price pull-right">99 <span class="valuta"><sub>руб</sub></span></span>
				</div>
			</a>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 luck luck_gold">
			<img class="img-responsive" src="images/luck_gold.jpg" alt="Испытай удачу Gold">
			<a href="#">
				<div class="gold">
					<h4>Испытай удачу Gold</h4>
					<p>Вы получаете рабочий ключ для активации игры в сервисе Steam. Минимальная цена игры 149руб. Какая
						игра достанется вам? Определит случайность.</p>
					<span class="luck_discount pull-right">99 <span class="valuta"><sub>руб</sub></span></span>
					<span class="luck_price pull-right">149 <span class="valuta"><sub>руб</sub></span></span>
				</div>
			</a>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 luck luck_diamond">
			<img class="img-responsive" src="images/luck_diamond.jpg" alt="Испытай удачу Diamond">
			<a href="#">
				<div class="diamond">
					<h4>Испытай удачу Diamond</h4>
					<p>Вы получаете рабочий ключ для активации игры в сервисе Steam. Вы гарантированно получаете игру из
						призового фонда! Какая игра достанется вам? Определит случайность.</p>
					<span class="luck_discount pull-right">249 <span class="valuta"><sub>руб</sub></span></span>
					<span class="luck_price pull-right">299 <span class="valuta"><sub>руб</sub></span></span>
				</div>
			</a>
		</div>
	</div>
	<div class="row brands">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg3">
			<img class="img-responsive" src="images/steam_logo_512x_by_garyosavan-da86b2s.png">
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg3 uplay">
			<img class="img-responsive" src="images/Uplay_logo.png">
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg3 origin">
			<img class="img-responsive" src="images/Origin-logo.png">
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg3">
			<img class="img-responsive" src="images/logo-battle-net.png">
		</div>
	</div>
	<div class="cards">
		<!--Размеры карточек: маленькие 295х295, средние 590х295, большая 590х590-->
		<!--Первый ряд карточек-->
		<div class="row">
			<a href="">
				<div class="col-xs-12 col-sm-6 col-md-6 col-sm-push-3 col-lg-6 card">
					<img class="img-responsive" src="images/assasin.jpg">
					<div class="card_hover">
						<h4>Assassin’s Creed IV: Black Flag</h4>
						<span class="slider_price">Купить за 1599 <span class="valuta">руб</span></span>
						<span class="slider_discount">Подробнее</span>
					</div>
				</div>

			</a>
			<a href="">
				<div class="col-xs-6 col-sm-3 col-md-3 col-sm-pull-6 col-lg-3 card">
					<img class="img-responsive" src="images/ghost.jpg">
					<div class="card_hover">
						<h4>Ghost Recon Wildlands</h4>
						<span class="slider_price">Купить за 1199 <span class="valuta">руб</span></span>
						<span class="slider_discount">Подробнее</span>
					</div>
				</div>
			</a>
			<a href="">
				<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 card">
					<img class="img-responsive" src="images/CoD_WW2.jpg">
					<div class="card_hover">
						<h4>Call of Duty: WWII</h4>
						<span class="slider_price">Купить за 999 <span class="valuta">руб</span></span>
						<span class="slider_discount">Подробнее</span>
					</div>
				</div>
			</a>
		</div>

		<!--Второй ряд карточек-->
		<div class="row">
			<a href="">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 card">
					<img class="img-responsive" src="images/fallout.jpg">
				</div>
			</a>
			<a href="">
				<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 card">
					<img class="img-responsive" src="images/wolfenstein-2-trailer.jpg">
				</div>
			</a>
			<a href="">
				<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 card">
					<img class="img-responsive" src="images/metro.jpg">
				</div>
			</a>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-6 col-lg-6">

				<!--Третий ряд карточек-->
				<div class="row">
					<a href="">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 card">
							<img class="img-responsive" src="images/battle.jpg">
						</div>
					</a>
					<a href="">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 card">
							<img class="img-responsive" src="images/mk.jpg">
						</div>
					</a>
				</div>
				<div class="row">
					<a href="">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 card">
							<img class="img-responsive" src="images/PvZ.jpg">
						</div>
					</a>
					<a href="">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 card">
							<img class="img-responsive" src="images/bat.jpg">
						</div>
					</a>
				</div>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6">

				<!--Четвертый ряд карточек-->
				<div class="row">
					<a href="">
						<div class="hidden-xs col-sm-12 col-md-12 col-lg-12 card">
							<img class="img-responsive" src="images/ForHonor.jpg">
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!--Модуль вкладки-->
<div class="container main">
	<div class="modul_tab">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#popular" data-toggle="tab">Популярные</a></li>
			<li><a href="#new" data-toggle="tab">Новинки</a></li>
			<div class="row visible_480"></div>
			<li><a href="#preorder" data-toggle="tab">Предзаказ</a></li>
			<li><a href="#disc" data-toggle="tab">Скидки</a></li>
		</ul>

		<div class="tab-content">
			<!--Первая вкладка-->
			<div class="tab-pane fade in active" id="popular">

				<a href="#">
					<div class="result">
						<div class="preview pull-left">
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
					<div class="result">
						<div class="preview pull-left">
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
					<div class="result">
						<div class="preview pull-left">
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
					<div class="result">
						<div class="preview pull-left">
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

			</div>
			<!--Вторая вкладка-->
			<div class="tab-pane fade" id="new">
				<a href="#">
					<div class="result">
						<div class="preview pull-left">
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
					<div class="result">
						<div class="preview pull-left">
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
					<div class="result">
						<div class="preview pull-left">
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
			</div>

			<!--Третья вкладка-->
			<div class="tab-pane fade" id="preorder">
				<a href="#">
					<div class="result">
						<div class="preview pull-left">
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
					<div class="result">
						<div class="preview pull-left">
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
					<div class="result">
						<div class="preview pull-left">
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

			</div>

			<!--Четвертая вкладка-->
			<div class="tab-pane fade" id="disc">
				<a href="#">
					<div class="result">
						<div class="preview pull-left">
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
					<div class="result">
						<div class="preview pull-left">
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
					<div class="result">
						<div class="preview pull-left">
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
					<div class="result">
						<div class="preview pull-left">
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
			</div>
		</div>
	</div>
</div>




