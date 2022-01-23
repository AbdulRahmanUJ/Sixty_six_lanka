jQuery(function($) {
  var path = window.location.href;
  // because the 'href' property of the DOM element is the absolute path
  $('ul li').each(function() {
    if (this.href === path) {
      $(this).addClass('active');
    }
  });
});

// $(window).on('load', function(){
//     $('#app').fadeOut(1);
//   setTimeout(preload, 1000); //wait for page load PLUS two seconds.
// });

// function preload(){
//     $( "#preload" ).fadeOut(500, function() {
//       // fadeOut complete. Remove the loading div
//       $( "#preload" ).remove(); //makes page more lightweight
//       $('#app').fadeIn(1);
//   });
// }
// welcome page counter start jquary
/** javascript, jquery for caldera modal button **/
jQuery(window).scroll(function() {
  var $el = jQuery('.caldera-forms-modal');

  if(jQuery(this).scrollTop() >= 200) $el.addClass('shown');
  else $el.removeClass('shown');
  });
  /** end **/

// number counter start
$('.count').each(function () {
  $(this).prop('Counter',0).animate({
          Counter: $(this).text()
  }, {
          duration: 2000,
          easing: 'swing',
          step: function (now) {
                  $(this).text(Math.ceil(now));
          }
  });
});
// number counter end 

// onScroll fixed nave bar start
document.addEventListener("DOMContentLoaded", function(){
  window.addEventListener('scroll', function() {
      if (window.scrollY > 50) {
        document.getElementById('navbar_top').classList.add('fixed-top');
        // add padding top to show content behind navbar
        navbar_height = document.querySelector('.navbar').offsetHeight;
        document.body.style.paddingTop = navbar_height + 'px';
      } else {
        document.getElementById('navbar_top').classList.remove('fixed-top');
         // remove padding top from body
        document.body.style.paddingTop = '0';
      } 
  });
}); 
// onScroll fixed nave bar start

