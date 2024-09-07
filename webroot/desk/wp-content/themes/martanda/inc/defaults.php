<?php
/**
 * Sets all of our theme defaults.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'martanda_get_defaults' ) ) {
	/**
	 * Set default options
	 *
	 */
	function martanda_get_defaults() {
		$martanda_defaults = array(
			'fixed_side_content' => '',
			'socials_facebook_url' => '',
			'socials_twitter_url' => '',
			'socials_instagram_url' => '',
			'socials_youtube_url' => '',
			'socials_tiktok_url' => '',
			'socials_twitch_url' => '',
			'socials_tumblr_url' => '',
			'socials_pinterest_url' => '',
			'socials_linkedin_url' => '',
			'socials_custom_icon_1' => '',
			'socials_custom_icon_2' => '',
			'socials_custom_icon_3' => '',
			'socials_custom_icon_url_1' => '',
			'socials_custom_icon_url_2' => '',
			'socials_custom_icon_url_3' => '',
			'socials_mail_url' => '',
			'button_border_style' => 'solid',
			'button_border' => '1',
			'button_radius' => '0',
			'button_rotate' => '0',
			'back_to_top' => 'enable',
			'top_bar_mobile' => 'show',
			'sticky_header' => 'enable',
			'disable_site_info' => 'enable',
			'stylish_scrollbar' => 'enable',
			'image_cursor' => 'disable',
			'def_cursor_image' => '',
			'pointer_cursor_image' => '',
			'text_color' => '#000000',
			'link_color' => '#000000',
			'link_color_hover' => '#333333',
			'side_inside_color' => '',
			'header_background_color' => '#000000',
			'header_text_color' => '#ffffff',
			'header_link_color' => '#ffffff',
			'header_link_hover_color' => '#dddddd',
			'sticky_header_background_color' => '#000000',
			'site_title_color' => '#ffffff',
			'navigation_background_color' => '',
			'navigation_text_color' => '#ffffff',
			'navigation_background_hover_color' => '',
			'navigation_text_hover_color' => '#dddddd',
			'navigation_background_current_color' => '',
			'navigation_text_current_color' => '#ffffff',
			'subnavigation_background_color' => '#000000',
			'subnavigation_text_color' => '#ffffff',
			'subnavigation_background_hover_color' => '#000000',
			'subnavigation_text_hover_color' => '#dddddd',
			'subnavigation_background_current_color' => '',
			'subnavigation_text_current_color' => '',
			'form_button_background_color' => '#ffffff',
			'form_button_background_color_hover' => '#000000',
			'form_button_text_color' => '#000000',
			'form_button_text_color_hover' => '#ffffff',
			'form_button_border_color' => '#000000',
			'form_button_border_color_hover' => '#000000',
			'fixed_side_content_background_color' => '#000000',
			'fixed_side_content_text_color' => '#ffffff',
			'fixed_side_content_link_color' => '#ffffff',
			'fixed_side_content_link_hover_color' => '#dddddd',
			'back_to_top_background_color' => 'rgba(0,0,0,0.7)',
			'back_to_top_background_color_hover' => '#000000',
			'back_to_top_text_color' => '#ffffff',
			'back_to_top_text_color_hover' => '#ffffff',
			'form_background_color' => '#ffffff',
			'form_text_color' => '#000000',
			'form_background_color_focus' => '#000000',
			'form_text_color_focus' => '#ffffff',
			'form_border_color' => '#000000',
			'form_border_color_focus' => '#000000',
			'footer_background_color' => '#000000',
			'footer_text_color' => '#ffffff',
			'footer_link_color' => '#ffffff',
			'footer_link_hover_color' => '#dddddd',
			'scrollbar_track_color' => '#000000',
			'scrollbar_thumb_color' => '#ffffff',
			'scrollbar_thumb_hover_color' => '#eeeeee',
			'wc_sale_sticker_background' => '#000000',
			'wc_sale_sticker_text' => '#ffffff',
			'wc_price_color' => '#000000',
			'wc_product_tab' => '#333333',
			'wc_product_tab_highlight' => '#000000',
			'enable_content_width' => 'disable',
			'container_width' => '1170',
			'content_top' => '2',
			'content_right' => '4',
			'content_bottom' => '2',
			'content_left' => '4',
			'mobile_content_top' => '2',
			'mobile_content_right' => '2',
			'mobile_content_bottom' => '2',
			'mobile_content_left' => '2',
			'fixed_side_margin_top' => '200',
			'fixed_side_margin_right'=> '0',
			'fixed_side_margin_bottom' => '0',
			'fixed_side_margin_left' => '0',
			'fixed_side_top' => '8',
			'fixed_side_right' => '7',
			'fixed_side_bottom' => '8',
			'fixed_side_left' => '5',
			'fixed_side_display_mobile' => false,
			'button_top' => '10',
			'button_right' => '25',
			'button_bottom' => '8',
			'button_left' => '25',
			'side_top' => '10',
			'side_right' => '10',
			'side_bottom' => '10',
			'side_left' => '10',
			'mobile_side_top' => '0',
			'mobile_side_right' => '0',
			'mobile_side_bottom' => '0',
			'mobile_side_left' => '0',
			'side_padding_radius' => '0',
			'font_body' => 'inherit',
			'font_body_category' => '',
			'font_body_variants' => '',
			'body_font_weight' => '400',
			'body_font_transform' => 'none',
			'body_font_size' => '19',
			'body_line_height' => '1.3', // no unit
			'font_site_title' => 'inherit',
			'font_site_title_category' => '',
			'font_site_title_variants' => '',
			'site_title_font_weight' => '700',
			'site_title_font_transform' => 'uppercase',
			'site_title_font_size' => '50',
			'mobile_site_title_font_size' => '25',
			'font_navigation' => 'inherit',
			'font_navigation_category' => '',
			'font_navigation_variants' => '',
			'navigation_font_weight' => '700',
			'navigation_font_transform' => 'none',
			'navigation_font_size' => '20',
			'tablet_navigation_font_size' => '18',
			'mobile_navigation_font_size' => '12',
			'font_buttons' => 'inherit',
			'font_buttons_category' => '',
			'font_buttons_variants' => '',
			'buttons_font_weight' => '700',
			'buttons_font_transform' => 'none',
			'buttons_font_size' => '19',
			'font_heading_1' => 'inherit',
			'font_heading_1_category' => '',
			'font_heading_1_variants' => '',
			'heading_1_weight' => '600',
			'heading_1_transform' => 'none',
			'heading_1_font_size' => '60',
			'heading_1_line_height' => '1.2', // em
			'mobile_heading_1_font_size' => '30',
			'font_heading_2' => 'inherit',
			'font_heading_2_category' => '',
			'font_heading_2_variants' => '',
			'heading_2_weight' => '600',
			'heading_2_transform' => 'none',
			'heading_2_font_size' => '32',
			'heading_2_line_height' => '1.2', // em
			'mobile_heading_2_font_size' => '25',
			'font_heading_3' => 'inherit',
			'font_heading_3_category' => '',
			'font_heading_3_variants' => '',
			'heading_3_weight' => '600',
			'heading_3_transform' => 'none',
			'heading_3_font_size' => '25',
			'heading_3_line_height' => '1.2', // em
			'font_heading_4' => 'inherit',
			'font_heading_4_category' => '',
			'font_heading_4_variants' => '',
			'heading_4_weight' => 'normal',
			'heading_4_transform' => 'none',
			'heading_4_font_size' => '20',
			'heading_4_line_height' => '1', // em
			'font_heading_5' => 'inherit',
			'font_heading_5_category' => '',
			'font_heading_5_variants' => '',
			'heading_5_weight' => 'normal',
			'heading_5_transform' => 'none',
			'heading_5_font_size' => '20',
			'heading_5_line_height' => '1', // em
			'font_heading_6' => 'inherit',
			'font_heading_6_category' => '',
			'font_heading_6_variants' => '',
			'heading_6_weight' => 'normal',
			'heading_6_transform' => 'none',
			'heading_6_font_size' => '20',
			'heading_6_line_height' => '1', // em
			'font_footer' => 'inherit',
			'font_footer_category' => '',
			'font_footer_variants' => '',
			'footer_weight' => '600',
			'footer_transform' => 'none',
			'footer_font_size' => '18',
			'font_fixed_side' => 'inherit',
			'font_fixed_side_category' => '',
			'font_fixed_side_variants' => '',
			'fixed_side_font_weight' => '700',
			'fixed_side_font_transform' => 'none',
			'fixed_side_font_size' => '22',
			'form_padding_top' => '0.8rem',
			'form_padding_right' => '1rem',
			'form_padding_bottom' => '0.8rem',
			'form_padding_left' => '1rem',
			'form_border_radius' => '0px',
			'form_border_width' => '2px',
			'form_border_style' => 'solid',
			'form_checkbox_size' => '30px',
			'form_checkbox_innersize' => '18px',
			'form_checkbox_padding' => '4px',
			'form_checkbox_bordersize' => '2px',
			'scrollbar_width' => '12px',
			'scrollbar_radius' => '3px',
		);

		return apply_filters( 'martanda_option_defaults', $martanda_defaults );
	}
}



if ( ! function_exists( 'martanda_get_default_color_palettes' ) ) {
	/**
	 * Set up our colors for the color picker palettes and filter them so you can change them.
	 *
	 */
	function martanda_get_default_color_palettes() {
		$palettes = array(
			'#ffffff',
			'#eeeeee',
			'#dddddd',
			'#333333',
			'#222222',
			'#000000'
		);

		return apply_filters( 'martanda_default_color_palettes', $palettes );
	}
}

if ( ! function_exists( 'martanda_typography_default_fonts' ) ) {
	/**
	 * Set the default system fonts.
	 *
	 */
	function martanda_typography_default_fonts() {
		$fonts = array(
			'inherit'
		);

		return apply_filters( 'martanda_typography_default_fonts', $fonts );
	}
}
