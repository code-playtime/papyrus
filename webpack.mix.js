const mix = require("laravel-mix");

mix.sass("resources/css/panel.scss", "public/resources/css")
    .sass("resources/css/auth.scss", "public/resources/css")
    .options({
        processCssUrls: false,
        postCss: [
        require('tailwindcss'),
        require('autoprefixer'),
        ]
    })
    .js("resources/js/panel.js", "public/resources/js")
    .sourceMaps();


if (mix.inProduction()) {
   mix.version();
}
