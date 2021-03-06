<?php
/**
 * Custom archive to display photo
 * @package pergola
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
							echo '<figcaption>'.get_the_title().'</figcaption>';
						 	echo '<span class="img-hover"></span>';
							echo '</figure>';
							echo '</a>';
						 ?>
					</article>
				<?php } ?>

			<?php endwhile; ?>

			<?php pergola_paging_nav(); ?>

		<?php endif ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>