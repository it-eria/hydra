$(function () {


    $('.choose-elem').click(function () {
        var tid = $(this).data('choose-id-trigger');
        $('.choose-list').hide();
        var $current = $('.choose-list[data-choose-id="' + tid + '"]').show();
    });

    $('[data-js="btn--burger"]').on('click', function (e) {
        e.preventDefault();
        $('[data-js="header"]').toggleClass('active');
        $('[data-js="logo"] img').toggleClass('logo__visible');
    });


    $('[data-js="filter"]').on('click', function () {
        // e.preventDefault();
        $(this).toggleClass('opened');
    });

    $('[data-js="filter"] ul li a').on('click', function () {
        // e.preventDefault();
        $(this).parent().parent().parent().find('.current').text($(this).text());
    });

    $('[data-js="product-page-nav"] ul li a').on('click', function (e) {
        e.preventDefault();
        if ($(this).parent().hasClass('active')) {
            $('[data-js="product-page-nav"] ul li').removeClass('active');
            $('.flyouts').slideUp(300);
            $('.flyouts #' + target).fadeOut(300);
        } else {
            var target = $(this).attr('data-target');
            $('[data-js="product-page-nav"] ul li').removeClass('active');
            $(this).parent().toggleClass('active');
            $('.flyouts .inf-window').hide();
            $('.flyouts').slideDown(300);
            $('.flyouts #' + target).fadeIn(300);
        }
    });

    $('[data-js="panel__title"]').on('click', function (e) {
        e.preventDefault();
        $(this).parent().toggleClass('active').find('.panel__body').eq(0).slideToggle(300);
    });

    $('.panel.active > .panel__body').slideDown(300);

    $('[data-js="check-all"]').each(function (index) {
        if ($(this).is(':checked')) $(this).parent().find('input[type="checkbox"]').prop('checked', true);
    });

    function filters() {
        var filters = [];
        $('*[data-filter-target]').fadeOut(300);
        $('.f-filter input[type="checkbox"]:checked').each(function (index) {
            filters.push($(this).attr('id'));
        });
        for (var i = 0; i < filters.length; i++) {
            $('[data-filter-target="' + filters[i] + '"]').fadeIn(300);
        }
    }

    filters();

    $('.f-filter input[type="checkbox"]').on('change', function () {
        if ($(this).attr('data-js') == 'check-all') {
            $(this).parent().find('input[type="checkbox"]').prop('checked', $(this).is(':checked'));
        } else {
            $(this).parent().find('[data-js="check-all"]').prop('checked', false);
        }
        filters();
    });


    var mainSliderParams = {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: false,
        dots: true,
        autoplay: true,
        autoplaySpeed: 8000,
        fade: true,
        speed: 600
    };

    var productsSliderParams = {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        dots: true,
        autoplay: false,
        autoplaySpeed: 5000
    };

    $('[data-js="main-slider"]').slick(mainSliderParams);
    $('[data-js="our-products__slider"]').slick(productsSliderParams);

    $('[data-js="recipe-teaser-thumbnail"]').each(function () {
        if ($(this).find('img').length > 0) {
            var imgUrl = $(this).find('img').attr('src');
            $(this).find('img').css('opacity', '0');
            $(this).css({
                'background-image': 'url(' + imgUrl + ')'
            });
        }
    });


    // $('.main-nav ul li').each(function() {
    //     if($(this).hasClass('menu-item-has-children')) {
    //         $(this).append('<span class="arr arr--down"></span>');
    //     }
    //
    //
    //     $('.menu-item-has-children').click( function() {
    //         if($(this).find('.arr--down').length > 0) {
    //             // e.preventDefault();
    //             $(this).toggleClass('open');
    //         }
    //     });
    // });

    $('.main-nav ul li').each(function () {
        if ($(this).hasClass('menu-item-has-children')) {
            $(this).append('<span class="arr arr--down"></span>');
            $('.menu-item-has-children').click(function () {
                $(this).toggleClass('open');
            });
        }
    });
    AOS.init();
});


