"use strict";
$("document").ready(function () {

	$("a.fancyimage").fancybox();

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
		$('.live_search').toggleClass('display');
	})

	$('#search').blur(function () {
		$('.live_search').removeClass('display');
	})

	$('.search_param').click(function () {
		$(this).children('i').toggleClass('rotate');
	})

	$('.goods_info').click(function () {
		if ($(this).children('i').hasClass('fa-plus')) {
			$(this).children('i').replaceWith('<i class="fa fa-minus" aria-hidden="true"></i>');
		} else if ($(this).children('i').hasClass('fa-minus')) {
			$(this).children('i').replaceWith('<i class="fa fa-plus" aria-hidden="true"></i>');
		}

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

			$('[data-view]').addClass('module_view');
			$('.column hr').addClass('displayNone');
			$('.main_search').removeClass('preview');
			$('.main_search .item_price').removeClass('pull-right');
			$('#list').removeClass('active_state');
			$('#net').addClass('active_state');
		}
	});

	$('.sort_item').click(function () {
		var sortText = $(this).children("li").html();
		$('.sort_type').html(sortText);
		$('#sort_list').removeClass('open');
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


	$('#btn_start').click(function () {
		$('#start').toggle();
		// $('#end').hide();
		$('.scroll-pane').jScrollPane();
	});
	$('#btn_start').blur(function () {
		// $('#start').hide();
	});


	$('#btn_end').click(function () {
		$('#end').toggle();
		// $('#start').hide();
		$('.scroll-pane').jScrollPane();
	});

	$('#btn_end').blur(function () {
		// $('#end').hide();
	});

	// $('#start').on('click', 'a', function () {
	// 	alert('fdkghsdlkg');
	// })

	$('.oplata').on('click', 'div', function () {
		$('.payment_item').removeClass('payment_click');
		$(this).children('div.payment_item').toggleClass('payment_click');
	})
});

$(function Validate() {
	$('#email').blur(function () {
		if ($(this).val() != '') {
			var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
			if (pattern.test($(this).val())) {
				$(this).css({'border': '1px solid #569b44'});
				$(this).parent('div').addClass('correct');
			} else {
				$(this).css({'border': '1px solid #ff0000'});
				$('<div class="error">Введен некорректный E-mail</div>').appendTo($(this).parent('div')).fadeIn('fast').effect("shake");
			}
		} else {
			$(this).css({'border': '1px solid #ff0000'});
			$('<div class="error">Вы забыли ввести E-mail</div>').appendTo($(this).parent('div')).fadeIn('fast').effect("shake");
		}
	});

	$('#email').focus(function () {
		$(this).css({'border': ''});
		$(this).parent('div').removeClass('correct');
		$('div.error').remove();
	})
});

$(function () {

	if ($('#agreement').prop('checked') === false) {
		$('.subm').prop('disabled', true).addClass('disable');
	}

	$('#agreement').click(Check);

	$('#email').blur(Check);

	function Check() {
		if ($('#agreement').prop('checked') === false) {
			$('.subm').prop('disabled', true).addClass('disable');
		}
		else if ($('#email').prop('value') == "") {
			$('.subm').prop('disabled', true).addClass('disable');
		}
		else {
			$('.subm').prop('disabled', false).removeClass('disable');
		}
	}

	$('.subm').submit(function () {
		if ($('.error').style.display == 'block'){
			$('#email').focus();
		}
	})


	$('#email').keyup(function () {
		if ($('#agreement').prop('checked') === true) {
			$('.subm').prop('disabled', false).removeClass('disable');
		}
	})
});

function viewProductsList() {
	$('[data-view]').removeClass('module_view');
	$('.column hr').removeClass('displayNone');
	$('.main_search').addClass('preview');
	$('.main_search .item_price').addClass('pull-right');
	$('#net').removeClass('active_state');
	$('#list').addClass('active_state');
}

function viewProductsNet() {
	$('[data-view]').addClass('module_view');
	$('.column hr').addClass('displayNone');
	$('.main_search').removeClass('preview');
	$('.main_search .item_price').removeClass('pull-right');
	$('#list').removeClass('active_state');
	$('#net').addClass('active_state');
}