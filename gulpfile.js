var elixir = require('laravel-elixir');
require('laravel-elixir-jade');
require("laravel-elixir-requirejs");

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
    mix.jade({
        baseDir: './resources',
        blade: true,
        dest: '/views/',
        pretty: true,
        search: '**/*.jade', //in depth compiling..we just need the views we use
        //search: '*.jade', // partial search, if I want to exclude partials from here
        src: '/jade/'
    });
    mix.sass('app.sass');
    mix.coffee('app.coffee');
    //mix.requirejs("bootstrap.js", rjsOptions);
});
