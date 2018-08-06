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
namespace ErhardLabs\Virtuoso;

add_action( 'genesis_setup', __NAMESPACE__ . '\setup_child_theme', 15 );
/**
 * Setup child theme.
 *
 * @since 1.0.3
 *
 * @return void
 */
function setup_child_theme() {

	$config = get_configuration_parameters();

	load_child_theme_textdomain( CHILD_TEXT_DOMAIN, apply_filters( 'child_theme_textdomain', CHILD_THEME_DIR . '/languages', CHILD_TEXT_DOMAIN ) );

	unregister_genesis_callbacks();

	adds_theme_supports(  $config['add_theme_support'] );
	adds_new_image_sizes( $config['theme_image_sizes']  );
}


//add_action('upload_mimes', __NAMESPACE__ . '\add_file_types_to_uploads');
/**
 * Support other file types to upload
 *
 * @since 1.0.5
 *
 * @param array $file_types
 *
 * @return array $file_types
 */
function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
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
function adds_theme_supports( array $config ) {

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
function adds_new_image_sizes( array $config ) {

	foreach( $config as $name => $args ) {
		$crop = array_key_exists( 'crop', $args ) ? $args['crop'] : false;

		add_image_size( $name, $args['width'], $args['height'], $crop );
	}
}

add_filter( 'genesis_theme_settings_defaults', __NAMESPACE__ . '\set_theme_settings_defaults' );
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
	$config = get_theme_settings_defaults();

	$defaults = wp_parse_args( $config, $defaults );

	return $defaults;
}

add_action( 'after_switch_theme', __NAMESPACE__ . '\update_theme_settings_defaults' );
/**
 * Sets the theme setting defaults.
 *
 * @since 1.0.0
 *
 * @return void
 */
function update_theme_settings_defaults() {

	$config = get_theme_settings_defaults();

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
function get_theme_settings_defaults() {
	return get_configuration_parameters( 'theme_default_settings' );
}


/**
 * Get the project settings defaults.
 *
 * @since 1.0.5
 *
 * @return array
 */
function get_project_settings_defaults() {
	return get_configuration_parameters( 'project_settings' );
}



