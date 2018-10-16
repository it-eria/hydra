$(function() {
  $('#faq .panel').fadeOut(300);
  filter2();
  $('.filter ul').on('click', function() {
    filter2();
  });

  function filter2() {
    $('#faq .panel').fadeOut(300);
    var currentFlavor = $('.filter .current').text();
    $('#faq .panel').each(function() {
      var flavors = $(this).attr('data-flavor-target').split(',');
      for(var i=0;i<flavors.length; i++) {
        if(currentFlavor == flavors[i]) {
          $(this).fadeIn(300);
        }
      }
    });
  }
});