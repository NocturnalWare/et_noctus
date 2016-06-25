var elixir = require('laravel-elixir'),
gulp = require('gulp');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

gulp.task('icons', function() {
    return gulp.src('./node_modules/font-awesome/fonts/**.*') 
        .pipe(gulp.dest('./public/fonts')); 
});

elixir(function(mix) {
    mix.copy('./node_modules/vue/dist/vue.min.js', 'resources/assets/js')
    .copy('./node_modules/vue-resource/dist/vue-resource.min.js', 'resources/assets/js')
    .copy('./node_modules/jquery/dist/jquery.min.js', 'resources/assets/js')
    .copy('./node_modules/bootstrap-less/js/bootstrap.min.js', 'resources/assets/js')
    .copy('./node_modules/font-awesome/css/font-awesome.min.css', 'resources/assets/css');
});

elixir(function(mix) {
    mix.less('style.less', 'resources/assets/css/style.css');
    mix.styles(['style.css'], 'public/css/final.css');
    mix.browserify(['main.js', 'jquery.min.js', 'vue.min.js', 'bootstrap.min.js']);
	mix.copy('./node_modules/font-awesome/fonts/**.*', './public/fonts');
});