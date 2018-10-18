(function ($) {
    $(function() {
        function filter() {
            var categoryFilters = [];
            var productsFilters = [];
            var flavorsFilters = [];
            $('.f-filter input[type="checkbox"]').each(function() {
                var currentParent = $(this).parent().attr('class');
                var currentState = $(this).prop('checked');
                if(currentState) {
                    switch(currentParent) {
                        case 'category':
                            categoryFilters.push($(this).attr('id'));
                            break;
                        case 'products':
                            productsFilters.push($(this).attr('id'));
                            break;
                        case 'flavors':
                            flavorsFilters.push($(this).attr('id'));
                            break;
                    }
                }
            });
            if(productsFilters.length > 0) {
                $('.f-filter').find('fieldset.flavors').slideDown(300);
                $('fieldset.flavors input, fieldset.flavors label').fadeOut(300);
                for(var i=0;i<productsFilters.length; i++) {
                    $('fieldset.flavors input[data-flavor-for-product="'+ productsFilters[i] +'"] + label').fadeIn(300);
                }
            } else {
                $('.f-filter').find('fieldset.flavors').slideUp(300);
            }

            if(categoryFilters.length > 0) {
                $('.filter-results .category-group[data-filter-target]').fadeOut(300);
                for(var i=0; i < categoryFilters.length; i++) {
                    $('.filter-results .category-group[data-filter-target="' + categoryFilters[i] + '"]').fadeIn(300);
                }
            } else {
                $('.filter-results .category-group[data-filter-target]').fadeIn(300);
            }

            if(productsFilters.length > 0) {
                $('.filter-results .panel[data-filter-target]').fadeOut(300);
                for(var i=0; i < productsFilters.length; i++) {
                    if(flavorsFilters.length > 0) {
                        for(var j=0; j < flavorsFilters.length; j++) {
                            $('.filter-results .panel[data-filter-target]').each(function() {
                                var filterArr = $(this).attr('data-filter-target').split(',');
                                var flavorsArr = $(this).attr('data-flavor-target').split(',');
                                for(var k=0; k < filterArr.length; k++) {
                                    if(productsFilters[i] == filterArr[k]) {
                                        for(var m = 0; m < flavorsArr.length; m++) {
                                            if(flavorsArr[m] == flavorsFilters[j]) {
                                                $(this).fadeIn(300);
                                            }
                                        }
                                    }
                                }
                            });
                        }
                    } else {
                        $('.filter-results .panel[data-filter-target]').each(function() {
                            var filterArr = $(this).attr('data-filter-target').split(',');
                            for(var k=0; k < filterArr.length; k++) {
                                if(productsFilters[i] == filterArr[k]) {
                                    $(this).fadeIn(300);
                                }
                            }
                        });
                    }
                }
            } else {
                $('.filter-results .panel[data-filter-target]').fadeIn(300);
            }
        }

        filter();

        $('.f-filter input[type="checkbox"]').on('change', function() {
            filter();
        });
    });

    $(function() {
        $('.filter-elements .panel').fadeOut(300);
        filter2();
        $('.filter ul').on('click', function() {
            filter2();
        });

        function filter2() {
            $('.filter-elements .panel').fadeOut(300);
            var currentFlavor = $('.filter .current').text();
            $('.filter-elements .panel').each(function() {
                var flavors = $(this).attr('data-flavor-target').split(',');
                for(var i=0;i<flavors.length; i++) {
                    if(currentFlavor == flavors[i]) {
                        $(this).fadeIn(300);
                    }
                }
            });
        }
    });

    $(window).on('load', function() {
        if (window.location.href.indexOf("?flavor=") > -1) {
            var url = $(location).attr('href');
            var parts = url.split("?flavor=");
            var last_part = "#" + parts[parts.length - 1];
            $(last_part).find('a').trigger("click");
        }
    });

})(jQuery);