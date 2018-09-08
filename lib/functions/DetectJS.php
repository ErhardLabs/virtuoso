<?php
/**
 * Created by PhpStorm.
 * User: sumnererhard
 * Date: 9/8/18
 * Time: 12:32 PM
 */

namespace Virtuoso\Lib\Functions;


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
	 * @since 1.0.5
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
	 * @since 1.0.5
	 *
	 * @param array
	 *
	 * @return string
	 */
	function javascript_detection_body_class( $classes ) {

		return array_merge( $classes, array( 'virtuoso-no-js' ) );

	}
}