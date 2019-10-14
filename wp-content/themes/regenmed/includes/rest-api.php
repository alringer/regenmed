<?php
add_action( 'rest_api_init', 'rgn_api_get_literature' );   

function rgn_api_get_literature() {
    register_rest_route( 'rgn/v1', '/literature', array(
        'methods' => 'GET',
        'callback' => 'rgn_api_get_literature_callback'
    ));
}

function rgn_api_get_literature_callback( $request ) {
    // Initialize the array that will receive the posts' data. 
    $posts_data = array();
    // Receive and set the page parameter from the $request for pagination purposes
    $post_type = $request->get_param( 'posttype' );
    if(!( isset( $post_type ) || !( empty( $post_type ) ) ) || $post_type == "literature"){
        $post_type = array( 'post', 'whitepapers' );
    }

    $paged = $request->get_param( 'page' );
    $paged = ( isset( $paged ) || ! ( empty( $paged ) ) ) ? $paged : 1;

    $per_page = $request->get_param( 'per-page' );
    $per_page = ( isset( $per_page ) || ! ( empty( $per_page ) ) ) ? $per_page : 6; 

    $offset = $request->get_param( 'offset' );
    $offset = ( isset( $offset ) || ! ( empty( $offset ) ) ) ? $offset : 0; 
    
    $posts = get_posts( array(
            'posts_per_page'    => $per_page,            
            'post_type'         => $post_type, 
            'orderby'           => 'date',
            'order'             => 'DESC',
            'offset'            => ($paged-1)*$per_page+$offset
        )
    ); 
    // Loop through the posts and push the desired data to the array we've initialized earlier in the form of an object
    foreach( $posts as $post ) {
        $id = $post->ID; 
        $post_thumbnail = ( has_post_thumbnail( $id ) ) ? get_the_post_thumbnail_url( $id ) : null;
        if (strlen($post->post_excerpt) >= 180)
            $excerpt =  substr($post->post_excerpt , 0, 180). "...";
        else
            $excerpt =  $post->post_excerpt;

        $posts_data[] = (object) array( 
            'id' => $id, 
            'slug' => $post->post_name,
            'permalink' => get_permalink($id),
            'type' => $post->post_type,
            'title' => $post->post_title,
            'excerpt' => $excerpt,
            'featured_img_src' => $post_thumbnail,
            "page"=>$paged
        );
    }                  
    return $posts_data;                   
} 