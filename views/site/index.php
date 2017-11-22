<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

use app\components\MainSliderGames;
use app\components\MainBannerGames;
use app\components\MainListGames;
use app\components\MainGenreGames;

?>

<div class="container main wrapper">
	<div class="row row-flex">
		<?= MainGenreGames::widget(); ?>
		<?= MainSliderGames::widget(); ?>
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

	<?php

	echo MainBannerGames::widget();

	?>

</div>

<!--Модуль вкладки-->

<?php

echo MainListGames::widget();

?>





