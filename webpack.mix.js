let mix = require('laravel-mix');
const tailwindcss = require('tailwindcss')
require('laravel-mix-purgecss');


mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .options({
       processCssUrls: false,
       postCss: [tailwindcss()],
   });

mix.browserSync('peruscape.test');

if (mix.inProduction()) {
    mix.purgeCss().version();
}
