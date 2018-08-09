'use strict';

const gulp = require('gulp'),

  // JS SRC & BUILD Directories
  theme_jsSRC = 'assets/js/src',
  theme_jsDIST = 'assets/js/dist',

  // JS Processes
  babel = require('gulp-babel'),
  buffer = require('vinyl-buffer'),
  uglify = require('gulp-uglify'),


  // Sass/CSS processes
  sass = require('gulp-sass'),
  postcss = require('gulp-postcss'),
  autoprefixer = require('autoprefixer'),
  sourcemaps = require('gulp-sourcemaps'),
  cssMinify = require('gulp-cssnano'),
  sassLint = require('gulp-sass-lint'),
  cssMQPacker = require('css-mqpacker'),
  connect = require('gulp-connect-php'),
  browserSync = require('browser-sync').create(),

  // Utilities
  dir = require('node-dir'),
  del = require('del'),
  rename = require('gulp-rename'),
  notify = require('gulp-notify'),
  gutil = require('gulp-util'),
  plumber = require('gulp-plumber');

/*************
 * Utilities
 ************/

/**
 * Error handling
 *
 * @function
 */
function handleErrors() {
  let args = Array.prototype.slice.call(arguments);

  notify.onError({
    title: 'Task Failed [<%= error.message %>',
    message: 'See console.',
    sound: 'Sosumi' // See: https://github.com/mikaelbr/node-notifier#all-notification-options-with-their-defaults
  }).apply(this, args);

  gutil.beep(); // Beep 'sosumi' again

  // Prevent the 'watch' task from stopping
  this.emit('end');
}

/*************
 * JS Tasks
 ************/

/**
 * Theme JS es6 Task Handler
 */
gulp.task('themeJS', (done) => {
  dir.readFiles(theme_jsSRC, {
      match: /.js$/,
      exclude: /^.+\.min\.js$/ // exclude minified files
    },
    function(err, content, next) {
      if (err) throw err;
      next();
    },
    function(err, files){
      if (err) throw err;
      return gulp.src(files)
        .pipe(plumber({
          errorHandler: handleErrors
        }))
        .pipe(babel({
          "presets": ['env']
        }))
        .pipe( rename({ extname: '.min.js'}) )
        .pipe( buffer() )
        .pipe( sourcemaps.init({ loadMaps: true }) )
        .pipe( uglify() )
        .pipe( sourcemaps.write( './' ) )
        .pipe( gulp.dest(theme_jsDIST) )
    });

  done();

});


gulp.task('js', gulp.series('themeJS'));

/*************
 * CSS Tasks
 ************/

/**
 * PostCSS Task Handler
 */
gulp.task('postcss', () => {

  return gulp.src('assets/sass/style.scss')

  // Error handling
    .pipe(plumber({
      errorHandler: handleErrors
    }))

    // Wrap tasks in a sourcemap
    .pipe(sourcemaps.init())

    .pipe(sass({
      errLogToConsole: true,
      outputStyle: 'expanded' // Options: nested, expanded, compact, compressed
    }))

    .pipe(postcss([
      autoprefixer({
        browsers: ['defaults']
      }),
      cssMQPacker({
        sort: true
      })
    ]))

    // creates the sourcemap
    .pipe(sourcemaps.write())

    .pipe(gulp.dest('./'))

    .pipe(browserSync.reload({ stream: true}));

});

gulp.task('css:minify', () => {
  return gulp.src('style.css')
  // Error handling
    .pipe(plumber({
      errorHandler: handleErrors
    }))

    .pipe(cssMinify({
      safe: true
    }))
    .pipe(rename('style.min.css'))
    .pipe(gulp.dest('./'))
    .pipe(notify({
      message: 'Styles are built.'
    }))


});

gulp.task('sass:lint', (done) => {
  gulp.src([
    'assets/sass/style.scss',
    '!assets/sass/base/html5-reset/_normalize.scss',
    '!assets/sass/utilities/animate/**/*.*'
  ])
    .pipe(sassLint())
    .pipe(sassLint.format())
    .pipe(sassLint.failOnError());
  done();
});

gulp.task('styles', gulp.series('sass:lint', 'css:minify', 'postcss'), function (done) {
  done();
});

/**
 * Browsersync
 */
gulp.task('sync', (done) => {
  let files = [
    './style.css',
    './*.php'
  ];

  //Initialize Browsersync with a PHP server.
  connect.server({}, function () {
    browserSync.init(files, {
      proxy: 'https://tylerpaulsonpictures.test/'
    });

  });
  done();

});

/**
 * Individual tasks.
 */

gulp.task('clean', () => {
  return del([
    theme_jsDIST
  ], {force:true} );
});

/********************
 * All Tasks Listeners
 *******************/


gulp.task('watch:code', () => {
  gulp.watch('./assets/sass/**/*.scss', gulp.series('styles'));
  gulp.watch('./assets/js/src/*.js', gulp.series('js') );
  // gulp.watch('./**/*.php').on('change', function() {
  //   reload();
  // });

});

function reload(done) {
  browserSync.reload({ stream: false});
  done();
}

gulp.task('build', gulp.series('clean', 'styles', 'js' ) );

gulp.task('watch', gulp.series('build', 'watch:code') );

