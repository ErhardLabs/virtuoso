<?php
defined('ABSPATH') || exit;

if (is_user_logged_in()) : ?>
	<ul class="virtuoso-user-profile-menu" role="navigation" data-open="false">
        <?php do_action( 'virtuoso_user_profile_menu_links' ) ?>
	</ul>
<?php endif; ?>
