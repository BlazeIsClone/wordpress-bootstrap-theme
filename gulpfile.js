const autoprefixer = require('autoprefixer');
const browsersync = require('browser-sync').create();
const cssnano = require('cssnano');
const gulp = require('gulp');
const plumber = require('gulp-plumber');
const postcss = require('gulp-postcss');
const rename = require('gulp-rename');
const cache = require('gulp-cache');
const sass = require('gulp-sass');
const webpack = require('webpack');
const webpackconfig = require('./webpack.config.js');
const webpackstream = require('webpack-stream');

// BrowserSync
function browserSync(done) {
	browsersync.init({
		proxy: 'localhost',
		notify: false,
	});
	done();
}

// BrowserSync Reload
function browserSyncReload(done) {
	browsersync.reload();
	done();
}

// CSS task
function css() {
	return gulp
		.src('./theme-base/assets/src/styles/**/*.scss')
		.pipe(cache.clear())
		.pipe(plumber())
		.pipe(sass({ outputStyle: 'expanded' }))
		.pipe(gulp.dest('./theme-base/assets/dist/css/'))
		.pipe(rename({ suffix: '.min' }))
		.pipe(postcss([autoprefixer(), cssnano()]))
		.pipe(gulp.dest('./theme-base/assets/dist/css/'))
		.pipe(browsersync.stream());
}

// Transpile, concatenate and minify scripts
function scripts() {
	return gulp
		.src(['./theme-base/assets/src/scripts/**/*'])
		.pipe(cache.clear())
		.pipe(plumber())
		.pipe(webpackstream(webpackconfig, webpack))
		.pipe(gulp.dest('./theme-base/assets/dist/js/'))
		.pipe(browsersync.stream());
}

function fonts() {
	gulp
		.src('./theme-base/assets/src/fonts/**/*.{ttf,woff,eot,otf,svg}')
		.pipe(cache.clear())
		.pipe(plumber())
		.pipe(gulp.dest('./theme-base/assets/dist/fonts/'))
		.pipe(browsersync.stream());
}

function images() {
	gulp
		.src('./theme-base/assets/src/images/**/*.{png,jpg,jpeg,webp,ico,svg}')
		.pipe(cache.clear())
		.pipe(plumber())
		.pipe(gulp.dest('./theme-base/assets/dist/images/'))
		.pipe(browsersync.stream());
}

// Watch files
function watchFiles() {
	gulp.watch('./theme-base/assets/src/styles/**/*', css);
	gulp.watch('./theme-base/assets/src/scripts/**/*', scripts);
	gulp.watch('./theme-base/assets/src/fonts/**/*', fonts);
	gulp.watch('./theme-base/assets/src/images/**/*', images);
	gulp.watch('./theme-base/**/*', browserSyncReload);
}

// define complex tasks
const js = gulp.series(scripts);
const watch = gulp.parallel(watchFiles, browserSync);
const build = gulp.series(gulp.parallel(css, js, fonts, images, watch));

// export tasks
exports.css = css;
exports.js = js;
exports.build = build;
exports.watch = watch;
exports.default = build;
