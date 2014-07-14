<?php
/**
 * This template generates links to social media icons once set in the theme options.  
 *
 * @package Beny
 */
?>

	<span class="social-media">
		<?php if ( get_theme_mod( 'twitter' ) ) : ?>
			<a class="social-twitter" href="/<?php echo get_theme_mod( 'twitter' ); ?>" target="_blank">
				<i class="fa fa-twitter fa-2"></i>
			</a>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'facebook' ) ) : ?>
			<a class="social-facebook" href="<?php echo get_theme_mod( 'facebook' ); ?>" target="_blank">
				<i class="fa fa-facebook fa-2"></i>
			</a>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'pinterest' ) ) : ?>
			<a class="social-pinterest" href="<?php echo get_theme_mod( 'pinterest' ); ?>" target="_blank">
				<i class="fa fa-pinterest fa-2"></i>
			</a>
		<?php endif; ?>

		<?php if ( get_theme_mod( 'instagram' ) ) : ?>
			<a class="social-instagram" href="<?php echo get_theme_mod( 'instagram' ); ?>" target="_blank">
				<i class="fa fa-instagram fa-2"></i>
			</a>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'linkedin' ) ) : ?>
			<a class="social-linkedin" href="<?php echo get_theme_mod( 'linkedin' ); ?>" target="_blank">
				<i class="fa fa-linkedin fa-2"></i>
			</a>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'googleplus' ) ) : ?>
			<a class="social-googleplus" href="<?php echo get_theme_mod( 'googleplus' ); ?>" target="_blank">
				<i class="fa fa-googleplus fa-2"></i>
			</a>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'flickr' ) ) : ?>
			<a class="social-flickr" href="<?php echo get_theme_mod( 'flickr' ); ?>" target="_blank">
				<i class="fa fa-flickr fa-2"></i>
			</a>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'youtube' ) ) : ?>
			<a class="social-youtube" href="<?php echo get_theme_mod( 'youtube' ); ?>" target="_blank">
				<i class="fa fa-youtube fa-2"></i>
			</a>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'vimeo' ) ) : ?>
			<a class="social-vimeo" href="<?php echo get_theme_mod( 'vimeo' ); ?>" target="_blank">
				<i class="fa fa-vimeo-square fa-2"></i>
			</a>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'dribble' ) ) : ?>
			<a class="social-dribbbble" href="<?php echo get_theme_mod( 'dribbble' ); ?>" target="_blank">
				<i class="fa fa-dribbble fa-2"></i>
			</a>
		<?php endif; ?>	
		
		<?php if ( get_theme_mod( 'tumblr' ) ) : ?>
			<a class="social-tumblr" href="<?php echo get_theme_mod( 'tumblr' ); ?>" target="_blank">
				<i class="fa fa-tumblr fa-2"></i>
			</a>
		<?php endif; ?>

		<?php if ( get_theme_mod( 'behance' ) ) : ?>
			<a class="social-behance" href="<?php echo get_theme_mod( 'behance' ); ?>" target="_blank">
				<i class="fa fa-behance fa-2"></i>
			</a>
		<?php endif; ?>		
	</span><!-- #social-icons-->