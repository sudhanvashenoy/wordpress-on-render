<?php

/**
 * Front Page Options
 *
 * @package Aster IT Solutions
 */

$wp_customize->add_panel(
	'aster_it_solutions_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'aster-it-solutions' ),
		'priority' => 20,
	)
);

// Banner Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/banner.php';

// Tranding Product Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/services.php';