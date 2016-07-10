$(document).ready(function() {

	var wrapper = $('#map');

	if (wrapper.length === 0) {
		return;
	}

	ymaps.ready(function() {
		var myMap = new ymaps.Map('map', {
				center: [50.328885, 30.292027],
				zoom: 16,
				controls: ['smallMapDefaultSet']
			}, {
				searchControlProvider: 'yandex#search'
			}),
			myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
				hintContent: 'Команда копирайтеров Комаренко'
			});

		myMap.behaviors.disable('scrollZoom');
		// myMap.behaviors.disable('drag');

		myMap.geoObjects.add(myPlacemark);
	});
});