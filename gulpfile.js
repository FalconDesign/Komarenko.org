'use strict';

var gulp         = require('gulp'),
	sass         = require('gulp-sass'),
	browserSync  = require('browser-sync'),
	concat       = require('gulp-concat'),
	uglify       = require('gulp-uglifyjs'),
	cssnano      = require('gulp-cssnano'),
	rename       = require('gulp-rename'),
	del          = require('del'),
	imagemin     = require('gulp-imagemin'),
	pngquant     = require('imagemin-pngquant'),
	cache        = require('gulp-cache'),
	autoprefixer = require('gulp-autoprefixer');

gulp.task('sass', function() {
	return gulp.src('app/sass/*.sass')
		.pipe(sass().on('error', sass.logError))
		.pipe(sass())
		.pipe(autoprefixer(['last 15 versions'], {cascade: true}))
		.pipe(concat('style.css'))
		.pipe(gulp.dest('app/css'))
		.pipe(browserSync.reload({stream: true}));
});

gulp.task('serve', function() {
	browserSync({
		server: {
			baseDir: 'app'
		},
		notify: false
	});
});

gulp.task('js-libs', function() {
	return gulp.src('app/js/libs/**/*.js')
		.pipe(concat('libs.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('app/js'));
});

gulp.task('js', function() {
	return gulp.src('app/js/main/**/*.js')
		.pipe(concat('main.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('app/js'));
});

gulp.task('css-libs', function() {
	return gulp.src('app/css/libs/*.css')
		.pipe(concat('libs.css'))
		.pipe(cssnano())
		.pipe(rename({suffix: '.min'}))
		.pipe(gulp.dest('app/css'));
});

gulp.task('watch', ['serve'], function() {
	gulp.watch('app/sass/**/*.sass', ['sass']);
	gulp.watch('app/js/**/*.js', ['js']);
	gulp.watch(['app/*.html', 'app/pages/*.html'], browserSync.reload);
	gulp.watch('app/js/*.js', browserSync.reload);
});

gulp.task('clean', function() {
	return del.sync('dist'); // Удаляем папку dist перед сборкой
});

gulp.task('img', function() {
	return gulp.src('app/img/**/*')
		.pipe(cache(imagemin({
			interlaced: true,
			progressive: true,
			svgoPlugins: [{removeViewBox: false}],
			use: [pngquant()]
		})))
		.pipe(gulp.dest('dist/img'));
});

gulp.task('build', ['clean', 'img', 'sass'], function() {

	var buildCss = gulp.src('app/css/*.css')
	.pipe(gulp.dest('dist/css'));

	var buildFonts = gulp.src('app/fonts/**/*')
	.pipe(gulp.dest('dist/fonts'));

	var buildJs = gulp.src('app/js/*.js')
	.pipe(gulp.dest('dist/js'));

	var buildScripts = gulp.src('app/scripts/*.php')
	.pipe(gulp.dest('dist/scripts'));

	var buildPages = gulp.src('app/pages/*.html')
	.pipe(gulp.dest('dist/pages'));

	var buildPhpPages = gulp.src('app/pages/*.php')
	.pipe(gulp.dest('dist/pages'));

	var buildHtml = gulp.src('app/*.html')
	.pipe(gulp.dest('dist'));

	var buildPhp = gulp.src('app/*.php')
	.pipe(gulp.dest('dist'));

});

gulp.task('clear', function () {
	return cache.clearAll();
});

gulp.task('default', ['watch']);