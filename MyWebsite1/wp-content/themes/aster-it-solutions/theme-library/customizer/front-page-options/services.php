<?php

/**
 * Services Section
 *
 * @package aster_it_solutions
 */

$wp_customize->add_section(
	'aster_it_solutions_service_section',
	array(
		'panel'    => 'aster_it_solutions_front_page_options',
		'title'    => esc_html__( 'Services Section', 'aster-it-solutions' ),
		'priority' => 10,
	)
);

//Service Section - Enable Section.
$wp_customize->add_setting(
	'aster_it_solutions_enable_service_section',
	array(
		'default'           => true,
		'sanitize_callback' => 'aster_it_solutions_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Aster_IT_Solutions_Toggle_Switch_Custom_Control(
		$wp_customize,
		'aster_it_solutions_enable_service_section',
		array(
			'label'    => esc_html__( 'Enable Service Section', 'aster-it-solutions' ),
			'section'  => 'aster_it_solutions_service_section',
			'settings' => 'aster_it_solutions_enable_service_section'
		)
	)
);


// Service Section - Content Label.
$wp_customize->add_setting(
	'aster_it_solutions_trending_product_content',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'aster_it_solutions_trending_product_content',
	array(
		'label'           => esc_html__( 'Sub Heading', 'aster-it-solutions' ),
		'section'         => 'aster_it_solutions_service_section',
		'settings'        => 'aster_it_solutions_trending_product_content',
		'type'            => 'text',
		'active_callback' => 'aster_it_solutions_is_service_section_enabled',
	)
);

// Service Section - Heading Label.
$wp_customize->add_setting(
	'aster_it_solutions_trending_product_heading',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'aster_it_solutions_trending_product_heading',
	array(
		'label'           => esc_html__( 'Heading', 'aster-it-solutions' ),
		'section'         => 'aster_it_solutions_service_section',
		'settings'        => 'aster_it_solutions_trending_product_heading',
		'type'            => 'text',
		'active_callback' => 'aster_it_solutions_is_service_section_enabled',
	)
);


// Services Section - Content Type.
$wp_customize->add_setting(
	'aster_it_solutions_service_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'aster_it_solutions_sanitize_select',
	)
);

$wp_customize->add_control(
	'aster_it_solutions_service_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'aster-it-solutions' ),
		'section'         => 'aster_it_solutions_service_section',
		'settings'        => 'aster_it_solutions_service_content_type',
		'type'            => 'select',
		'active_callback' => 'aster_it_solutions_is_service_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'aster-it-solutions' ),
			'post' => esc_html__( 'Post', 'aster-it-solutions' ),
		),
	)
);

// Services Category Setting.
$wp_customize->add_setting('aster_it_solutions_services_category', array(
	'default'           => 'services',
	'sanitize_callback' => 'sanitize_text_field',
));

// Add custom control for Services Category with conditional visibility.
$wp_customize->add_control(new Aster_IT_Solutions_Customize_Category_Dropdown_Control($wp_customize, 'aster_it_solutions_services_category', array(
	'label'    => __('Select Services Category', 'aster-it-solutions'),
	'section'  => 'aster_it_solutions_service_section',
	'settings' => 'aster_it_solutions_services_category',
	'active_callback' => function() use ($wp_customize) {
		return $wp_customize->get_setting('aster_it_solutions_service_content_type')->value() === 'post';
	},
)));

for ( $aster_it_solutions_i = 1; $aster_it_solutions_i <= 6; $aster_it_solutions_i++ ) {

	// Service Section - Select Post.
	$wp_customize->add_setting(
		'aster_it_solutions_service_content_post_' . $aster_it_solutions_i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'aster_it_solutions_service_content_post_' . $aster_it_solutions_i,
		array(
			'label'           => esc_html__( 'Select Post ', 'aster-it-solutions' ) . $aster_it_solutions_i,
			'description'     => sprintf( esc_html__( 'Kindly :- Select a Post based on the category selected in the upper settings', 'aster-it-solutions' ), $aster_it_solutions_i ),
			'section'         => 'aster_it_solutions_service_section',
			'settings'        => 'aster_it_solutions_service_content_post_' . $aster_it_solutions_i,
			'active_callback' => 'aster_it_solutions_is_service_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => aster_it_solutions_get_post_choices(),
		)
	);

	// Service Section - Select Page.
	$wp_customize->add_setting(
		'aster_it_solutions_service_content_page_' . $aster_it_solutions_i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'aster_it_solutions_service_content_page_' . $aster_it_solutions_i,
		array(
			'label'           => esc_html__( 'Select Page ', 'aster-it-solutions' ) . $aster_it_solutions_i,
			'section'         => 'aster_it_solutions_service_section',
			'settings'        => 'aster_it_solutions_service_content_page_' . $aster_it_solutions_i,
			'active_callback' => 'aster_it_solutions_is_service_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => aster_it_solutions_get_page_choices(),
		)
	);
}