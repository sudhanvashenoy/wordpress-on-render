<?php

/**
 * Dynamic CSS
 */
function aster_it_solutions_dynamic_css() {
	$aster_it_solutions_primary_color = get_theme_mod( 'primary_color', '#F56132' );

	$aster_it_solutions_site_title_font       = get_theme_mod( 'aster_it_solutions_site_title_font', 'Raleway' );
	$aster_it_solutions_site_description_font = get_theme_mod( 'aster_it_solutions_site_description_font', 'Raleway' );
	$aster_it_solutions_header_font           = get_theme_mod( 'aster_it_solutions_header_font', 'Mulish' );
	$aster_it_solutions_content_font             = get_theme_mod( 'aster_it_solutions_content_font', 'Raleway' );

	// Enqueue Google Fonts
	$aster_it_solutions_fonts_url = aster_it_solutions_get_fonts_url();
	if ( ! empty( $aster_it_solutions_fonts_url ) ) {
		wp_enqueue_style( 'aster-it-solutions-google-fonts', esc_url( $aster_it_solutions_fonts_url ), array(), null );
	}

	$aster_it_solutions_custom_css  = '';
	$aster_it_solutions_custom_css .= '
    /* Color */
    :root {
        --primary-color: ' . esc_attr( $aster_it_solutions_primary_color ) . ';
        --header-text-color: ' . esc_attr( '#' . get_header_textcolor() ) . ';
    }
    ';

	$aster_it_solutions_custom_css .= '
    /* Typography */
    :root {
        --font-heading: "' . esc_attr( $aster_it_solutions_header_font ) . '", serif;
        --font-main: -apple-system, BlinkMacSystemFont, "' . esc_attr( $aster_it_solutions_content_font ) . '", "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    }

    body,
	button, input, select, optgroup, textarea, p {
        font-family: "' . esc_attr( $aster_it_solutions_content_font ) . '", serif;
	}

	.site-identity p.site-title, h1.site-title a, h1.site-title, p.site-title a, .site-branding h1.site-title a {
        font-family: "' . esc_attr( $aster_it_solutions_site_title_font ) . '", serif;
	}
    
	p.site-description {
        font-family: "' . esc_attr( $aster_it_solutions_site_description_font ) . '", serif !important;
	}
    ';

	wp_add_inline_style( 'aster-it-solutions-style', $aster_it_solutions_custom_css );
}
add_action( 'wp_enqueue_scripts', 'aster_it_solutions_dynamic_css', 99 );