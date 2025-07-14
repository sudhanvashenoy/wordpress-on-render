<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package expose-business
 * @since 1.0.0
 */

/**
 * The theme version.
 *
 * @since 1.0.0
 */
define( 'EXPOSE_BUSINESS_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * Add theme support for block styles and editor style.
 *
 * @since 1.0.0
 *
 * @return void
 */
function expose_business_setup() {
	add_editor_style( './assets/css/style-shared.css' );

	/*
	 * Load additional block styles.
	 * See details on how to add more styles in the readme.txt.
	 */
	$styled_blocks = [ 'button', 'quote', 'navigation', 'search', 'blocks' ];
	foreach ( $styled_blocks as $block_name ) {
		$args = array(
			'handle' => "expose-business-$block_name",
			'src'    => get_theme_file_uri( "assets/css/blocks/$block_name.min.css" ),
			'path'   => get_theme_file_path( "assets/css/blocks/$block_name.min.css" ),
		);
		// Replace the "core" prefix if you are styling blocks from plugins.
		wp_enqueue_block_style( "core/$block_name", $args );
	}

}
add_action( 'after_setup_theme', 'expose_business_setup' );

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function expose_business_styles() {
	wp_enqueue_style(
		'expose-business-style',
		get_stylesheet_uri(),
		[],
		EXPOSE_BUSINESS_VERSION
	);
	wp_enqueue_style(
		'expose-business-shared-styles',
		get_theme_file_uri( 'assets/css/style-shared.css' ),
		[],
		EXPOSE_BUSINESS_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'expose_business_styles' );

/**
 * Enqueue the admin CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function expose_business_admin_styles() {
	wp_enqueue_style(
		'expose-business-theme-info-style',
		get_template_directory_uri() . '/assets/css/theme-info.css',
		[],
		EXPOSE_BUSINESS_VERSION
	);
}
add_action( 'admin_enqueue_scripts', 'expose_business_admin_styles' );

/**
 * Custom Menu Page.
 *
 * @since 1.0.0
 *
 * @return void
 */
function expose_business_menu_page() {
    add_submenu_page(
        'themes.php', // Parent slug: 'themes.php' is for Appearance menu
        'Theme Page', // Page title
        'Expose Business Info', // Menu title
        'manage_options', // Capability
        'theme-menu-page', // Menu slug
        'expose_business_menu_page_callback' // Callback function
    );
}
add_action('admin_menu', 'expose_business_menu_page');

function expose_business_menu_page_callback() {
	$theme         = wp_get_theme();
    $theme_name    = $theme->get('Name');
    $theme_version = $theme->get( 'Version' );
    $theme_slug    = $theme->get_template();
    ?>
    <div class="theme-wrap">
    	<div class="theme-wrap-inner">
	        <h1><?php echo esc_html__( 'Welcome to the', 'expose-business' ) . ' ' . esc_html( $theme_name ) . ' ' . esc_html( $theme_version ); ?></h1>
	        <p><?php echo esc_html( $theme_name ) . ' ' . esc_html__( 'is now installed and ready to use.', 'expose-business' ); ?></p>
	        <div class="quick-links">
	        	<?php
	        	echo '<a href="' . esc_url( 'https://www.kantipurthemes.com/downloads/' . esc_html( $theme_slug ) ) . esc_html__( '-pro', 'expose-business' ) . '" target="_blank" class="button button-hero button-primary">' . esc_html__( 'Buy Pro', 'expose-business' ).'</a>';
	        	echo '<a href="' . esc_url( 'https://www.kantipurthemes.com/downloads/' . esc_html( $theme_slug ) ) . '" target="_blank" class="button button-hero button-secondary">' . esc_html__( 'Theme Info', 'expose-business' ).'</a>';
	        	?>
	        </div>
    	</div>
    </div>
    <?php
}

// Filters.
require_once get_theme_file_path( 'inc/filters.php' );

// Block variation example.
require_once get_theme_file_path( 'inc/register-block-variations.php' );

// Block style examples.
require_once get_theme_file_path( 'inc/register-block-styles.php' );

// Block pattern and block category examples.
require_once get_theme_file_path( 'inc/register-block-patterns.php' );
