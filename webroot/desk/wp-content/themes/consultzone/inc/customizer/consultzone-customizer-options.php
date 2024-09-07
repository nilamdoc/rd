<?php
/**
 * Customizer section options.
 *
 * @package consultzone
 *
 */

function consultzone_customizer_theme_settings( $wp_customize ){
	
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
		
		$wp_customize->add_setting(
			'consultstreet_footer_copright_text',
			array(
				'sanitize_callback' =>  'consultzone_sanitize_text',
				'default' => __('Copyright &copy; 2024 | Powered by <a href="//wordpress.org/">WordPress</a> <span class="sep"> | </span> ConsultZone theme by <a target="_blank" href="//themearile.com/">ThemeArile</a>', 'consultzone'),
				'transport'         => $selective_refresh,
			)	
		);
		$wp_customize->add_control('consultstreet_footer_copright_text', array(
				'label' => esc_html__('Footer Copyright','consultzone'),
				'section' => 'consultstreet_footer_copyright',
				'priority'        => 10,
				'type'    =>  'textarea'
		));

}
add_action( 'customize_register', 'consultzone_customizer_theme_settings' );

function consultzone_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
}