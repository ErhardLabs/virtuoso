<?php
/**
 * Setup the Virtuoso child theme
 *
 * @package     Virtuoso\lib
 * @since       2.1.7
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib;

// Config.
use Virtuoso\Lib\ThemeConfig;

// Components.
use Virtuoso\Lib\Admin\Admin;
use Virtuoso\Lib\Components\Background_Video_HTML;
use Virtuoso\Lib\Admin\Customizer\Customizer;

// Functions.
use Virtuoso\Lib\Functions\Formatting;
use Virtuoso\Lib\Functions\EnqueueAssets;
use Virtuoso\Lib\Functions\DetectJS;

// Structure.
use Virtuoso\Lib\Structure\Menu;
use Virtuoso\Lib\Structure\Header;
use Virtuoso\Lib\Structure\Sidebar;
use Virtuoso\Lib\Structure\Comments;
use Virtuoso\Lib\Structure\Footer;
use Virtuoso\Lib\Structure\Post;

defined( 'ABSPATH' ) || exit;

/**
 * Class VirtuosoTheme.
 */
class VirtuosoTheme extends ThemeConfig {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->init_constants();
		$config = $this->get_theme_settings_defaults();

		add_action( 'genesis_setup', [ $this, 'setup_child_theme' ], 15 );
		add_filter( 'genesis_theme_settings_defaults', [ $this, 'set_theme_settings_defaults' ] );
		add_action( 'after_switch_theme', [ $this, 'update_theme_settings_defaults' ] );
		add_action( 'body_class', [ $this, 'add_gutenberg_class' ] );
		add_action( 'body_class', [ $this, 'add_search_class' ] );

		new DetectJS();
		new Admin();
		new Formatting();
		new EnqueueAssets();
		new Menu();
		new Header();
		new Sidebar();
		new Comments();
		new Post();
		new Footer();

	}

	/**
	 * Constants that will be used with the theme.
	 *
	 * @since 1.0.0
	 */
	private function init_constants() {
		$child_theme = wp_get_theme();

		define( 'CHILD_THEME_NAME', $child_theme->get( 'Name' ) );
		define( 'CHILD_THEME_URL', $child_theme->get( 'ThemeURI' ) );
		define( 'CHILD_THEME_VERSION', $child_theme->get( 'Version' ) );
		define( 'CHILD_TEXT_DOMAIN', $child_theme->get( 'TextDomain' ) );
		define( 'CHILD_THEME_DIR', get_stylesheet_directory() );

		// GRANDCHILD PLUGIN.
		define( 'GRANDCHILD_PLUGIN_DIR', WP_PLUGIN_DIR . '/virtuoso-grandchild/' );
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
	 * Add body class if the page is search page
	 *
	 * @since 2.4.1
	 *
	 * @param array $classes the body classes.
	 *
	 * @return array
	 */
	public function add_search_class( $classes ) {
		if ( is_search() ) {
			$classes[] .= 'search-page';
			$classes[] .= 'archive';
		}

		return $classes;
	}

	/**
	 * Check to see if Gutenburg is active on a page
	 *
	 * @since 2.1.8
	 *
	 * @param array $classes the body classes.
	 *
	 * @return array
	 */
	public function add_gutenberg_class( $classes ) {
		if ( function_exists( 'the_gutenberg_project' ) && has_blocks( get_the_ID() ) ) {
			$classes[] = 'gutenberg-page';
		}

		return $classes;
	}

	/**
	 * Unregister Genesis callbacks.  We do this here because the child theme loads before Genesis.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function unregister_genesis_callbacks() {
		$config = $this->get_theme_settings_defaults();
		Menu::unregister_menu_callbacks();
		Header::unregister_header_callbacks();
		Footer::unregister_footer_callbacks();
	}

	/**
	 * Adds theme supports to the site.
	 *
	 * @since 1.0.0
	 *
	 * @param array $config the genesis theme config options.
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
	 * @param array $config the genesis theme config options.
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
	 * @param array $defaults theme settings defaults.
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
