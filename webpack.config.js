const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const RemoveEmptyScriptsPlugin = require('webpack-remove-empty-scripts');
const path = require('path');
const dotenv = require('dotenv');
const webpack = require('webpack');
const FriendlyErrorsWebpackPlugin = require('friendly-errors-webpack-plugin');


dotenv.config();

const localUrl = process.env.WP_LOCAL_URL;
const themeDirectory = path.basename(path.resolve(__dirname));
const publicPath = `http://localhost:3000/wp-content/themes/${themeDirectory}/build/`;

// Filter out the React Refresh Plugin
const plugins = defaultConfig.plugins.filter(
  (plugin) => plugin.constructor.name !== 'ReactRefreshWebpackPlugin'
);

module.exports = {
  ...defaultConfig,
  entry: {
    main: path.resolve(__dirname, 'src/index.js'), // Define the entry point
  },
  output: {
    path: path.resolve(__dirname, 'build'),
    filename: '[name].js',
    publicPath: publicPath,
  },
  devServer: {
    hot: true,
    port: 3000, // You can specify the port number as needed
    headers: {
      'Access-Control-Allow-Origin': '*',
    },
    proxy: [
      {
        context: () => true,
        target: localUrl,
        changeOrigin: true,
        secure: false,
      },
    ],
    client: {
      overlay: {
        warnings: false,
        errors: true,
      },
    },
    liveReload: false, // Disable live reload to rely on HMR
    allowedHosts: [new URL(localUrl).hostname],
    host: '0.0.0.0',
  },
	stats: 'errors-only', // This minimizes the output to only errors
  plugins: [
    ...plugins, // Use the filtered plugins array
    new webpack.HotModuleReplacementPlugin(),
		new FriendlyErrorsWebpackPlugin(),
    new RemoveEmptyScriptsPlugin({
      stage: RemoveEmptyScriptsPlugin.STAGE_AFTER_PROCESS_PLUGINS,
    }),
  ],
};
