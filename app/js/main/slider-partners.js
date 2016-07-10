$(document).ready(function() {

	var animation = 0;
	var duration  = 500;

	$(document).on('click', '.partners-slider .right-arrow', function() {

		if (animation === 1) {
			return;
		}

		animation = 1;

		var screen   = $(window).width();
		var quantity = 15;
		var wrapper  = $('.partners-slider .container');
		var width    = $('.partners-slider .container img').outerWidth(true) * 5;

		if (screen < 945) {
			quantity = 3;
			width   /= 5;
		}

		var img = $('.partners-slider .container img:lt(' + quantity + ')');

		wrapper.animate({marginLeft: -width}, duration);

		setTimeout(function() {

			img.clone().appendTo(wrapper);
			img.remove();

			wrapper.css({marginLeft: 0});
			animation = 0;

		}, duration + 100);
	});

	$(document).on('click', '.partners-slider .left-arrow', function() {

		if (animation === 1) {
			return;
		}

		animation = 1;

		var screen   = $(window).width();
		var quantity = -16;
		var wrapper  = $('.partners-slider .container');
		var width    = $('.partners-slider .container img').outerWidth(true) * 5;

		if (screen < 945) {
			quantity = -4;
			width   /= 5;
		}

		var img = $('.partners-slider .container img:gt(' + quantity + ')');

		wrapper.css({marginLeft: -width});

		img.clone().prependTo(wrapper);
		img.remove();

		wrapper.animate({marginLeft: 0}, duration);

		setTimeout(function() {
			animation = 0;
		}, duration + 100);
	});
});