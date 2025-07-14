<?php
function aster_it_solutions_get_all_google_fonts() {
    $aster_it_solutions_webfonts_json = get_template_directory() . '/theme-library/google-webfonts.json';
    if ( ! file_exists( $aster_it_solutions_webfonts_json ) ) {
        return array();
    }

    $aster_it_solutions_fonts_json_data = file_get_contents( $aster_it_solutions_webfonts_json );
    if ( false === $aster_it_solutions_fonts_json_data ) {
        return array();
    }

    $aster_it_solutions_all_fonts = json_decode( $aster_it_solutions_fonts_json_data, true );
    if ( json_last_error() !== JSON_ERROR_NONE ) {
        return array();
    }

    $aster_it_solutions_google_fonts = array();
    foreach ( $aster_it_solutions_all_fonts as $aster_it_solutions_font ) {
        $aster_it_solutions_google_fonts[ $aster_it_solutions_font['family'] ] = array(
            'family'   => $aster_it_solutions_font['family'],
            'variants' => $aster_it_solutions_font['variants'],
        );
    }
    return $aster_it_solutions_google_fonts;
}


function aster_it_solutions_get_all_google_font_families() {
    $aster_it_solutions_google_fonts  = aster_it_solutions_get_all_google_fonts();
    $aster_it_solutions_font_families = array();
    foreach ( $aster_it_solutions_google_fonts as $aster_it_solutions_font ) {
        $aster_it_solutions_font_families[ $aster_it_solutions_font['family'] ] = $aster_it_solutions_font['family'];
    }
    return $aster_it_solutions_font_families;
}

function aster_it_solutions_get_fonts_url() {
    $aster_it_solutions_fonts_url = '';
    $aster_it_solutions_fonts     = array();

    $aster_it_solutions_all_fonts = aster_it_solutions_get_all_google_fonts();

    if ( ! empty( get_theme_mod( 'aster_it_solutions_site_title_font', 'Raleway' ) ) ) {
        $aster_it_solutions_fonts[] = get_theme_mod( 'aster_it_solutions_site_title_font', 'Raleway' );
    }

    if ( ! empty( get_theme_mod( 'aster_it_solutions_site_description_font', 'Raleway' ) ) ) {
        $aster_it_solutions_fonts[] = get_theme_mod( 'aster_it_solutions_site_description_font', 'Raleway' );
    }

    if ( ! empty( get_theme_mod( 'aster_it_solutions_header_font', 'Mulish' ) ) ) {
        $aster_it_solutions_fonts[] = get_theme_mod( 'aster_it_solutions_header_font', 'Mulish' );
    }

    if ( ! empty( get_theme_mod( 'aster_it_solutions_content_font', 'Raleway' ) ) ) {
        $aster_it_solutions_fonts[] = get_theme_mod( 'aster_it_solutions_content_font', 'Raleway' );
    }

    $aster_it_solutions_fonts = array_unique( $aster_it_solutions_fonts );

    foreach ( $aster_it_solutions_fonts as $aster_it_solutions_font ) {
        $aster_it_solutions_variants      = $aster_it_solutions_all_fonts[ $aster_it_solutions_font ]['variants'];
        $aster_it_solutions_font_family[] = $aster_it_solutions_font . ':' . implode( ',', $aster_it_solutions_variants );
    }

    $aster_it_solutions_query_args = array(
        'family' => urlencode( implode( '|', $aster_it_solutions_font_family ) ),
    );

    if ( ! empty( $aster_it_solutions_font_family ) ) {
        $aster_it_solutions_fonts_url = add_query_arg( $aster_it_solutions_query_args, 'https://fonts.googleapis.com/css' );
    }

    return $aster_it_solutions_fonts_url;
}