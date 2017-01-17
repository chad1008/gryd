<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Gryd
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function gryd_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	// Add a class of no-sidebar when there is no sidebar present
	if ( ! is_active_sidebar( 'sidebar-1' ) || is_home() || is_archive() ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'gryd_body_classes' );

/**
 * Add a custom classes to the array of post classes.
 */
function gryd_post_classes( $classes ) {

	if ( ! has_post_thumbnail() ) {
		$classes[] = 'without-featured-image';
	} else {
		$classes[] = 'with-featured-image';
	}

	return $classes;
}
add_filter( 'post_class', 'gryd_post_classes' );
