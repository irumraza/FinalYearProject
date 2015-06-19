<?php 
/**
* Login Form
*
* Displays a nice login form.
*
* @package WordPress
* @subpackage Nabia
* @since Nabia 1.0
*/

function nabia_login_widget_init() {
    register_widget('Nabia_Login_Widget');
}
add_action('widgets_init', 'nabia_login_widget_init');

class Nabia_Login_Widget extends WP_Widget {
  
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'login-widget',
            'description' => __('A widget to display a nice login form.', 'nabia')
        );

        parent::__construct( 'login_widget', __('Nabia: Login Form', 'nabia'), $widget_ops );
    }

    function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters('widget_title', $instance['title'] );

        echo $before_widget;

        if ( $title )
            echo $before_title . $title . $after_title;

            global $current_user;
            get_currentuserinfo();

            ?>
            <div class="nabia-custom-login-widget-main clearfix">
                <?php
                if ( ! is_user_logged_in() ) { // Display WordPress login form:
                    $args = array(
                        'redirect' => site_url( $_SERVER['REQUEST_URI'] ), 
                        'form_id' => 'nabia-loginform-custom',
                        'label_username' => __( 'Username', 'nabia' ),
                        'label_password' => __( 'Password', 'nabia' ),
                        'label_remember' => __( 'Remember me', 'nabia' ),
                        'label_log_in' => __( 'Login', 'nabia' ),
                    );
                    ?>

                    <div class="lp-reg">
                        <a href="<?php echo esc_url( wp_registration_url() ); ?>" class="register-link" title="<?php _e('Register', 'nabia'); ?>"><?php _e('Register', 'nabia'); ?></a>
                        <a href="<?php echo esc_url( wp_lostpassword_url( get_permalink() ) ); ?>" class="recover-password-link" title="<?php _e('Lost Password', 'nabia'); ?>"><?php _e('Lost Password', 'nabia'); ?></a>
                    </div>
                    
                    <?php
                    wp_login_form( $args );

                } else { // If logged in ?>

                    <ul class="nabia-meta-log">
                    
                        <li class="user-welcome-message">
                            <?php
                                $user_nick = $current_user->display_name;
                                $welcome_message = str_replace( '#user_nickname#', $user_nick, $instance['welcome_message']);
                                echo esc_html( $welcome_message );
                            ?>
                        </li>

                        <?php if( $instance['display_avatar'] ) : ?>
                            <li class="current-user-avatar"><a href="<?php echo esc_url( get_author_posts_url( $current_user->ID ) ); ?>"><?php echo get_avatar( $current_user->ID, 80 ); ?></a></li>
                        <?php endif; ?>

                        <li><a href="<?php echo admin_url( 'profile.php' ); ?>"><?php _e('User settings', 'nabia'); ?></a></li>
                        <?php if (current_user_can('manage_options')) : ?>
                            <li><a href="<?php echo esc_url( admin_url() ); ?>"><?php _e('Admin panel', 'nabia'); ?></a></li>
                        <?php endif; ?>                        
                        <li><a href="<?php echo wp_logout_url( $_SERVER['REQUEST_URI'] ); ?>" title="<?php _e('Logout', 'nabia'); ?>"><?php _e('Logout', 'nabia'); ?></a></li>
                    </ul>
                <?php } ?>

            </div>
            <?php 
        echo $after_widget;
    }
 
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['welcome_message'] = strip_tags( $new_instance['welcome_message'] );
        $instance['display_avatar'] = $new_instance['display_avatar'];
    
        return $instance;
    }
        
    function form( $instance ) {

        //Set default settings.
        $defaults = array(
            'title' => __('Login', 'nabia'),
            'display_avatar' => '1',
            'welcome_message' => __('You are logged in as #user_nickname#','nabia')
        );
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'nabia'); ?></label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'welcome_message' ); ?>"><?php _e('Welcome message:', 'nabia'); ?></label>
            <input id="<?php echo $this->get_field_id( 'welcome_message' ); ?>" name="<?php echo $this->get_field_name( 'welcome_message' ); ?>" value="<?php echo esc_attr( $instance['welcome_message'] ); ?>" class="widefat" />
            <small><?php _e('You can type #user_nickname# in the welcome message to display user nickname.', 'nabia'); ?></small>
        </p>

        <p>
            <input type="checkbox" name="<?php echo $this->get_field_name( 'display_avatar' ); ?>" id="<?php echo $this->get_field_id( 'display_avatar' ); ?>" value="1" <?php checked(  $instance['display_avatar'], 1 ); ?>><?php _e('Display avatar image?', 'nabia'); ?>
        </p>

    <?php
    }
}
?>