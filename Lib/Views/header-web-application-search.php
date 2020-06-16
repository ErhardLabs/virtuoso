<?php
defined( 'ABSPATH' ) || exit;
?>
<div class="search-and-header-right-container">
	<div class="search-and-header-right-wrap">
			<form action="<?php echo esc_html( home_url() ); ?>" method="get">
				<label for="search" class="search-input-wrap">
					<button type="submit"><i class="search ti-search"></i></button>
					<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'virtuoso' ); ?></span>
					<input name="s" type="text" value="<?php echo ( get_search_query() ) ? esc_attr( get_search_query() ) : 'Search'; ?>">
				</label>
			</form>
		<ul class="header-right">
		<?php require_once CHILD_DIR . '/Lib/Views/header-web-application-right.php'; ?>
		</ul>
		<?php require_once CHILD_DIR . '/Lib/Views/header-web-application-menu.php'; ?>
	</div>
</div>
