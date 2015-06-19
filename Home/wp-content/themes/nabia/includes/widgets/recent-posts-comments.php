<?php 
/**
* Most recent posts / Comments
*
* Display a tabbed widget with latest posts/comments.
*
* @package WordPress
* @subpackage Nabia
* @since Nabia 1.0
*/

function nabia_recent_posts_widget() {
    register_widget('Nabia_Recent_Posts_Widget');
}
add_action('widgets_init', 'nabia_recent_posts_widget');

class Nabia_Recent_Posts_Widget extends WP_Widget {
  
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'recent-posts-widget',
            'description' => __('A widget to display the most recent posts & comments.', 'nabia')
        );

        parent::__construct( 'recent_posts', __('Nabia: Recent Posts / Comments', 'nabia'), $widget_ops );
    }    


    function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters('widget_title', $instance['title'] );

        echo $before_widget;

        if ( $title )
            echo $before_title . $title . $after_title;

        $postsnr = is_integer( $instance['number_of_posts'] ) ? $instance['number_of_posts'] : 5;
        global $post;
        ?>

        <div class="nabia-recent-posts-widget-main row">
            
            <div class="col-lg-12">

                <ul id="tabs" class="nav recent-posts-tabs" data-tabs="tabs">
                    <li class="active"><a href="#recent-posts-tab" data-toggle="tab"><?php _e('Recent Posts', 'nabia'); ?></a></li>
                    <li><a href="#recent-comments-tab" data-toggle="tab"><?php _e('Commments', 'nabia'); ?></a></li>
                </ul>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="recent-posts-tab">


                        <ul class="recent-posts">
                        <?php

                            if( false === ( $transient = get_transient('rec_posts_widget') ) ) {

                                $args = array( 
                                    'post_type' => 'post',
                                    'posts_per_page' => $postsnr,
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
                                
                                $recent_posts = get_posts( $args );
             
                                if( $recent_posts ) {
                                                                        
                                    foreach ( $recent_posts as $post ) : setup_postdata( $post );

                                        $day = get_the_time('j');
                                        $month = get_the_time('M');
                                        $title = get_the_title();
                                        $permalink = get_the_permalink();
                                        $thumbnail = get_the_post_thumbnail( $post->ID, 'grid', array('class' => 'rec-post-thumbnail') );
                                        $excerpt = nabia_custom_excerpt(10);
                                        ?>

                                        <li>
                                            
                                            <a class="thumbnail-img" href="<?php echo esc_url( $permalink ); ?>">
                                                <div class="date">
                                                    <span class="day"><?php echo $day; ?></span>
                                                    <span class="month"><?php echo $month; ?></span>
                                                </div>
                                                <?php if( has_post_thumbnail() ) {
                                                    echo $thumbnail;
                                                } else {
                                                    echo '<img class="rec-post-thumbnail" src="' . get_template_directory_uri() . '/images/no-thumbnail-grid.png" alt="" />';
                                                }
                                                ?>
                                            </a>    
                                            
                                            <div class="title-description">
                                                <a class="title" href="<?php echo esc_url( $permalink ); ?>" title="<?php echo esc_attr( $title ); ?>"><?php echo esc_html( $title ); ?></a>
                                                <p>
                                                    <?php echo esc_html( $excerpt ); ?>
                                                </p>
                                            </div>
                                        </li>

                                        <?php
                                        $value[] = array(
                                            'day'       => $day,
                                            'month'     => $month,
                                            'title'     => $title,
                                            'permalink' => $permalink,
                                            'thumbnail' => $thumbnail,
                                            'excerpt'   => $excerpt,
                                        );

                                        
                                    endforeach;
                                    set_transient('rec_posts_widget', $value, 60*60);
                                    wp_reset_postdata();
     
                                }
                            
                            } else {

                                if( $transient ) {
                                    
                                    foreach ($transient as $key) {

                                        $day = $key['day'];
                                        $month = $key['month'];
                                        $title = $key['title'];
                                        $permalink = $key['permalink'];
                                        $thumbnail = $key['thumbnail'];
                                        $excerpt = $key['excerpt'];
                                        ?>

                                         <li>
                                            <a class="thumbnail-img" href="<?php echo esc_url( $permalink ); ?>">
                                                <div class="date">
                                                    <span class="day"><?php echo $day; ?></span>
                                                    <span class="month"><?php echo $month; ?></span>
                                                </div>
                                                <?php if( $thumbnail ) {
                                                    echo $thumbnail;
                                                } else {
                                                    echo '<img class="rec-post-thumbnail" src="' . get_template_directory_uri() . '/images/no-thumbnail-grid.png" alt="" />';
                                                } ?>
                                            </a>    
                                            
                                            <div class="title-description">
                                                <a class="title" href="<?php echo esc_url( $permalink ); ?>" title="<?php echo esc_attr( $title ); ?>"><?php echo esc_html( $title ); ?></a>
                                                <p>
                                                    <?php echo esc_html( $excerpt ); ?>
                                                </p>
                                            </div>
                                        </li>    

                                    <?php
                                    } // foreach

                                }

                            }
                        ?>
                        </ul>


                    </div>

                    <div class="tab-pane" id="recent-comments-tab">
                        
                        <?php
                        $comm_nr = is_integer( $instance['number_of_comments'] ) ? $instance['number_of_comments'] : 5;
                        $comments = get_comments( array( 'number' => $comm_nr, 'status' => 'approve' ) ); 
                        ?>

                        <ul class="recent-comments">

                            <?php foreach ( $comments as $comment ) : ?>
                                
                                <li>
                                    
                                    <span class="fa fa-comments-o recent-comm-icon"></span>
                                    
                                    <div class="rec-comm-info">
                                        
                                        <?php $post_id =  $comment->comment_post_ID; ?>
                                        <p>
                                            <?php echo esc_html( $comment->comment_author ); ?>
                                            <?php _e('on', 'nabia'); ?>
                                            <a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
                                                <?php echo esc_html( get_the_title( $post_id ) ); ?>
                                            </a>
                                            <i><?php echo $comment->comment_date_gmt; ?></i>
                                        </p>

                                    </div>

                                </li>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                </div>


            </div>
            
        </div>

        <?php

        echo $after_widget;
    }
 
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        delete_transient('rec_posts_widget');

        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['number_of_posts'] = (int) $new_instance['number_of_posts'];
        $instance['number_of_comments'] = (int) $new_instance['number_of_comments'];


        return $instance;
    }
        
    // Widget HTML BackEnd Forms for widget options.
    function form( $instance ) {

        //Set default settings
        $defaults = array(
            'title' => __( 'Recent Posts & Comments', 'nabia' ),
            'number_of_posts' => 5,
            'number_of_comments' => 5
        );
        $instance = wp_parse_args( (array) $instance, $defaults );

        $title = $instance['title'];
        $number_of_posts = (int) $instance['number_of_posts'];
        $number_of_comments = (int) $instance['number_of_comments'];
       
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'nabia' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'number_of_posts' ); ?>"><?php _e( 'Number of posts:', 'nabia' ); ?></label>
            <input type="number" name="<?php echo $this->get_field_name( 'number_of_posts' ); ?>" id="<?php echo $this->get_field_id( 'number_of_posts' ); ?>" class="widefat" min="1" max="25" value="<?php echo $number_of_posts ? $number_of_posts : false; ?>" >
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'number_of_comments' ); ?>"><?php _e( 'Number of comments:', 'nabia' ); ?></label>
            <input type="number" name="<?php echo $this->get_field_name( 'number_of_comments' ); ?>" id="<?php echo $this->get_field_id( 'number_of_comments' ); ?>" class="widefat" min="1" max="25" value="<?php echo $number_of_comments ? $number_of_comments : false; ?>" >
        </p>

    <?php
    }
}
?>