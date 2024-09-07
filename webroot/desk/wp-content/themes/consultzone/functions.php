<?php
/**
 * Theme functions and definitions
 *
 * @package ConsultZone
 */

/**
 * After setup theme hook
 */
function consultzone_theme_setup(){
    /*
     * Make child theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'consultzone', get_stylesheet_directory() . '/languages' );	
	require get_stylesheet_directory() . '/inc/customizer/consultzone-customizer-options.php';
}
add_action( 'after_setup_theme', 'consultzone_theme_setup' );

/**
 * Load assets.
 */

function consultzone_theme_css() {
	wp_enqueue_style( 'consultzone-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('consultzone-child-style', get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style('consultzone-default-css', get_stylesheet_directory_uri() . "/assets/css/theme-default.css" );	
}
add_action( 'wp_enqueue_scripts', 'consultzone_theme_css', 99);

/**
 * Import Options From Parent Theme
 *
 */
function consultzone_parent_theme_options() {
	$consultstreet_mods = get_option( 'theme_mods_consultstreet' );
	if ( ! empty( $consultstreet_mods ) ) {
		foreach ( $consultstreet_mods as $consultstreet_mod_k => $consultstreet_mod_v ) {
			set_theme_mod( $consultstreet_mod_k, $consultstreet_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'consultzone_parent_theme_options' );

/**
 * Fresh site activate
 *
 */
$fresh_site_activate = get_option( 'fresh_consultzone_site_activate' );
if ( (bool) $fresh_site_activate === false ) {
	
	set_theme_mod( 'consultstreet_main_slider_overlay_disable', false );
	set_theme_mod( 'consultstreet_theme_color', 'theme-red' );
	set_theme_mod( 'consultstreet_service_icon_size', array('slider' => 4,'suffix' => 'rem',));
	set_theme_mod( 'consultstreet_slider_caption_layout', 'consultstreet_slider_caption_layout2');
	set_theme_mod( 'consultstreet_theme_info_layout', 'consultstreet_theme_info_layout2');
	set_theme_mod( 'consultstreet_service_layout', 'consultstreet_service_layout3');
	set_theme_mod( 'consultstreet_testimonial_layout', 'consultstreet_testimonial_layout2');
	set_theme_mod( 'consultstreet_blog_layout', 'consultstreet_blog_layout3' );
	
	update_option( 'fresh_consultzone_site_activate', true );
}

/**
 * Page header
 *
 */
function consultzone_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'consultzone_custom_header_args', array(
		'default-image'      => get_stylesheet_directory_uri().'/assets/img/page-header.jpg',
		'default-text-color' => '#000',
		'width'              => 1920,
		'height'             => 500,
		'flex-height'        => true,
		'flex-width'         => true,
		'wp-head-callback'   => 'consultzone_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'consultzone_custom_header_setup' );

/**
 * Custom background
 *
 */
function consultzone_custom_background_setup() {
	add_theme_support( 'custom-background', apply_filters( 'consultzone_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
add_action( 'after_setup_theme', 'consultzone_custom_background_setup' );

function consultzone_custom_customizer_options() { 
$consultstreet_main_slider_content_color = get_theme_mod('consultstreet_main_slider_content_color', '#fff');
?>
    <style type="text/css">
		<?php if($consultstreet_main_slider_content_color != null) : ?>
		.theme-main-slider.vrsn-two .theme-slider-content .title-large { color: <?php echo $consultstreet_main_slider_content_color; ?>;}
		.theme-main-slider.vrsn-two .theme-slider-content .description { color: <?php echo $consultstreet_main_slider_content_color; ?>;}
		<?php endif; ?>
   </style>
<?php }
add_action('wp_footer','consultzone_custom_customizer_options');


if ( ! function_exists( 'consultzone_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see consultzone_custom_header_setup().
	 */
	function consultzone_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			<?php
			// Has the text been hidden?
			if ( ! display_header_text() ) :
				?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php
			// If the user has set a custom color for the text use that.
			else :
				?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?> !important;
			}

			<?php endif; ?>
		</style>
		<?php
	}
endif;