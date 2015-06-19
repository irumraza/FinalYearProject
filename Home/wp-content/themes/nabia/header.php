<?php 
/**
 * The Header for Nabia theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!--[if lte IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.matchHeight-min.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="wrapper">
	<header id="header" class="container">

		<?php get_template_part('nav', 'main'); ?>

		<div class="header-background">
			<div class="logo-container">

			<?php if( !nabia_theme_mod('nabia_logo_image_url') && display_header_text() ) : ?>
				
				<span class="site-title"><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></span>
				<span class="site-description"><?php bloginfo('description'); ?></span>
			
			<?php elseif( nabia_theme_mod('nabia_logo_image_url') ) : ?>

				<?php if( nabia_theme_mod('nabia_link_logo_to_home') ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img class="logoimg" src="<?php echo esc_url( nabia_theme_mod('nabia_logo_image_url') ); ?>" alt="<?php bloginfo('name'); ?>" /></a>
					<?php if( display_header_text() ) { ?>
						<span class="site-description"><?php bloginfo('description'); ?></span>
					<?php } ?>
				<?php else : ?>
					<img class="logoimg" src="<?php echo esc_url( nabia_theme_mod('nabia_logo_image_url') ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" />
					<?php if( display_header_text() ) { ?>
						<span class="site-description"><?php bloginfo('description'); ?></span>
					<?php } ?>
				<?php endif; ?>

			<?php endif; ?>

			</div>
		</div>

	</header>

	<?php if( nabia_theme_mod('nabia_carousel_status') == 'enabled' ) {
		get_template_part('featured-content');
	}
	?>

	<?php if( !nabia_theme_mod('nabia_bcrumbs_display') ) { ?>
		<div id="breadcrumbs-nav" class="container">
			<?php nabia_breadcrumbs(); ?>
		</div>
	<?php } ?>