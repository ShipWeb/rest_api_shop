<h1><?=$product->product_title?></h1>

<?=$product->content?>

<div class="container main product_card">
	<div class="row goods_head">
		<div class="col-sm-6 col-md-6 col-lg-6">
			<ol class="breadcrumb">
				<li><a href="#">Главная</a></li>
				<li><a href="#">Каталог</a></li>
				<li class="active">Игры</li>
			</ol>
			<h2>Купить Prey</h2>
			<img src="<?= Yii::$app->homeUrl ?>images/Prey_500x250.jpg" alt="Prey" class="img-responsive header_pic">
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3">
			<ul class="game_info">
				<li>
					<span>Жанр:</span>
					<a href="#">Экшен</a>,
					<a href="#">Приключения</a>
				</li>
				<li><span>Издатель:</span> Bethesda Softworks</li>
				<li><span>Дата выхода:</span> 5 мая 2017</li>
				<li><span>Язык:</span> Русский</li>
				<li><span>Активация:</span> <img src="<?= Yii::$app->homeUrl ?>images/steamlogo.png" id="logo_brand"> Steam</li>
			</ul>
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 header_right">
			<div class="price_info">
				<div class="header_price">
					<span id="price">1999 </span><span class="valuta">руб</span>
					<div class="header_discount pull-right">
						<span>-50%</span>
					</div>
				</div>

				<button class="buy">Купить</button>
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
							<p>Действие Prey происходит в 2032 году. Вы обнаруживаете себя на лунной орбите, на борту
								космической станции «Талос-1». Эксперимент, в котором вы участвовали, должен был
								навсегда изменить человеческую расу, но привел к катастрофическим последствиям. Станцию
								захватили враждебные пришельцы, которые теперь ведут на вас охоту. Раскрывая мрачные
								тайны «Талоса» и собственного прошлого, вам предстоит выживать, полагаясь на подручные
								средства, собственную смекалку, оружие и сверхспособности. Судьба «Талоса-1» и всех, кто
								находится на борту, — в ваших руках.</p>
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
								<tr>
									<td>OC:</td>
									<td> Windows 7/8/10 (64-bit versions)</td>
								</tr>
								<tr>
									<td>Процессор:</td>
									<td> Intel i5-2400, AMD FX-8320</td>
								</tr>
								<tr>
									<td>Оперативная Память:</td>
									<td> 8 GB ОЗУ</td>
								</tr>
								<tr>
									<td>Видеокарта:</td>
									<td> GTX 660 2GB, AMD Radeon 7850 2GB</td>
								</tr>
								<tr>
									<td>Жесткий диск:</td>
									<td> 20 ГБ</td>
								</tr>
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
								<ul class="instuction">
									<li>Получите оплаченный ключ активации в личном кабинете.</li>

									<li>Если не установлен Steam клиент, Вам необходимо скачать его с официального
										сайта (<a href="http://store.steampowered.com/about/" target="_blank">http://store.steampowered.com/about/</a>)
										и установить.
									</li>

									<li>Войдите в свой фккаунт Steam (если он у Вас уже есть), либо создайте новую
										учетную запись
									</li>

									<li>В меню «Игры» выбирайте пункт «Активировать через Steam». В открывшееся окошке
										вводите полученный код.
									</li>

									<li>После активации ключа, игра отобразится в библиотеке Steam и вы сможете её
										скачать.
									</li>
								</ul>
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
					<a href="#"><img src="<?= Yii::$app->homeUrl ?>images/prey_banner.jpg" alt="Купить Prey за 999р"></a>
					<a href="#"><img src="<?= Yii::$app->homeUrl ?>images/rust_bunner.jpg" alt="Купить Rust за 295р"></a>
				</div>
				<span class="goods_info">Скриншоты</span>
				<div class="galery">
					<div class="galery_image">
						<a href="<?= Yii::$app->homeUrl ?>images/prey1.jpg" class="fancyimage" data-fancybox-group="group"><img src="<?= Yii::$app->homeUrl ?>images/prey_prev1_155x87.jpg" class="img-responsive"></a>
					</div>
					<div class="galery_image">
						<a href="<?= Yii::$app->homeUrl ?>images/prey2.jpg" class="fancyimage" data-fancybox-group="group"><img src="<?= Yii::$app->homeUrl ?>images/prey_prev2-155x87.jpg" class="img-responsive"></a>
					</div>
					<div class="galery_image">
						<a href="images/prey3.jpg" class="fancyimage" data-fancybox-group="group"><img src="<?= Yii::$app->homeUrl ?>images/prey_prev3-155x87.jpg" class="img-responsive"></a>
					</div>
					<div class="galery_image">
						<a href="<?= Yii::$app->homeUrl ?>images/prey4.jpg" class="fancyimage" data-fancybox-group="group"><img src="<?= Yii::$app->homeUrl ?>images/prey_prev4-155x87.jpg" class="img-responsive"></a>
					</div>
					<div class="galery_image">
						<a href="<?= Yii::$app->homeUrl ?>images/prey5.jpg" class="fancyimage" data-fancybox-group="group"><img src="<?= Yii::$app->homeUrl ?>images/prey_prev5-155x87.jpg" class="img-responsive"></a>
					</div>
					<div class="galery_image">
						<a href="<?= Yii::$app->homeUrl ?>images/prey6.jpg" class="fancyimage" data-fancybox-group="group"><img src="<?= Yii::$app->homeUrl ?>images/prey_prev6-155x87.jpg" class="img-responsive"></a>
					</div>
					<div class="galery_image">
						<a href="<?= Yii::$app->homeUrl ?>images/prey7.jpg" class="fancyimage" data-fancybox-group="group"><img src="<?= Yii::$app->homeUrl ?>images/prey_prev7-155x87.jpg" class="img-responsive"></a>
					</div>
					<div class="galery_image">
						<a href="<?= Yii::$app->homeUrl ?>images/prey8.jpg" class="fancyimage" data-fancybox-group="group"><img src="<?= Yii::$app->homeUrl ?>images/prey_prev8-155x87.jpg" class="img-responsive"></a>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>