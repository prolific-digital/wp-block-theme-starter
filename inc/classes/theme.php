<?php

class theme {

    /**
     * Registers custom block styles for the theme.
     *
     * This function registers several custom block styles for various core blocks
     * such as 'core/details', 'core/post-terms', 'core/list', 'core/navigation-link',
     * and 'core/heading'. Each style is defined with a unique name, label, and inline
     * CSS styles.
     *
     * Block styles:
     * - Arrow icon for details block
     * - Pill style for post terms block
     * - Checkmark style for list block
     * - Arrow link style for navigation link block
     * - Asterisk style for heading block
     *
     * @return void
     * @author Prolific Digital
     */
    static function block_styles() {
        register_block_style(
            'core/details',
            array(
                'name'         => 'arrow-icon-details',
                'label'        => __('Arrow icon', 'prolific'),
                /*
				 * Styles for the custom Arrow icon style of the Details block
				 */
                'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
            )
        );
        register_block_style(
            'core/post-terms',
            array(
                'name'         => 'pill',
                'label'        => __('Pill', 'prolific'),
                /*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
                'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
            )
        );
        register_block_style(
            'core/list',
            array(
                'name'         => 'checkmark-list',
                'label'        => __('Checkmark', 'prolific'),
                /*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
                'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
            )
        );
        register_block_style(
            'core/navigation-link',
            array(
                'name'         => 'arrow-link',
                'label'        => __('With arrow', 'prolific'),
                /*
				 * Styles for the custom arrow nav link block style
				 */
                'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
            )
        );
        register_block_style(
            'core/heading',
            array(
                'name'         => 'asterisk',
                'label'        => __('With asterisk', 'prolific'),
                'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
            )
        );
    }

    /**
     * Enqueues stylesheets for specific blocks in the theme.
     *
     * This function uses `wp_enqueue_block_style()` to enqueue a stylesheet for a specific block.
     * The stylesheets will only get loaded when the block is rendered, both in the editor and
     * on the front end, which improves performance and reduces the amount of data requested
     * by visitors.
     *
     * @return void
     * @author Prolific Digital
     */
    static function block_stylesheets() {
        /**
         * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
         * for a specific block. These will only get loaded when the block is rendered
         * (both in the editor and on the front end), improving performance
         * and reducing the amount of data requested by visitors.
         *
         * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
         */
        wp_enqueue_block_style(
            'core/button',
            array(
                'handle' => 'prolific-button-style-outline',
                'src'    => get_parent_theme_file_uri('assets/css/button-outline.css'),
                'ver'    => wp_get_theme(get_template())->get('Version'),
                'path'   => get_parent_theme_file_path('assets/css/button-outline.css'),
            )
        );
    }

    /**
     * Registers custom block pattern categories for the theme.
     *
     * This function registers a block pattern category named 'prolific_page'.
     * This category is used to group block patterns that represent full page layouts.
     *
     * Category details:
     * - Name: prolific_page
     * - Label: Pages
     * - Description: A collection of full page layouts.
     *
     * @return void
     * @see https://developer.wordpress.org/reference/functions/register_block_pattern_category/
     * @author Prolific Digital
     */
    static function pattern_categories() {

        register_block_pattern_category(
            'prolific_page',
            array(
                'label'       => _x('Pages', 'Block pattern category', 'prolificdigital'),
                'description' => __('A collection of full page layouts.', 'prolificdigital'),
            )
        );
    }

    /**
     * Registers custom block types using Advanced Custom Fields (ACF).
     *
     * This function checks if the ACF function `acf_register_block_type` exists and, if it does,
     * registers custom block types. The custom block types should be defined in the specified
     * directories and files. Currently, this example includes a placeholder for an accordion block.
     *
     * Example usage:
     * - Define the block types in their respective files within the '/blocks' directory of your theme.
     * - Uncomment the registration line and adjust the path as needed for each block type.
     *
     * @author Prolific Digital
     * @return void
     */
    static function block_types() {
        // Check if the ACF function exists.
        if (function_exists('acf_register_block_type')) {
            // Example block registration.
            // register_block_type(get_template_directory() . '/blocks/accordions');
        }
    }

    /**
     * Adds a custom block category for use in the block editor.
     *
     * This function checks if the current editor context is for a post and, if so, adds a custom
     * block category named 'Custom Blocks' to the beginning of the existing block categories array.
     * This allows custom blocks to be grouped under a specific category in the block editor.
     *
     * @param array $block_categories Array of existing block categories.
     * @param object $editor_context The current editor context, including the post being edited.
     *
     * @author Prolific Digital
     * @return array Modified array of block categories with the custom category added.
     */
    static function block_categories($block_categories, $editor_context) {
        if (!empty($editor_context->post)) {
            array_unshift(
                $block_categories,
                array(
                    'slug'  => 'custom-blocks',
                    'title' => __('Custom Blocks'),
                    'icon'  => null,
                )
            );
        }
        return $block_categories;
    }

    /**
     * Sets the save path for ACF JSON files.
     *
     * This function updates the save path for Advanced Custom Fields (ACF) JSON files.
     * It sets the path to a specific directory within the theme. This allows ACF field groups
     * to be saved as JSON files for version control and easier migrations.
     *
     * @param string $path The current save path for ACF JSON files.
     *
     * @author Prolific Digital
     * @return string Updated save path for ACF JSON files.
     */
    static function json_save_folder($path) {
        // Update path.
        $path = get_stylesheet_directory() . '/inc/acf/json/';

        // Return updated path.
        return $path;
    }

    /**
     * Sets the load path for ACF JSON files.
     *
     * This function updates the load path for Advanced Custom Fields (ACF) JSON files.
     * It removes the original path and sets the path to a specific directory within the theme.
     * This allows ACF to load field groups from the specified directory.
     *
     * @param array $paths Array of current load paths for ACF JSON files.
     *
     * @author Prolific Digital
     * @return array Updated array of load paths for ACF JSON files.
     */
    static function json_load_folder($paths) {
        // Remove original path (optional).
        unset($paths[0]);

        // Append new path.
        $paths[] = get_stylesheet_directory() . '/inc/acf/json/';

        // Return updated paths.
        return $paths;
    }


    /**
     * Adds an ACF options page to the WordPress admin.
     *
     * This function checks if the ACF function `acf_add_options_page` exists and, if it does,
     * adds a custom options page to the WordPress admin. The options page allows administrators
     * to set site-wide options that can be managed from a central location within the admin.
     *
     * @author Prolific Digital
     * @return void
     */
    static function add_option_page() {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(array(
                'page_title'    => 'Site Options',
                'menu_title'    => 'Site Options',
                'menu_slug'     => 'acf-site-options',
                'capability'    => 'edit_posts',
                'redirect'      => false,
            ));
        }
    }

    /**
     * Sets the JPEG image quality to the highest level.
     *
     * This function returns a value of 100 to set the JPEG image quality to the maximum level.
     * It can be used to ensure that JPEG images are saved with the best possible quality.
     *
     * @return int JPEG quality value (100).
     * @author Prolific Digital
     */
    static function high_jpg_quality() {
        return 100;
    }

    /**
     * Enqueues theme styles and scripts.
     *
     * This function loads the main stylesheet and JavaScript file for the theme.
     * It uses the asset file generated during the build process to ensure that
     * dependencies and versions are correctly managed. This helps in loading
     * the required CSS and JavaScript files with their dependencies.
     *
     * @return void
     * @author Prolific Digital
     */
    static function resources() {
        if (defined('WP_ENVIRONMENT_TYPE') && WP_ENVIRONMENT_TYPE === 'local') {
            wp_enqueue_style(
                'prolific-style',
                'http://localhost:3000/wp-content/themes/' . basename(get_template_directory()) . '/build/main.css',
                [],
                null,
                'all'
            );

            wp_enqueue_script(
                'prolific-script',
                'http://localhost:3000/wp-content/themes/' . basename(get_template_directory()) . '/build/main.js',
                [],
                null,
                true
            );
        } else {
            $asset = include get_theme_file_path('build/main.asset.php');

            wp_enqueue_style(
                'prolific-style',
                get_theme_file_uri('build/main.css'),
                $asset['dependencies'],
                $asset['version']
            );

            wp_enqueue_script(
                'prolific-script',
                get_theme_file_uri('build/main.js'),
                $asset['dependencies'],
                $asset['version'],
                true
            );
        }
    }


    /**
     * Adds theme support for various block editor features.
     *
     * This function enables support for block styles and custom spacing
     * within the WordPress block editor. Enabling these features allows
     * the theme to utilize enhanced styling options and custom spacing controls.
     *
     * @return void
     * @author Prolific Digital
     */
    static function block_support() {
        // Add support for block styles.
        add_theme_support('wp-block-styles');

        // Add support for custom spacing.
        add_theme_support('custom-spacing');
    }

    /**
     * Adds theme support for various WordPress features.
     *
     * This function enables support for the document title tag and post thumbnails.
     * These features allow WordPress to manage the document title and enable the use
     * of featured images in posts and pages.
     *
     * @return void
     * @author Prolific Digital
     */
    static function supports() {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
    }

    /**
     * Registers navigation menus for the theme.
     *
     * This function registers multiple navigation menus, allowing them to be managed
     * from the WordPress admin area. Each menu is given a unique location identifier
     * and a human-readable name.
     *
     * Registered menus:
     * - Action Menu
     * - Main Menu
     * - Footer Menu
     * - Legal Menu
     * - Social Menu
     *
     * @return void
     * @author Prolific Digital
     */
    static function register_nav_menus() {
        register_nav_menus(array(
            'action-menu' => __('Action Menu', 'text_domain'),
            'main-menu' => __('Main Menu', 'text_domain'),
            'footer-menu' => __('Footer Menu', 'text_domain'),
            'legal-menu' => __('Legal Menu', 'text_domain'),
            'social-menu' => __('Social Menu', 'text_domain'),
        ));
    }

    /**
     * Wraps embedded media in a custom div for styling.
     *
     * This function takes the HTML of embedded media (e.g., videos) and wraps it
     * in a div with the class "video-wrapper". This allows for custom styling
     * of embedded media elements.
     *
     * @param string $html The original HTML of the embedded media.
     *
     * @return string Modified HTML wrapped in a div with the class "video-wrapper".
     * @author Prolific Digital
     */
    static function embed_wrapper($html) {
        return '<div class="video-wrapper">' . $html . '</div>';
    }

    /**
     * Modifies the excerpt "more" string.
     *
     * This function changes the string that appears at the end of the excerpt
     * to a simple ellipsis ('...'). This can be useful for customizing the
     * excerpt display on posts.
     *
     * @param string $more The current "more" string.
     *
     * @global WP_Post $post The current post object.
     * @return string The modified "more" string ('...').
     * @author Prolific Digital
     */
    static function change_excerpt($more) {
        global $post;
        return '...';
    }

    /**
     * Adds support for additional MIME types.
     *
     * This function allows the upload of SVG and JSON files by adding their MIME types
     * to the list of allowed MIME types in WordPress. This enables users to upload these
     * file types through the WordPress media uploader.
     *
     * @param array $mimes An array of currently allowed MIME types.
     *
     * @return array The modified array of allowed MIME types with SVG and JSON added.
     * @author Prolific Digital
     */
    static function mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        $mimes['json'] = 'text/plain';
        return $mimes;
    }

    /**
     * Registers a sidebar for the theme.
     *
     * This function checks if the `register_sidebar` function exists and, if it does,
     * registers a sidebar with the specified settings. The sidebar can be used to add
     * widgets to the sidebar area of the theme.
     *
     * @return void
     * @author Prolific Digital
     */
    static function add_sidebar() {
        if (function_exists('register_sidebar')) {
            register_sidebar([
                'name' => 'Sidebar Widgets',
                'id'   => 'sidebar-widgets',
                'description'   => 'These are widgets for the sidebar.',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2>',
                'after_title'   => '</h2>'
            ]);
        }
    }

    static function editor_resources() {
        wp_enqueue_style('gutenberg_styles', get_theme_file_uri('/dist/admin.css'), false, '1.0', 'all');
        wp_enqueue_script('gutenberg_scripts', get_template_directory_uri() . '/dist/app.js', ['wp-blocks', 'wp-element', 'wp-i18n', 'wp-components', 'wp-editor'], '1.0', true);
    }
}
