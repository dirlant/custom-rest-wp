<?php 

add_action( 'rest_api_init', 'customRest_register_routes' );

function customRest_register_routes() {
	// Add the plaintext content to posts
	register_api_field(
		array( 'post', 'client', 'book' ),
		array(
			'get_callback'    => 'dt_return_plaintext_content',
		)
	);
	// Add deep-thoughts/v1/get-all-post-ids route
	register_rest_route( 'custom-rest/v1', '/get-post/(?P<id>\d+)', array(
		'methods' => 'GET',
		'callback' => 'cutomRest_post_id',
	) );
}

// Return plaintext content for posts
function dt_return_plaintext_content( $object, $field_name, $request ) {
	return strip_tags( html_entity_decode( $object['content']['rendered'] ) );
}

// Return all post IDs
function cutomRest_post_id($data) {
	
	    $all_post_ids = get_post($data['id']);

	return $all_post_ids;
}
