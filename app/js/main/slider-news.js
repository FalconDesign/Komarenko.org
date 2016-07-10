$(document).ready(function() {

	var animation = 0;
	var duration  = 500;

	$(document).on('click', '.news-slider .right-arrow', function() {

		if (animation === 1) {
			return;
		}

		animation = 1;

		var wrapper = $('.news-slider .container');
		var item    = $('.news-slider .container .item:first-child');
		var width   = $('.news-slider .container .item').outerWidth(true);

		wrapper.animate({marginLeft: -width}, duration);

		setTimeout(function() {

			item.clone().appendTo(wrapper);
			item.remove();

			wrapper.css({marginLeft: 0});
			animation = 0;

		}, duration + 100);
	});

	$(document).on('click', '.news-slider .left-arrow', function() {

		if (animation === 1) {
			return;
		}

		animation = 1;

		var wrapper = $('.news-slider .container');
		var item    = $('.news-slider .container .item:last-child');
		var width   = $('.news-slider .container .item').outerWidth(true);

		wrapper.css({marginLeft: -width});

		item.clone().prependTo(wrapper);
		item.remove();

		wrapper.animate({marginLeft: 0}, duration);

		setTimeout(function() {
			animation = 0;
		}, duration + 100);
	});
});