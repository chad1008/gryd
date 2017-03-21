<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.me/
 *
 * @package Gryd
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 */
function gryd_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'	=> 'gryd_infinite_scroll_render',
		'footer'	=> 'page',
		'footer_widgets' => array(
			'sidebar-2',
			'sidebar-3',
			'sidebar-4',
		),
		'posts_per_page' => 10,
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Social Menus
	add_theme_support( 'jetpack-social-menu' );

	// Add theme support for JetPack Portfolio
	add_theme_support( 'jetpack-portfolio' );
}
add_action( 'after_setup_theme', 'gryd_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function gryd_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'components/post/content', 'search' );
		else :
			get_template_part( 'components/post/content', 'grid' );
		endif;
	}
}

function gryd_social_menu() {
	if ( ! function_exists( 'jetpack_social_menu' ) ) {
		return;
	} else {
		jetpack_social_menu();
	}
}
