$(function() {
  $('[data-js="btn--burger"]').on('click', function(e) {
    e.preventDefault();
    $('[data-js="header"]').toggleClass('active');
    $('[data-js="logo"] img').toggleClass('logo__visible');
  });
  
  $('[data-js="main-nav"] > ul > li').each(function(index) {
    if($(this).find('ul').length > 0) $(this).append('<span class="arr arr--down"></span>');
    $('[data-js="main-nav"] > ul > li > .arr--down').on('click', function() {
      $(this).parent().toggleClass('open');
    });
  });

  $('[data-js="filter"]').on('click', function(e) {
    e.preventDefault();
    $(this).toggleClass('opened');
  });

  $('[data-js="filter"] ul li a').on('click', function(e) {
    e.preventDefault();
    $(this).parent().parent().parent().find('.current').text($(this).text());
  });

  $('[data-js="product-page-nav"] ul li a').on('click', function(e) {
    e.preventDefault();
    if($(this).parent().hasClass('active')) {
      $('[data-js="product-page-nav"] ul li').removeClass('active');
      $('.flyouts').slideUp(300);
      $('.flyouts #'+target).fadeOut(300);
    } else {
      var target = $(this).attr('data-target');
      $('[data-js="product-page-nav"] ul li').removeClass('active');
      $(this).parent().toggleClass('active');
      $('.flyouts .inf-window').hide();
      $('.flyouts').slideDown(300);
      $('.flyouts #'+target).fadeIn(300);
    }
  });

  var mainSliderParams = {
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    arrows: false,
    dots: false,
    autoplay: true,
    autoplaySpeed: 8000,
    fade: true,
    speed: 600
  }
  
  var productsSliderParams = {
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    arrows: true,
    dots: true,
    autoplay: true,
    variableWidth: true,
    autoplaySpeed: 5000,
    asNavFor: '[data-js="our-products__desc-slider"]'
  }

  var productsDescSliderParams = {
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    arrows: false,
    dots: false,
    autoplay: false,
    swipe: false,
    draggable: false
  }

  $('[data-js="main-slider"]').slick(mainSliderParams);
  $('[data-js="our-products__slider"]').slick(productsSliderParams);
  $('[data-js="our-products__desc-slider"]').slick(productsDescSliderParams);

  AOS.init();
});