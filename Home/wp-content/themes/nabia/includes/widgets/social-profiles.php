<?php 
/**
* Social Profiles
*
* Promote your social profiles/pages.
*
* @package WordPress
* @subpackage Nabia
* @since Nabia 1.0
*/

function nabia_social_profiles() {
    register_widget('Nabia_Social_Profiles_Widget');
}
add_action('widgets_init', 'nabia_social_profiles');

class Nabia_Social_Profiles_Widget extends WP_Widget {
  
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'social-profiles-widget',
            'description' => __('A widget that allows you to promote your social profiles.', 'nabia')
        );

        parent::__construct( 'social_profiles', __('Nabia: Social Profiles', 'nabia'), $widget_ops );
	  
    }


    function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters('widget_title', $instance['title'] );
        $facebook = trim( $instance['facebook'] );
        $twitter = trim( $instance['twitter'] );
        $googleplus = trim( $instance['googleplus'] );
        $youtube = trim( $instance['youtube'] );
        $pinterest = trim( $instance['pinterest'] );
        $vimeo = trim( $instance['vimeo'] );
        $tumblr = trim( $instance['tumblr'] );
        $instagram = trim( $instance['instagram'] );
        $rss_feed = trim( $instance['rss_feed'] );
        $flickr = trim( $instance['flickr'] );
        $linkedin = trim( $instance['linkedin'] );
        $dribbble = trim( $instance['dribbble'] );


        echo $before_widget;

        if ( $title )
            echo $before_title . $title . $after_title;
       
        ?>



        <div class="nabia-social-profiles-widget-main">
     
            <ul class="social-profiles">

                <?php if( $facebook ) { ?>
                    <li><a href="<?php echo esc_url( $facebook ); ?>" aria-hidden="true" target="_blank" title="<?php _e('Facebook', 'nabia'); ?>" class="iconmoon-facebook"></a></li>
                <?php } ?>

                <?php if( $twitter ) { ?>
                    <li><a href="<?php echo esc_url( $twitter ); ?>" aria-hidden="true" target="_blank" title="<?php _e('Twitter', 'nabia'); ?>" class="iconmoon-twitter"></a></li>
                <?php } ?>

                <?php if( $googleplus ) { ?>
                    <li><a href="<?php echo esc_url( $googleplus ); ?>" aria-hidden="true" target="_blank" title="<?php _e('Google Plus', 'nabia'); ?>" class="iconmoon-googleplus"></a></li>
                <?php } ?>    

                <?php if( $youtube ) { ?>    
                    <li><a href="<?php echo esc_url( $youtube ); ?>" aria-hidden="true" target="_blank" title="<?php _e('YouTube', 'nabia'); ?>" class="iconmoon-youtube"></a></li>
                <?php } ?>

                <?php if( $pinterest ) { ?>    
                    <li><a href="<?php echo esc_url( $pinterest ); ?>" aria-hidden="true" target="_blank" title="<?php _e('Pinterest', 'nabia'); ?>" class="iconmoon-pinterest"></a></li>
                <?php } ?>

                <?php if( $vimeo ) { ?>    
                    <li><a href="<?php echo esc_url( $vimeo ); ?>" aria-hidden="true" target="_blank" title="<?php _e('Viemo', 'nabia'); ?>" class="iconmoon-vimeo"></a></li>
                <?php } ?>

                <?php if( $tumblr ) { ?>    
                    <li><a href="<?php echo esc_url( $tumblr ); ?>" aria-hidden="true" target="_blank" title="<?php _e('Tumblr', 'nabia'); ?>" class="iconmoon-tumblr"></a></li>
                <?php } ?>

                <?php if( $instagram ) { ?>    
                    <li><a href="<?php echo esc_url( $instagram ); ?>" aria-hidden="true" target="_blank" title="<?php _e('Instagram', 'nabia'); ?>" class="iconmoon-instagram"></a></li>
                <?php } ?>    

                <?php if( $rss_feed ) { ?>    
                    <li><a href="<?php echo esc_url( $rss_feed ); ?>" aria-hidden="true" target="_blank" title="<?php _e('Rss Feed', 'nabia'); ?>" class="iconmoon-feed"></a></li>
                <?php } ?>    

                <?php if( $flickr ) { ?>    
                    <li><a href="<?php echo esc_url( $flickr ); ?>" aria-hidden="true" target="_blank" title="<?php _e('Flickr', 'nabia'); ?>" class="iconmoon-flickr"></a></li>
                <?php } ?>

                <?php if( $linkedin ) { ?>    
                    <li><a href="<?php echo esc_url( $linkedin ); ?>" aria-hidden="true" target="_blank" title="<?php _e('LinkedIn', 'nabia'); ?>" class="iconmoon-linkedin"></a></li>
                <?php } ?>                

                <?php if( $dribbble ) { ?>    
                    <li><a href="<?php echo esc_url( $dribbble ); ?>" aria-hidden="true" target="_blank" title="<?php _e('Dribbble', 'nabia'); ?>" class="iconmoon-dribbble"></a></li>
                <?php } ?>

            </ul>

        </div>

        <?php

        echo $after_widget;
    }
 

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['facebook'] = strip_tags( $new_instance['facebook'] );
        $instance['twitter'] = strip_tags( $new_instance['twitter'] );
        $instance['googleplus'] = strip_tags( $new_instance['googleplus'] );
        $instance['youtube'] = strip_tags( $new_instance['youtube'] );
        $instance['pinterest'] = strip_tags( $new_instance['pinterest'] );
        $instance['vimeo'] = strip_tags( $new_instance['vimeo'] );
        $instance['tumblr'] = strip_tags( $new_instance['tumblr'] );
        $instance['instagram'] = strip_tags( $new_instance['instagram'] );
        $instance['rss_feed'] = strip_tags( $new_instance['rss_feed'] );
        $instance['flickr'] = strip_tags( $new_instance['flickr'] );
        $instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
        $instance['dribbble'] = strip_tags( $new_instance['dribbble'] );

        return $instance;
    }
        
    // Widget HTML BackEnd Forms for widget options.
    function form( $instance ) {

        //Set up some default widget settings.
        $defaults = array( 
            'title'      => __( 'Follow us', 'nabia'),
            'facebook'   => '',
            'twitter'    => '',
            'googleplus' => '',
            'youtube'    => '',
            'pinterest'  => '',
            'vimeo'      => '',
            'tumblr'     => '',
            'instagram'  => '',
            'flickr'     => '',
            'linkedin'   => '',
            'dribbble'   => '',
            'rss_feed'   => get_bloginfo('rss2_url')
        );

        $instance = wp_parse_args( (array) $instance, $defaults );

        $title = $instance['title'];
        $facebook = trim( $instance['facebook'] );
        $twitter = trim( $instance['twitter'] );
        $googleplus = trim( $instance['googleplus'] );
        $youtube = trim( $instance['youtube'] );
        $pinterest = trim( $instance['pinterest'] );
        $vimeo = trim( $instance['vimeo'] );
        $tumblr = trim( $instance['tumblr'] );
        $instagram = trim( $instance['instagram'] );
        $flickr = trim( $instance['flickr'] );
        $linkedin = trim( $instance['linkedin'] );
        $dribbble = trim( $instance['dribbble'] );
        $rss_feed = trim( $instance['rss_feed'] );
       
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'nabia' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook Page:', 'nabia' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'facebook' ); ?>" id="<?php echo $this->get_field_id( 'facebook' ); ?>" class="widefat" value="<?php echo $facebook ? $facebook : false; ?>" >
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter Page:', 'nabia' ); ?></label>
        	<input type="text" name="<?php echo $this->get_field_name( 'twitter' ); ?>"  id="<?php echo $this->get_field_id( 'twitter' ); ?>" class="widefat" value="<?php echo $twitter ? esc_attr( $twitter ) : false; ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'googleplus' ); ?>"><?php _e( 'Google Plus Profile:', 'nabia' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'googleplus' ); ?>"  id="<?php echo $this->get_field_id( 'googleplus' ); ?>" class="widefat" value="<?php echo $googleplus ? esc_attr( $googleplus ) : false; ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'Youtube Channel:', 'nabia' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'youtube' ); ?>"  id="<?php echo $this->get_field_id( 'youtube' ); ?>" class="widefat" value="<?php echo $youtube ? esc_attr( $youtube ) : false; ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'Pinterest:', 'nabia' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'pinterest' ); ?>"  id="<?php echo $this->get_field_id( 'pinterest' ); ?>" class="widefat" value="<?php echo $pinterest ? esc_attr( $pinterest ) : false; ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e( 'Vimeo page:', 'nabia' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'vimeo' ); ?>"  id="<?php echo $this->get_field_id( 'vimeo' ); ?>" class="widefat" value="<?php echo $vimeo ? esc_attr( $vimeo ) : false; ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e( 'Tumblr page:', 'nabia' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'tumblr' ); ?>"  id="<?php echo $this->get_field_id( 'tumblr' ); ?>" class="widefat" value="<?php echo $tumblr ? esc_attr( $tumblr ) : false; ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram profile:', 'nabia' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'instagram' ); ?>"  id="<?php echo $this->get_field_id( 'instagram' ); ?>" class="widefat" value="<?php echo $instagram ? esc_attr( $instagram ) : false; ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e( 'Flickr:', 'nabia' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'flickr' ); ?>"  id="<?php echo $this->get_field_id( 'flickr' ); ?>" class="widefat" value="<?php echo $flickr ? esc_attr( $flickr ) : false; ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'LinkedIn:', 'nabia' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'linkedin' ); ?>"  id="<?php echo $this->get_field_id( 'linkedin' ); ?>" class="widefat" value="<?php echo $linkedin ? esc_attr( $linkedin ) : false; ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e( 'Dribbble profile:', 'nabia' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'dribbble' ); ?>"  id="<?php echo $this->get_field_id( 'dribbble' ); ?>" class="widefat" value="<?php echo $dribbble ? esc_attr( $dribbble ) : false; ?>">
        </p>        

        <p>
            <label for="<?php echo $this->get_field_id( 'rss_feed' ); ?>"><?php _e( 'Rss Feed:', 'nabia' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'rss_feed' ); ?>"  id="<?php echo $this->get_field_id( 'rss_feed' ); ?>" class="widefat" value="<?php echo $rss_feed ? esc_attr( $rss_feed ) : false; ?>">
        </p>

    <?php
    }
}
?>