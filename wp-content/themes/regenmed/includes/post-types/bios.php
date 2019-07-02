<?php
/* SERVICE CPT */
function regenmed_bio_post_type() {
	$labels = array(
        'name'                => _x( 'Bios', 'Post Type General Name', 'regenmed' ),
        'singular_name'       => _x( 'Bio', 'Post Type Singular Name', 'regenmed' ),
        'menu_name'           => __( 'Bios', 'regenmed' ),
        'parent_item_colon'   => __( 'Parent Bio', 'regenmed' ),
        'all_items'           => __( 'All Bios', 'regenmed' ),
        'view_item'           => __( 'View Bio', 'regenmed' ),
        'add_new_item'        => __( 'Add New Bio', 'regenmed' ),
        'add_new'             => __( 'Add New', 'regenmed' ),
        'edit_item'           => __( 'Edit Bio', 'regenmed' ),
        'update_item'         => __( 'Update Bio', 'regenmed' ),
        'search_items'        => __( 'Search Bio', 'regenmed' ),
        'not_found'           => __( 'Not Found', 'regenmed' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'regenmed' ),
    );
	
	$args = array(
        'label'                 => 'Bio',
		'description'           => 'Our people bios',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail','page-attributes'),
		'taxonomies'            => array( 'product_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'			    => 'dashicons-id',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	
    register_post_type( 'bios', $args );
    register_taxonomy_for_object_type( 'category', 'bios' );
    register_taxonomy_for_object_type( 'post_tag', 'bios' );
	
}

/* SERVICE META BOXES */
function regenmed_bio_add_meta_box() {
    add_meta_box( 'bio_metabox', 'Basic description', 'regenmed_bio_fields_callback', 'bios', 'side', 'high' );
    add_meta_box( 'bio_education_metabox', 'Education', 'regenmed_bio_education_callback', 'bios', 'normal', 'high' );
    add_meta_box( 'bio_links_metabox', 'Publications', 'regenmed_bio_links_callback', 'bios', 'normal', 'high' );
}

//ALL FIELDS
function regenmed_bio_fields_callback( $post ) {
	wp_nonce_field( 'regenmed_save_bio_fields_data', 'regenmed_bio_fields_meta_box_nonce' );
	
    $position = get_post_meta( $post->ID, '_bio_position_value_key', true );
    $company = get_post_meta( $post->ID, '_bio_company_value_key', true );
    ?>
        <div class="rgn-bio-metabox__field">
            <label for="_bio_position_field">Job position:</label>
            <input type="text" id="_bio_position_field" name="_bio_position_field" value="<?php echo esc_attr( $position )  ?>" /> 
        </div>
        <div class="rgn-bio-metabox__field">
            <label for="_bio_company_field">Company:</label>
            <input type="text" id="_bio_company_field" name="_bio_company_field" value="<?php echo esc_attr( $company )  ?>" />
        </div>
    <?php
}
function regenmed_save_bio_fields_data( $post_id ) {
	
	if( ! isset( $_POST['regenmed_bio_fields_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['regenmed_bio_fields_meta_box_nonce'], 'regenmed_save_bio_fields_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( isset( $_POST['_bio_position_field'] ) ) {
        $position_data = sanitize_text_field( $_POST['_bio_position_field'] );        
        update_post_meta( $post_id, '_bio_position_value_key', $position_data );
    }
    if( isset( $_POST['_bio_company_field'] ) ) {
        $company_data = sanitize_text_field( $_POST['_bio_company_field'] );        
        update_post_meta( $post_id, '_bio_company_value_key', $company_data );
    }
	
}

//EDUCATION EDITOR
function regenmed_bio_education_callback( $post ) {
	wp_nonce_field( 'regenmed_save_bio_education_data', 'regenmed_bio_education_meta_box_nonce' );
    $education = get_post_meta( $post->ID, '_bio_education_value_key', true );
    wp_editor( 
        htmlspecialchars_decode($education),
        '_bio_education_value_key', 
        $settings = array(
            'media_buttons'=>false
        ) );
}
function regenmed_save_bio_education_data( $post_id ) {
	
	if( ! isset( $_POST['regenmed_bio_education_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['regenmed_bio_education_meta_box_nonce'], 'regenmed_save_bio_education_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
    if (!empty($_POST['_bio_education_value_key'])) {
        $education_data=htmlspecialchars($_POST['_bio_education_value_key']); //make sanitization more strict !!
        update_post_meta( $post_id, '_bio_education_value_key', $education_data );
    }
	
}

function regenmed_bio_links_callback( $post ) {
    wp_nonce_field( 'regenmed_save_bio_links_data', 'regenmed_bio_links_meta_box_nonce' );
    $links = get_post_meta( $post->ID, '_bio_links_value_key', true );
    wp_editor( 
        htmlspecialchars_decode($links),
        '_bio_links_value_key', 
        $settings = array(
            'media_buttons'=>false
        ) );
}
function regenmed_save_bio_links_data( $post_id ) {
	
	if( ! isset( $_POST['regenmed_bio_links_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['regenmed_bio_links_meta_box_nonce'], 'regenmed_save_bio_links_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
    if (!empty($_POST['_bio_links_value_key'])) {
        $links_data=htmlspecialchars($_POST['_bio_links_value_key']); //make sanitization more strict !!
        update_post_meta( $post_id, '_bio_links_value_key', $links_data );
    }
	
}

add_action( 'init', 'regenmed_bio_post_type' );
add_action( 'add_meta_boxes', 'regenmed_bio_add_meta_box' );
add_action( 'save_post', 'regenmed_save_bio_fields_data' );
add_action( 'save_post', 'regenmed_save_bio_education_data' );
add_action( 'save_post', 'regenmed_save_bio_links_data' );