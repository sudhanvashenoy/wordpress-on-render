<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package aster_it_solutions
 */

function aster_it_solutions_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'aster_it_solutions_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1360,
		'height'                 => 110,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'aster_it_solutions_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'aster_it_solutions_custom_header_setup' );

if ( ! function_exists( 'aster_it_solutions_header_style' ) ) :

add_action( 'wp_enqueue_scripts', 'aster_it_solutions_header_style' );
function aster_it_solutions_header_style() {
	if ( get_header_image() ) :
	$aster_it_solutions_custom_css = "
		.bottom-header-outer-wrapper {
            background-image: url('".esc_url(get_header_image())."') !important;
            background-position: center;
            background-size: cover;
            height: 200px; /* Your custom height */
        }
        .header-main-wrapper {
            position: absolute;
            width: 100%;
            z-index: 9999;
        }
		@media only screen and (max-width: 600px) {
			.header-main-wrapper {
				position: relative;
			}
		}";
	   	wp_add_inline_style( 'aster-it-solutions-style', $aster_it_solutions_custom_css );
	endif;
}
endif;