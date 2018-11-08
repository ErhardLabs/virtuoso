<?php
/**
 * Block Name: Testimonial
 */
?>

<?php
$cite_field = get_field('source_url');

if($cite_field) {
  $cite = 'cite="' . get_field('source_url') . '"';
} else {
  $cite = '';
}
?>

<section class="cs-testimonial container-site">
  <div class="cs-block-offset ">
    <div class="quote">
      <blockquote cite="<?php echo $cite; ?>">
        <p class="heading-4">“<?php the_field('testimonial'); ?>”</p>
      </blockquote>
    </div>
    <?php if(get_field('source')) : ?>
      <div class="source">
        <cite><?php the_field('source'); ?></cite>
      </div>
    <?php endif; ?>
  </div>
</section>