$ = jQuery;
$( document ).ready( function() {

  if ( 'no' == localized_sexy_config.sexy_woocheckout_show_form_labels ) {
    $( '.woocommerce-billing-fields label' ).hide();
    $( '.shipping_address .woocommerce-shipping-fields label' ).hide();
  }

  if ( 'no' == localized_sexy_config.sexy_woocheckout_show_additional_information ) {
    $( '.woocommerce-additional-fields' ).hide();
  }

  // CHECK CREATE ACCOUNT BY DEFAULT
  if ( 0 < $( '#createaccount' ).length ) {
    $( '#createaccount' ).prop( 'checked', true );
  }

});
