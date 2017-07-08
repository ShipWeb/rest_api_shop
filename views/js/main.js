$("document").ready(function () {

	var usd = '<i class="fa fa-usd del" aria-hidden="true"></i>';
	var rub = '<i class="fa fa-rub del" aria-hidden="true"></i>';
	var uah = '<i class="uah del">₴</i>';

	$('#usd').click(function () {
		$(".del").detach();
		$("#currency").before(usd);
		$(".valuta").html(usd);
	});
	$('#rub').click(function () {
		$(".del").detach();
		$("#currency").before(rub);
		$(".valuta").html('руб');
	});
	$('#uah').click(function () {
		$(".del").detach();
		$("#currency").before(uah);
		$(".valuta").html('₴');
	});
	$('#search').click(function () {
		$('.live_search').toggleClass('display')
	});

	$('.search_param').click(function () {
		$(this).children('i').toggleClass('rotate')
	});

	var screen_size = $(document).width();
	if (screen_size < 767) {
		$('.filter>div').removeClass('in');
		$('.fa.fa-angle-up').removeClass('rotate');
	}

	$(window).resize(function () {
		var screen_size = $(document).width();
		if (screen_size < 767) {
			$('.filter>div').removeClass('in');
			$('.fa.fa-angle-up').removeClass('rotate');
		}
	});

});


