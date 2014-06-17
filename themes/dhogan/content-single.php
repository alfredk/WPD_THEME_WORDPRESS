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
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'dhogan' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			// /* translators: used between list items, there is a space after the comma */
			// $category_list = get_the_category_list( __( ', ', 'dhogan' ) );

			// /* translators: used between list items, there is a space after the comma */
			// $tag_list = get_the_tag_list( '', __( ', ', 'dhogan' ) );

			// if ( ! dhogan_categorized_blog() ) {
			// 	// This blog only has 1 category so we just need to worry about tags in the meta text
			// 	if ( '' != $tag_list ) {
			// 		$meta_text = __( 'Tagged %2$s.<a href="%3$s" rel="bookmark"></a>.', 'dhogan' );
			// 	} else {
			// 		$meta_text = __( 'Go to <a href="%3$s" rel="bookmark"></a>.', 'dhogan' );
			// 	}

			// } else {
			// 	// But this blog has loads of categories so we should probably display them here
			// 	if ( '' != $tag_list ) {
			// 		$meta_text = __( 'Category %1$s and tagged %2$s. <a href="%3$s" rel="bookmark"></a>.', 'dhogan' );
			// 	} else {
			// 		$meta_text = __( 'Category %1$s <a href="%3$s" rel="bookmark"></a>.', 'dhogan' );
			// 	}

			// } // end check for categories on this blog
			// printf(
			// 	$meta_text,
			// 	$category_list,
			// 	$tag_list,
			// 	get_permalink()
			// );
		?>
		<?php edit_post_link( __( 'Edit', 'dhogan' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
