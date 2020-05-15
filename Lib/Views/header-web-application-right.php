<div class="header-right">
	<?php
	if ( is_user_logged_in() ) {
		// Add buddy press profile link if user is logged in
		echo '<li id="user-menu-button" class="menu-item user-image" aria-expanded="false"><img src="' . get_avatar_url( get_current_user_id() ) . '"></li>';
		?>
		<ul class="user-profile-menu" role="navigation" data-open="false">
			<li><a href="<?php echo bp_loggedin_user_link(); ?>">Profile</a></li>
			<li class="user-profile-sep-after"><a href="<?php echo bp_loggedin_user_link() . 'notifications'; ?>">Notifications</a></li>
			<li class="user-profile-sep-before"><a href="<?php echo bp_loggedin_user_link() . 'settings'; ?>">Settings</a></li>
			<li><a href="<?php echo wp_logout_url(); ?>&redirect_to=/>">Logout</a></li>
		</ul>

		<?php
	} else {
		echo '<li class="menu-item menu-sign-up"><a href="' . site_url( '/wp-login.php?action=register&redirect_to=' . esc_url_raw( get_permalink() ) ) . '">Sign Up</a></li>';
		echo '<li class="menu-item menu-login phoen-login-signup-popup-open"><a href="' . esc_url( wp_login_url() ) . '">Login</a></li>';
	}
	?>
</div>
