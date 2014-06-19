<?php
/**
 * @package dhogan
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('photo-item'); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php dhogan_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php //the_post_thumbnail('single-thumb'); ?>
		<?php the_content(); ?>
		<?php
			// wp_link_pages( array(
			// 	'before' => '<div class="page-links">' . __( 'Pages:', 'dhogan' ),
			// 	'after'  => '</div>',
			// ) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'dhogan' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
