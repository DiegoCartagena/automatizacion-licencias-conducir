const mix = require("laravel-mix");



mix.js("resources/js/app.js","public/js")
.vue()
.postCss("resources/css/app.css", "public/css", [require("postcss-import")])
.webpackConfig(require("./webpack.config"));

mix.browserSync("http://dpto-transito.test");
if(mix.inProduction()){
    mix.version();
}