<?php
/**
 * Menu HTML markup structure
 *
 * @package     Virtuoso\lib\Structure
 * @since       1.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Structure;

use Virtuoso\Config\ThemeConfig;

class Menu extends ThemeConfig {

	public $config = "";

	public function __construct( $config ) {

		$this->config = $config;

		add_filter( 'body_class', [ $this, 'set_header_class' ] );

		add_filter( 'wp_nav_menu_args', [ $this, 'setup_secondary_menu_args' ] );

		if ( $config['header-design']['logo-middle'] ) {
			add_filter( 'genesis_after_header', [ $this, 'render_header_menu' ] );
		}

		add_filter( 'wp_nav_menu_items', [ $this, 'add_menu_items' ], 10, 2 );

		add_filter( 'wp_nav_menu_items', [ $this, 'add_cart_count_to_navigation' ], 10, 2 );

		add_filter( 'woocommerce_add_to_cart_fragments', [ $this, 'my_woocommerce_add_to_cart_fragments' ], 10, 1 );
	}

	/**
	 * Unregister menu callbacks.
	 *
	 * @param $config array
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function unregister_menu_callbacks( $config ) {

		remove_action( 'genesis_after_header', 'genesis_do_nav' );

		if ( $config['header-design']['logo-left'] ) {
			add_action( 'genesis_header', 'genesis_do_nav', 11 );
		}

		remove_action( 'genesis_after_header', 'genesis_do_subnav' );
	}



	/**
	 * Set the design of the header based on the theme configuration settings
	 *
	 * @since 1.0.5
	 *
	 * @param array
	 *
	 * @return array
	 */
	function set_header_class( $classes ) {

		if ( $this->config['header-design']['logo-left'] ) {
			$classes[] .= ' logo-left';
		} else {
			$classes[] .= ' logo-middle';
		}

		return $classes;
	}

	/**
	 * Reduce the secondary navigation menu to one level depth.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	function setup_secondary_menu_args( array $args ) {

		if ( 'secondary' != $args['theme_location'] ) {
			return $args;
		}

		$args['depth'] = 1;

		return $args;
	}

	/**
	 * Wrap the primary and secondary navigation together
	 *
	 * @since 1.0.3
	 *
	 * @param array $args
	 *
	 * @return header-navigation view container
	 */
	function render_header_menu() {
		include( CHILD_DIR . '/lib/views/header-navigation.php' );
	}

	/**
	 * Add addition menu items to navigation
	 *
	 * @since 1.0.4
	 *
	 * @param string $
	 * @param array $args
	 *
	 * @return string
	 */
	function add_menu_items( $menu, $args ) {

		if ( 'primary' === $args->theme_location ) {
			$menu .= '<li class="menu-item menu-email"><a href="#"><span class="ti-email"></span></a></li>';

		}

		// 'secondary' navigation menu
		if ( 'secondary' === $args->theme_location ) {

			if ( is_user_logged_in() ) {
				// Add buddy press profile link if user is logged in
				//$menu .= '<li class="menu-item user-image"><a href="/my-account"><img src="' . get_avatar_url( get_current_user_id() ) . '"></a></li>';
			} else {
				$menu .= '<li class="menu-item create phoen-login-signup-popup-open"><a href="">Login</a></li>';
			}
		}

		return $menu;
	}


	/**
	 * Adds the WooCommerce or Easy Digital Downloads cart icons/items to the top_nav menu area as the last item.
	 *
	 *
	 * @since 1.0.6
	 *
	 * @param string $items
	 * @param $args
	 *
	 * @return string $items
	 */
	function add_cart_count_to_navigation( $items, $args ) {
		// Top Navigation Area Only

		if ( property_exists( $args, 'theme_location' ) && ( ( $args->theme_location === 'primary' && $this->config['header-design']['logo-left'] ) || ( $args->theme_location === 'secondary' && $this->config['header-design']['logo-middle'] ) ) ) {
			// WooCommerce
			if ( class_exists( 'woocommerce' ) ) {
				$css_class = 'menu-item menu-item-type-cart menu-item-type-woocommerce-cart';
				// Is this the cart page?
				if ( is_cart() ) {
					$css_class .= ' current-menu-item';
				}
				$items .= '<li class="' . esc_attr( $css_class ) . '">';
				$items .= '<a class="cart-contents" href="' . get_permalink( wc_get_page_id( 'cart' ) ) . '">';
				$items .= '<span class="cart-icon ti-shopping-cart">';
				$items .= $this->get_cart_count_menu_item();

				//$items .= '<span class="menu-cart-count">' . get_cart_count_menu_item() . '</span>';

				$items .= '</span>';

				$items .= '</a>';
				$items .= '</li>';

			} // Easy Digital Downloads
			else if ( class_exists( 'Easy_Digital_Downloads' ) ) {
				$css_class = 'menu-item menu-item-type-cart menu-item-type-edd-cart';
				// Is this the cart page?
				if ( edd_is_checkout() ) {
					$css_class .= ' current-menu-item';
				}
				$items .= '<li class="' . esc_attr( $css_class ) . '">';
				$items .= '<a class="cart-contents" href="' . esc_url( edd_get_checkout_uri() ) . '">';
				$items .= '<span class="ti-shopping-cart"></span>';
				$items .= $this->get_cart_count_menu_item( false );
				$items .= '</a>';
				$items .= '</li>';
			}
		}

		return $items;
	}


	/**
	 * Get the cart count menu item
	 *
	 *
	 * @since 1.0.6
	 *
	 * @param bool $woocommerce
	 *
	 * @return string $items
	 */
	function get_cart_count_menu_item( $woocommerce = true ) {

		$items = '';

		if ( $woocommerce ) {

			if ( WC()->cart->get_cart_contents_count() > 0 && WC()->cart->get_cart_contents_count() < 10 ) {
				$items .= '<span class="menu-cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
			} else if ( WC()->cart->get_cart_contents_count() >= 10 ) {
				$items .= '<span class="menu-cart-count">9+</span>';
			} else if ( WC()->cart->get_cart_contents_count() == 0 ) {
				$items .= '<span class="menu-cart-count menu-cart-empty"></span>';
			}
		} else {

			if ( edd_get_cart_quantity() > 0 && edd_get_cart_quantity() < 10 ) {
				$items .= '<span class="menu-cart-count">' . edd_get_cart_quantity() . '</span>';
			} else if ( edd_get_cart_quantity() >= 10 ) {
				$items .= '<span class="menu-cart-count">9+</span>';
			} else if ( edd_get_cart_quantity() == 0 ) {
				$items .= '<span class="menu-cart-count menu-cart-empty"></span>';
			}
		}

		return $items;
	}


	/**
	 * Updates the Top Navigation WooCommerce cart link contents when an item is added via AJAX.
	 *
	 * @since 1.0.6
	 *
	 * @param array $fragments
	 *
	 * @return array $fragments
	 */
	function my_woocommerce_add_to_cart_fragments( $fragments ) {
		// Add our fragment
		ob_start();

		echo $this->get_cart_count_menu_item();

		$fragments['span.menu-cart-count'] = ob_get_clean();

		return $fragments;
	}

}



