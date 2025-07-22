const mix = require("laravel-mix");

mix.sass("resources/css/app.scss", "public/resources/css")
    .js("resources/js/app.js", "public/resources/js");

mix.sass("resources/css/auth.scss", "public/resources/css");
