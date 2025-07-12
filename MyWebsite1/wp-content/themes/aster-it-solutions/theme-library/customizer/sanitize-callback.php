<?php

function aster_it_solutions_sanitize_select( $aster_it_solutions_input, $aster_it_solutions_setting ) {
	$aster_it_solutions_input = sanitize_key( $aster_it_solutions_input );
	$aster_it_solutions_choices = $aster_it_solutions_setting->manager->get_control( $aster_it_solutions_setting->id )->choices;
	return ( array_key_exists( $aster_it_solutions_input, $aster_it_solutions_choices ) ? $aster_it_solutions_input : $aster_it_solutions_setting->default );
}

function aster_it_solutions_sanitize_switch( $aster_it_solutions_input ) {
	if ( true === $aster_it_solutions_input ) {
		return true;
	} else {
		return false;
	}
}

function aster_it_solutions_sanitize_google_fonts( $aster_it_solutions_input, $aster_it_solutions_setting ) {
	$aster_it_solutions_choices = $aster_it_solutions_setting->manager->get_control( $aster_it_solutions_setting->id )->choices;
	return ( array_key_exists( $aster_it_solutions_input, $aster_it_solutions_choices ) ? $aster_it_solutions_input : $aster_it_solutions_setting->default );
}

/**
 * Sanitize HTML input.
 *
 * @param string $aster_it_solutions_input HTML input to sanitize.
 * @return string Sanitized HTML.
 */
function aster_it_solutions_sanitize_html( $aster_it_solutions_input ) {
    return wp_kses_post( $aster_it_solutions_input );
}

/**
 * Sanitize URL input.
 *
 * @param string $aster_it_solutions_input URL input to sanitize.
 * @return string Sanitized URL.
 */
function aster_it_solutions_sanitize_url( $aster_it_solutions_input ) {
    return esc_url_raw( $aster_it_solutions_input );
}

// Sanitize Scroll Top Position
function aster_it_solutions_sanitize_scroll_top_position( $aster_it_solutions_input ) {
    $aster_it_solutions_valid_positions = array( 'bottom-right', 'bottom-left', 'bottom-center' );
    if ( in_array( $aster_it_solutions_input, $aster_it_solutions_valid_positions ) ) {
        return $aster_it_solutions_input;
    } else {
        return 'bottom-right'; // Default to bottom-right if invalid value
    }
}

function aster_it_solutions_sanitize_choices( $aster_it_solutions_input, $aster_it_solutions_setting ) {
	global $wp_customize; 
	$aster_it_solutions_control = $wp_customize->get_control( $aster_it_solutions_setting->id ); 
	if ( array_key_exists( $aster_it_solutions_input, $aster_it_solutions_control->choices ) ) {
		return $aster_it_solutions_input;
	} else {
		return $aster_it_solutions_setting->default;
	}
}

function aster_it_solutions_sanitize_range_value( $aster_it_solutions_number, $aster_it_solutions_setting ) {

	// Ensure input is an absolute integer.
	$aster_it_solutions_number = absint( $aster_it_solutions_number );

	// Get the input attributes associated with the setting.
	$aster_it_solutions_atts = $aster_it_solutions_setting->manager->get_control( $aster_it_solutions_setting->id )->input_attrs;

	// Get minimum number in the range.
	$aster_it_solutions_min = ( isset( $aster_it_solutions_atts['min'] ) ? $aster_it_solutions_atts['min'] : $aster_it_solutions_number );

	// Get maximum number in the range.
	$aster_it_solutions_max = ( isset( $aster_it_solutions_atts['max'] ) ? $aster_it_solutions_atts['max'] : $aster_it_solutions_number );

	// Get step.
	$aster_it_solutions_step = ( isset( $aster_it_solutions_atts['step'] ) ? $aster_it_solutions_atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default.
	return ( $aster_it_solutions_min <= $aster_it_solutions_number && $aster_it_solutions_number <= $aster_it_solutions_max && is_int( $aster_it_solutions_number / $aster_it_solutions_step ) ? $aster_it_solutions_number : $aster_it_solutions_setting->default );
}