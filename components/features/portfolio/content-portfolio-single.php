<?php
/**
 * @package Gryd
 */

// Access global variable directly to adjust the content width for portfolio single page
if ( isset( $GLOBALS['content_width'] ) ) {
	$GLOBALS['content_width'] = 1100;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php echo get_the_term_list( $post->ID, 'jetpack-portfolio-type', '<span class="portfolio-entry-meta">', esc_html_x(', ', 'Used between list items, there is a space after the comma.', 'gryd' ), '</span>' ); ?>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before'   => '<div class="page-links clear">',
				'after'    => '</div>',
				'pagelink' => '<span class="page-link">%</span>',
			) );
		?>
	</div>
	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_term_list( $post->ID, 'jetpack-portfolio-tag', '', esc_html__( ', ', 'gryd' ) );
			if ( $tags_list ) :
		?>
			<span class="tags-links"><?php printf( esc_html__( 'Tagged %1$s', 'gryd' ), $tags_list ); ?></span>
		<?php endif; ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( esc_html__( 'Leave a comment', 'gryd' ), esc_html__( '1 Comment', 'gryd' ), esc_html__( '% Comments', 'gryd' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( esc_html__( 'Edit', 'gryd' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article><!-- #post-## -->