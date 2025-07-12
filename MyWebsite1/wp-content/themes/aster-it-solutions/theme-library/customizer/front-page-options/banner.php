<?php

/**
 * Banner Section
 *
 * @package aster_it_solutions
 */

$wp_customize->add_section(
	'aster_it_solutions_banner_section',
	array(
		'panel'    => 'aster_it_solutions_front_page_options',
		'title'    => esc_html__( 'Banner Section', 'aster-it-solutions' ),
		'priority' => 10,
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'aster_it_solutions_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'aster_it_solutions_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Aster_IT_Solutions_Toggle_Switch_Custom_Control(
		$wp_customize,
		'aster_it_solutions_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'aster-it-solutions' ),
			'section'  => 'aster_it_solutions_banner_section',
			'settings' => 'aster_it_solutions_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'aster_it_solutions_enable_banner_section',
		array(
			'selector' => '#aster_it_solutions_banner_section .section-link',
			'settings' => 'aster_it_solutions_enable_banner_section',
		)
	);
}

// Banner Section - Banner Slider Content Type.
$wp_customize->add_setting(
	'aster_it_solutions_banner_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'aster_it_solutions_sanitize_select',
	)
);

$wp_customize->add_control(
	'aster_it_solutions_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Select Banner Slider Content Type', 'aster-it-solutions' ),
		'section'         => 'aster_it_solutions_banner_section',
		'settings'        => 'aster_it_solutions_banner_slider_content_type',
		'type'            => 'select',
		'active_callback' => 'aster_it_solutions_is_banner_slider_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'aster-it-solutions' ),
			'post' => esc_html__( 'Post', 'aster-it-solutions' ),
		),
	)
);

// Banner Slider Category Setting.
$wp_customize->add_setting('aster_it_solutions_banner_slider_category', array(
	'default'           => 'slider',
	'sanitize_callback' => 'sanitize_text_field',
));

// Add custom control for Banner Slider Category with conditional visibility.
$wp_customize->add_control(new Aster_IT_Solutions_Customize_Category_Dropdown_Control($wp_customize, 'aster_it_solutions_banner_slider_category', array(
	'label'    => __('Select Banner Slider Category', 'aster-it-solutions'),
	'section'  => 'aster_it_solutions_banner_section',
	'settings' => 'aster_it_solutions_banner_slider_category',
	'active_callback' => function() use ($wp_customize) {
		return $wp_customize->get_setting('aster_it_solutions_banner_slider_content_type')->value() === 'post';
	},
)));

for ( $aster_it_solutions_i = 1; $aster_it_solutions_i <= 3; $aster_it_solutions_i++ ) {

	// Banner Section - Select Banner Post.
	$wp_customize->add_setting(
		'aster_it_solutions_banner_slider_content_post_' . $aster_it_solutions_i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'aster_it_solutions_banner_slider_content_post_' . $aster_it_solutions_i,
		array(
			/* translators: %d: Select Post Count. */
			'label'           => sprintf( esc_html__( 'Select Post %d', 'aster-it-solutions' ), $aster_it_solutions_i ),
			'description'     => sprintf( esc_html__( 'Kindly :- Select a Post based on the category selected in the upper settings', 'aster-it-solutions' ), $aster_it_solutions_i ),
			'section'         => 'aster_it_solutions_banner_section',
			'settings'        => 'aster_it_solutions_banner_slider_content_post_' . $aster_it_solutions_i,
			'active_callback' => 'aster_it_solutions_is_banner_slider_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => aster_it_solutions_get_post_choices(),
		)
	);

	// Banner Section - Select Banner Page.
	$wp_customize->add_setting(
		'aster_it_solutions_banner_slider_content_page_' . $aster_it_solutions_i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'aster_it_solutions_banner_slider_content_page_' . $aster_it_solutions_i,
		array(
			/* translators: %d: Select Page Count. */
			'label'           => sprintf( esc_html__( 'Select Page %d', 'aster-it-solutions' ), $aster_it_solutions_i ),
			'section'         => 'aster_it_solutions_banner_section',
			'settings'        => 'aster_it_solutions_banner_slider_content_page_' . $aster_it_solutions_i,
			'active_callback' => 'aster_it_solutions_is_banner_slider_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => aster_it_solutions_get_page_choices(),
		)
	);

	// Banner Section - Button Label.
	$wp_customize->add_setting(
		'aster_it_solutions_banner_button_label_' . $aster_it_solutions_i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'aster_it_solutions_banner_button_label_' . $aster_it_solutions_i,
		array(
			/* translators: %d: Button Label Count. */
			'label'           => sprintf( esc_html__( 'Button Label %d', 'aster-it-solutions' ), $aster_it_solutions_i ),
			'section'         => 'aster_it_solutions_banner_section',
			'settings'        => 'aster_it_solutions_banner_button_label_' . $aster_it_solutions_i,
			'type'            => 'text',
			'active_callback' => 'aster_it_solutions_is_banner_slider_section_enabled',
		)
	);

	// Banner Section - Button Link.
	$wp_customize->add_setting(
		'aster_it_solutions_banner_button_link_' . $aster_it_solutions_i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'aster_it_solutions_banner_button_link_' . $aster_it_solutions_i,
		array(
			/* translators: %d: Button Link Count. */
			'label'           => sprintf( esc_html__( 'Button Link %d', 'aster-it-solutions' ), $aster_it_solutions_i ),
			'section'         => 'aster_it_solutions_banner_section',
			'settings'        => 'aster_it_solutions_banner_button_link_' . $aster_it_solutions_i,
			'type'            => 'url',
			'active_callback' => 'aster_it_solutions_is_banner_slider_section_enabled',
		)
	);
}