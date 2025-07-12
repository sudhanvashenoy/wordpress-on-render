<?php
/**
 * Getting Started Page.
 *
 * @package aster_it_solutions
 */

if( ! function_exists( 'aster_it_solutions_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function aster_it_solutions_getting_started_menu(){	
	add_theme_page(
		__( 'Getting Started', 'aster-it-solutions' ),
		__( 'Getting Started', 'aster-it-solutions' ),
		'manage_options',
		'aster-it-solutions-getting-started',
		'aster_it_solutions_getting_started_page'
	);
}
endif;
add_action( 'admin_menu', 'aster_it_solutions_getting_started_menu' );

if( ! function_exists( 'aster_it_solutions_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function aster_it_solutions_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_aster-it-solutions-getting-started' != $hook ) return;

    wp_enqueue_style( 'aster-it-solutions-getting-started', get_template_directory_uri() . '/resource/css/getting-started.css', false, ASTER_IT_SOLUTIONS_VERSION );

    wp_enqueue_script( 'aster-it-solutions-getting-started', get_template_directory_uri() . '/resource/js/getting-started.js', array( 'jquery' ), ASTER_IT_SOLUTIONS_VERSION, true );
}
endif;
add_action( 'admin_enqueue_scripts', 'aster_it_solutions_getting_started_admin_scripts' );

if( ! function_exists( 'aster_it_solutions_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function aster_it_solutions_getting_started_page(){ 
	$aster_it_solutions_theme = wp_get_theme();?>
	<div class="wrap getting-started">
		<div class="intro-wrap">
			<div class="intro cointaner">
				<div class="intro-content">
					<h3><?php echo esc_html( 'Welcome to', 'aster-it-solutions' );?> <span class="theme-name"><?php echo esc_html( ASTER_IT_SOLUTIONS_THEME_NAME ); ?></span></h3>
					<p class="about-text">
						<?php
						// Remove last sentence of description.
						$aster_it_solutions_description = explode( '. ', $aster_it_solutions_theme->get( 'Description' ) );

						$aster_it_solutions_description = implode( '. ', $aster_it_solutions_description );

						echo esc_html( $aster_it_solutions_description . '' );
					?></p>
					<div class="btns-getstart">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"target="_blank" class="button button-primary"><?php esc_html_e( 'Customize', 'aster-it-solutions' ); ?></a>
						<a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/aster-it-solutions/reviews/#new-post' ); ?>" title="<?php esc_attr_e( 'Visit the Review', 'aster-it-solutions' ); ?>" target="_blank">
							<?php esc_html_e( 'Review', 'aster-it-solutions' ); ?>
						</a>
						<a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/aster-it-solutions' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'aster-it-solutions' ); ?>" target="_blank">
							<?php esc_html_e( 'Contact Support', 'aster-it-solutions' ); ?>
						</a>
					</div>
					<div class="btns-wizard">
						<a class="wizard" href="<?php echo esc_url( admin_url( 'themes.php?page=asteritsolutions-wizard' ) ); ?>"target="_blank" class="button button-primary"><?php esc_html_e( 'One Click Demo Setup', 'aster-it-solutions' ); ?></a>
					</div>
				</div>
				<div class="intro-img">
					<img src="<?php echo esc_url(get_template_directory_uri()) .'/screenshot.png'; ?>" />
				</div>
				
			</div>
		</div>

		<div class="cointaner panels">
			<ul class="inline-list">
				<li class="current">
                    <a id="help" href="javascript:void(0);">
                        <?php esc_html_e( 'Getting Started', 'aster-it-solutions' ); ?>
                    </a>
                </li>
				<li>
                    <a id="free-pro-panel" href="javascript:void(0);">
                        <?php esc_html_e( 'Free Vs Pro', 'aster-it-solutions' ); ?>
                    </a>
                </li>
			</ul>
			<div id="panel" class="panel">
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/help-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/free-vs-pro-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/link-panel.php'; ?>
			</div>
		</div>
	</div>
	<?php
}
endif;