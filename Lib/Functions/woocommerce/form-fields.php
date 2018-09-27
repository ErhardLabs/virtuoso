<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// CUSTOM FORM FIELDS & PLACEHOLDERS

add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );

add_filter( 'woocommerce_checkout_fields' , 'sexy_woocheckout_custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function sexy_woocheckout_custom_override_checkout_fields( $fields ) {

	///////////////////////// BILLING //////////////////////////////////
  $fields['billing']['billing_first_name']['placeholder'] = _x('First Name', 'placeholder', 'virtuoso');
  $fields['billing']['billing_first_name']['label'] = __('First Name', 'virtuoso');
  $fields['billing']['billing_first_name']['priority'] = 10;

	$fields['billing']['billing_last_name']['placeholder'] = _x('Last Name', 'placeholder', 'virtuoso');
	$fields['billing']['billing_last_name']['label'] = __('Last Name', 'virtuoso');
	$fields['billing']['billing_last_name']['priority'] = 20;
	
	if (get_option('wc_sexy_woocheckout_show_billing_company') === 'no') {
		unset($fields['billing']['billing_company']);
	}
	
  $fields['billing']['billing_email']['placeholder'] = _x('Email', 'placeholder', 'virtuoso');
  $fields['billing']['billing_email']['label'] = __('Email', 'virtuoso');
  $fields['billing']['billing_email']['required'] = true;
  $fields['billing']['billing_email']['class'] = array(0 => 'form-row-wide');
  $fields['billing']['billing_email']['priority'] = 30;

  $fields['billing']['billing_address_1']['placeholder'] = _x('Address 1', 'placeholder', 'virtuoso');
  $fields['billing']['billing_address_1']['label'] = __('Address 1', 'virtuoso');
  $fields['billing']['billing_address_1']['class'] = array(0 => 'form-row-first');
  $fields['billing']['billing_address_1']['priority'] = 40;
  
  $fields['billing']['billing_address_2']['placeholder'] = _x('Address 2', 'placeholder', 'virtuoso');
  $fields['billing']['billing_address_2']['label'] = __('Address 2', 'virtuoso');
  $fields['billing']['billing_address_2']['required'] = false;
  $fields['billing']['billing_address_2']['class'] = array(0 => 'form-row-last');
  $fields['billing']['billing_address_2']['priority'] = 50;
    
  $fields['billing']['billing_city']['placeholder'] = _x('City', 'placeholder', 'virtuoso');
  $fields['billing']['billing_city']['label'] = __('City', 'virtuoso');
  $fields['billing']['billing_city']['class'] = array(0 => 'one-third', 2 => 'first');
  $fields['billing']['billing_city']['priority'] = 60;
  
  $fields['billing']['billing_state']['placeholder'] = _x('State', 'placeholder', 'virtuoso');
  $fields['billing']['billing_state']['label'] = __('State', 'virtuoso');
  $fields['billing']['billing_state']['class'] = array(0 => 'one-third');
  $fields['billing']['billing_state']['priority'] = 70;
  
  $fields['billing']['billing_postcode']['placeholder'] = _x('Zip', 'placeholder', 'virtuoso');
  $fields['billing']['billing_postcode']['label'] = __('Zip', 'virtuoso');
  $fields['billing']['billing_postcode']['class'] = array(0 => 'one-third');
  $fields['billing']['billing_postcode']['priority'] = 80;
  
  $fields['billing']['billing_country']['placeholder'] = _x('Country', 'placeholder', 'virtuoso');
  $fields['billing']['billing_country']['label'] = __('Country', 'virtuoso');
  $fields['billing']['billing_country']['priority'] = 94;
  
  if (get_option('wc_sexy_woocheckout_show_billing_phone') === 'yes') {
	  $fields['billing']['billing_phone']['placeholder'] = _x('Phone', 'placeholder', 'virtuoso');
	  $fields['billing']['billing_phone']['label'] = __('Phone', 'virtuoso');
	  $fields['billing']['billing_phone']['required'] = 0;
	  $fields['billing']['billing_phone']['clear'] = true;  
	  $fields['billing']['billing_phone']['priority'] = 95;
  } else {
	  unset($fields['billing']['billing_phone']);
  }
  


  ///////////////////////// SHIPPING //////////////////////////////////
  $fields['shipping']['shipping_first_name']['placeholder'] = _x('First Name', 'placeholder', 'virtuoso');
  $fields['shipping']['shipping_first_name']['label'] = __('First Name', 'virtuoso');
  $fields['shipping']['shipping_first_name']['priority'] = 10;

	$fields['shipping']['shipping_last_name']['placeholder'] = _x('Last Name', 'placeholder', 'virtuoso');
	$fields['shipping']['shipping_last_name']['label'] = __('Last Name', 'virtuoso');
	$fields['shipping']['shipping_last_name']['priority'] = 20;
	
	if (get_option('wc_sexy_woocheckout_show_shipping_company') === 'no') {
		unset($fields['shipping']['shipping_company']);
	}
	
  $fields['shipping']['shipping_email']['placeholder'] = _x('Email', 'placeholder', 'virtuoso');
  $fields['shipping']['shipping_email']['label'] = __('Email', 'virtuoso');
  $fields['shipping']['shipping_email']['required'] = true;
  $fields['shipping']['shipping_email']['class'] = array(0 => 'form-row-wide');
  $fields['shipping']['shipping_email']['priority'] = 30;

  $fields['shipping']['shipping_address_1']['placeholder'] = _x('Address 1', 'placeholder', 'virtuoso');
  $fields['shipping']['shipping_address_1']['label'] = __('Address 1', 'virtuoso');
  $fields['shipping']['shipping_address_1']['class'] = array(0 => 'form-row-first');
  $fields['shipping']['shipping_address_1']['priority'] = 40;
  
  $fields['shipping']['shipping_address_2']['placeholder'] = _x('Address 2', 'placeholder', 'virtuoso');
  $fields['shipping']['shipping_address_2']['label'] = __('Address 2', 'virtuoso');
  $fields['shipping']['shipping_address_2']['required'] = false;
  $fields['shipping']['shipping_address_2']['class'] = array(0 => 'form-row-last');
  $fields['shipping']['shipping_address_2']['priority'] = 50;
    
  $fields['shipping']['shipping_city']['placeholder'] = _x('City', 'placeholder', 'virtuoso');
  $fields['shipping']['shipping_city']['label'] = __('City', 'virtuoso');
  $fields['shipping']['shipping_city']['class'] = array(0 => 'one-third', 2 => 'first');
  $fields['shipping']['shipping_city']['priority'] = 60;
  
  $fields['shipping']['shipping_state']['placeholder'] = _x('State', 'placeholder', 'virtuoso');
  $fields['shipping']['shipping_state']['label'] = __('State', 'virtuoso');
  $fields['shipping']['shipping_state']['class'] = array(0 => 'one-third');
  $fields['shipping']['shipping_state']['priority'] = 70;
  
  $fields['shipping']['shipping_postcode']['placeholder'] = _x('Zip', 'placeholder', 'virtuoso');
  $fields['shipping']['shipping_postcode']['label'] = __('Zip', 'virtuoso');
  $fields['shipping']['shipping_postcode']['class'] = array(0 => 'one-third');
  $fields['shipping']['shipping_postcode']['priority'] = 80;
  
  $fields['shipping']['shipping_country']['placeholder'] = _x('Country', 'placeholder', 'virtuoso');
  $fields['shipping']['shipping_country']['label'] = __('Country', 'virtuoso');
  $fields['shipping']['shipping_country']['priority'] = 94;
  
  if (get_option('wc_sexy_woocheckout_show_shipping_phone') === 'yes') {
	  $fields['shipping']['shipping_phone']['placeholder'] = _x('Phone', 'placeholder', 'virtuoso');
	  $fields['shipping']['shipping_phone']['label'] = __('Phone', 'virtuoso');
	  $fields['shipping']['shipping_phone']['required'] = 0;
	  $fields['shipping']['shipping_phone']['clear'] = true;  
	  $fields['shipping']['shipping_phone']['priority'] = 95;
  } else {
	  unset($fields['shipping']['shipping_phone']);
  }



	///////////////////////// ORDER INFO //////////////////////////////////
	
	if (get_option( 'wc_sexy_woocheckout_show_additional_information' ) === 'no') {
		unset($fields['order']['order_comments']);
	}
  

  $fields = sexy_patricks_billing_fields( $fields );

  return $fields;
}





function sexy_patricks_billing_fields( $fields ) {
  global $woocommerce;

  // if the total is more than 0 then we still need the fields
  if ( 0 != $woocommerce->cart->total ) {
    return $fields;
  }

  // return the regular billing fields if we need shipping fields
  if ( $woocommerce->cart->needs_shipping() ) {
    return $fields;
  }

  // we don't need the billing fields so empty all of them except the email
//  unset( $fields['billing']['billing_country'] );
  //  unset( $fields['billing']['billing_first_name'] );
  //  unset( $fields['billing']['billing_last_name'] );
  unset( $fields['billing']['billing_company'] );
  unset( $fields['billing']['billing_address_1'] );
  unset( $fields['billing']['billing_address_2'] );
  unset( $fields['billing']['billing_city'] );
  unset( $fields['billing']['billing_state'] );
  unset( $fields['billing']['billing_postcode'] );
  unset( $fields['billing']['billing_phone'] );



  return $fields;
}