var elixir = require('laravel-elixir');

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
elixir(function(mix) {
	mix.copy('./node_modules/vue/dist/vue.min.js', 'resources/assets/js')
	.copy('./node_modules/jquery/dist/jquery.min.js', 'resources/assets/js')
	.copy('./node_modules/bootstrap/dist/js/bootstrap.min.js', 'resources/assets/js');
});

elixir(function(mix) {
    mix.sass('app.scss');
    mix.styles(['noctus.css'], 'public/css/final.css');
    mix.browserify(['main.js', 'vue.min.js', 'jquery.min.js', 'bootstrap.min.js']);
});
