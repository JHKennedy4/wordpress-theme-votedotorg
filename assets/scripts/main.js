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

(function ($) {

  var Sage = {
    // All pages
    'common': {
      init: function () {
        // JavaScript to be fired on all pages
        // mobile nav
        $('.menu-btn.mobile-only').click(function () {
          var menuCollapsed = $('.nav-menu.mobile-only').hasClass('collapsed')
          if (!menuCollapsed) {
            $('.nav-menu.mobile-only').addClass('collapsed')
          } else {
            $('.nav-menu.mobile-only').removeClass('collapsed')
          }
        })
      },
      finalize: function () {
        // JavaScript to be fired on all pages, after page specific JS is fired

      }
    },
    // Home page
    'home': {
      init: function () {
        // JavaScript to be fired on the home page
      },
      finalize: function () {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // State pages
    'state': {
      init: function () {
        // JavaScript to be fired on the state pages
      },
      finalize: function () {
        // JavaScript to be fired on the state pages, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function () {
        // JavaScript to be fired on the about us page
      }
    },
    'iframe': {
      init: function () {
        // resize iFrame with inner content
        iFrameResize({ log: true, checkOrigin: false }) // eslint-disable-line no-undef
        $('iframe').iFrameResize({minHeight: 1000, sizeHeight: true})
      }
    },
    'table': {
      init: function () {
        function UpdateTableHeaders () {
          $('.persist-area').each(function () {

            var el = $(this)
            var offset = el.offset()
            var scrollTop = $(window).scrollTop()
            var floatingHeader = $('.floatingHeader', this)

            if ((scrollTop > offset.top) && (scrollTop < offset.top + el.height())) {
              floatingHeader.css({
                'visibility': 'visible'
              })
            } else {
              floatingHeader.css({
                'visibility': 'hidden'
              })
            }
          })
        }
        // DOM Ready
        var clonedHeaderRow

        $('.persist-area').each(function () {
          clonedHeaderRow = $('.persist-header', this)
          clonedHeaderRow
          .before(clonedHeaderRow.clone())
          .css('width', clonedHeaderRow.width())
          .addClass('floatingHeader')
        })

        $(window)
         .scroll(UpdateTableHeaders)
         .trigger('scroll')
      }
    },
    // Technology page -- the clip to copy feature
    'technology': {
      init: function () {
        // JavaScript to be fired on the technology page
        var client = new ZeroClipboard(document.getElementsByClassName('clip_button'))

        client.on('ready', function (readyEvent) {
          // alert( "ZeroClipboard SWF is ready!" )

          client.on('aftercopy', function (event) {
            // `this` === `client`
            // `event.target` === the element that was clicked
            event.target.style.display = 'none'
            window.alert('Copied code to clipboard: ' + '\n\r' + event.data['text/plain'])
          })
        })

      }
    }
  }
  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function (func, funcname, args) {
      var fire
      var namespace = Sage
      funcname = (funcname === undefined) ? 'init' : funcname
      fire = func !== ''
      fire = fire && namespace[func]
      fire = fire && typeof namespace[func][funcname] === 'function'

      if (fire) {
        namespace[func][funcname](args)
      }
    },
    loadEvents: function () {
      // Fire common init JS
      UTIL.fire('common')

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm) {
        UTIL.fire(classnm)
        UTIL.fire(classnm, 'finalize')
      })

      // Fire common finalize JS
      UTIL.fire('common', 'finalize')
    }
  }

  // Load Events
  $(document).ready(UTIL.loadEvents)

}(jQuery)); // eslint-disable-line semi
