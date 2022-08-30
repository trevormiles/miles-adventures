const mix = require('laravel-mix')
const config = require('./webpack.config')

mix.webpackConfig(config)

mix
  .js('resources/js/front/global/index.js', 'public/js/global.js')
  .sass('resources/scss/front/main/index.scss', 'public/css/main.css')
