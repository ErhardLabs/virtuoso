let mix = require('laravel-mix');
let fs = require('fs-extra');

/*
 * Sets the development path to assets. By default, this is the `/resources`
 * folder in the theme.
 */
const devPath = 'assets';

mix.setPublicPath('dist');

let sassPath = 'assets/sass/';
let grandchildSassPath = '../../plugins/virtuoso-grandchild/assets/sass/';

const config = {
  sassPath,
  grandchildSassPath
};

/*
 * Remove assets/sass/style.scss and dynamically load imported files
 * This is useful for when you want to add custom styles in a plugin
 *
 */
fs.removeSync('assets/sass/style.scss');
fs.writeFile('assets/sass/style.scss', buildImports());

/**
 * Build up the contents of the sass import file.
 *
 * @return {string}
 */
function buildImports() {
  let imports = [];

  imports.push('../../node_modules/sass-rem/rem');
  imports.push('utilities/index');

  if (fs.pathExistsSync('../../plugins/virtuoso-grandchild/assets/sass/utilities/index.scss') ) {
    imports.push(config.grandchildSassPath + 'utilities/index');
  }

  imports.push('base/index');
  imports.push('layouts/index');
  imports.push('components/index');
  imports.push('views/index');

  if (fs.pathExistsSync('../../plugins/virtuoso-grandchild/assets/sass/style.scss')) {
    imports.push(config.grandchildSassPath + 'style');
  }

  let toImport = '';
  imports.forEach(function (sassPath) {
    toImport += "@import '" + sassPath + "';\n";
  });

  return toImport;
}

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