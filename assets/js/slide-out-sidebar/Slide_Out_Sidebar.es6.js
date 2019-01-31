$ = jQuery;

class Slide_Out_Sidebar {

  constructor() {

    // this.close = false;
    // this.open = false;

    this.sidebar_options = virtuosoLocalizedArgs.sidebar_options;

    this.mapClickLocations();
    // this.mapCloseAbility();


  }

  mapClickLocations() {

    let self = this;
    let clickMap = this.sidebar_options.click_map;

    for ( let widgetID in clickMap ) {

      if ( 'function' !== typeof clickMap[widgetID]) {
        let elementClicked = clickMap[widgetID];
        $( elementClicked ).click( function( e ) {
          // console.log( elementClicked, widgetID );
          e.preventDefault();

          // $(elementClicked).unbind();
          self.open( widgetID );
        });
      }
    }

  }

  mapCloseAbility() {

    let self = this;

    // CLOSE SLIDER button
    $( '#slide_out_sidebar #close_slider_button' ).unbind().click( function( e ) {
      self.close();
    });

  }

  open( widgetID ) {

    let self = this;

    $( '#slide_out_sidebar' ).addClass( 'slider-active' );
    $( '#slide_out_sidebar' ).removeClass( 'slider-close' );

    $( '#slide_out_sidebar section' ).fadeOut();

    $( '#slide_out_sidebar' ).show();
    $( '#slide_out_sidebar section:first-of-type' ).show();


    $( '#slide_out_sidebar' ).animate({
      right: '0%',
      width: '100%'
    }, 200, function() {

      // if (!$('.fa-shopping-cart').hasClass('shopping_cart_clicked_before')) {
        $( '#slide_out_sidebar #' + widgetID ).fadeIn();
        $( '#slide_out_sidebar #close_slider' ).fadeIn();
        self.mapCloseAbility();

      // }

    });

    //$('#genesis-content').css('filter', 'brightness(25%)');

    $( '#slide_out_sidebar' ).animate({ scrollTop: 0 }, 'slow' );

  }

  close() {


    $( '#slide_out_sidebar #close_slider' ).hide();

    $( '#slide_out_sidebar' ).removeClass( 'slider-active' );
    $( '#slide_out_sidebar' ).addClass( 'slider-close' );


    //$('#sexy-woo-cart').hide();

    //$('#genesis-content').css('filter', 'unset');

    $( '#slide_out_sidebar' ).animate({
      right: '-100%'
    }, 150, function() {
      $( '#slide_out_sidebar' ).fadeOut();
      $( '#slide_out_sidebar section' ).fadeOut();

      // $('#slide_out_sidebar a.button.checkout.wc-forward').fadeIn();
      // $('.woocommerce-mini-cart__total').fadeIn();
      $( '#slide_out_sidebar #sexy-woo-cart' ).css({'width': '100%'});
    });

  }

}

new Slide_Out_Sidebar();
