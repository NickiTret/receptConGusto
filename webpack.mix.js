const mix = require('laravel-mix');

// require('laravel-mix-svg-sprite');

// mix.Config.svgSprite = {
//     /*
//      * @see https://github.com/kisenka/svg-sprite-loader#configuration
//      */
//     loaderOptions: {
//         extract: true
//     },
//     /*
//      * @see https://github.com/kisenka/svg-sprite-loader#configuration
//      */
//     pluginOptions: {
//         plainSprite: true
//     }
// };

mix.sass('styles/main.scss', 'public/css/main/main.style.min.css');

mix.styles([
    'resources/assets/admin/plugins/fontawesome-free/css/all.min.css',
    'resources/assets/admin/plugins/select2/css/select2.min.css',
    'resources/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
    'resources/assets/admin/plugins/summernote/summernote-lite.css',
    'resources/assets/admin/css/adminlte.min.css',

], 'public/assets/admin/css/admin.css');

mix.scripts([
    'resources/assets/admin/plugins/jquery/jquery.min.js',
    'resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/assets/admin/plugins/select2/js/select2.full.min.js',
    'resources/assets/admin/plugins/summernote/summernote-bs4.min.js',
    'resources/assets/admin/js/adminlte.min.js',
    'resources/assets/admin/js/demo.js',
], 'public/assets/js/admin.js');

mix.js('script/**/*.js', 'public/assets/js/main.js');

// mix.svgSprite(
//     'resources/icons', // The directory containing your SVG files
//     'public/content/icons/sprite.svg', // The output path for the sprite
//     [loaderOptions], // Optional, see https://github.com/kisenka/svg-sprite-loader#configuration
//     [pluginOptions] // Optional, see https://github.com/kisenka/svg-sprite-loader#configuration
// );

mix.copyDirectory('resources/assets/admin/img', 'public/assets/admin/img');
mix.copyDirectory('resources/assets/admin/plugins/fontawesome-free/webfonts', 'public/assets/admin/webfonts');
