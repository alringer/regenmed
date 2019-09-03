<?php

function regenmed_white_paper_register_admin_script(){
    $screen = get_current_screen();
    echo "POSTTYPE";
    echo $screen->post_type;
    if ( $screen->post_type != "whitepapers" ) {
        return;
    }
    wp_register_script('attatchmentUploads', get_template_directory_uri() . '/js/admin-attatchment-upload.js', '', '1.0', true);
    wp_enqueue_script('attatchmentUploads');
    $postId = get_the_ID();
    wp_localize_script('attatchmentUploads', 'customUploads', array( 'attData'=> get_post_meta( $postId, '_white_paper_attatchment_value_key', true ), 'type'=>'case' ));
}

function create_whitepaper_posttype() {
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
        'label'               => __( 'whitepapers', 'regenmed' ),
        'description'         => __( 'White Papers', 'regenmed' ),
        'labels'              => $whitepaper_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'categories' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'show_in_rest'        => true,
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'			    => 'dashicons-paperclip',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'whitepapers',$whitepaper_args);
}

//METABOXES
function regenmed_whitepaper_add_meta_box() {
    add_meta_box( 'white_paper_attatchment', 'Attatchment file', 'regenmed_white_paper_attatchment_callback', 'whitepapers', 'side', 'high' );
}

//ALT IMAGE
function regenmed_white_paper_attatchment_callback( $post ) {
	wp_nonce_field( 'regenmed_save_white_paper_attatchment_data', 'regenmed_white_paper_attatchment_meta_box_nonce' );
	
    $value = get_post_meta( $post->ID, '_white_paper_attatchment_value_key', true );
    
    ?>
    <div id="metabox-wrapper">
        <a id="regenmed_attatchment_value" style="word-break: break-word; display: block;" target="blank"></a>
        <input type="hidden" id="regenmed_attatchment_field" name="regenmed_attatchment_field">
        <input type="button" id="regenmed_attatchment_upload" value="Upload">
        <input type="button" id="regenmed_attatchment_delete" value="Delete">
    </div>
	<?php
}

function regenmed_save_white_paper_attatchment_data( $post_id ) {
    
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = (
        isset( $_POST['regenmed_white_paper_attatchment_meta_box_nonce'])
        && wp_verify_nonce( $_POST['regenmed_white_paper_attatchment_meta_box_nonce'], 'regenmed_save_white_paper_attatchment_data')
    );
    
    if( $is_autosave || $is_revision || !$is_valid_nonce){
        return;
    }

    if( isset($_POST['regenmed_attatchment_field'])){
        $att_data = json_decode( stripslashes($_POST['regenmed_attatchment_field']) );
        if( is_object($att_data[0]) ){
            $att_data = array(array(
                'id' => intval($att_data[0]->id),
                'src' => esc_url_raw($att_data[0]->src)
            ));
        }
        else{
            $att_data = [];
        }
        update_post_meta( $post_id, '_white_paper_attatchment_value_key', $att_data );
    }
	
}

add_action( 'init', 'create_whitepaper_posttype' );
add_action( 'add_meta_boxes', 'regenmed_whitepaper_add_meta_box' );
add_action( 'save_post', 'regenmed_save_white_paper_attatchment_data' );
add_action( 'admin_enqueue_scripts', 'regenmed_white_paper_register_admin_script');
