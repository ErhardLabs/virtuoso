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

use Virtuoso\Config\ThemeConfig;
use Virtuoso\Lib\Admin\Customizer\CustomizerHelpers;

class Sidebar {
	public $config = "";
	public function __construct() {

		$this->config = ThemeConfig::get_configuration_parameters( 'theme_default_settings' );

		add_action( 'widgets_init', [ $this, 'register_widgets' ] );
    add_action('get_footer', [ $this, 'display' ]);
	}

	public function register_widgets() {

		$widgets = $this->config['sidebar-widgets'];

		foreach ( $widgets as $widget ) {
			genesis_register_sidebar($widget);
		}

	}

	/**
	 * Unregister sidebar callbacks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function unregister_sidebar_callbacks( $config )
  {
//    remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
  }


  public function display() {

	  ?>

    <div id="slide_out_sidebar" class="slide_out_sidebar">
      <section id="close_slider" class="widget widget_text">
        <div class="textwidget">
          <a href="#/" class="close" data-wpel-link="internal" id="close_slider_button"><i class="ti-close"></i></a>
        </div>
      </section>

      <section id="sexy-woo-messages" class="widget widget_text">
        <div class="textwidget"></div>
      </section>

      <section id="loading">
        <img src="<?php get_stylesheet_directory() . '/assets/images/loading.gif';?>"/>
      </section>

      <?php

      dynamic_sidebar('slider');

      if ((class_exists('woocommerce')) && (!is_checkout()) && (!is_cart())) {
        ?>
        <section id="sexy-woo-cart">
          <h4>CART</h4>
          <div id="sexy-woo-cart-container">
            <?php echo do_shortcode('[woocommerce_cart]'); ?>
          </div>
          <a href="#" class="cart_plus plus_btn"><i class="fas fa-plus"></i></a>
        </section>

         <?php
      }

      ?>

    </div>

    <?php
  }

  static function get_user_options() {


    $prefix = CustomizerHelpers::get_settings_prefix();

    $userOptions['width'] = get_theme_mod($prefix.'_width');
//    $userOptions['enabled'] = get_theme_mod($prefix.'_enabled');
    $userOptions['cart_item_quantity'] = get_theme_mod($prefix.'_cart_item_quantity');
    $userOptions['click_map']['sexy-woo-cart'] = get_theme_mod($prefix.'_cart_classes');

    $sidebarWidgets = get_option( 'sidebars_widgets');
    $sliderWidgets = $sidebarWidgets['slider'];

    foreach($sliderWidgets as $widget) {

      $widgetPieces = explode('-', $widget);
      $widgetName = $widgetPieces[0];
      $widgetIndex = $widgetPieces[1];
      $widgetData = get_option('widget_'.$widgetName);

      $widgetHeader = $widgetData[$widgetIndex]['title'];

      $widgetHeaderSlug = strtolower($widgetHeader);

      $userOptions['click_map'][$widget] = get_theme_mod($prefix . '_widget_class_list' . '_wid_' . $widget);

    }

    return $userOptions;

  }

}

