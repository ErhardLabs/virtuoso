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
					echo '<li class="menu-item notifications"><a href="#"><i class="ti-bell"></i></a></li>';
					echo '<li class="menu-item user-image"><a href="/my-account"><img src="' . get_avatar_url( get_current_user_id() ) . '"></a></li>';
				} else {
					echo '<li class="menu-item create phoen-login-signup-popup-open"><a href="'. $this->loginButtonURL .'">Login</a></li>';
				}
				?>
			</div>
	</div>
</div>