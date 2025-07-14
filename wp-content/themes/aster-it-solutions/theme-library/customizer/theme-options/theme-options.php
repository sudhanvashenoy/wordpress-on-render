<?php

/**
 * Header Options
 *
 * @package aster_it_solutions
 */

// ---------------------------------------- GENERAL OPTIONBS ----------------------------------------------------


// ---------------------------------------- PRELOADER ----------------------------------------------------

$wp_customize->add_section(
	'aster_it_solutions_general_options',
	array(
		'panel' => 'aster_it_solutions_theme_options',
		'title' => esc_html__( 'General Options', 'aster-it-solutions' ),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'aster_it_solutions_preloader_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Aster_IT_Solutions_Separator_Custom_Control( $wp_customize, 'aster_it_solutions_preloader_separator', array(
	'label' => __( 'Enable / Disable Site Preloader Section', 'aster-it-solutions' ),
	'section' => 'aster_it_solutions_general_options',
	'settings' => 'aster_it_solutions_preloader_separator',
) ) );

// General Options - Enable Preloader.
$wp_customize->add_setting(
	'aster_it_solutions_enable_preloader',
	array(
		'sanitize_callback' => 'aster_it_solutions_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Aster_IT_Solutions_Toggle_Switch_Custom_Control(
		$wp_customize,
		'aster_it_solutions_enable_preloader',
		array(
			'label'   => esc_html__( 'Enable Preloader', 'aster-it-solutions' ),
			'section' => 'aster_it_solutions_general_options',
		)
	)
);

// Preloader Style Setting
$wp_customize->add_setting(
    'aster_it_solutions_preloader_style',
    array(
        'default'           => 'style1',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'aster_it_solutions_preloader_style',
    array(
        'type'     => 'select',
        'label'    => esc_html__('Select Preloader Styles', 'aster-it-solutions'),
		'active_callback' => 'aster_it_solutions_is_preloader_style',
        'section'  => 'aster_it_solutions_general_options',
        'choices'  => array(
            'style1' => esc_html__('Style 1', 'aster-it-solutions'),
            'style2' => esc_html__('Style 2', 'aster-it-solutions'),
            'style3' => esc_html__('Style 3', 'aster-it-solutions'),
        ),
    )
);

// ---------------------------------------- PAGINATION ----------------------------------------------------

// Add Separator Custom Control
$wp_customize->add_setting( 'aster_it_solutions_pagination_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Aster_IT_Solutions_Separator_Custom_Control( $wp_customize, 'aster_it_solutions_pagination_separator', array(
	'label' => __( 'Enable / Disable Pagination Section', 'aster-it-solutions' ),
	'section' => 'aster_it_solutions_general_options',
	'settings' => 'aster_it_solutions_pagination_separator',
) ) );


// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'aster_it_solutions_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'aster_it_solutions_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Aster_IT_Solutions_Toggle_Switch_Custom_Control(
		$wp_customize,
		'aster_it_solutions_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'aster-it-solutions' ),
			'section'  => 'aster_it_solutions_general_options',
			'settings' => 'aster_it_solutions_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'aster_it_solutions_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'aster_it_solutions_sanitize_select',
	)
);

$wp_customize->add_control(
	'aster_it_solutions_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'aster-it-solutions' ),
		'section'         => 'aster_it_solutions_general_options',
		'settings'        => 'aster_it_solutions_pagination_type',
		'active_callback' => 'aster_it_solutions_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'aster-it-solutions' ),
			'numeric' => __( 'Numeric', 'aster-it-solutions' ),
		),
	)
);



// ---------------------------------------- BREADCRUMB ----------------------------------------------------

// Add Separator Custom Control
$wp_customize->add_setting( 'aster_it_solutions_breadcrumb_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Aster_IT_Solutions_Separator_Custom_Control( $wp_customize, 'aster_it_solutions_breadcrumb_separators', array(
	'label' => __( 'Enable / Disable Breadcrumb Section', 'aster-it-solutions' ),
	'section' => 'aster_it_solutions_general_options',
	'settings' => 'aster_it_solutions_breadcrumb_separators',
)));


// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'aster_it_solutions_enable_breadcrumb',
	array(
		'sanitize_callback' => 'aster_it_solutions_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Aster_IT_Solutions_Toggle_Switch_Custom_Control(
		$wp_customize,
		'aster_it_solutions_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'aster-it-solutions' ),
			'section' => 'aster_it_solutions_general_options',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'aster_it_solutions_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'aster_it_solutions_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'aster-it-solutions' ),
		'active_callback' => 'aster_it_solutions_is_breadcrumb_enabled',
		'section'         => 'aster_it_solutions_general_options',
	)
);



// ---------------------------------------- Website layout ----------------------------------------------------


// Add Separator Custom Control
$wp_customize->add_setting( 'aster_it_solutions_layuout_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Aster_IT_Solutions_Separator_Custom_Control( $wp_customize, 'aster_it_solutions_layuout_separator', array(
	'label' => __( 'Website Layout Setting', 'aster-it-solutions' ),
	'section' => 'aster_it_solutions_general_options',
	'settings' => 'aster_it_solutions_layuout_separator',
)));


$wp_customize->add_setting(
	'aster_it_solutions_website_layout',
	array(
		'sanitize_callback' => 'aster_it_solutions_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Aster_IT_Solutions_Toggle_Switch_Custom_Control(
		$wp_customize,
		'aster_it_solutions_website_layout',
		array(
			'label'   => esc_html__('Boxed Layout', 'aster-it-solutions'),
			'section' => 'aster_it_solutions_general_options',
		)
	)
);


$wp_customize->add_setting('aster_it_solutions_layout_width_margin', array(
	'default'           => 50,
	'sanitize_callback' => 'aster_it_solutions_sanitize_range_value',
));

$wp_customize->add_control(new Aster_IT_Solutions_Customize_Range_Control($wp_customize, 'aster_it_solutions_layout_width_margin', array(
		'label'       => __('Set Width', 'aster-it-solutions'),
		'description' => __('Adjust the width around the website layout by moving the slider. Use this setting to customize the appearance of your site to fit your design preferences.', 'aster-it-solutions'),
		'section'     => 'aster_it_solutions_general_options',
		'settings'    => 'aster_it_solutions_layout_width_margin',
		'active_callback' => 'aster_it_solutions_is_layout_enabled',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 130,
			'step' => 1,
		),
)));



// ---------------------------------------- HEADER OPTIONS ----------------------------------------------------


$wp_customize->add_section(
	'aster_it_solutions_header_options',
	array(
		'panel' => 'aster_it_solutions_theme_options',
		'title' => esc_html__( 'Header Options', 'aster-it-solutions' ),
	)
);


 // Add setting for sticky header
 $wp_customize->add_setting(
	'aster_it_solutions_enable_sticky_header',
	array(
		'sanitize_callback' => 'aster_it_solutions_sanitize_switch',
		'default'           => false,
	)
);

// Add control for sticky header setting
$wp_customize->add_control(
	new Aster_IT_Solutions_Toggle_Switch_Custom_Control(
		$wp_customize,
		'aster_it_solutions_enable_sticky_header',
		array(
			'label'   => esc_html__( 'Enable Sticky Menu', 'aster-it-solutions' ),
			'section' => 'aster_it_solutions_header_options',
		)
	)
);


// Header Options - Phone.
$wp_customize->add_setting(
	'aster_it_solutions_callus_header_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'aster_it_solutions_callus_header_text',
	array(
		'label'           => esc_html__( 'Call Text', 'aster-it-solutions' ),
		'section'         => 'aster_it_solutions_header_options',
		'type'            => 'text',
	)
);

// Header Options - Phone.
$wp_customize->add_setting(
	'aster_it_solutions_callus_header_number',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'aster_it_solutions_callus_header_number',
	array(
		'label'           => esc_html__( 'Phone Number', 'aster-it-solutions' ),
		'section'         => 'aster_it_solutions_header_options',
		'type'            => 'text',
	)
);
// icon // 
$wp_customize->add_setting(
	'aster_it_solutions_call_icon',
	array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Aster_IT_Solutions_Change_Icon_Control($wp_customize, 
	'aster_it_solutions_call_icon',
	array(
	    'label'   		=> __('Call Icon','aster-it-solutions'),
	    'section' 		=> 'aster_it_solutions_header_options',
		'iconset' => 'fa',
	))  
);

// Add Separator Custom Control
$wp_customize->add_setting( 'aster_it_solutions_menu_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Aster_IT_Solutions_Separator_Custom_Control( $wp_customize, 'aster_it_solutions_menu_separator', array(
	'label' => __( 'Menu Settings', 'aster-it-solutions' ),
	'section' => 'aster_it_solutions_header_options',
	'settings' => 'aster_it_solutions_menu_separator',
)));

$wp_customize->add_setting( 'aster_it_solutions_menu_font_size', array(
    'default'           => 15,
    'sanitize_callback' => 'absint',
) );

// Add control for site title size
$wp_customize->add_control( 'aster_it_solutions_menu_font_size', array(
    'type'        => 'number',
    'section'     => 'aster_it_solutions_header_options',
    'label'       => __( 'Menu Font Size ', 'aster-it-solutions' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
));

$wp_customize->add_setting( 'aster_it_solutions_menu_text_transform', array(
    'default'           => 'uppercase', // Default value for text transform
    'sanitize_callback' => 'sanitize_text_field',
) );

// Add control for menu text transform
$wp_customize->add_control( 'aster_it_solutions_menu_text_transform', array(
    'type'     => 'select',
    'section'  => 'aster_it_solutions_header_options', // Adjust the section as needed
    'label'    => __( 'Menu Text Transform', 'aster-it-solutions' ),
    'choices'  => array(
        'none'       => __( 'None', 'aster-it-solutions' ),
        'capitalize' => __( 'Capitalize', 'aster-it-solutions' ),
        'uppercase'  => __( 'Uppercase', 'aster-it-solutions' ),
        'lowercase'  => __( 'Lowercase', 'aster-it-solutions' ),
    ),
) );



// ----------------------------------------SITE IDENTITY----------------------------------------------------


$wp_customize->add_setting( 'aster_it_solutions_site_title_size', array(
    'default'           => 40, // Default font size in pixels
    'sanitize_callback' => 'absint', // Sanitize the input as a positive integer
) );

// Add control for site title size
$wp_customize->add_control( 'aster_it_solutions_site_title_size', array(
    'type'        => 'number',
    'section'     => 'title_tagline', // You can change this section to your preferred section
    'label'       => __( 'Site Title Font Size ', 'aster-it-solutions' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
) );


// Site Logo - Enable Setting.
$wp_customize->add_setting(
	'aster_it_solutions_enable_site_logo',
	array(
		'default'           => true, // Default is to display the logo.
		'sanitize_callback' => 'aster_it_solutions_sanitize_switch', // Sanitize using a custom switch function.
	)
);

$wp_customize->add_control(
	new Aster_IT_Solutions_Toggle_Switch_Custom_Control(
		$wp_customize,
		'aster_it_solutions_enable_site_logo',
		array(
			'label'    => esc_html__( 'Enable Site Logo', 'aster-it-solutions' ),
			'section'  => 'title_tagline', // Section to add this control.
			'settings' => 'aster_it_solutions_enable_site_logo',
		)
	)
);

// Site Title - Enable Setting.
$wp_customize->add_setting(
	'aster_it_solutions_enable_site_title_setting',
	array(
		'default'           => false,
		'sanitize_callback' => 'aster_it_solutions_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Aster_IT_Solutions_Toggle_Switch_Custom_Control(
		$wp_customize,
		'aster_it_solutions_enable_site_title_setting',
		array(
			'label'    => esc_html__( 'Enable Site Title', 'aster-it-solutions' ),
			'section'  => 'title_tagline',
			'settings' => 'aster_it_solutions_enable_site_title_setting',
		)
	)
);


// Tagline - Enable Setting.
$wp_customize->add_setting(
	'aster_it_solutions_enable_tagline_setting',
	array(
		'default'           => false,
		'sanitize_callback' => 'aster_it_solutions_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Aster_IT_Solutions_Toggle_Switch_Custom_Control(
		$wp_customize,
		'aster_it_solutions_enable_tagline_setting',
		array(
			'label'    => esc_html__( 'Enable Tagline', 'aster-it-solutions' ),
			'section'  => 'title_tagline',
			'settings' => 'aster_it_solutions_enable_tagline_setting',
		)
	)
);

$wp_customize->add_setting('aster_it_solutions_site_logo_width', array(
    'default'           => 200,
    'sanitize_callback' => 'aster_it_solutions_sanitize_range_value',
));

$wp_customize->add_control(new Aster_IT_Solutions_Customize_Range_Control($wp_customize, 'aster_it_solutions_site_logo_width', array(
    'label'       => __('Adjust Site Logo Width', 'aster-it-solutions'),
    'description' => __('This setting controls the Width of Site Logo', 'aster-it-solutions'),
    'section'     => 'title_tagline',
    'settings'    => 'aster_it_solutions_site_logo_width',
    'input_attrs' => array(
        'min'  => 0,
        'max'  => 400,
        'step' => 5,
    ),
)));