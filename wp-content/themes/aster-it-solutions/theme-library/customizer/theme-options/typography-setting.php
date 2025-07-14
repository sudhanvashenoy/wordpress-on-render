<?php

/**
 * Typography Settings
 *
 * @package aster_it_solutions
 */

// Typography Settings
$wp_customize->add_section(
    'aster_it_solutions_typography_setting',
    array(
        'panel' => 'aster_it_solutions_theme_options',
        'title' => esc_html__( 'Typography Settings', 'aster-it-solutions' ),
    )
);

$wp_customize->add_setting(
    'aster_it_solutions_site_title_font',
    array(
        'default'           => 'Raleway',
        'sanitize_callback' => 'aster_it_solutions_sanitize_google_fonts',
    )
);

$wp_customize->add_control(
    'aster_it_solutions_site_title_font',
    array(
        'label'    => esc_html__( 'Site Title Font Family', 'aster-it-solutions' ),
        'section'  => 'aster_it_solutions_typography_setting',
        'settings' => 'aster_it_solutions_site_title_font',
        'type'     => 'select',
        'choices'  => aster_it_solutions_get_all_google_font_families(),
    )
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'aster_it_solutions_site_description_font',
	array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'aster_it_solutions_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'aster_it_solutions_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'aster-it-solutions' ),
		'section'  => 'aster_it_solutions_typography_setting',
		'settings' => 'aster_it_solutions_site_description_font',
		'type'     => 'select',
		'choices'  => aster_it_solutions_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'aster_it_solutions_header_font',
	array(
		'default'           => 'Mulish',
		'sanitize_callback' => 'aster_it_solutions_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'aster_it_solutions_header_font',
	array(
		'label'    => esc_html__( 'Heading Font Family', 'aster-it-solutions' ),
		'section'  => 'aster_it_solutions_typography_setting',
		'settings' => 'aster_it_solutions_header_font',
		'type'     => 'select',
		'choices'  => aster_it_solutions_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'aster_it_solutions_content_font',
	array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'aster_it_solutions_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'aster_it_solutions_content_font',
	array(
		'label'    => esc_html__( 'Content Font Family', 'aster-it-solutions' ),
		'section'  => 'aster_it_solutions_typography_setting',
		'settings' => 'aster_it_solutions_content_font',
		'type'     => 'select',
		'choices'  => aster_it_solutions_get_all_google_font_families(),
	)
);