'use strict';

// For Browser-Sync
var siteURL = "http://gmtest.dev/"; // Change to the correct url
// also change the string in the RegExp() in the watch task near the bottom of this file to the correct stylesheet to be replaced.

var gulp         = require('gulp');
var sass         = require('gulp-sass');
var postcss      = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var sourcemaps   = require('gulp-sourcemaps');
var concat       = require('gulp-concat');
var cleancss     = require('gulp-clean-css');
var taskTime     = require('gulp-total-task-time');
var browserSync  = require('browser-sync').create();
var argv         = require('yargs').argv;
var uglify       = require('gulp-uglify');
var rename       = require('gulp-rename');
var objectFit	 = require('postcss-object-fit-images');


// Just a simple timer for displaying total task(s) run time.
taskTime.init();

gulp.task('default', ['sass', 'js']);


/**
 * Compile, autoprefix, and minify our custom sass and create a source map
 */
gulp.task('sass', function () {
    return gulp
        .src('sass/main.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compact'}).on('error', sass.logError))
        .pipe(postcss([autoprefixer(), objectFit]))
        .pipe(cleancss())
        .pipe(rename('main.min.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('css'))
        .pipe(browserSync.stream({match: '**/*.css'}));
});


gulp.task('js', function () {
    return gulp
        .src([
            'js/vendor/bootstrap/transition.js',
            'js/vendor/bootstrap/alert.js',
            'js/vendor/bootstrap/button.js',
            'js/vendor/bootstrap/carousel.js',
            'js/vendor/bootstrap/collapse.js',
            'js/vendor/bootstrap/dropdown.js',
            'js/vendor/bootstrap/modal.js',
            'js/vendor/bootstrap/tooltip.js',
            'js/vendor/bootstrap/popover.js',
            'js/vendor/bootstrap/scrollspy.js',
            'js/vendor/bootstrap/tab.js',
            'js/vendor/bootstrap/affix.js',
            'js/vendor/_*.js',
            'js/_main.js'
        ])
        .pipe(concat('scripts.min.js'))
        .pipe(gulp.dest('./js/'))
        .pipe(uglify())
        .pipe(gulp.dest('./js/'));
});


/**
 * Watches for changes in our sass files and calls the right task
 */
gulp.task('watch', function () {

    // watch for sass files
    gulp.watch('sass/**/*.scss', ['sass']);

    // watch for js files
    gulp.watch(['js/**/*.js', '!js/scripts.min.js'], ['js']);


    // only initialize browser sync when we pass a '--local' flag to gulp watch
    if (argv.local) {
        browserSync.init({
            proxy: siteURL,
            serveStatic: ['./css'],
            rewriteRules: [{
                match: new RegExp('wp-content/themes/roots/assets/css/main.min.css'),
                replace: 'main.min.css'
            }]
        });
    }

});