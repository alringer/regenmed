<?php
function add_service_taxonomies() {

    $taxonomy = 'service_category';

    $object_type = 'Categories of service';

    $labels = array(
        'name' => _x( 'Service Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Service Category', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Service Categories' ),
        'all_items' => __( 'All Service Categories' ),
        'parent_item' => __( 'Parent Service Category' ),
        'parent_item_colon' => __( 'Parent Service Category:' ),
        'edit_item' => __( 'Edit Service Category' ),
        'update_item' => __( 'Update Service Category' ),
        'add_new_item' => __( 'Add New Service Category' ),
        'new_item_name' => __( 'New Service Category Name' ),
        'menu_name' => __( 'Service Categories' ),
    );

    $args = array(
        'labels' => $labels,
        'show_in_rest' => true,
        'rewrite' => array(
            'slug' => 'service-categories',
            'with_front' => false,
        ),
    );



    register_taxonomy( $taxonomy, $object_type, $args );
}

add_action( 'init', 'add_service_taxonomies', 0 );