<?php
function create_posttype() {
    $whitepaper_labels = array(
        'name'                => _x( 'White Papers', 'Post Type General Name', 'regenmed' ),
        'singular_name'       => _x( 'White Paper', 'Post Type Singular Name', 'regenmed' ),
        'menu_name'           => __( 'White Papers', 'regenmed' ),
        'parent_item_colon'   => __( 'Parent White Paper', 'regenmed' ),
        'all_items'           => __( 'All White Papers', 'regenmed' ),
        'view_item'           => __( 'View White Paper', 'regenmed' ),
        'add_new_item'        => __( 'Add New White Paper', 'regenmed' ),
        'add_new'             => __( 'Add New', 'regenmed' ),
        'edit_item'           => __( 'Edit White Paper', 'regenmed' ),
        'update_item'         => __( 'Update White Paper', 'regenmed' ),
        'search_items'        => __( 'Search White Paper', 'regenmed' ),
        'not_found'           => __( 'Not Found', 'regenmed' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'regenmed' ),
    );
    
    $whitepaper_args = array(
        'label'               => __( 'movies', 'regenmed' ),
        'description'         => __( 'Movie news and reviews', 'regenmed' ),
        'labels'              => $whitepaper_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'categories' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'whitepapers',$whitepaper_args);
}

