<?php
defined( 'ABSPATH' ) || exit;

if ( is_user_logged_in() ) {
    // Add buddy press profile link if user is logged in
    echo '<li id="user-menu-button" class="menu-item user-image" aria-expanded="false"><img src="' . esc_url( get_avatar_url( get_current_user_id() ) ) . '" alt="user-profile-photo"></li>';
} else {
    echo '<li class="menu-item menu-sign-up"><a href="' . esc_url( site_url( '/wp-login.php?action=register&redirect_to=' . get_permalink() ) ) . '">Sign Up</a></li>';
    echo '<li class="menu-item menu-login phoen-login-signup-popup-open"><a href="' . esc_url( wp_login_url() ) . '">Login</a></li>';
}