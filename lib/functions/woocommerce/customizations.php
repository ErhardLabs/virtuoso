<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */
function sexy_woo_related_products_limit() {
  global $product;

  $args['posts_per_page'] = 2;
  return $args;
}


add_filter( 'woocommerce_output_related_products_args', 'sexy_woocheckout_related_products_args' );
function sexy_woocheckout_related_products_args( $args ) {
  $args['posts_per_page'] = 2; // 4 related products
  $args['columns'] = 2; // arranged in 2 columns
  return $args;
}

add_filter('woocommerce_cross_sells_total', 'sexy_woocheckout_cartCrossSellTotal');
function sexy_woocheckout_cartCrossSellTotal($total) {
  $total = '1';
  return $total;
}

// SEXY CHECKOUT RELATED PRODUCTS THAT SAYS "YOU MAY BE INTERESTED IN..."
if (get_option( 'wc_sexy_woocheckout_show_related_products' ) === 'no') {
  // from individual products
  //  remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

  // FROM CART
}


remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

if ( ! function_exists( 'woocommerce_cross_sell_display' ) ) {
	add_action( 'woocommerce_checkout_before_customer_details', 'sexy_woocheckout_related_products' );
}

function sexy_woocheckout_related_products() {

	$limit = 1;
	$columns = 1;
	$orderby = 'price';
	$order = 'desc';

	// Get visible cross sells then sort them at random.
	$cross_sells = array_filter( array_map( 'wc_get_product', WC()->cart->get_cross_sells() ), 'wc_products_array_filter_visible' );

	wc_set_loop_prop( 'name', 'cross-sells' );
	wc_set_loop_prop( 'columns', apply_filters( 'woocommerce_cross_sells_columns', $columns ) );
	// Handle orderby and limit results.
	$orderby     = apply_filters( 'woocommerce_cross_sells_orderby', $orderby );
	$order       = apply_filters( 'woocommerce_cross_sells_order', $order );
	$cross_sells = wc_products_array_orderby( $cross_sells, $orderby, $order );
	$limit       = apply_filters( 'woocommerce_cross_sells_total', $limit );
	$cross_sells = $limit > 0 ? array_slice( $cross_sells, 0, $limit ) : $cross_sells;
	wc_get_template( 'cart/cross-sells.php', array(
		'cross_sells'    => $cross_sells,
		// Not used now, but used in previous version of up-sells.php.
		'posts_per_page' => $limit,
		'orderby'        => $orderby,
		'columns'        => $columns,
	) );
}