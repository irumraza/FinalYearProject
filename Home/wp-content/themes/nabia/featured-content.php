<?php
/**
 * The template for displaying featured posts carousel
 *
 * Using WordPress Transient API to lower the database queries
 * @link http://codex.wordpress.org/Transients_API
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 */
?>

<?php
$display_in_carousel = nabia_theme_mod('nabia_carousel_content');

$args = array();

$args['post_type'] = 'post';
$args['posts_per_page'] = 10;
$args['ignore_sticky_posts'] = 1;

if( $display_in_carousel == 'individual_posts' ) {
    $args['meta_key'] = 'nabia_cmb_featured_post';
    $args['meta_value'] = 'yes';
} else {
    $args['category_name'] = nabia_theme_mod('nabia_carousel_category');
}
?>

<div id="featured-carousel" class="container">

    <div id="content-carousel" class="owl-carousel">


        <?php if( false === ( $transient = get_transient('featured-content') ) ) {

            $featured = new WP_Query( $args );
                
            while( $featured->have_posts() ) : $featured->the_post();

                $title = get_the_title();
                $permalink = get_the_permalink();
                $thumbnail = get_the_post_thumbnail( get_the_ID(), 'nabia-grid');

                ?>

                    <div class="carousel-item animated zoomIn">
                        
                        <?php if( has_post_thumbnail() ) {
                            echo $thumbnail;
                        } else {
                            echo '<img src="' . get_template_directory_uri() . '/images/no-thumbnail-grid.png" alt="" />';
                        } ?>

                        <div class="mask">
                            <a class="carousel-item-title" href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
                            <div class="read-more-icon">
                                <a href="<?php echo esc_url( $permalink ); ?>" title="<?php echo esc_attr( $title ); ?>"><span class="glyphicon glyphicon-link"></span></a>
                            </div>
                        </div>

                    </div>

                <?php
                // Save transient value
                $value[] = array(
                    'title' => $title,
                    'permalink' => $permalink,
                    'thumbnail' => $thumbnail
                );

            endwhile;
 
            set_transient( 'featured-content', $value, 24 * HOUR_IN_SECONDS );
            wp_reset_postdata();

        } else {
 
            // Use transient value
            foreach ( $transient as $key ) {
                
                $title = $key['title'];
                $thumbnail = $key['thumbnail'];
                $permalink = $key['permalink'];
                ?>

                    <div class="carousel-item animated zoomIn">
                        
                        <?php 
                        if( $thumbnail ) {
                            echo $thumbnail;
                        } else {
                            echo '<img src="' . get_template_directory_uri() . '/images/no-thumbnail-grid.png" alt="" />';
                        } ?>

                        <div class="mask">
                            <a class="carousel-item-title" href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
                            <div class="read-more-icon">
                                <a href="<?php echo esc_url( $permalink ); ?>" title="<?php echo esc_attr( $title ); ?>"><span class="glyphicon glyphicon-link"></span></a>
                            </div>
                        </div>

                    </div>

                <?php
            }

        }
        ?>

    </div>

    <?php if( nabia_theme_mod('nabia_carousel_navigation') == 'true') : ?>
        <nav class="carousel-navigation">
            <a class="car-prev glyphicon glyphicon-backward"></a>
            <a class="car-next glyphicon glyphicon-forward"></a>
        </nav>
    <?php endif; ?>

</div> <!-- #featured-carousel -->