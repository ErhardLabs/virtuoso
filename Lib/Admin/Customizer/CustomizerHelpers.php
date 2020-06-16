<?php
/**
 * Customizer helpers.
 *
 * @package     Virtuoso\lib
 * @since       2.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */
namespace Virtuoso\Lib\Admin\Customizer;

defined( 'ABSPATH' ) || exit;

/**
 * CustomizerHelpers.
 */
class CustomizerHelpers {

	/**
	 * Get the settings prefix.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function get_settings_prefix() {
		return 'virtuoso';
	}

	/**
	 * Get default link color for Customizer.
	 *
	 * Abstracted here since at least two functions use it.
	 *
	 * @since 1.0.0
	 *
	 * @return string Hex color code for link color.
	 */
	public static function get_default_link_color() {
		return '#c3251d';
	}

	/**
	 * Get default accent color for Customizer.
	 *
	 * Abstracted here since at least two functions use it.
	 *
	 * @since 1.0.0
	 *
	 * @return string Hex color code for accent color.
	 */
	public static function get_default_accent_color() {
		return '#c3251d';
	}

	/**
	 * Calculate Color Contrast.
	 *
	 * @since 1.0.0
	 *
	 * @param string $color
	 *
	 * @return string
	 */
	public static function calculate_color_contrast( $color ) {

		$hex_color = str_replace( '#', '', $color );

		$red   = hexdec( substr( $hex_color, 0, 2 ) );
		$green = hexdec( substr( $hex_color, 2, 2 ) );
		$blue  = hexdec( substr( $hex_color, 4, 2 ) );

		$luminosity = ( ( $red * 0.2126 ) + ( $green * 0.7152 ) + ( $blue * 0.0722 ) );

		return ( $luminosity > 128 ) ? '#333333' : '#ffffff';

	}

	/**
	 * Calculate Color Brightness.
	 *
	 * @since 1.0.0
	 *
	 * @param string     $color
	 * @param string|int $change
	 *
	 * @return string
	 */
	public static function calculate_color_brightness( $color, $change ) {

		$hex_color = str_replace( '#', '', $color );

		$red   = hexdec( substr( $hex_color, 0, 2 ) );
		$green = hexdec( substr( $hex_color, 2, 2 ) );
		$blue  = hexdec( substr( $hex_color, 4, 2 ) );

		$red   = max( 0, min( 255, $red + $change ) );
		$green = max( 0, min( 255, $green + $change ) );
		$blue  = max( 0, min( 255, $blue + $change ) );

		return '#' . dechex( $red ) . dechex( $green ) . dechex( $blue );

	}


	public static function live_preview( $settings ) {

		global $wp_customize;

		foreach ( $settings as $setting ) {
			$wp_customize->get_setting( $setting )->transport = 'postMessage';
		}

	}

}
