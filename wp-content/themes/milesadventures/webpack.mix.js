const path = require('path');
const mix = require('laravel-mix')
const config = require('./webpack.config')

mix.webpackConfig(config)

mix
  .setPublicPath(path.resolve('./'))
  .js('resources/js/front/global/index.js', 'public/js/global.js')
  .sass('resources/scss/front/main/index.scss', 'public/css/main.css')
  .version()