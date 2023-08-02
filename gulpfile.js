const {
  src,
  dest,
  series,
  watch
} = require('gulp');

// const browserSync = require('browser-sync').create();
const changed = require('gulp-changed');
const svgSprite = require('gulp-svg-sprite');
const svgmin = require('gulp-svgmin');
const cheerio = require('gulp-cheerio');
const replace = require('gulp-replace');
const rev = require('gulp-rev');
const revDel = require('gulp-rev-delete-original');
const gulpif = require('gulp-if');
const image = require('gulp-imagemin');
// const typograf = require('gulp-typograf');
const webp = require('gulp-webp');
const avif = require('gulp-avif');
const path = require('path');

// paths
const srcFolder = './public';
const buildFolder = './public';
const paths = {
  srcSvg: `${srcFolder}/images/svg/**.svg`,
  srcImgFolder: `${srcFolder}/images`,
  buildImgFolder: `${buildFolder}/images`,
  srcScss: `${srcFolder}/scss/**/*.scss`,
  buildCssFolder: `${buildFolder}/css`,
  srcFullJs: `${srcFolder}/js/**/*.js`,
  srcMainJs: `${srcFolder}/js/main.js`,
  buildJsFolder: `${buildFolder}/js`,
  srcPartialsFolder: `${srcFolder}/partials`,
  resourcesFolder: `${srcFolder}/resources`,
};

let isProd = false; // dev by default

// const clean = () => {
//   return del([srcFolder])
// }

//svg sprite
const svgSprites = () => {
  return src(paths.srcSvg)
    .pipe(
      svgmin({
        js2svg: {
          pretty: true,
        },
      })
    )
    .pipe(
      cheerio({
        run: function ($) {
          $('[fill]').removeAttr('fill');
          $('[stroke]').removeAttr('stroke');
          $('[style]').removeAttr('style');
        },
        parserOptions: {
          xmlMode: true
        },
      })
    )
    .pipe(replace('&gt;', '>'))
    .pipe(svgSprite({
      mode: {
        stack: {
          sprite: "../sprite.svg"
        }
      },
    }))
    .pipe(dest(paths.buildImgFolder));
}


const resources = () => {
  return src(`${paths.resourcesFolder}/**`)
    .pipe(dest(buildFolder))
}

const images = () => {
  return src([`${paths.srcImgFolder}/**/**.{jpg,jpeg,png,svg}`])
    .pipe(gulpif(isProd, image([
      image.mozjpeg({
        quality: 80,
        progressive: true
      }),
      image.optipng({
        optimizationLevel: 2
      }),
    ])))
    .pipe(dest(paths.buildImgFolder))
};

const webpImages = () => {
  return src([`${paths.srcImgFolder}/**/**.{jpg,jpeg,png}`])
    .pipe(webp())
    .pipe(dest(paths.buildImgFolder))
};

const avifImages = () => {
  return src([`${paths.srcImgFolder}/**/**.{jpg,jpeg,png}`])
    .pipe(avif())
    .pipe(dest(paths.buildImgFolder))
};

// const watchFiles = () => {
//   browserSync.init({
//     server: {
//       baseDir: `${buildFolder}`
//     },
//   });

//   watch(`${paths.resourcesFolder}/**`, resources);
//   watch(`${paths.srcImgFolder}/**/**.{jpg,jpeg,png,svg}`, images);
//   watch(`${paths.srcImgFolder}/**/**.{jpg,jpeg,png}`, webpImages);
//   watch(`${paths.srcImgFolder}/**/**.{jpg,jpeg,png}`, avifImages);
//   watch(paths.srcSvg, svgSprites);
// }

// const cache = () => {
//   return src(`${buildFolder}/**/*.{css,js,svg,png,jpg,jpeg,webp,avif,woff2}`, {
//       base: buildFolder
//     })
//     .pipe(rev())
//     .pipe(revDel())
//     .pipe(dest(buildFolder))
//     .pipe(rev.manifest('rev.json'))
//     .pipe(dest(buildFolder));
// };


exports.imagemin = series (images, webpImages, svgSprites);

// exports.imagemin = series (images, webpImages, avifImages,  svgSprites); // avif not
