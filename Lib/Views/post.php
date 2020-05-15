<?php
defined( 'ABSPATH' ) || exit;
?>
<div class="post">
	<div class="post_wrap">
	  <div class="featured_image_wrap">
		  <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
	  </div>
	  <div class="info_wrap">
		<a href="<?php echo esc_url( get_the_permalink() ); ?>"><h4><?php echo esc_html( get_the_title() ); ?></h4></a>
		<p class="post_excerpt"><?php echo esc_html( mb_strimwidth( get_the_excerpt(), 0, 120, '...' ) ); ?></p>
		<a href="<?php echo esc_url( get_the_permalink() ); ?>">Read more <i class="ti-arrow-right"></i></a>
	  </div>
	</div>
</div>
