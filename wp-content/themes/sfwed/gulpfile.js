/* eslint-disable no-undef */
const gulp = require( 'gulp' );
const sass = require( 'gulp-sass' )( require( 'sass' ) );
const sourcemaps = require( 'gulp-sourcemaps' );
const autoprefixer = require( 'gulp-autoprefixer' );
const browserSync = require( 'browser-sync' ).create();
const uglify = require( 'gulp-uglify' );
const cleanCSS = require( 'gulp-clean-css' );
const dependencies = require( 'gulp-resolve-dependencies' );
const concat = require( 'gulp-concat' );
const plumber = require('gulp-plumber');
const newer = require('gulp-newer');
const imagemin = require( 'gulp-imagemin' );
const gutil = require('gulp-util');
const rename = require('gulp-rename');
const del = require( 'del' );

const paths = {
	build: './build',
	assets: 'assets',
};

function styles() {
	return gulp
		.src( 'assets/scss/style.scss' )
		.pipe(plumber({
			errorHandler: function (err) {
				console.log(err);
				this.emit('end');
			}
		}))
		.pipe(sourcemaps.init())
		.pipe(sass({
			errLogToConsole: true,
			outputStyle: 'compressed',
			precision: 10
		}))
		.pipe(autoprefixer())
		.on('error', gutil.log)
		.pipe(concat('theme.css'))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('./'))
		.pipe(browserSync.stream()) /** inject if theme.css is in use */
		.pipe( rename( {
			basename: 'theme',
			suffix: '.min'
		}))
		.pipe(cleanCSS())
		.pipe( gulp.dest('./'))
		.pipe(browserSync.stream()); /** inject if theme.min.css is in use */
}

function editorstyles() {
	return gulp
		.src( 'assets/scss/editor_styles.scss' )
		.pipe(plumber({
			errorHandler: function (err) {
				console.log(err);
				this.emit('end');
			}
		}))
		.pipe(sourcemaps.init())
		.pipe(sass({
			errLogToConsole: true,
			outputStyle: 'compressed',
			precision: 10
		}))
		.pipe(autoprefixer())
		.on('error', gutil.log)
		.pipe(concat('editor_styles.css'))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('./'))
		.pipe(browserSync.stream()) /** inject if editor_styles.css is in use */
		.pipe( rename( {
			basename: 'editor_styles',
			suffix: '.min'
		}))
		.pipe(cleanCSS())
		.pipe( gulp.dest('./'))
		.pipe(browserSync.stream()); /** inject if editor_styles.min.css is in use */
}

function scripts() {
	return gulp
		.src( [ 'assets/js/custom/*.js' ] )
		.pipe( dependencies( {
			pattern: /\* @requires [\s-]*(.*\.js)/g,
		} ) )
		.on( 'error', function( err ) {
			Console.log( err.message );
		} )
		.pipe( concat( 'app.js' ) )
		.pipe( sourcemaps.init() )
		.pipe( uglify() )
		.pipe( sourcemaps.write( '.' ) )
		.pipe( gulp.dest( `${ paths.build }/js` ) )
		.pipe( browserSync.stream() );
}

function stylesBlocks() {
	return gulp
		.src(['assets/scss/blocks/*.scss', '!assets/scss/blocks/blocks.scss'])
		.pipe(sourcemaps.init())
		.pipe(sass({
			errLogToConsole: true,
			outputStyle: 'compressed',
			precision: 10
		}))
		.pipe(gulp.dest(`${paths.build}/css/blocks`))
		.pipe(browserSync.stream());
}

function stylesBlocksBuild() {
	return gulp
	.src(['assets/scss/blocks/*.scss', '!assets/scss/blocks/blocks.scss'])
		.pipe(sourcemaps.init())
		.pipe(sass({
			errLogToConsole: true,
			outputStyle: 'compressed',
			precision: 10
		}))
		.pipe(rename({ suffix: '.min' }))
		.pipe(cleanCSS())
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(`${paths.build}/css/blocks`))
		.pipe(browserSync.stream());
}

function pageScripts() {
	return gulp
		.src( 'assets/js/blocks/**.js' )
		.pipe( sourcemaps.init() )
		.pipe( sourcemaps.write( '.' ) )
		.pipe( gulp.dest( `${ paths.build }/scripts/blocks` ) )
		.pipe( browserSync.stream() );
}

function pageScriptsBuild() {
	return gulp
		.src( 'assets/js/blocks/**.js' )
		.pipe( uglify() )
		.pipe( gulp.dest( `${ paths.build }/scripts/blocks` ) );
}

function imageMin() {
	return gulp
		.src('assets/img/raw/**/*.{png,jpg,gif,svg}')
		.pipe(plumber())
		.pipe(newer('assets/img/'))
		.pipe(imagemin({ optimizationLevel: 5, progressive: true, interlaced: true }))
		.pipe( gulp.dest( `${ paths.assets }/img` ) )
		.pipe(browserSync.stream());
}

function watch() {
	browserSync.init( {
		browser: 'google chrome',
		proxy: 'http://localhost:10114/',
		host: 'localhost',
		open: 'external',
		port: 8080,
		ghostMode: {
			scroll: true,
		},
		online: true,

	} );
	gulp.watch( 'assets/img/raw/**/*.{png,jpg,gif,svg}', imageMin );
	gulp.watch(['assets/scss/**/*.scss', '!assets/scss/blocks/**/*.scss'], styles);
	gulp.watch(['assets/scss/**/*.scss', '!assets/scss/blocks/**/*.scss'], editorstyles);
	gulp.watch( 'assets/js/**/*.js', gulp.series( cleanup, scripts, pageScripts, pageScriptsBuild, stylesBlocks, stylesBlocksBuild ) );
	gulp.watch( 'assets/scss/blocks/*.scss', gulp.series( stylesBlocks, stylesBlocksBuild ) );
	gulp.watch( './**/*.php' ).on( 'change', browserSync.reload );
}

function cleanup() {
	return del( [ `${ paths.build }` ] );
}

const build = gulp.series(
	cleanup,
	gulp.parallel( imageMin, pageScriptsBuild, stylesBlocksBuild )
);

exports.scripts = scripts;
exports.styles = styles;
exports.editorstyles = editorstyles;
exports.cleanup = cleanup;
exports.stylesBlocks = stylesBlocks;
exports.stylesBlocksBuild = stylesBlocksBuild;

exports.build = build;

exports.default = exports.watch = watch;
