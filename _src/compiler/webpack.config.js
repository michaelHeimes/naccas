const path = require('path');
const webpack = require('webpack');

const MiniCssExtractWebpackPlugin = require('mini-css-extract-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const {CleanWebpackPlugin} = require('clean-webpack-plugin');
const FixStyleOnlyEntriesPlugin = require('webpack-fix-style-only-entries');
const FriendlyErrorsWebpackPlugin = require('friendly-errors-webpack-plugin');

const {context, entry, devtool, outputFolder, publicFolder} = require('./config');

// const HMR = require('./hmr');
const getPublicPath = require('./publicPath');

module.exports = (env, options) => {
  const {dev} = options;
  // const hmr     = HMR.getClient();

  return {
    mode: dev ? 'development' : 'production',
    devtool: dev ? devtool : 'source-map',
    watch: dev ? dev : false,
    context: path.resolve(context),
    // NOTE: Hot reloading removed for now
    entry: {
      'styles/main': entry.mainstyle,
      'styles/admin': entry.adminstyle,
      'styles/editor': entry.editsorstyle,
      'styles/login': entry.loginstyle,
      'scripts/main': entry.mainscript
    },
    output: {
      path: path.resolve(outputFolder),
      publicPath: getPublicPath(publicFolder),
      filename: '[name].js'
    },
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /(node_modules|bower_components)/,
          use: [
            ...(dev ? [{loader: 'cache-loader'}] : []),
            {loader: 'babel-loader'}
          ]
        },
        {
          test: /\.(sa|sc|c)ss$/,
          use: [
            ...(dev ? [
              {
                loader: 'cache-loader'
              },
              {
                loader: 'style-loader',
                options: {sourceMap: true}
              }]
              : [MiniCssExtractWebpackPlugin.loader]),
            {
              loader: 'css-loader',
              options: {
                sourceMap: true,
                url: false
              }
            },
            {
              loader: 'postcss-loader',
              options: {
                ident: 'postcss',
                sourceMap: true,
                plugins: [
                  require('autoprefixer')
                ],
                config: {ctx: {dev}}
              }
            },
            {
              loader: 'resolve-url-loader',
              options: {sourceMap: true}
            },
            {
              loader: 'sass-loader',
              options: {
                sourceMap: true,
                sourceMapContents: true,
                sourceMapEmbed: true,
              }
            }
          ]
        },
        {
          test: /\.(ttf|otf|eot|woff2?|png|jpe?g|gif|svg|ico|mp4|webm)$/,
          exclude: /node_modules/,
          use: [
            {
              loader: 'file-loader',
              options: {
                name: '[path][name].[ext]',
              }
            }
          ]
        },
      ]
    },
    plugins: [
      ...(dev ? [
        new webpack.HotModuleReplacementPlugin(),
        new FriendlyErrorsWebpackPlugin()
      ] : [
        new MiniCssExtractWebpackPlugin({
          filename: '[name].css'
        }),
        new FixStyleOnlyEntriesPlugin({
          ignore: 'webpack-hot-middleware'
        }),
        new CleanWebpackPlugin(),
        new CopyWebpackPlugin([
          {
            from: path.resolve(`${context}/**/*`),
            to: path.resolve(outputFolder)
          }
        ], {
          ignore: ['*.js', '*.scss', '*.css']
        })
      ]),
      new webpack.ProvidePlugin({
        $: 'jquery',
        jQuery: 'jquery',
        jquery: 'jquery',
        'window.jquery': 'jquery',
        'window.jQuery': 'jquery',
        'window.$': 'jquery',
        Popper: ['popper.js', 'default'],
        Alert: "exports-loader?Alert!bootstrap/js/dist/alert",
        Button: "exports-loader?Button!bootstrap/js/dist/button",
        Carousel: "exports-loader?Carousel!bootstrap/js/dist/carousel",
        Collapse: "exports-loader?Collapse!bootstrap/js/dist/collapse",
        Dropdown: "exports-loader?Dropdown!bootstrap/js/dist/dropdown",
        Modal: "exports-loader?Modal!bootstrap/js/dist/modal",
        Popover: "exports-loader?Popover!bootstrap/js/dist/popover",
        Scrollspy: "exports-loader?Scrollspy!bootstrap/js/dist/scrollspy",
        Tab: "exports-loader?Tab!bootstrap/js/dist/tab",
        Tooltip: "exports-loader?Tooltip!bootstrap/js/dist/tooltip",
        Util: "exports-loader?Util!bootstrap/js/dist/util",
      })
    ]
  }
};