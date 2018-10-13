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
            $('.filter-results .panel[data-filter-target="' + productsFilters[i] + '"][data-flavor-target="'+ flavorsFilters[j] +'"]').fadeIn(300);
          }
        } else {
          $('.filter-results .panel[data-filter-target="' + productsFilters[i] + '"]').fadeIn(300);
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