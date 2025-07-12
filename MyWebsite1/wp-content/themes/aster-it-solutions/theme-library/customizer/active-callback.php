<?php

/**
 * Active Callbacks
 *
 * @package aster_it_solutions
 */

// Theme Options.
function aster_it_solutions_is_pagination_enabled( $aster_it_solutions_control ) {
	return ( $aster_it_solutions_control->manager->get_setting( 'aster_it_solutions_enable_pagination' )->value() );
}
function aster_it_solutions_is_breadcrumb_enabled( $aster_it_solutions_control ) {
	return ( $aster_it_solutions_control->manager->get_setting( 'aster_it_solutions_enable_breadcrumb' )->value() );
}
function aster_it_solutions_is_layout_enabled( $aster_it_solutions_control ) {
	return ( $aster_it_solutions_control->manager->get_setting( 'aster_it_solutions_website_layout' )->value() );
}
function aster_it_solutions_is_pagetitle_bcakground_image_enabled( $aster_it_solutions_control ) {
	return ( $aster_it_solutions_control->manager->get_setting( 'aster_it_solutions_page_header_style' )->value() );
}
function aster_it_solutions_is_preloader_style( $aster_it_solutions_control ) {
	return ( $aster_it_solutions_control->manager->get_setting( 'aster_it_solutions_enable_preloader' )->value() );
}

// Banner Slider Section.
function aster_it_solutions_is_banner_slider_section_enabled( $aster_it_solutions_control ) {
	return ( $aster_it_solutions_control->manager->get_setting( 'aster_it_solutions_enable_banner_section' )->value() );
}
function aster_it_solutions_is_banner_slider_section_and_content_type_post_enabled( $aster_it_solutions_control ) {
	$content_type = $aster_it_solutions_control->manager->get_setting( 'aster_it_solutions_banner_slider_content_type' )->value();
	return ( aster_it_solutions_is_banner_slider_section_enabled( $aster_it_solutions_control ) && ( 'post' === $content_type ) );
}
function aster_it_solutions_is_banner_slider_section_and_content_type_page_enabled( $aster_it_solutions_control ) {
	$content_type = $aster_it_solutions_control->manager->get_setting( 'aster_it_solutions_banner_slider_content_type' )->value();
	return ( aster_it_solutions_is_banner_slider_section_enabled( $aster_it_solutions_control ) && ( 'page' === $content_type ) );
}

//Services section.
function aster_it_solutions_is_service_section_enabled( $aster_it_solutions_control ) {
	return ( $aster_it_solutions_control->manager->get_setting( 'aster_it_solutions_enable_service_section' )->value() );
}
function aster_it_solutions_is_service_section_and_content_type_post_enabled( $aster_it_solutions_control ) {
	$content_type = $aster_it_solutions_control->manager->get_setting( 'aster_it_solutions_service_content_type' )->value();
	return ( aster_it_solutions_is_service_section_enabled( $aster_it_solutions_control ) && ( 'post' === $content_type ) );
}
function aster_it_solutions_is_service_section_and_content_type_page_enabled( $aster_it_solutions_control ) {
	$content_type = $aster_it_solutions_control->manager->get_setting( 'aster_it_solutions_service_content_type' )->value();
	return ( aster_it_solutions_is_service_section_enabled( $aster_it_solutions_control ) && ( 'page' === $content_type ) );
}