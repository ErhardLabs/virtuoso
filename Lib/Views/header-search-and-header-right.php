<div class="search-and-header-right-container">
	<div class="search-and-header-right-wrap">
			<form action="">
                <label class="search-input-wrap">
                    <button type="submit"><i class="search ti-search"></i></button>
                    <input type="text" placeholder="Search <?php bloginfo(); ?>" name="search">
                </label>
			</form>

			<div class="header-right">
				<?php
				if ( is_user_logged_in() ) {
					// Add buddy press profile link if user is logged in
					echo '<li id="user-menu-button" class="menu-item user-image" aria-expanded="false"><img src="' . get_avatar_url( get_current_user_id() ) . '"></li>';
					?>
                    <ul class="user-profile-menu" role="navigation" data-open="false">
                        <li><a href="/my-account">Profile</a></li>
                        <li class="user-profile-sep-after"><a href="/my-account/notifications">Notifications</a></li>
                        <li class="user-profile-sep-before"><a href="/my-account/settings">Settings</a></li>
                        <li><a href="/wp-login.php?action=logout">Logout</a></li>
                    </ul>

                    <?php
				} else {
					echo '<li class="menu-item create phoen-login-signup-popup-open"><a href="'. $this->loginButtonURL .'">Login</a></li>';
				}
				?>
			</div>
	</div>
</div>