<?php
/**
 * Nabia theme filters
 * Filter functions are used to change the output of the
 * core functions
 * 
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0 
 *
*/

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Nabia 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function nabia_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'nabia' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'nabia_wp_title', 10, 2 );

/**
 * Dynamically set the footer widgets width based on Bootstrap classes
 *
 * @since Nabia 1.0
 *
 */
function nabia_footer_dynamic_widgets($params) {

    $sidebar_id = $params[0]['id'];

    if ( $sidebar_id == 'sidebar-footer' ) {

        $total_widgets = wp_get_sidebars_widgets();
        $sidebar_widgets = count($total_widgets[$sidebar_id]);

        $params[0]['before_widget'] = str_replace('class="', 'class="col-md-' . floor(12 / $sidebar_widgets) . ' ', $params[0]['before_widget']);
    }

    return $params;
}
add_filter('dynamic_sidebar_params','nabia_footer_dynamic_widgets');

/**
 * Extend the default WordPress post classes.
 *
 * @since Nabia 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function nabia_post_class_filter( $classes ) {

    $animation = nabia_theme_mod('nabia_posts_wow_animation');

    if( is_archive() || is_home() || is_front_page() ) {
        if( $animation != 'none' )
            $classes[] = 'wow ' . $animation;
    }

    if( is_single() ) {
        $classes[] = 'single-post';
    }

    if( !has_post_thumbnail() ) {
        $classes[] = 'no-featured-image';
    }

    if( is_home() || is_front_page() ) {
        $classes[] = 'homepage';
    }

    $classes[] = 'article-container';

    return $classes;
}
add_filter('post_class', 'nabia_post_class_filter');

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Menu style.
 *
 * @since Nabia 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function nabia_body_class_filter( $classes ) {

    $menu_style = nabia_theme_mod('nabia_menu_style');
    
    switch ( $menu_style ) {
        case 'centered-pills':
            $menu_class = 'menu-centered-pills';
            break;
        case 'navbar-static-top':
            $menu_class = 'menu-static-top';
            break;
        case 'navbar-fixed-top':
            $menu_class = 'menu-fixed-top';
            break;
    }
    // Menu style class
    if( $menu_style ) {
        $classes[] = $menu_class;
    }

    // Color scheme class
    $classes[] = nabia_theme_mod('nabia_color_scheme');

    return $classes;
}
add_filter('body_class', 'nabia_body_class_filter');


/**
 * Extend the default WordPress gallery style.
 *
 * Adds support for JetPack tiled gallery style
 * Turn default gallery style into a slider with a navigation carousel
 *
 * @since Nabia 1.0
 *
 * @param array $output Default WordPress gallery code.
 * @param array $attr Attributes of the shortcode.
 * @return string filtered HTML content to display gallery.
 */
function nabia_post_gallery( $output, $attr) {
    global $post, $wp_locale;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'li',
        'icontag'    => 'figure',
        'captiontag' => 'figcaption',
        'columns'    => 0,
        'size'       => 'big-thumb',
        'include'    => '',
        'exclude'    => '',
        'type'       => ''
    ), $attr));

    // Check if Jetpack Tiled Gallery is active
    if( class_exists('Jetpack_Tiled_Gallery') ) {
        // If type attribute is set, this function will return false and will not mess Jetpack gallery
        if( $type || get_option( 'tiled_galleries' ) ) 
            return;
    }

    $galid = $id;
    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $output .= "<div id='phgal-{$galid}' class='phgal-slider flexslider'><ul class='slides'>";

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        
        $thumb_url = wp_get_attachment_image_src( $id, $size );
        $fullimg_url = wp_get_attachment_image_src( $id, 'full' );

        $link = '<a href="'. esc_attr( $fullimg_url[0] ) .'" data-gal="prettyPhoto[gallery-'.$post->ID.']" class="zoom-icon"><i class="fa fa-search"></i></a><img src="'. esc_attr($thumb_url[0] ) .'" alt="" />';

        $output .= "<{$itemtag} class='gallery-item'>";
        $output .= "<{$icontag} class='gallery-image'>";
                $output .= $link;
                //$output .= '<i class="fa fa-search"></i>';
                $output .= $captiontag && trim( $attachment->post_excerpt ) ? "<{$captiontag} class='gallery-caption'>" . wptexturize($attachment->post_excerpt) . "</{$captiontag}>" : false;
           $output .= "</{$icontag}>";

        $output .= "</{$itemtag}>";

    }

    $output .= '</ul></div>';

    $output .= '<div id="phgal-carousel-' . $galid . '" class="phgal-carousel flexslider">
            <ul class="slides">';

        foreach ( $attachments as $id => $attachment ) {
            $thumbnail = wp_get_attachment_image_src( $id, 'thumbnail' );
            $output .= '<li><img src="'. esc_attr($thumbnail[0] ) .'" alt="" /></li>';
        }

    $output .= '</ul></div>';

    $output .= '<script type="text/javascript">

        (function($) {
            $( document ).ready(function() {

                if(jQuery().flexslider) {

                    $("#phgal-carousel-'. $galid .'").flexslider({
                        animation: "slide",
                        controlNav: false,
                        animationLoop: false,
                        slideshow: false,
                        itemWidth: 80,
                        itemMargin: 10,
                        touch: true,
                        asNavFor: "#phgal-'. $galid .'",
                        start: function(){
                            $("#phgal-carousel-'. $galid .' .slides > li img").fadeIn();
                        }
                    });
                    $("#phgal-'. $galid .'").flexslider({
                        animation: "slide",
                        controlNav: false,
                        animationLoop: false,
                        slideshow: false,
                        sync: "#phgal-carousel-'. $galid .'",
                        touch: true,
                        useCSS:false,
                        easing: "swing",
                        start: function(){
                            $("#phgal-'. $galid .' .slides > li img").fadeIn();
                        }
                    });
                }

            });
        })(jQuery);

    </script>';

    return $output;
}
add_filter('post_gallery', 'nabia_post_gallery', 10, 2);

/**
 * Limits the output of the WordPress excerpt to a specific number of characters.
 *
 * @since Nabia 1.0
 *
 * @param integer $length Original generated excerpt length. Default is 55 characters.
 * @return integer The maximum number of characters for filtered excerpt
 */
function nabia_excerpt_length( $length ) {
    return 43;
}
add_filter( 'excerpt_length', 'nabia_excerpt_length', 999 );

/**
 * Sets a custom read more button for excerpt
 *
 * @since Nabia 1.0
 *
 * @param string $more Default WordPress read more: [...].
 * @return string New read more text.
 */
function nabia_excerpt_more( $more ) {
    return ' ... ';
}
add_filter('excerpt_more', 'nabia_excerpt_more');

/**
 * Applies Bootstrap classes to wp_link_pages for paginated posts
 *
 * @since Nabia 1.0
 *
 * @param string $wp_links HTML original output of wp_link_pages.
 * @return string New HTML output.
 */
function nabia_wp_link_pages( $wp_links ) {

    global $post;
     
    // Generate current page base url without pagination.
    $post_base = trailingslashit( get_site_url(null, $post->post_name) );
     
    $wp_links = trim( str_replace( array('<p>Pages: ', '</p>'), '', $wp_links ) );
     
    // Get out of here ASAP if there is no paging.
    if ( empty($wp_links) )
        return '';
     
    // Split on spaces
    $splits = explode(' ', $wp_links );
    $links = array();
    $current_page = 1;
     
    // Since links are now split up such that <a and href=".+" are seperate...
    // loop over split array and correct links.
    foreach( $splits as $key => $split ){
        if( is_numeric($split) ) {
            $links[] = $split;
            $current_page = $split;
        } else if ( strpos($split, 'href') === false ) {
            $links[] = $split . ' ' . $splits[$key + 1];
        }
    }
     
    $num_pages = count($links);
     
    // Output pagination
    $output = '';
    $output .= '<div id="post-pagination"><ul class="pagination pagination-sm">';
     
        $output .= "<li><a href=\"{$post_base}\">&laquo;</a></li>";
     
        if ( $current_page == 1 )
            $output .= '<li class="disabled"><a>';
        else
            $output .= '<li><a href="' . $post_base . ($current_page - 1) . '">';
     
        $output .= '&lsaquo;</a></li>'; // end the li. No reason to duplicated this in both conditionals.
     
        foreach( $links as $key => $link ) {
            if ( is_numeric($link) ) {
                $temp_key = $key + 1;
                $output .= "<li class=\"active\"><a href=\"{$post_base}{$temp_key}\">{$temp_key}</a></li>";
            } else {
                $output .= "<li>{$link}</li>";
            }
        }
     
        if ( $current_page == $num_pages )
            $output .= '<li class="disabled"><a>';
        else
            $output .= '<li><a href="' . $post_base . ($current_page + 1) . '">';
     
        $output .= '&rsaquo;</a></li>'; // end the li. No reason to duplicated this in both conditionals.
     
        $output .= "<li><a href=\"{$post_base}{$num_pages}\">&raquo;</a></li>";
     
    $output .= '</ul></div>';
     
    return $output;
}
add_filter('wp_link_pages', 'nabia_wp_link_pages');


function nabia_dashboard_footer() {
    printf( __('Built with Nabia Theme %s', 'nabia'), NABIA_VERSION );
}
add_filter('admin_footer_text', 'nabia_dashboard_footer');
?>