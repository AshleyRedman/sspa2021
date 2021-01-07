const mix = require('laravel-mix');

mix
    .setPublicPath('build')

    .options({
        processCssUrls: false,
        autoprefixer: { remove: false },
    })

    .copy([
        'node_modules/normalize.css/normalize.css'
    ], 'build/css')
    .copy([
        'node_modules/@fortawesome/fontawesome-free/css/all.min.css'
    ], 'build/fa/css')
    .copy([
        'node_modules/@fortawesome/fontawesome-free/js/all.min.js',
    ], 'build/fa/js')
    .copy([
        'node_modules/@fortawesome/fontawesome-free/webfonts/*',
    ], 'build/fa/webfonts')
    .copy('src/images/**', 'build/images')

    .js('src/js/index.js', 'build/js')
    .js('src/js/app.js', 'build/js')
    .vue({ version: 3 })
    .extract(['vue'])

    .sass('src/sass/var.scss', 'build/css')
    .sass('src/sass/editor.scss', 'build/css')
    .sass('src/sass/global.scss', 'build/css')
    .sass('src/sass/utilities.scss', 'build/css')
    .sass('src/sass/app.scss', 'build/css');