<?php
/**
 * Virtuoso helper functions
 *
 * @package     Virtuoso\lib
 * @since       2.1.7
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib;

/**
 * Class Helper.
 */
class Helper {

	/**
	 * Get the YouTube video ID
	 *
	 * @since 2.1.7
	 */
	public static function extract_video_id( $video_ink ) {
		if (($video_ink !== '') && ($video_ink !== NULL)) {

			if (strpos($video_ink, 'youtu.be') !== false) {
				$video_id = explode('youtu.be/', $video_ink)[1];
			} else {
				preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video_ink, $matches );
				$video_id = $matches[1];
			}
		} else {
			return false;
		}

		return $video_id;
	}

}
