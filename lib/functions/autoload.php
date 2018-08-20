<?php
/**
 * File autoloader
 *
 * We could use Composer, but it feels a bit heavy for the number of files we need to load up.  As this is procedural
 * and not OOP, we can handle loading the files directly right here in this file.  Now to add more files to be loaded,
 * well shucks you can do that right here.  A function is provided for each folder.
 *
 * Resist the temptation to add widgets, custom post types, taxonomies, and/or shortcodes in your theme.  Those features
 * go into a plugin and not in your theme.
 *
 * @package     ErhardLabs\Virtuoso
 * @since       1.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */
namespace ErhardLabs\Virtuoso;

/**
 * Loads non admin files.
 *
 * @since 1.0.1
 *
 * @return void
 */
function load_nonadmin_files() {
	$filenames = array(
		'setup.php',
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

	load_specified_files( $filenames );
}

add_action( 'admin_init', __NAMESPACE__ . '\load_admin_files' );
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

	load_specified_files( $filenames );
}


add_action( 'widgets_init', __NAMESPACE__ . '\load_widget_areas' );
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

/**
 * Get runtime configuration parameters.
 *
 * @since 1.0.5
 *
 * @param string $key Configuration parameter key
 * @param string $config_file (Optional) Configuration filename without the extension.
 *
 * @return array|null|mixed
 */
function get_configuration_parameters( $key = '', $config_file = 'theme-setup' ) {

	static $config = array();

	if ( ! $config_file ) {
		return;
	}

	if ( ! array_key_exists( $config_file, $config ) ) {
		$config[ $config_file ] = (array) include( CHILD_THEME_DIR . '/config/' . $config_file . '.php' );
	}

	if ( ! $key ) {
		return $config[ $config_file ];
	}

	if ( array_key_exists( $key, $config[ $config_file ] ) ) {
		return $config[ $config_file ][ $key ];
	}
}

load_nonadmin_files();
