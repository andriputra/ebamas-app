// webpack.mix.js

const mix = require('laravel-mix');
const { VueLoaderPlugin } = require('vue-loader');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .copy('node_modules/@fortawesome/fontawesome-free/css/all.min.css', 'public/css')
   .webpackConfig({
      module: {
          rules: [
              {
                  test: /\.vue$/,
                  loader: 'vue-loader'
              }
          ]
      },
      plugins: [
         new VueLoaderPlugin()
      ]
  });