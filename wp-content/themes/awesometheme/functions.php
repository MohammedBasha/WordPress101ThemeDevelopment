<?php

// add the stylesheet and javascript files to include it

function awesome_script_enqueue() {

    /* CSS Files */
    wp_enqueue_style('bootstrapcss', get_template_directory_uri() . '/css/vendors/bootstrap.css', array(), '', 'all');
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/awesome.css', array(), '1.0.0', 'all');


    /* Javascript files */
    // Deregister & Register Jquery
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/vendors/jq.js', array(), '', true);
    wp_enqueue_script('jquery');
    // include Bootstrap JS
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/vendors/bootstrap.js', array(), '', true);
    // include My Custom JS File
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/awesome.js', array(), '1.0.0', true);
}

// add an action for those files to be included
add_action('wp_enqueue_scripts', 'awesome_script_enqueue');

/*****************************************************************/

// Theme Support for Menus

function awesome_theme_setup() {
    add_theme_support('menus');
//    register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menus(
        array(
            'primary'   => 'Primary Header Navigation',
            'secondary' => 'Secondary Footer Navigation'
        )
    );
}

add_action('init', 'awesome_theme_setup');

/*****************************************************************/

//Enable Theme Features

add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside', 'image', 'video'));
add_theme_support('html5', array('search-form'));

// Register and activate Sidebar

function awesome_widget_setup() {
    register_sidebar(
        array(
            'name'          => 'Sidebar',
            'id'            => 'sidebar-1',
            'class'         => 'custom',
            'description'   => 'Standard Sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        )
    );
}

add_action('widgets_init', 'awesome_widget_setup');


// Include the walker.php file

require get_template_directory() . '/inc/walker.php';

// remvove wordpress version

function awesome_remove_version() {
    return '';
}

add_filter('the_generator', 'awesome_remove_version');


/********************** Add Custom Post Type: Portfolio *********************************/

function awesome_custom_post_type() {

    $labels = array(
        'name' => 'Portfolio',
        'singular_name' => 'Portfolio',
        'add_new' => 'Add Item',
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
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
        ),
//        'taxonomies' => array('category', 'post_tag'),
        'menu_position' => 5,
        'exclude_from_search' => false
    );
    register_post_type('portfolio',$args);
}
add_action('init','awesome_custom_post_type');

/*************************** Custom Taxonomies *******************************/

function awesome_custom_taxonomies() {

    //add new taxonomy hierarchical
    $labels = array(
        'name' => 'Fields',
        'singular_name' => 'Field',
        'search_items' => 'Search Fields',
        'all_items' => 'All Fields',
        'parent_item' => 'Parent Field',
        'parent_item_colon' => 'Parent Field:',
        'edit_item' => 'Edit Field',
        'update_item' => 'Update Field',
        'add_new_item' => 'Add New Work Field',
        'new_item_name' => 'New Field Name',
        'menu_name' => 'Fields'
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'field' )
    );

    register_taxonomy('field', array('portfolio'), $args);

    //add new taxonomy NOT hierarchical

    register_taxonomy('software', 'portfolio', array(
        'label' => 'Software',
        'rewrite' => array( 'slug' => 'software' ),
        'hierarchical' => false
    ) );

}

add_action( 'init' , 'awesome_custom_taxonomies' );


/*********************** Create Taxonomies Link ****************************/

function awesome_get_terms( $postID, $term ){

    $terms_list = wp_get_post_terms($postID, $term);
    $output = '';

    $i = 0;
    foreach( $terms_list as $term ){
        $i++;
        if( $i > 1 ){ $output .= ', '; }
        $output .= '<a href="' . get_term_link( $term ) . '">'. $term->name .'</a>';
    }

    return $output;
}

/*************************** HELPER FUNCTIONS ************************************/

//Page Slug Body Class

function add_slug_body_class($classes) {
    global $post;
    if (isset( $post )) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter('body_class', 'add_slug_body_class');

/*******************************/

// remove wordPress version param from any enqueued scripts
function vc_remove_wp_ver_css_js($src) {
    if (strpos($src, 'ver=' . get_bloginfo('version')))
        $src = remove_query_arg('ver', $src);
    return $src;
}
add_filter('style_loader_src', 'vc_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'vc_remove_wp_ver_css_js', 9999);