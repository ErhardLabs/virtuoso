$ = jQuery
$(document).ready(function () {
  $('#user-menu-button').unbind().click(function () {
    toggleMenu();
  });

  function toggleMenu() {
    $('#user-menu-button').toggleClass('activated');

    $('#user-menu-button').attr('aria-expanded', function (i, attr) {
      return attr == 'true' ? 'false' : 'true'
    });
    $('.virtuoso-user-profile-menu').attr('data-open', function (i, attr) {
      return attr == 'true' ? 'false' : 'true'
    });
  }

  $(document).mouseup(function (e) {
    let secondMenu = $('.header-web-application .virtuoso-user-profile-menu');
    let secondMenuButton = $('.header-web-application #user-menu-button');
    if (!secondMenu.is(e.target) && secondMenu.has(e.target).length === 0 && !secondMenuButton.is(e.target) && secondMenuButton.has(e.target).length === 0) {
      $('#user-menu-button').attr('aria-expanded', 'false');
      $('.virtuoso-user-profile-menu').attr('data-open', 'false');
    }
  });
});