<?php
/**
 * Asset loader handler.
 *
 * @package     Virtuoso\lib\Functions
 * @since       2.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */
namespace Virtuoso\Lib\Functions;

use Virtuoso\Lib\Structure\Sidebar;

defined( 'ABSPATH' ) || exit;
/**
 * Class EnqueueAssets.
 */
class EnqueueAssets {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
		add_filter( 'stylesheet_uri', [ $this, 'replace_default_style_sheet' ], 10, 2 );
	}

	/**
	 * Enqueue Scripts and Styles.
	 *
	 * @since 1.0.2
	 *
	 * @return void
	 */
	public function enqueue_assets() {

		wp_enqueue_script( CHILD_TEXT_DOMAIN . '-app', CHILD_URL . '/dist/js/app.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

		$localized_script_args = array(
			'mainMenu' => '',
			'subMenu'  => __( 'Menu', 'virtuoso' ),
		);

		$localized_script_args['sidebar_options'] = Sidebar::get_user_options();

		wp_localize_script( CHILD_TEXT_DOMAIN . '-app', 'virtuosoLocalizedArgs', $localized_script_args );
	}

	/**
	 * Enqueue the style sheet in the dist folder
	 *
	 * @since 1.0.7
	 *
	 * @return string
	 */
	public function replace_default_style_sheet() {

		return CHILD_URL . '/dist/styles/style.css';

	}

}
