$.scrollTop = function (a) {
	a = a || {};
	var t = $('<div class="scroll-top"></div>');
	t.html('<i class="fa fa-chevron-up" aria-hidden="true"></i>');
	$('body').append(t);
	t.css({opacity: 0, bottom:80, right: '5%'}).click(function () {
		$('html,body').animate({scrollTop: 0}, a.scrollDuration || 1000)
	});
	$(document).scroll(function () {
		if ($(document).scrollTop() < 200) {
			t.stop().fadeOut(a.hideDuration || 200);
			return
		}
		t.css({position: 'fixed'}).stop().fadeIn(a.showDuration || 200).animate({opacity: 0.7}, a.showDuration || 200)
	});
	$(document).trigger('scroll')
};
$(document).ready(function () {
	$.scrollTop({scrollDuration: 500, showDuration: 200, hideDuration: 200})
});