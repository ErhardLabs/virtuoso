<?php

remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

add_action('genesis_entry_footer', 'virtuoso_display_latest_posts');


function virtuoso_display_latest_posts() {
  ?><h3>Latest Posts</h3><?php
  new \Virtuoso\Lib\Components\Latest_Posts();
}

genesis();