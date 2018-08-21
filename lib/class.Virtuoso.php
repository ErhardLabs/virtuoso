<?php
/**
 * Setup your child theme
 *
 * @package     ErhardLabs\Virtuoso
 * @since       1.0.3
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */
namespace Theme;

class Virtuoso {

	/**
	 * The single instance of the class.
	 *
	 * @var Virtuoso
	 * @since 1.2.8
	 */
	protected static $_instance = null;

	public function __construct() {

		add_action( 'genesis_setup', array($this, 'setup_child_theme') , 15 );
		add_filter( 'genesis_theme_settings_defaults', array($this, 'set_theme_settings_defaults' ) );
		add_action( 'after_switch_theme', array($this, 'update_theme_settings_defaults' ) );

	}

	/**
	 * Main Virtuoso Instance.
	 *
	 * Ensures only one instance of Virtuoso is loaded or can be loaded.
	 *
	 * @since 1.2.7
	 * @static
	 * @return Virtuoso - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
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

		$this->adds_theme_supports(  $config['add_theme_support'] );
		$this->adds_new_image_sizes( $config['theme_image_sizes']  );
	}

	/**
	 * Unregister Genesis callbacks.  We do this here because the child theme loads before Genesis.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function unregister_genesis_callbacks() {
		unregister_menu_callbacks();
		unregister_header_callbacks();
		unregister_sidebar_callbacks();
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
	public static function adds_theme_supports( array $config ) {

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
	public static function adds_new_image_sizes( array $config ) {

		foreach( $config as $name => $args ) {
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
	function set_theme_settings_defaults( array $defaults ) {
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
	function update_theme_settings_defaults() {

		$config = $this->get_theme_settings_defaults();

		if ( function_exists( 'genesis_update_settings' ) ) {
			genesis_update_settings( $config );
		}

		update_option( 'posts_per_page', $config['blog_cat_num'] );
	}

	/**
	 * Get the theme settings defaults.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public static function get_theme_settings_defaults() {
		return Virtuoso::get_configuration_parameters( 'theme_default_settings' );
	}

	/**
	 * Get runtime configuration parameters.
	 *
	 * @since 1.0.5
	 *
	 * @param string $key Configuration parameter key
	 * @param string $config_file (Optional) Configuration filename without the extension.
	 *
	 * @return array|null|mixed
	 */
	public static function get_configuration_parameters( $key = '', $config_file = 'theme-setup' ) {

		static $config = array();

		if ( ! $config_file ) {
			return;
		}

		if ( ! array_key_exists( $config_file, $config ) ) {
			$config[ $config_file ] = (array) include( CHILD_THEME_DIR . '/config/' . $config_file . '.php' );
		}

		if ( ! $key ) {
			return $config[ $config_file ];
		}

		if ( array_key_exists( $key, $config[ $config_file ] ) ) {
			return $config[ $config_file ][ $key ];
		}
	}

}
