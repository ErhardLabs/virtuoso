<?php
/**
 * Setup your child theme
 *
 * @package     Virtuoso\lib
 * @since       1.0.3
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib;

// Components
use Virtuoso\Lib\Components\Customizer\Customizer;

// Functions
use Virtuoso\Lib\Functions\Formatting;
use Virtuoso\Lib\Functions\EnqueueAssets;
use Virtuoso\Lib\Functions\Markup;

// Structure
use Virtuoso\Lib\Structure\Menu;
use Virtuoso\Lib\Structure\Header;
use Virtuoso\Lib\Structure\SideBar;
use Virtuoso\Lib\Structure\Comments;
use Virtuoso\Lib\Structure\Archive;
use Virtuoso\Lib\Structure\Footer;


class Virtuoso extends ThemeConfig {

	public function __construct() {

		$config = $this->get_theme_settings_defaults();

		add_action( 'genesis_setup', [ $this, 'setup_child_theme' ], 15 );
		add_filter( 'genesis_theme_settings_defaults', [ $this, 'set_theme_settings_defaults' ] );
		add_action( 'after_switch_theme', [ $this, 'update_theme_settings_defaults' ] );

		$customizer = new Customizer();

		$formatting = new Formatting();
		$loadAssets = new EnqueueAssets();
		$markup     = new Markup();

		$menu     = new Menu( $config );
		$header   = new Header( $config );
		$sidebar  = new SideBar( $config );
		$comments = new Comments( $config );
		$archive  = new Archive( $config );
		$archive  = new Footer( $config );

	}

	/**
	 * Setup child theme.
	 *
	 * @since 1.0.3
	 *
	 * @return void
	 */
	public function setup_child_theme() {

		$config = $this->get_configuration_parameters();

		load_child_theme_textdomain( CHILD_TEXT_DOMAIN, apply_filters( 'child_theme_textdomain', CHILD_THEME_DIR . '/languages', CHILD_TEXT_DOMAIN ) );

		$this->unregister_genesis_callbacks();

		$this->adds_theme_supports( $config['add_theme_support'] );
		$this->adds_new_image_sizes( $config['theme_image_sizes'] );
	}

	/**
	 * Unregister Genesis callbacks.  We do this here because the child theme loads before Genesis.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function unregister_genesis_callbacks() {

		$config = $this->get_theme_settings_defaults();

		Menu::unregister_menu_callbacks( $config );
		Header::unregister_header_callbacks( $config );
		Sidebar::unregister_sidebar_callbacks( $config );
		Comments::unregister_comments_callbacks( $config );
		Archive::unregister_archive_callbacks( $config );
		Footer::unregister_footer_callbacks( $config );
	}

	/**
	 * Adds theme supports to the site.
	 *
	 * @since 1.0.0
	 *
	 * @param array
	 *
	 * @return void
	 */
	public function adds_theme_supports( array $config ) {

		foreach ( $config as $feature => $args ) {
			add_theme_support( $feature, $args );
		}
	}

	/**
	 * Adds new image sizes.
	 *
	 * @since 1.0.0
	 *
	 * @param array
	 *
	 * @return void
	 */
	public function adds_new_image_sizes( array $config ) {

		foreach ( $config as $name => $args ) {
			$crop = array_key_exists( 'crop', $args ) ? $args['crop'] : false;

			add_image_size( $name, $args['width'], $args['height'], $crop );
		}
	}

	/**
	 * Set theme settings defaults.
	 *
	 * @since 1.0.0
	 *
	 * @param array $defaults
	 *
	 * @return array
	 */
	public function set_theme_settings_defaults( array $defaults ) {
		$config = $this->get_theme_settings_defaults();

		$defaults = wp_parse_args( $config, $defaults );

		return $defaults;
	}

	/**
	 * Sets the theme setting defaults.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function update_theme_settings_defaults() {

		$config = $this->get_theme_settings_defaults();

		if ( function_exists( 'genesis_update_settings' ) ) {
			genesis_update_settings( $config );
		}

		update_option( 'posts_per_page', $config['blog_cat_num'] );
	}

}
