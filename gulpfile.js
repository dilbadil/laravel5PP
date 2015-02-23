var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    // setup basic
    mix.sass('app.scss').coffee();

    // setup styles
    mix.styles([
        'template.css',
        'app.css',
        '../../resources/css/libs/select2.min.css'
    ], 'public/output/styles.css', 'public/css');

    // setup scripts
    mix.scripts([
        '../../bower_components/jquery/dist/jquery.min.js',
        '../../resources/libs/bootstrap.min.js',
        '../../bower_components/angular/angular.js',
        '../../resources/js/libs/select2.min.js',
        'main.js',
    ], 'public/output/scripts.js', 'public/js');

    // version
    mix.version(['public/output/styles.css', 'public/output/scripts.js']);

});
