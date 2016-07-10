$(document).ready(function() {
	var menuTrigger = $('.left-col .menu .header, .left-col .menu .collapse');

	menuTrigger.click(function() {
		var menu = $(this).parent();
		menu.toggleClass('collapsed');
	});

	$('body').on('click', '[data-arrow]', function(e) {
		if (e.target.className == 'reload') {
			return;
		}

		var arrow  = $(this).attr('data-arrow');
		var target = $('[data-target="' + arrow + '"]');
		var img    = $(this).find('img').eq(0);
		var src    = img.attr('src');
		var closed = $('.trigger').attr('data-arrow');
		if (src.indexOf('plus') === -1) {
			var minus = src.replace('minus', 'plus');
			img.attr({src: minus});
		} else {
			var plus = src.replace('plus', 'minus');
			img.attr({src: plus});
		}

		target.toggle();
	});



	// This is code for brief button
	  var brief = $( '.inputfile' );
		Array.prototype.forEach.call( brief, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
	{
			var fileName = '';
			if( this.files && this.files.length >= 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );

			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});
	});


});


/// date picker

//this is code for datepicker

		var date_input = $('.datepicker');
		$('.logo_date').on('click', function () {
			date_input.datepicker('show')
		})

var rus = {
		monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь' ],
		monthNamesShort: ['Январь','Февраль','Март','Апрель','Май','Июнь', 'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
		dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
		firstDay: 1,
		changeYear: true,
		changeMonth: true
};

var ua = {
		monthNames: ['Січень', 'Грудень', 'Березень', 'Квітень','Травень', 'Червень', 'Липень', 'Серпень', 'Вересень','Жовтень', 'Листопад', 'Грудень'],
		monthNamesShort: ['Січень', 'Грудень', 'Березень', 'Квітень','Травень', 'Червень', 'Липень', 'Серпень', 'Вересень','Жовтень', 'Листопад', 'Грудень'],
		dayNamesMin: ['Нд','Пн','Вт','Ср','Чт','Пт','Сб'],
		firstDay: 1,
		changeYear: true,
		changeMonth: true
};

		var langs_header = $('header').find('.langs');
		langs_header.on('click', changeDate);

		function changeDate(e) {
			var lang = e.target.parentElement.getAttribute('data-lang');
			if (lang === 'ua') {
				date_input.datepicker(ua);
			} else if (lang === 'ru') {
				date_input.datepicker(rus);
			}
		}
