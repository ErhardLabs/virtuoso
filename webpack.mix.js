let mix = require('laravel-mix');

mix.setPublicPath( 'dist' );

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

mix.js('assets/js/app.js', 'js');


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

mix.sass( 'assets/sass/style.scss', 'styles', sassConfig );


/*
 * Monitor files for changes and inject your changes into the browser.
 *
 * @link https://laravel.com/docs/5.6/mix#browsersync-reloading
 */
mix.browserSync( {
  proxy : 'https://virtuoso.test',
  port  : 8080,
  files : [
    '**/*.{jpg,jpeg,png,gif,svg,eot,ttf,woff,woff2,js,css}',
    `/lib/**/*.php`
  ]
} );