var Encore = require('@symfony/webpack-encore');
const {VueLoaderPlugin}=require("vue-loader");
Encore
    .addEntry('main', './assets/main.js')
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
 //   .enableSourceMaps(!Encore.isProduction())
    .addPlugin(new VueLoaderPlugin())
    .enableVueLoader()
    .enableSassLoader()
// uncomment to create hashed filenames (e.g. app.abc123.css)
// .enableVersioning(Encore.isProduction())

// uncomment to define the assets of the project
// .addEntry('js/app', './assets/js/app.js')
// .addStyleEntry('css/app', './assets/css/app.scss')

// uncomment if you use Sass/SCSS files
// .enableSassLoader()

// uncomment for legacy applications that require $/jQuery as a global variable
// .autoProvidejQuery()
;



module.exports = Encore.getWebpackConfig();