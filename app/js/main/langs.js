// $(document).ready(function() {
//  var langs = $('header').find('.langs');
//  // var lang  = langs.children('.lang');
//
//  langs.click(function() {
//    langs.toggleClass('active');
//  });
// });

// Togle currency

var currency = $( '.currency-switcher' );
var langs = $('header').find('.langs');
var langs_mobile = $('#mobile_menu').find('.langs');

langs.on('click', remove);
currency.on('click', remove);
langs_mobile.on('click', remove);

function remove(e) {

  var arrow = currency.find('img:eq(1)');
  var arrow_langs = langs.find('img:eq(1)');
  var arrow_langs_mobile = langs_mobile.find('img');

  var $this = $(this);

  var arrowUp      = 'img/ico/micro_arrow_up.png',
      arrowDownPng = 'img/ico/micro_arrow_down.png',
      arrowDownSvg = 'img/ico/micro_arrow_down.svg';

  if ($this.hasClass('langs')) {
      $this.parent().hasClass('mobile_header') 
        ? $this.toggleClass('active_mobile') 
        : $this.toggleClass('active');

      if ($this.hasClass('active')) {
        arrow_langs.attr('src', arrowUp);
      } else if (!$this.hasClass('active')) {
          arrow_langs.attr('src', arrowDownPng);
      } else if($this.hasClass('active_mobile')) {
        arrow_langs_mobile.attr('src', arrowUp);
      } else if(!$this.hasClass('active_mobile')) {
          arrow_langs_mobile.attr('src', arrowDownPng);
      } else {
        arrow_langs.attr('src', arrowDownPng);
      }

  } else if ($this.hasClass('currency-switcher')) {
      $this.toggleClass( 'opened-currency' );

      if ($this.hasClass('opened-currency')) {
        arrow.attr('src', arrowUp);
      } else {
        arrow.attr('src', arrowDownSvg);
      }
  }

  var this_div = e.target.parentElement;
  var first_div = $this.children().first();

  if (first_div !== this_div
      && !this_div.classList.contains('currency-switcher')
      && !this_div.classList.contains('total-price')
      && !this_div.classList.contains('prices-table')
      && !this_div.classList.contains('right-col')
      && !this_div.classList.contains('langs')
      && !this_div.classList.contains('mobile_header'))
    {
       first_div.before(this_div);
    };
};

// Code for the arrow of the mobile menu!
var mobile_menu = $('.mobile_menu');
var useful      = mobile_menu.find('.useful');

useful.on('click', openMenu);

function openMenu() {
  $this     = $(this);
  var arrow = $this.find('img');

  $this.toggleClass('opened_menu');

  if ($this.hasClass('opened_menu')) {
      arrow.attr('src', arrowUp);
  } else {
      arrow.attr('src', arrowDownSvg);
  }
}

// Code for the burger!
var burger             = $('.burger');
var mobile_menu_parent = $('#mobile_menu');
var mobile_shadow      = $('.mobile_shadow');

burger.on('click', function() {
  mobile_menu_parent.addClass('show_menu');
  mobile_shadow.addClass('show_shadow');
})
  mobile_shadow.on('click', function() {
  mobile_menu_parent.removeClass('show_menu');
  mobile_shadow.removeClass('show_shadow');
})

// Change the page code!
var anchor = mobile_menu_parent.find('a');

anchor.on('click', function(e) {
    var $this = $(this);
    e.preventDefault();

    setTimeout(function() {
      window.location.href = $this.attr('href');
    },300)

    mobile_menu_parent.removeClass('show_menu');
    mobile_shadow.removeClass('show_shadow');
});

// Hover img!
var cat_mobile_img = $('.cat_mobile img');

cat_mobile_img.on('mouseenter', function() {
  cat_mobile_img.attr('src', 'img/cat_happy.svg')
  $('.cat_mobile').addClass('happy');
});

cat_mobile_img.on('mouseleave', function() {
  cat_mobile_img.attr('src', 'img/cat_sad.svg')
  $('.cat_mobile').removeClass('happy');
});