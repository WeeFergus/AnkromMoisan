<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Ankrom_Moisan
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ankrom_moisan_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'ankrom_moisan_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ankrom_moisan_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'ankrom_moisan_pingback_header' );


/**
 * Like get_template_part() put lets you pass args to the template file
 * Args are available in the template as $template_args array
 * @param string filepart
 * @param mixed wp_args style argument list
 */
// function _get_template_part($file, $template_args = array())
// {
//   $template_args = wp_parse_args($template_args);
//   $file = get_template_directory() . '/' . $file . '.php';
//   ob_start();
//   $return = require $file;
//   echo ob_get_clean();
// }

function _get_template_part( $file, $template_args = array(), $cache_args = array() ) {

	$template_args = wp_parse_args( $template_args );
	$cache_args = wp_parse_args( $cache_args );

	if ( $cache_args ) {

		foreach ( $template_args as $key => $value ) {
			if ( is_scalar( $value ) || is_array( $value ) ) {
				$cache_args[$key] = $value;
			} else if ( is_object( $value ) && method_exists( $value, 'get_id' ) ) {
				$cache_args[$key] = call_user_method( 'get_id', $value );
			}
		}

		if ( ( $cache = wp_cache_get( $file, serialize( $cache_args ) ) ) !== false ) {

			if ( ! empty( $template_args['return'] ) )
				return $cache;

			echo $cache;
			return;
		}

	}

	$file_handle = $file;

	do_action( 'start_operation', 'hm_template_part::' . $file_handle );

	if ( file_exists( get_stylesheet_directory() . '/' . $file . '.php' ) )
		$file = get_stylesheet_directory() . '/' . $file . '.php';

	elseif ( file_exists( get_template_directory() . '/' . $file . '.php' ) )
		$file = get_template_directory() . '/' . $file . '.php';

	ob_start();
	$return = require( $file );
	$data = ob_get_clean();

	do_action( 'end_operation', 'hm_template_part::' . $file_handle );

	if ( $cache_args ) {
		wp_cache_set( $file, $data, serialize( $cache_args ), 3600 );
	}

	if ( ! empty( $template_args['return'] ) )
		if ( $return === false )
			return false;
		else
			return $data;

	echo $data;
}
