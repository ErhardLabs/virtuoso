<div class="post">
    <div class="post_wrap">
      <div class="featured_image_wrap">
          <a href="<?php echo get_the_permalink()?>"><?php the_post_thumbnail('thumbnail'); ?></a>
      </div>
      <div class="info_wrap">
	    <a href="<?php echo get_the_permalink()?>"><h4><?php echo get_the_title();?></h4></a>
        <p class="post_excerpt"><?php echo mb_strimwidth(get_the_content(), 0, 120, '...');?></p>
        <a href="<?php echo get_the_permalink()?>">Read more <i class="ti-arrow-right"></i></a>
      </div>
    </div>
</div>