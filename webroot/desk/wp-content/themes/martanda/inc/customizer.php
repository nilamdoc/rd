<?php
/**
 * Builds our Customizer controls.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'customize_register', 'martanda_set_customizer_helpers', 1 );
function martanda_set_customizer_helpers( $wp_customize ) {
	// Load helpers
	get_template_part( 'inc/customizer/customizer', 'helpers' );
}

if ( ! function_exists( 'martanda_customize_register' ) ) {
	add_action( 'customize_register', 'martanda_customize_register' );
	function martanda_customize_register( $wp_customize ) {
		// Get our default values
		$defaults = martanda_get_defaults();

		if ( $wp_customize->get_control( 'blogdescription' ) ) {
			$wp_customize->get_control('blogdescription')->priority = 3;
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		}

		if ( $wp_customize->get_control( 'blogname' ) ) {
			$wp_customize->get_control('blogname')->priority = 1;
			$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		}

		// Add control types so controls can be built using JS
		if ( method_exists( $wp_customize, 'register_control_type' ) ) {
			$wp_customize->register_control_type( 'Martanda_Customize_Misc_Control' );
		}

		// Add upsell section type
		if ( method_exists( $wp_customize, 'register_section_type' ) ) {
			$wp_customize->register_section_type( 'Martanda_Upsell_Section' );
		}

		// Add selective refresh to site title and description
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector' => '.site-header .wp-block-site-title a',
				'render_callback' => 'martanda_customize_partial_blogname',
			) );

			$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector' => '.site-description',
				'render_callback' => 'martanda_customize_partial_blogdescription',
			) );
		}

		$wp_customize->add_setting(
			'martanda_settings[text_color]', array(
				'default' => $defaults['text_color'],
				'type' => 'option',
				'sanitize_callback' => 'martanda_sanitize_hex_color'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'martanda_settings[text_color]',
				array(
					'label' => __( 'Text Color', 'martanda' ),
					'section' => 'colors',
					'settings' => 'martanda_settings[text_color]'
				)
			)
		);

		$wp_customize->add_setting(
			'martanda_settings[link_color]', array(
				'default' => $defaults['link_color'],
				'type' => 'option',
				'sanitize_callback' => 'martanda_sanitize_hex_color'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'martanda_settings[link_color]',
				array(
					'label' => __( 'Link Color', 'martanda' ),
					'section' => 'colors',
					'settings' => 'martanda_settings[link_color]'
				)
			)
		);

		$wp_customize->add_setting(
			'martanda_settings[link_color_hover]', array(
				'default' => $defaults['link_color_hover'],
				'type' => 'option',
				'sanitize_callback' => 'martanda_sanitize_hex_color'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'martanda_settings[link_color_hover]',
				array(
					'label' => __( 'Link Color Hover', 'martanda' ),
					'section' => 'colors',
					'settings' => 'martanda_settings[link_color_hover]'
				)
			)
		);

		$wp_customize->add_setting(
			'martanda_settings[side_inside_color]', array(
				'default' => $defaults['side_inside_color'],
				'type' => 'option',
				'sanitize_callback' => 'martanda_sanitize_hex_color'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'martanda_settings[side_inside_color]',
				array(
					'label' => __( 'Body Padding Content', 'martanda' ),
					'section' => 'colors',
					'settings' => 'martanda_settings[side_inside_color]'
				)
			)
		);

		if ( ! function_exists( 'martanda_colors_customize_register' ) && ! defined( 'MARTANDA_PREMIUM_VERSION' ) ) {
			$wp_customize->add_control(
				new Martanda_Customize_Misc_Control(
					$wp_customize,
					'colors_get_addon_desc',
					array(
						'section' => 'colors',
						'type' => 'addon',
						'label' => __( 'More info', 'martanda' ),
						'description' => __( 'More colors are available in Martanda premium version. Visit wpkoi.com for more info.', 'martanda' ),
						'url' => esc_url( martanda_theme_uri_link() ),
						'priority' => 30,
						'settings' => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname'
					)
				)
			);
		}
		
		if ( class_exists( 'WP_Customize_Panel' ) ) {
			if ( ! $wp_customize->get_panel( 'martanda_layout_panel' ) ) {
				$wp_customize->add_panel( 'martanda_layout_panel', array(
					'priority' => 25,
					'title' => __( 'Layout', 'martanda' ),
				) );
			}
		}

		// Add Layout section
		$wp_customize->add_section(
			'martanda_layout_container',
			array(
				'title' => __( 'Container', 'martanda' ),
				'priority' => 10,
				'panel' => 'martanda_layout_panel'
			)
		);
		
		$wp_customize->add_section(
			'martanda_layout_sidecontent',
			array(
				'title' => __( 'Fixed Side Content', 'martanda' ),
				'priority' => 55
			)
		);
		
		$wp_customize->add_setting(
			'martanda_settings[fixed_side_content]',
			array(
				'default' => $defaults['fixed_side_content'],
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			'martanda_settings[fixed_side_content]',
			array(
				'type' 		 => 'textarea',
				'label'      => __( 'Fixed Side Content', 'martanda' ),
				'description'=> __( 'Content that You want to display fixed on the left.', 'martanda' ),
				'section'    => 'martanda_layout_sidecontent',
				'settings'   => 'martanda_settings[fixed_side_content]',
				'priority' 	 => 1
			)
		);
		
		$wp_customize->add_setting(
			'martanda_settings[socials_facebook_url]',
			array(
				'default' => $defaults['socials_facebook_url'],
				'type' => 'option',
				'sanitize_callback' => 'esc_url',
			)
		);

		$wp_customize->add_control(
			'martanda_settings[socials_facebook_url]',
			array(
				'type' 		 => 'text',
				'label'      => __( 'Facebook url', 'martanda' ),
				'section'    => 'martanda_layout_sidecontent',
				'settings'   => 'martanda_settings[socials_facebook_url]',
				'priority' 	 => 10
			)
		);
		
		$wp_customize->add_setting(
			'martanda_settings[socials_twitter_url]',
			array(
				'default' => $defaults['socials_twitter_url'],
				'type' => 'option',
				'sanitize_callback' => 'esc_url',
			)
		);

		$wp_customize->add_control(
			'martanda_settings[socials_twitter_url]',
			array(
				'type' 		 => 'text',
				'label'      => __( 'Twitter url', 'martanda' ),
				'section'    => 'martanda_layout_sidecontent',
				'settings'   => 'martanda_settings[socials_twitter_url]',
				'priority' 	 => 11
			)
		);
		
		$wp_customize->add_setting(
			'martanda_settings[socials_instagram_url]',
			array(
				'default' => $defaults['socials_instagram_url'],
				'type' => 'option',
				'sanitize_callback' => 'esc_url',
			)
		);

		$wp_customize->add_control(
			'martanda_settings[socials_instagram_url]',
			array(
				'type' 		 => 'text',
				'label'      => __( 'Instagram url', 'martanda' ),
				'section'    => 'martanda_layout_sidecontent',
				'settings'   => 'martanda_settings[socials_instagram_url]',
				'priority' 	 => 12
			)
		);
		
		$wp_customize->add_setting(
			'martanda_settings[socials_youtube_url]',
			array(
				'default' => $defaults['socials_youtube_url'],
				'type' => 'option',
				'sanitize_callback' => 'esc_url',
			)
		);

		$wp_customize->add_control(
			'martanda_settings[socials_youtube_url]',
			array(
				'type' 		 => 'text',
				'label'      => __( 'Youtube url', 'martanda' ),
				'section'    => 'martanda_layout_sidecontent',
				'settings'   => 'martanda_settings[socials_youtube_url]',
				'priority' 	 => 13
			)
		);
		
		$wp_customize->add_setting(
			'martanda_settings[socials_tiktok_url]',
			array(
				'default' => $defaults['socials_tiktok_url'],
				'type' => 'option',
				'sanitize_callback' => 'esc_url',
			)
		);

		$wp_customize->add_control(
			'martanda_settings[socials_tiktok_url]',
			array(
				'type' 		 => 'text',
				'label'      => __( 'Tiktok url', 'martanda' ),
				'section'    => 'martanda_layout_sidecontent',
				'settings'   => 'martanda_settings[socials_tiktok_url]',
				'priority' 	 => 14
			)
		);
		
		$wp_customize->add_setting(
			'martanda_settings[socials_twitch_url]',
			array(
				'default' => $defaults['socials_twitch_url'],
				'type' => 'option',
				'sanitize_callback' => 'esc_url',
			)
		);

		$wp_customize->add_control(
			'martanda_settings[socials_twitch_url]',
			array(
				'type' 		 => 'text',
				'label'      => __( 'Twitch url', 'martanda' ),
				'section'    => 'martanda_layout_sidecontent',
				'settings'   => 'martanda_settings[socials_twitch_url]',
				'priority' 	 => 15
			)
		);
		
		$wp_customize->add_setting(
			'martanda_settings[socials_tumblr_url]',
			array(
				'default' => $defaults['socials_tumblr_url'],
				'type' => 'option',
				'sanitize_callback' => 'esc_url',
			)
		);

		$wp_customize->add_control(
			'martanda_settings[socials_tumblr_url]',
			array(
				'type' 		 => 'text',
				'label'      => __( 'Tumblr url', 'martanda' ),
				'section'    => 'martanda_layout_sidecontent',
				'settings'   => 'martanda_settings[socials_tumblr_url]',
				'priority' 	 => 16
			)
		);
		
		$wp_customize->add_setting(
			'martanda_settings[socials_pinterest_url]',
			array(
				'default' => $defaults['socials_pinterest_url'],
				'type' => 'option',
				'sanitize_callback' => 'esc_url',
			)
		);

		$wp_customize->add_control(
			'martanda_settings[socials_pinterest_url]',
			array(
				'type' 		 => 'text',
				'label'      => __( 'Pinterest url', 'martanda' ),
				'section'    => 'martanda_layout_sidecontent',
				'settings'   => 'martanda_settings[socials_pinterest_url]',
				'priority' 	 => 17
			)
		);
		
		$wp_customize->add_setting(
			'martanda_settings[socials_linkedin_url]',
			array(
				'default' => $defaults['socials_linkedin_url'],
				'type' => 'option',
				'sanitize_callback' => 'esc_url',
			)
		);

		$wp_customize->add_control(
			'martanda_settings[socials_linkedin_url]',
			array(
				'type' 		 => 'text',
				'label'      => __( 'Linkedin url', 'martanda' ),
				'section'    => 'martanda_layout_sidecontent',
				'settings'   => 'martanda_settings[socials_linkedin_url]',
				'priority' 	 => 18
			)
		);
		
		$wp_customize->add_setting(
			'martanda_settings[socials_linkedin_url]',
			array(
				'default' => $defaults['socials_linkedin_url'],
				'type' => 'option',
				'sanitize_callback' => 'esc_url',
			)
		);

		$wp_customize->add_control(
			'martanda_settings[socials_linkedin_url]',
			array(
				'type' 		 => 'text',
				'label'      => __( 'Linkedin url', 'martanda' ),
				'section'    => 'martanda_layout_sidecontent',
				'settings'   => 'martanda_settings[socials_linkedin_url]',
				'priority' 	 => 19
			)
		);
		
		$wp_customize->add_setting(
			'martanda_settings[socials_mail_url]',
			array(
				'default' => $defaults['socials_mail_url'],
				'type' => 'option',
				'sanitize_callback' => 'esc_attr',
			)
		);

		$wp_customize->add_control(
			'martanda_settings[socials_mail_url]',
			array(
				'type' 		 => 'text',
				'label'      => __( 'E-mail url', 'martanda' ),
				'section'    => 'martanda_layout_sidecontent',
				'settings'   => 'martanda_settings[socials_mail_url]',
				'priority' 	 => 20
			)
		);

		$wp_customize->add_section(
			'martanda_general_section',
			array(
				'title' => __( 'General', 'martanda' ),
				'priority' => 50
			)
		);

		// Add back to top setting
		$wp_customize->add_setting(
			'martanda_settings[back_to_top]',
			array(
				'default' => $defaults['back_to_top'],
				'type' => 'option',
				'sanitize_callback' => 'martanda_sanitize_choices'
			)
		);

		// Add content control
		$wp_customize->add_control(
			'martanda_settings[back_to_top]',
			array(
				'type' => 'select',
				'label' => __( 'Back to Top Button', 'martanda' ),
				'section' => 'martanda_general_section',
				'choices' => array(
					'enable' => __( 'Enable', 'martanda' ),
					'' => __( 'Disable', 'martanda' )
				),
				'settings' => 'martanda_settings[back_to_top]',
				'priority' => 50
			)
		);
		
		// Add info for menu
		$wp_customize->add_section( 'nav_menus_how_to_use', array(
			'title' => __( 'How to use Menu', 'martanda' ),
			'panel' => 'nav_menus',
			'priority'    => 5
		) );
	
		$wp_customize->add_control(
			new Martanda_Customize_Misc_Control(
				$wp_customize,
				'nav_menus_how_to_use_desc',
				array(
					'section' => 'nav_menus_how_to_use',
					'type' => 'addon',
					'label' => __( 'More info', 'martanda' ),
					'description' => __( 'The theme uses template parts. You can add Your menu at Appearance-> Template Parts admin menu. For more details check the documentation.', 'martanda' ),
					'url' => esc_url( martanda_menu_docs_link() ),
					'priority' => 10,
					'settings' => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname'
				)
			)
		);

		// Add Martanda Premium section
		if ( ! defined( 'MARTANDA_PREMIUM_VERSION' ) ) {
			$wp_customize->add_section(
				new Martanda_Upsell_Section( $wp_customize, 'martanda_upsell_section',
					array(
						'pro_text' => __( 'Get Premium for more!', 'martanda' ),
						'pro_url' => esc_url( martanda_theme_uri_link() ),
						'capability' => 'edit_theme_options',
						'priority' => 555,
						'type' => 'martanda-upsell-section',
					)
				)
			);
		}
	}
}