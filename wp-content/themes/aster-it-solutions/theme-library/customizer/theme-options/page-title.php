<?php

/**
 * Pige Title Options
 *
 * @package aster_it_solutions
 */

$wp_customize->add_section(
	'aster_it_solutions_page_title_options',
	array(
		'panel' => 'aster_it_solutions_theme_options',
		'title' => esc_html__( 'Page Title', 'aster-it-solutions' ),
	)
);

$wp_customize->add_setting(
    'aster_it_solutions_page_header_visibility',
    array(
        'default'           => 'all-devices',
        'sanitize_callback' => 'aster_it_solutions_sanitize_select',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'aster_it_solutions_page_header_visibility',
        array(
            'label'    => esc_html__( 'Page Header Visibility', 'aster-it-solutions' ),
            'type'     => 'select',
            'section'  => 'aster_it_solutions_page_title_options',
            'settings' => 'aster_it_solutions_page_header_visibility',
            'priority' => 10,
            'choices'  => array(
                'all-devices'        => esc_html__( 'Show on all devices', 'aster-it-solutions' ),
                'hide-tablet'        => esc_html__( 'Hide on Tablet', 'aster-it-solutions' ),
                'hide-mobile'        => esc_html__( 'Hide on Mobile', 'aster-it-solutions' ),
                'hide-tablet-mobile' => esc_html__( 'Hide on Tablet & Mobile', 'aster-it-solutions' ),
                'hide-all-devices'   => esc_html__( 'Hide on all devices', 'aster-it-solutions' ),
            ),
        )
    )
);


$wp_customize->add_setting( 'aster_it_solutions_page_title_background_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Aster_IT_Solutions_Separator_Custom_Control( $wp_customize, 'aster_it_solutions_page_title_background_separator', array(
	'label' => __( 'Page Title BG Image & Color Setting', 'aster-it-solutions' ),
	'section' => 'aster_it_solutions_page_title_options',
	'settings' => 'aster_it_solutions_page_title_background_separator',
)));


$wp_customize->add_setting(
	'aster_it_solutions_page_header_style',
	array(
		'sanitize_callback' => 'aster_it_solutions_sanitize_switch',
		'default'           => False,
	)
);

$wp_customize->add_control(
	new Aster_IT_Solutions_Toggle_Switch_Custom_Control(
		$wp_customize,
		'aster_it_solutions_page_header_style',
		array(
			'label'   => esc_html__('Page Title Background Image', 'aster-it-solutions'),
			'section' => 'aster_it_solutions_page_title_options',
		)
	)
);

$wp_customize->add_setting( 'aster_it_solutions_page_header_background_image', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aster_it_solutions_page_header_background_image', array(
    'label'    => __( 'Background Image', 'aster-it-solutions' ),
	'description' => __('Choose either a background image or a color. If a background image is selected, the background color will not be visible.', 'aster-it-solutions'),
    'section'  => 'aster_it_solutions_page_title_options',
    'settings' => 'aster_it_solutions_page_header_background_image',
	'active_callback' => 'aster_it_solutions_is_pagetitle_bcakground_image_enabled',
)));


$wp_customize->add_setting('aster_it_solutions_page_header_image_height', array(
	'default'           => 200,
	'sanitize_callback' => 'aster_it_solutions_sanitize_range_value',
));

$wp_customize->add_control(new Aster_IT_Solutions_Customize_Range_Control($wp_customize, 'aster_it_solutions_page_header_image_height', array(
		'label'       => __('Image Height', 'aster-it-solutions'),
		'section'     => 'aster_it_solutions_page_title_options',
		'settings'    => 'aster_it_solutions_page_header_image_height',
		'active_callback' => 'aster_it_solutions_is_pagetitle_bcakground_image_enabled',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 1000,
			'step' => 5,
		),
)));


$wp_customize->add_setting('aster_it_solutions_page_title_background_color_setting', array(
    'default' => '#f5f5f5',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'aster_it_solutions_page_title_background_color_setting', array(
    'label' => __('Page Title Background Color', 'aster-it-solutions'),
    'section' => 'aster_it_solutions_page_title_options',
)));

$wp_customize->add_setting('aster_it_solutions_pagetitle_height', array(
    'default'           => 50,
    'sanitize_callback' => 'aster_it_solutions_sanitize_range_value',
));

$wp_customize->add_control(new Aster_IT_Solutions_Customize_Range_Control($wp_customize, 'aster_it_solutions_pagetitle_height', array(
    'label'       => __('Set Height', 'aster-it-solutions'),
    'description' => __('This setting controls the page title height when no background image is set. If a background image is set, this setting will not apply.', 'aster-it-solutions'),
    'section'     => 'aster_it_solutions_page_title_options',
    'settings'    => 'aster_it_solutions_pagetitle_height',
    'input_attrs' => array(
        'min'  => 0,
        'max'  => 300,
        'step' => 5,
    ),
)));

$wp_customize->add_setting( 'aster_it_solutions_page_title_style_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Aster_IT_Solutions_Separator_Custom_Control( $wp_customize, 'aster_it_solutions_page_title_style_separator', array(
	'label' => __( 'Page Title Styling Setting', 'aster-it-solutions' ),
	'section' => 'aster_it_solutions_page_title_options',
	'settings' => 'aster_it_solutions_page_title_style_separator',
)));


$wp_customize->add_setting( 'aster_it_solutions_page_header_heading_tag', array(
	'default'   => 'h1',
	'sanitize_callback' => 'aster_it_solutions_sanitize_select',
) );

$wp_customize->add_control( 'aster_it_solutions_page_header_heading_tag', array(
	'label'   => __( 'Page Title Heading Tag', 'aster-it-solutions' ),
	'section' => 'aster_it_solutions_page_title_options',
	'type'    => 'select',
	'choices' => array(
		'h1' => __( 'H1', 'aster-it-solutions' ),
		'h2' => __( 'H2', 'aster-it-solutions' ),
		'h3' => __( 'H3', 'aster-it-solutions' ),
		'h4' => __( 'H4', 'aster-it-solutions' ),
		'h5' => __( 'H5', 'aster-it-solutions' ),
		'h6' => __( 'H6', 'aster-it-solutions' ),
		'p' => __( 'p', 'aster-it-solutions' ),
		'a' => __( 'a', 'aster-it-solutions' ),
		'div' => __( 'div', 'aster-it-solutions' ),
		'span' => __( 'span', 'aster-it-solutions' ),
	),
) );



$wp_customize->add_setting('aster_it_solutions_page_header_layout', array(
	'default' => 'left',
	'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('aster_it_solutions_page_header_layout', array(
	'label' => __('Style', 'aster-it-solutions'),
	'section' => 'aster_it_solutions_page_title_options',
	'description' => __('"Flex Layout Style" wont work below 600px (mobile media)', 'aster-it-solutions'),
	'settings' => 'aster_it_solutions_page_header_layout',
	'type' => 'radio',
	'choices' => array(
		'left' => __('Classic', 'aster-it-solutions'),
		'right' => __('Aligned Right', 'aster-it-solutions'),
		'center' => __('Centered Focus', 'aster-it-solutions'),
		'flex' => __('Flex Layout', 'aster-it-solutions'),
	),
));