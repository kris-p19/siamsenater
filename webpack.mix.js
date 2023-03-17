const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

// FrontEnd
mix.combine([
   'resources/js/script.js'
],'public/js/app.js');
mix.combine([
   'resources/css/style.css'
],'public/css/app.css');


// BackEnd
mix.combine([
   'resources/theme/AdminLTE-3.2.0/plugins/jquery/jquery.min.js',
   'resources/theme/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js',
   'resources/theme/AdminLTE-3.2.0/dist/js/adminlte.js',
   'resources/theme/bootstrap-tagsinput/bootstrap-tagsinput.js',
   'resources/js/backend-custom.js'
],'public/js/backend.js');
mix.combine([
   'resources/theme/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css',
   'resources/theme/AdminLTE-3.2.0/dist/css/adminlte.min.css',
   'resources/theme/bootstrap-tagsinput/bootstrap-tagsinput.css',
   'resources/css/backend-custom.css'
],'public/css/backend.css');

// Login
mix.combine([
   'resources/theme/AdminLTE-3.2.0/plugins/jquery/jquery.min.js',
   'resources/theme/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js',
   'resources/theme/AdminLTE-3.2.0/dist/js/adminlte.min.js'
],'public/js/login.js');
mix.combine([
   'resources/theme/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css',
   'resources/theme/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
   'resources/theme/AdminLTE-3.2.0/dist/css/adminlte.min.css'
],'public/css/login.css');


