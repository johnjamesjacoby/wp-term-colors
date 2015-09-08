<?php

/**
 * Plugin Name: WP Term Colors
 * Plugin URI:  https://wordpress.org/plugins/wp-term-colors/
 * Description: Pretty colors for categories, tags, and other taxonomy terms
 * Author:      John James Jacoby
 * Version:     0.1.2
 * Author URI:  https://profiles.wordpress.org/johnjamesjacoby/
 * License:     GPL v2 or later
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Instantiate the main WordPress Term Colors class
 *
 * @since 0.1.0
 */
function _wp_term_colors() {

	// Bail if no term meta
	if ( ! function_exists( 'add_term_meta' ) ) {
		return;
	}

	// Conditionally include the term meta UI class
	if ( function_exists( 'wp_include_term_meta_ui' ) ) {
		wp_include_term_meta_ui();
	}

	// Setup the main file
	$file = __FILE__;

	// Include the main class
	include dirname( $file ) . '/includes/class-wp-term-meta-ui.php';
	include dirname( $file ) . '/includes/class-wp-term-colors.php';

	// Instantiate the main class
	new WP_Term_Colors( $file );
}
add_action( 'init', '_wp_term_colors', 99 );
