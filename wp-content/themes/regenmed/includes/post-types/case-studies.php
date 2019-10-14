<?php

require(get_template_directory() . '/includes/taxonomies/services.php');

function regenmed_case_study_register_admin_script(){
    $screen = get_current_screen();
    if ( $screen->post_type != "case-studies" ) {
        return;
    }
    wp_register_script('imgUploads', get_template_directory_uri() . '/js/admin-image-upload.js', '', '1.0', true);
    wp_enqueue_script('imgUploads');
    $postId = get_the_ID();
    wp_localize_script('imgUploads', 'customUploads', array( 'imageData'=> get_post_meta( $postId, '_case_study_alt_image_value_key', true ), 'type'=>'case' ));
}

function create_case_study_posttype() {
    $labels = array(
        'name'                => _x( 'Case Studies', 'Post Type General Name', 'regenmed' ),
        'singular_name'       => _x( 'Case Study', 'Post Type Singular Name', 'regenmed' ),
        'menu_name'           => __( 'Case Studies', 'regenmed' ),
        'parent_item_colon'   => __( 'Parent Case Study', 'regenmed' ),
        'all_items'           => __( 'All Case Studies', 'regenmed' ),
        'view_item'           => __( 'View Case Study', 'regenmed' ),
        'add_new_item'        => __( 'Add New Case Study', 'regenmed' ),
        'add_new'             => __( 'Add New', 'regenmed' ),
        'edit_item'           => __( 'Edit Case Study', 'regenmed' ),
        'update_item'         => __( 'Update Case Study', 'regenmed' ),
        'search_items'        => __( 'Search Case Study', 'regenmed' ),
        'not_found'           => __( 'Not Found', 'regenmed' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'regenmed' ),
    );
    
    $args = array(
        'label'               => __( 'case studies', 'regenmed' ),
        'description'         => __( 'Case Studies', 'regenmed' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', ),
        'show_in_rest' => true, //Gutemberg
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'            => array( 'service_category' ),
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
        'menu_icon'			    => 'dashicons-clipboard',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'case-studies',$args);
}

/* SERVICE META BOXES */
function regenmed_case_study_add_meta_box() {
    // add_meta_box( 'case_study_metabox', 'Other data', 'regenmed_case_study_fields_callback', 'case-studies', 'side', 'high' );
    add_meta_box( 'case_study_alt_image', 'Alt image', 'regenmed_case_study_alt_image_callback', 'case-studies', 'side', 'high' );
}

function regenmed_case_study_fields_callback( $post ) {
	wp_nonce_field( 'regenmed_save_case_study_fields_data', 'regenmed_case_study_fields_meta_box_nonce' );
	
    $headline = get_post_meta( $post->ID, '_case_study_headline_value_key', true );
    $background = get_post_meta( $post->ID, '_case_study_background_value_key', true );
    
    ?>
        <div class="rgn-case-study-metabox__field">
            <label for="_case_study_headline_field">Headline</label>
            <textarea type="text" class="components-textarea-control__input" id="_case_study_headline_field" name="_case_study_headline_field"> <?php echo esc_attr( $headline )  ?> </textarea> 
        </div>
        <div class="rgn-case-study-metabox__field">
            <label for="_case_study_references_field">References:</label>
            <textarea type="text" class="components-textarea-control__input" id="_case_study_references_field" name="_case_study_references_field"> <?php echo esc_attr( $references )  ?> </textarea>
        </div>
    <?php
}
function regenmed_save_case_study_fields_data( $post_id ) {
	
	if( ! isset( $_POST['regenmed_case_study_fields_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['regenmed_case_study_fields_meta_box_nonce'], 'regenmed_save_case_study_fields_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
    }
	
	if( isset( $_POST['_case_study_headline_field'] ) ) {
        $headline_data = sanitize_text_field( $_POST['_case_study_headline_field'] );        
        update_post_meta( $post_id, '_case_study_headline_value_key', $headline_data );
    }
    if( isset( $_POST['_case_study_background_field'] ) ) {
        $background_data = sanitize_text_field( $_POST['_case_study_background_field'] );        
        update_post_meta( $post_id, '_case_study_background_value_key', $background_data );
    }
    if( isset( $_POST['_case_study_conclusion_field'] ) ) {
        $conclusion_data = sanitize_text_field( $_POST['_case_study_conclusion_field'] );        
        update_post_meta( $post_id, '_case_study_conclusion_value_key', $conclusion_data );
    }
    if( isset( $_POST['_case_study_references_field'] ) ) {
        $references_data = sanitize_text_field( $_POST['_case_study_references_field'] );        
        update_post_meta( $post_id, '_case_study_references_value_key', $references_data );
    }
	
}

//ALT IMAGE
function regenmed_case_study_alt_image_callback( $post ) {
	wp_nonce_field( 'regenmed_save_case_study_alt_image_data', 'regenmed_case_study_alt_image_meta_box_nonce' );
	
    $value = get_post_meta( $post->ID, '_case_study_alt_image_value_key', true );
    
    ?>
    <div id="metabox-wrapper">
        <p> <?php echo $value; ?> </p>
        <img id="regenmed_alt_image_tag">
        <input type="hidden" id="regenmed_alt_image_field" name="regenmed_alt_image_field">
        <input type="button" id="regenmed_alt_image_upload" value="Upload">
        <input type="button" id="regenmed_alt_image_delete" value="Delete">
    </div>
	<?php
}
function regenmed_save_case_study_alt_image_data( $post_id ) {
    
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = (
        isset( $_POST['regenmed_case_study_alt_image_meta_box_nonce'])
        && wp_verify_nonce( $_POST['regenmed_case_study_alt_image_meta_box_nonce'], 'regenmed_save_case_study_alt_image_data')
    );
    
    if( $is_autosave || $is_revision || !$is_valid_nonce){
        return;
    }

    if( isset($_POST['regenmed_alt_image_field'])){
        $image_data = json_decode( stripslashes($_POST['regenmed_alt_image_field']) );
        if( is_object($image_data[0]) ){
            $image_data = array(array(
                'id' => intval($image_data[0]->id),
                'src' => esc_url_raw($image_data[0]->src)
            ));
        }
        else{
            $image_data = [];
        }
        update_post_meta( $post_id, '_case_study_alt_image_value_key', $image_data );
    }
	
}

add_action( 'init', 'create_case_study_posttype' );
add_action( 'add_meta_boxes', 'regenmed_case_study_add_meta_box' );
// add_action( 'save_post', 'regenmed_save_case_study_fields_data' );
add_action( 'save_post', 'regenmed_save_case_study_alt_image_data' );
add_action( 'admin_enqueue_scripts', 'regenmed_case_study_register_admin_script');
