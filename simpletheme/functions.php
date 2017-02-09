<?php
// this function includes css files for header and javascript files for footer
function simpletheme_script_enqueue() {

    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/simpletheme.css', array(), '1.0.0', 'all');
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/simpletheme.js', array(), '1.0.0', true);
}
// executes simpletheme_script_enqueue function
add_action('wp_enqueue_scripts', 'simpletheme_script_enqueue');

// this function adds menu support and defines two types of custom menus
function simpletheme_theme_setup() {

    add_theme_support('menus');

    register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menu('secondary', 'Footer Navigation');

}
// executes simpletheme_theme_setup function
add_action('init', 'simpletheme_theme_setup');