<?php
defined( 'ABSPATH' ) || exit;
?>
<div class="search-and-header-right-container">
	<div class="search-and-header-right-wrap">
			<form action="<?php echo home_url();?>" method="get">
				<?php //wp_nonce_field( 'header_search_action', 'header_search_nonce' ); ?>
                <label for="search" class="search-input-wrap">
                    <button type="submit"><i class="search ti-search"></i></button>
                    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'virtuoso' ) ?></span>
                    <input name="s" type="text" value="<?php
                    if ( get_search_query() ) {
	                    echo esc_attr( get_search_query() );
                    } else {
                    	echo "Search";
                    }
                    ?>">
                </label>
			</form>
        <ul class="header-right">
        <?php include_once CHILD_DIR . '/Lib/Views/header-web-application-right.php'?>
        </ul>
		<?php include_once CHILD_DIR . '/Lib/Views/header-web-application-menu.php'?>
    </div>
</div>
