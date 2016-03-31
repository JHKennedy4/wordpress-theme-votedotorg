/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.


function resizeIframe(width) {
  //adjust the height for the rock the vote registration tool once it hits the breakpoint from mobile to tablet, this is set by rock the vote.
 if (width > 512) {
  jQuery("section.register-tool iframe.register").attr('height','1000');
 } else {
  jQuery("section.register-tool iframe.register").attr('height','600');
 }
}
jQuery(window).resize(function() {
  var width = jQuery(window).width(); // New width
  resizeIframe(width);
});


jQuery(document).ready(function(){
 //on browser size tablet change the iframe height to 1000//
jQuery('iframe').iFrameResize({log:true,  minHeight: 1000});
 var width = $(window).width(); // New width
 // resizeIframe(width);

 jQuery('.menu-btn.mobile-only').click(function(){
  var menuCollapsed = $('.nav-menu.mobile-only').hasClass('collapsed');
  if (!menuCollapsed){
   jQuery('.nav-menu.mobile-only').addClass('collapsed');
  } else {
   jQuery('.nav-menu.mobile-only').removeClass('collapsed');
  }
   
 });



});
