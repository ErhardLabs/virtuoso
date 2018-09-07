<?php
/**
 * Footer HTML markup structure
 *
 * @package     Virtuoso\lib\Structure
 * @since       1.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Structure;

class Footer {
	public $config = "";
	public function __construct( $config ) {
		add_action( 'get_footer', array( $this, 'display_slide_out_sidebar' ) );
	}

	/**
	 * Unregister footer callbacks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function unregister_footer_callbacks( $config ) {

	}

	function display_slide_out_sidebar() {
		if ( ( ! is_checkout() ) && ( ! is_cart() ) ) { ?>

        <div id="slider" class="slider">
            <section id="close_slider" class="widget widget_text">
                <div class="textwidget">
                    <a href="#/" class="close" data-wpel-link="internal"><i class="fa fa-times-circle fa-2x"></i></a>
                </div>
            </section>

            <section id="sexy-woo-messages" class="widget widget_text">
                <div class="textwidget"></div>
            </section>

            <section id="loading">
                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/loading.gif'; ?>"/>
            </section>

					<?php dynamic_sidebar( 'slider' ); ?>
					<?php if ( class_exists( 'WooCommerce' ) ) { ?>
              <section id="sexy-woo-cart">
                  <h4>CART</h4>
                  <div id="sexy-woo-cart-container">
										<?php echo do_shortcode( '[woocommerce_cart]' ); ?>
                  </div>
                  <a href="#" class="cart_plus plus_btn"><i class="fas fa-plus"></i></a>
              </section>
              <section id="sexy-woo-checkout">
                  <h4>CHECKOUT</h4>
								<?php echo do_shortcode( '[woocommerce_checkout]' ); ?>
								<?php // echo do_shortcode('[woocommerce_one_page_checkout]'); ?>
                  <a href="#" class="checkout_plus plus_btn"><span>+</span></a>
              </section>
					<?php } ?>

        </div>

			<?php
		}
	}
}