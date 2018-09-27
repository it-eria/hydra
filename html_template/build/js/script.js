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
        $(this).toggleClass('opened');
    });

    $('[data-js="filter"] ul li a').on('click', function () {
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

$(document).ready(function () {
    var jobCount = $('#list .in').length;
    $('.list-count').text(jobCount + ' results');
    $("#search-text").keyup(function () {
        //$(this).addClass('hidden');
        var searchTerm = $("#search-text").val();
        var listItem = $('#list').children('li');
        var searchSplit = searchTerm.replace(/ /g, "'):containsi('");
        $.extend($.expr[':'], {
            'containsi': function (elem, i, match, array) {
                return (elem.textContent || elem.innerText || '').toLowerCase()
                    .indexOf((match[3] || "").toLowerCase()) >= 0;
            }
        });

        $("#list li").not(":containsi('" + searchSplit + "')").each(function (e) {
            $(this).addClass('hiding out').removeClass('in');
            setTimeout(function () {
                $('.out').addClass('hidden');
            }, 300);
        });

        $("#list li:containsi('" + searchSplit + "')").each(function (e) {
            $(this).removeClass('hidden out').addClass('in');
            $('.empty-item').removeClass('show-res');
            setTimeout(function () {
                $('.in').removeClass('hiding');

            }, 1);
        });

        var jobCount = $('#list .in').length;
        $('.list-count').text(jobCount + ' results');
        if (jobCount == '0') {
            $('#list').addClass('empty');
        }
        else {
            $('#list').removeClass('empty');
        }
    });
});

$('.filter-taste').click( function(){
    $('.ml-list').hide();
    var attribute = $(this).attr('data-product-type');
    $('.ml-list[data-priduct-type="'+attribute+'"]').show();
});
$('.filter-taste').eq(1).trigger('click');

