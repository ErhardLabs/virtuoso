<?php
add_action( 'add_meta_boxes', 'add_video_background_meta_box' );

function add_video_background_meta_box() {
    add_meta_box(
        'video_background', // $id
        __('Video Background', CHILD_TEXT_DOMAIN, 'virtuoso'), // $title
        'show_background_video_meta_box', // $callback
        null, // $screen
        'normal', // $context
        'high' // $priority
    );
}


function show_background_video_meta_box() {
  global $post;
  $videoID = get_post_meta( $post->ID, 'video_id', true );
  $playlistID = get_post_meta( $post->ID, 'playlist_id', true );
  ?>

  <input type="hidden" name="background_video_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
  <input type="text" name="video_id" value="<?php echo (isset($videoID)) ? $videoID : ''; ?>" placeholder="Video ID">
  <input type="text" name="playlist_id" value="<?php echo (isset($playlistID)) ? $playlistID : ''; ?>" placeholder="Playlist ID">

<?php
}

function save_background_video_meta( $post_id ) {
  // verify nonce
  if ( !wp_verify_nonce( $_POST['background_video_meta_box_nonce'], basename(__FILE__) ) ) {
    return $post_id;
  }
  // check autosave
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return $post_id;
  }
  // check permissions
  if ( 'page' === $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) ) {
      return $post_id;
    } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
      return $post_id;
    }
  }

//  $oldVideoID = get_post_meta( $post_id, 'video_id', true );
//  $oldPlaylistID = get_post_meta( $post_id, 'playlist_id', true );
  $newVideoID = $_POST['video_id'];
  $newPlaylistID = $_POST['playlist_id'];


  update_post_meta( $post_id, 'video_id', $newVideoID );
  update_post_meta( $post_id, 'playlist_id', $newPlaylistID );


//  if ( $newVideoID && $newVideoID !== $oldVideoID ) {
//    update_post_meta( $post_id, 'video_id', $newVideoID );
//  } elseif ( '' === $newVideoID && $oldVideoID ) {
//    delete_post_meta( $post_id, 'video_id', $oldVideoID );
//  }
//
//  if ( $newPlaylistID && $newPlaylistID !== $oldPlaylistID ) {
//    update_post_meta( $post_id, 'playlist_id', $newPlaylistID );
//  } elseif ( '' === $newPlaylistID && $oldPlaylistID ) {
//    delete_post_meta( $post_id, 'playlist_id', $oldPlaylistID );
//  }

}
add_action( 'save_post', 'save_background_video_meta' );