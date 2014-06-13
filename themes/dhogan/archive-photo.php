<?php
/**
 * Custom archive to display photo
 * @package dhogan
 */

get_header(); ?>

	<div id="primary" class="content-area isFront">
		<main id="main" class="photo-index" role="main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php if(has_post_thumbnail()){ ?>
					<article class="photo-item">
						<?php 
							echo '<a href="' . get_permalink() . '" title="' . __( 'Photo of ') . get_the_title() . '" rel="bookmark">';
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