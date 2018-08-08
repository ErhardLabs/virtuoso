<?php
/**
 * Menu HTML markup structure
 *
 * @package     ErhardLabs\Virtuoso
 * @since       1.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */
namespace ErhardLabs\Virtuoso;

global $project_config;

$project_config = get_theme_settings_defaults();

/**
 * Unregister menu callbacks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_menu_callbacks() {

	$project_config = get_theme_settings_defaults();

	remove_action( 'genesis_after_header', 'genesis_do_nav' );

	if ( $project_config['header-design']['logo-left'] ) {
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

add_filter( 'body_class', __NAMESPACE__ . '\set_header_class' );

function set_header_class( $classes ) {

	global $project_config;

	if ( $project_config['header-design']['logo-left'] ) {
		$classes['class'] .= ' logo-left';
	} else {
		$classes['class'] .= ' logo-middle';
	}

	return $classes;
}

add_filter( 'wp_nav_menu_args', __NAMESPACE__ . '\setup_secondary_menu_args' );
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

if ( $project_config['header-design']['logo-middle'] ) {
	add_filter( 'genesis_after_header', __NAMESPACE__ . '\render_header_menu' );
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

add_filter( 'wp_nav_menu_items', __NAMESPACE__ . '\add_menu_items', 10, 2 );
/**
 * Add addition menu items to navigation
 *
 * @since 1.0.4
 *
 * @param string $menu
 * @param array $args
 *
 * @return string
 */
function add_menu_items( $menu, $args ) {

	if ( 'primary' === $args->theme_location ) {
		$menu .= '<li class="menu-item menu-email"><a href="#"><span class="ti-email"></span></a></li>';
		$menu .= '<li class="menu-item menu-cart"><a href="#"><span class="ti-shopping-cart"></span></a></li>';
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
