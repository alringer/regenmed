<?php
/*
Plugin Name: RegenMed Metafields
Description: Registers needed metafields to use in block editor (Gutemberg)
*/
 
// register custom meta tag field
function regenmed_register_case_studies_meta() {
    register_post_meta( 'case-studies', '_case_study_background_value_key', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
        'auth_callback' => '__return_true',
    ) );
    register_post_meta( 'case-studies', '_case_study_headline_value_key', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
        'auth_callback' => '__return_true',
    ) );
}

function regenmed_enqueue() {
    wp_enqueue_script(
        'regenmed-script',
        plugins_url( 'regenmed-meta-block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-components' )
    );
}


function regenmed_register_case_studies_template() {
    $post_type_object = get_post_type_object( 'case-studies' );
    $post_type_object->template = array(
        array( 'regenmed/casebackground' ),
        array( 'regenmed/caseheadline' ),
    );
}

add_action( 'init', 'regenmed_register_case_studies_meta' );
add_action( 'init', 'regenmed_register_case_studies_template' );
add_action( 'enqueue_block_editor_assets', 'regenmed_enqueue' );