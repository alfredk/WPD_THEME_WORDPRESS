<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package dhogan
 */

get_header(); ?>

	<div id="primary" class="content-area isFront">
		<main id="main" class="photo-index" role="main">

		<?php if ( have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php if(has_post_thumbnail()){ ?>

					<article class="photo-item">
						<?php 
							echo '<a href="' . get_permalink() . '" title="' . __( 'review of the movie ') . get_the_title() . '" rel="bookmark">';
							echo '<figure class="index-photo">';
							the_post_thumbnail('index-thumb');	
							echo '</figure>';
							echo '</a>';
						 ?>	

					</article>

				<?php } ?>

			<?php endwhile; ?>

			<?php dhogan_paging_nav(); ?>
		
		<?php endif ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>