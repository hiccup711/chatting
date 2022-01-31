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

mix.js('resources/js/app.js', 'public/js')
    .vue().version()  // 添加 .version() 避免缓存
    .sass('resources/sass/app.scss', 'public/css');

mix.browserSync({
    proxy: 'chat.test' // 你的本地项目地址
});
