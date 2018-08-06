( function ( document, $, undefined ) {

  $( 'body' ).addClass( 'js' );

  'use strict';

  let virtuoso              = {},
    mainMenuButtonClass = 'menu-toggle',
    subMenuButtonClass  = 'sub-menu-toggle';

  virtuoso.init = function() {
    let toggleButtons = {
      menu: $('<button />', {
        'class': mainMenuButtonClass,
        'aria-expanded': false,
        'aria-pressed': false,
        'role': 'button'
      })
        .append(virtuoso.params.mainMenu),
      submenu: $('<button />', {
        'class': subMenuButtonClass,
        'aria-expanded': false,
        'aria-pressed': false,
        'role': 'button'
      })
        .append($('<span />', {
          'class': 'screen-reader-text',
          text: virtuoso.params.subMenu
        }))
    };

    if ($( '.nav-primary' ).length > 0 ) {
      $( '.nav-primary' ).before( toggleButtons.menu ); // add the main nav buttons
    } else {
      $( '.nav-header' ).before( toggleButtons.menu );
    }
    $( 'nav .sub-menu' ).before( toggleButtons.submenu ); // add the submenu nav buttons
    $( '.' + mainMenuButtonClass ).each( _addClassID );
    // $( '.' + mainMenuButtonClass ).addClass('dashicons-before dashicons-menu');
    $( '.' + subMenuButtonClass ).addClass('dashicons-before dashicons-arrow-down');
    $( window ).on( 'resize.virtuoso', _doResize ).triggerHandler( 'resize.virtuoso' );
    $( '.' + mainMenuButtonClass ).on( 'click.virtuoso-mainbutton', _mainmenuToggle );
    $( '.' + subMenuButtonClass ).on( 'click.virtuoso-subbutton', _submenuToggle );

  };

  function _setupMenus() {
    if ( window.innerWidth <= 769 ) {
      $( '.nav-primary' ).addClass( 'mobile-navigation' );
      $( 'ul.menu-secondary > li' ).addClass( 'moved-item' ); // tag moved items so we can move them back
      $( 'ul.menu-secondary > li' ).appendTo( 'ul.menu-primary' );
      $( '.nav-secondary' ).hide();
    }

    if ( window.innerWidth > 768 ) {
      $( '.nav-primary' ).removeClass( 'mobile-navigation mobile-navigation-open' );
      $('.responsive-menu-icon span').removeClass( 'ti-close' ).addClass('ti-menu');
      $( '.nav-primary .genesis-nav-menu, nav .sub-menu' ).removeAttr( 'style' );
      $( '.responsive-menu > .menu-item' ).removeClass( 'menu-open' );
      $( '.nav-secondary' ).show();
      $( 'ul.menu-primary > li.moved-item' ).appendTo( 'ul.menu-secondary' );
    }
  }

  // add nav class and ID to related button
  function _addClassID() {
    let $this = $( this ),
      nav   = $this.next( 'nav' ),
      id    = 'class';
    if ( $( nav ).attr( 'id' ) ) {
      id = 'id';
    }
    $this.attr( 'id', 'mobile-' + $( nav ).attr( id ) );
  }

  // Change Skiplinks and Superfish
  function _doResize() {
    let buttons = $( 'button[id^="mobile-"]' ).attr( 'id' );
    if ( typeof buttons === 'undefined' ) {
      return;
    }
    _superfishToggle( buttons );
    _changeSkipLink( buttons );
    _maybeClose( buttons );
  }

  /**
   * action to happen when the main menu button is clicked
   */
  function _mainmenuToggle() {
    let $this = $( this );
    _toggleAria( $this, 'aria-pressed' );
    _toggleAria( $this, 'aria-expanded' );
    $this.toggleClass( 'activated' );
    $this.next( 'nav, .sub-menu' ).slideToggle( 'fast' );
  }

  /**
   * action for submenu toggles
   */
  function _submenuToggle() {

    let $this  = $( this ),
      others = $this.closest( '.menu-item' ).siblings();
    _toggleAria( $this, 'aria-pressed' );
    _toggleAria( $this, 'aria-expanded' );
    $this.toggleClass( 'activated' );
    $this.next( '.sub-menu' ).slideToggle( 'fast' );

    others.find( '.' + subMenuButtonClass ).removeClass( 'activated' ).attr( 'aria-pressed', 'false' );
    others.find( '.sub-menu' ).slideUp( 'fast' );

  }

  /**
   * activate/deactivate superfish
   */
  function _superfishToggle( buttons ) {
    if ( typeof $( '.js-superfish' ).superfish !== 'function' ) {
      return;
    }
    if ( 'none' === _getDisplayValue( buttons ) ) {
      $( '.js-superfish' ).superfish( {
        'delay': 100,
        'animation': {'opacity': 'show', 'height': 'show'},
        'dropShadows': false
      });
    } else {
      $( '.js-superfish' ).superfish( 'destroy' );
    }
  }

  /**
   * modify skip links to match mobile buttons
   */
  function _changeSkipLink( buttons ) {
    let startLink = 'genesis-nav',
      endLink   = 'mobile-genesis-nav';
    if ( 'none' === _getDisplayValue( buttons ) ) {
      startLink = 'mobile-genesis-nav';
      endLink   = 'genesis-nav';
    }
    $( '.genesis-skip-link a[href^="#' + startLink + '"]' ).each( function() {
      let link = $( this ).attr( 'href' );
      link = link.replace( startLink, endLink );
      $( this ).attr( 'href', link );
    });
  }

  function _maybeClose( buttons ) {
    if ( 'none' !== _getDisplayValue( buttons ) ) {
      return;
    }
    $( '.menu-toggle, .sub-menu-toggle' )
      .removeClass( 'activated' )
      .attr( 'aria-expanded', false )
      .attr( 'aria-pressed', false );
    $( 'nav, .sub-menu' )
      .attr( 'style', '' );
  }

  /**
   * generic function to get the display value of an element
   * @param  {id} $id ID to check
   * @return {string}     CSS value of display property
   */
  function _getDisplayValue( $id ) {
    let element = document.getElementById( $id ),
      style   = window.getComputedStyle( element );
    return style.getPropertyValue( 'display' );
  }

  /**
   * Toggle aria attributes
   * @param  {button} $this     passed through
   * @param  {aria-xx} attribute aria attribute to toggle
   * @return {bool}           from _ariaReturn
   */
  function _toggleAria( $this, attribute ) {
    $this.attr( attribute, function( index, value ) {
      return 'false' === value;
    });
  }

  $(document).ready(function () {

    // run test on initial page load
    _setupMenus();

    // run test on resize of the window
    $( window ).resize( _setupMenus() );

    virtuoso.params = typeof virtuosoLocalizedArgs === 'undefined' ? '' : virtuosoLocalizedArgs;

    if ( typeof virtuoso.params !== 'undefined' ) {
      virtuoso.init();
    }

    $( '.menu-toggle' ).click( function (e) {

      if ( $( '.menu-toggle' ).hasClass( 'activated' ) ) {

        //Prevent Scrolling
        $('html, body').css({
          margin: 0,
          height: '100%',
          overflow: 'hidden'
        });

      } else {

        $('html, body').css({
          margin: 0,
          height: 'unset',
          overflow: 'unset'
        });
      }

    });

  });

})( document, jQuery );