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

include ('get-rest.php');
