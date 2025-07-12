<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package aster_it_solutions
 */

function aster_it_solutions_body_classes( $aster_it_solutions_classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$aster_it_solutions_classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$aster_it_solutions_classes[] = 'no-sidebar';
	}

	$aster_it_solutions_classes[] = aster_it_solutions_sidebar_layout();

	return $aster_it_solutions_classes;
}
add_filter( 'body_class', 'aster_it_solutions_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function aster_it_solutions_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'aster_it_solutions_pingback_header' );


/**
 * Get all posts for customizer Post content type.
 */
function aster_it_solutions_get_post_choices() {
	$aster_it_solutions_choices = array( '' => esc_html__( '--Select--', 'aster-it-solutions' ) );
	$aster_it_solutions_args    = array( 'numberposts' => -1 );
	$aster_it_solutions_posts   = get_posts( $aster_it_solutions_args );

	foreach ( $aster_it_solutions_posts as $aster_it_solutions_post ) {
		$aster_it_solutions_id             = $aster_it_solutions_post->ID;
		$aster_it_solutions_title          = $aster_it_solutions_post->post_title;
		$aster_it_solutions_choices[ $aster_it_solutions_id ] = $aster_it_solutions_title;
	}

	return $aster_it_solutions_choices;
}

/**
 * Get all pages for customizer Page content type.
 */
function aster_it_solutions_get_page_choices() {
	$aster_it_solutions_choices = array( '' => esc_html__( '--Select--', 'aster-it-solutions' ) );
	$aster_it_solutions_pages   = get_pages();

	foreach ( $aster_it_solutions_pages as $aster_it_solutions_page ) {
		$aster_it_solutions_choices[ $aster_it_solutions_page->ID ] = $aster_it_solutions_page->post_title;
	}

	return $aster_it_solutions_choices;
}

/**
 * Get all categories for customizer Category content type.
 */
function aster_it_solutions_get_post_cat_choices() {
	$aster_it_solutions_choices = array( '' => esc_html__( '--Select--', 'aster-it-solutions' ) );
	$aster_it_solutions_cats    = get_categories();

	foreach ( $aster_it_solutions_cats as $aster_it_solutions_cat ) {
		$aster_it_solutions_choices[ $aster_it_solutions_cat->term_id ] = $aster_it_solutions_cat->name;
	}

	return $aster_it_solutions_choices;
}

/**
 * Get all donation forms for customizer form content type.
 */
function aster_it_solutions_get_post_donation_form_choices() {
	$aster_it_solutions_choices = array( '' => esc_html__( '--Select--', 'aster-it-solutions' ) );
	$aster_it_solutions_posts   = get_posts(
		array(
			'post_type'   => 'give_forms',
			'numberposts' => -1,
		)
	);
	foreach ( $aster_it_solutions_posts as $aster_it_solutions_post ) {
		$aster_it_solutions_choices[ $aster_it_solutions_post->ID ] = $aster_it_solutions_post->post_title;
	}
	return $aster_it_solutions_choices;
}

if ( ! function_exists( 'aster_it_solutions_excerpt_length' ) ) :
	/**
	 * Excerpt length.
	 */
	function aster_it_solutions_excerpt_length( $aster_it_solutions_length ) {
		if ( is_admin() ) {
			return $aster_it_solutions_length;
		}

		return get_theme_mod( 'aster_it_solutions_excerpt_length', 20 );
	}
endif;
add_filter( 'excerpt_length', 'aster_it_solutions_excerpt_length', 999 );

if ( ! function_exists( 'aster_it_solutions_excerpt_more' ) ) :
	/**
	 * Excerpt more.
	 */
	function aster_it_solutions_excerpt_more( $aster_it_solutions_more ) {
		if ( is_admin() ) {
			return $aster_it_solutions_more;
		}

		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'aster_it_solutions_excerpt_more' );

if ( ! function_exists( 'aster_it_solutions_sidebar_layout' ) ) {
	/**
	 * Get sidebar layout.
	 */
	function aster_it_solutions_sidebar_layout() {
		$aster_it_solutions_sidebar_position      = get_theme_mod( 'aster_it_solutions_sidebar_position', 'right-sidebar' );
		$aster_it_solutions_sidebar_position_post = get_theme_mod( 'aster_it_solutions_post_sidebar_position', 'right-sidebar' );
		$aster_it_solutions_sidebar_position_page = get_theme_mod( 'aster_it_solutions_page_sidebar_position', 'right-sidebar' );

		if ( is_single() ) {
			$aster_it_solutions_sidebar_position = $aster_it_solutions_sidebar_position_post;
		} elseif ( is_page() ) {
			$aster_it_solutions_sidebar_position = $aster_it_solutions_sidebar_position_page;
		}

		return $aster_it_solutions_sidebar_position;
	}
}

if ( ! function_exists( 'aster_it_solutions_is_sidebar_enabled' ) ) {
	/**
	 * Check if sidebar is enabled.
	 */
	function aster_it_solutions_is_sidebar_enabled() {
		$aster_it_solutions_sidebar_position      = get_theme_mod( 'aster_it_solutions_sidebar_position', 'right-sidebar' );
		$aster_it_solutions_sidebar_position_post = get_theme_mod( 'aster_it_solutions_post_sidebar_position', 'right-sidebar' );
		$aster_it_solutions_sidebar_position_page = get_theme_mod( 'aster_it_solutions_page_sidebar_position', 'right-sidebar' );

		$aster_it_solutions_sidebar_enabled = true;
		if ( is_home() || is_archive() || is_search() ) {
			if ( 'no-sidebar' === $aster_it_solutions_sidebar_position ) {
				$aster_it_solutions_sidebar_enabled = false;
			}
		} elseif ( is_single() ) {
			if ( 'no-sidebar' === $aster_it_solutions_sidebar_position || 'no-sidebar' === $aster_it_solutions_sidebar_position_post ) {
				$aster_it_solutions_sidebar_enabled = false;
			}
		} elseif ( is_page() ) {
			if ( 'no-sidebar' === $aster_it_solutions_sidebar_position || 'no-sidebar' === $aster_it_solutions_sidebar_position_page ) {
				$aster_it_solutions_sidebar_enabled = false;
			}
		}
		return $aster_it_solutions_sidebar_enabled;
	}
}

if ( ! function_exists( 'aster_it_solutions_get_homepage_sections ' ) ) {
	/**
	 * Returns homepage sections.
	 */
	function aster_it_solutions_get_homepage_sections() {
		$aster_it_solutions_sections = array(
			'banner'  => esc_html__( 'Banner Section', 'aster-it-solutions' ),
			'services' => esc_html__( 'Services Section', 'aster-it-solutions' ),
		);
		return $aster_it_solutions_sections;
	}
}

/**
 * Renders customizer section link
 */
function aster_it_solutions_section_link( $aster_it_solutions_section_id ) {
	$aster_it_solutions_section_name      = str_replace( 'aster_it_solutions_', ' ', $aster_it_solutions_section_id );
	$aster_it_solutions_section_name      = str_replace( '_', ' ', $aster_it_solutions_section_name );
	$aster_it_solutions_starting_notation = '#';
	?>
	<span class="section-link">
		<span class="section-link-title"><?php echo esc_html( $aster_it_solutions_section_name ); ?></span>
	</span>
	<style type="text/css">
		<?php echo $aster_it_solutions_starting_notation . $aster_it_solutions_section_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>:hover .section-link {
			visibility: visible;
		}
	</style>
	<?php
}

/**
 * Adds customizer section link css
 */
function aster_it_solutions_section_link_css() {
	if ( is_customize_preview() ) {
		?>
		<style type="text/css">
			.section-link {
				visibility: hidden;
				background-color: black;
				position: relative;
				top: 80px;
				z-index: 99;
				left: 40px;
				color: #fff;
				text-align: center;
				font-size: 20px;
				border-radius: 10px;
				padding: 20px 10px;
				text-transform: capitalize;
			}

			.section-link-title {
				padding: 0 10px;
			}

			.banner-section {
				position: relative;
			}

			.banner-section .section-link {
				position: absolute;
				top: 100px;
			}
		</style>
		<?php
	}
}
add_action( 'wp_head', 'aster_it_solutions_section_link_css' );

/**
 * Breadcrumb.
 */
function aster_it_solutions_breadcrumb( $aster_it_solutions_args = array() ) {
	if ( ! get_theme_mod( 'aster_it_solutions_enable_breadcrumb', true ) ) {
		return;
	}

	$aster_it_solutions_args = array(
		'show_on_front' => false,
		'show_title'    => true,
		'show_browse'   => false,
	);
	breadcrumb_trail( $aster_it_solutions_args );
}
add_action( 'aster_it_solutions_breadcrumb', 'aster_it_solutions_breadcrumb', 10 );

/**
 * Add separator for breadcrumb trail.
 */
function aster_it_solutions_breadcrumb_trail_print_styles() {
	$aster_it_solutions_breadcrumb_separator = get_theme_mod( 'aster_it_solutions_breadcrumb_separator', '/' );

	$aster_it_solutions_style = '
		.trail-items li::after {
			content: "' . $aster_it_solutions_breadcrumb_separator . '";
		}'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	$aster_it_solutions_style = apply_filters( 'aster_it_solutions_breadcrumb_trail_inline_style', trim( str_replace( array( "\r", "\n", "\t", '  ' ), '', $aster_it_solutions_style ) ) );

	if ( $aster_it_solutions_style ) {
		echo "\n" . '<style type="text/css" id="breadcrumb-trail-css">' . $aster_it_solutions_style . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'wp_head', 'aster_it_solutions_breadcrumb_trail_print_styles' );

/**
 * Pagination for archive.
 */
function aster_it_solutions_render_posts_pagination() {
	$aster_it_solutions_is_pagination_enabled = get_theme_mod( 'aster_it_solutions_enable_pagination', true );
	if ( $aster_it_solutions_is_pagination_enabled ) {
		$aster_it_solutions_pagination_type = get_theme_mod( 'aster_it_solutions_pagination_type', 'default' );
		if ( 'default' === $aster_it_solutions_pagination_type ) :
			the_posts_navigation();
		else :
			the_posts_pagination();
		endif;
	}
}
add_action( 'aster_it_solutions_posts_pagination', 'aster_it_solutions_render_posts_pagination', 10 );

/**
 * Pagination for single post.
 */
function aster_it_solutions_render_post_navigation() {
	the_post_navigation(
		array(
			'prev_text' => '<span>&#10229;</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-title">%title</span> <span>&#10230;</span>',
		)
	);
}
add_action( 'aster_it_solutions_post_navigation', 'aster_it_solutions_render_post_navigation' );

/**
 * Adds footer copyright text.
 */
function aster_it_solutions_output_footer_copyright_content() {
    $aster_it_solutions_theme_data = wp_get_theme();
    $aster_it_solutions_copyright_text = get_theme_mod('aster_it_solutions_footer_copyright_text');

    if (!empty($aster_it_solutions_copyright_text)) {
        $aster_it_solutions_text = $aster_it_solutions_copyright_text;
    } else {
        $aster_it_solutions_default_text = '<a href="'. esc_url(__('https://asterthemes.com/products/free-it-solution-wordpress-theme','aster-it-solutions')) . '" target="_blank"> ' . esc_html($aster_it_solutions_theme_data->get('Name')) . '</a>' . '&nbsp;' . esc_html__('by', 'aster-it-solutions') . '&nbsp;<a target="_blank" href="' . esc_url($aster_it_solutions_theme_data->get('AuthorURI')) . '">' . esc_html(ucwords($aster_it_solutions_theme_data->get('Author'))) . '</a>';
		/* translators: %s: WordPress.org URL */ 
        $aster_it_solutions_default_text .= sprintf(esc_html__(' | Powered by %s', 'aster-it-solutions'), '<a href="' . esc_url(__('https://wordpress.org/', 'aster-it-solutions')) . '" target="_blank">WordPress</a>. ');

        $aster_it_solutions_text = $aster_it_solutions_default_text;
    }
    ?>
    <span><?php echo wp_kses_post($aster_it_solutions_text); ?></span>
    <?php
}
add_action('aster_it_solutions_footer_copyright', 'aster_it_solutions_output_footer_copyright_content');



/**
 * GET START FUNCTION
 */

function aster_it_solutions_getpage_css($hook) {
	wp_enqueue_script( 'aster-it-solutions-admin-script', get_template_directory_uri() . '/resource/js/aster-it-solutions-admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script( 'aster-it-solutions-admin-script', 'aster_it_solutions_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
    wp_enqueue_style( 'aster-it-solutions-notice-style', get_template_directory_uri() . '/resource/css/notice.css' );
}

add_action( 'admin_enqueue_scripts', 'aster_it_solutions_getpage_css' );


add_action('wp_ajax_aster_it_solutions_dismissable_notice', 'aster_it_solutions_dismissable_notice');
function aster_it_solutions_switch_theme() {
    delete_user_meta(get_current_user_id(), 'aster_it_solutions_dismissable_notice');
}
add_action('after_switch_theme', 'aster_it_solutions_switch_theme');
function aster_it_solutions_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'aster_it_solutions_dismissable_notice', true);
    die();
}

	function aster_it_solutions_deprecated_hook_admin_notice() {
	    global $aster_it_solutions_pagenow;
	    
	    // Check if the current page is the one where you don't want the notice to appear
	    if ( $aster_it_solutions_pagenow === 'themes.php' && isset( $_GET['page'] ) && $_GET['page'] === 'aster-it-solutions-getting-started' ) {
	        return;
	    }

	    $aster_it_solutions_dismissed = get_user_meta( get_current_user_id(), 'aster_it_solutions_dismissable_notice', true );
	    if ( !$aster_it_solutions_dismissed) { ?>
	        <div class="getstrat updated notice notice-success is-dismissible notice-get-started-class">
	            <div class="at-admin-content" >
	                <h2><?php esc_html_e('Welcome to Aster IT Solutions', 'aster-it-solutions'); ?></h2>
	                <p><?php _e('Explore the features of our Pro Theme and take your IT journey to the next level.', 'aster-it-solutions'); ?></p>
	                <p ><?php _e('Get Started With Theme By Clicking On Getting Started.', 'aster-it-solutions'); ?><p>
	                <div style="display: flex; justify-content: center;">
	                    <a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=aster-it-solutions-getting-started' )); ?>"><?php esc_html_e( 'Get started', 'aster-it-solutions' ) ?></a>
	                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://demo.asterthemes.com/aster-it-solutions"><?php esc_html_e('View Demo', 'aster-it-solutions') ?></a>
	                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://asterthemes.com/products/it-solution-wordpress-theme"><?php esc_html_e('Buy Now', 'aster-it-solutions') ?></a>
	                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://demo.asterthemes.com/docs/aster-it-solutions-free"><?php esc_html_e('Free Doc', 'aster-it-solutions') ?></a>
	                </div>
	            </div>
	            <div class="at-admin-image">
	                <img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	            </div>
	        </div>
	    <?php }
	}

	add_action( 'admin_notices', 'aster_it_solutions_deprecated_hook_admin_notice' );


//Admin Notice For Getstart
function aster_it_solutions_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

if ( ! function_exists( 'aster_it_solutions_footer_widget' ) ) :
	function aster_it_solutions_footer_widget() {
		$aster_it_solutions_footer_widget_column = get_theme_mod('aster_it_solutions_footer_widget_column','4');

		$aster_it_solutions_column_class = '';
		if ($aster_it_solutions_footer_widget_column == '1') {
			$aster_it_solutions_column_class = 'one-column';
		} elseif ($aster_it_solutions_footer_widget_column == '2') {
			$aster_it_solutions_column_class = 'two-columns';
		} elseif ($aster_it_solutions_footer_widget_column == '3') {
			$aster_it_solutions_column_class = 'three-columns';
		} else {
			$aster_it_solutions_column_class = 'four-columns';
		}
	
		if($aster_it_solutions_footer_widget_column !== ''): 
		?>
		<div class="dt_footer-widgets <?php echo esc_attr($aster_it_solutions_column_class); ?>">
			<div class="footer-widgets-column">
				<?php
				$footer_widgets_active = false;

				// Loop to check if any footer widget is active
				for ($i = 1; $i <= $aster_it_solutions_footer_widget_column; $i++) {
					if (is_active_sidebar('aster-it-solutions-footer-widget-' . $i)) {
						$footer_widgets_active = true;
						break;
					}
				}

				if ($footer_widgets_active) {
					// Display active footer widgets
					for ($i = 1; $i <= $aster_it_solutions_footer_widget_column; $i++) {
						if (is_active_sidebar('aster-it-solutions-footer-widget-' . $i)) : ?>
							<div class="footer-one-column">
								<?php dynamic_sidebar('aster-it-solutions-footer-widget-' . $i); ?>
							</div>
						<?php endif;
					}
				} else {
				?>
				<div class="footer-one-column default-widgets">
					<aside id="search-2" class="widget widget_search default_footer_search">
						<div class="widget-header">
							<h4 class="widget-title"><?php esc_html_e('Search Here', 'aster-it-solutions'); ?></h4>
						</div>
						<?php get_search_form(); ?>
					</aside>
				</div>
				<div class="footer-one-column default-widgets">
					<aside id="recent-posts-2" class="widget widget_recent_entries">
						<h2 class="widget-title"><?php esc_html_e('Recent Posts', 'aster-it-solutions'); ?></h2>
						<ul>
							<?php
							$recent_posts = wp_get_recent_posts(array(
								'numberposts' => 5,
								'post_status' => 'publish',
							));
							foreach ($recent_posts as $post) {
								echo '<li><a href="' . esc_url(get_permalink($post['ID'])) . '">' . esc_html($post['post_title']) . '</a></li>';
							}
							wp_reset_query();
							?>
						</ul>
					</aside>
				</div>
				<div class="footer-one-column default-widgets">
					<aside id="recent-comments-2" class="widget widget_recent_comments">
						<h2 class="widget-title"><?php esc_html_e('Recent Comments', 'aster-it-solutions'); ?></h2>
						<ul>
							<?php
							$recent_comments = get_comments(array(
								'number' => 5,
								'status' => 'approve',
							));
							foreach ($recent_comments as $comment) {
								echo '<li><a href="' . esc_url(get_comment_link($comment)) . '">' .
									/* translators: %s: details. */
									sprintf(esc_html__('Comment on %s', 'aster-it-solutions'), get_the_title($comment->comment_post_ID)) .
									'</a></li>';
							}
							?>
						</ul>
					</aside>
				</div>
				<div class="footer-one-column default-widgets">
					<aside id="calendar-2" class="widget widget_calendar">
						<h2 class="widget-title"><?php esc_html_e('Calendar', 'aster-it-solutions'); ?></h2>
						<?php get_calendar(); ?>
					</aside>
				</div>
			</div>
			<?php } ?>
		</div>
		<?php
		endif;
	}
	endif;
add_action( 'aster_it_solutions_footer_widget', 'aster_it_solutions_footer_widget' );

function aster_it_solutions_footer_text_transform_css() {
    $aster_it_solutions_footer_text_transform = get_theme_mod('footer_text_transform', 'none');
    ?>
    <style type="text/css">
        .site-footer h4,footer#colophon h2.wp-block-heading,footer#colophon .widgettitle,footer#colophon .widget-title{
            text-transform: <?php echo esc_html($aster_it_solutions_footer_text_transform); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'aster_it_solutions_footer_text_transform_css');