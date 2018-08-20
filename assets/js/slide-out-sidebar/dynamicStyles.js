$=jQuery;

$(document).ready(function() {initializeSexyStyles();});



function initializeSexyStyles() {
  
  if ( localized_sexy_config.sexy_woocheckout_link_color ) {
     // console.log('link-color '+ localized_sexy_config.sexy_woocheckout_link_color);
    let linkColor = localized_sexy_config.sexy_woocheckout_link_color;

    if ( linkColor.charAt(0) === '#' ) {
       // console.log("hashtag");
      $('#slider a').css('color', linkColor);
    } else {
      $('#slider a').css('color', '#' + linkColor);
    }
       
  }
  
  if ( localized_sexy_config.sexy_woocheckout_text_color ) {
//     console.log('text-color '+ localized_sexy_config.sexy_woocheckout_text_color);
    let textColor = localized_sexy_config.sexy_woocheckout_text_color;

    if ( textColor.charAt(0) === '#' ) {
//       console.log("hashtag");
      $('#slider h1, #slider h2, #slider h3, #slider h4, #slider p, #slider span, #slider th, #slider td, #slider tr, #slider .quantity::before').css('color', textColor);
    } else {
      $('#slider h1, #slider h2, #slider h3, #slider h4, #slider p, #slider span, #slider th, #slider td, #slider tr, #slider .quantity::before').css('color', '#' + textColor);
    }

  }

  if ( localized_sexy_config.sexy_woocheckout_button_color ) {
//     console.log('btn-color '+ localized_sexy_config.sexy_woocheckout_button_color);
    let buttonColor = localized_sexy_config.sexy_woocheckout_button_color;


    if ( buttonColor.charAt(0) === '#' ) {
//       console.log("hashtag");
      $('#slider input[type=submit], #slider .checkout-button').css('background-color', buttonColor);
    } else {
      $('#slider input[type=submit], #slider .checkout-button').css('background-color', '#' + buttonColor);
    }

  }
  
  
  // sexy_woocheckout_show_form_labels IS CHANGED IN defualt-woo-checkout.js
  
  
  
/*
  
  function getColor( key ) {
    
    console.log(localized_sexy_config.key);
    
  }
*/
  

}