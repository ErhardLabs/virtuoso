$=jQuery;

$(document).ready(function() {initialize();});
let sliderDivItems = [];
let close = false;
let open = false;

function initialize() {

  let cartIconClass;
	
	// console.log('slider-div');
  sliderDivItems = [
    { element: '.contact', text: 'Contact' }
  ];

  if (typeof localized_sexy_config.sexy_woocheckout_cart_icon_class !== 'undefined') {

    cartIconClass = '.'+localized_sexy_config.sexy_woocheckout_cart_icon_class;

    // Classes/ID's that should open the slider div


  } else {

    $('a').each(function(i) {
      let baseURI = $('a')[i].baseURI;
      let href = $('a')[i].href;
      let pathname = $('a')[i].pathname;

      if (pathname === '/home/cart/') {
        cartIconClass = $('a')[i].attr('class');
      }

    });
  }

  // Open slider based on the elements provided in the array of objects in sliderDivItems
  sliderDivItems.forEach( function ( arrayItem ) {

    $(arrayItem.element).unbind().click(function (e) {

      e.preventDefault();

      view_slider($(window).width(), arrayItem.text, $(this));

    });

  });

  // CLOSE SLIDER if clicked OUTSIDE of slider div

  $('body').unbind().click(function (e) {

    let sliderOpen = false;

    if ($('#slider').hasClass('slider-active')) {

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

      // If user clicks anywhere within #slider, slider should stay open
      if ($(e.target).closest('#slider').length !== 0) {
        sliderOpen = true;
      }

      if ($(e.target).closest('.single_add_to_cart_button').length !== 0) {
        sliderOpen = true;
      }

      console.log(sliderOpen);
      if (sliderOpen === false) {
        closeSlider();
      }
    }
  });

	// CLOSE SLIDER button
	$('#slider .fa-times-circle').unbind().click(function (e) {
    closeSlider();
	});


}

function closeSlider(){

  $('#slider').removeClass('slider-active');
  $('#sexy-woo-cart').hide();

  $('#slider').animate({
    right: '-100%'
  }, 500, function () {
    $('#slider').fadeOut();
    $('#slider section').fadeOut();
    $('#slider a.button.checkout.wc-forward').fadeIn();
    $('.woocommerce-mini-cart__total').fadeIn();
    $('#slider #sexy-woo-cart').css({'width': '100%'});
  });
}


function view_slider(widthOfScreen, text, element) {

  $('#slider').addClass('slider-active');

	$('#slider section').fadeOut();

	if ($('.fa-shopping-cart').hasClass('shopping_cart_clicked_before')) {
    $('#slider #sexy-woo-cart').fadeIn();
	}

	var doNothing = false;

	if (widthOfScreen < 768) {
		var percentage = '-100%';
		var widthOfSlider = '100%';
	} else { // DESKTOP AND TABLET VIEW
		var percentage = '-40%';
		var widthOfSlider = '40%';
	}

  if (text == 'checkout') {

    $('#slider .woocommerce-mini-cart__total').fadeOut();
    $('#slider a.button.checkout.wc-forward').fadeOut();
    $('#slider #sexy-woo-cart').fadeOut();
    $('#slider #sexy-woo-checkout').fadeIn();

  }
	
	$('#slider').show();
	$('#slider section:first-of-type').fadeIn();
	
	
	$('#slider').animate({
		 right: '0%',
		 width: widthOfSlider
	}, 500, function () {

    if (text == 'Read More') {
      $('#slider #text-30').fadeIn();
    } else if (text == 'Contact') {
      $('#slider .gform_widget').fadeIn();
    } else if (text == 'cart') {
    	if (!$('.fa-shopping-cart').hasClass('shopping_cart_clicked_before')) {
        $('#slider #sexy-woo-cart').fadeIn();
      }
    }

	});

	$("#slider").animate({ scrollTop: 0 }, "slow");

}