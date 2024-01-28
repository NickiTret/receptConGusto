const mix = require("laravel-mix");
const SVGSpritemapPlugin = require("svg-spritemap-webpack-plugin");
// require('@chiiya/laravel-mix-image-minimizer');
// require("laravel-mix-webp-watched");

// mix.browserSync("http://127.0.0.1:8000/");

mix.webpackConfig({
    stats: {
        children: true,
    },
    // plugins: [
    //     new SVGSpritemapPlugin([
    //         "public/images/**/*.svg",
    //         // "public/images/icons/**/*.svg",
    //     ]),
    // ],
});

// mix.webpWatched("public/images/", "public/images/", {
//     imageminWebpOptions: {
//         quality: 50,
//     },
// });

mix.sass("styles/main.scss", "public/css/main/main.style.min.css");

mix.styles(
    [
        "resources/assets/admin/plugins/fontawesome-free/css/all.min.css",
        "resources/assets/admin/plugins/select2/css/select2.min.css",
        "resources/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css",
        "resources/assets/admin/plugins/summernote/summernote-lite.css",
        "resources/assets/admin/css/adminlte.min.css",
    ],
    "public/assets/admin/css/admin.css"
);

mix.scripts(
    [
        "resources/assets/admin/plugins/jquery/jquery.min.js",
        "resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js",
        "resources/assets/admin/plugins/select2/js/select2.full.min.js",
        "resources/assets/admin/plugins/summernote/summernote-bs4.min.js",
        "resources/assets/admin/plugins/summernote/summernote-image.js",
        "resources/assets/admin/js/adminlte.min.js",
        "resources/assets/admin/plugins/summernote/summernote-lang.js",
        "resources/assets/admin/js/demo.js",
    ],
    "public/assets/js/admin.js"
);

mix.js("script/**/*.js", "public/assets/js/main.js");

mix.copyDirectory("resources/assets/admin/img", "public/assets/admin/img");
mix.copyDirectory(
    "resources/assets/admin/plugins/fontawesome-free/webfonts",
    "public/assets/admin/webfonts"
);

// mix.images({
//     from: 'public/images',
//     to: 'public/images',
//     webp: true,
//   });

// mix.images( {
//     webp: true,
//     implementation: 'imagemin',
//     patterns: [
//         { from: "**/*", to: "images", context: "public/images" }
//     ]
// } );
