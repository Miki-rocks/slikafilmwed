$('[data-toggle="scroll-to"]').click(function() {

  var $this = $(this);

  if ( $this.data('scroll-offset') == true ) {
    var offset = $('.header').height();
  } else {
    var offset = 0;
  }

  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
    if (target.length) {
      $('html, body').animate({
        scrollTop: target.offset().top - offset
      }, 1000);
      return false;
    }
  }
});
