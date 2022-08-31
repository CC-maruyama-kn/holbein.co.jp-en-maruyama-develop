var gulp = require('gulp');
//sass
var sass = require('gulp-sass');
var autoprefixer = require('autoprefixer');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var csscomb = require('gulp-csscomb');
var sassUnicode = require('gulp-sass-unicode');
var postcss = require('gulp-postcss');
var cssmqpacker = require('css-mqpacker');
var rename = require("gulp-rename");
//var cssnano = require('cssnano');
///var sourcemaps = require('gulp-sourcemaps');
//var changed  = require('gulp-changed');
//JS
var uglify = require('gulp-uglify');
//server
var webserver = require('gulp-webserver');
var browser = require('browser-sync');
//pug
//var pug = require('gulp-pug');
//pug json利用時
var fs = require('fs');
//var data = require('gulp-data');
//iconfont
//var iconfont = require('gulp-iconfont');
var svgmin = require('gulp-svgmin');
var consolidate = require('gulp-consolidate');
//画像圧縮
//const imagemin = require('gulp-imagemin');
//const mozjpeg = require('imagemin-mozjpeg');
//const pngquant = require('imagemin-pngquant');
//const changed = require('gulp-changed');
//ejs
//var ejs      = require('gulp-ejs');

//----------------------------------------------------------------------
//  画像圧縮系でエラーがでたら 下記コマンドで install実行
//  npm i -D gulp-imagemin@7.1.0
//  npm i -D imagemin-mozjpeg@9.0.0 imagemin-pngquant
//  npm i -D gulp-changed
//----------------------------------------------------------------------


var filePath = {
  base: 'dist',
  css: {
    'cmn': 'dist/dcms_media/css',
    'up': 'upfile/import_file/dcms_media/css'
  },
  js: {
    'cmn': 'dist/dcms_media/js',
    'up': 'upfile/import_file/dcms_media/js'
  },
  pug: 'dist',
  //json: 'src/data/',
  src: {
    js: {
      'cmn': 'src/js',
      'up': 'src/js'
    },
    pug: 'src/pug',
    sass: {
      'cmn': 'src/sass',
      'up': 'src/sass'
    }
  }
};

var autoprefixerBrowsers = ['last 3 versions', 'ie >= 11', 'Android >= 4'];


// scss expanded
gulp.task('sass-src', function () {
  var typeList = ['cmn'];
  for (var i = 0; i < typeList.length; i++) {
    // ---------- .css ------------- //
    return gulp.src([filePath.src.sass[typeList[i]] + '/**/*.scss', '!' + filePath.src.sass[typeList[i]] + '/**/_*.scss'])
      .pipe(plumber())
      //.pipe(changed(filePath.css[typeList[i]], {extension: '.css'}))
      .pipe(csscomb())
      .pipe(postcss([
        cssmqpacker(),
        autoprefixer({
          browsers: autoprefixerBrowsers,
          cascade: false
        })
      ]))
      .pipe(rename({ suffix: '.src' }))
      .pipe(sass({ outputStyle: 'expanded' }))
      .pipe(sassUnicode())
      //.pipe(sourcemaps.write('../map'))
      .pipe(gulp.dest(filePath.css[typeList[i]]));
  }
});

// scss minify
gulp.task('sass', function () {
  var typeList = ['cmn'];
  for (var i = 0; i < typeList.length; i++) {
    // ---------- .min.css ------------- //
    return gulp.src([filePath.src.sass[typeList[i]] + '/**/*.scss', '!' + filePath.src.sass[typeList[i]] + '/**/_*.scss'], { sourcemaps: true })
      //return gulp.src([filePath.src.sass[typeList[i]] + '/**/*.scss', '!' + filePath.src.sass[typeList[i]] + '/**/_*.scss'])
      .pipe(plumber({
        errorHandler: notify.onError('Error:<%= error.message %>')
      }))
      //.pipe(changed(filePath.css[typeList[i]], {extension: '.css'}))
      .pipe(csscomb())
      .pipe(postcss([
        cssmqpacker(),
        autoprefixer({
          browsers: autoprefixerBrowsers,
          cascade: false
        })
      ]))
      .pipe(sass({ outputStyle: 'compressed' }))
      .pipe(sassUnicode())
      .pipe(gulp.dest(filePath.css[typeList[i]], { sourcemaps: './maps/' }));
  }
});

//up file (no sourcemap)
gulp.task('sass-up', function () {
  var typeList = ['up'];
  for (var i = 0; i < typeList.length; i++) {
    return gulp.src([filePath.src.sass[typeList[i]] + '/**/*.scss', '!' + filePath.src.sass[typeList[i]] + '/**/_*.scss'])
      .pipe(plumber({ errorHandler: notify.onError('Error:<%= error.message %>') }))
      //.pipe(changed(filePath.css[typeList[i]], {extension: '.css'}))
      .pipe(csscomb())
      .pipe(postcss([
        cssmqpacker(),
        autoprefixer({
          browsers: autoprefixerBrowsers,
          cascade: false
        })
      ]))
      .pipe(sass({ outputStyle: 'compressed' }))
      .pipe(sassUnicode())
      .pipe(gulp.dest(filePath.css[typeList[i]]));
  }
});

gulp.task('js', function () {
  var typeList = ['cmn'];
  for (var i = 0; i < typeList.length; i++) {
    return gulp.src(filePath.src.js[typeList[i]] + '/**/*.js')
      .pipe(plumber())
      .pipe(uglify())
      //.pipe(rename({extname: '.min.js'}))
      .pipe(gulp.dest(filePath.js[typeList[i]]));
  }
});
gulp.task('js-up', function () {
  var typeList = ['up'];
  for (var i = 0; i < typeList.length; i++) {
    return gulp.src(filePath.src.js[typeList[i]] + '/**/*.js')
      .pipe(plumber())
      .pipe(uglify())
      //.pipe(rename({extname: '.min.js'}))
      .pipe(gulp.dest(filePath.js[typeList[i]]));
  }
});

// pug
gulp.task('pug', function () {
  return gulp.src(['src/pug/**/*.pug', '!src/pug/**/_*.pug'])
    // エラー >  npm i -D gulp-data
    //.pipe(data( file => {
    //    return JSON.parse(fs.readFileSync(`src/data/meta.json`));
    //}))
    .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
    .pipe(pug({
      pretty: true,
      basedir: 'src/pug/'
    }))
    .pipe(gulp.dest(filePath.pug));
});

gulp.task('webserver', function () {
  return gulp.src(filePath.base)
    .pipe(webserver({
      livereload: true,
      open: true
    }));
});

gulp.task('server', function () {
  browser({
    //open: 'external',
    port: 9109,
    server: {
      baseDir: filePath.base
    },
    startPath: '/index.html',
    ghostMode: false
  });
});


// icon font gulp iconfont
gulp.task('iconfont', function () {

  var runTimestamp = Math.round(Date.now() / 1000);
  var fontName = 'icons';

  return gulp.src('src/icons/svg/*.svg')
    .pipe(svgmin())
    .pipe(iconfont({
      fontName: fontName,
      formats: ['ttf', 'eot', 'woff', 'svg'],
      normalize: true,
      // startUnicode: 0xF001,
      fontHeight: 500,
      timestamp: runTimestamp
    }))
    .on('glyphs', function (glyphs, options) {
      var options = {
        className: fontName,
        fontName: fontName,
        fontPath: '../fonts/',
        glyphs: glyphs.map(function (glyph) {
          return { name: glyph.name, codepoint: glyph.unicode[0].charCodeAt(0) }
        })
      };

      // CSS
      gulp.src('src/icons/templates/template.css')
        .pipe(plumber())
        .pipe(consolidate('lodash', options))
        .pipe(rename({ basename: fontName }))
        .pipe(gulp.dest('src/icons/css'));

      // フォント一覧 HTML
      gulp.src('src/icons/templates/template.html')
        .pipe(plumber())
        .pipe(consolidate('lodash', options))
        .pipe(rename({ basename: 'icon-sample' }))
        .pipe(gulp.dest('src/icons/html'));
    })
    .pipe(gulp.dest('src/icons/fonts'))
    .pipe(gulp.dest('dist/dcms_media/other'))
    .pipe(gulp.dest('upfile/import_file/dcms_media/other'))
});

//画像圧縮
gulp.task("imagemin", function () {
  return gulp
    .src('./src/image/**')
    .pipe(changed('./dist/dcms_media/image'))
    .pipe(
      imagemin([
        pngquant({
          quality: [.60, .70], // 画質
          speed: 1 // スピード
        }),
        mozjpeg({ quality: 65 }), // 画質
        imagemin.svgo(),
        imagemin.optipng(),
        imagemin.gifsicle({ optimizationLevel: 3 }) // 圧縮率
      ])
    )
    .pipe(gulp.dest('./dist/dcms_media/image'))
    .pipe(gulp.dest('./upfile/import_file/dcms_media/image'))
});
//画像圧縮 svg用（other に出力
gulp.task("svgmin", function () {
  return gulp
    .src('./src/svg/**')
    .pipe(changed('./dist/dcms_media/other'))
    .pipe(gulp.dest('./dist/dcms_media/other'))
    .pipe(gulp.dest('./upfile/import_file/dcms_media/other'))
});



gulp.task('watch', function () {
  // ↓非圧縮のファイルがほしいと言われた場合に生成できる
  //gulp.watch(filePath.src.sass['cmn'] + '/**/*.scss', gulp.task('sass-src'));
  gulp.watch(filePath.src.sass['cmn'] + '/**/*.scss', gulp.task('sass'));
  gulp.watch(filePath.src.sass['up'] + '/**/*.scss', gulp.task('sass-up'));
  gulp.watch(filePath.src.js['cmn'] + '/**/*.js', gulp.task('js'));
  gulp.watch(filePath.src.js['up'] + '/**/*.js', gulp.task('js-up'));
  gulp.watch([filePath.src.pug + '/**/*.pug'], gulp.task('pug'));
  //画像圧縮 ※重い場合は外す
  gulp.watch('./src/image/**', gulp.task('imagemin'));
  gulp.watch('./src/svg/**', gulp.task('svgmin'));
});

gulp.task('default', gulp.parallel('server', 'watch'));