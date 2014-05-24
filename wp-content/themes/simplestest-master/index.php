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
 * @package simplestest
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Primary Menu', 'simplestest' ); ?></button>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'simplestest' ); ?></a>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <?php 
                                    if (has_post_thumbnail()) {
                                        echo '<div class="single-post-thumbnail clear">';
                                        echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'simone') . get_the_title() . '" rel="bookmark">';
                                        echo the_post_thumbnail();
                                        echo '</a>';
                                        echo '</div>';
                                    }
                                    ?>
                                    <header class="entry-header">
                                            <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

                                            <?php if ( 'post' == get_post_type() ) : ?>
                                            <div class="entry-meta">
                                                    <?php simplestest_posted_on(); ?>
                                            </div><!-- .entry-meta -->
                                            <?php endif; ?>
                                    </header><!-- .entry-header -->

                                    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
                                    <div class="entry-summary">
                                            <?php the_excerpt(); ?>
                                    </div><!-- .entry-summary -->
                                    <?php else : ?>
                                    <div class="entry-content">
                                            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'simplestest' ) ); ?>
                                            <?php
                                                    wp_link_pages( array(
                                                            'before' => '<div class="page-links">' . __( 'Pages:', 'simplestest' ),
                                                            'after'  => '</div>',
                                                    ) );
                                            ?>
                                    </div><!-- .entry-content -->
                                    <?php endif; ?>

                                    <footer class="entry-footer">
                                            <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
                                                    <?php
                                                            /* translators: used between list items, there is a space after the comma */
                                                            $categories_list = get_the_category_list( __( ', ', 'simplestest' ) );
                                                            if ( $categories_list && simplestest_categorized_blog() ) :
                                                    ?>
                                                    <span class="cat-links">
                                                            <?php printf( __( 'Posted in %1$s', 'simplestest' ), $categories_list ); ?>
                                                    </span>
                                                    <?php endif; // End if categories ?>

                                                    <?php
                                                            /* translators: used between list items, there is a space after the comma */
                                                            $tags_list = get_the_tag_list( '', __( ', ', 'simplestest' ) );
                                                            if ( $tags_list ) :
                                                    ?>
                                                    <span class="tags-links">
                                                            <?php printf( __( 'Tagged %1$s', 'simplestest' ), $tags_list ); ?>
                                                    </span>
                                                    <?php endif; // End if $tags_list ?>
                                            <?php endif; // End if 'post' == get_post_type() ?>

                                            <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                                            <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'simplestest' ), __( '1 Comment', 'simplestest' ), __( '% Comments', 'simplestest' ) ); ?></span>
                                            <?php endif; ?>

                                            <?php edit_post_link( __( 'Edit', 'simplestest' ), '<span class="edit-link">', '</span>' ); ?>
                                    </footer><!-- .entry-footer -->
                            </article><!-- #post-## -->

                            <?php 
                            if (is_singular()){
                            simplestest_post_nav(); 
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
                            }
                            ?>
                            
			<?php endwhile; ?>

			<?php simplestest_paging_nav(); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<div id="secondary" class="widget-area" role="complementary">
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h1 class="widget-title"><?php _e( 'Archives', 'simplestest' ); ?></h1>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h1 class="widget-title"><?php _e( 'Meta', 'simplestest' ); ?></h1>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'simplestest' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'simplestest' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'simplestest' ), 'simplestest', '<a href="http://mor10.com" rel="designer">Morten Rand-Hendriksen</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
