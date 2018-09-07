$(function() {
  $('[data-js="btn--burger"]').on('click', function(e) {
    e.preventDefault();
    $('[data-js="header"]').toggleClass('active');
    $('[data-js="logo"] img').toggleClass('logo__visible');
  });
  
  $('[data-js="main-nav"] > ul > li').each(function(index) {
    if($(this).find('ul').length > 0) $(this).append('<span class="arr arr--down"></span>');
    $('[data-js="main-nav"] > ul > li').on('click', function(e) {
      if($(this).find('.arr--down').length > 0) {
        e.preventDefault();
        $(this).toggleClass('open');
      }
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

  $('[data-js="panel__title"]').on('click', function(e) {
    e.preventDefault();
    $(this).parent().toggleClass('active').find('.panel__body').slideToggle(300);
  });

  var mainSliderParams = {
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    arrows: false,
    dots: false,
    autoplay: false,
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
    autoplay: false,
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

  $('[data-js="recipe-teaser-thumbnail"]').each(function() {
    if($(this).find('img').length > 0) {
      var imgUrl = $(this).find('img').attr('src');
      $(this).find('img').css('opacity', '0');
      $(this).css({
        'background-image': 'url(' + imgUrl + ')'
      });
    }
  });

  AOS.init();
});