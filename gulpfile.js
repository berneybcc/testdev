"use strict";

// const gulp = require("gulp");
const {src,dest} = require("gulp");
// const gulp = require("gulp");
const uglify = require("gulp-uglify");
const concat = require('gulp-concat');

// gulp.task('js-templateone', function () {
//     gulp.src('resources/assets/js/template-one/*.js')
//     .pipe(concat('todo.js'))
//     .pipe(uglify())
//     .pipe(gulp.dest('public/js/'))
// });
// gulp.task('css-templateone', function () {
//   gulp.src('resources/assets/css/template-one/*.css')
//   .pipe(concat('style.css'))
//   .pipe(gulp.dest('public/css/'))
// });

// gulp.task('main_js', function () {
//   gulp.src('resources/assets/js/*.js')
//   .pipe(concat('app.js'))
//   .pipe(uglify())
//   .pipe(gulp.dest('public/js/'))
// });

function js() {
  return src('resources/assets/js/*.js')
    .pipe(concat('script.js'))
    .pipe(uglify())
    .pipe(dest('public/js/'));
}

function css() {
  return src('resources/assets/css/*.css')
    .pipe(concat('style.css'))
    .pipe(dest('public/css/'));
}

exports.main_js = js;
exports.main_css = css;