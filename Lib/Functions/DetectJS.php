<?php
/**
 * Detect if the browser has JavaScript Enabled
 *
 * @package     Virtuoso\lib\Functions
 * @since       2.1.7
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Functions;

defined( 'ABSPATH' ) || exit;

/**
 * Class DetectJS.
 */
class DetectJS {

	public function __construct() {
		add_action( 'wp_loaded', [ $this, 'javascript_detection' ] );
	}

	function javascript_detection() {

		add_filter( 'body_class', [ $this, 'javascript_detection_body_class' ], 0 );
		add_action( 'genesis_before', [ $this, 'javascript_detection_script' ], 0 );

	}

	/**
	 * JS Detection Script
	 *
	 * @since 2.1.7
	 *
	 *
	 * @return string
	 */
	function javascript_detection_script() {
		echo "<script>document.body.className = document.body.className.replace(\"virtuoso-no-js\",\"virtuoso-js\");</script>\n";
	}

	/**
	 * Set virtuoso-no-js in the body class
	 *
	 * @since 2.1.7
	 *
	 * @param array
	 *
	 * @return string
	 */
	function javascript_detection_body_class( $classes ) {

		return array_merge( $classes, array( 'virtuoso-no-js' ) );

	}

	/**
	 * Get JavaScript status
	 *
	 * @since 2.1.7
	 *
	 *
	 * @return string
	 */
	public static function is_javascript_enabled() {
		$jsEnabled = false;

		if ( in_array( 'virtuoso-js', get_body_class() ) ) {
			$jsEnabled = true;
		}

		return $jsEnabled;
	}

}