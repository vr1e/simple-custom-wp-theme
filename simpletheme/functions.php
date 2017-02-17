<?php

/* INCLUDE SCRIPTS */
// this function includes css files for header and javascript files for footer
function simpletheme_script_enqueue() {
    // css
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all');
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/simpletheme.css', array(), '1.0.0', 'all');
    // js
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', true);
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/simpletheme.js', array(), '1.0.0', true);
}
// executes simpletheme_script_enqueue function
add_action('wp_enqueue_scripts', 'simpletheme_script_enqueue');

/* ACTIVATE MENUS */
// this function adds menu support and defines two types of custom menus
function simpletheme_theme_setup() {

    add_theme_support('menus');

    register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menu('secondary', 'Footer Navigation');

}
// executes simpletheme_theme_setup function
add_action('init', 'simpletheme_theme_setup');

/* THEME SUPPORT FUNCTIONS */
// gives users an option to add custom background image
add_theme_support('custom-background');
// gives users an option to add custom header image
add_theme_support('custom-header');
// gives users an option to add featured images in posts
add_theme_support('post-thumbnails');
// adds support for different post formats (in this case aside, image and video)
add_theme_support('post-formats', array('aside', 'image', 'video'));
// adds support for the html5 search form
add_theme_support('html5',array('search-form'));

/* SIDEBAR FUNCTIONS */
// adds a sidebar function
function simple_widget_setup() {

    register_sidebar(
        array(
            'name' => 'Sidebar',
            'id' => 'sidebar-1',
            'class' => 'custom',
            'description' => 'Standard Sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        )
    );

    register_sidebar(
        array(
            'name' => 'Second Sidebar',
            'id' => 'notitle',
            'class' => 'custom',
            'description' => 'Notitle Sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        )
    );
}

add_action('widgets_init','simple_widget_setup');

/* INCLUDE WALKER FILE */

require get_template_directory() . '/inc/walker.php';

/* HEAD FUNCTION */

function awesome_remove_version() {
    return '';
}
add_filter('the_generator', 'awesome_remove_version');

/* CUSTOM POST TYPE */

// define parameters for a new custom post type
function simple_custom_post_type() {

    $labels = array(
        'name' => 'Portfolio',
        'singular_name' => 'Portfolio',
        'add_new' => 'Add Portfolio',
        'all_items' => 'All Items',
        'add_new_item' => 'Add Item',
        'edit_item' => 'Edit Item',
        'new_item' => 'New Item',
        'view_item' => 'View Item',
        'search_item' => 'Search Portfolio',
        'not_found' => 'No items found',
        'not_found_in_trash' => 'No items found in trash',
        'parent_item_colon' => 'Parent Item'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'slug' => 'portfolio',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions'
        ),
        'taxonomies' => array(
            'category',
            'post_tag'
        ),
        'menu_position' => 5,
        'exclude_from_search' => false
    );

    register_post_type('portfolio', $args);
    flush_rewrite_rules();
}
// initialize custom post type defined above
add_action('init', 'simple_custom_post_type');
