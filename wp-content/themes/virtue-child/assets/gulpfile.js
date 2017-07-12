var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('scss', function() {
    gulp.src('./sass/global.scss')
        .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
        .pipe(gulp.dest('./css'));
});

gulp.task('default', function() {
    gulp.run("scss");

    gulp.watch('./sass/**/*.scss', function() {
        gulp.run('scss');
    });
});