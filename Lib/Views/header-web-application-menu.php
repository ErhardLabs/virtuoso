<?php
defined( 'ABSPATH' ) || exit;

if ( is_user_logged_in() ) : ?>
<ul class="virtuoso-user-profile-menu" role="navigation" data-open="false">
    <li><a href="<?php echo esc_url( bp_loggedin_user_link() ); ?>">Profile</a></li>
    <li class="user-profile-sep-after"><a href="<?php echo esc_url( bp_loggedin_user_link() ) . 'notifications'; ?>">Notifications</a></li>
    <li class="user-profile-sep-before"><a href="<?php echo esc_url( bp_loggedin_user_link() ) . 'settings'; ?>">Settings</a></li>
    <li><a href="<?php echo esc_url( wp_logout_url() ); ?>&redirect_to=/>">Logout</a></li>
</ul>
<?php endif; ?>