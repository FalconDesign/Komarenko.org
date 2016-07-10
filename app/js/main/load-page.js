$(document).ready(function() {

	// var page = $('.page-wrapper > .right-col > .wrapper');

	// $(document).on('click', 'a.page', function(e) {

	// 	e.preventDefault();

	// 	var link     = $(this);
	// 	var pageName = link.attr('data-page');

	// 	History.pushState({
	// 		pageName: pageName
	// 	}, null, link.attr('href'));
	// });

	// if (History.getCurrentIndex() === 0) {
	// 	 History.Adapter.trigger(window, 'statechange');
	// }

	// History.Adapter.bind(window, 'statechange', function() {
	// 	var state    = History.getState();
	// 	var pageName = state.data.pageName || 'home';

	// 	loadPage(pageName);
	// });

	// function loadPage(pageName) {
	// 	page.empty();
	// 	page.addClass('loading');

	// 	$.ajax({
	// 		type: 'GET',
	// 		url: 'pages/' + pageName + '.php', // maybe .html
	// 		success: function (response) {
	// 			page.removeClass('loading');
	// 			page.html(response);

	// 			var btns = $('nav.menu a.btn');
	// 			var btn  = $('nav.menu a.btn[data-page="' + pageName + '"]');

	// 			$.each(btns, function() {
	// 				$(this).removeClass('active');
	// 			});

	// 			btn.addClass('active');

	// 			runScripts(pageName);
	// 		},
	// 		error: function() {
	// 			page.removeClass('loading');
	// 			page.addClass('error');
	// 		}
	// 	});
	// }

	// function runScripts(pageName) {
	// 	switch(pageName) {
	// 		case 'home':
	// 			runPartnersSlider();
	// 			runNewsSlider();
	// 			break;
	// 		case 'contacts':
	// 			runMaps();
	// 			break;
	// 	}
	// }

	highligthBtn();

	function highligthBtn() {
		var uri      = parseUri(window.location.search);
		var pageName = uri.queryKey.page || 'home';

		$('.menu').children('[data-page="' + pageName + '"]').addClass('active');
	}
});