$=jQuery;
$( document ).ready( function() {
  $( '#user-menu-button' ).unbind().click( function() {

    $( '#user-menu-button' ).toggleClass( 'activated' );

    $( '#user-menu-button' ).attr('aria-expanded', function (i, attr) {
      return attr == 'true' ? 'false' : 'true'
    });
    $( '.user-profile-menu' ).attr( 'data-open',  function (i, attr) {
      return attr == 'true' ? 'false' : 'true'
    });

  });
});