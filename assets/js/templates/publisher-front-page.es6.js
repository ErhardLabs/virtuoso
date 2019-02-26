$( '.team-member' ).unbind().click( function( e ) {
  e.preventDefault();
  $(this).toggleClass('visible');
});