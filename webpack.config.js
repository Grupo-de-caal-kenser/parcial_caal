const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
module.exports = {
  mode: 'development',
  watch: true,
  entry: {
    'js/app' : './src/js/app.js',
    'js/inicio' : './src/js/inicio.js',
    'js/login/index' : './src/js/login/index.js',
    'js/registro/index' : './src/js/registro/index.js',
    'js/roles/index' : './src/js/roles/index.js',
    'js/permisos/index' : './src/js/permisos/index.js',
    'js/permisos/estadistica2' : './src/js/permisos/estadistica2.js',
    'js/activar/index' : './src/js/activar/index.js',
    'js/dato/index' : './src/js/dato/index.js',
    'js/desactivar/index' : './src/js/desactivar/index.js',
    'js/dato/estadistica' : './src/js/dato/estadistica.js',
    'js/dato/estadistica2' : './src/js/dato/estadistica2.js',


  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'public/build')
  },
  plugins: [
    new MiniCssExtractPlugin({
        filename: 'styles.css'
    })
  ],
  module: {
    rules: [
      {
        test: /\.(c|sc|sa)ss$/,
        use: [
            {
                loader: MiniCssExtractPlugin.loader
            },
            'css-loader',
            'sass-loader'
        ]
      },
      {
        test: /\.(png|svg|jpg|gif)$/,
        loader: 'file-loader',
        options: {
           name: 'img/[name].[hash:7].[ext]'
        }
      },
    ]
  },
  resolve: {
    fallback: {
      stream: require.resolve('stream-browserify'),
      buffer: require.resolve('buffer/'),
      crypto: require.resolve('crypto-browserify')
    }
  }
};