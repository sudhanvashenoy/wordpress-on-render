<?php

/**
 * Template part for displaying Video Format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aster_it_solutions
 */

?>
<?php $aster_it_solutions_readmore = get_theme_mod( 'aster_it_solutions_readmore_button_text','Read More');?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mag-post-single">
        <?php
			// Get the post ID
			$aster_it_solutions_post_id = get_the_ID();

			// Check if there are videos embedded in the post content
			$aster_it_solutions_post = get_post($aster_it_solutions_post_id);
			$aster_it_solutions_content = do_shortcode(apply_filters('the_content', $aster_it_solutions_post->post_content));
			$aster_it_solutions_embeds = get_media_embedded_in_content($aster_it_solutions_content);

			if (!empty($aster_it_solutions_embeds)) {
			    // Loop through embedded media and display videos
			    foreach ($aster_it_solutions_embeds as $aster_it_solutions_embed) {
			        // Check if the embed code contains a video tag or specific video providers like YouTube or Vimeo
			        if (strpos($aster_it_solutions_embed, 'video') !== false || strpos($aster_it_solutions_embed, 'youtube') !== false || strpos($aster_it_solutions_embed, 'vimeo') !== false || strpos($aster_it_solutions_embed, 'dailymotion') !== false || strpos($aster_it_solutions_embed, 'vine') !== false || strpos($aster_it_solutions_embed, 'wordPress.tv') !== false || strpos($aster_it_solutions_embed, 'hulu') !== false) {
			            ?>
			            <div class="custom-embedded-video">
			                <div class="video-container">
			                    <?php echo $aster_it_solutions_embed; ?>
			                </div>
			                <div class="video-comments">
			                    <?php
			                    // Add your comments section here
			                    comments_template(); // This will include the default WordPress comments template
			                    ?>
			                </div>
			            </div>
			            <?php
			        }
			    }
			}
	    ?>
		<div class="mag-post-detail">
			<div class="mag-post-category">
				<?php aster_it_solutions_categories_list(); ?>
			</div>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title mag-post-title">', '</h1>' );
			else :
				if ( !get_theme_mod( 'aster_it_solutions_post_hide_post_heading', false ) ) { 
					the_title( '<h2 class="entry-title mag-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			    }
			endif;
			?>
			<div class="mag-post-meta">
				<?php
				aster_it_solutions_posted_by();
				aster_it_solutions_posted_on();
				?>
			</div>
			<?php if ( !get_theme_mod( 'aster_it_solutions_post_hide_post_content', false ) ) { ?>
				<div class="mag-post-excerpt">
					<?php the_excerpt(); ?>
				</div>
		    <?php } ?>
			<?php if ( get_theme_mod( 'aster_it_solutions_post_readmore_button', true ) === true ) : ?>
				<div class="mag-post-read-more">
					<a href="<?php the_permalink(); ?>" class="read-more-button">
						<?php if ( ! empty( $aster_it_solutions_readmore ) ) { ?> <?php echo esc_html( $aster_it_solutions_readmore ); ?> <?php } ?>
						<i class="<?php echo esc_attr( get_theme_mod( 'aster_it_solutions_readmore_btn_icon', 'fas fa-chevron-right' ) ); ?>"></i>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
