<?php
/**
 * This template generates links to social media icons once set in the theme options.  
 *
 * @package Beny
 */
?>

	<ul class="social-media">
		<?php if ( get_theme_mod( 'twitter' ) ) : ?>
			<li>
				<a class="social-twitter" href="/<?php echo get_theme_mod( 'twitter' ); ?>" target="_blank"></a>
			</li>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'facebook' ) ) : ?>
			<li>
				<a class="social-facebook" href="<?php echo get_theme_mod( 'facebook' ); ?>" target="_blank"></a>
			</li>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'pinterest' ) ) : ?>
			<li>
				<a class="social-pinterest" href="<?php echo get_theme_mod( 'pinterest' ); ?>" target="_blank"></a>
			</li>
		<?php endif; ?>

		<?php if ( get_theme_mod( 'instagram' ) ) : ?>
			<li>
				<a class="social-instagram" href="<?php echo get_theme_mod( 'instagram' ); ?>" target="_blank"></a>
			</li>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'linkedin' ) ) : ?>
			<li>
				<a class="social-linkedin" href="<?php echo get_theme_mod( 'linkedin' ); ?>" target="_blank"></a>
			</li>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'googleplus' ) ) : ?>
			<li>
				<a class="social-googleplus" href="<?php echo get_theme_mod( 'googleplus' ); ?>" target="_blank"></a>
			</li>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'flickr' ) ) : ?>
			<li>
				<a class="social-flickr" href="<?php echo get_theme_mod( 'flickr' ); ?>" target="_blank"></a>
			</li>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'youtube' ) ) : ?>
			<li>
				<a class="social-youtube" href="<?php echo get_theme_mod( 'youtube' ); ?>" target="_blank"></a>
			</li>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'vimeo' ) ) : ?>
			<li>
				<a class="social-vimeo" href="<?php echo get_theme_mod( 'vimeo' ); ?>" target="_blank"></a>
			</li>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'dribble' ) ) : ?>
			<li>
				<a class="social-dribbble" href="<?php echo get_theme_mod( 'dribble' ); ?>" target="_blank"></a>
			</li>
		<?php endif; ?>	
		
		<?php if ( get_theme_mod( 'tumblr' ) ) : ?>
			<li>
				<a class="social-tumblr" href="<?php echo get_theme_mod( 'tumblr' ); ?>" target="_blank"></a>
			</li>
		<?php endif; ?>

		<?php if ( get_theme_mod( 'github' ) ) : ?>
			<li>
				<a class="social-github" href="<?php echo get_theme_mod( 'github' ); ?>" target="_blank"></a>
			</li>
		<?php endif; ?>		

	</ul><!-- #social-icons-->