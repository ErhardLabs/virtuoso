let mix = require('laravel-mix');

/*
 * Sets the development path to assets. By default, this is the `/resources`
 * folder in the theme.
 */
const devPath  = 'assets';

mix.setPublicPath( 'dist' );

/*
 * Copy node modules we want in our project
 *
 * @link https://laravel.com/docs/5.6/mix#copying-files-and-directories
 */

mix.copy('node_modules/animate.css/animate.min.css', 'dist/styles/animate.min.css');
mix.copy('node_modules/waypoints/lib/jquery.waypoints.min.js', 'dist/js/jquery.waypoints.min.js');

/*
 * Set Laravel Mix options.
 *
 * @link https://laravel.com/docs/5.6/mix#postcss
 * @link https://laravel.com/docs/5.6/mix#url-processing
 */
mix.options( {
  postCss        : [ require( 'postcss-preset-env' )() ],
  processCssUrls : false
} );


/*
 * Builds sources maps for assets.
 *
 * @link https://laravel.com/docs/5.6/mix#css-source-maps
 */
mix.sourceMaps();


/*
 * Versioning and cache busting. Append a unique hash for production assets. If
 * you only want versioned assets in production, do a conditional check for
 * `mix.inProduction()`.
 *
 * @link https://laravel.com/docs/5.6/mix#versioning-and-cache-busting
 */
mix.version();

/*
 * Compile JavaScript.
 *
 * @link https://laravel.com/docs/5.6/mix#working-with-scripts
 */

mix.js(`${devPath}/js/app.js`, 'js');


/*
 * Compile CSS. Mix supports Sass, Less, Stylus, and plain CSS, and has functions
 * for each of them.
 *
 * @link https://laravel.com/docs/5.6/mix#working-with-stylesheets
 * @link https://laravel.com/docs/5.6/mix#sass
 * @link https://github.com/sass/node-sass#options
 */

// Sass configuration.
let sassConfig = {
  outputStyle : 'expanded',
  indentType  : 'tab',
  indentWidth : 1
};

mix.sass( `${devPath}/sass/style.scss`, 'styles', sassConfig );


/*
 * Monitor files for changes and inject your changes into the browser.
 *
 * @link https://laravel.com/docs/5.6/mix#browsersync-reloading
 */
// mix.browserSync( {
//   proxy : 'https://tylerpaulsonpictures.test',
//   port  : 8080,
//   files : [
//     '**/*.{jpg,jpeg,png,gif,svg,eot,ttf,woff,woff2,js,css}',
//     `/lib/**/*.php`
//   ]
// } );