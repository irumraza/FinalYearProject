<?php
/**
* Sanitize functions for customizer
* 
* @package WordPress
* @subpackage Nabia
* @since Mabia 1.0
*/

/**
* Sanitize checkboxes
*
* @since Nabia 1.0
*/
function nabia_sanitize_checkbox( $input ) {
	if ( $input ) {
		$output = 1;
	} else {
		$output = false;
	}
	return $output;
}

/**
* Sanitize Animations Select
*
* @since Nabia 1.0
*/
function nabia_sanitize_animations( $input ) {
	
	$animations = array(
		'none',
		'bounce',
		'flash',
		'pulse',
		'rubberBand',
		'shake',
		'swing',
		'tada',
		'wobble',
		'bounceIn',
		'bounceInDown',
		'bounceInLeft',
		'bounceInRight',
		'bounceInUp',
		'fadeIn',
		'fadeInDown',
		'fadeInDownBig',
		'fadeInLeft',
		'fadeInLeftBig',
		'fadeInRight',
		'fadeInRightBig',
		'fadeInUp',
		'fadeInUpBig',
		'flip',
		'flipInX',
		'flipInY',
		'lightSpeedIn',
		'rotateIn',
		'rotateInDownLeft',
		'rotateInDownRight',
		'rotateInUpLeft',
		'rotateInUpRight',
		'rollIn',
		'zoomIn',
		'zoomInDown',
		'zoomInLeft',
		'zoomInRight',
		'zoomInUp'
	);

	if( in_array( $input, $animations ) ) {
		return $input;
	}

}

/**
* Sanitize Numbers. Returned value is an integer.
*
* @since Nabia 1.0
*/
function nabia_sanitize_numbers( $input ) {

	$return = '';

	if( is_numeric( $input ) ) {
		$return = $input;
	} else {
		$return = 0;
	}

	return (int) $return;
}