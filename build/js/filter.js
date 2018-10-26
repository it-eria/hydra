$(function() {
  function filter() {
    var categoryFilters = [];
    var productsFilters = [];
    var flavorsFilters = [];
    $('.f-filter input[type="checkbox"], .f-filter input[type="radio"]').each(function() {
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
      var isAnyFlavors = false;
      $('fieldset.flavors input, fieldset.flavors label').fadeOut(300);
      for(var i=0;i<productsFilters.length; i++) {
        $('fieldset.flavors input[data-flavor-for-product]').each(function() {
          var currentAttrArr = $(this).attr('data-flavor-for-product').split(',');
          for(var j = 0; j < currentAttrArr.length; j++) {
            if(currentAttrArr[j] == productsFilters[i]) {
              $(this).next('label').fadeIn(300);
              isAnyFlavors = true;
            }
          }
        });
      }
      if(isAnyFlavors) $('.f-filter').find('fieldset.flavors').slideDown(300);
      else {
        $('.f-filter').find('fieldset.flavors input').prop('checked', false);
        $('.f-filter').find('fieldset.flavors').slideUp(300);
      }
    } else {
      $('.f-filter').find('fieldset.flavors').slideUp(300);
    }

    if(categoryFilters.length > 0) {
      var isAnyProducts = false;
      $('fieldset.products input, fieldset.products label').fadeOut(300);
      for(var i=0;i<categoryFilters.length; i++) {
        $('fieldset.products input[data-product-for-category]').each(function() {
          var currentAttrArr = $(this).attr('data-product-for-category').split(',');
          for(var j = 0; j < currentAttrArr.length; j++) {
            if(currentAttrArr[j] == categoryFilters[i]) {
              $(this).next('label').fadeIn(300);   
              isAnyProducts = true;
            }
          }
        });
      }
      if(isAnyProducts) $('.f-filter').find('fieldset.products').slideDown(300);
      else {
        $('.f-filter').find('fieldset.products input').prop('checked', false);
        $('.f-filter').find('fieldset.products').slideUp(300);
      }
    } else {
      $('.f-filter').find('fieldset.products').slideUp(300);
      $('.f-filter').find('fieldset.products input').prop('checked', false);
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

  var radioCatState;
  var radioProdState;

  $('.f-filter input[type="radio"]').on('click', function() {
    if (radioCatState === this || radioProdState === this) {
      $(this).prop('checked', false);
      if($(this).attr('name') == 'cat') radioCatState = null;
      if($(this).attr('name') == 'prod') radioProdState = null;
      if($(this).attr('name') == 'cat') {
        $('.products input[type="checkbox"], .products input[type="radio"], .flavors input[type="checkbox"], .flavors input[type="radio"]').prop('checked', false);
      } else if ($(this).attr('name') == 'prod') {
        $('.flavors input[type="checkbox"], .flavors input[type="radio"]').prop('checked', false);
      }
      filter();
    } else {
      if($(this).attr('name') == 'cat') radioCatState = this;
      if($(this).attr('name') == 'prod') radioProdState = this;
    }
  });
  
  $('.f-filter input[type="checkbox"], .f-filter input[type="radio"]').on('change', function() {
    if($(this).attr('name') == 'cat') {
      $('.products input[type="checkbox"], .products input[type="radio"], .flavors input[type="checkbox"], .flavors input[type="radio"]').prop('checked', false);
    } else if ($(this).attr('name') == 'prod') {
      $('.flavors input[type="checkbox"], .flavors input[type="radio"]').prop('checked', false);
    }
    filter();
  });
});