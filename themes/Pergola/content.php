<?php
/**
 * @package pergola
 */
?>
<?php
// If we are looking at a Photo, jump to content-photo.php and ignore the rest
if('photo' === get_post_type() ) {
    get_template_part('content','photo');
    return;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php pergola_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_excerpt( __( '&rarr;<span class="meta-nav">&rarr;</span>', 'pergola' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'pergola' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'pergola' ) );
				if ( $categories_list && pergola_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php //printf( __( 'Posted in %1$s', 'pergola' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'pergola' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php //printf( __( 'Tagged %1$s', 'pergola' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'pergola' ), __( '1 Comment', 'pergola' ), __( '% Comments', 'pergola' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( '<i class="fa fa-pencil-square-o fa-1"></i>', 'pergola' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
