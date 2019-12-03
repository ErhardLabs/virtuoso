<?php

remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

add_action('genesis_entry_footer', 'virtuoso_display_latest_posts');

add_action('genesis_after_header', 'virtuoso_header_image_spacing');
function virtuoso_header_image_spacing() {

    ?>
        <div class="image-spacing"></div>

  <?php

}


function virtuoso_display_latest_posts() {
  ?>

  <div class="virtuoso-block latest_posts">
  <h3>Latest Posts</h3>
<div class="latest_posts_wrap">
	<?php new \Virtuoso\Lib\Components\Latest_Posts(); ?>
</div>
</div>
<?php
}

genesis();