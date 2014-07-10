<?php
/**
 * Custom content to display photo
 * @package dhogan
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="index-box">
			<?php if ('photo' === get_post_type()){ ?>
				<?php if(has_post_thumbnail()){ ?>
					<div class="photo-item">
						<?php
							echo '<a href="' . get_permalink() . '" title="' . __( 'A photo of ') . get_the_title() . '" rel="bookmark">';
							echo '<figure class="index-photo">';
							the_post_thumbnail('index-thumb');
							echo '</figure>';
							echo '</a>';
						 ?>
					</div>
				<?php } ?>
			<?php } ?>
	</div>
</article>