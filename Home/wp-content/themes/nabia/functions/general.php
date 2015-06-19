<?php
/**
 * This file gathers most of the Nabia functions
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 */

/**
 * Grabs left and right sidebars for sidebar.php
 * @since Nabia 1.0
 */
if(!function_exists('nabia_get_sidebars')) {
    function nabia_get_sidebars() {
        get_sidebar('left');
        get_sidebar('right');
    }
}

/**
* Check if a page slug exists
*
* @param string. A page slug.
* @return boolean. Returns true if the page slug exists or false if doesn't.
* @since Nabia 1.0
*/
if(!function_exists('nabia_page_exists')) {
    function nabia_page_exists( $slug ) {
        $args = array(
            'name'       => $slug,
            'post_type'  => 'page'
        );

        $page = get_posts( $args );
        
        if ( $page )
            return true;
    }
}

/**
* Create archive page for default post format on theme activation
*
* @since Nabia 1.0
*/
function nabia_create_archive_page() {

    // Check if 'archives' page slug exists
    if( !nabia_page_exists('archives') ) {

        $archives_page = array(
            'post_title'   => __('Archives', 'nabia'),
            'post_name'    => 'archives',          
            'post_status'  => 'publish', 
            'post_type'    => 'page',
            'comment_status' => 'closed',
            'post_author'  => 1,
        );

        wp_insert_post( $archives_page );
    }                     
}
add_action('after_switch_theme', 'nabia_create_archive_page');

/**
 * Adds a favicon inside <head> tags if a favicon image is set in customizer.
 * @since Nabia 1.0
 */
function nabia_favicon() {
    $favicon = nabia_theme_mod( 'nabia_favicon_image' );
    if( $favicon ) { ?>
        <link href="<?php echo esc_url( $favicon ); ?>" rel="icon" type="image/x-icon" />
    <?php
    }
}
add_action('wp_head', 'nabia_favicon');

/**
 * Display pagination with Bootstrap css classes
 *
 * For custom loops use this function as:
 * nabia_pagination($loop_name->max_num_pages);
 * 
 * @link http://www.kriesi.at/archives/how-to-build-a-wordpress-post-pagination-without-plugin
 *
 * @param integer $pages Number of pages set in $wp_query.
 * @param integer $range Page number display range.
 * @since Nabia 1.0
 */
if( !function_exists('nabia_pagination') ) {
    function nabia_pagination($pages = '', $range = 2)
    {  
        $showitems = ($range * 2)+1;

        if ( get_query_var('paged') ) {
                $paged = get_query_var('paged');
            } elseif ( get_query_var('page') ) {
                $paged = get_query_var('page');
            } else {
                $paged = 1;
        }

        if(empty( $paged )) $paged = 1;

        if($pages == '')
        {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if(!$pages)
            {
                $pages = 1;
            }
        }   

        if(1 != $pages)
        {
            echo "<ul class='pagination'>";
                
                if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
                    echo "<li><a href='".get_pagenum_link(1)."' title='". __('First page', 'nabia') . "'>&laquo;</a></li>";

                if($paged > 1 && $showitems < $pages) 
                    echo "<li><a href='".get_pagenum_link($paged - 1)."' title='". __('Previous page', 'nabia') . "'>&lsaquo;</a></li>";

                for ($i=1; $i <= $pages; $i++)
                {
                    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                    {
                       echo ($paged == $i)? "<li class='active'><span class='current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='disabled' >".$i."</a></li>";
                    }
                }

                if ($paged < $pages && $showitems < $pages) 
                    echo "<li><a href='".get_pagenum_link($paged + 1)."' title='". __('Next page', 'nabia') . "'>&rsaquo;</a></li>";  
                if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
                    echo "<li><a href='".get_pagenum_link($pages)."' title='". __('Last page', 'nabia') . "'>&raquo;</a></li>";

            echo "</ul>\n";
        }
    }
}

/**
* Grab post first image
*
* @since Nabia 1.0
* @return string. First image URL.
*/
if(!function_exists('nabia_grab_image')) {
    function nabia_grab_image() {
        
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_the_content(), $matches);
        $first_img = $matches [1] [0];

        if( empty( $first_img ) ) {
            $first_img = false;
        }
        return $first_img;
    }
}

/**
 * Breadcrumbs function with Bootstrap css classes
 *
 * @since Nabia 1.0
 */
if( !function_exists('nabia_breadcrumbs') ) {
    function nabia_breadcrumbs() {

        $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $delimiter = '<span class="divider">  </span>'; // delimiter between crumbs
        $home = 'Home'; // text for the 'Home' link
        $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
        $before = '<li class="active"><span class="current">'; // tag before the current crumb
        $after = '</span></li>'; // tag after the current crumb

        global $post;
        $homeLink = home_url();

        if (is_home() || is_front_page()) {

            if ($showOnHome == 1) echo '<ul class="breadcrumb"><li><a href="' . $homeLink . '">' . $home . '</a></li></ul>';

        } else {

            echo '<ul class="breadcrumb"><li><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . '</li> ';

        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
        if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
            echo $before . '' . single_cat_title('', false) . '' . $after;

        } elseif ( is_search() ) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;

        } elseif ( is_day() ) {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . '</li> ';
            echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . '</li> ';
            echo $before . get_the_time('d') . $after;

        } elseif ( is_month() ) {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . '</li> ';
            echo $before . get_the_time('F') . $after;

        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;

        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                if ($showCurrent == 1) echo ' ' . $delimiter . '</li> ' . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . '</li> ');
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                echo '<li>'. $cats; // <<<<<<<<<<
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            }

        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;

        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . '</li> ');
            echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) echo ' ' . $delimiter . '</li> ' . $before . get_the_title() . $after;

        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo $before . get_the_title() . $after;

        } elseif ( is_page() && $post->post_parent ) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
            echo $breadcrumbs[$i];
            if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . '</li> ';
        }
        if ($showCurrent == 1) echo ' ' . $delimiter . '</li> ' . $before . get_the_title() . $after;

        } elseif ( is_tag() ) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;

        } elseif ( is_404() ) {
            echo $before . 'Error 404' . $after;
        }

        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
                echo __('Page', 'nabia') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }

        echo '</ul>';

        }

    }
}

/**
 * Displays post content or excerpt according to the option set by theme customizer
 *
 * @since Nabia 1.0
 */
if( !function_exists('nabia_content') ) {
    function nabia_content() {
        global $post;

        $set = nabia_theme_mod('nabia_front_content_display');

        switch ( $set ) {
            case 'content':
                the_content( '<span class="read-more"><i class="fa fa-chevron-circle-right small-icon"></i>' . __('Read More', 'nabia') . '</span>' );
                break;
            case 'excerpt':
                the_excerpt();
                break;
            case 'content-excerpt':

                if( !$post->post_excerpt ) {
                    the_content( '<span class="read-more"><i class="fa fa-chevron-circle-right small-icon"></i>' . __('Read More', 'nabia') . '</span>' );
                } else {
                    the_excerpt();
                }

                break;

            default:
                the_content( '<span class="read-more"><i class="fa fa-chevron-circle-right small-icon"></i>' . __('Read More', 'nabia') . '</span>' );
                break;
        }
    }
}

/**
 * Displays related posts for single post page
 *
 * @since Nabia 1.0
 */
if(!function_exists('nabia_related_posts')) {
    function nabia_related_posts() {
        
        if( !nabia_theme_mod('nabia_sgpost_related') || get_post_format() ) 
            return;

        global $post; 
        
        $tags = wp_get_post_tags( $post->ID );  

        if ($tags) {

            $tag_ids = array();

            foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
            
            $args = array(  
                'tag__in' => $tag_ids,  
                'post__not_in' => array($post->ID),  
                'posts_per_page' => 4,
                'ignore_sticky_posts' => 1,
                'tax_query' => array( array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => array( 
                        'post-format-quote',
                        'post-format-image',
                        'post-format-link',
                        'post-format-audio',
                        'post-format-video',
                        'post-format-gallery',
                        'post-format-aside',
                        'post-format-status',
                        'post-format-chat'
                    ),
                    'operator' => 'NOT IN',
                ) )                   
            );  
      
            $related_query = new Wp_query( $args ); 

            if( $related_query->have_posts() ) : ?>
            
                <section id="related-posts">

                    <header class="clearfix">
                        <h3><?php _e('Related Posts', 'nabia'); ?></h3>
                        <div class="related-carousel-navigation">
                            <a class="relatedcar-prev fa fa-angle-left"></a>
                            <a class="relatedcar-next fa fa-angle-right"></a>
                        </div>
                    </header>
              
                    <div id="related-posts-carousel" class="owl-carousel">
                    
                        <?php 
                            while( $related_query->have_posts() ) {
                            
                                $related_query->the_post();    
                                ?>
                                <div class="item animated zoomIn">
                                    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
                                        <?php 
                                        if( has_post_thumbnail() ) {
                                            the_post_thumbnail( 'grid' );
                                        } else {
                                            echo '<img src="' . get_template_directory_uri() . '/images/no-thumbnail-grid.png" alt="" />';
                                        } ?>
                                    </a>
                                    <?php the_title('<p class="item-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></p>'); ?>
                                </div>
                        <?php } ?>
                         
                    </div>

                </section>
                
            <?php
            endif;
            wp_reset_postdata();  
        }
    }
}

/**
 * Callback function for comments.php template
 *
 * Edit comments area HTML output
 *
 * @param object $comment Comment data
 * @param array $args An array of comment arguments.
 * @param int $depth Comment depth
 * @since Nabia 1.0
 */
if ( ! function_exists( 'nabia_comments' ) ) {
    function nabia_comments( $comment, $args, $depth ) {

        $GLOBALS['comment'] = $comment;
       
        switch ( $comment->comment_type ) :
            case 'pingback' :
            case 'trackback' :
            // Display trackbacks differently than normal comments.
        ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            <p><span class="glyphicon glyphicon-pushpin small-icon"></span> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'nabia' ), '<span class="edit-link">', '</span>' ); ?></p>
        <?php
                break;
            default :
            // Proceed with normal comments.
            global $post;
        ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <div id="comment-<?php comment_ID(); ?>" class="comment">
                <header class="comment-meta comment-author vcard clearfix">
                    <?php
                        echo get_avatar( $comment, 44 );

                        echo '<div class="comment-info">';
                        
                            printf( '<cite class="fn">%1$s %2$s</cite>',
                                get_comment_author_link(),
                                // If current post author is also comment author, make it known visually.
                                ( $comment->user_id === $post->post_author ) ? '<span class="btn btn-xs btn-success"> ' . __( 'Post author', 'nabia' ) . '</span>' : ''
                            );
                            printf( '<span class="comment-meta-time"><i class="fa fa-clock-o small-icon"></i><time datetime="%1$s">%2$s</time></span>',
                                get_comment_time( 'c' ),
                                /* translators: 1: date, 2: time */
                                sprintf( __( '%1$s at %2$s', 'nabia' ), get_comment_date(), get_comment_time() )
                            );
                        echo '</div>';    
                    ?>

                </header><!-- .comment-meta -->

                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation alert alert-info"><?php _e( 'Your comment is awaiting moderation.', 'nabia' ); ?></p>
                <?php endif; ?>

                <div class="comment-content comment clearfix">
                    <?php comment_text(); ?>

                    
                    <?php if( current_user_can( 'edit_comment', $comment->comment_ID ) || comments_open( $post->ID ) ) { ?>

                        <div class="btn-group btn-group-sm reply">
                            
                            <?php edit_comment_link( __( 'Edit', 'nabia' ), '<span class="edit-link btn btn-default">', '</span>' ); ?>
                           
                            <?php $comments_depth = get_option('thread_comments_depth'); ?>
                            
                            <?php if( $depth < $comments_depth && comments_open( $post->ID ) ) { ?>  
                                <div class="btn btn-default">
                                    <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'nabia' ), 'after' => '', 'depth' => $depth, 'max_depth' => $comments_depth ) ) ); ?>
                                </div>
                            <?php } ?>    
                        </div>

                    <?php } ?>
                </div><!-- .comment-content -->

            </div><!-- #comment-## -->
        <?php

            break;
        endswitch; // end comment_type check
    }
}

/**
 * Displays a quick navigation between posts with thumbnail images
 *
 * @since Nabia 1.0
 */
if(!function_exists('nabia_posts_navigation')) {
    function nabia_posts_navigation() {
        
        if( nabia_theme_mod('nabia_sgpost_navigation') ) { ?>

            <?php
            // Previous
            $prevPost = get_previous_post(true);
            $nextPost = get_next_post(true);
            ?>

            <?php
            if( !$prevPost || !$nextPost ) {
                return;
            }
            ?>
            <div id="post-navigation" class="clearfix">
                
                <?php
                    echo '<div class="previous-post">';

                        if($prevPost) {
                            // Check if post have a thumbnail image
                            if( !get_the_post_thumbnail($prevPost->ID )) {

                                // Return the post title linked to post URL
                                echo '<span class="no-thumb-left">&laquo; <a href="'. esc_url( get_permalink( $prevPost->ID ) ) .'">' . esc_html( get_the_title( $prevPost->ID ) ) . '</a></span>';
                            } else {
                                // Return a thumbnail image with post title
                                echo '<div class="previous-post-img post-thumb-nav">';
                                    $prevthumbnail = get_the_post_thumbnail($prevPost->ID, 'grid' );

                                    echo '<a href="'. esc_url( get_permalink( $prevPost->ID ) ) .'">' . $prevthumbnail . '</a>';
                                    echo '<div class="hover-info">';
                                        echo '<span class="nav-label"><i class="glyphicon glyphicon-circle-arrow-left small-icon"></i>'. __('Previous post', 'nabia') . '</span>';
                                        previous_post_link('<span class="post-title">%link</span>','%title', TRUE);
                                    echo '</div>';    
                                echo '</div>';
                            }

                        }
                    echo '</div>';

                    // Next
                    echo '<div class="next-post">';
                        
                        if($nextPost) {
                            // Check if post have a thumbnail image
                            if( !get_the_post_thumbnail($nextPost->ID )) {

                                // Return the post title linked to post URL
                                echo '<span class="no-thumb-right"><a href="'. esc_url( get_permalink( $nextPost->ID ) ) .'">' . esc_html( get_the_title( $nextPost->ID ) ) . '</a> &raquo;</span>';
                            } else {
                                // Return a thumbnail image with post title
                                echo '<div class="next-post-img post-thumb-nav">';
                                    $nextthumbnail = get_the_post_thumbnail($nextPost->ID, 'grid' );
                                    
                                    echo '<a href="'. esc_url( get_permalink( $nextPost->ID ) ) .'">' . $nextthumbnail . '</a>';
                                    echo '<div class="hover-info">';
                                        echo '<span class="nav-label"><i class="glyphicon glyphicon-circle-arrow-right small-icon"></i>'. __('Next post', 'nabia') . '</span>';
                                        next_post_link('<span class="post-title">%link</span>','%title', TRUE);
                                    echo '</div>';
                                echo '</div>';
                            }
                        }
                    echo '</div>';
                ?>
            </div>
        <?php
        }
        
    }
}

/**
 * Displays a quick navigation between posts with text links
 *
 * @since Nabia 1.0
 */
if(!function_exists('nabia_links_navigation')) {
    function nabia_links_navigation() {
        ?>
        <div class="navigation">
        <div class="alignleft"><?php previous_posts_link( __('&laquo; Previous Entries', 'nabia') ); ?></div>
        <div class="alignright"><?php next_posts_link( __('Next Entries &raquo;', 'nabia'), ''); ?></div>
        </div>
        <?php
    }
}

/**
 * Displays Nabia post tags with the number of posts tagged under the same tag in the right
 *
 * @since Nabia 1.0
 */
if(!function_exists('nabia_post_tags')) {
    function nabia_post_tags() {
                                
        $post_tags = get_the_tags();

        if( $post_tags ) :

            echo '<ul class="tags">';

                foreach ($post_tags as $tag) {

                    $tag_info = get_term_by( 'name', $tag->name, 'post_tag' );
                    $tags[] = $tag->name;

                    echo '<li class="tag-body">';
                        echo '<a class="taglink" href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a>';
                        echo '<span class="tag-count" title="' . sprintf( __('%u posts tagged under %s', 'nabia'), $tag_info->count, $tag->name ) . '">' . $tag_info->count . '</span>';
                    echo '</li>';
                }

            echo '</ul>';

        endif;

    }
}

/**
 * Displays a icon for each post format
 *
 * @since Nabia 1.0
 */
if(!function_exists('nabia_post_format_icon')) {
    function nabia_post_format_icon() {

        $format = get_post_format();
    
        switch ( $format ) {
            case 'video':
                $html = '<a href="'. esc_url( get_post_format_link( 'video' ) ) .'"><span class="glyphicon glyphicon-facetime-video post-format-icon" data-toggle="tooltip" data-placement="top" title="' . __('Video', 'nabia') . '"></span></a>';
                break;
            case 'audio':
                $html = '<a href="'. esc_url( get_post_format_link( 'audio' ) ) .'"><span class="glyphicon glyphicon-music post-format-icon" data-toggle="tooltip" data-placement="top" title="' . __('Audio', 'nabia') . '"></span></a>';
                break;                
            case 'gallery':
                $html = '<a href="'. esc_url( get_post_format_link( 'gallery' ) ) .'"><span class="glyphicon glyphicon-camera post-format-icon" data-toggle="tooltip" data-placement="top" title="' . __('Photo Gallery', 'nabia') . '"></span></a>';
                break;
            case 'quote':
                $html = '<a href="'. esc_url( get_post_format_link( 'quote' ) ) .'"><span class="fa fa-quote-left post-format-icon" data-toggle="tooltip" data-placement="top" title="' . __('Quote', 'nabia') . '"></span></a>';
                break;
            case 'link':
                $html = '<a href="'. esc_url( get_post_format_link( 'link' ) ) .'"><span class="glyphicon glyphicon-link post-format-icon" data-toggle="tooltip" data-placement="top" title="' . __('Link', 'nabia') . '"></span></a>';
                break;
            case 'status':
                $html = '<a href="'. esc_url( get_post_format_link( 'status' ) ) .'"><span class="glyphicon glyphicon-send post-format-icon" data-toggle="tooltip" data-placement="top" title="' . __('Status', 'nabia') . '"></span></a>';
                break;
            case 'chat':
                $html = '<a href="'. esc_url( get_post_format_link( 'chat' ) ) .'"><span class="fa fa-comments post-format-icon" data-toggle="tooltip" data-placement="top" title="' . __('Chat', 'nabia') . '"></span></a>';
                break;
            case 'aside':
                $html = '<a href="'. esc_url( get_post_format_link( 'aside' ) ) .'"><span class="glyphicon glyphicon-info-sign post-format-icon" data-toggle="tooltip" data-placement="top" title="' . __('Aside', 'nabia') . '"></span></a>';
                break;
            case 'image':
                $html = '<a href="'. esc_url( get_post_format_link( 'image' ) ) .'"><span class="glyphicon glyphicon-picture post-format-icon" data-toggle="tooltip" data-placement="top" title="' . __('Image', 'nabia') . '"></span></a>';
                break;                                                            
            default:
                $html = '<a href="'. esc_url( get_home_url( '', 'archives' ) ) .'"><span class="fa fa-book post-format-icon" data-toggle="tooltip" data-placement="top" title="' . __('Blog Post', 'nabia') . '"></span></a>';
                break;
        }

        return $html;
    }
}

/**
* Converts hexdec color string to rgb(a) string
*
* @link http://mekshq.com/how-to-convert-hexadecimal-color-code-to-rgb-or-rgba-using-php/
*
* @param string $color The hex color to be converted to rgb(a).
* @param int $opacity Desired opacity for rgba color. If false, a rgb color will be returned.
* @return string Rgb(a) color string
*/
if( !function_exists('nabia_hex2rgba') ) {
    function nabia_hex2rgba($color, $opacity = false) {

        $default = 'rgb(0,0,0)';

        //Return default if no color provided
        if(empty($color))
              return $default; 

            //Sanitize $color if "#" is provided 
            if ($color[0] == '#' ) {
                $color = substr( $color, 1 );
            }

            //Check if color has 6 or 3 characters and get values
            if (strlen($color) == 6) {
                    $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
            } elseif ( strlen( $color ) == 3 ) {
                    $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
            } else {
                    return $default;
            }

            //Convert hexadec to rgb
            $rgb =  array_map('hexdec', $hex);

            //Check if opacity is set(rgba or rgb)
            if($opacity){
                if(abs($opacity) > 1)
                    $opacity = 1.0;
                $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
            } else {
                $output = 'rgb('.implode(",",$rgb).')';
            }

        return $output;
    }
}

/**
 * Displays the post author, date, comments number
 *
 * @since Nabia 1.0
 */
if( !function_exists('nabia_entry_meta') ) {
    function nabia_entry_meta() {
        
        $format_icon = nabia_theme_mod('nabia_post_format_icons');
        ?>
        <footer class="entry-meta <?php echo $format_icon; ?>">
            <?php if( $format_icon == 'format-icon-enabled' ) { ?>
                <div class="entry-post-format"><?php echo nabia_post_format_icon(); ?></div>
            <?php } ?>
            <ul>
                <li>
                    <span class="glyphicon glyphicon-user small-icon"></span>
                    <?php the_author_posts_link(); ?>
                    <span class="splitter">&#47;</span>
                </li>
                <li>
                    <span class="glyphicon glyphicon-calendar small-icon"></span>
                    <a href='<?php echo esc_url( get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d') ) ); ?>'>
                        <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( get_option('date_format') ); ?></time>
                    </a>
                    <span class="splitter">&#47;</span>
                </li>
                <li>
                    <span class="glyphicon glyphicon-comment small-icon"></span>
                    <a href="<?php echo esc_url( get_comments_link() ); ?>">
                        <?php comments_number( __('No comments', 'nabia'), __('One comment', 'nabia'), __('% comments', 'nabia') ); ?>
                    </a>
                </li>
            </ul>

        </footer>
        <?php
    }
}

/**
 * Get author's social profiles for single posts.
 *
 * @since Nabia 1.0
 */
if( !function_exists('nabia_author_social') ) {
    function nabia_author_social() {
        $author_id = get_the_author_meta('ID');
        ?>
        <ul class="author-social-icons">
        <?php
            if( get_user_meta($author_id, 'facebook', true) )  
            echo '<li><a href="' . esc_url( get_user_meta($author_id, 'facebook', true) ) . '" title="'. __('Facebook', 'nabia') .'"><span class="fa fa-facebook-square fa-2x"></span></a></li>';
            if( get_user_meta($author_id, 'twitter', true) )  
            echo '<li><a href="' . esc_url( get_user_meta($author_id, 'twitter', true) ) . '" title="'. __('Twitter', 'nabia') .'"><span class="fa fa-twitter-square fa-2x"></span></a></li>';
            if( get_user_meta($author_id, 'googleplus', true) )  
            echo '<li><a href="' . esc_url( get_user_meta($author_id, 'googleplus', true) ) . '" title="'. __('Google Plus', 'nabia') .'"><span class="fa fa-google-plus-square fa-2x"></span></a></li>';
            if( get_user_meta($author_id, 'pinterest', true) )  
            echo '<li><a href="' . esc_url( get_user_meta($author_id, 'pinterest', true) ) . '" title="'. __('Pinterest', 'nabia') .'"><span class="fa fa-pinterest-square fa-2x"></span></a></li>';                                                                                                                                                                                                        
            ?>
        </ul>
        <?php
    }
}

/**
 * Adds Facebook, Twitter, Google Plus and Pinterest inputs to user settings.
 *
 * @param int $user The id of the user.
 * @since Nabia 1.0
 */
if(!function_exists('nabia_add_custom_user_profile_fields')) {
    function nabia_add_custom_user_profile_fields( $user ) {
    ?>
        <h3><?php _e('Social profiles', 'nabia'); ?></h3>
        
        <table class="form-table">
            <tr>
                <th>
                    <label for="facebook"><?php _e('Facebook page', 'nabia'); ?>
                </label></th>
                <td>
                    <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description"><?php _e('Please enter your Facebook address.', 'nabia'); ?></span>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="twitter"><?php _e('Twitter page', 'nabia'); ?>
                </label></th>
                <td>
                    <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description"><?php _e('Please enter your Twitter address.', 'nabia'); ?></span>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="googleplus"><?php _e('Google Plus page', 'nabia'); ?>
                </label></th>
                <td>
                    <input type="text" name="googleplus" id="googleplus" value="<?php echo esc_attr( get_the_author_meta( 'googleplus', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description"><?php _e('Please enter your Google Plus address.', 'nabia'); ?></span>
                </td>
            </tr>         
            <tr>
                <th>
                    <label for="pinterest"><?php _e('Pinterest page', 'nabia'); ?>
                </label></th>
                <td>
                    <input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'pinterest', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description"><?php _e('Please enter your Pinterest address.', 'nabia'); ?></span>
                </td>
            </tr>                
        </table>
    <?php
    }
}

/**
 * Save & Update Facebook, Twitter, Google Plus and Pinterest inputs from user settings.
 *
 * @param int $user_id The id of the user.
 * @since Nabia 1.0
 */
function nabia_save_custom_user_profile_fields( $user_id ) {
    
    if ( !current_user_can( 'edit_user', $user_id ) )
        return FALSE;
    
        $facebook = isset( $_POST['facebook'] ) ? sanitize_text_field( $_POST['facebook'] ) : "";
        $twitter = isset( $_POST['twitter'] ) ? sanitize_text_field( $_POST['twitter'] ) : "";
        $googleplus = isset( $_POST['googleplus'] ) ? sanitize_text_field( $_POST['googleplus'] ) : "";
        $pinterest = isset( $_POST['pinterest'] ) ? sanitize_text_field( $_POST['pinterest'] ) : "";

        update_user_meta( $user_id, 'facebook', $facebook );
        update_user_meta( $user_id, 'twitter', $twitter );
        update_user_meta( $user_id, 'googleplus', $googleplus );
        update_user_meta( $user_id, 'pinterest', $pinterest );
}

add_action( 'show_user_profile', 'nabia_add_custom_user_profile_fields' );
add_action( 'edit_user_profile', 'nabia_add_custom_user_profile_fields' );

add_action( 'personal_options_update', 'nabia_save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'nabia_save_custom_user_profile_fields' );


/**
 * Automatically delete the featured carousel / photo gallery widget transient on post save, excepting the autosave.
 *
 * @since Nabia 1.0
 */
function nabia_del_carousel_transient_on_post_save() {

    // Return false for autosave
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
        return;

    delete_transient( 'featured-content' );
    delete_transient( 'photo_gal_widget' );
}
add_action( 'save_post', 'nabia_del_carousel_transient_on_post_save' );

/**
 * Automatically delete the featured carousel transient on post trash and on customizer save hooks.
 *
 * @since Nabia 1.0
 */
function nabia_delete_carousel_transients() {
    delete_transient( 'featured-content' );
}
add_action('wp_trash_post', 'nabia_delete_carousel_transients');
add_action('customize_save', 'nabia_delete_carousel_transients');

/**
 * Displays a post excerpt with a custom length and a custom "more" text.
 * This function works inside loop.
 *
 * @param int $words The number of words to display before the read more text will be appended.
 * @param string $more The text that will be displayed after the specified number of words are shown.
 * @return string The custom excerpt text.
 * @since Nabia 1.0
 */
if(!function_exists('nabia_custom_excerpt')) {
    function nabia_custom_excerpt( $words = 20, $more = ' ... ' ) {
        $text = get_the_content();
        $trimmed = wp_trim_words( $text, $words, $more );
        return $trimmed;
    }
}

/**
* Add style for TinyMCE visual editor
* 
* @since Nabia 1.0
*/
function nabia_add_editor_style() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'after_setup_theme', 'nabia_add_editor_style' );