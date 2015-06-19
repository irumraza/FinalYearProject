<?php
/**
 * Nabia init functions
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 */

/**
 * Set up the content width value based on the theme's design.
 *
 * @link http://codex.wordpress.org/Content_Width
 * @since Nabia v 1.0
 */
if ( ! isset( $content_width ) ) {
    $content_width = 720;
}

/**
 * Nabia setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Nabia 1.0
 */
function nabia_setup() {

	// Make Nabia available for translation.
	load_theme_textdomain( 'nabia', get_template_directory() . '/languages' );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare thumbnail sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'nabia-grid', 260, 200, true );
	add_image_size( 'nabia-big-thumb', 555, 305, true );

	// Nabia theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'nabia' ),
		'footer' 	=> __('Footer Menu', 'nabia')
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery', 'chat', 'status',
	) );

	// Nabia theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'nabia_custom_background_args', array(
		'default-color'          => 'f5f5f5',
        'default-image'          => get_template_directory_uri() . '/images/default_bg.png',
        'default-repeat'         => 'repeat',
        'default-position-x'     => 'left',        
		'wp-head-callback'       => 'nabia_custom_bg'
	) ) );

	// Add support for custom header
	$defaults = array(
		'default-image'          => get_template_directory_uri() . '/images/header.jpg',
		'random-default'         => false,
		'width'                  => 1185,
		'height'                 => 250,
		'flex-height'            => false,
		'flex-width'             => false,
		'default-text-color'     => 'fff',
		'header-text'            => true,
		'uploads'                => true,
		'wp-head-callback'       => 'nabia_custom_header',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $defaults );
}
add_action( 'after_setup_theme', 'nabia_setup' );

/**
* Set customizer default values.
*
* A function to store customizer default values into an array.
* 
* @return array An array of customizer default values
*
* @since Nabia 1.0
*/
if( !function_exists('nabia_customizer_defaults') ) {
    function nabia_customizer_defaults() {

        $defaults = array(
                'nabia_menu_style' => 'centered-pills',
                'nabia_menu_tabs_align' => 'navbar-right',
                'nabia_menu_brand' => 'initial',
                'nabia_logo_image_url' => get_template_directory_uri() . '/images/logo.png',
                'nabia_favicon_image' => '',
                'nabia_header_radius' => '0',
                'nabia_header_border_width' => '0',
                'nabia_posts_wow_animation' => 'none',
                'nabia_front_content_display' => 'excerpt',
                'nabia_bcrumbs_display' => 0,
                'nabia_post_format_icons' => 'format-icon-enabled',
                'nabia_color_scheme' => 'orange',
                'nabia_header_bg_color' => '#111111',
                'nabia_header_border_color' => '#ffffff',
                'nabia_body_txt_color' => '#333333',
                'nabia_body_link_color' => '#E67230',
                'nabia_body_link_hover_color' => '#1997D7',
                'nabia_ficons_color' => '#E67230',
                'nabia_audioplayer_color' => '#E67230',
                'nabia_buttons_bg_color' => '#E67230',
                'nabia_buttons_text_color' => '#ffffff',
                'nabia_buttons_border_color' => '#C85412',
                'nabia_menu_bg_color' => '#141517',
                'nabia_menu_border_color' => '#111111',
                'nabia_menu_tabs_bg_color' => '#141517',
                'nabia_disabled_text_color' => '#e6e6e6',
                'nabia_menu_divider_color' => '#e6e6e6',
                'nabia_submenu_bottom_border' => '#EB6B22',
                'nabia_menu_text_color' => '#e6e6e6',
                'nabia_menu_tab_hover' => '#EB6B22',
                'nabia_submenu_tab_hover' => '#EB6B22',
                'nabia_submenu_bg_color' => '#191919',
                'nabia_carousel_bg_image' => get_template_directory_uri() . '/images/separator.png',
                'nabia_carousel_bg_color' => '#111111',
                'nabia_carousel_item_hover' => '#111111',
                'nabia_bcrumbs_bg_color' => '#111111',
                'nabia_bcrumbs_txt_color' => '#dddddd',
                'nabia_bcrumbs_link_color' => '#F48A4C',
                'nabia_sidebar_bg_img' => get_template_directory_uri() . '/images/separator.png',
                'nabia_sidebar_bg_color' => '#111111',
                'nabia_transparent_sidebar_bg' => 0,
                'nabia_widget_bg_color' => '#161616',
                'nabia_transparent_widget_bg' => 0,
                'nabia_remove_widget_padding' => 0,
                'nabia_widget_title_color' => '#F48A4C',
                'nabia_widget_icons_color' => '#3F3F3F',
                'nabia_sidebar_text_color' => '#BFBFBF',
                'nabia_sidebar_link_color' => '#b0c4de',
                'nabia_footer_bg_img' => get_template_directory_uri() . '/images/footer_bg.png',
                'nabia_footer_bg_img_repeat' => 'repeat',
                'nabia_footer_bg_color' => '#191a1c',
                'nabia_footer_txt_color' => '#a8acad',
                'nabia_footer_link_color' => '#ffffff',
                'nabia_footer_widget_title' => '#E67230',
                'nabia_footer_border_color' => '#E67230',
                'nabia_footerw_border_color' => '#E67230',
                'nabia_footer_bottom_bg_color' => '#0C0C0C',
                'nabia_footer_bottom_text_color' => '#e6e6e6',
                'nabia_footer_bottom_link_color' => '#ffffff',
                'nabia_body_font_family' => 'Noto Sans',
                'nabia_widget_titles_font_family' => 'Roboto',
                'nabia_post_titles_font_family' => 'Roboto Condensed',
                'nabia_menu_font_family' => 'Roboto',
                'nabia_carousel_status' => 'disabled',
                'nabia_carousel_content' => 'individual_posts',
                'nabia_carousel_category' => '',
                'nabia_carousel_autoplay' => 'true',
                'nabia_carousel_stoponhover' => 'true',
                'nabia_carousel_navigation' => 'true',
                'nabia_carousel_pagination' => 'false',
                'nabia_carousel_mousedrag' => 'true',
                'nabia_carousel_touchdrag' => 'true',
                'nabia_footer_copyright' => '',
                'nabia_sgpost_link_title' => 1,
                'nabia_sgpost_thumbnail' => 1,
                'nabia_sgpost_navigation' => 1,
                'nabia_sgpost_related' => 1,
                'nabia_sgpost_fontsize' => 1,
                'nabia_sgpost_alp' => 1,
                'header_textcolor' => '#ffffff',
                'nabia_link_logo_to_home' => 1,
                'background_repeat' => 'repeat',
                'background_position_x' => 'left',
                'background_attachment' => 'fixed'
            );

        return $defaults;
    }
}

/**
* Get customizer option & default value.
*
* A function to get default values from customizer settings.
* This will be used instead WordPress get_theme_mod function.
* 
* @param $key . Customizer setting id.
*
* @return string Customizer setting value and its default.
*
* @since Nabia 1.0
*/
if( !function_exists('nabia_theme_mod') ) {
    function nabia_theme_mod( $key ) {

        $defaults = nabia_customizer_defaults();
        
        $default_value = array_key_exists( $key, $defaults ) ? $defaults[ $key ] : false;

        return get_theme_mod( $key, $default_value ); 
    }
}

/**
* Nabia custom header image / color callback
*
* A callback function to allow post author to override the default header image/color set in customizer.
* Each post/page can have a unique header image/color.
* Data is stored in post meta fields.
*
* @since Nabia 1.0
*/
if(!function_exists('nabia_custom_header')) {
    function nabia_custom_header() {
        global $post;
        // Custom header
        $header_img = get_header_image();

        // Custom header color for single posts & pages
        $header_bg_color = false;

        if( is_singular( array('post', 'page') ) && get_post_meta( $post->ID, 'nabia_cmb_post_hbgcolor', true ) ) {
            $header_bg_color = get_post_meta( $post->ID, 'nabia_cmb_post_hbgcolor', true );
        } else {
            $header_bg_color = nabia_theme_mod('nabia_header_bg_color');
        }

        $header_css = false;
        // Custom header for single posts & pages
        if( is_singular( array('post', 'page') ) && get_post_meta( $post->ID, 'nabia_cmb_post_himg', true ) ) {
            $header_css .= '.header-background { background:url(' . get_post_meta( $post->ID, 'nabia_cmb_post_himg', true) . ') '. $header_bg_color .'; }'; 
        } else { // Is not a single post, page or doesn't have a custom header image uploaded
            // Check if a general custom image exists
            if( $header_img ) {
                // Use the general header image
                $header_css .= '.header-background { background:url(' . $header_img . ') '. $header_bg_color .'; }';
            } else {
                // No custom header image exists. Use a background color.
                $header_css .= '.header-background { background-color: '. $header_bg_color .';';
            }
        } ?>
        <style type="text/css">
        <?php echo esc_attr( $header_css ); ?>
        </style>
    <?php
    }
}

/**
* Nabia custom background image / color callback
*
* A callback function to allow post author to override the default background image/color set in customizer.
* Each post/page can have a unique background image/color.
* Data is stored in post meta fields.
*
* @since Nabia 1.0
*/
if(!function_exists('nabia_custom_bg')) {
    function nabia_custom_bg() {
        global $post;

    	if( is_singular(array('post', 'page')) && get_post_meta( $post->ID, 'nabia_cmb_post_bimg', true) ) {
    		$background = get_post_meta( $post->ID, 'nabia_cmb_post_bimg', true);
    	} else {
        	$background = get_background_image();
    	}
    	if( is_singular(array('post', 'page')) && get_post_meta( $post->ID, 'nabia_cmb_post_bg_color', true) ) {
    		$color = get_post_meta($post->ID, 'nabia_cmb_post_bg_color', true);
    	} else {
        	$color = get_background_color();
     	}

        if ( ! $background && ! $color )
            return;
     
     	if( is_singular(array('post', 'page')) && get_post_meta( $post->ID, 'nabia_cmb_post_bg_color', true) ) {
     		$style = $color ? "background-color: $color;" : '';
     	} else {
        	$style = $color ? "background-color: #$color;" : '';
     	}
     
        if ( $background ) {
            $image = " background-image: url($background);";
     

     		if( is_singular(array('post', 'page')) && get_post_meta( $post->ID, 'nabia_cmb_post_bg_repeat', true) ) {
     			$repeat = get_post_meta( $post->ID, 'nabia_cmb_post_bg_repeat', true);
     		} else {
            	$repeat = nabia_theme_mod( 'background_repeat' );
     		}

            if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
                $repeat = 'repeat';
     
            $repeat = " background-repeat: $repeat;";
     
            if( is_singular(array('post', 'page')) && get_post_meta( $post->ID, 'nabia_cmb_post_bg_position', true) ) {
            	$position = get_post_meta( $post->ID, 'nabia_cmb_post_bg_position', true);
            } else {
            	$position = nabia_theme_mod( 'background_position_x' );
            }
     
            if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
                $position = 'left';
     
            $position = " background-position: top $position;";
     
     		if( is_singular(array('post', 'page')) && get_post_meta( $post->ID, 'nabia_cmb_post_bg_attachament', true) ) {
     			$attachment = get_post_meta( $post->ID, 'nabia_cmb_post_bg_attachament', true);
     		} else {
            	$attachment = nabia_theme_mod( 'background_attachment' );
     		}
     
            if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
                $attachment = 'scroll';
     
            $attachment = " background-attachment: $attachment;";
     
            $style .= $image . $repeat . $position . $attachment;
        }
    	?>
    	<style type="text/css">
    	body.custom-background { <?php echo esc_attr( $style ); ?> }
    	</style>

    <?php
    }
}

/**
 * @package    TGM-Plugin-Activation
 * @version    2.4.0
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
function nabia_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'Jetpack',
            'slug'      => 'jetpack',
            'required'  => false,
        ),
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),

    );

    $config = array(
        'id'           => 'nabia',                 // Unique ID for hashing notices for multiple instances of nabia.
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'nabia-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'nabia' ),
            'menu_title'                      => __( 'Install Plugins', 'nabia' ),
            'installing'                      => __( 'Installing Plugin: %s', 'nabia' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'nabia' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'nabia' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'nabia' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'nabia' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'nabia' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'nabia' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'nabia' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'nabia' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'nabia' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'nabia' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'nabia' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'nabia' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'nabia' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'nabia' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'nabia_register_required_plugins' );
?>