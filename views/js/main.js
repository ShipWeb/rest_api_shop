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
			$('.fa.fa-angle-up').removeClass("rotate");
		}
	});

	$('.sort_item').click(function () {
		var sortText = $(this).children("li").html();
		$('.sort_type').html(sortText);
		$('#sort_list').removeClass('open');
		return false;
	});

	$('#net').click(function () {
		$('[data-view]').addClass('module_view');
		$('.column hr').addClass('displayNone');
		$('.main_search').removeClass('preview');
		$('.main_search .item_price').removeClass('pull-right');
		$('#list').removeClass('active_state');
		$('#net').addClass('active_state');
	});

	$('#list').click(function () {
		$('[data-view]').removeClass('module_view');
		$('.column hr').removeClass('displayNone');
		$('.main_search').addClass('preview');
		$('.main_search .item_price').addClass('pull-right');
		$('#net').removeClass('active_state');
		$('#list').addClass('active_state');
	});

	$('.pagination').click(function () {
		$('.pagination li a').removeClass('active_page');
		$(this).children("a").addClass('active_page');
	});
});


