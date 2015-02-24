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

    // mix assets
    mix.sass('app.scss')
       .sass('main.scss')
       .coffee();

    // mix styles
    mix.styles([
        'template.css',
        'app.css',
        '../../resources/css/libs/select2.min.css'
    ], 'public/output/styles.css', 'public/css');

    // mix scripts
    mix.scripts([
        '../../bower_components/jquery/dist/jquery.min.js',
        '../../bower_components/bootstrap/dist/js/bootstrap.min.js',
        '../../bower_components/angular/angular.js',
        '../../resources/js/libs/select2.min.js',
        'main.js',
    ], 'public/output/scripts.js', 'public/js');

    mix.scripts([
        '../../bower_components/angular/angular.min.js',
        '../../bower_components/angular-aria/angular-aria.min.js',
        '../../bower_components/angular-animate/angular-animate.min.js',
        '../../bower_components/ngFx/dist/ngFx.min.js',
        '../../bower_components/angular-material/angular-material.min.js',
       'admin.js',
       'controllers/TaskController.js'
    ], 'public/js/admin.js');

    // version
    // mix.version(['public/output/styles.css', 'public/output/scripts.js']);

});
