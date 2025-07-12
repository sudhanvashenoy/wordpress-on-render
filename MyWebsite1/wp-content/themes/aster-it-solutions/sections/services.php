<?php

if ( ! get_theme_mod( 'aster_it_solutions_enable_service_section', true ) ) {
	return;
}

$aster_it_solutions_content_ids  = array();
$aster_it_solutions_content_type = get_theme_mod( 'aster_it_solutions_service_content_type', 'post' );

for ( $aster_it_solutions_i = 1; $aster_it_solutions_i <= 6; $aster_it_solutions_i++ ) {
	$aster_it_solutions_content_ids[] = get_theme_mod( 'aster_it_solutions_service_content_' . $aster_it_solutions_content_type . '_' . $aster_it_solutions_i );
}

// Get the category for the services slider from theme mods or a default category
$aster_it_solutions_services_category = get_theme_mod('aster_it_solutions_services_category', 'services');

// Modify query to fetch posts from a specific category
$aster_it_solutions_service_args = array(
    'post_type'           => $aster_it_solutions_content_type,
    'post__in'            => array_filter( $aster_it_solutions_content_ids ),
    'orderby'             => 'post__in',
    'posts_per_page'      => absint(3),
    'ignore_sticky_posts' => true,
);

// Apply category filter only if content type is 'post'
if ( 'post' === $aster_it_solutions_content_type && ! empty( $aster_it_solutions_services_category ) ) {
    $aster_it_solutions_service_args['category_name'] = $aster_it_solutions_services_category;
}

$aster_it_solutions_service_args = apply_filters( 'aster_it_solutions_service_section_args', $aster_it_solutions_service_args );

aster_it_solutions_render_service_section( $aster_it_solutions_service_args );

/**
 * Render Service Section.
 */
function aster_it_solutions_render_service_section( $aster_it_solutions_service_args ) { ?>

	<section id="aster_it_solutions_service_section" class="asterthemes-frontpage-section service-section service-style-1">
		<?php
		if ( is_customize_preview() ) :
			aster_it_solutions_section_link( 'aster_it_solutions_service_section' );
		endif;

		$aster_it_solutions_trending_product_content = get_theme_mod( 'aster_it_solutions_trending_product_content');
		$aster_it_solutions_trending_product_heading = get_theme_mod( 'aster_it_solutions_trending_product_heading');
		?>
		<div class="asterthemes-wrapper">
			<div class="service-contact-inner">
				<?php if ( ! empty( $aster_it_solutions_trending_product_content ) ) { ?>
				<p><?php echo esc_html( $aster_it_solutions_trending_product_content ); ?></p>
				<?php } ?>
				<?php if ( ! empty( $aster_it_solutions_trending_product_heading ) ) { ?>
				<h2><?php echo esc_html( $aster_it_solutions_trending_product_heading ); ?></h2>
				<?php } ?>
			</div>
			<div class="video-main-box">
				<?php 
				$aster_it_solutions_query = new WP_Query( $aster_it_solutions_service_args );
				if ( $aster_it_solutions_query->have_posts() ) :
					?>
					<div class="section-body">
						<div class="service-section-wrapper">
							<?php
							$aster_it_solutions_i = 1;
							while ( $aster_it_solutions_query->have_posts() ) :
								$aster_it_solutions_query->the_post();
								?>
								<div class="service-single">
									<div class="service-image">
										<?php the_post_thumbnail( 'full' ); ?>
									</div>
									<div class="service-title">
										<h3>
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h3>
										<p>
											<?php echo wp_kses_post( wp_trim_words( get_the_content(), 20 ) ); ?>
										</p>
									</div>
								</div>
								<?php
								$aster_it_solutions_i++;
							endwhile;
							wp_reset_postdata();
							?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php
}