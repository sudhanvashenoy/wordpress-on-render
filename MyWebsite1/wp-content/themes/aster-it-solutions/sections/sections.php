<?php

/**
 * Render homepage sections.
 */
function aster_it_solutions_homepage_sections() {
	$aster_it_solutions_homepage_sections = array_keys( aster_it_solutions_get_homepage_sections() );

	foreach ( $aster_it_solutions_homepage_sections as $aster_it_solutions_section ) {
		require get_template_directory() . '/sections/' . $aster_it_solutions_section . '.php';
	}
}