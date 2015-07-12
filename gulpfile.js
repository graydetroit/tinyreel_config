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
    mix.sass('app.scss');
    mix.scripts([
        "app.js"
    ]);
    mix.copy('bower_components/pebble-slate/dist/css/slate.min.css', 'public/css');
    mix.copy('bower_components/pebble-slate/dist/fonts/*.woff', 'public/fonts');
    mix.copy('bower_components/pebble-slate/dist/js/slate.min.js', 'public/js');
});
