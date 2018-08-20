<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// AJAX REFRESH MINI CART
function sexy_woocheckout_ajax_refresh_cart() {
  echo do_shortcode('[woocommerce_cart]');
  wp_die();
}
add_filter( 'wp_ajax_nopriv_sexy_ajax_refresh_cart', 'sexy_woocheckout_ajax_refresh_cart' );
add_filter( 'wp_ajax_sexy_ajax_refresh_cart', 'sexy_woocheckout_ajax_refresh_cart' );


function sexy_woocheckout_ajax_refresh_checkout() {
  echo do_shortcode('[woocommerce_checkout]');
  wp_die();
}
add_filter( 'wp_ajax_nopriv_sexy_ajax_refresh_checkout', 'sexy_woocheckout_ajax_refresh_checkout' );
add_filter( 'wp_ajax_sexy_ajax_refresh_checkout', 'sexy_woocheckout_ajax_refresh_checkout' );




add_action( 'wp_ajax_sexy_product_remove', 'sexy_woocheckout_product_remove' );
add_action( 'wp_ajax_nopriv_sexy_product_remove', 'sexy_woocheckout_product_remove' );
function sexy_woocheckout_product_remove() {
  $cart = WC()->instance()->cart;
  $id = $_POST['product_id'];
  $cart_id = $cart->generate_cart_id($id);
  $cart_item_id = $cart->find_product_in_cart($cart_id);

  if($cart_item_id){
    $cart->set_quantity($cart_item_id,0);
  }
  wp_die();
}

add_filter( 'wp_ajax_nopriv_sexy_update_total_price', 'sexy_woocheckout_update_total_price' );
add_filter( 'wp_ajax_sexy_update_total_price', 'sexy_woocheckout_update_total_price' );
function sexy_woocheckout_update_total_price() {

// Skip product if no updated quantity was posted or no hash on WC_Cart
  if( !isset( $_POST['hash'] ) || !isset( $_POST['quantity'] ) ){
    wp_die();
  }

  $cart_item_key = $_POST['hash'];

  if( !isset( WC()->cart->get_cart()[ $cart_item_key ] ) ){
    wp_die();
  }

  $values = WC()->cart->get_cart()[ $cart_item_key ];

  $_product = $values['data'];

// Sanitize
  $quantity = apply_filters( 'woocommerce_stock_amount_cart_item', apply_filters( 'woocommerce_stock_amount', preg_replace( "/[^0-9\.]/", '', filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT)) ), $cart_item_key );

  if ( '' === $quantity || $quantity == $values['quantity'] )
    wp_die();

// Update cart validation
  $passed_validation  = apply_filters( 'woocommerce_update_cart_validation', true, $cart_item_key, $values, $quantity );

// is_sold_individually
  if ( $_product->is_sold_individually() && $quantity > 1 ) {
    wc_add_notice( sprintf( __( 'You can only have 1 %s in your cart.', 'virtuoso' ), $_product->get_title() ), 'error' );
    $passed_validation = false;
  }

  if ( $passed_validation ) {
    WC()->cart->set_quantity( $cart_item_key, $quantity, false );
  }

// Recalc our totals
  WC()->cart->calculate_totals();
  woocommerce_cart_totals();
  wp_die();
}