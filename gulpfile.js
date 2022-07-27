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
const browserSync = done => {
	browsersync.init({
		proxy: 'localhost',
		notify: false,
	});
	done();
};

// BrowserSync Reload
const browserSyncReload = done => {
	browsersync.reload();
	done();
};

// CSS task
const css = () =>
	gulp
		.src('./src/theme/assets/src/styles/**/*.scss')
		.pipe(cache.clear())
		.pipe(plumber())
		.pipe(sass({ outputStyle: 'expanded' }))
		.pipe(gulp.dest('./src/theme/assets/dist/css/'))
		.pipe(rename({ suffix: '.min' }))
		.pipe(postcss([autoprefixer(), cssnano()]))
		.pipe(gulp.dest('./src/theme/assets/dist/css/'))
		.pipe(browsersync.stream());

// Transpile, concatenate and minify scripts
const scripts = () =>
	gulp
		.src(['./src/theme/assets/src/scripts/**/*'])
		.pipe(cache.clear())
		.pipe(plumber())
		.pipe(webpackstream(webpackconfig, webpack))
		.pipe(gulp.dest('./src/theme/assets/dist/js/'))
		.pipe(browsersync.stream());

// Build fonts
const fonts = () =>
	gulp
		.src('./src/theme/assets/src/fonts/**/*.{ttf,woff,eot,otf,svg}')
		.pipe(cache.clear())
		.pipe(plumber())
		.pipe(gulp.dest('./src/theme/assets/dist/fonts/'))
		.pipe(browsersync.stream());

// Build fonts
const images = () =>
	gulp
		.src('./src/theme/assets/src/images/**/*.{png,jpg,jpeg,webp,ico,svg}')
		.pipe(cache.clear())
		.pipe(plumber())
		.pipe(gulp.dest('./src/theme/assets/dist/images/'))
		.pipe(browsersync.stream());

// Watch files
const watchFiles = () => {
	gulp.watch('./src/theme/assets/src/styles/**/*', css);
	gulp.watch('./src/theme/assets/src/scripts/**/*', scripts);
	gulp.watch('./src/theme/assets/src/fonts/**/*', fonts);
	gulp.watch('./src/theme/assets/src/images/**/*', images);
	gulp.watch('./src/theme/**/*', browserSyncReload);
};

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
