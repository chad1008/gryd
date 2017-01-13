<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gryd
 */

?>

<?php $thumbnail_background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a class="entry-link" href="<?php esc_url( get_permalink() ) ?>" rel="bookmark">
		<div class="title-box">
			<header class="entry-header">
				<?php
				if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title">', '</h2>' );
				}
				?>

			</header>
		</div>
	</a>
	<div class="entry-thumbnail" style="background-image:url('<?php echo esc_url( $thumbnail_background['0'] ); ?>')"></div>

</article><!-- #post-## -->