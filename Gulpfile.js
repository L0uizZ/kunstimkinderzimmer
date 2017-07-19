'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var compass = require('compass-importer');

gulp.task('sass', function () {
  var directories = [
    {
      from: 'src/ProjectBundle/Resources/public/sass/*.scss',
      to: 'src/ProjectBundle/Resources/public/css'
    }
  ];

  var streams = [];
  for (var i = 0; i < directories.length; i++) {
    streams.push(
      gulp.src(directories[i].from)
      .pipe(sass({
        importer: compass,
        outputStyle: 'compressed',
        sourceMapEmbed: true
      }).on('error', sass.logError))
      .pipe(gulp.dest(directories[i].to))
    );
  }
  return streams;
});

gulp.task('sass:watch', function () {
  gulp.start(['sass']);
  gulp.watch([
    'src/ProjectBundle/Resources/public/sass/*.scss'
  ], ['sass']);
});