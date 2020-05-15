<?php
/**
 * Created by PhpStorm.
 * User: gerhard
 * Date: 9/24/18
 * Time: 3:51 PM
 */

namespace Virtuoso\Lib\Components;
use Virtuoso\Lib\Admin\Customizer\CustomizerHelpers;

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