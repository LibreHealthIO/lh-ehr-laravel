const mix = require("laravel-mix")
const tailwindcss = require("tailwindcss")
const path = require("path")

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

mix.js("resources/app/app.js", "public/js/app.js")
    .vue({ version: 2 })
    .sass("resources/app/assets/sass/app.scss", "public/css/app.css")
    .options({
        processCssUrls: false,
        postCss: [
            tailwindcss('tailwind.config.js')
        ],
    })
    .autoload({
        "cash-dom": ["cash"]
    })
    .webpackConfig({
        output: {
            chunkFilename: 'js/[name].js?id=[chunkhash]',
        },
        resolve: {
            extensions: ['.js', '.vue', '.json'],
            alias: {
                'vue$': 'vue/dist/vue.runtime.esm.js',
                '~': path.resolve('resources/app'),
            },
        },
    })
    .babelConfig({
        plugins: ['@babel/plugin-syntax-dynamic-import']
    })
    .browserSync({
        proxy: "lh-ehr.test",
        files: ["resources/**/*.*"]
    })
    .version()
