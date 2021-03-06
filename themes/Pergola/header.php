<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package pergola
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script type="text/javascript" src="//use.typekit.net/lrw1rqq.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'pergola' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<a href='#' class="hide-text menu-toggle hamburger" title="open menu"><?php _e( 'Primary Menu', 'pergola' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
		<div class="search-toggle">
			<i class="fa fa-search fa-2"></i>
			<a href="#search-container" class="screen-reader-text">Search</a>
		</div>

	</header><!-- #masthead -->
		<div class="social">
			<?php get_template_part( 'inc/social-media' ); ?>
		</div>

	<div id="content" class="site-content">

		<div id="search-container" class="search-box-wrapper hide">
			<div class="search-box">
				<form role="search" method="get" id="searchform" class="search-form" action="<?php esc_url( home_url( '/' )); ?>">
					<label>
						<span class="screen-reader-text">Search for:</span>
						<input type="search" class="search-field" placeholder="Search …" value="<?php get_search_query(); ?>" id="s" name="s" title="Search for:">
					</label>
					<input type="submit" id="searchsubmit" class="search-submit" value="<?php esc_attr_x( 'Search', 'submit button' ); ?>" />
				</form>
			</div>
		</div>