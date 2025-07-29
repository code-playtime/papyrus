const mix = require("laravel-mix");

mix.sass("resources/css/panel.scss", "public/resources/css")
    .js("resources/js/panel.js", "public/resources/js");

mix.sass("resources/css/auth.scss", "public/resources/css");
