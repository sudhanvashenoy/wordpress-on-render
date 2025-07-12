<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aster_it_solutions
 */

?>
<?php $aster_it_solutions_readmore = get_theme_mod( 'aster_it_solutions_readmore_button_text','Read More');?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mag-post-single">
		<div class="mag-post-img">
			<?php aster_it_solutions_post_thumbnail(); ?>
		</div>
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