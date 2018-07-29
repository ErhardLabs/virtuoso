jQuery( function ( $ ) {

  $( '.nav-primary .genesis-nav-menu' ).addClass( 'responsive-menu' ).before( '<div class="responsive-menu-icon"><span class="ti-menu"></span></div>' );


  $( '.responsive-menu-icon' ).unbind().click( function (e) {

    e.preventDefault();

    $( '.nav-primary' ).toggleClass( 'mobile-navigation-open' );
    $('.responsive-menu-icon span').toggleClass( 'ti-menu ti-close' );

    if ( $( '.nav-primary' ).hasClass( 'mobile-navigation-open' ) ) {

      // Prevent Scrolling
      $('html, body').css({
        margin: 0,
        height: '100%',
        overflow: 'hidden'
      });

      $( this ).next( '.nav-primary .genesis-nav-menu' ).fadeIn('slow');
    } else {

      $('html, body').css({
        margin: 0,
        height: 'unset',
        overflow: 'unset'
      });

      $( this ).next( '.nav-primary .genesis-nav-menu' ).hide();
    }

  });

  $( '.responsive-menu' ).on( 'click', '.menu-item', function ( event ) {
    if ( event.target !== this )
      return;
    $( this ).find( '.sub-menu:first' ).slideToggle( function () {
      $( this ).parent().toggleClass( 'menu-open' );
    });
  });

  setupMenus();

  $( window ).resize( function () {
    setupMenus();
  });

  function setupMenus() {
    if ( window.innerWidth <= 768 ) {
      $( '.nav-primary' ).addClass( 'mobile-navigation' );
      $( 'ul.menu-secondary > li' ).addClass( 'moved-item' ); // tag moved items so we can move them back
      $( 'ul.menu-secondary > li' ).appendTo( 'ul.menu-primary' );
      $( '.nav-secondary' ).hide();
    }

    if ( window.innerWidth > 767 ) {
      $( '.nav-primary' ).removeClass( 'mobile-navigation mobile-navigation-open' );
      $('.responsive-menu-icon span').removeClass( 'ti-close' ).addClass('ti-menu');
      $( '.nav-primary .genesis-nav-menu, nav .sub-menu' ).removeAttr( 'style' );
      $( '.responsive-menu > .menu-item' ).removeClass( 'menu-open' );
      $( '.nav-secondary' ).show();
      $( 'ul.menu-primary > li.moved-item' ).appendTo( 'ul.menu-secondary' );
    }
  }

});