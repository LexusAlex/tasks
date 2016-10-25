var gulp = require("gulp");
var less = require("gulp-less");
var browserSync = require('browser-sync');

gulp.task('css', function () {
    return gulp.src("src/css/style.less")
        .pipe(less())
        .pipe(gulp.dest('dist/css')) // пишем на диск готовые файлы
        .pipe(browserSync.reload({stream: true}));
});


gulp.task('browser-sync', function() { // Создаем таск browser-sync
    browserSync({ // Выполняем browser Sync
        /*server: { // Определяем параметры сервера
            baseDir: '/var/www/tasks.loc/gulp' // Директория для сервера - app
        },*/
        proxy: "tasks.loc/gulp",
        notify: false // Отключаем уведомления
    });
});

gulp.task('watch', ['browser-sync', 'css'], function() {
    gulp.watch('src/css/**/*.less', ['css']); // Наблюдение за sass файлами
    gulp.watch('/var/www/tasks.loc/gulp/*.html', browserSync.reload);
    gulp.watch('/var/www/tasks.loc/gulp/*.php', browserSync.reload);
    // Наблюдение за другими типами файлов
});

gulp.task('default', ['browser-sync', 'watch']);