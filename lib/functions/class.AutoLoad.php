<?php
/**
 * File autoloader
 *
 *
 * @package     ErhardLabs\Virtuoso
 * @since       1.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Theme\Functions;

class AutoLoad {

	public function __construct() {
		add_action( 'admin_init', array($this, 'load_admin_files' ) );

		add_action( 'widgets_init', array($this, 'load_widget_areas' ) );

		$this->load_nonadmin_files();
	}



	/**
	 * Loads non admin files.
	 *
	 * @since 1.0.1
	 *
	 * @return void
	 */
	function load_nonadmin_files() {
		$filenames = array(
			'components/customizer/css-handler.php',
			'components/customizer/helpers.php',
			'components/customizer/customizer.php',
			'components/customizer/class.virtuoso-customizer.php',

			'functions/formatting.php',
			'functions/load-assets.php',
			'functions/markup.php',

			'functions/woocommerce/ajax.php',
			'functions/woocommerce/customizations.php',
			'functions/woocommerce/form-fields.php',

			'structure/archive.php',
			'structure/comments.php',
			'structure/footer.php',
			'structure/header.php',
			'structure/menu.php',
			'structure/post.php',
			'structure/sidebar.php',
		);

		$this->load_specified_files( $filenames );
	}

	/**
	 * Load admin files.
	 *
	 * @since 1.0.1
	 *
	 * @return void
	 */
	function load_admin_files() {
		$filenames = array(
//      'components/widgets/class.virtuoso-widgets.php',
		);

		$this->load_specified_files( $filenames );
	}

	/**
	 * Load widget areas.
	 *
	 * @since 1.0.1
	 *
	 * @return void
	 */
	function load_widget_areas() {

		register_sidebar( array(
			'name' => __( 'Slide-Out Sidebar', 'virtuoso' ),
			'id' => 'slider',
			'description' => __( '', '' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		) );

	}

	/**
	 * Load each of the specified files.
	 *
	 * @since 1.0.0
	 *
	 * @param array $filenames
	 * @param string $folder_root
	 *
	 * @return void
	 */
	function load_specified_files( array $filenames, $folder_root = '' ) {
		$folder_root = $folder_root ?: CHILD_THEME_DIR . '/lib/';

		foreach( $filenames as $filename ) {
			include( $folder_root . $filename );
		}
	}


}
