<?php
if ( ! get_theme_mod( 'aster_it_solutions_enable_banner_section', false ) ) {
	return;
}

$aster_it_solutions_slider_content_ids  = array();
$aster_it_solutions_slider_content_type = get_theme_mod( 'aster_it_solutions_banner_slider_content_type', 'post' );

for ( $aster_it_solutions_i = 1; $aster_it_solutions_i <= 3; $aster_it_solutions_i++ ) {
	$aster_it_solutions_slider_content_ids[] = get_theme_mod( 'aster_it_solutions_banner_slider_content_' . $aster_it_solutions_slider_content_type . '_' . $aster_it_solutions_i );
}
// Get the category for the banner slider from theme mods or a default category
$aster_it_solutions_banner_slider_category = get_theme_mod('aster_it_solutions_banner_slider_category', 'slider');

// Modify query to fetch posts from a specific category
$aster_it_solutions_banner_slider_args = array(
    'post_type'           => $aster_it_solutions_slider_content_type,
    'post__in'            => array_filter( $aster_it_solutions_slider_content_ids ),
    'orderby'             => 'post__in',
    'posts_per_page'      => absint(3),
    'ignore_sticky_posts' => true,
);

// Apply category filter only if content type is 'post'
if ( 'post' === $aster_it_solutions_slider_content_type && ! empty( $aster_it_solutions_banner_slider_category ) ) {
    $aster_it_solutions_banner_slider_args['category_name'] = $aster_it_solutions_banner_slider_category;
}
$aster_it_solutions_banner_slider_args = apply_filters( 'aster_it_solutions_banner_section_args', $aster_it_solutions_banner_slider_args );

aster_it_solutions_render_banner_section( $aster_it_solutions_banner_slider_args );

/**
 * Render Banner Section.
 */
function aster_it_solutions_render_banner_section( $aster_it_solutions_banner_slider_args ) {     ?>

	<section id="aster_it_solutions_banner_section" class="banner-section banner-style-1">
		<?php
		if ( is_customize_preview() ) :
			aster_it_solutions_section_link( 'aster_it_solutions_banner_section' );
		endif;
		?>
		<div class="banner-section-wrapper">
			<?php
			$aster_it_solutions_query = new WP_Query( $aster_it_solutions_banner_slider_args );
			if ( $aster_it_solutions_query->have_posts() ) :
				?>
				<div class="asterthemes-banner-wrapper banner-slider aster-it-solutions-carousel-navigation" data-slick='{"autoplay": false }'>
					<?php
					$aster_it_solutions_i = 1;
					while ( $aster_it_solutions_query->have_posts() ) :
						$aster_it_solutions_query->the_post();
						$aster_it_solutions_button_label = get_theme_mod( 'aster_it_solutions_banner_button_label_' . $aster_it_solutions_i);
						$aster_it_solutions_button_link  = get_theme_mod( 'aster_it_solutions_banner_button_link_' . $aster_it_solutions_i);
						$aster_it_solutions_button_link  = ! empty( $aster_it_solutions_button_link ) ? $aster_it_solutions_button_link : get_the_permalink();
						?>
						<div class="banner-single-outer">
							<div class="banner-single">
								<div class="banner-img">
									<?php the_post_thumbnail( 'full' ); ?>
								</div>
								<div class="banner-caption">
									<div class="asterthemes-wrapper">
										<div class="banner-catption-wrapper">
											<h1 class="banner-caption-title">
												<?php the_title(); ?>
											</h1>
											<?php if ( ! empty( $aster_it_solutions_button_label ) ) { ?>
												<div class="banner-slider-btn">
													<a href="<?php echo esc_url( $aster_it_solutions_button_link ); ?>" class="asterthemes-button"><?php echo esc_html( $aster_it_solutions_button_label ); ?></a>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						$aster_it_solutions_i++;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<?php
			endif;
			?>
		</div>
	</section>

	<?php
}