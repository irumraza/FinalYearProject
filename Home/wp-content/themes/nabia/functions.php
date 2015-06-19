<?php
/**
 * Nabia functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 *
 * This functions.php file includes all the files containing functions.
 * All functions files are located in /functions directory inside of the Nabia theme root.
 * Each file has a name referring to the included functions to easily find the needed function.
 *
 */

// Define Nabia constants
define('NABIA_FUNCTIONS_DIR', get_template_directory() . '/functions/');
define('NABIA_INC_DIR', get_template_directory() . '/includes/');
define('NABIA_VERSION', '1.0');

// Include Nabia required files
require_once( NABIA_FUNCTIONS_DIR . 'init.php' );
require_once( NABIA_FUNCTIONS_DIR . 'register.php' );
require_once( NABIA_FUNCTIONS_DIR . 'general.php' );
require_once( NABIA_FUNCTIONS_DIR . 'filters.php' );
require_once( NABIA_INC_DIR . 'wp_bootstrap_navwalker.php' );
require_once( NABIA_INC_DIR . 'customizer/customizer.php' );
require_once( NABIA_INC_DIR . 'widgets/widgets-init.php' );

/** 
* Include Custom Metaboxes and Fields for WordPress
* @since Nabia 1.0
*/
if ( ! class_exists( 'cmb_Meta_Box' ) )
	require_once( NABIA_INC_DIR . '/metaboxes/metaboxes.php');

?>