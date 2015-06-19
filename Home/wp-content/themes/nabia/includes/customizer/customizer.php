<?php 
/**
 * Contains methods for customizing the theme customization screen.
 * 
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since Nabia 1.0
 */

class Nabia_Customize {
   
   /**
    * This hooks into 'customize_register' (available as of WP 3.4) and allows
    * you to add new sections and controls to the Theme Customize screen.
    * 
    * Note: To enable instant preview, we have to actually write a bit of custom
    * javascript. See live_preview() for more.
    *  
    * @see add_action('customize_register',$func)
    * @param \WP_Customize_Manager $wp_customize
    * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
    * @since Nabia 1.0
    */
    public static function register ( $wp_customize ) {

   		// Include customizer custom controls
		require( NABIA_INC_DIR . 'customizer/custom_controls.php' );
		require( NABIA_INC_DIR . 'customizer/sanitization.php' );

		/* =========================================================== */
		/* Menu */
		/* =========================================================== */
	 	// Menu style     
		$wp_customize->add_setting('nabia_menu_style', array( 
			'default'    => 'centered-pills',
			'type'       => 'theme_mod',
			'sanitize_callback' => 'sanitize_key',
			'capability' => 'edit_theme_options',
			//'transport' => 'postMessage'
		));	
		$wp_customize->add_control('nabia_menu_style', array( 
			'label'    => __('Main Menu style', 'nabia'),
			'section'  => 'nav',
			'type'     => 'select',
			'priority' => 2,
			'choices'  => array(
				'centered-pills' => __('Centered', 'nabia'),
				'navbar-static-top' => __('Full Width', 'nabia')
				)
	 	));
		// Tabs align for fixed and static menu styles
		$wp_customize->add_setting('nabia_menu_tabs_align', array( 
			'default'    => 'navbar-right',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			//'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_key'
		));	
		$wp_customize->add_control('nabia_menu_tabs_align', array( 
			'label'    => __('Menu tabs align', 'nabia'),
			'section'  => 'nav',
			'type'     => 'select',
			'priority' => 3,
			'choices'  => array(
				'navbar-left' => __('Left', 'nabia'),
				'navbar-right' => __('Right', 'nabia')
				)
	 	));
		$wp_customize->add_setting('nabia_menu_brand', array( 
			'default'    => 'initial',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_key'
		));	
		$wp_customize->add_control('nabia_menu_brand', array( 
			'label'    => __('Display home icon for full width menu', 'nabia'),
			'section'  => 'nav',
			'type'     => 'select',
			'priority' => 4,
			'choices' => array(
				'initial' => 'Display',
				'none' => 'Hide'
				)
	 	));

  		/* =========================================================== */
  		/* Site title & Tagline */
  		/* =========================================================== */
		// Logo image
		$wp_customize->add_setting('nabia_logo_image_url', array(
			'default' => get_template_directory_uri() . '/images/logo.png',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
			//'transport' => 'postMessage'
		));
		
		$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'nabia_logo_image_url', array(
			'label' => __('Logo image', 'nabia'),
			'section' => 'title_tagline',
			'settings' => 'nabia_logo_image_url',
		)));

		// Favicon
		$wp_customize->add_setting('nabia_favicon_image', array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
		));
		
		$wp_customize->add_control(new WP_Customize_Upload_Control( $wp_customize, 'nabia_favicon_image', array(
			'label' => __('Favicon image', 'nabia'),
			'section' => 'title_tagline',
			'settings' => 'nabia_favicon_image',
		)));

		// Link logo image to homepage
		$wp_customize->add_setting('nabia_link_logo_to_home', array( 
			'default'    => 1,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'nabia_sanitize_checkbox'
		 ));	
		$wp_customize->add_control('nabia_link_logo_to_home', array( 
			'label'    => __('Link logo image to homepage', 'nabia'),
			'section'  => 'title_tagline',
			'type'     => 'checkbox',
			'priority' => 2
	 	));

  		/* =========================================================== */
  		/* General Settings */
  		/* =========================================================== */
      	$wp_customize->add_section( 'nabia_general_settings', 
    		array(
	            'title' => __( 'General', 'nabia' ), //Visible title of section
	            'priority' => 35, //Determines what order this appears in
	            'capability' => 'edit_theme_options', //Capability needed to tweak
	            'description' => __('Customize general settings for Nabia theme', 'nabia'), //Descriptive tooltip
     		) 
      	);

		// Header radius
		$wp_customize->add_setting('nabia_header_radius', array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'nabia_sanitize_numbers'
		));
		
		$wp_customize->add_control(new Nabia_WP_Customize_Input_Number( $wp_customize, 'nabia_header_radius', array(
			'label' => __('Header radius (pixels)', 'nabia'),
			'section' => 'nabia_general_settings',
			'settings' => 'nabia_header_radius',
		)));
		
		// Header border width
		$wp_customize->add_setting('nabia_header_border_width', array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'nabia_sanitize_numbers'
		));
		
		$wp_customize->add_control(new Nabia_WP_Customize_Input_Number( $wp_customize, 'nabia_header_border_width', array(
			'label' => __('Header border width (pixels)', 'nabia'),
			'section' => 'nabia_general_settings',
			'settings' => 'nabia_header_border_width',
		)));

		// Wow animated effect
		$wp_customize->add_setting('nabia_posts_wow_animation', array( 
			'default'    => 'none',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			//'transport'  => 'postMessage',
			'sanitize_callback' => 'nabia_sanitize_animations'
		));
		
		$wp_customize->add_control('nabia_posts_wow_animation', array( 
			'label'    => __('Posts loading animation on page scroll', 'nabia'),
			'section'  => 'nabia_general_settings',
			'type'     => 'select',
			'priority' => 1,
			'choices'  => array(
				'none' => __('None', 'nabia'),
				'bounce' => 'Bounce',
				'flash' => 'Flash',
				'pulse' => 'Pulse',
				'rubberBand' => 'RubberBand',
				'shake' => 'Shake',
				'swing' => 'Swing',
				'tada' => 'Tada',
				'wobble' => 'Wobble',
				'bounceIn' => 'BounceIn',
				'bounceInDown' => 'BounceInDown',
				'bounceInLeft' => 'BounceInLeft',
				'bounceInRight' => 'BounceInRight',
				'bounceInUp' => 'BounceInUp',
				'fadeIn' => 'FadeIn',
				'fadeInDown' => 'FadeInDown',
				'fadeInDownBig' => 'FadeInDownBig',
				'fadeInLeft' => 'FadeInLeft',
				'fadeInLeftBig' => 'FadeInLeftBig',
				'fadeInRight' => 'FadeInRight',
				'fadeInRightBig' => 'FadeInRightBig',
				'fadeInUp' => 'FadeInUp',
				'fadeInUpBig' => 'FadeInUpBig',
				'flip' => 'Flip',
				'flipInX' => 'FlipInX',
				'flipInY' => 'FlipInY',
				'lightSpeedIn' => 'LightSpeedIn',
				'rotateIn' => 'RotateIn',
				'rotateInDownLeft' => 'RotateInDownLeft',
				'rotateInDownRight' => 'RotateInDownRight',
				'rotateInUpLeft' => 'RotateInUpLeft',
				'rotateInUpRight' => 'RotateInUpRight',
				'rollIn' => 'RollIn',
				'zoomIn' => 'ZoomIn',
				'zoomInDown' => 'ZoomInDown',
				'zoomInLeft' => 'ZoomInLeft',
				'zoomInRight' => 'ZoomInRight',
				'zoomInUp' => 'ZoomInUp'
			)
	 	));

	 	// Display content, excerpt or excerpt when excerpt field is not empty.      
		$wp_customize->add_setting('nabia_front_content_display', array( 
			'default'    => 'excerpt',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_key'
		 ));	
		$wp_customize->add_control('nabia_front_content_display', array( 
			'label'    => __('Content type for homepage posts', 'nabia'),
			'section'  => 'nabia_general_settings',
			'type'     => 'select',
			'priority' => 2,
			'choices'  => array(
				'content' => __('Content', 'nabia'),
				'excerpt' => __('Excerpt', 'nabia'),
				'content-excerpt' => __('Content-Excerpt', 'nabia')
				)
	 	));
	 	// Disable breadcrumbs
		$wp_customize->add_setting('nabia_bcrumbs_display', array( 
			'default'    => 0,
			//'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'nabia_sanitize_checkbox'
		));	
		$wp_customize->add_control('nabia_bcrumbs_display', array( 
			'label'    => __('Disable breadcrumbs navigation', 'nabia'),
			'section'  => 'nabia_general_settings',
			'type'     => 'select',
			'priority' => 3,
			'settings' => 'nabia_bcrumbs_display',
			'type'     => 'checkbox'
	 	));
		// Display or disable post format icons 
		$wp_customize->add_setting('nabia_post_format_icons', array( 
			'default'    => 'format-icon-enabled',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_key'
		));	
		$wp_customize->add_control('nabia_post_format_icons', array( 
			'label'    => __('Post format icons', 'nabia'),
			'section'  => 'nabia_general_settings',
			'type'     => 'radio',
			'priority' => 4,
			'settings' => 'nabia_post_format_icons',
			'type'     => 'radio',
			'choices'  => array(
					'format-icon-enabled' => __('Enabled', 'nabia'),
					'format-icon-disabled' => __('Disabled', 'nabia')
				)
	 	));
	 		 	  	      	
      	/* =========================================================== */
      	/* Colors settings */
      	/* =========================================================== */

		// General Section
		$wp_customize->add_setting('nabia_color_scheme_minisection', array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'type' => 'minisection',
			'sanitize_callback' => 'sanitize_text_field'
		));
		
		$wp_customize->add_control( new Nabia_WP_Customize_Minisection_Control( $wp_customize, 'nabia_color_scheme_minisection', array(
			'label' => __('Color schemes', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_color_scheme_minisection',
			'description' => __('Choose a predefined color scheme or choose CUSTOM to define your own colors.', 'nabia'),
			'priority' => 1,
		)));

		// Color scheme
		$wp_customize->add_setting('nabia_color_scheme', array( 
			'default'    => 'orange',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			//'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_key'
		));	
		$wp_customize->add_control('nabia_color_scheme', array( 
			'label'    => __('Choose the color scheme.', 'nabia'),
			'section'  => 'colors',
			'type'     => 'select',
			'priority' => 2,
			'choices'  => array(
				'custom' => __('Custom', 'nabia'),
				'orange' => __('Orange', 'nabia'),
				'blue' => __('Blue', 'nabia'),
				'green' => __('Green', 'nabia'),
				'red' => __('Red', 'nabia'),
				'cherry' => __('Cherry', 'nabia'),
				)
	 	));

		// Header Section
		$wp_customize->add_setting('nabia_color_head_section', array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'type' => 'minisection',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control( new Nabia_WP_Customize_Minisection_Control( $wp_customize, 'nabia_color_head_section', array(
			'label' => __('Header colors', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_color_head_section',
			'description' => __('Customize the aspect of the header.', 'nabia'),
			'priority' => 3,
		)));

		// Header Background Color	 
		$wp_customize->add_setting('nabia_header_bg_color', array(
	        'default' => '#111111',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_header_bg_color',array(
			'label' => __('Header background color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_header_bg_color',
			'priority' => 5
		)));

		// Header Border Color	 
		$wp_customize->add_setting('nabia_header_border_color', array(
	        'default' => '#ffffff',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_header_border_color',array(
			'label' => __('Header border color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_header_border_color',
			'priority' => 6
		)));

		// Body Section
		$wp_customize->add_setting('nabia_color_body_section', array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'type' => 'minisection',
			'sanitize_callback' => 'sanitize_text_field'
		));
		
		$wp_customize->add_control( new Nabia_WP_Customize_Minisection_Control( $wp_customize, 'nabia_color_body_section', array(
			'label' => __('Body colors', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_color_body_section',
			'description' => __('Customize the aspect of the body elements & buttons.', 'nabia'),
			'priority' => 7
		)));
		// Body text color
		$wp_customize->add_setting('nabia_body_txt_color', array(
	        'default' => '#333333',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_body_txt_color',array(
			'label' => __('Body text color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_body_txt_color',
			'priority' => 8
		)));

		// Body links color
		$wp_customize->add_setting('nabia_body_link_color', array(
	        'default' => '#E67230',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_body_link_color',array(
			'label' => __('Body links color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_body_link_color',
			'priority' => 9
		)));

		// Body links color mouse hover
		$wp_customize->add_setting('nabia_body_link_hover_color', array(
	        'default' => '#1997D7',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_body_link_hover_color',array(
			'label' => __('Body links hover color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_body_link_hover_color',
			'priority' => 10
		)));

		// Post format icons color, audio player, buttons background
		$wp_customize->add_setting('nabia_ficons_color', array(
	        'default' => '#E67230',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_ficons_color',array(
			'label' => __('Post format icons color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_ficons_color',
			'priority' => 11
		)));

		// Audio player background
		$wp_customize->add_setting('nabia_audioplayer_color', array(
	        'default' => '#E67230',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_audioplayer_color',array(
			'label' => __('Audio player background', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_audioplayer_color',
			'priority' => 12
		)));

		// Buttons background color
		$wp_customize->add_setting('nabia_buttons_bg_color', array(
	        'default' => '#E67230',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_buttons_bg_color',array(
			'label' => __('Buttons background color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_buttons_bg_color',
			'priority' => 13
		)));

		// Buttons text color
		$wp_customize->add_setting('nabia_buttons_text_color', array(
	        'default' => '#FFFFFF',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_buttons_text_color',array(
			'label' => __('Buttons text color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_buttons_text_color',
			'priority' => 14
		)));

		// Buttons border color
		$wp_customize->add_setting('nabia_buttons_border_color', array(
	        'default' => '#C85412',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_buttons_border_color',array(
			'label' => __('Buttons border color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_buttons_border_color',
			'priority' => 15
		)));						

		// Menu colors
		// Menu Section
		$wp_customize->add_setting('nabia_color_menu_section', array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'type' => 'minisection',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control( new Nabia_WP_Customize_Minisection_Control( $wp_customize, 'nabia_color_menu_section', array(
			'label' => __('Menu colors', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_color_menu_section',
			'description' => __('Customize the aspect of the menu.', 'nabia'),
			'priority' => 16
		)));

		// Menu Background color
		$wp_customize->add_setting('nabia_menu_bg_color', array(
	        'default' => '#141517',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_menu_bg_color',array(
			'label' => __('Menu Background', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_menu_bg_color',
			'priority' => 17
		)));
		// Menu Border color
		$wp_customize->add_setting('nabia_menu_border_color', array(
	        'default' => '#111111',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_menu_border_color',array(
			'label' => __('Menu border', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_menu_border_color',
			'priority' => 18
		)));		
		// Menu tabs color
		$wp_customize->add_setting('nabia_menu_tabs_bg_color', array(
	        'default' => '#141517',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_menu_tabs_bg_color',array(
			'label' => __('Menu Tabs', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_menu_tabs_bg_color',
			'priority' => 19
		)));
		// Menu disabled links color
		$wp_customize->add_setting('nabia_disabled_text_color', array(
	        'default' => '#e6e6e6',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_disabled_text_color',array(
			'label' => __('Menu disabled text', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_disabled_text_color',
			'priority' => 20
		)));
		// Menu divider color
		$wp_customize->add_setting('nabia_menu_divider_color', array(
	        'default' => '#e6e6e6',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_menu_divider_color',array(
			'label' => __('Submenu divider color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_menu_divider_color',
			'priority' => 21
		)));
		// Submenu bottom border
		$wp_customize->add_setting('nabia_submenu_bottom_border', array(
	        'default' => '#EB6B22',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'mabia_submenu_bottom_border',array(
			'label' => __('Submenu border color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_submenu_bottom_border',
			'priority' => 22
		)));					
		// Menu text color
		$wp_customize->add_setting('nabia_menu_text_color', array(
	        'default' => '#e6e6e6',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_menu_text_color',array(
			'label' => __('Menu Text', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_menu_text_color',
			'priority' => 23
		)));
		// Menu active tab, hover, focus
		$wp_customize->add_setting('nabia_menu_tab_hover', array(
	        'default' => '#EB6B22',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_menu_tab_hover',array(
			'label' => __('Menu tab hover, active', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_menu_tab_hover',
			'priority' => 24
		)));		
		// SubMenu active tab, hover, focus
		$wp_customize->add_setting('nabia_submenu_tab_hover', array(
	        'default' => '#EB6B22',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_submenu_tab_hover',array(
			'label' => __('SubMenu tab hover, active', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_submenu_tab_hover',
			'priority' => 25
		)));
		// SubMenu background color
		$wp_customize->add_setting('nabia_submenu_bg_color', array(
	        'default' => '#191919',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_submenu_bg_color',array(
			'label' => __('SubMenu background', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_submenu_bg_color',
			'priority' => 26
		)));						

		// Featured carousel
		// Carousel Section
		$wp_customize->add_setting('nabia_color_carousel_section', array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'type' => 'minisection',
			'sanitize_callback' => 'sanitize_text_field'
		));
		
		$wp_customize->add_control( new Nabia_WP_Customize_Minisection_Control( $wp_customize, 'nabia_color_carousel_section', array(
			'label' => __('Featured carousel colors', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_color_carousel_section',
			'description' => __('Customize the aspect of the featured carousel.', 'nabia'),
			'priority' => 27
		)));

		// Carousel Background Image
		$wp_customize->add_setting('nabia_carousel_bg_image', array(
			'default' => get_template_directory_uri() . '/images/separator2.png',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
		));
		$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'nabia_carousel_bg_image', array(
			'label' => __('Carousel Background image.', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_carousel_bg_image',
			'priority' => 28
		)));

		// Carousel Background Color	 
		$wp_customize->add_setting('nabia_carousel_bg_color', array(
	        'default' => '#111111',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_carousel_bg_color',array(
			'label' => __('Carousel Background Color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_carousel_bg_color',
			'priority' => 29
		)));

		// Carousel item hover color	 
		$wp_customize->add_setting('nabia_carousel_item_hover', array(
	        'default' => '#111111',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_carousel_item_hover',array(
			'label' => __('Carousel item color hover', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_carousel_item_hover',
			'priority' => 30
		)));		
		
		// Breadcrumbs setction
		$wp_customize->add_setting('nabia_color_bcrumbs_section', array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'type' => 'minisection',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control( new Nabia_WP_Customize_Minisection_Control( $wp_customize, 'nabia_color_bcrumbs_section', array(
			'label' => __('Breadcrumbs colors', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_color_bcrumbs_section',
			'description' => __('Customize the aspect of the breadcrumbs.', 'nabia'),
			'priority' => 31
		)));

		// Breadcrumbs Background Color	 
		$wp_customize->add_setting('nabia_bcrumbs_bg_color', array(
	        'default' => '#111111',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_bcrumbs_bg_color',array(
			'label' => __('Breadcrumbs Background Color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_bcrumbs_bg_color',
			'priority' => 32
		)));
		// Breadcrumbs Text Color	 
		$wp_customize->add_setting('nabia_bcrumbs_txt_color', array(
	        'default' => '#dddddd',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_bcrumbs_txt_color',array(
			'label' => __('Breadcrumbs Text Color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_bcrumbs_txt_color',
			'priority' => 33
		)));
		// Breadcrumbs Links Color	 
		$wp_customize->add_setting('nabia_bcrumbs_link_color', array(
	        'default' => '#F48A4C',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_bcrumbs_link_color',array(
			'label' => __('Breadcrumbs Links Color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_bcrumbs_link_color',
			'priority' => 34
		)));						

		// Sidebar Mini Section
		$wp_customize->add_setting('nabia_sidebar_color_minisection', array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'type' => 'minisection',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control( new Nabia_WP_Customize_Minisection_Control( $wp_customize, 'nabia_sidebar_color_minisection', array(
			'label' => __('Sidebar colors.', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_sidebar_color_minisection',
			'description' => __('Customize the aspect of the sidebars.', 'nabia'),
			'priority' => 35
		)));	

		// Sidebar Background Image
		$wp_customize->add_setting('nabia_sidebar_bg_img', array(
			'default' => get_template_directory_uri() . '/images/separator2.png',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
		));
		
		$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'nabia_sidebar_bg_img', array(
			'label' => __('Sidebar Background image.', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_sidebar_bg_img',
			'priority' => 36
		)));

		// Sidebar Background Color	 
		$wp_customize->add_setting('nabia_sidebar_bg_color', array(
	        'default' => '#111111',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_sidebar_bg_color',array(
			'label' => __('Sidebar Background Color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_sidebar_bg_color',
			'priority' => 37
		)));

		// Sidebar Transparent Background
		$wp_customize->add_setting('nabia_transparent_sidebar_bg', array( 
			'default'    => 0,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'nabia_sanitize_checkbox'
		));	
		$wp_customize->add_control('nabia_transparent_sidebar_bg', array( 
			'label'    => __('Sidebar transparent background (overridden if a background image is set).', 'nabia'),
			'section'  => 'colors',
			'type'     => 'checkbox',
			'priority' => 38,
		));

		// Widget Area Background Color	 
		$wp_customize->add_setting('nabia_widget_bg_color', array(
	        'default' => '#161616',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_widget_bg_color',array(
			'label' => __('Widget background Color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_widget_bg_color',
			'priority' => 39
		)));

		// Widget Area Background Transparent 
		$wp_customize->add_setting('nabia_transparent_widget_bg', array( 
			'default'    => 0,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'nabia_sanitize_checkbox'
		));	
		$wp_customize->add_control('nabia_transparent_widget_bg', array( 
			'label'    => __('Transparent widget background', 'nabia'),
			'section'  => 'colors',
			'type'     => 'checkbox',
			'priority' => 40
	 	));

		// Remove Widget Area Padding 
		$wp_customize->add_setting('nabia_remove_widget_padding', array( 
			'default'    => 0,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'nabia_sanitize_checkbox'
		));	
		$wp_customize->add_control('nabia_remove_widget_padding', array( 
			'label'    => __('Remove widget area padding (useful when using same background as sidebar)', 'nabia'),
			'section'  => 'colors',
			'type'     => 'checkbox',
			'priority' => 41
	 	));

		// Widget title color 
		$wp_customize->add_setting('nabia_widget_title_color', array(
	        'default' => '#F48A4C',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_widget_title_color',array(
			'label' => __('Widget title color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_widget_title_color',
			'priority' => 42
		)));

		// Widget icons color	 
		$wp_customize->add_setting('nabia_widget_icons_color', array(
	        'default' => '#3F3F3F',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_widget_icons_color',array(
			'label' => __('Widget icons color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_widget_icons_color',
			'priority' => 43
		)));

		// Sidebar text color 
		$wp_customize->add_setting('nabia_sidebar_text_color', array(
	        'default' => '#BFBFBF',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_sidebar_text_color',array(
			'label' => __('Sidebar text color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_sidebar_text_color',
			'priority' => 44
		)));		

		// Sidebar links color 
		$wp_customize->add_setting('nabia_sidebar_link_color', array(
	        'default' => '#b0c4de',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_sidebar_link_color',array(
			'label' => __('Sidebar link color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_sidebar_link_color',
			'priority' => 45
		)));

		// Footer Section
		$wp_customize->add_setting('nabia_footer_color_section', array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'type' => 'minisection',
			'sanitize_callback' => 'sanitize_text_field'
		));
		
		$wp_customize->add_control( new Nabia_WP_Customize_Minisection_Control( $wp_customize, 'nabia_footer_color_section', array(
			'label' => __('Footer colors', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_footer_color_section',
			'description' => __('Customize the aspect of the footer.', 'nabia'),
			'priority' => 46
		)));

		// Footer background image
		$wp_customize->add_setting('nabia_footer_bg_img', array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
		));
		$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'nabia_footer_bg_img', array(
			'label' => __('Footer background image.', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_footer_bg_img',
			'priority' => 47
		)));

		// Footer background image repeat
		$wp_customize->add_setting('nabia_footer_bg_img_repeat', array( 
			'default'    => 'repeat',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_key'
		));
		$wp_customize->add_control('nabia_footer_bg_img_repeat', array( 
			'label'    => __('Background image repeat', 'nabia'),
			'section'  => 'colors',
			'type'     => 'select',
			'priority' => 48,
			'choices'  => array(
				'repeat' => __('Repeat', 'nabia'),
				'repeat-x' => __('Repeat-x', 'nabia'),
				'repeat-y' => __('Repeat-y', 'nabia'),
				'no-repeat' => __('No-Repeat', 'nabia')
			)
	 	));

		// Footer background color	 
		$wp_customize->add_setting('nabia_footer_bg_color', array(
	        'default' => '#191a1c',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_footer_bg_color',array(
			'label' => __('Footer background color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_footer_bg_color',
			'priority' => 49
		)));

		// Footer text color
		$wp_customize->add_setting('nabia_footer_txt_color', array(
	        'default' => '#a8acad',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_footer_txt_color',array(
			'label' => __('Footer text color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_footer_txt_color',
			'priority' => 50
		)));

		// Footer link color
		$wp_customize->add_setting('nabia_footer_link_color', array(
	        'default' => '#ffffff',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_footer_link_color',array(
			'label' => __('Footer links color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_footer_link_color',
			'priority' => 51
		)));

		// Footer widget title
		$wp_customize->add_setting('nabia_footer_widget_title', array(
	        'default' => '#E67230',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_footer_widget_title',array(
			'label' => __('Footer Widget title', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_footer_widget_title',
			'priority' => 52
		)));

		// Footer border
		$wp_customize->add_setting('nabia_footer_border_color', array(
	        'default' => '#E67230',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_footer_border_color',array(
			'label' => __('Footer border color', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_footer_border_color',
			'priority' => 53
		)));

		// Footer widgets title bottom border
		$wp_customize->add_setting('nabia_footerw_border_color', array(
	        'default' => '#E67230',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_footerw_border_color',array(
			'label' => __('Footer widgets title bottom border', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_footerw_border_color',
			'priority' => 54
		)));			

		// Footer bottom
		$wp_customize->add_setting('nabia_footer_bottom_bg_color', array(
	        'default' => '#0C0C0C',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_footer_bottom_bg_color',array(
			'label' => __('Footer bottom background', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_footer_bottom_bg_color',
			'priority' => 55
		)));

		// Footer bottom text color
		$wp_customize->add_setting('nabia_footer_bottom_text_color', array(
	        'default' => '#e6e6e6',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_footer_bottom_text_color',array(
			'label' => __('Footer bottom text', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_footer_bottom_text_color',
			'priority' => 56
		)));	

		// Footer bottom text color
		$wp_customize->add_setting('nabia_footer_bottom_link_color', array(
	        'default' => '#ffffff',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'	
	    ));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nabia_footer_bottom_link_color',array(
			'label' => __('Footer bottom links', 'nabia'),
			'section' => 'colors',
			'settings' => 'nabia_footer_bottom_link_color',
			'priority' => 57
		)));			
      	/* =========================================================== */
      	/* Font options */
      	/* =========================================================== */

      	$wp_customize->add_section( 'nabia_fonts_settings', 
    		array(
	            'title' => __( 'Fonts', 'nabia' ), //Visible title of section
	            'priority' => 36, //Determines what order this appears in
	            'capability' => 'edit_theme_options', //Capability needed to tweak
	            'description' => __('Customize Nabia fonts.', 'nabia'), //Descriptive tooltip
     		) 
      	);

		// Body Font
		$wp_customize->add_setting('nabia_body_font_family', array(
			'default' => 'Noto Sans',
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field'
		));
		
		$wp_customize->add_control(new Nabia_WP_Custom_Fonts( $wp_customize, 'nabia_body_font_family', array(
			'label' => __('Body Font.', 'nabia'),
			'section' => 'nabia_fonts_settings',
			'settings' => 'nabia_body_font_family',
		)));

		// Widget TItles Font
		$wp_customize->add_setting('nabia_widget_titles_font_family', array(
			'default' => 'Roboto',
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field'
		));
		
		$wp_customize->add_control(new Nabia_WP_Custom_Fonts( $wp_customize, 'nabia_widget_titles_font_family', array(
			'label' => __('Widget Titles Font.', 'nabia'),
			'section' => 'nabia_fonts_settings',
			'settings' => 'nabia_widget_titles_font_family',
		)));

		// Post Titles Font
		$wp_customize->add_setting('nabia_post_titles_font_family', array(
			'default' => 'Roboto Condensed',
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field'
		));
		
		$wp_customize->add_control(new Nabia_WP_Custom_Fonts( $wp_customize, 'nabia_post_titles_font_family', array(
			'label' => __('Post Titles Font.', 'nabia'),
			'section' => 'nabia_fonts_settings',
			'settings' => 'nabia_post_titles_font_family',
		)));

		// Menu Font
		$wp_customize->add_setting('nabia_menu_font_family', array(
			'default' => 'Roboto',
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field'
		));
		
		$wp_customize->add_control(new Nabia_WP_Custom_Fonts( $wp_customize, 'nabia_menu_font_family', array(
			'label' => __('Menu Font.', 'nabia'),
			'section' => 'nabia_fonts_settings',
			'settings' => 'nabia_menu_font_family',
		)));
	

      	/* =========================================================== */
      	/* Featured Carousel */
      	/* =========================================================== */

      	// Get categories
	    $categories = get_categories();
		$cats = array();
		$i = 0;
		foreach($categories as $category){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cats[$category->slug] = $category->name;
		}

		// Register section
		$wp_customize->add_section('nabia_carousel_settings', array(
			'title' => __('Featured Carousel', 'nabia'),
			'description' => __('Most carousel options cannot be previewed in customizer. This changes will take place after Save & Publish button is clicked.', 'nabia'),
			'priority' => 38,
		));

		$wp_customize->add_setting('nabia_carousel_status', array( 
			'default'    => 'disabled',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			//'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_key'
		 ));
		$wp_customize->add_control('nabia_carousel_status', array( 
			'label'    => __('Carousel status', 'nabia'),
			'section'  => 'nabia_carousel_settings',
			'type'     => 'select',
			'settings' => 'nabia_carousel_status',
			'priority' => 1,
			'choices'  => array(
					'enabled' => __('Enabled', 'nabia'),
					'disabled' => __('Disabled', 'nabia')
				)
		));

	 	// Choose what to be diplayed with the featured carousel
		$wp_customize->add_setting('nabia_carousel_content', array( 
			'default'    => 'individual_posts',
			'type'       => 'theme_mod',
			'capability' => 'manage_options',
			'sanitize_callback' => 'sanitize_key'
		));	
		$wp_customize->add_control('nabia_carousel_content', array( 
			'label'    => __('Display in featured carousel', 'nabia'),
			'section'  => 'nabia_carousel_settings',
			'type'     => 'select',
			'settings' => 'nabia_carousel_content',
			'priority' => 2,
			'choices'  => array(
					'individual_posts' => __('Individual posts', 'nabia'),
					'category' => __('Category', 'nabia')
				)
		 ));

		// Category Select
		$wp_customize->add_setting('nabia_carousel_category', array(
			'default'        => $default,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_key'			
		));
		$wp_customize->add_control( 'nabia_carousel_category', array(
			'settings' => 'nabia_carousel_category',
			'label'   => __('Select Category', 'nabia'),
			'section'  => 'nabia_carousel_settings',
			'type'    => 'select',
			'priority' => 3,
			'choices' => $cats,
		));

		// Autoplay	
		$wp_customize->add_setting('nabia_carousel_autoplay', array( 
			'default'    => 'true',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_key'
		));	
		$wp_customize->add_control('nabia_carousel_autoplay', array( 
			'label'    => __('Autoplay', 'nabia'),
			'section'  => 'nabia_carousel_settings',
			'type'     => 'select',
			'settings' => 'nabia_carousel_autoplay',
			'priority' => 4,
			'choices'  => array(
					'true' => __('True', 'nabia'),
					'false' => __('False', 'nabia')
				)
		));

		// Stop on hover
		$wp_customize->add_setting('nabia_carousel_stoponhover', array( 
			'default'    => 'true',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_key'
		));	
		$wp_customize->add_control('nabia_carousel_stoponhover', array( 
			'label'    => __('Stop On Hover', 'nabia'),
			'section'  => 'nabia_carousel_settings',
			'type'     => 'select',
			'settings' => 'nabia_carousel_stoponhover',
			'priority' => 5,
			'choices'  => array(
					'true' => __('True', 'nabia'),
					'false' => __('False', 'nabia')
				)
		));

		// Navigation
		$wp_customize->add_setting('nabia_carousel_navigation', array( 
			'default'    => 'true',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_key'
		));	
		$wp_customize->add_control('nabia_carousel_navigation', array( 
			'label'    => __('Navigation arrows', 'nabia'),
			'section'  => 'nabia_carousel_settings',
			'type'     => 'select',
			'settings' => 'nabia_carousel_navigation',
			'priority' => 6,
			'choices'  => array(
					'true' => __('True', 'nabia'),
					'false' => __('False', 'nabia')
				)
		));

		// Pagination
		$wp_customize->add_setting('nabia_carousel_pagination', array( 
			'default'    => 'false',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_key'
		));	
		$wp_customize->add_control('nabia_carousel_pagination', array( 
			'label'    => __('Pagination bullets', 'nabia'),
			'section'  => 'nabia_carousel_settings',
			'type'     => 'select',
			'settings' => 'nabia_carousel_pagination',
			'priority' => 7,
			'choices'  => array(
					'true' => __('Enabled', 'nabia'),
					'false' => __('Disabled', 'nabia')
				)
		));

		// Mouse drag	
		$wp_customize->add_setting('nabia_carousel_mousedrag', array( 
			'default'    => 'true',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_key'
		));	
		$wp_customize->add_control('nabia_carousel_mousedrag', array( 
			'label'    => __('Mouse events', 'nabia'),
			'section'  => 'nabia_carousel_settings',
			'type'     => 'select',
			'settings' => 'nabia_carousel_mousedrag',
			'priority' => 8,
			'choices'  => array(
					'true' => __('Enabled', 'nabia'),
					'false' => __('Disabled', 'nabia')
				)
		));

		// Touch drag
		$wp_customize->add_setting('nabia_carousel_touchdrag', array( 
			'default'    => 'true',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_key'
		));	
		$wp_customize->add_control('nabia_carousel_touchdrag', array( 
			'label'    => __('Touch events', 'nabia'),
			'section'  => 'nabia_carousel_settings',
			'type'     => 'select',
			'settings' => 'nabia_carousel_touchdrag',
			'priority' => 9,
			'choices'  => array(
					'true' => __('Enabled', 'nabia'),
					'false' => __('Disabled', 'nabia')
				)
		 ));

      	/* =========================================================== */
      	/* Footer settings */
      	/* =========================================================== */		

      	// Register section
		$wp_customize->add_section('nabia_footer_settings', array(
			'title' => __('Footer', 'nabia'),
			'priority' => 39,
		));
		 
		// Copyright text
		$wp_customize->add_setting('nabia_footer_copyright', array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control('nabia_footer_copyright', array(
			'label' => __('Footer Copyright', 'nabia'),
			'section' => 'nabia_footer_settings',
			'settings' => 'nabia_footer_copyright'
		));

      	/* =========================================================== */
      	/* Single post settings */
      	/* =========================================================== */

      	// Register section
		$wp_customize->add_section('nabia_single_post_settings', array(
			'title' => __('Single Post', 'nabia'),
			'priority' => 40,
		));

		// Link post title to post page
		$wp_customize->add_setting('nabia_sgpost_link_title', array(
			'default' => 1,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'nabia_sanitize_checkbox'
		));
		$wp_customize->add_control('nabia_sgpost_link_title', array(
			'label' => __('Link link single post title to post URL.', 'nabia'),
			'section' => 'nabia_single_post_settings',
			'settings' => 'nabia_sgpost_link_title',
			'type' => 'checkbox'
		));

		// Display Post Thumbnail
		$wp_customize->add_setting('nabia_sgpost_thumbnail', array(
			'default' => 1,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'nabia_sanitize_checkbox'
		));
		$wp_customize->add_control('nabia_sgpost_thumbnail', array(
			'label' => __('Display featured image for single post.', 'nabia'),
			'section' => 'nabia_single_post_settings',
			'settings' => 'nabia_sgpost_thumbnail',
			'type' => 'checkbox'
		));

		// Single Post Navigation
		$wp_customize->add_setting('nabia_sgpost_navigation', array(
			'default' => 1,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'nabia_sanitize_checkbox'
		));
		$wp_customize->add_control('nabia_sgpost_navigation', array(
			'label' => __('Enable fast post navigation.', 'nabia'),
			'section' => 'nabia_single_post_settings',
			'settings' => 'nabia_sgpost_navigation',
			'type' => 'checkbox'
		));

		// Related Posts
		$wp_customize->add_setting('nabia_sgpost_related', array(
			'default' => 1,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'nabia_sanitize_checkbox'
		));
		$wp_customize->add_control('nabia_sgpost_related', array(
			'label' => __('Display related posts.', 'nabia'),
			'section' => 'nabia_single_post_settings',
			'settings' => 'nabia_sgpost_related',
			'type' => 'checkbox'
		));

		// Font size
		$wp_customize->add_setting('nabia_sgpost_fontsize', array(
			'default' => 1,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'nabia_sanitize_checkbox'
		));
		$wp_customize->add_control('nabia_sgpost_fontsize', array(
			'label' => __('Display increase font size option. ', 'nabia'),
			'section' => 'nabia_single_post_settings',
			'settings' => 'nabia_sgpost_fontsize',
			'type' => 'checkbox'
		));

		// Author latest posts
		$wp_customize->add_setting('nabia_sgpost_alp', array(
			'default' => 1,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'nabia_sanitize_checkbox'
		));
		$wp_customize->add_control('nabia_sgpost_alp', array(
			'label' => __('Display author latest posts tab?. ', 'nabia'),
			'section' => 'nabia_single_post_settings',
			'settings' => 'nabia_sgpost_alp',
			'type' => 'checkbox'
		));		

      	//Change built-in settings by modifying properties.
      	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
      	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
      	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
      	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
      	$wp_customize->get_control( 'header_textcolor' )->priority  = 4;
      	// Sections order
      	$wp_customize->get_section( 'title_tagline' )->priority  = 1;
      	$wp_customize->get_section( 'header_image' )->priority  = 2;
      	$wp_customize->get_section( 'nav' )->priority  = 3;
      	$wp_customize->get_section( 'nabia_carousel_settings' )->priority  = 4;
      	$wp_customize->get_section( 'nabia_general_settings' )->priority  = 5;
      	$wp_customize->get_section( 'nabia_fonts_settings' )->priority  = 6;
      	$wp_customize->get_section( 'nabia_single_post_settings' )->priority  = 7;
      	$wp_customize->get_section( 'nabia_footer_settings' )->priority  = 8;
      	$wp_customize->get_section( 'colors' )->priority  = 9;
      	$wp_customize->get_section( 'background_image' )->priority  = 10;
      	$wp_customize->get_section( 'static_front_page' )->priority  = 11;
    }

    /**
     * This will output the custom WordPress settings to the live theme's WP head.
     * 
     * Used by hook: 'wp_head'
     * 
     * @see add_action('wp_head',$func)
     * @since Nabia 1.0
 	*/
   	public static function header_output() {
  		?>
      	<!--Customizer CSS--> 
      	<style type="text/css"> 

           	<?php
           	/* =========================== General ========================= */
          	// Header text color
          	self::generate_css('.site-description, .navbar-default .navbar-brand, .logo-container, .logo-container a, .logo-container a:visited', 'color', 'header_textcolor', '#');
           	// Header border radius
           	self::generate_css('.header-background', 'border-radius', 'nabia_header_radius', '', 'px');
           	// Header border width
           	$hborder_color = nabia_theme_mod('nabia_header_border_color');
           	self::generate_css('.header-background', 'border', 'nabia_header_border_width', '', 'px solid '. $hborder_color .'');
           	/* =========================== Menu ============================ */
           	// Website title in menu
           	self::generate_css('.navbar-brand', 'display', 'nabia_menu_brand');
        	
           	// SIdebar BG
           	$side_bg_color = nabia_theme_mod('nabia_transparent_sidebar_bg') != 1 ? nabia_theme_mod('nabia_sidebar_bg_color') : 'transparent';
           	self::generate_css('.sidebg', 'background', 'nabia_sidebar_bg_img', 'url("', '") '. $side_bg_color .'', '.sidebg { background-color: '. $side_bg_color .';'.'}' );
       		// Widget BG
       		$wtransparent_bg =  nabia_theme_mod('nabia_transparent_widget_bg');
           	self::generate_css('.widget', 'background-color', 'nabia_widget_bg_color', '', '', '', $wtransparent_bg ? 'transparent' : false );
       		// Remove widget area padding
       		if( nabia_theme_mod('nabia_remove_widget_padding') ) {
       			self::generate_css('.widget', 'padding', 'nabia_remove_widget_padding', '', '', '', '0px');
       		}
       		// Featured carousel
       		// Carousel background image & color
           	$carousel_bg_color = nabia_theme_mod('nabia_carousel_bg_color');
           	self::generate_css('#featured-carousel, .carousel-navigation', 'background', 'nabia_carousel_bg_image', 'url("', '") '. $carousel_bg_color .'', '#featured-carousel, .carousel-navigation { background-color: '. $carousel_bg_color .';'.'}' );



			// Footer background
			if( nabia_theme_mod('nabia_footer_bg_img') ) {
       			self::generate_css('#footer', 'background', 'nabia_footer_bg_img', 'url("', '") '. nabia_theme_mod('nabia_footer_bg_color') . ' ' . nabia_theme_mod('nabia_footer_bg_img_repeat') . '');
       		} else {
       			self::generate_css('#footer', 'background-color', 'nabia_footer_bg_color');
       		}


          	/* =========================== Fonts =========================== */
          	// Body font
			self::generate_css('body', 'font-family', 'nabia_body_font_family', '', ',Arial,sans-serif');
			// Widget titles font
       		self::generate_css('.widgettitle, .f-widgettitle', 'font-family', 'nabia_widget_titles_font_family', '', ',Arial,sans-serif');
       		// Post titles font
       		self::generate_css('.post-title', 'font-family', 'nabia_post_titles_font_family', '', ',Arial,sans-serif');
       		// Menu font
       		self::generate_css('#top-menu-nav, .footer-menu', 'font-family', 'nabia_menu_font_family', '', ',Arial,sans-serif');


       		/* ======================= Custom colors ======================= */

          	$color_scheme = nabia_theme_mod('nabia_color_scheme');
          	
          	// The custom colors will be applied only if color scheme option is set to custom
          	if( $color_scheme == 'custom' ) {

	       		// Txt color
	       		self::generate_css('body', 'color', 'nabia_body_txt_color');
	       		// Links color
	       		self::generate_css('body a, body a:visited', 'color', 'nabia_body_link_color');
	       		// Links hover color
	       		self::generate_css('body a:hover', 'color', 'nabia_body_link_hover_color');
	       		// Post format icons
				self::generate_css('.post-format-icon', 'color', 'nabia_ficons_color');
				self::generate_css('.phgal-carousel .slides .flex-active-slide', 'border-color', 'nabia_ficons_color');
				// Audio player color
				self::generate_css('.mejs-embed, .mejs-embed body, .mejs-container .mejs-controls', 'background-color', 'nabia_audioplayer_color', '', '!important');
	       		// Buttons background color
	       		self::generate_css('button, input[type="button"], input[type="reset"], input[type="submit"], .reply, .reply:hover, .tags span, .post-author-meta .nav-tabs > li.active > a, .post-author-meta .nav-tabs > li.active > a:hover, .post-author-meta .nav-tabs > li.active > a:focus, .post-author-meta .nav-tabs .active a, .nav.recent-posts-tabs .active, .nav.recent-posts-tabs li a:focus, .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus, .post-author-meta .nav-tabs > li.active > a, .post-author-meta .nav-tabs > li.active > a:hover, .post-author-meta .nav-tabs > li.active > a:focus, .post-author-meta .nav-tabs .active a, .nav.recent-posts-tabs .active, .nav.recent-posts-tabs li a:focus, .social-profiles li:hover, #wp-calendar thead tr', 'background-color', 'nabia_buttons_bg_color');
	       		// Buttons text color
	       		self::generate_css('button, input[type="button"], input[type="reset"], input[type="submit"], .reply, .reply:hover, .tags span, .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus, .post-author-meta .nav-tabs > li.active > a, .post-author-meta .nav-tabs > li.active > a:hover, .post-author-meta .nav-tabs > li.active > a:focus, .post-author-meta .nav-tabs .active a, .nav.recent-posts-tabs .active, .nav.recent-posts-tabs li a:focus', 'color', 'nabia_buttons_text_color');
	       		// Buttons border color
	       		self::generate_css('button, input[type="button"], input[type="reset"], input[type="submit"], .reply, .reply:hover, .tags span, .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus, .car-prev:hover, .car-next:hover', 'border-color', 'nabia_buttons_border_color');
	       		// Footer widgets bottom border
	       		self::generate_css('.f-widgettitle > span', 'border-bottom', 'nabia_footerw_border_color', '1px solid ');
	       		// Footer border color
	       		self::generate_css('#footer-copy', 'border-top', 'nabia_footer_border_color', '2px solid ');

	           	// Menu background color. Only for full width menu
	           	self::generate_css('.menu-static-top #mainmenu .navbar-default', 'background-color', 'nabia_menu_bg_color');
	           	// Menu border color
	           	self::generate_css('.menu-static-top #mainmenu .navbar-default', 'border-color', 'nabia_menu_border_color');
	           	// Menu tabs color
	           	self::generate_css('#mainmenu .menu-item a, #mainmenu .menu-item a:visited', 'background-color', 'nabia_menu_tabs_bg_color');
	        	// Menu disabled text color
	        	self::generate_css('#mainmenu .dropdown-menu > .disabled a', 'color', 'nabia_disabled_text_color', '', '!important');
	        	// Submenu divider color
				self::generate_css('#mainmenu .dropdown-menu .divider', 'background-color', 'nabia_menu_divider_color');
	        	// Submenu border color
				self::generate_css('#mainmenu .open > .dropdown-menu', 'border-bottom', 'nabia_submenu_bottom_border', '3px solid ');

	        	// Menu text color
	        	self::generate_css('#mainmenu .menu-item a, #mainmenu .menu-item a:visited, #mainmenu .dropdown-menu > li > a', 'color', 'nabia_menu_text_color');
	        	// Menu tabs hover color
	        	self::generate_css('#mainmenu .navbar-nav .active a, #mainmenu .navbar-default .navbar-nav > li > a:hover, #mainmenu .navbar-default .navbar-nav > li > a:focus', 'background', 'nabia_menu_tab_hover', '', '');
	        	// Submenu tabs hover color
	        	self::generate_css('#mainmenu .dropdown-menu > .active > a:hover, #mainmenu .dropdown-menu > .active > a:focus, #mainmenu .dropdown-menu > li > a:hover, #mainmenu .dropdown-menu > li > a:focus', 'background-color', 'nabia_submenu_tab_hover', '', '!important');
	        	// Submenu background color
	        	self::generate_css('.menu-static-top .navbar-left .open > .dropdown-menu:before, .menu-centered-pills #mainmenu .open > .dropdown-menu:before, .menu-static-top .navbar-right .open > .dropdown-menu:before', 'border-color', 'nabia_submenu_bg_color', 'transparent transparent ');
	        	self::generate_css('#mainmenu .dropdown-menu', 'background-color', 'nabia_submenu_bg_color');

	        	// Breadcrumbs background color
	        	self::generate_css('.breadcrumb', 'background-color', 'nabia_bcrumbs_bg_color');
	        	// Breadcrumbs text color
	        	self::generate_css('.breadcrumb > .active', 'color', 'nabia_bcrumbs_txt_color');
	        	// Breadcrumbs links color
	        	self::generate_css('.breadcrumb li a, .breadcrumb li a:visited', 'color', 'nabia_bcrumbs_link_color');

	  			// Widget titles
	  			self::generate_css('.widgettitle', 'color', 'nabia_widget_title_color');
	  			// Sidebar text color
	  			self::generate_css('.sidebg', 'color', 'nabia_sidebar_text_color');
	  			// Sidebar links color
	  			self::generate_css('.sidebg a, .sidebg a:visited', 'color', 'nabia_sidebar_link_color');
	  			// WIdget icons color
	  			self::generate_css('.widget.widget_pages li:before, .widget.widget_categories li:before, .widget.widget_archive li:before, .widget.widget_recent_comments li:before, .tagcloud a:before', 'color', 'nabia_widget_icons_color');

	  			// Carousel item hover color
	  			self::generate_css('.carousel-item .mask', 'background-color', 'nabia_carousel_item_hover', '', '', '', nabia_hex2rgba( nabia_theme_mod('nabia_carousel_item_hover'), 0.7 ) );

	       		// Footer text color
	       		self::generate_css('#footer', 'color', 'nabia_footer_txt_color');
	       		// Footer links color
	       		self::generate_css('#footer a, #footer a:visited', 'color', 'nabia_footer_link_color');
	       		// Footer bottom section bg color
	       		self::generate_css('#footer-copy', 'background-color', 'nabia_footer_bottom_bg_color');
	       		// Footer widget title color
	       		self::generate_css('.f-widgettitle', 'color', 'nabia_footer_widget_title');
	       		// Footer bottom text color
	       		self::generate_css('#footer-copy', 'color', 'nabia_footer_bottom_text_color');
	       		// Footer bottom links color
	       		self::generate_css('#footer-copy a, #footer-copy a:visited', 'color', 'nabia_footer_bottom_link_color');
       		
       		}

       		?> 

      	</style> 
      	<!--/Customizer CSS-->
      	<?php
   	}
   
   	/**
     * This outputs the javascript needed to automate the live settings preview.
     * Also keep in mind that this function isn't necessary unless your settings 
     * are using 'transport'=>'postMessage' instead of the default 'transport'
     * => 'refresh'
     * 
     * Used by hook: 'customize_preview_init'
     * 
     * @see add_action('customize_preview_init',$func)
     * @since Nabia 1.0
    */
   	public static function live_preview() {
      	wp_enqueue_script( 
           	'mytheme-themecustomizer', // Give the script a unique ID
           	get_template_directory_uri() . '/js/theme-customizer.js', // Define the path to the JS file
           	array(  'jquery', 'customize-preview' ), // Define dependencies
           	'1.0', // Define a version (optional) 
           	true // Specify whether to put in footer (leave this true)
      	);
   	}

	/**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     * 
     * @uses nabia_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @param string $fallback optional. Use CSS rule as a fallback if option value is null.
     * @param string $override optional. Mod value will be override if this param is set.
     * @return string Returns a single line of CSS with selectors and a property.
     * @since Nabia 1.0
     */
    public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $fallback ='', $override='', $echo=true ) {
      //echo $wp_customize->get_setting( 'nabia_color_scheme' )->default;

      	$return = '';
      	if( !$override ) {
      		$mod = nabia_theme_mod($mod_name);
      	} else {
      		$mod = $override;
      	}
      	if ( ! empty( $mod ) ) {
         	$return = sprintf('%s { %s:%s; }',
	            $selector,
	            $style,
	            $prefix.$mod.$postfix
	     	);
	     	if ( $echo ) {
	        	echo $return;
	     	}
		} else {
			if( $fallback ) {
		     	
		     	$return = $fallback;
    	     	if ( $echo )
	        		echo $return;
		     	
		    }
		}
  		return $return;
    }

}

// Enqueue customizer custom stylesheet
function nabia_customizer_style() {
	wp_enqueue_style(
		'customizer-style',
		get_template_directory_uri() . '/includes/customizer/customizer_style.css'
	);
    // Font Awesome
    //wp_register_style('customizer-fontawesome', $css_dir . 'font-awesome.min.css');
}
add_action('customize_controls_enqueue_scripts', 'nabia_customizer_style');

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'Nabia_Customize' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'Nabia_Customize' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'Nabia_Customize' , 'live_preview' ) );

?>