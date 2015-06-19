<?php
/**
 * Register functions
 *
 * This file is used to register sidebars, register and enqueue scripts & styles, Google Fonts & Menues
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 */

/**
 * Pass php variables to JavaScript using WordPress wp_localize_script
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_localize_script
 * @since Nabia 1.0
 * @return array A multidimensional array of options to be passed to JavaScript.
 */
function nabia_localize_vars() {

    $nabia_options = array(
        'owl_carousel' => array(
            'autoplay'      => nabia_theme_mod('nabia_carousel_autoplay'),
            'stophover'     => nabia_theme_mod('nabia_carousel_stoponhover'),
            'mousedrag'     => nabia_theme_mod('nabia_carousel_mousedrag'),
            'touchdrag'     => nabia_theme_mod('nabia_carousel_touchdrag'),
            'pagination'    => nabia_theme_mod('nabia_carousel_pagination')
            )
        );

    return $nabia_options;
}

/**
 * Register Google fonts set in customizer for Nabia theme
 *
 * @since Nabia 1.0
 *
 * @return string
 */
function nabia_fonts_url() {
    $fonts_url = '';

    $body_font = nabia_theme_mod('nabia_body_font_family');
    $widget_title_font = nabia_theme_mod('nabia_widget_titles_font_family');
    $post_titles_font = nabia_theme_mod('nabia_post_titles_font_family');
    $menu_font = nabia_theme_mod('nabia_menu_font_family');

    $font_variants = '400,700,400italic';
    //$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';

    $fonts = array( $body_font, $widget_title_font, $post_titles_font, $menu_font );
    $font_families = array();

    foreach ($fonts as $font) {
        $font_families[] = $font . ':' . $font_variants;
    }

    $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        'subset' => urlencode( 'latin,latin-ext' ),
    );
    $fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
    
    return $fonts_url;
}

/**
 * Register Nabia scripts and styles for the front end
 *
 * @since Nabia 1.0
 */
function nabia_register_scripts_and_styles() {

	$css_dir = get_template_directory_uri() . '/css/';
	$js_dir = get_template_directory_uri() . '/js/';
	
	wp_register_style( 'bootstrap-css', $css_dir . 'bootstrap.min.css' );
	wp_register_script( 'bootstrap', $js_dir . 'bootstrap.min.js', array('jquery'), '1.0', true );

    // Font Awesome
    wp_register_style('fontawesome', $css_dir . 'font-awesome.min.css');
    
    // Main stylesheet
	wp_register_style('nabia-style', get_stylesheet_uri(), false, '1.0', 'all');

    // Lets you use unprefixed CSS properties without damaging cross browser compatibility
    wp_register_script('prefixfree', $js_dir . 'prefixfree.min.js', array('jquery'), '1.0', true);

    // A cross-browser library of CSS animations
    wp_register_style('animate', $css_dir . 'animate.min.css', '1.0');

    // Reveal CSS Animations When You Scroll. Used along with animate.css
    wp_register_script('wow', $js_dir . 'wow.min.js', array(), '1.0', true);

    // prettyPhoto
    wp_register_script('prettyPhoto', $js_dir . 'jquery.prettyPhoto.js', array('jquery'), '1.0', false);
    wp_register_style('prettyPhotoCss', $css_dir . 'prettyPhoto.css', '1.0');

    // Owl Carousel
    wp_register_script('owlcarouseljs', $js_dir . 'owl.carousel.min.js', array('jquery'), '1.0', false);
    wp_register_style('owlcarouselcss', $css_dir . 'owl.carousel.css', '1.0');

    wp_register_script('jqeasing', $js_dir . 'jquery.easing.1.3.js', array('jquery'), '1.0', false);

    // Flex Slider
    wp_register_script('flexslider', $js_dir . 'jquery.flexslider-min.js', array('jquery'), '1.0', false);
    wp_register_style('flexslider-css', $css_dir . 'flexslider.css', '1.0');

    wp_register_script('functions', $js_dir . 'functions.js', '', '1.0', true);

}
add_action('init', 'nabia_register_scripts_and_styles');

/**
 * Enqueue Nabia scripts and styles for the front end
 *
 * @since Nabia 1.0
 *
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
 */
function nabia_enqueue_scripts_and_styles() {

    global $wp_styles;
    $color_scheme = nabia_theme_mod('nabia_color_scheme');

    // Required for threaded comments to work
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    // Enqueue Google Fonts
    wp_enqueue_style( 'nabia-fonts', nabia_fonts_url(), array(), null );

    wp_enqueue_style( 'bootstrap-css' );
    wp_enqueue_script( 'bootstrap' );

    // Owl Carousel
    wp_enqueue_style('owlcarouselcss');
    wp_enqueue_script('owlcarouseljs');

	wp_enqueue_style('nabia-style');

    wp_enqueue_style('fontawesome');

    // Color Scheme
    if( $color_scheme != 'custom' ) {
        wp_enqueue_style( esc_attr( $color_scheme ), get_template_directory_uri() . '/css/skins/'. esc_attr( $color_scheme ) .'.css');
    }

    wp_enqueue_script('jqeasing');

    wp_enqueue_style('animate');

    wp_enqueue_script('wow');

    wp_enqueue_style( 'prettyPhotoCss' );
    wp_enqueue_script( 'prettyPhoto' );

    // Flex Slider
    wp_enqueue_script('flexslider');
    wp_enqueue_style('flexslider-css');

    // IE 9
    wp_register_style( 'ie9', get_template_directory_uri() . '/css/ie9.css' );
    $wp_styles->add_data( 'ie9', 'conditional', 'IE 9' );

    wp_enqueue_script('functions');

    // Localize vars
    $js_encode_var = json_encode(nabia_localize_vars());
    wp_localize_script( 'functions', 'nabia_vars', $js_encode_var);

}
add_action('wp_enqueue_scripts', 'nabia_enqueue_scripts_and_styles');

/**
 * Register Nabia Sidebars : Left, Right & Footer
 *
 * @since Nabia 1.0
 *
 */
function nabia_register_sidebars() {
	// Left Sidebar
    register_sidebar(array(
        'id' => 'sidebar-left',
        'name' => __('Left Sidebar', 'nabia'),
        'description' => __('Left Website Sidebar', 'nabia'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widgettitle"><h4>',
        'after_title' => '</h4></div>',
    ));
    //Right Sidebar
    register_sidebar( array(
    	'id' => 'sidebar-right',
    	'name' => __('Right Sidebar', 'nabia'),
        'description' => __('Left Website Sidebar', 'nabia'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widgettitle"><h4>',
        'after_title' => '</h4></div>',
	));
    //Footer Sidebar
    register_sidebar( array(
    	'id' => 'sidebar-footer',
    	'name' => __('Footer Sidebar', 'nabia'),
    	'before_widget' => '<div class="f-widgetcontainer %1$s clearfix">',
    	'after_widget' => '</div>',
    	'before_title' => '<h5 class="f-widgettitle"><span>',
    	'after_title' => '</span></h5>'
	));
}

add_action('widgets_init', 'nabia_register_sidebars');

/**
 * Register Nabia Menues
 *
 * Using same function for main menu and footer menu with a param for menu id.
 * Using wp_bootstrap_navwalker to assign Bootstrap classes to menu items.
 *
 * @link https://github.com/twittem/wp-bootstrap-navwalker
 *
 * @param string $menu Menu id.
 * @param string $menu_style Menu style set in customizer.
 * @param string $tabs_align Menu tabs alignment set in customizer.
 * @since Nabia 1.0
 */
function nabia_menu( $menu, $menu_style = 'centered-pills', $tabs_align = '' ) {

    if( $menu == 'main' ) {

        $nav_tabs = '';

        if( $menu_style == 'centered-pills')
            $nav_tabs = 'nav-tabs';

        ?>
        <nav class="navbar navbar-default <?php echo $menu_style == 'navbar-fixed-top' ? 'navbar-fixed-top' : false; ?>" role="navigation">
          <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-menu-nav">
                    <span class="sr-only"><?php _e('Toggle navigation', 'nabia'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo home_url('/'); ?>">
                    <i class="glyphicon glyphicon-home"></i>
                </a>
            </div>

                <?php
                        
                    wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'echo'              => true,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse ' . $menu_style,
                        'container_id'      => 'top-menu-nav',
                        'menu_class'        => 'nav navbar-nav ' . $tabs_align . ' ' . $nav_tabs,
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                    );
                    
                ?>
            </div>
        </nav>

  <?php

    } elseif( $menu == 'footer' ) {


        wp_nav_menu( array(
            'theme_location'  => 'footer',
            'menu'            => 'footer',
            'container'       => 'nav',
            'container_class' => 'footer-menu',
            'container_id'    => 'footermenu',
            'menu_class'      => 'footermenu footer-nav pull-right',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
                
            )
        );
        
    }
}
?>