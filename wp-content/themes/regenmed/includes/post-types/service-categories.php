<?php
function regenmed_service_category_register_admin_script(){
    $screen = get_current_screen();
    if ( $screen->post_type != "service-categories" ) {
        return;
    }
    wp_register_script('imgUploads', get_template_directory_uri() . '/js/admin-image-upload.js', '', '1.0', true);
    wp_enqueue_script('imgUploads');
    $postId = get_the_ID();
    wp_localize_script('imgUploads', 'customUploads', array( 'imageData'=> get_post_meta( $postId, '_service_category_alt_image_value_key', true ), 'type'=>'service'));
}
/* SERVICE CPT */
function regenmed_service_category_post_type() {
	$labels = array(
        'name'                => _x( 'Services', 'Post Type General Name', 'regenmed' ),
        'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'regenmed' ),
        'menu_name'           => __( 'Services', 'regenmed' ),
        'parent_item_colon'   => __( 'Parent Service', 'regenmed' ),
        'all_items'           => __( 'All Services', 'regenmed' ),
        'view_item'           => __( 'View Service', 'regenmed' ),
        'add_new_item'        => __( 'Add New Service', 'regenmed' ),
        'add_new'             => __( 'Add New', 'regenmed' ),
        'edit_item'           => __( 'Edit Service', 'regenmed' ),
        'update_item'         => __( 'Update Service', 'regenmed' ),
        'search_items'        => __( 'Search Service', 'regenmed' ),
        'not_found'           => __( 'Not Found', 'regenmed' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'regenmed' ),
    );
	
	$args = array(
		// 'labels'			=> $labels,
		// 'show_ui'			=> true,
		// 'show_in_menu'		=> true,
		// 'capability_type'	=> 'post',
		// 'hierarchical'		=> false,
		// 'menu_position'		=> 6,
		// 'menu_icon'			=> 'dashicons-list-view',
        // 'supports'			=> array( 'title', 'excerpt', 'thumbnail')
        
        'label'                 => 'Service',
		'description'           => 'Categories included in the services the company gives',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail','page-attributes'),
		'taxonomies'            => array( 'category'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'			    => 'dashicons-list-view',
		'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'show_in_rest'        => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'rewrite'           => array( 
            'slug' => 'our-services', // use this slug instead of post type name
        //     'with_front' => FALSE // if you have a permalink base such as /blog/ then setting this to false ensures your custom post type permalink structure will be /products/ instead of /blog/products/
        )
	);
	
    register_post_type( 'service-categories', $args );
    register_taxonomy_for_object_type( 'parent_category', 'bios' );
    register_taxonomy_for_object_type( 'post_tag', 'bios' );
}

/* SERVICE META BOXES */
function regenmed_service_category_add_meta_box() {
    add_meta_box( 'service_alt_image', 'Icon image', 'regenmed_service_category_alt_image_callback', 'service-categories', 'side', 'high' );
    add_meta_box( 'service_category_description', 'Main Description', 'regenmed_service_category_description_callback', 'service-categories', 'advanced', 'high' );
}

//DESCRIPTION
function regenmed_service_category_description_callback( $post ) {
	wp_nonce_field( 'regenmed_save_service_category_description_data', 'regenmed_service_category_description_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_service_category_description_value_key', true );
	
	echo '<label for="regenmed_service_category_description_field">Categories description: </label>';
	echo '<textarea id="regenmed_service_category_description_field" name="regenmed_service_category_description_field" value="" />' . esc_attr( $value ) . '</textarea>';
}
function regenmed_save_service_category_description_data( $post_id ) {
	
	if( ! isset( $_POST['regenmed_service_category_description_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['regenmed_service_category_description_meta_box_nonce'], 'regenmed_save_service_category_description_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['regenmed_service_category_description_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['regenmed_service_category_description_field'] );
	
	update_post_meta( $post_id, '_service_category_description_value_key', $my_data );
	
}

//ALT IMAGE
function regenmed_service_category_alt_image_callback( $post ) {
	wp_nonce_field( 'regenmed_save_service_category_alt_image_data', 'regenmed_service_category_alt_image_meta_box_nonce' );
	
    $value = get_post_meta( $post->ID, '_service_category_alt_image_value_key', true );
    
    ?>
    <div id="metabox-wrapper">
        <p> <?php echo $value->src; ?> </p>
        <img id="regenmed_alt_image_tag">
        <input type="hidden" id="regenmed_alt_image_field" name="regenmed_alt_image_field">
        <input type="button" id="regenmed_alt_image_upload" value="Upload">
        <input type="button" id="regenmed_alt_image_delete" value="Delete">
    </div>
	<?php
}
function regenmed_save_service_category_alt_image_data( $post_id ) {
    
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = (
        isset( $_POST['regenmed_service_category_alt_image_meta_box_nonce'])
        && wp_verify_nonce( $_POST['regenmed_service_category_alt_image_meta_box_nonce'], 'regenmed_save_service_category_alt_image_data')
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
        update_post_meta( $post_id, '_service_category_alt_image_value_key', $image_data );
    }
	
}

add_action( 'init', 'regenmed_service_category_post_type' );
add_action( 'add_meta_boxes', 'regenmed_service_category_add_meta_box' );
add_action( 'save_post', 'regenmed_save_service_category_alt_image_data' );
add_action( 'save_post', 'regenmed_save_service_category_description_data' );
add_action( 'admin_enqueue_scripts', 'regenmed_service_category_register_admin_script');