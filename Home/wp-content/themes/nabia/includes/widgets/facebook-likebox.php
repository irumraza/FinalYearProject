<?php 
/**
* Facebook Likebox
*
* Displays a responsive Facebook likebox.
*
* @package WordPress
* @subpackage Nabia
* @since Nabia 1.0
*/

function nabia_facebook_likebox() {
    register_widget('Nabia_Facebook_Likebox_Widget');
}
add_action('widgets_init', 'nabia_facebook_likebox');

class Nabia_Facebook_Likebox_Widget extends WP_Widget {
  
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'facebook-likebox-widget',
            'description' => __('A widget that allows you to promote your Facebook page.', 'nabia')
        );
        parent::__construct( 'facebook_likebox', __('Nabia: Facebook Likebox', 'nabia'), $widget_ops );
    }


    function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters('widget_title', $instance['title'] );

        echo $before_widget;

        if ( $title )
            echo $before_title . $title . $after_title;
        ?>

        <div class="nabia-facebook-likebox-widget-main">
     
    		<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>


        	<div style="background-color: <?php echo esc_attr( $instance['bg_color'] ); ?>"
            	class="fb-like-box" 
            		data-href="<?php echo esc_url( $instance['page_url'] ); ?>"
            		data-width="242"
            		data-colorscheme="<?php echo $instance['color_scheme']; ?>"
            		data-show-faces="<?php echo $instance['show_faces']; ?>"
            		data-header="<?php echo $instance['show_header']; ?>"
            		data-stream="<?php echo $instance['stream']; ?>"
            		data-show-border="<?php echo $instance['border']; ?>">
        	</div>

        </div>

        <?php
        echo $after_widget;
    }
 

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['page_url'] = esc_url_raw ( $new_instance['page_url'] );
        $instance['color_scheme'] = $new_instance['color_scheme'];
        $instance['show_faces'] = $new_instance['show_faces'];
        $instance['show_header'] = $new_instance['show_header'];
        $instance['stream'] = $new_instance['stream'];
        $instance['border'] = $new_instance['border'];
        $instance['bg_color'] = strip_tags( $new_instance['bg_color'] );

        return $instance;
    }
        
    // Widget HTML BackEnd Forms for widget options.
    function form( $instance ) {

        //Set default settings
        $defaults = array(
            'title' => __( 'Facebook Likebox', 'nabia'),
            'page_url' => 'https://www.facebook.com/FacebookDevelopers',
            'color_scheme' => 'dark',
            'show_faces' => 'true',
            'show_header' => 'true',
            'stream' => 'false',
            'border' => 'false',
            'bg_color' => '#1b1b1b'
        );
        $instance = wp_parse_args( (array) $instance, $defaults );

        $title = $instance['title'];
        $page_url = trim( $instance['page_url'] );
        $color_scheme = trim( $instance['color_scheme'] );
        $bg_color = trim( $instance['bg_color'] );
       
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'nabia' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'page_url' ); ?>"><?php _e( 'Facebook Page URL:', 'nabia' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'page_url' ); ?>" id="<?php echo $this->get_field_id( 'page_url' ); ?>" class="widefat" value="<?php echo $page_url ? $page_url : false; ?>" >
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'color_scheme' ); ?>"><?php _e( 'Color scheme:', 'nabia' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'color_scheme' ); ?>" id="<?php echo $this->get_field_id( 'color_scheme' ); ?>" class="widefat">
            	<option value="light" <?php selected( $instance['color_scheme'], 'light' ); ?>><?php _e('Light', 'nabia'); ?></option>
            	<option value="dark" <?php selected( $instance['color_scheme'], 'dark' ); ?>><?php _e('Dark', 'nabia'); ?></option>
            </select>
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id( 'bg_color' ); ?>"><?php _e( 'Background color:', 'nabia' ); ?></label>
        	<input type="color" name="<?php echo $this->get_field_name( 'bg_color' ); ?>"  id="<?php echo $this->get_field_id( 'bg_color' ); ?>" value="<?php echo $bg_color ? esc_attr( $bg_color ) : false; ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'show_faces' ); ?>"><?php _e( 'Show faces:', 'nabia' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'show_faces' ); ?>" id="<?php echo $this->get_field_id( 'show_faces' ); ?>" class="widefat">
            	<option value="true" <?php selected( $instance['show_faces'], 'true' ); ?>><?php _e('Enabled', 'nabia'); ?></option>
            	<option value="false" <?php selected( $instance['show_faces'], 'false' ); ?>><?php _e('Disabled', 'nabia'); ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'show_header' ); ?>"><?php _e( 'Show header:', 'nabia' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'show_header' ); ?>" id="<?php echo $this->get_field_id( 'show_header' ); ?>" class="widefat">
            	<option value="true" <?php selected( $instance['show_header'], 'true' ); ?>><?php _e('Enabled', 'nabia'); ?></option>
            	<option value="false" <?php selected( $instance['show_header'], 'false' ); ?>><?php _e('Disabled', 'nabia'); ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'stream' ); ?>"><?php _e( 'Stream:', 'nabia' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'stream' ); ?>" id="<?php echo $this->get_field_id( 'stream' ); ?>" class="widefat">
            	<option value="true" <?php selected( $instance['stream'], 'true' ); ?>><?php _e('Enabled', 'nabia'); ?></option>
            	<option value="false" <?php selected( $instance['stream'], 'false' ); ?>><?php _e('Disabled', 'nabia'); ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'border' ); ?>"><?php _e( 'Box border:', 'nabia' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'border' ); ?>" id="<?php echo $this->get_field_id( 'border' ); ?>" class="widefat">
            	<option value="true" <?php selected( $instance['border'], 'true' ); ?>><?php _e('Enabled', 'nabia'); ?></option>
            	<option value="false" <?php selected( $instance['border'], 'false' ); ?>><?php _e('Disabled', 'nabia'); ?></option>
            </select>
        </p>

    <?php
    }
}
?>