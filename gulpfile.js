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

var bowerDir = './resources/assets/vendor/';
 
var lessPaths = [
    bowerDir + "bootstrap/less",
    bowerDir + "font-awesome/less",
    bowerDir + "bootstrap-select/less"
];
 
elixir(function(mix) {
    mix.less('style.less', 'public/css', { paths: lessPaths })
        .scripts([
            'jquery/dist/jquery.min.js',
            'bootstrap/dist/js/bootstrap.min.js',
            'bootstrap-select/dist/js/bootstrap-select.min.js',
            'jquery/dist/jquery.mask.min.js',
            'jquery/dist/jquery.maskMoney.min.js',
            'others/js/metisMenu.min.js',
            'others/js/app.js'
            ], 'public/js/script.js', bowerDir)
        .copy(bowerDir + 'font-awesome/fonts', 'public/fonts');
 
});