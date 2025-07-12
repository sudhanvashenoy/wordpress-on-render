<?php

/**
 * Excerpt
 *
 * @package aster_it_solutions
 */

$wp_customize->add_section(
	'aster_it_solutions_excerpt_options',
	array(
		'panel' => 'aster_it_solutions_theme_options',
		'title' => esc_html__( 'Excerpt', 'aster-it-solutions' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'aster_it_solutions_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'aster_it_solutions_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'aster-it-solutions' ),
		'section'     => 'aster_it_solutions_excerpt_options',
		'settings'    => 'aster_it_solutions_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 200,
			'step' => 1,
		),
	)
);