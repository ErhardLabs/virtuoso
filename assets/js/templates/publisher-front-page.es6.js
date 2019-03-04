$( '.team-member' ).unbind().hover( function( e ) {
  e.preventDefault();
  $(this).toggleClass('visible');
});