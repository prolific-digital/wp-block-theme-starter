<?php
//======================================================================
// WORDPRESS ACTIONS
//======================================================================
add_action('enqueue_block_assets', 'theme::resources');
// add_action('enqueue_block_editor_assets', 'theme::resources');
add_action('after_setup_theme', 'theme::block_support');
add_action('after_setup_theme', 'theme::supports');
add_action('after_setup_theme', 'theme::register_nav_menus', 0);
add_action('init', 'theme::block_styles');
add_action('init', 'theme::block_stylesheets');
add_action('init', 'theme::pattern_categories');

//======================================================================
// WORDPRESS FILTERS
//======================================================================
add_filter('embed_oembed_html', 'theme::embed_wrapper', 10, 3);
add_filter('video_embed_html', 'theme::embed_wrapper');
add_filter('excerpt_more', 'theme::change_excerpt');
add_filter('jpg_quality', 'theme::high_jpg_quality');
add_filter('upload_mimes', 'theme::mime_types');

//======================================================================
// ACF ACTIONS
//======================================================================
add_action('acf/init', 'theme::block_types');
theme::add_option_page();

//======================================================================
// ACF FILTERS
//======================================================================
add_filter('acf/settings/remove_wp_meta_box', '__return_true');
add_filter('acf/settings/save_json', 'theme::json_save_folder');
add_filter('acf/settings/load_json', 'theme::json_load_folder');
add_filter('block_categories_all', 'theme::block_categories', 10, 2);
