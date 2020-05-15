<?php
defined( 'ABSPATH' ) || exit;
function get_page_from_slug( $page_slug ) {
	$page = get_page_by_path( $page_slug, OBJECT );
	return ( isset( $page ) ? true : false );
}

?>
<?php if ( get_page_from_slug( 'privacy-policy' ) ) : ?>
	<div class="footer-consent">
		<?php if ( get_page_from_slug( 'privacy-policy' ) ) : ?>
			<a href="/privacy-policy">Privacy Policy</a>
		<?php endif; ?>
		<?php if ( get_page_from_slug( 'terms-conditions' ) ) : ?>
			<a href="/terms-conditions">Terms & Conditions</a>
		<?php endif; ?>
		<?php if ( get_page_from_slug( 'cookie-policy' ) ) : ?>
			<a href="/cookie-policy">Cookie Policy</a>
		<?php endif; ?>
	</div>
<?php endif; ?>
