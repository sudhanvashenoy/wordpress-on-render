<?php

/**
 * Footer Options
 *
 * @package aster_it_solutions
 */

$wp_customize->add_section(
	'aster_it_solutions_footer_options',
	array(
		'panel' => 'aster_it_solutions_theme_options',
		'title' => esc_html__( 'Footer Options', 'aster-it-solutions' ),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'aster_it_solutions_footer_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Aster_IT_Solutions_Separator_Custom_Control( $wp_customize, 'aster_it_solutions_footer_separators', array(
	'label' => __( 'Footer Settings', 'aster-it-solutions' ),
	'section' => 'aster_it_solutions_footer_options',
	'settings' => 'aster_it_solutions_footer_separators',
)));

// column // 
$wp_customize->add_setting(
	'aster_it_solutions_footer_widget_column',
	array(
        'default'			=> '4',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'aster_it_solutions_sanitize_select',
		
	)
);	

$wp_customize->add_control(
	'aster_it_solutions_footer_widget_column',
	array(
	    'label'   		=> __('Select Widget Column','aster-it-solutions'),
		'description' => __('Note: Default footer widgets are shown. Add your preferred widgets in (Appearance > Widgets > Footer) to see changes.', 'aster-it-solutions'),
	    'section' 		=> 'aster_it_solutions_footer_options',
		'type'			=> 'select',
		'choices'        => 
		array(
			'' => __( 'None', 'aster-it-solutions' ),
			'1' => __( '1 Column', 'aster-it-solutions' ),
			'2' => __( '2 Column', 'aster-it-solutions' ),
			'3' => __( '3 Column', 'aster-it-solutions' ),
			'4' => __( '4 Column', 'aster-it-solutions' )
		) 
	) 
);

//  BG Color // 
$wp_customize->add_setting('aster_it_solutions_footer_background_color_setting', array(
    'default' => '#202020',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'aster_it_solutions_footer_background_color_setting', array(
    'label' => __('Footer Background Color', 'aster-it-solutions'),
    'section' => 'aster_it_solutions_footer_options',
)));

// Footer Background Image Setting
$wp_customize->add_setting('aster_it_solutions_footer_background_image_setting', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'aster_it_solutions_footer_background_image_setting', array(
    'label' => __('Footer Background Image', 'aster-it-solutions'),
    'section' => 'aster_it_solutions_footer_options',
)));

$wp_customize->add_setting('footer_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

// Add Footer Text Transform Control
$wp_customize->add_control('footer_text_transform', array(
    'label' => __('Footer Text Transform', 'aster-it-solutions'),
    'section' => 'aster_it_solutions_footer_options',
    'settings' => 'footer_text_transform',
    'type' => 'select',
    'choices' => array(
        'none' => __('None', 'aster-it-solutions'),
        'capitalize' => __('Capitalize', 'aster-it-solutions'),
        'uppercase' => __('Uppercase', 'aster-it-solutions'),
        'lowercase' => __('Lowercase', 'aster-it-solutions'),
    ),
));


$wp_customize->add_setting(
	'aster_it_solutions_footer_copyright_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'aster_it_solutions_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'aster-it-solutions' ),
		'section'  => 'aster_it_solutions_footer_options',
		'settings' => 'aster_it_solutions_footer_copyright_text',
		'type'     => 'textarea',
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'aster_it_solutions_scroll_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Aster_IT_Solutions_Separator_Custom_Control( $wp_customize, 'aster_it_solutions_scroll_separators', array(
	'label' => __( 'Scroll Top Settings', 'aster-it-solutions' ),
	'section' => 'aster_it_solutions_footer_options',
	'settings' => 'aster_it_solutions_scroll_separators',
)));


// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'aster_it_solutions_scroll_top',
	array(
		'sanitize_callback' => 'aster_it_solutions_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Aster_IT_Solutions_Toggle_Switch_Custom_Control(
		$wp_customize,
		'aster_it_solutions_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'aster-it-solutions' ),
			'section' => 'aster_it_solutions_footer_options',
		)
	)
);

// icon // 
$wp_customize->add_setting(
	'aster_it_solutions_scroll_btn_icon',
	array(
        'default' => 'fas fa-chevron-up',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Aster_IT_Solutions_Change_Icon_Control($wp_customize, 
	'aster_it_solutions_scroll_btn_icon',
	array(
	    'label'   		=> __('Scroll Top Icon','aster-it-solutions'),
	    'section' 		=> 'aster_it_solutions_footer_options',
		'iconset' => 'fa',
	))  
);

$wp_customize->add_setting( 'aster_it_solutions_scroll_top_position', array(
    'default'           => 'bottom-right',
    'sanitize_callback' => 'aster_it_solutions_sanitize_scroll_top_position',
) );

// Add control for Scroll Top Button Position
$wp_customize->add_control( 'aster_it_solutions_scroll_top_position', array(
    'label'    => __( 'Scroll Top Button Position', 'aster-it-solutions' ),
    'section'  => 'aster_it_solutions_footer_options',
    'settings' => 'aster_it_solutions_scroll_top_position',
    'type'     => 'select',
    'choices'  => array(
        'bottom-right' => __( 'Bottom Right', 'aster-it-solutions' ),
        'bottom-left'  => __( 'Bottom Left', 'aster-it-solutions' ),
        'bottom-center'=> __( 'Bottom Center', 'aster-it-solutions' ),
    ),
) );

$wp_customize->add_setting( 'aster_it_solutions_scroll_top_shape', array(
	'default'           => 'box',
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'aster_it_solutions_scroll_top_shape', array(
	'label'    => __( 'Scroll to Top Button Shape', 'aster-it-solutions' ),
	'section'  => 'aster_it_solutions_footer_options',
	'settings' => 'aster_it_solutions_scroll_top_shape',
	'type'     => 'radio',
	'choices'  => array(
		'box'        => __( 'Box', 'aster-it-solutions' ),
		'curved-box' => __( 'Curved Box', 'aster-it-solutions' ),
		'circle'     => __( 'Circle', 'aster-it-solutions' ),
	),
) );