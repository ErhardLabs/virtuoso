<?php
/**
 * Block Name: Centered Welcome
 */
?>

<?php
global $post;
?>

<section class="cs-testimonial container-site">
  <div class="cs-block-offset ">
    <?php if(get_field('header')) : ?>
      <h2><?php the_field('header'); ?></h2>
    <?php endif; ?>

    <?php if(get_field('subtitle')) : ?>
      <h6><?php the_field('subtitle'); ?></h6>
    <?php endif; ?>
  </div>
</section>