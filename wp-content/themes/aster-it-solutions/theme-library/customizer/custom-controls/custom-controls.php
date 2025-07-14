<?php
/**
 * Customizer Custom Controls
 */

if ( class_exists( 'WP_Customize_Control' ) ) {

	/**
	 * Toggle Switch Custom Control
	 */
	class Aster_IT_Solutions_Toggle_Switch_Custom_Control extends WP_Customize_Control {
		public $type = 'toggle_switch';
		public function render_content() {
			?>
			<div class="toggle-switch-control">
				<div class="toggle-switch">
					<input type="checkbox" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" class="toggle-switch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" 
					<?php
						$this->link();
						checked( $this->value() );
					?>
					>
					<label class="toggle-switch-label" for="<?php echo esc_attr( $this->id ); ?>">
						<span class="toggle-switch-inner"></span>
						<span class="toggle-switch-switch"></span>
					</label>
				</div>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
			</div>
			<?php
		}
	}


	/**
	 * Separator/Heading Custom Control
	 */
	class Aster_IT_Solutions_Separator_Custom_Control extends WP_Customize_Control {
		public $type = 'separator';
		public function render_content() {
			?>
			<div class="separator-control">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<hr />
			</div>
			<?php
		}
	}

	class Aster_IT_Solutions_Image_Radio_Control extends WP_Customize_Control {

		public function render_content() {
			if (empty($this->choices)) return;
	
			$aster_it_solutions_name = '_customize-radio-' . $this->id;
			?>
			
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
		
			<ul class="controls" id='aster-it-solutions-custom-container'>
				<?php
				
				foreach ($this->choices as $aster_it_solutions_value => $aster_it_solutions_label) :
					
					$aster_it_solutions_class = ($this->value() == $aster_it_solutions_value) ? 'aster-it-solutions-selected-img aster-it-solutions-selector-img ' : 'aster-it-solutions-selector-img';
					?>
					
					<li style="display: inline;">
						<label>
							<input <?php $this->link(); ?> style='display:none' type="radio" value="<?php echo esc_attr($aster_it_solutions_value); ?>" name="<?php echo esc_attr($aster_it_solutions_name); ?>" <?php
								$this->link();
								checked($this->value(), $aster_it_solutions_value);
								?> />
	
							<img src='<?php echo esc_url($aster_it_solutions_label); ?>' class='<?php echo esc_attr($aster_it_solutions_class); ?>' />
						</label>
					</li>
					<?php
				endforeach;
				?>
			</ul>
	
			<script type="text/javascript">
				(function($) {
					$(document).ready(function() {
						$('#aster-it-solutions-custom-container img').on('click', function() {
							var $this = $(this);
							var input = $this.prev('input');
							var inputName = input.attr('name');
	
							// Remove the 'aster-it-solutions-selected-img' class from all images
							$('#aster-it-solutions-custom-container img').removeClass('aster-it-solutions-selected-img');
	
							// Add the 'aster-it-solutions-selected-img' class to the clicked image
							$this.addClass('aster-it-solutions-selected-img');
	
							// Set the input as checked
							input.prop('checked', true).trigger('change');
	
							// Optionally: Update the WordPress Customizer to reflect the change
							wp.customize.control(inputName).setting.set(input.val());
						});
					});
				})(jQuery);
			</script>
			<?php
		}
	}

	// Add Aster_IT_Solutions_Customize_Range_Control
	class Aster_IT_Solutions_Customize_Range_Control extends WP_Customize_Control {
		public $type = 'aster-it-solutions-range-slider';

		public function to_json() {
			if ( ! empty( $this->setting->default ) ) {
				$this->json['default'] = $this->setting->default;
			} else {
				$this->json['default'] = false;
			}
			parent::to_json();
		}

		public function enqueue() {
			wp_enqueue_script( 'aster-it-solutions-range-slider', get_template_directory_uri() . '/resource/js/range-control.js', array( 'jquery' ), '', true );
			wp_enqueue_style( 'aster-it-solutions-range-slider', get_template_directory_uri() . '/resource/css/range-control.css' );
		}

		public function render_content() {
			?>
			<label>
				<?php if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
				<div id="<?php echo esc_attr( $this->id ); ?>">
					<div class="aster-it-solutions-range-slider">
						<input class="aster-it-solutions-range-slider-range" type="range" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?> />
						<input class="aster-it-solutions-range-slider-value" type="number" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?> />
						<?php if ( ! empty( $this->setting->default ) ) : ?>
							<span class="aster-it-solutions-range-reset-slider" title="<?php esc_attr_e( 'Reset', 'aster-it-solutions' ); ?>"><span class="dashicons dashicons-image-rotate"></span></span>
						<?php endif;?>
					</div>
				</div>
			</label>
			<?php
		}
	}

	class Aster_IT_Solutions_Customize_Category_Dropdown_Control extends WP_Customize_Control {
		public $type = 'category_dropdown';
	
		public function render_content() {
			$aster_it_solutions_categories = get_categories();
			$selected = esc_attr($this->value());
	
			echo '<select ' . $this->get_link() . '>';
			echo '<option value="">' . __('Select a Category', 'aster-it-solutions') . '</option>';
	
			foreach ($aster_it_solutions_categories as $category) {
				echo '<option value="' . esc_attr($category->slug) . '" ' . selected($selected, $category->slug, false) . '>';
				echo esc_html($category->name);
				echo '</option>';
			}
	
			echo '</select>';
		}
	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
	/**
	 * Upsell section
	 */
	class Aster_IT_Solutions_Upsell_Section extends WP_Customize_Section {
		/**
		 * The type of control being rendered
		 */
		public $type = 'aster-it-solutions-upsell';

		/**
		 * The Upsell button text
		 */
		public $button_text = '';

		/**
		 * The Upsell URL
		 */
		public $url = '';

		/**
		 * The background color for the control
		 */
		public $background_color = '';

		/**
		 * The text color for the control
		 */
		public $text_color = '';

		/**
		 * Render the section, and the controls that have been added to it.
		 */
		protected function render() {
			$background_color = ! empty( $this->background_color ) ? esc_attr( $this->background_color ) : '#fff';
			$text_color       = ! empty( $this->text_color ) ? esc_attr( $this->text_color ) : '#50575e';
			$section_class    = esc_attr( $this->id ); // Use the section ID as the class name
			?>
			<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="aster_it_solutions_upsell_section accordion-section control-section control-section-<?php echo esc_attr( $this->id ); ?> cannot-expand <?php echo $section_class; ?>">
				<h3 class="accordion-section-title" style="color:<?php echo esc_attr( $text_color ); ?>; background:<?php echo esc_attr( $background_color ); ?>;border-left-color:<?php echo esc_attr( $background_color ); ?>;">
					<?php echo esc_html( $this->title ); ?>
					<a href="<?php echo esc_url( $this->url ); ?>" class="button button-secondary alignright" target="_blank" style="margin-top: -4px;"><?php echo esc_html( $this->button_text ); ?></a>
				</h3>
			</li>
			<?php
		}
	}
}