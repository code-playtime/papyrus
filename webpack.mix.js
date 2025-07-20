const mix = require("laravel-mix");

mix.sass("resources/css/app.scss", "public/resources/css")
    .js("resources/js/app.js", "public/resources/js");
