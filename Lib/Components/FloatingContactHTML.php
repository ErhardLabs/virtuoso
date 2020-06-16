<?php
/**
 * Floating Contact button
 *
 * @package     Virtuoso\Lib\Components
 * @since       2.1.7
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Components;

use Virtuoso\Lib\Admin\Customizer\CustomizerHelpers;

defined( 'ABSPATH' ) || exit;

/**
 * Class Background_Image.
 */
class FloatingContactHTML {

	public $display_floating_contact;
	public $contact_url;
	public $contact_inner_text;

	public function __construct() {
		$prefix = CustomizerHelpers::get_settings_prefix();

		$this->contact_url        = get_theme_mod( 'genesis-settings' )[ $prefix . '_contact_url' ];
		$this->contact_inner_text = get_theme_mod( 'genesis-settings' )[ $prefix . '_contact_inner_text' ];

		$this->display_floating_contact = get_theme_mod( 'genesis-settings' )[ $prefix . '_display_floating_contact' ];
		$this->display();

	}

	public function display() {

		if ( $this->display_floating_contact ) {
			echo '<div id="floatingContact">';
			echo '<a class="button floating-contact" href="' . esc_url( $this->contact_url ) . '">' . wp_kses_post( $this->contact_inner_text ) . '</a>';
			echo '</div>';
		}

	}

}
