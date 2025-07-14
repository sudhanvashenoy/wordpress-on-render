<?php
/**
 * Aster IT Solutions functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aster_it_solutions
 */

if ( ! defined( 'ASTER_IT_SOLUTIONS_VERSION' ) ) {
	define( 'ASTER_IT_SOLUTIONS_VERSION', '1.0.0' );
}
$aster_it_solutions_theme_data = wp_get_theme();

if( ! defined( 'ASTER_IT_SOLUTIONS_THEME_NAME' ) ) define( 'ASTER_IT_SOLUTIONS_THEME_NAME', $aster_it_solutions_theme_data->get( 'Name' ) );

if ( ! function_exists( 'aster_it_solutions_setup' ) ) :
	
	function aster_it_solutions_setup() {
		
		load_theme_textdomain( 'aster-it-solutions', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );

		add_theme_support( 'woocommerce' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'aster-it-solutions' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'woocommerce',
			)
		);

		add_theme_support( 'post-formats', array(
			'image',
			'video',
			'gallery',
			'audio', 
		) );

		add_theme_support(
			'custom-background',
			apply_filters(
				'aster_it_solutions_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'aster_it_solutions_setup' );

function aster_it_solutions_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aster_it_solutions_content_width', 640 );
}
add_action( 'after_setup_theme', 'aster_it_solutions_content_width', 0 );

function aster_it_solutions_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'aster-it-solutions' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'aster-it-solutions' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		)
	);

	// Regsiter 4 footer widgets.
	$aster_it_solutions_footer_widget_column = get_theme_mod('aster_it_solutions_footer_widget_column','4');
	for ($i=1; $i<=$aster_it_solutions_footer_widget_column; $i++) {
		register_sidebar( array(
			'name' => __( 'Footer  ', 'aster-it-solutions' )  . $i,
			'id' => 'aster-it-solutions-footer-widget-' . $i,
			'description' => __( 'The Footer Widget Area', 'aster-it-solutions' )  . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<div class="widget-header"><h4 class="widget-title">',
			'after_title' => '</h4></div>',
		) );
	}
}
add_action( 'widgets_init', 'aster_it_solutions_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aster_it_solutions_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// Slick style.
	wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/resource/css/slick' . $min . '.css', array(), '1.8.1' );

	// Fontawesome style.
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/resource/css/fontawesome' . $min . '.css', array(), '5.15.4' );

	// Main style.
	wp_enqueue_style( 'aster-it-solutions-style', get_template_directory_uri() . '/style.css', array(), ASTER_IT_SOLUTIONS_VERSION );

    // RTL style.
	wp_style_add_data('aster-it-solutions-style', 'rtl', 'replace');

	// Navigation script.
	wp_enqueue_script( 'aster-it-solutions-navigation-script', get_template_directory_uri() . '/resource/js/navigation' . $min . '.js', array(), ASTER_IT_SOLUTIONS_VERSION, true );

	// Slick script.
	wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/resource/js/slick' . $min . '.js', array( 'jquery' ), '1.8.1', true );

	// Custom script.
	wp_enqueue_script( 'aster-it-solutions-custom-script', get_template_directory_uri() . '/resource/js/custom' . $min . '.js', array( 'jquery' ), ASTER_IT_SOLUTIONS_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Include the file.
	require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

	// Load the webfont.
	wp_enqueue_style(
		'mulish',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap' ),
		array(),
		'1.0'
	);
}
add_action( 'wp_enqueue_scripts', 'aster_it_solutions_scripts' );

function aster_it_solutions_enqueuing_admin_scripts(){
    wp_enqueue_style('block-editor-admin', get_template_directory_uri().'/resource/css/block-editor-admin.css');
}
add_action( 'admin_enqueue_scripts', 'aster_it_solutions_enqueuing_admin_scripts' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/theme-library/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/theme-library/function-files/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/theme-library/function-files/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/theme-library/customizer.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/theme-library/function-files/class-breadcrumb-trail.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/theme-library/function-files/google-fonts.php';

/**
 * Dynamic CSS
 */
require get_template_directory() . '/theme-library/dynamic-css.php';

/**
 * Getting Started
*/
require get_template_directory() . '/theme-library/getting-started/getting-started.php';

/**
 * Demo Import
 */
require get_parent_theme_file_path( '/theme-wizard/config.php' );

/**
 * Customizer Settings Functions
*/
require get_template_directory() . '/theme-library/function-files/customizer-settings-functions.php';

// Enqueue Customizer live preview script
function aster_it_solutions_customizer_live_preview() {
    wp_enqueue_script(
        'aster-it-solutions-customizer',
        get_template_directory_uri() . '/js/customizer.js',
        array('jquery', 'customize-preview'),
        '',
        true
    );
}
add_action('customize_preview_init', 'aster_it_solutions_customizer_live_preview');