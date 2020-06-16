<?php
/**
 * Sidebar (widgetized areas) HTML markup structure
 *
 * @package     Virtuoso\lib\Structure
 * @since       2.1.7
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Structure;

use Virtuoso\Lib\ThemeConfig;
use Virtuoso\Lib\Admin\Customizer\CustomizerHelpers;

defined( 'ABSPATH' ) || exit;
/**
 * Class Sidebar.
 */
class Sidebar {
	public $config = '';
	public function __construct() {

		$this->config = ThemeConfig::get_configuration_parameters( 'theme_default_settings' );

		add_action( 'widgets_init', [ $this, 'register_widgets' ] );
		add_action( 'get_footer', [ __CLASS__, 'display' ] );
	}

	public function register_widgets() {

		$widgets = $this->config['sidebar-widgets'];

		foreach ( $widgets as $widget ) {
			genesis_register_sidebar( $widget );
		}

	}

	public static function display() {

		?>

	<div id="slide_out_sidebar" class="slide_out_sidebar">
		<section id="close_slider" class="widget widget_text">
			<div class="textwidget">
				<a class="close" data-wpel-link="internal" id="close_slider_button"><i class="ti-close"></i></a>
			</div>
		</section>

		<section id="sexy-woo-messages" class="widget widget_text">
			<div class="textwidget"></div>
		</section>

		<section id="loading">
			<img src="<?php echo esc_url( get_stylesheet_directory_uri() ) . '/assets/images/loading.gif'; ?>"/>
		</section>

		<?php

		do_action( 'sidebar_before' );

		dynamic_sidebar( 'slider' );

		if ( ( class_exists( 'woocommerce' ) ) && ( ! is_checkout() ) && ( ! is_cart() ) ) {
			?>
		<section id="sexy-woo-cart">
			<h4>CART</h4>
			<div id="sexy-woo-cart-container">
				<?php echo do_shortcode( '[woocommerce_cart]' ); ?>
			</div>
			<a href="#" class="cart_plus plus_btn"><i class="fas fa-plus"></i></a>
		</section>

			<?php
		}

		do_action( 'sidebar_body' );

		do_action( 'sidebar_after' );

		?>

	</div>

		<?php
	}

	public static function get_user_options() {

		$prefix = CustomizerHelpers::get_settings_prefix();

		$user_options['width']                      = get_theme_mod( $prefix . '_width' );
		$user_options['cart_item_quantity']         = get_theme_mod( $prefix . '_cart_item_quantity' );
		$user_options['click_map']['sexy-woo-cart'] = get_theme_mod( $prefix . '_cart_classes' );

		$sidebar_widgets = get_option( 'sidebars_widgets' );

		if ( isset( $sidebar_widgets ) ) {

			if ( isset( $sidebar_widgets['slider'] ) ) {

				$slider_widgets = $sidebar_widgets['slider'];

				foreach ( $slider_widgets as $widget ) {

					$widget_pieces = explode( '-', $widget );
					$widget_name   = $widget_pieces[0];
					$widget_index  = $widget_pieces[1];
					$widget_data   = get_option( 'widget_' . $widget_name );

					$widget_header = $widget_data[ $widget_index ]['title'];

					$widget_header_slug = strtolower( $widget_header );

					$user_options['click_map'][ $widget ] = get_theme_mod( $prefix . '_widget_class_list' . '_wid_' . $widget );

				}
			}
		}

		return $user_options;

	}

}

