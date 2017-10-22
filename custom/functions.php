<?php
/**
 * Functions.php
 *
 * @package  Theme_Customisations
 * @author   WooThemes
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * functions.php
 * Add PHP snippets here
 */

/**
* Grab latest post title by an author!
*
* @param array $data Options for the function.
* @return string|null Post title for the latest,  * or null if none.
*/
add_action( 'rest_api_init', 'customRest_register_routes' );

function customRest_register_routes() {
	// Add the plaintext content to posts
	register_api_field(
		'post',
		'plaintext',
		array(
			'get_callback'    => 'dt_return_plaintext_content',
		)
	);
	// Add deep-thoughts/v1/get-all-post-ids route
	register_rest_route( 'custom-rest/v1', '/get-post-id/(?P<id>\d+)', array(
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