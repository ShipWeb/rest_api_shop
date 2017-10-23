<div class="container main cart_detail">
	<?php if (!empty($product)) { ?>
	<h3 id="ordering">Выбранные товары</h3>
	<div class="goods_head">
		<a href="#">
			<div class="result_main order">
				<div class="preview_cart main_search pull-left">

					<?php if (!empty($product['product_thumbnail_path']) and !empty($product['product_thumbnail_name'])) { ?>


							<img class="img-responsive" src="<?= Yii::$app->homeUrl . $product['product_thumbnail_path'] . '/' . $product['product_thumbnail_name'] ?>">


					<?php } else { ?>

							<img class="img-responsive" src="<?= Yii::$app->homeUrl . 'images/thumbnails/1.jpg' ?>">

					<?php } ?>

				</div>
				<div class="item_name cart_name pull-left">
					<p><?=$product['product_title']?></p>
				</div>
				<div class="item_price cart_price pull-right">
					<span><?=$product['final_product_price']?></span> <span class="valuta"><?=$active_currency['currency_title']?></span>
					<?php if (!empty($product['product_discount'])) { ?>
							<span class="discount">
								-<?= $product['product_discount'] ?> %
							</span>
					<?php } ?>
				</div>
			</div>
		</a>
	</div>
	<h3 id="pay">Способ оплаты</h3>
	<div class="goods_head">
		<div class="row oplata">
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
				<div class="payment_item" data-curr="WMR">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<img src="images/WMZ.png">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pay_info">
						<span class="type">WebMoney</span>
						<span>Комиссия 0%</span>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
				<div class="payment_item" data-curr="RCC">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<img src="images/RCC.png">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pay_info">
						<span class="type">VISA/MasterCard</span>
						<span>Комиссия 0%</span>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
				<div class="payment_item" data-curr="QSR">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<img src="images/QSR.png">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pay_info">
						<span class="type">QIWI</span>
						<span>Комиссия 3%</span>
					</div>
				</div>

			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
				<div class="payment_item" data-curr="PCR">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<img src="images/PCR.png">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pay_info">
						<span class="type">Яндекс.Деньги</span>
						<span>Комиссия 3%</span>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
				<div class="payment_item" data-curr="BNK">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<img src="images/SB.png">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pay_info">
						<span class="type">Сбербанк Онлайн</span>
						<span>Комиссия 0%</span>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
				<div class="payment_item" data-curr="BNK">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<img src="images/payment-6.png">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pay_info">
						<span class="type">Интернет банкинг</span>
						<span>Комиссия 0%</span>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
				<div class="payment_item" data-curr="BLN">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<img src="images/BLN.png">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pay_info">
						<span class="type">Билайн</span>
						<span>Комиссия ~ 19%</span>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
				<div class="payment_item" data-curr="MTS">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<img src="images/MTS.png">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pay_info">
						<span class="type">МТС</span>
						<span>Комиссия ~ 12%</span>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
				<div class="payment_item" data-curr="RUB">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<img src="images/RUB.png">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pay_info">
						<span class="type">Терминал оплаты</span>
						<span>Комиссия 0%</span>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
				<div class="payment_item" data-curr="PRR">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<img src="images/PRR.png">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pay_info">
						<span class="type">Почта России</span>
						<span>Комиссия 0%</span>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
				<div class="payment_item" data-curr="PPZ">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<img src="images/PPZ.png">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pay_info">
						<span class="type">WM-карта</span>
						<span>Комиссия 0%</span>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
				<div class="payment_item" data-curr="BTC">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<img src="images/BTC.png">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pay_info">
						<span class="type">Bitcoin</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<h3 id="confirm">Подтверждение заказа</h3>
	<div class="goods_head">
		<form name="zakaz" action="">
			<div class="order_confirm">
				<div class="email_wrapper">
					<input type="email" id="email" placeholder="Введите E-mail">
				</div>
				<input type="checkbox" class="check" id="agreement">
				<label for="agreement" class="label_check label_agr"></label>
				<p>Я ознакомлен с <a href="#modal-window" data-toggle="modal">пользовательским соглашением</a> и
					описанием товара и уведомлен, что товар предназначен для активации: <b>Армения, Азер&shy;байджан,
						Рес&shy;публика Беларусь, Грузия, Киргизстан, Казах&shy;стан, Респуб&shy;лика Молдова, Таджи&shy;кистан,
						Туркме&shy;нистан, Узбеки&shy;стан, Украина, Россия.</b> В описании каждого товара могут быть
					внесены дополни&shy;тельные региональные ограничения.</p>
				<div class="button_submit">
					<button class="subm" onclick="submit">Перейти к оплате</button>
				</div>
				<span>Товар доступен после оплаты в <a href="#">личном кабинете</a></span>
				<div id="modal-window" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Пользовательское соглашение</h4>
							</div>
							<div class="modal-body">
								<h5>Термины и определения</h5>
								<p>Заказ - запрос Покупателя на получение Товара, оформленный в соответствии с
									требованиями Сайта.
								</p>
								<p>Покупатель - физическое лицо, либо оформляющее Заказы на сайте, либо использующее
									приобретенные на сайте Товары. </p>
								<p>Товар - лицензионный электронный ключ программного продукта.
								</p>
								<p>Продавец - SteamGamer (steamgamer.ru)
								</p>
								<h5>1. Общие положения</h5>
								<p>1.1. Продавец является владельцем Сайта, осуществляющим его администрирование.

								<p>1.2. При оформлении Заказа, Покупатель принимает Условия продажи Товара (далее - Условия), которые в соответствии со ст. 435 и ч. 2 ст. 437 Гражданского Кодекса РФ являются публичной офертой.</p>

								<p>1.3. Отношения между Покупателем и Продавцом регламентируются Законом РФ «О защите прав потребителей» от 07.02.1992 № 2300-1, а также ГК РФ и другими правовыми актами Российской Федерации.</p>

								<p>1.4. Покупатель соглашается с Условиями нажатием кнопки «Перейти к оплате» на последнем этапе оформления Заказа на сайте.</p>

									<p>1.5. Сайт оказывает услуги только на территории РФ и стран СНГ, при этом все Товары имеют региональные ограничения и предназначены для активации на территории РФ, Украины и стран СНГ.
								</p>
								<h5>2. Порядок оформления Заказа и доставка Товара</h5>
								<p>2.1. При оформлении Заказа Покупатель должен указать электронный адрес, на который будет доставлен Товар.</p>

								<p>2.2. Доставка Товара осуществляется сразу же после оплаты, с помощью сервиса Oplata.Info.</p>

									<p>2.3. Любая информация, представленная на сайте, носит справочный характер. Для уточнения свойств и характеристик Товара, Покупатель должен обратиться к Продавцу.
								</p>
								<h5>2.4. Оформление предзаказа.</h5>
								<p>2.4.1. Продавец может предлагать лицензионный электронный ключ еще не поступившего в продажу программного продукта. Такой Товар оформляется как предзаказ.</p>


									<p>2.4.2. На сайте указывается срок поступления в продажу программного продукта. Указанный срок, цена Товара и другие информационные материалы могут быть изменены на основании информации, полученной от разработчика данного программного продукта.</p>
								<h5>3. Оплата Товара</h5>
								<p>3.1. Цена Товара указана на сайте и может быть изменена продавцом в одностороннем порядке.</p>

								<p>3.2. Действующая цена указывается на последнем этапе оформления Заказа. После нажатия кнопки «Перейти к оплате», цена не может быть изменена Продавцом.</p>

									<p>3.3. Покупатель может выбрать любой способ оплаты из доступных при оформлении Заказа.</p>
								<h5>3.4. Оплата банковскими картами</h5>
								<p>3.4.1. Оплата банковской картой может осуществляться только ее владельцем, на основании положения ЦБ РФ «Об эмиссии банковских карт и об операциях, совершаемых с использованием платежных карт» от 24.12.2004 №266-П.</p>

								<p>3.4.2. Банк вправе отказать в осуществлении операции, если у него есть основания классифицировать данную операцию как подпадающую под действие статьи 159 УК РФ - мошенничество.</p>

									<p>3.4.3. Продавец имеет право отменить Заказ без объяснения причины. В этом случае стоимость Товара возвращается на банковскую карту, с которой производилась оплата.</p>
								<h5>4. Возврат и обмен Товара</h5>
								<p>4.1. Товар, приобретенный Покупателем, не подлежит возврату или обмену, в случае если товар был получен.
								</p>
								<h5>5. Авторское право</h5>
<p>5.1. Соблюдать авторские права, установленные законодательством РФ и СНГ. Использовать Товар только в личных некоммерческих целях.</p>
								<h5>6. Права и обязанности сторон</h5>
								<p>6.1. Продавец имеет право переуступать и/или передавать свои права и обязанности, вытекающие из его отношений с Покупателем, третьим лицам.</p>

								<p>6.2. Продавец может менять скидки и бонусы, а также правила их начисления и условия получения в одностороннем порядке.</p>

								<p>6.3. Клиент обязуется использовать приобретенный Товар исключительно для личных, домашних, семейных целей, а также целей, не связанных с осуществлением коммерческой деятельности.</p>

									<p>6.4. Магазин отвечает за работоспособность ключа активации. За технические проблемы игры отвечает издатель или разработчик. </p>
								<h5>7. Конфиденциальность</h5>
								<p>7.1. Любая персональная информация, полученная Покупателем и Продавцом с помощью Сайта, является конфиденциальной.</p>

								<p>7.2. Стороны обязуются соблюдать законодательство РФ и не разглашать конфиденциальную информацию третьим лицам.</p>

									<p>7.3. Для выполнения своих обязательств по продаже Товара, Продавец собирает следующую информацию о Покупателе:
									- личную информацию, которую Покупатель сознательно предоставил Продавцу;
										- техническую информацию, собираемую программным обеспечением Продавца во время посещения Сайта Покупателем.</p>

								<p>7.4. Пользователь дает Продавцу разрешение на сбор, обработку и хранение своих персональных данных.</p>

									<p>7.5. Продавец никогда и никому не предоставляет персональную информацию Покупателя, кроме случаев, предусмотренных законодательством РФ.
								</p>
								<h5>8. Комментарии</h5>
								<p>8.1. Запрещено оскорблять и выражать какое-либо другое неуважение к пользователям сайта и сотрудникам магазина.</p>
									<p>8.2. Запрещаются ссылки на любые другие магазины.</p>
							</div>
							<div class="modal-footer">
								<button type="button btn" class="close" data-dismiss="modal" aria-hidden="true">Закрыть</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<?php } else { ?>
	<h3 id="ordering">В данный момент товар в корзине отсутствует</h3>
	<?php } ?>
</div>
