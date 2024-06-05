# WordPress Block Theme Starter

Welcome to the WordPress Block Theme Starter! This theme is a modern, block-based theme utilizing the latest WordPress theming standards. Below, you'll find detailed instructions on how to set up and work with this theme.

## Features

- Block-Based: Built entirely using WordPress blocks, providing a seamless and flexible editing experience.
- Modern Tooling: Utilizes `@wordpress/scripts` packages to handle the compilation of theme assets.
- Development Workflow: Easy to set up and start developing with `yarn`, allowing for efficient asset management and compilation.

## Requirements

- Node.js (version 18.x or later)
- Yarn (version 1.x or later)

## Installation

1. Clone the repository:

   ```
   git clone <repository-url>
   ```

2. Navigate to the theme directory:

   ```
   cd /wp-content/themes/wp-block-theme-starter
   ```

3. Install project dependencies:

   ```
   yarn
   ```

## Development

You will need to create a `.env` file in the root directory of your theme. Inside this `.env` file, you should include the variable `WP_LOCAL_URL`. The value of `WP_LOCAL_URL` should match the local URL of your local WordPress site. This is necessary for local development.

```
WP_LOCAL_URL=http://example.local
```

### Start the Development Server

To start developing and watching the theme for changes, use the following command:

```
yarn dev
```

This command will compile the theme assets and watch for any changes, re-compiling as necessary. It also sets up a development server with hot module replacement for a seamless development experience.

### Alternative Development Command

You can also use:

```
yarn start
```

This command functions similarly to `yarn dev`, compiling the theme assets and watching for changes, re-compiling as necessary.

### Compile for Production

To compile the theme assets for production, use the following command:

```
yarn build
```

This command will create optimized, minified assets suitable for a live environment.

## Scripts Overview

- `yarn dev`: Starts the development server, compiles the theme assets, and watches for changes with hot module replacement.
- `yarn start`: An alias for `yarn dev`, providing the same functionality.
- `yarn build`: Compiles and optimizes the theme assets for production.

## Using the Theme

1. Activate the Theme:
   - Once you have compiled the theme assets, upload the theme directory to your WordPress installation's `wp-content/themes` directory.
   - Activate the theme from the WordPress admin dashboard.
2. Customize the Theme:
   - Use the WordPress Block Editor to create and customize your pages and posts with ease.

## Support

Reference the official WordPress theme handbook chapter [Build Process](https://developer.wordpress.org/themes/advanced-topics/build-process/) for more details on the build process.

For any issues or questions, feel free to contact our support team at [support@prolificdigital.com](mailto:support@prolificdigital.com).
