<?php
defined( 'ABSPATH' ) || exit;
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'virtuoso_404');

function virtuoso_404()
{
    echo genesis_html5() ? '<article class="entry">' : '<div class="post hentry">';
	add_action( 'genesis_404_entry', '<div class="wrap">', 7 );
	add_action( 'genesis_404_entry', '</div>');


	printf('<h1 class="entry-title">%s</h1>', apply_filters('genesis_404_entry_title', __('Error 404', 'virtuoso')));

	echo '<div class="entry-content">';
	echo apply_filters('genesis_404_entry_content', '<p>' . 'ooops, something went wrong.' . '</p>');

	?>

    <div id="parallax">
        <div class="parallax_wrap">

            <img src="/wp-content/themes/virtuoso/assets/images/parallax3.png" />

            <img src="/wp-content/themes/virtuoso/assets/images/parallax2.png" />

            <img src="/wp-content/themes/virtuoso/assets/images/parallax1.png" />

        </div>
    </div>

	<?php
}

genesis();