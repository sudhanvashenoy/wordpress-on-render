<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package aster_it_solutions
 */

function aster_it_solutions_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_html( get_theme_mod( 'primary_color', '#fd6637' ) ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'aster_it_solutions_customize_css' );


function add_custom_script_in_footer() {
    if ( get_theme_mod( 'aster_it_solutions_enable_sticky_header', false ) ) {
        ?>
        <script>
            jQuery(document).ready(function($) {
                $(window).on('scroll', function() {
                    var scroll = $(window).scrollTop();
                    if (scroll > 0) {
                        $('.bottom-header-part-wrapper.hello').addClass('is-sticky');
                    } else {
                        $('.bottom-header-part-wrapper.hello').removeClass('is-sticky');
                    }
                });
            });
        </script>
        <?php
    }
}
add_action( 'wp_footer', 'add_custom_script_in_footer' );


function aster_it_solutions_enqueue_selected_fonts() {
    $aster_it_solutions_fonts_url = aster_it_solutions_get_fonts_url();
    if (!empty($aster_it_solutions_fonts_url)) {
        wp_enqueue_style('aster-it-solutions-google-fonts', $aster_it_solutions_fonts_url, array(), null);
    }
}
add_action('wp_enqueue_scripts', 'aster_it_solutions_enqueue_selected_fonts');

function aster_it_solutions_layout_customizer_css() {
    $aster_it_solutions_margin = get_theme_mod('aster_it_solutions_layout_width_margin', 50);
    ?>
    <style type="text/css">
        body.site-boxed--layout #page  {
            margin: 0 <?php echo esc_attr($aster_it_solutions_margin); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'aster_it_solutions_layout_customizer_css');

function aster_it_solutions_blog_layout_customizer_css() {
    // Retrieve the blog layout option
    $aster_it_solutions_blog_layout_option = get_theme_mod('aster_it_solutions_blog_layout_option_setting', 'Left');

    // Initialize custom CSS variable
    $aster_it_solutions_custom_css = '';

    // Generate custom CSS based on the layout option
    if ($aster_it_solutions_blog_layout_option === 'Default') {
        $aster_it_solutions_custom_css .= '.mag-post-detail { text-align: center; }';
    } elseif ($aster_it_solutions_blog_layout_option === 'Left') {
        $aster_it_solutions_custom_css .= '.mag-post-detail { text-align: left; }';
    } elseif ($aster_it_solutions_blog_layout_option === 'Right') {
        $aster_it_solutions_custom_css .= '.mag-post-detail { text-align: right; }';
    }

    // Output the combined CSS
    ?>
    <style type="text/css">
        <?php echo wp_kses($aster_it_solutions_custom_css, array( 'style' => array(), 'text-align' => array() )); ?>
    </style>
    <?php
}
add_action('wp_head', 'aster_it_solutions_blog_layout_customizer_css');

function aster_it_solutions_sidebar_width_customizer_css() {
    $aster_it_solutions_sidebar_width = get_theme_mod('aster_it_solutions_sidebar_width', '30');
    ?>
    <style type="text/css">
        .right-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: auto <?php echo esc_attr($aster_it_solutions_sidebar_width); ?>%;
        }
        .left-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: <?php echo esc_attr($aster_it_solutions_sidebar_width); ?>% auto;
        }
    </style>
    <?php
}
add_action('wp_head', 'aster_it_solutions_sidebar_width_customizer_css');

if ( ! function_exists( 'aster_it_solutions_get_page_title' ) ) {
    function aster_it_solutions_get_page_title() {
        $aster_it_solutions_title = '';

        if (is_404()) {
            $aster_it_solutions_title = esc_html__('Page Not Found', 'aster-it-solutions');
        } elseif (is_search()) {
            $aster_it_solutions_title = esc_html__('Search Results for: ', 'aster-it-solutions') . esc_html(get_search_query());
        } elseif (is_home() && !is_front_page()) {
            $aster_it_solutions_title = esc_html__('Blogs', 'aster-it-solutions');
        } elseif (function_exists('is_shop') && is_shop()) {
            $aster_it_solutions_title = esc_html__('Shop', 'aster-it-solutions');
        } elseif (is_page()) {
            $aster_it_solutions_title = get_the_title();
        } elseif (is_single()) {
            $aster_it_solutions_title = get_the_title();
        } elseif (is_archive()) {
            $aster_it_solutions_title = get_the_archive_title();
        } else {
            $aster_it_solutions_title = get_the_archive_title();
        }

        return apply_filters('aster_it_solutions_page_title', $aster_it_solutions_title);
    }
}

if ( ! function_exists( 'aster_it_solutions_has_page_header' ) ) {
    function aster_it_solutions_has_page_header() {
        // Default to true (display header)
        $aster_it_solutions_return = true;

        // Custom conditions for disabling the header
        if ('hide-all-devices' === get_theme_mod('aster_it_solutions_page_header_visibility', 'all-devices')) {
            $aster_it_solutions_return = false;
        }

        // Apply filters and return
        return apply_filters('aster_it_solutions_display_page_header', $aster_it_solutions_return);
    }
}

if ( ! function_exists( 'aster_it_solutions_page_header_style' ) ) {
    function aster_it_solutions_page_header_style() {
        $aster_it_solutions_style = get_theme_mod('aster_it_solutions_page_header_style', 'default');
        return apply_filters('aster_it_solutions_page_header_style', $aster_it_solutions_style);
    }
}

function aster_it_solutions_page_title_customizer_css() {
    $aster_it_solutions_layout_option = get_theme_mod('aster_it_solutions_page_header_layout', 'left');
    ?>
    <style type="text/css">
        .asterthemes-wrapper.page-header-inner {
            <?php if ($aster_it_solutions_layout_option === 'flex') : ?>
                display: flex;
                justify-content: space-between;
                align-items: center;
            <?php else : ?>
                text-align: <?php echo esc_attr($aster_it_solutions_layout_option); ?>;
            <?php endif; ?>
        }
    </style>
    <?php
}
add_action('wp_head', 'aster_it_solutions_page_title_customizer_css');

function aster_it_solutions_pagetitle_height_css() {
    $aster_it_solutions_height = get_theme_mod('aster_it_solutions_pagetitle_height', 50);
    ?>
    <style type="text/css">
        header.page-header {
            padding: <?php echo esc_attr($aster_it_solutions_height); ?>px 0;
        }
    </style>
    <?php
}
add_action('wp_head', 'aster_it_solutions_pagetitle_height_css');

function aster_it_solutions_customize_scss() {
    // Retrieve the two colors from the customizer settings.
    $aster_it_solutions_color1 = get_theme_mod('aster_it_solutions_gradient_color1', '#fd6637'); // Default start color
    $aster_it_solutions_color2 = get_theme_mod('aster_it_solutions_gradient_color2', '#F87322'); // Default end color

    // Generate the gradient.
    $aster_it_solutions_gradient = "linear-gradient($aster_it_solutions_color1 40%, $aster_it_solutions_color2 60%)";
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_html($aster_it_solutions_color1); ?>; /* Fallback color (color1) */
            --primary-gradient: <?php echo esc_html($aster_it_solutions_gradient); ?>; /* Dynamically generated gradient */
        }
    </style>
    <?php
}
add_action('wp_head', 'aster_it_solutions_customize_scss');

function aster_it_solutions_site_logo_width() {
    $aster_it_solutions_site_logo_width = get_theme_mod('aster_it_solutions_site_logo_width', 200);
    ?>
    <style type="text/css">
        .site-logo img {
            max-width: <?php echo esc_attr($aster_it_solutions_site_logo_width); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'aster_it_solutions_site_logo_width');

function aster_it_solutions_menu_font_size_css() {
    $aster_it_solutions_menu_font_size = get_theme_mod('aster_it_solutions_menu_font_size', 15);
    ?>
    <style type="text/css">
        .main-navigation a {
            font-size: <?php echo esc_attr($aster_it_solutions_menu_font_size); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'aster_it_solutions_menu_font_size_css');

function aster_it_solutions_sidebar_widget_font_size_css() {
    $aster_it_solutions_sidebar_widget_font_size = get_theme_mod('aster_it_solutions_sidebar_widget_font_size', 24);
    ?>
    <style type="text/css">
        h2.wp-block-heading,aside#secondary .widgettitle,aside#secondary .widget-title {
            font-size: <?php echo esc_attr($aster_it_solutions_sidebar_widget_font_size); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'aster_it_solutions_sidebar_widget_font_size_css');

// Retrieve the slider visibility setting
$aster_it_solutions_slider = get_theme_mod('aster_it_solutions_enable_banner_section', false);

// Function to output custom CSS directly in the head section
function aster_it_solutions_custom_css() {
    global $aster_it_solutions_slider;
    if ($aster_it_solutions_slider == false) {
        echo '<style type="text/css">
            body.home .header-main-wrapper {
                position: relative !important;
                top:0px;
            }
        </style>';
    }
}

// Hook the function into the wp_head action
add_action('wp_head', 'aster_it_solutions_custom_css');