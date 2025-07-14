<?php
/**
* Wizard
* @package Whizzie
* @since 1.0.0
*/

class Whizzie {
	protected $version = '1.1.0';
	protected $theme_name = '';
	protected $theme_title = '';
	protected $page_slug = '';
	protected $page_title = '';
	protected $config_steps = array();
	public $parent_slug;
	/**
	 * Constructor
	 * @param $config Configuration parameters
	 */
	public function __construct( $config ) {
		$this->set_vars( $config );
		$this->init();
	}

	/**
	 * Set variables based on configuration
	 * @param $config Configuration parameters
	 */
	public function set_vars( $config ) {
		if ( isset( $config['page_slug'] ) ) {
			$this->page_slug = esc_attr( $config['page_slug'] );
		}
		if ( isset( $config['page_title'] ) ) {
			$this->page_title = esc_attr( $config['page_title'] );
		}
		if ( isset( $config['steps'] ) ) {
			$this->config_steps = $config['steps'];
		}

		$current_theme = wp_get_theme();
		$this->theme_title = $current_theme->get( 'Name' );
		$this->theme_name = strtolower( preg_replace( '#[^a-zA-Z]#', '', $current_theme->get( 'Name' ) ) );
		$this->page_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_page_slug', $this->theme_name . '-wizard' );
		$this->parent_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_parent_slug', '' );
	}

	/*** Initialize hooks and actions ***/
	public function init() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_menu', array( $this, 'menu_page' ) );
		add_action( 'wp_ajax_setup_widgets', array( $this, 'setup_widgets' ) );
	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'theme-wizard-style', get_template_directory_uri() . '/theme-wizard/assets/css/theme-wizard-style.css');
		wp_register_script( 'theme-wizard-script', get_template_directory_uri() . '/theme-wizard/assets/js/theme-wizard-script.js', array( 'jquery' ));
		wp_localize_script(
			'theme-wizard-script',
			'aster_it_solutions_whizzie_params',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'verify_text' => esc_html( 'verifying', 'aster-it-solutions' )
			)
		);
		wp_enqueue_script( 'theme-wizard-script' );
	}

	public function menu_page() {
		add_theme_page( esc_html( $this->page_title ), esc_html( $this->page_title ), 'manage_options', $this->page_slug, array( $this, 'aster_it_solutions_setup_wizard' ) );
	}

	/*** Display the wizard page content ***/
	public function wizard_page() { ?>
		<div class="main-wrap">
			<div class="card whizzie-wrap">
				<ul class="whizzie-menu">
					<?php foreach ( $this->get_steps() as $step ) : ?>
						<li data-step="<?php echo esc_attr( $step['id'] ); ?>" class="step step-<?php echo esc_attr( $step['id'] ); ?>">
							<h2><?php echo esc_html( $step['title'] ); ?></h2>
							<?php $content = call_user_func( array( $this, $step['view'] ) ); ?>
							<?php if ( isset( $content['summary'] ) ) : ?>
								<div class="summary"><?php echo wp_kses_post( $content['summary'] ); ?></div>
							<?php endif; ?>
							<?php if ( isset( $content['detail'] ) ) : ?>
								<p><a href="#" class="more-info"><?php esc_html_e( 'More Info', 'aster-it-solutions' ); ?></a></p>
								<div class="detail"><?php echo wp_kses_post( $content['detail'] ); ?></div>
							<?php endif; ?>
							<?php if ( isset( $step['button_text'] ) && $step['button_text'] ) : ?>
								<div class="button-wrap"><a href="#" class="button button-primary do-it" data-callback="<?php echo esc_attr( $step['callback'] ); ?>" data-step="<?php echo esc_attr( $step['id'] ); ?>"><?php echo esc_html( $step['button_text'] ); ?></a></div>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
				<div class="step-loading"><span class="spinner"></span></div>
			</div>
		</div>
	<?php }

	/*** Setup wizard page content and options ***/
	public function aster_it_solutions_setup_wizard() { ?>
		<div class="wrapper-info get-stared-page-wrap">
			<div class="tab-sec theme-option-tab">
				<div id="demo_offer" class="tabcontent">
					<?php $this->wizard_page(); ?>
				</div>
			</div>
		</div>
	<?php }

	/**
	 * Get the steps for the wizard
	 * @return array
	 */
	public function get_steps() {
		$steps = array(
			'intro' => array(
				'id' => 'intro',
				'title' => __( 'Welcome to ', 'aster-it-solutions' ) . $this->theme_title,
				'view' => 'get_step_intro',
				'callback' => 'do_next_step',
				'button_text' => __( 'Start Now', 'aster-it-solutions' ),
				'can_skip' => false
			),
			'widgets' => array(
				'id' => 'widgets',
				'title' => __( 'Demo Importer', 'aster-it-solutions' ),
				'view' => 'get_step_widgets',
				'callback' => 'install_widgets',
				'button_text' => __( 'Import Demo', 'aster-it-solutions' ),
				'can_skip' => true
			),
			'done' => array(
				'id' => 'done',
				'title' => __( 'All Done', 'aster-it-solutions' ),
				'view' => 'get_step_done'
			)
		);

		return $steps;
	}

	/*** Display the content for the intro step ***/
	public function get_step_intro() { ?>
		<div class="summary">
			<p style="text-align: center;"><?php esc_html_e( 'Thank you for choosing our theme! We are excited to help you get started with your new website.', 'aster-it-solutions' ); ?></p>
			<p style="text-align: center;"><?php esc_html_e( 'To ensure you make the most of our theme, we recommend following the setup steps outlined here. This process will help you configure the theme to best suit your needs and preferences. Click on the "Start Now" button to begin the setup.', 'aster-it-solutions' ); ?></p>
		</div>
	<?php }

	/*** Display the content for the widgets step ***/
	public function get_step_widgets() { ?>
		<div class="summary">
			<p><?php esc_html_e('To get started, use the button below to import demo content and add widgets to your site. After installation, you can manage settings and customize your site using the Customizer. Enjoy your new theme!', 'aster-it-solutions'); ?></p>
		</div>
	<?php }

	/*** Display the content for the final step ***/
	public function get_step_done() { ?>
		<div id="aster-demo-setup-guid">
			<div class="aster-setup-menu">
				<h3><?php esc_html_e('Setup Navigation Menu','aster-it-solutions'); ?></h3>
				<p><?php esc_html_e('Follow the following Steps to Setup Menu','aster-it-solutions'); ?></p>
				<h4><?php esc_html_e('A) Create Pages','aster-it-solutions'); ?></h4>
				<ol>
					<li><?php esc_html_e('Go to Dashboard >> Pages >> Add New','aster-it-solutions'); ?></li>
					<li><?php esc_html_e('Enter Page Details And Save Changes','aster-it-solutions'); ?></li>
				</ol>
				<h4><?php esc_html_e('B) Add Pages To Menu','aster-it-solutions'); ?></h4>
				<ol>
					<li><?php esc_html_e('Go to Dashboard >> Appearance >> Menu','aster-it-solutions'); ?></li>
					<li><?php esc_html_e('Click On The Create Menu Option','aster-it-solutions'); ?></li>
					<li><?php esc_html_e('Select The Pages And Click On The Add to Menu Button','aster-it-solutions'); ?></li>
					<li><?php esc_html_e('Select Primary Menu From The Menu Setting','aster-it-solutions'); ?></li>
					<li><?php esc_html_e('Click On The Save Menu Button','aster-it-solutions'); ?></li>
				</ol>
			</div>
			<div class="aster-setup-widget">
				<h3><?php esc_html_e('Setup Footer Widgets','aster-it-solutions'); ?></h3>
				<p><?php esc_html_e('Follow the following Steps to Setup Footer Widgets','aster-it-solutions'); ?></p>
				<ol>
					<li><?php esc_html_e('Go to Dashboard >> Appearance >> Widgets','aster-it-solutions'); ?></li>
					<li><?php esc_html_e('Drag And Add The Widgets In The Footer Columns','aster-it-solutions'); ?></li>
				</ol>
			</div>
			<div style="display:flex; justify-content: center; margin-top: 20px; gap:20px">
				<div class="aster-setup-finish">
					<a target="_blank" href="<?php echo esc_url(home_url()); ?>" class="button button-primary">Visit Site</a>
				</div>
				<div class="aster-setup-finish">
					<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>" class="button button-primary">Customize Your Demo</a>
				</div>
				<div class="aster-setup-finish">
					<a target="_blank" href="<?php echo esc_url( admin_url('themes.php?page=aster-it-solutions-getting-started') ); ?>" class="button button-primary">Getting Started</a>
				</div>
			</div>
		</div>
	<?php }


	//                      ------------- MENUS -----------------                    //

	public function aster_it_solutions_customizer_primary_menu(){
		// ------- Create Primary Menu --------
		$aster_it_solutions_themename = 'Aster IT Solutions'; // Ensure the theme name is set
		$aster_it_solutions_menuname = $aster_it_solutions_themename . ' Primary Menu';
		$aster_it_solutions_bpmenulocation = 'primary';
		$aster_it_solutions_menu_exists = wp_get_nav_menu_object($aster_it_solutions_menuname);
	
		if( !$aster_it_solutions_menu_exists ) {
			$aster_it_solutions_menu_id = wp_create_nav_menu($aster_it_solutions_menuname);
			
			// Home
			wp_update_nav_menu_item($aster_it_solutions_menu_id, 0, array(
				'menu-item-title' => __('Home', 'aster-it-solutions'),
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url('/'),
				'menu-item-status' => 'publish'
			));

			// Pages
			$page_pages = get_page_by_path('pages');
			if($page_pages){
				wp_update_nav_menu_item($aster_it_solutions_menu_id, 0, array(
					'menu-item-title' => __('Pages', 'aster-it-solutions'),
					'menu-item-classes' => 'pages',
					'menu-item-url' => get_permalink($page_pages),
					'menu-item-status' => 'publish'
				));
			}
	
			// Portfolio
			$page_portfolio = get_page_by_path('portfolio'); // Preferred over get_page_by_title()
			if($page_portfolio){
				wp_update_nav_menu_item($aster_it_solutions_menu_id, 0, array(
					'menu-item-title' => __('Portfolio', 'aster-it-solutions'),
					'menu-item-classes' => 'portfolio',
					'menu-item-url' => get_permalink($page_portfolio),
					'menu-item-status' => 'publish'
				));
			}
	
			// Blogs
			$page_blog = get_page_by_path('blog');
			if($page_blog){
				wp_update_nav_menu_item($aster_it_solutions_menu_id, 0, array(
					'menu-item-title' => __('Blogs', 'aster-it-solutions'),
					'menu-item-classes' => 'blog',
					'menu-item-url' => get_permalink($page_blog),
					'menu-item-status' => 'publish'
				));
			}
	
			// Contact Us
			$page_contact = get_page_by_path('contact-us');
			if($page_contact){
				wp_update_nav_menu_item($aster_it_solutions_menu_id, 0, array(
					'menu-item-title' => __('Contact Us', 'aster-it-solutions'),
					'menu-item-classes' => 'contact',
					'menu-item-url' => get_permalink($page_contact),
					'menu-item-status' => 'publish'
				));
			}
	
			// Assign menu to location if not set
			if( !has_nav_menu($aster_it_solutions_bpmenulocation) ){
				$locations = get_theme_mod('nav_menu_locations');
				$locations[$aster_it_solutions_bpmenulocation] = $aster_it_solutions_menu_id;
				set_theme_mod('nav_menu_locations', $locations);
			}
		}
	}


	//                      ------------- /*** Imports demo content ***/ -----------------                    //

	public function setup_widgets() {

		// Create a front page and assign the template
		$aster_it_solutions_home_title = 'Home';
		$aster_it_solutions_home_check = get_page_by_path('home');
		if (!$aster_it_solutions_home_check) {
			$aster_it_solutions_home = array(
				'post_type'    => 'page',
				'post_title'   => $aster_it_solutions_home_title,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'home' // Unique slug for the home page
			);
			$aster_it_solutions_home_id = wp_insert_post($aster_it_solutions_home);

			// Set the static front page
			if (!is_wp_error($aster_it_solutions_home_id)) {
				update_option('page_on_front', $aster_it_solutions_home_id);
				update_option('show_on_front', 'page');
			}
		}

		// Create a posts page and assign the template
		$aster_it_solutions_blog_title = 'Blogs';
		$aster_it_solutions_blog_check = get_page_by_path('blog');
		if (!$aster_it_solutions_blog_check) {
			$aster_it_solutions_blog = array(
				'post_type'    => 'page',
				'post_title'   => $aster_it_solutions_blog_title,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'blog' // Unique slug for the blog page
			);
			$aster_it_solutions_blog_id = wp_insert_post($aster_it_solutions_blog);

			// Set the posts page
			if (!is_wp_error($aster_it_solutions_blog_id)) {
				update_option('page_for_posts', $aster_it_solutions_blog_id);
			}
		}

		// Create a Portfolio page and assign the template
		$aster_it_solutions_portfolio_title = 'Portfolio';
		$aster_it_solutions_portfolio_check = get_page_by_path('portfolio');
		if (!$aster_it_solutions_portfolio_check) {
			$aster_it_solutions_portfolio = array(
				'post_type'    => 'page',
				'post_title'   => $aster_it_solutions_portfolio_title,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'portfolio' // Unique slug for the Portfolio page
			);
			wp_insert_post($aster_it_solutions_portfolio);
		}

		// Create a Pages page and assign the template
		$aster_it_solutions_pages_title = 'Pages';
		$aster_it_solutions_pages_check = get_page_by_path('pages');
		if (!$aster_it_solutions_pages_check) {
			$aster_it_solutions_pages = array(
				'post_type'    => 'page',
				'post_title'   => $aster_it_solutions_pages_title,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'pages' // Unique slug for the Pages page
			);
			wp_insert_post($aster_it_solutions_pages);
		}

		// Create a Contact Us page and assign the template
		$aster_it_solutions_contact_title = 'Contact Us';
		$aster_it_solutions_contact_check = get_page_by_path('contact-us');
		if (!$aster_it_solutions_contact_check) {
			$aster_it_solutions_contact = array(
				'post_type'    => 'page',
				'post_title'   => $aster_it_solutions_contact_title,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'contact-us' // Unique slug for the Contact Us page
			);
			wp_insert_post($aster_it_solutions_contact);
		}


		/*----------------------------------------- Header Button --------------------------------------------------*/

			set_theme_mod( 'aster_it_solutions_callus_header_text','Call Us');
			set_theme_mod( 'aster_it_solutions_callus_header_number','+1 123 456 7890');
			set_theme_mod( 'aster_it_solutions_call_icon','fas fa-comments');
					

		// ------------------------------------------ Blogs for Sections --------------------------------------

			// Create categories if not already created
			$aster_it_solutions_category_slider = wp_create_category('Slider');
			$aster_it_solutions_category_services = wp_create_category('Services');

			// Array of categories to assign to each set of posts
			$aster_it_solutions_categories = array($aster_it_solutions_category_slider, $aster_it_solutions_category_services);

			// Array of image URLs for the "Services" category
			$services_images = array(
				get_template_directory_uri() . '/resource/img/service1.png',
				get_template_directory_uri() . '/resource/img/service2.png',
				get_template_directory_uri() . '/resource/img/service3.png',
			);

			// Loop to create posts
			for ($i = 1; $i <= 6; $i++) {
				$title = array(
					'Lorem ipsum dolor sit amet consectetur. Velit ut adipiscing at volutpat vitae.',
					'Lorem ipsum dolor sit amet consectetur. Velit ut adipiscing at volutpat vitae.',
					'Lorem ipsum dolor sit amet consectetur. Velit ut adipiscing at volutpat vitae.',
					'Cloud',
					'Data-center',
					'Security',
				);

				$content = 'Proactively envisioried multimedia based expertise and cross-metija growth strategies.';

				// Determine category and post index to use for title
				$category_index = ($i <= 3) ? 0 : 1; // First 3 for Slider, next 3 for Blog
				$post_title = $title[$i - 1]; // Adjust for zero-based index in title array

				// Create post object
				$my_post = array(
					'post_title'    => wp_strip_all_tags($post_title),
					'post_content'  => $content,
					'post_status'   => 'publish',
					'post_type'     => 'post',
					'post_category' => array($aster_it_solutions_categories[$category_index]), // Assign category
				);

				// Insert the post into the database
				$post_id = wp_insert_post($my_post);

				// Determine the category and set image URLs based on category
				if ($category_index === 0) { // Slider category
					$aster_it_solutions_image_url = get_template_directory_uri() . '/resource/img/slider.png';
					$aster_it_solutions_image_name = 'slider.png';
				}else { // Services category
					// Use different images for each post in Services category
					$service_image_index = $i - 4; // Get the correct index for the Services images array (4, 5, 6, 7 corresponds to 0, 1, 2, 3)
					$aster_it_solutions_image_url = $services_images[$service_image_index];
					$aster_it_solutions_image_name = basename($aster_it_solutions_image_url);
				}
				$aster_it_solutions_upload_dir = wp_upload_dir();
				$aster_it_solutions_image_data = file_get_contents($aster_it_solutions_image_url);
				$aster_it_solutions_unique_file_name = wp_unique_filename($aster_it_solutions_upload_dir['path'], $aster_it_solutions_image_name);
				$filename = basename($aster_it_solutions_unique_file_name);

				if (wp_mkdir_p($aster_it_solutions_upload_dir['path'])) {
					$file = $aster_it_solutions_upload_dir['path'] . '/' . $filename;
				} else {
					$file = $aster_it_solutions_upload_dir['basedir'] . '/' . $filename;
				}

				if ( ! function_exists( 'WP_Filesystem' ) ) {
					require_once( ABSPATH . 'wp-admin/includes/file.php' );
				}
				
				WP_Filesystem();
				global $wp_filesystem;
				
				if ( ! $wp_filesystem->put_contents( $file, $aster_it_solutions_image_data, FS_CHMOD_FILE ) ) {
					wp_die( 'Error saving file!' );
				}

				$wp_filetype = wp_check_filetype($filename, null);
				$attachment = array(
					'post_mime_type' => $wp_filetype['type'],
					'post_title'     => sanitize_file_name($filename),
					'post_content'   => '',
					'post_status'    => 'inherit'
				);

				$aster_it_solutions_attach_id = wp_insert_attachment($attachment, $file, $post_id);

				require_once(ABSPATH . 'wp-admin/includes/image.php');

				$aster_it_solutions_attach_data = wp_generate_attachment_metadata($aster_it_solutions_attach_id, $file);
				wp_update_attachment_metadata($aster_it_solutions_attach_id, $aster_it_solutions_attach_data);
				set_post_thumbnail($post_id, $aster_it_solutions_attach_id);
			}

		
		// ---------------------------------------- Slider --------------------------------------------------- //

			for($i=1; $i<=3; $i++) {
				set_theme_mod('aster_it_solutions_banner_button_label_'.$i,'Contact us');
				set_theme_mod('aster_it_solutions_banner_button_link_'.$i,'');
			}

		// ---------------------------------------- Services --------------------------------------------------- //

			set_theme_mod('aster_it_solutions_trending_product_content','Our Plans');
			set_theme_mod('aster_it_solutions_trending_product_heading','Best Solutions For All');

			set_theme_mod('aster_it_solutions_menu_text_transform','Uppercase');

			
		// ---------------------------------------- Footer section --------------------------------------------------- //	
		
			set_theme_mod('footer_background_color_setting','#202020');
			set_theme_mod('aster_it_solutions_enable_banner_section',true);
			
		// ---------------------------------------- Related post_tag --------------------------------------------------- //	
		
			set_theme_mod('aster_it_solutions_post_related_post_label','Related Posts');
			set_theme_mod('aster_it_solutions_related_posts_count','3');


		$this->aster_it_solutions_customizer_primary_menu();
	}
}