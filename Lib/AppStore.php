<?php
/**
 * Mediator and state management
 *
 * @package     Virtuoso\lib
 * @since       2.1.7
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib;


class AppStore {
	protected $events = array();

	public function addListener( $obj, $callback ) {
		if ( ! isset( $this->events[ $obj ] ) ) {
			$this->events[ $obj ] = array();
		}
		$this->events[ $obj ][] = $callback;
	}


}