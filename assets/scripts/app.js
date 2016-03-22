function resizeIframe(width) {
 if (width > 768) {
  $("section.register-tool iframe").attr('height','1000');
 } else {
  $("section.register-tool iframe").attr('height','600');
 }
}
$(window).resize(function() {
  var width = $(window).width(); // New width
  resizeIframe(width);
});


$(document).ready(function(){
 //on browser size tablet change the iframe height to 1000//
 var width = $(window).width(); // New width
 resizeIframe(width);

 $('.menu-btn.mobile-only').click(function(){
  var menuCollapsed = $('.nav-menu.mobile-only').hasClass('collapsed');
  if (!menuCollapsed){
   $('.nav-menu.mobile-only').addClass('collapsed');
  } else {
   $('.nav-menu.mobile-only').removeClass('collapsed');
  }
   
 });



});