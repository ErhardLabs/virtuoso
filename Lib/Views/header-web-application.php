<?php
defined( 'ABSPATH' ) || exit;
?>

<div id="site-navigation" class="navigation-container">
	<?php
		genesis_do_nav();
	?>
	<div class="header-right-container">
		<div class="header-right-wrap">
			<a class="header-search-toggle"><i class="search ti-search"></i></a>
			<ul class="header-right">
				<?php require_once CHILD_DIR . '/Lib/Views/header-web-application-right.php'; ?>
			</ul>
			<?php require_once CHILD_DIR . '/Lib/Views/header-web-application-menu.php'; ?>
		</div>
	</div>
</div>
<div class="header-search-container" aria-expanded="false">
	<form action="<?php echo esc_html( home_url() ); ?>" method="get">
	<label for="search" class="search-input-wrap">
		<button type="submit"><i class="search ti-search"></i></button>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'virtuoso' ); ?></span>
		<input name="s" type="text" value="<?php echo ( get_search_query() ) ? esc_attr( get_search_query() ) : 'Search'; ?>">
	</label>
	</form>
</div>
