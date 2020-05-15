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

	public $displayFloatingContact;
	public $contactURL;

	public function __construct() {
		$prefix = CustomizerHelpers::get_settings_prefix();

		$this->contactURL = get_theme_mod('genesis-settings')[$prefix.'_contact_url'];
		$this->contactInnerText = get_theme_mod('genesis-settings')[$prefix.'_contact_inner_text'];

		$this->displayFloatingContact = get_theme_mod( 'genesis-settings')[$prefix . '_display_floating_contact'];
		$this->display();

	}

	public function display() {

		if ( $this->displayFloatingContact ) {
			echo '<div id="floatingContact">';
			echo '<a class="button floating-contact" href="' . $this->contactURL . '">' . $this->contactInnerText . '</a>';
			echo '</div>';
		}

	}

}