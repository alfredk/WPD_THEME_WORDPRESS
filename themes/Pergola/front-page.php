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
 * @package pergola
 */

get_header(); ?>

	<div id="primary" class="content-area isFront">
		<main id="main" class="photo-index" role="main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>

			<?php pergola_paging_nav(); ?>

		<?php endif ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
