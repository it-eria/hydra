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
        $('fieldset.flavors input[data-flavor-for-product]').each(function() {
          var currentAttrArr = $(this).attr('data-flavor-for-product').split(',');
          for(var j = 0; j < currentAttrArr.length; j++) {
            if(currentAttrArr[j] == productsFilters[i]) {
              $(this).next('label').fadeIn(300);   
            }
          }
        });
      }
    } else {
      $('.f-filter').find('fieldset.flavors').slideUp(300);
    }

    if(categoryFilters.length > 0) {
      $('.f-filter').find('fieldset.products').slideDown(300);
      $('fieldset.products input, fieldset.products label').fadeOut(300);
      for(var i=0;i<categoryFilters.length; i++) {
        $('fieldset.products input[data-product-for-category]').each(function() {
          var currentAttrArr = $(this).attr('data-product-for-category').split(',');
          for(var j = 0; j < currentAttrArr.length; j++) {
            if(currentAttrArr[j] == categoryFilters[i]) {
              $(this).next('label').fadeIn(300);   
            }
          }
        });
      }
    } else {
      $('.f-filter').find('fieldset.products').slideUp(300);
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