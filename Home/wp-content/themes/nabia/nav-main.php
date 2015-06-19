<?php
/**
 * The template for displaying Main menu
 *
 * A menu will be displayed depending on the menu type selected from theme customizer
 * Menues are registered in /functions/init.php
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 */

$menu_style = nabia_theme_mod('nabia_menu_style');
$tabs_align = nabia_theme_mod('nabia_menu_tabs_align');
?>

<div id="mainmenu" class="center-block">
	
	<?php
	switch ( $menu_style ) {
		case 'centered-pills':
			nabia_menu('main', 'centered-pills');
			break;

		case 'navbar-static-top':
			nabia_menu( 'main', 'navbar-static-top', $tabs_align );
			break;		
		
		default:
			nabia_menu('main', 'centered-pills');
			break;
	} ?>

</div>