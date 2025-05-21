const { src, dest, watch, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');

// Paths
const fs = require('fs');
const paths = {
  scss: {
    main: 'src/scss/style.scss',
    editor: 'src/scss/editor-style.scss',
    hero: 'src/scss/_hero.scss',
    all: 'src/scss/**/*.scss',
  },
  js: {
    hero: 'blocks/hero/index.js',
  },
  dest: {
    css: 'build/css/',
    hero: 'blocks/hero/build/'
  }
};

// Ensure hero build directory exists
if (!fs.existsSync(paths.dest.hero)) {
  fs.mkdirSync(paths.dest.hero, { recursive: true });
}

function cssMain() {
  return src(paths.scss.main)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(dest(paths.dest.css));
}

function cssEditor() {
  return src(paths.scss.editor)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(rename({ basename: 'editor-style', suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(dest(paths.dest.css));
}



function cssHero() {
  // Build from hero.scss (not _hero.scss)
  return src('src/scss/hero.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(rename({ basename: 'hero-style', suffix: '' }))
    .pipe(sourcemaps.write('.'))
    .pipe(dest(paths.dest.hero));
}

function jsHero() {
  // For now, just copy index.js to build/hero-block.js. For advanced builds, use Babel/webpack.
  return src(paths.js.hero)
    .pipe(rename({ basename: 'hero-block', extname: '.js' }))
    .pipe(dest(paths.dest.hero));
}

function watchFiles() {
  watch(paths.scss.main, cssMain);
  watch(paths.scss.editor, cssEditor);
  watch(paths.scss.hero, cssHero);
  watch(paths.js.hero, jsHero);
}

exports.css = parallel(cssMain, cssEditor, cssHero);
exports.js = jsHero;
exports.cssHero = cssHero;
exports.watch = watchFiles;
exports.default = parallel(cssMain, cssEditor, cssHero, jsHero);
