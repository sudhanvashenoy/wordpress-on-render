<?php

/**
 * Color Option
 *
 * @package aster_it_solutions
 */

// Color 1 (Start Color).
$wp_customize->add_setting(
    'aster_it_solutions_gradient_color1',
    array(
        'default'           => '#fd6637',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'aster_it_solutions_gradient_color1',
        array(
            'label'    => __( 'Gradient Color 1 (Primary color)', 'aster-it-solutions' ),
			'description' => __('The chosen color will be set as your primary color also', 'aster-it-solutions'),
            'section'  => 'colors',
            'priority' => 1,
        )
    )
);

// Color 2 (End Color).
$wp_customize->add_setting(
    'aster_it_solutions_gradient_color2',
    array(
        'default'           => '#F87322',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'aster_it_solutions_gradient_color2',
        array(
            'label'    => __( 'Gradient Color 2', 'aster-it-solutions' ),
            'section'  => 'colors',
            'priority' => 2,
        )
    )
);