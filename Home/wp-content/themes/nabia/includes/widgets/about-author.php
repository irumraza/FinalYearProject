<?php 
/**
* About blog author widget.
*
* Use this widget to display photos and info about blog author.
*
* @package WordPress
* @subpackage Nabia
* @since Nabia 1.0
*/

function nabia_about_me_widget() {
    register_widget('Nabia_About_Me_Widget');
}
add_action('widgets_init', 'nabia_about_me_widget');

class Nabia_About_Me_Widget extends WP_Widget {

    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'about_author_widget',
            'description' => __('A widget to display few things about blog author.', 'nabia')
        );

        parent::__construct( 'about_author_widget', __('Nabia: About Author', 'nabia'), $widget_ops );

        add_action('admin_enqueue_scripts', array($this, 'load_assets'));

    }

    // Include required files for media upload
    public function load_assets($hook) {
        if( $hook != 'widgets.php' || $hook == 'customize.php' ) 
        return;
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload_media_widget', get_template_directory_uri() . '/includes/widgets/js/upload-media.js', array('jquery','media-upload','thickbox'));
        wp_enqueue_style('thickbox');
    }

    function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters('widget_title', $instance['title'] );

        echo $before_widget;

        if ( $title )
            echo $before_title . $title . $after_title;

        // Store all the images into an array        
        $images = array();

        $images[] = trim( $instance['image_1'] );
        $images[] = trim( $instance['image_2'] );
        $images[] = trim( $instance['image_3'] );
        $images[] = trim( $instance['image_4'] );
        $images[] = trim( $instance['image_5'] );
        $autoplay = $instance['slider_autoplay'] ? 'true' : 'false';

        // Count the number of valid images
        $images_num = count( array_filter($images) );
    
        $val_images = array_filter( $images );

        ?>

        <div class="nabia-about-me-widget-main row">
            
            <div class="col-lg-12">

                <?php if( $val_images ) { ?>
                    <div class="aslider">
                        <div class="about-author-slider owl-carousel owl-theme" data-autoplay="<?php echo $autoplay; ?>">
                            <?php foreach ( $val_images as $imgurl ) { ?>
                                <div class="item">
                                    <img src="<?php echo esc_url( $imgurl ); ?>" class="author-photo" alt="" />
                                </div>
                            <?php } ?>
                        </div>

                        <div class="navigation clearfix">
                            <a class="fa fa-angle-left anav-prev"></a>
                            <a class="fa fa-angle-right anav-next"></a>
                        </div>
                    </div>
                <?php } ?>

                <p class="description">
                    <?php echo esc_html( $instance['description'] ); ?>
                </p>

            </div>
            
        </div>

        <?php

        echo $after_widget;
    }
 
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['image_1'] = $new_instance['image_1'];
        $instance['image_2'] = $new_instance['image_2'];
        $instance['image_3'] = $new_instance['image_3'];
        $instance['image_4'] = $new_instance['image_4'];
        $instance['image_5'] = $new_instance['image_5'];
        $instance['description'] = $new_instance['description'];
        $instance['slider_autoplay'] = $new_instance['slider_autoplay'];


        return $instance;
    }
        
    // Widget HTML BackEnd Forms for widget options.
    function form( $instance ) {

        //Set up default settings.
        $defaults = array( 
            'title' => __('About Author', 'nabia'),
            'image_1' => '',
            'image_2' => '',
            'image_3' => '',
            'image_4' => '',
            'image_5' => '',
            'description' => __('Few things about the blog author.', 'nabia'),
            'slider_autoplay' => 0
        );
        $instance = wp_parse_args( (array) $instance, $defaults );

        $title = $instance['title'];
        $image_1 = trim( $instance['image_1'] );
        $image_2 = trim( $instance['image_2'] );
        $image_3 = trim( $instance['image_3'] );
        $image_4 = trim( $instance['image_4'] );
        $image_5 = trim( $instance['image_5'] );
        $description = $instance['description'];
       
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'nabia' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'image_1' ); ?>"><?php _e( 'Image 1:', 'nabia' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image_1' ); ?>" id="<?php echo $this->get_field_id( 'image_1' ); ?>" class="widefat" type="text" size="36"  value="<?php echo( isset( $image_1 ) ? esc_url( $image_1 ) : false); ?>" />
            <input class="upload_image_button button button-primary" type="button" value="<?php _e('Upload Image', 'nabia'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'image_2' ); ?>"><?php _e( 'Image 2:', 'nabia' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image_2' ); ?>" id="<?php echo $this->get_field_id( 'image_2' ); ?>" class="widefat" type="text" size="36"  value="<?php echo( isset( $image_2 ) ? esc_url( $image_2 ) : false); ?>" />
            <input class="upload_image_button button button-primary" type="button" value="<?php _e('Upload Image', 'nabia'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'image_3' ); ?>"><?php _e( 'Image 3:', 'nabia' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image_3' ); ?>" id="<?php echo $this->get_field_id( 'image_3' ); ?>" class="widefat" type="text" size="36"  value="<?php echo( isset( $image_3 ) ? esc_url( $image_3 ) : false); ?>" />
            <input class="upload_image_button button button-primary" type="button" value="<?php _e('Upload Image', 'nabia'); ?>" />
        </p>
         <p>
            <label for="<?php echo $this->get_field_id( 'image_4' ); ?>"><?php _e( 'Image 4:', 'nabia' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image_4' ); ?>" id="<?php echo $this->get_field_id( 'image_4' ); ?>" class="widefat" type="text" size="36"  value="<?php echo( isset( $image_4 ) ? esc_url( $image_4 ) : false); ?>" />
            <input class="upload_image_button button button-primary" type="button" value="<?php _e('Upload Image', 'nabia'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'image_5' ); ?>"><?php _e( 'Image 5:', 'nabia' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image_5' ); ?>" id="<?php echo $this->get_field_id( 'image_5' ); ?>" class="widefat" type="text" size="36"  value="<?php echo( isset( $image_5 ) ? esc_url( $image_5 ) : false); ?>" />
            <input class="upload_image_button button button-primary" type="button" value="<?php _e('Upload Image', 'nabia'); ?>" />
        </p>               

        <p>
            <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:', 'nabia' ); ?></label>
            <textarea name="<?php echo $this->get_field_name( 'description' ); ?>" id="<?php echo $this->get_field_id( 'description' ); ?>" class="widefat"><?php echo esc_textarea( $description ); ?></textarea>
        </p>

        <p>
            <label>
                <input class="checkbox" type="checkbox" <?php checked($instance['slider_autoplay'], 'on'); ?> id="<?php echo $this->get_field_id('slider_autoplay'); ?>" name="<?php echo $this->get_field_name('slider_autoplay'); ?>" />
                <?php _e('Enable slider autoplay', 'nabia'); ?>
            </label>
        </p>

    <?php
    }
}
?>