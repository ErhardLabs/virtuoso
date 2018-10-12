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

    for (let widgetID in clickMap){
      if (typeof clickMap[widgetID] !== 'function') {
        let elementClicked = clickMap[widgetID];
        $(elementClicked).unbind().click(function (e) {
          e.preventDefault();
          self.open(widgetID);
        });
      }
    }

  }

  mapCloseAbility() {

    let self = this;

    // CLOSE SLIDER if clicked OUTSIDE of slider div

    $('body').unbind().click(function (e) {

      let sliderOpen = false;

      if ($('#slide_out_sidebar').hasClass('slider-active')) {

        sliderDivItems.forEach(function (elements) {

          // If a user clicks an element in slideDivItem then the slider should stay open
          if ($(e.target).closest(elements.element).length === 0) {
            elements["sliderStatus"] = "close";
            //console.log('close ', $(e.target), elements);
          } else {
            elements["sliderStatus"] = "open";
            //console.log('open ', $(e.target), elements);
          }

          // Assign the status
          if (elements['sliderStatus'] === "open") {
            //console.log(elements);
            sliderOpen = true;
          }
        });

        // If user clicks anywhere within #slide_out_sidebar, slider should stay open
        if ($(e.target).closest('#slide_out_sidebar').length !== 0) {
          sliderOpen = true;
        }

        if ($(e.target).closest('.single_add_to_cart_button').length !== 0) {
          sliderOpen = true;
        }

        console.log(sliderOpen);
        if (sliderOpen === false) {
          self.close();
        }
      }
    });

    // CLOSE SLIDER button
    $('#slide_out_sidebar #close_slider').unbind().click(function (e) {
      self.close();
    });

  }

  open(widgetID) {

    $('#slide_out_sidebar').addClass('slider-active');

    $('#slide_out_sidebar section').fadeOut();

    if ($('.fa-shopping-cart').hasClass('shopping_cart_clicked_before')) {
      $('#slide_out_sidebar #sexy-woo-cart').fadeIn();
    }

    $('#slide_out_sidebar').show();
    $('#slide_out_sidebar section:first-of-type').fadeIn();


    $('#slide_out_sidebar').animate({
      right: '0%',
      width: this.sidebar_options.width
    }, 500, function () {

      if (!$('.fa-shopping-cart').hasClass('shopping_cart_clicked_before')) {
        $('#slide_out_sidebar #' + widgetID).fadeIn();
      }

    });

    $("#slide_out_sidebar").animate({ scrollTop: 0 }, "slow");

  }

  close(){

    $('#slide_out_sidebar').removeClass('slider-active');
    $('#sexy-woo-cart').hide();

    $('#slide_out_sidebar').animate({
      right: '-100%'
    }, 500, function () {
      $('#slide_out_sidebar').fadeOut();
      $('#slide_out_sidebar section').fadeOut();
      $('#slide_out_sidebar a.button.checkout.wc-forward').fadeIn();
      $('.woocommerce-mini-cart__total').fadeIn();
      $('#slide_out_sidebar #sexy-woo-cart').css({'width': '100%'});
    });

  }

}

new Slide_Out_Sidebar();