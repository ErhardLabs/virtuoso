const mix = require( 'laravel-mix' );
const fs = require( 'fs-extra' );

/*
 * Sets the development path to assets. By default, this is the `/resources`
 * folder in the theme.
 */
const devPath = 'assets';

mix.setPublicPath( 'dist' );

const sassPath = `${devPath}/sass/`;
const grandchildPath = '../../plugins/virtuoso-grandchild/';
const browsersyncConf = `${grandchildPath}browsersync.conf`;
const grandchildSassPath = `${grandchildPath}assets/sass/`;

const config = {
  sassPath,
  grandchildSassPath
};

/*
 * Remove assets/sass/style.scss and dynamically load imported files
 * This is useful for when you want to add custom styles in a plugin
 *
 */
fs.removeSync( `${sassPath}style.scss` );
fs.writeFile( `${sassPath}style.scss`, buildImports() );
fs.appendFile( `${sassPath}style.scss`, '// DO NOT MODIFY. This file is being generated dynamically through the webpack.mix.js file in the theme root directory' );

/**
 * Build up the contents of the sass import file.
 *
 * @return {string}
 */
function buildImports() {
  let imports = [];
  imports.push( '../../node_modules/sass-rem/rem' );
  imports.push( 'utilities/index' );

  if ( fs.pathExistsSync( `${grandchildSassPath}utilities/index.scss` ) ) {
    imports.push( config.grandchildSassPath + 'utilities/index' );
  }

  imports.push( 'base/index' );
  imports.push( 'layouts/index' );
  imports.push( 'components/index' );
  imports.push( 'templates/index' );
  imports.push( 'plugins/index' );

  if ( fs.pathExistsSync( `${grandchildSassPath}style.scss` ) ) {
    imports.push( config.grandchildSassPath + 'style' );
  }

  let toImport = '';
  imports.forEach( function( sassPath ) {
    toImport += '@import \'' + sassPath + '\';\n';
  });

  return toImport;
}

/*
 * Set Laravel Mix options.
 *
 * @link https://laravel.com/docs/5.6/mix#postcss
 * @link https://laravel.com/docs/5.6/mix#url-processing
 */
mix.options({
  postCss: [
    require( 'postcss-preset-env' ) ({
      autoprefixer: { grid: true }
    }) ],
  processCssUrls: false
});


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

mix.js( `${devPath}/js/app.js`, 'js' );

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
  outputStyle: 'expanded',
  indentType: 'tab',
  indentWidth: 1
};

mix.sass( `${devPath}/sass/style.scss`, 'styles', sassConfig );


/*
 * Add custom Webpack configuration.
 *
 * Laravel Mix doesn't currently minimize images while using its `.copy()`
 * function, so we're using the `CopyWebpackPlugin` for processing and copying
 * images into the distribution folder.
 *
 * @link https://laravel.com/docs/5.6/mix#custom-webpack-configuration
 * @link https://webpack.js.org/configuration/
 */
mix.webpackConfig({
  stats: 'minimal',
  devtool: mix.inProduction() ? false : 'source-map',
  performance: { hints: false    },
  externals: { jquery: 'jQuery' }

});


if ( process.env.sync ) {

  /*
* Check to see if there is a browsersync configuration file in the virtuoso grandchild plugin
*
*/

  if ( fs.pathExistsSync( browsersyncConf ) ) {

    let conf = fs.readFileSync( browsersyncConf, 'utf8' );

    /*
       * Monitor files for changes and inject your changes into the browser.
       *
       * @link https://laravel.com/docs/5.6/mix#browsersync-reloading
       */
    mix.browserSync({
      proxy: conf,
      files: [
        'dist/**/*',
        'Lib/**/*',
        'functions.php'
      ] });


  } else {
    console.log( '\x1b[31m%s\x1b[0m', 'ERROR: No configuration file found for browser sync in the virtuoso-grandchild plugin. If you want to use browsersync with this project then please add a browsersync.conf file to the root directory of the virtuoso-grandchild plugin. The browsersync.conf file should only contain the url of the site you are working on (example.test)' );
    process.exit( 1 );
  }
}

