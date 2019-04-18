import { disableBodyScroll, enableBodyScroll, clearAllBodyScrollLocks } from 'body-scroll-lock';

( function( document, $, undefined ) {

  'use strict';

  let virtuoso              = {},
    mainMenuButtonClass = 'menu-toggle',
    subMenuButtonClass  = 'sub-menu-toggle';

  virtuoso.init = function() {
    let toggleButtons = {
      menu: $( '<button />', {
        'class': mainMenuButtonClass,
        'aria-expanded': false,
        'aria-pressed': false,
        'role': 'button'
      })
        .append( virtuoso.params.mainMenu ),
      submenu: $( '<button />', {
        'class': subMenuButtonClass,
        'aria-expanded': false,
        'aria-pressed': false,
        'role': 'button'
      })
        .append( $( '<span />', {
          'class': 'screen-reader-text',
          text: virtuoso.params.subMenu
        }) )
    };

    if ( 0 < $( '.nav-primary' ).length ) {
      $( '.nav-primary' ).before( toggleButtons.menu ); // add the main nav buttons
    } else {
      $( '.nav-header' ).before( toggleButtons.menu );
    }
    $( 'nav .sub-menu' ).before( toggleButtons.submenu ); // add the submenu nav buttons
    $( '.' + mainMenuButtonClass ).each( _addClassID );
    $( '.' + subMenuButtonClass ).addClass( 'dashicons-before dashicons-arrow-down' );
    $( window ).on( 'resize.virtuoso', _doResize ).triggerHandler( 'resize.virtuoso' );
    $( '.' + mainMenuButtonClass ).on( 'click.virtuoso-mainbutton', _mainmenuToggle );
    $( '.' + subMenuButtonClass ).on( 'click.virtuoso-subbutton', _submenuToggle );

  };

  /**
   * Combine Primary and Secondary menus into one menu for mobile responsiveness
   *
   * @return void
   *
   */
  function _combineMenus() {
    if ( 767 >= window.innerWidth ) {

      $( 'ul.menu-secondary > li' ).addClass( 'moved-item' ); // tag moved items so we can move them back
      $( 'ul.menu-secondary > li' ).appendTo( 'ul.menu-primary' );
      $( '.nav-secondary' ).hide();
    }

    if ( 767 < window.innerWidth ) {
      $( '.nav-primary .genesis-nav-menu, nav .sub-menu' ).removeAttr( 'style' );
      $( '.nav-secondary' ).show();
      $( 'ul.menu-primary > li.moved-item' ).appendTo( 'ul.menu-secondary' );
    }
  }


  /**
   * Add nav class and ID to related button
   *
   * @return void
   *
   */
  function _addClassID() {
    let $this = $( this ),
      nav   = $this.next( 'nav' ),
      id    = 'class';
    if ( $( nav ).attr( 'id' ) ) {
      id = 'id';
    }
    $this.attr( 'id', 'mobile-' + $( nav ).attr( id ) );
  }

  /**
   * Change Skiplinks and Superfish
   *
   * @return void
   *
   */
  function _doResize() {
    let buttons = $( 'button[id^="mobile-"]' ).attr( 'id' );
    if ( 'undefined' === typeof buttons ) {
      return;
    }
    _superfishToggle( buttons );
    _changeSkipLink( buttons );
    _maybeClose( buttons );
  }

  /**
   * Action when the main menu button is clicked
   *
   * @return void
   *
   */
  function _mainmenuToggle() {
    let $this = $( this );
    _toggleAria( $this, 'aria-pressed' );
    _toggleAria( $this, 'aria-expanded' );
    $this.toggleClass( 'activated' );
    $( '.site-header nav' ).toggleClass( 'mobile-menu-active' );
    $this.next( 'nav, .sub-menu' ).slideToggle( 'fast' );
  }

  /**
   * Action for submenu toggles
   *
   * @return void
   *
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
   *
   * @return void
   *
   */
  function _superfishToggle( buttons ) {
    if ( 'function' !== typeof $( '.js-superfish' ).superfish ) {
      return;
    }
    if ( 'none' === _getDisplayValue( buttons ) ) {
      $( '.js-superfish' ).superfish({
        'delay': 100,
        'animation': {'opacity': 'show', 'height': 'show'},
        'dropShadows': false
      });
    } else {
      $( '.js-superfish' ).superfish( 'destroy' );
    }
  }

  /**
   * Modify skip links to match mobile buttons
   *
   * @return void
   *
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

  /**
   * Should the submenus be closed?
   *
   * @return void
   *
   */
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
   * Get the display value of an element
   *
   * @param  {id} $id ID to check
   *
   * @return {string}     CSS value of display property
   *
   */
  function _getDisplayValue( $id ) {
    let element = document.getElementById( $id ),
      style   = window.getComputedStyle( element );
    return style.getPropertyValue( 'display' );
  }

  /**
   * Toggle aria attributes
   *
   * @param  {button} $this     passed through
   * @param  {aria-xx} attribute aria attribute to toggle
   *
   * @return {bool}           from _ariaReturn
   *
   */
  function _toggleAria( $this, attribute ) {
    $this.attr( attribute, function( index, value ) {
      return 'false' === value;
    });
  }

  function closeMenuFromLinkClick() {
    if ( 767 >= window.innerWidth ) {

      //Close menu when user clicks a link with in menu
      $( '.nav-primary a' ).click( function() {
        $( '.menu-toggle, .sub-menu-toggle' )
          .removeClass( 'activated' )
          .attr( 'aria-expanded', false )
          .attr( 'aria-pressed', false );
        $( '.nav-primary' ).removeClass( 'mobile-menu-active' );
        $( '.nav-primary' ).css( 'display', 'none' );

        clearAllBodyScrollLocks();
      });
    }
  }

  $( document ).ready( function() {

    // Check to see if menus should be combined on initial page load
    _combineMenus();
    closeMenuFromLinkClick();

    // Check to see if menus should be combined on resize of the window
    $( window ).resize( function() {
        _combineMenus();
        closeMenuFromLinkClick();
    });

    virtuoso.params = 'undefined' === typeof virtuosoLocalizedArgs ? '' : virtuosoLocalizedArgs;

    if ( 'undefined' !== typeof virtuoso.params ) {
      virtuoso.init();
    }

    // Disable body scroll if the menu is activated
    $( '.menu-toggle' ).click( function() {
      if ( $( '.header-web-application .menu-toggle' ).hasClass( 'activated' ) ) {
        enableBodyScroll( document.querySelector( '.nav-primary' ) );
      } else if ( $( '.menu-toggle' ).hasClass( 'activated' ) ) {
        disableBodyScroll( document.querySelector( '.nav-primary' ) );
      } else {
        enableBodyScroll( document.querySelector( '.nav-primary' ) );
      }

    });


  });

}( document, jQuery ) );
