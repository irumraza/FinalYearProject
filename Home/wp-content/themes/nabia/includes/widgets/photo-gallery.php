<?php 
/**
* Nabia Photo Gallery Widget
*
* This widget will grab a photo gallery
* Widget uses WordPress Transient API to grab once at 24 H the gallery images for specific post id to lower DB queries.
*
* @link http://codex.wordpress.org/Transients_API
*
* @package WordPress
* @subpackage Nabia
* @since Nabia 1.0
*/

function nabia_photo_gallery_init() {
    register_widget('Nabia_Photo_Gallery_Widget');
}
add_action('widgets_init', 'nabia_photo_gallery_init');

class Nabia_Photo_Gallery_Widget extends WP_Widget {
  
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'photo-gallery-widget',
            'description' => __('A widget to display a photo gallery.', 'nabia')
        );

        parent::__construct( 'photo_gallery_widget', __('Nabia: Photo Gallery', 'nabia'), $widget_ops );
    }

    function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters('widget_title', $instance['title'] );
        $postid = $instance['post'];

        echo $before_widget;


        if ( $title )
            echo $before_title . $title . $after_title;           
            ?>

            <div class="nabia-photo-gallery-widget-main">
            
            <?php 
            if( is_numeric( $postid ) && $postid != '-1' ) {

                echo '<ul class="widget-gallery">';

                    if( false === $galwtransient = get_transient('photo_gal_widget' . $args['widget_id'] . '') ) {


                        $content =  get_post_field('post_content', $postid);
                        preg_match('/\[gallery.*ids=.(.*).\]/', $content, $ids);

                        $attachament_ids = explode(",", $ids[1]);

                            foreach( $attachament_ids as $attachment_id ) {

                               $att =  wp_get_attachment_image_src( $attachment_id, 'full' );
                               $att_sm = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
                               
                               echo '<li><a data-gal="prettyPhoto['. $args['widget_id']  .']" href="' . $att[0] . '"><img src="' . esc_url( $att_sm[0] ) . '" alt="" /></a></li>';

                                $tr_value[] = array(
                                    'full'      => $att[0],
                                    'thumbnail' => $att_sm[0]
                                );

                            }

                            set_transient( 'photo_gal_widget' . $args['widget_id'] . '', $tr_value, 24 * HOUR_IN_SECONDS );
                
                    } else {

                        foreach ( $galwtransient as $key ) {

                            $att = $key['full'];
                            $att_sm = $key['thumbnail'];

                            echo '<li><a data-gal="prettyPhoto['. $args['widget_id']  .']" href="' . $att . '"><img src="' . esc_url( $att_sm ) . '" alt="" /></a></li>';

                        }

                    }

                echo '</ul>';

            } else {
                echo '<p>' . __('No photo gallery to display.', 'nabia') .  '</p>';
            } ?>

            </div>
            <?php 
        echo $after_widget;
    }
 
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        // Delete transient value each time the widget is saved
        delete_transient('photo_gal_widget' . $args['widget_id'] . '');

        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['post'] = (int)( $new_instance['post'] );
    
        return $instance;
    }
        
    function form( $instance ) {

        //Set up default settings
        $defaults = array(
            'title' => __('Photo Gallery', 'nabia'),
            'post' => -1
        );
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'nabia'); ?></label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'post' ); ?>"><?php _e( 'Post:', 'nabia' ); ?></label>
            <?php
            $p = isset( $instance['post'] ) ? (int) $instance['post'] : 0;

            $args = array(
                'post_status'   => 'publish',
                'post_type' => 'post',
                'post_format' => 'post-format-gallery',
            );

            $galleries = new WP_Query( $args );

            $output = '<select class="widefat" name="' . $this->get_field_name( 'post' ) . '" id="' . $this->get_field_id( 'post' ) . '">';
            $output .= '<option value="-1">' . __( 'Select a post', 'nabia' ) . '</option>';
            
            if ( $galleries->have_posts() ) :
                while ( $galleries->have_posts() ) : $galleries->the_post();
                    $output .= '<option value="' . get_the_ID() . '"' . selected( $p, get_the_ID(), false ) . '>'. get_the_title() . '</option>';
                endwhile;
                $output .= '</select>';
            else :
                $output .= '</select>';
                $output .= '<br/><small class="description">' . __( 'You don\'t have any posts under the Gallery post format. Please add one.', 'nabia') . '</small>';
            endif;
            wp_reset_postdata();

            echo $output;
            ?>
        </p>

    <?php
    }
}
?>