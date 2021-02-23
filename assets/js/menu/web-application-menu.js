$ = jQuery
$(document).ready(function () {
  $('#user-menu-button').unbind().click(function () {
    toggleMenu();
  });

  $('.header-search-toggle').click(function(){
    toggleSearch();
  });

  function toggleMenu() {
    $('#user-menu-button').toggleClass('activated');

    $('#user-menu-button').attr('aria-expanded', function (i, attr) {
      return attr === 'true' ? 'false' : 'true'
    });
    $('.virtuoso-user-profile-menu').attr('data-open', function (i, attr) {
      return attr === 'true' ? 'false' : 'true'
    });
  }

  function toggleSearch() {

    $('.header-search-container').toggleClass('activated');

    $('.header-search-toggle').toggleClass('activated')

    $('.header-search-container').attr('aria-expanded', function (i, attr) {
      return attr === 'true' ? 'false' : 'true'
    });

    let searchInput = $('.header-search-container input[type="text"]');

    if ( searchInput.is(':visible') ) {
      searchInput
          .putCursorAtEnd()
          .on('focus', function() {
            searchInput.putCursorAtEnd()
          });
    }
  }

  $.fn.putCursorAtEnd = function() {

    return this.each(function() {

      // Cache references
      let $el = $(this),
          el = this;

      // Only focus if input isn't already
      if (!$el.is(":focus")) {
        $el.focus();
      }

      // If this function exists... (IE 9+)
      if (el.setSelectionRange) {

        // Double the length because Opera is inconsistent about whether a carriage return is one character or two.
        let len = $el.val().length * 2;

        // Timeout seems to be required for Blink
        setTimeout(function() {
          el.setSelectionRange(len, len);
        }, 1);

      } else {

        // As a fallback, replace the contents with itself
        // Doesn't work in Chrome, but Chrome supports setSelectionRange
        $el.val($el.val());

      }

      // Scroll to the bottom, in case we're in a tall textarea
      // (Necessary for Firefox and Chrome)
      this.scrollTop = 999999;

    });

  };

  $(document).mouseup(function (e) {
    let secondMenu = $('.header-web-application .virtuoso-user-profile-menu');
    let secondMenuButton = $('.header-web-application #user-menu-button');
    if (!secondMenu.is(e.target) && secondMenu.has(e.target).length === 0 && !secondMenuButton.is(e.target) && secondMenuButton.has(e.target).length === 0) {
      $('#user-menu-button').attr('aria-expanded', 'false');
      $('.virtuoso-user-profile-menu').attr('data-open', 'false');
    }
  });
});