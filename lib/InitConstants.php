<?php
/**
 * Theme initialization
 *
 * @package     Virtuoso\lib
 * @since       1.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */
namespace Virtuoso\Lib;


/**
 * Initialize the theme's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */
class InitConstants {
	public function __construct() {
		$child_theme = wp_get_theme();

		define( 'CHILD_THEME_NAME', $child_theme->get( 'Name' ) );
		define( 'CHILD_THEME_URL', $child_theme->get( 'ThemeURI' ) );
		define( 'CHILD_THEME_VERSION', $child_theme->get( 'Version' ) );
		define( 'CHILD_TEXT_DOMAIN', $child_theme->get( 'TextDomain' ) );

		define( 'CHILD_THEME_DIR', get_stylesheet_directory() );
		define( 'CHILD_CONFIG_DIR', CHILD_THEME_DIR . '/config/' );
	}
}