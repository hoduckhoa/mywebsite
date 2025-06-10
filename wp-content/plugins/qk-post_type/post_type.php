<?php 
/**
 * Plugin Name: QK Register Post Type
 * Description: This plugin register all post type come with theme.
 * Version: 1.0
 * Author: Quannt
 * Author URI: http://qkthemes.com
 */
?>
<?php


//wp_type, wp_type_cat
add_action( 'init', 'nivo_codex_testimonial_init' );
add_action( 'init', 'nivo_codex_portfolio_init' );
add_action( 'init', 'nivo_codex_panel_init' );
add_action( 'init', 'nivo_codex_faqs_init' );

/*  Portfolio*/
function nivo_codex_portfolio_init() {
  $labels = array(
    'name'               => __( 'Portfolio', 'post type general name', 'nivo' ),
    'singular_name'      => __( 'Portfolio', 'post type singular name', 'nivo' ),
    'menu_name'          => __( 'Portfolio', 'admin menu', 'nivo' ),
    'name_admin_bar'     => __( 'Portfolio', 'add new on admin bar', 'nivo' ),
    'add_new'            => __( 'Add New', 'Portfolio', 'nivo' ),
    'add_new_item'       => __( 'Add New Portfolio', 'nivo' ),
    'new_item'           => __( 'New Portfolio', 'nivo' ),
    'edit_item'          => __( 'Edit Portfolio', 'nivo' ),
    'view_item'          => __( 'View Portfolio', 'nivo' ),
    'all_items'          => __( 'All Portfolio', 'nivo' ),
    'search_items'       => __( 'Search Portfolio', 'nivo' ),
    'parent_item_colon'  => __( 'Parent Portfolio:', 'nivo' ),
    'not_found'          => __( 'No Portfolio found.', 'nivo' ),
    'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'nivo' ),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'menu_icon'      => 'dashicons-admin-users',
    'publicly_queryable' => true,
    'menu_position'    => 2,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'portfolio' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'thumbnail', 'editor' ) 
  );

  register_post_type( 'portfolio', $args );
}

// create two taxonomies, genres and writers for the post type "book"
function create_portfolio_taxonomies() {
  
  // Add new taxonomy, make it hierarchical (like categories)
    
   $labels = array(

            'name'              => _x( 'Portfolio Category', 'taxonomy general name', 'nivo' ),

            'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'nivo' ),

            'search_items'      => __( 'Search Portfolio Category', 'nivo' ),

            'all_items'         => __( 'All Portfolio Category', 'nivo' ),

            'parent_item'       => __( 'Parent Portfolio Category', 'nivo' ),

            'parent_item_colon' => __( 'Parent Portfolio Category:', 'nivo' ),

            'edit_item'         => __( 'Edit Portfolio Category', 'nivo' ),

            'update_item'       => __( 'Update Portfolio Category', 'nivo' ),

            'add_new_item'      => __( 'Add New Portfolio Category', 'nivo' ),

            'new_item_name'     => __( 'New Portfolio Category Name', 'nivo' ),

            'menu_name'         => __( 'Portfolio Category', 'nivo' ),

    );
     $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'portfolio_category' ),

    );
    register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );
}
add_action( 'init', 'create_portfolio_taxonomies' );

/**
 * Register a Testimonial slide post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function nivo_codex_testimonial_init() {
  $labels = array(
    'name'               => __( 'Testimonial', 'post type general name', 'nivo' ),
    'singular_name'      => __( 'Testimonial', 'post type singular name', 'nivo' ),
    'menu_name'          => __( 'Testimonial', 'admin menu', 'nivo' ),
    'name_admin_bar'     => __( 'Testimonial', 'add new on admin bar', 'nivo' ),
    'add_new'            => __( 'Add New', 'Testimonial', 'nivo' ),
    'add_new_item'       => __( 'Add New Testimonial', 'nivo' ),
    'new_item'           => __( 'New Testimonial', 'nivo' ),
    'edit_item'          => __( 'Edit Testimonial', 'nivo' ),
    'view_item'          => __( 'View Testimonial', 'nivo' ),
    'all_items'          => __( 'All Testimonial', 'nivo' ),
    'search_items'       => __( 'Search Testimonial', 'nivo' ),
    'parent_item_colon'  => __( 'Parent Testimonial:', 'nivo' ),
    'not_found'          => __( 'No Testimonial found.', 'nivo' ),
    'not_found_in_trash' => __( 'No Testimonial found in Trash.', 'nivo' ),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'menu_icon'      => 'dashicons-format-status',
    'publicly_queryable' => true,
    'menu_position'    => 2,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'testimonial' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'thumbnail', 'editor' ) 
  );

  register_post_type( 'testimonial', $args );
}

//creat post type panel
function nivo_codex_panel_init() {
  $labels = array(
    'name'               => __( 'Panel', 'post type general name', 'nivo' ),
    'singular_name'      => __( 'Panel', 'post type singular name', 'nivo' ),
    'menu_name'          => __( 'Panel', 'admin menu', 'nivo' ),
    'name_admin_bar'     => __( 'Panel', 'add new on admin bar', 'nivo' ),
    'add_new'            => __( 'Add New', 'Panel', 'nivo' ),
    'add_new_item'       => __( 'Add New Panel', 'nivo' ),
    'new_item'           => __( 'New Panel', 'nivo' ),
    'edit_item'          => __( 'Edit Panel', 'nivo' ),
    'view_item'          => __( 'View Panel', 'nivo' ),
    'all_items'          => __( 'All Panel', 'nivo' ),
    'search_items'       => __( 'Search Panel', 'nivo' ),
    'parent_item_colon'  => __( 'Parent Panel:', 'nivo' ),
    'not_found'          => __( 'No Panel found.', 'nivo' ),
    'not_found_in_trash' => __( 'No Panel found in Trash.', 'nivo' ),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'menu_icon'      => 'dashicons-format-status',
    'publicly_queryable' => true,
    'menu_position'    => 2,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => false,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'thumbnail', 'editor' ) 
  );

  register_post_type( 'panel', $args );
}


//creat post type faqs
function nivo_codex_faqs_init() {
  $labels = array(
    'name'               => __( 'FAQS', 'post type general name', 'nivo' ),
    'singular_name'      => __( 'FAQ', 'post type singular name', 'nivo' ),
    'menu_name'          => __( 'FAQ', 'admin menu', 'nivo' ),
    'name_admin_bar'     => __( 'FAQ', 'add new on admin bar', 'nivo' ),
    'add_new'            => __( 'Add New', 'FAQ', 'nivo' ),
    'add_new_item'       => __( 'Add New FAQ', 'nivo' ),
    'new_item'           => __( 'New FAQ', 'nivo' ),
    'edit_item'          => __( 'Edit FAQ', 'nivo' ),
    'view_item'          => __( 'View FAQ', 'nivo' ),
    'all_items'          => __( 'All FAQ', 'nivo' ),
    'search_items'       => __( 'Search FAQ', 'nivo' ),
    'parent_item_colon'  => __( 'Parent FAQ:', 'nivo' ),
    'not_found'          => __( 'No FAQ found.', 'nivo' ),
    'not_found_in_trash' => __( 'No FAQ found in Trash.', 'nivo' ),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'menu_icon'      => 'dashicons-format-status',
    'publicly_queryable' => true,
    'menu_position'    => 2,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => false,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'thumbnail', 'editor' ) 
  );

  register_post_type( 'faqs', $args );
}

