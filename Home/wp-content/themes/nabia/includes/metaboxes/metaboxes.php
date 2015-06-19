<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'nabia_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function nabia_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'nabia_cmb_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['nabia_featured_post'] = array(
		'id'         => 'nabia_featured_post_opt',
		'title'      => __( 'Post Options', 'nabia' ),
		'pages'      => array( 'post'), // Post type
		'context'    => 'side',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name'       => __( 'Display in featured carousel?', 'nabia' ),
				//'desc'       => __( 'Check this box to display this post in the featured carousel.', 'nabia' ),
				'id'         => $prefix . 'featured_post',
				'type'       => 'radio_inline',
				'default'	 => 'no',
				'options' => array(
					'yes' => __( 'Yes', 'nabia' ),
					'no' => __( 'No', 'nabia' )
				),
			)													
		),
	);

	// About Me Template
    $meta_boxes[] = array(
        'id' => 'about_me_info',
        'title' => __('Social Profiles', 'nabia'),
        'pages' => array('page'), // post type
        'show_on' => array( 'key' => 'page-template', 'value' => 'template-about.php' ),
        'context' => 'side', //  'normal', 'advanced', or 'side'
        'priority' => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names' => true, // Show field names on the left
        'fields' => array(
				array(
					'name' => __( 'Facebook Page', 'nabia' ),
					'desc' => __( 'Type the URL to your Facebook page.', 'nabia' ),
					'id' => $prefix . 'about_me_facebook',
					'type' => 'text',
					'default' => ''
				),
				array(
					'name' => __( 'Twitter', 'nabia' ),
					'desc' => __( 'Type the URL to your Twitter profile.', 'nabia' ),
					'id' => $prefix . 'about_me_twitter',
					'type' => 'text',
					'default' => ''
				),
				array(
					'name' => __( 'Google Plus', 'nabia' ),
					'desc' => __( 'Type the URL to your Google PLus profile.', 'nabia' ),
					'id' => $prefix . 'about_me_gplus',
					'type' => 'text',
					'default' => ''
				),
				array(
					'name' => __( 'LinkedIn', 'nabia' ),
					'desc' => __( 'Type the URL to your LinkedIn profile.', 'nabia' ),
					'id' => $prefix . 'about_me_linkedin',
					'type' => 'text',
					'default' => ''
				),													
        	)
        );

    $meta_boxes[] = array(
        'id' => 'about_me_text',
        'title' => __('Short Description About Me', 'nabia'),
        'pages' => array('page'), // post type
        'show_on' => array( 'key' => 'page-template', 'value' => 'template-about.php' ),
        'context' => 'normal', //  'normal', 'advanced', or 'side'
        'priority' => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names' => true, // Show field names on the left
        'fields' => array(
				array(
					'name' => __( 'Title', 'nabia' ),
					'desc' => __( 'Type a title for short description section.', 'nabia' ),
					'id' => $prefix . 'about_me_sd_title',
					'type' => 'text_medium',
					'default' => ''
				),
				array(
					'name' => __( 'Short Description', 'nabia' ),
					'desc' => __( 'Type a short description about you.', 'nabia' ),
					'id' => $prefix . 'about_me_sd_text',
					'type' => 'textarea_small',
					'default' => ''
				),													
        	)
        );

	/**
	 * Post / Page metaboxes for custom header
	 */
	$meta_boxes['nabia_custom_header'] = array(
		'id'         => 'nabia_page_custom_header',
		'title'      => __( 'Custom Header', 'nabia' ),
		'pages'      => array( 'page', 'post'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'       => __( 'Header Background', 'nabia' ),
				'desc'       => __( 'Override the default header image for this post.Recommended a size of 1185 x 250 pixels.', 'nabia' ),
				'id'         => $prefix . 'post_himg',
				'type'       => 'file',
			),
			array(
				'name' => __( 'Header Background color', 'nabia' ),
				'desc' => __( 'This color will be used if the chosen image will fail to load.', 'nabia' ),
				'id' => $prefix . 'post_hbgcolor',
				'type' => 'colorpicker',
				'default' => ''
			)
		)
	);
	/**
	 * Post / Page metaboxes for custom background
	 */
	$meta_boxes['nabia_custom_background'] = array(
		'id'         => 'nabia_page_custom_background',
		'title'      => __( 'Custom Background', 'nabia' ),
		'pages'      => array( 'page', 'post'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(						
			array(
				'name'       => __( 'Background Image', 'nabia' ),
				'desc'       => __( 'Override the default background image for this post.', 'nabia' ),
				'id'         => $prefix . 'post_bimg',
				'type'       => 'file',
			),
			array(
				'name' => __( 'Background color', 'nabia' ),
				'desc' => __( 'This color will be used if the chosen image will fail to load.', 'nabia' ),
				'id' => $prefix . 'post_bg_color',
				'type' => 'colorpicker',
				'default' => ''
			),
			array(
				'name' => __( 'Background Repeat', 'nabia' ),
				'desc' => __( 'Choose if background image will repeat.', 'nabia' ),
				'id' => $prefix . 'post_bg_repeat',
				'type' => 'radio_inline',
				'default' => 'repeat',
				'options' => array(
					'no-repeat' => __( 'No Repeat', 'nabia' ),
					'repeat' => __( 'Tile', 'nabia' ),
					'repeat-x' => __( 'Tile Horizontally', 'nabia' ),
					'repeat-y' => __( 'Tile Vertically', 'nabia' ),
				),
			),
			array(
				'name' => __( 'Background Position', 'nabia' ),
				'desc' => __( 'Choose the background image position.', 'nabia' ),
				'id' => $prefix . 'post_bg_position',
				'type' => 'radio_inline',
				'default' => 'center',
				'options' => array(
					'left' => __( 'Left', 'nabia' ),
					'center' => __( 'Center', 'nabia' ),
					'right' => __( 'Right', 'nabia' )
				),
			),
			array(
				'name' => __( 'Background Attachment', 'nabia' ),
				'desc' => __( 'Choose if background will be fixed or will scroll.', 'nabia' ),
				'id' => $prefix . 'post_bg_attachament',
				'type' => 'radio_inline',
				'default' => 'fixed',
				'options' => array(
					'fixed' => __( 'Fixed', 'nabia' ),
					'scroll' => __( 'Scroll', 'nabia' )
				),
			),													
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}