<?php

namespace Virtuoso\Lib;

class Helper {

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
