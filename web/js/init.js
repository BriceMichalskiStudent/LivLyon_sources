(function($){
  $(function(){

    $('.sidenav').sidenav();
    $('.parallax').parallax();
    $(".dropdown-trigger").dropdown();
    $('.collapsible').collapsible();

      $('.carousel.carousel-slider').carousel({
          fullWidth: true,
          indicators: true
      });
      autoplay();
      function autoplay() {
          $('.carousel').carousel('next');
          setTimeout(autoplay, 4500);
      }

  }); // end of document ready
})(jQuery); // end of jQuery name space


