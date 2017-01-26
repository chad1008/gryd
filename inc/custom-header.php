<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @package Gryd
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses gryd_header_style()
 */
function gryd_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'gryd_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 2000,
		'height'                 => 1200,
		'flex-height'            => true,
		'video'                  => true,
		'wp-head-callback'       => 'gryd_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'gryd_custom_header_setup' );

if ( ! function_exists( 'gryd_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see gryd_custom_header_setup().
 */
function gryd_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value.
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // gryd_header_style

/** Make the play/pause buttons pretty */

function gryd_video_controls( $settings ) {
	$settings['l10n']['play'] = '<span class="screen-reader-text">' . __( 'Play background video', 'gryd' ) . '</span>' . '<span class="dashicons dashicons-controls-play"></span>';
	$settings['l10n']['pause'] = '<span class="screen-reader-text">' . __( 'Pause background video', 'gryd' ) . '</span>' . '<span class="dashicons dashicons-controls-pause"></span>';
	return $settings;
}
add_filter( 'header_video_settings', 'gryd_video_controls' );
