<?php
/**
 * Customizer section options.
 *
 * @package hartford
 *
 */

function hartford_customizer_theme_settings( $wp_customize ){
	
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
		
		$wp_customize->add_setting(
			'aasta_footer_copright_text',
			array(
				'sanitize_callback' =>  'hartford_sanitize_text',
				'default' => __('Copyright &copy; 2024 | Powered by <a href="//wordpress.org/">WordPress</a> <span class="sep"> | </span> Hartford theme by <a target="_blank" href="//themearile.com/">ThemeArile</a>', 'hartford'),
				'transport'         => $selective_refresh,
			)	
		);
		$wp_customize->add_control('aasta_footer_copright_text', array(
				'label' => esc_html__('Footer Copyright','hartford'),
				'section' => 'aasta_footer_copyright',
				'priority'        => 10,
				'type'    =>  'textarea'
		));

}
add_action( 'customize_register', 'hartford_customizer_theme_settings' );

function hartford_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
}