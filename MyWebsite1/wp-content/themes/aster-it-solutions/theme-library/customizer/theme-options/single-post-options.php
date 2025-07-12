<?php

/**
 * Single Post Options
 *
 * @package aster_it_solutions
 */

$wp_customize->add_section(
	'aster_it_solutions_single_post_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'aster-it-solutions' ),
		'panel' => 'aster_it_solutions_theme_options',
	)
);



// Post Options - Show / Hide Date.
$wp_customize->add_setting(
	'aster_it_solutions_single_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'aster_it_solutions_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Aster_IT_Solutions_Toggle_Switch_Custom_Control(
		$wp_customize,
		'aster_it_solutions_single_post_hide_date',
		array(
			'label'   => esc_html__( 'Show / Hide Date', 'aster-it-solutions' ),
			'section' => 'aster_it_solutions_single_post_options',
		)
	)
);

// Post Options - Show / Hide Author.
$wp_customize->add_setting(
	'aster_it_solutions_single_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'aster_it_solutions_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Aster_IT_Solutions_Toggle_Switch_Custom_Control(
		$wp_customize,
		'aster_it_solutions_single_post_hide_author',
		array(
			'label'   => esc_html__( 'Show / Hide Author', 'aster-it-solutions' ),
			'section' => 'aster_it_solutions_single_post_options',
		)
	)
);

// Post Options - Show / Hide Category.
$wp_customize->add_setting(
	'aster_it_solutions_single_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'aster_it_solutions_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Aster_IT_Solutions_Toggle_Switch_Custom_Control(
		$wp_customize,
		'aster_it_solutions_single_post_hide_category',
		array(
			'label'   => esc_html__( 'Show / Hide Category', 'aster-it-solutions' ),
			'section' => 'aster_it_solutions_single_post_options',
		)
	)
);

// Post Options - Show / Hide Tag.
$wp_customize->add_setting(
	'aster_it_solutions_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'aster_it_solutions_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Aster_IT_Solutions_Toggle_Switch_Custom_Control(
		$wp_customize,
		'aster_it_solutions_post_hide_tags',
		array(
			'label'   => esc_html__( 'Show / Hide Tag', 'aster-it-solutions' ),
			'section' => 'aster_it_solutions_single_post_options',
		)
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'aster_it_solutions_related_post_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Aster_IT_Solutions_Separator_Custom_Control( $wp_customize, 'aster_it_solutions_related_post_separator', array(
	'label' => __( 'Enable / Disable Related Post Section', 'aster-it-solutions' ),
	'section' => 'aster_it_solutions_single_post_options',
	'settings' => 'aster_it_solutions_related_post_separator',
) ) );


// Post Options - Show / Hide Related Posts.
$wp_customize->add_setting(
	'aster_it_solutions_post_hide_related_posts',
	array(
		'default'           => false,
		'sanitize_callback' => 'aster_it_solutions_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Aster_IT_Solutions_Toggle_Switch_Custom_Control(
		$wp_customize,
		'aster_it_solutions_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Show / Hide Related Posts', 'aster-it-solutions' ),
			'section' => 'aster_it_solutions_single_post_options',
		)
	)
);

// Register setting for number of related posts
$wp_customize->add_setting(
    'aster_it_solutions_related_posts_count',
    array(
        'default'           => 3,
        'sanitize_callback' => 'absint', // Ensure it's an integer
    )
);

// Add control for number of related posts
$wp_customize->add_control(
    'aster_it_solutions_related_posts_count',
    array(
        'type'        => 'number',
        'label'       => esc_html__( 'Number of Related Posts to Display', 'aster-it-solutions' ),
        'section'     => 'aster_it_solutions_single_post_options',
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 3, // Adjust maximum based on your preference
            'step' => 1,
        ),
    )
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'aster_it_solutions_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'aster-it-solutions' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'aster_it_solutions_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'aster-it-solutions' ),
		'section'  => 'aster_it_solutions_single_post_options',
		'settings' => 'aster_it_solutions_post_related_post_label',
		'type'     => 'text',
	)
);


