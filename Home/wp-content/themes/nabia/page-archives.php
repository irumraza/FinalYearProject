<?php
/**
 * The template for displaying Blog default post format archive
 *
 * Used to display archive-type pages for posts with the default post format.
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 */

get_header(); ?>

<div id="content" class="container main">

	<div class="row content-wrap">

		<div class="main-content">

			<div class="col-md-6 col-md-push-3 middle-col">
			
				<div id="main">
					<?php  get_search_form(); ?>

					<header class="archive-header">
						<h1 class="archive-title">
							<i class="fa fa-archive small-icon"></i>
							<?php _e( 'Archives', 'nabia' ); ?>
						</h1>
					</header><!-- .archive-header -->

					<?php


	                    $args = array( 
	                        'post_type' => 'post',
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
	                            'operator' => 'NOT IN'
	                        ) )            
	                    );
	                    $args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					
						$archives = new WP_Query( $args );
					?>

					<?php if( $archives->have_posts() ) : ?>
						
							<?php while( $archives->have_posts() ) : $archives->the_post(); ?>
							
								<?php get_template_part('content', get_post_format()); ?>

							<?php endwhile; wp_reset_postdata(); ?>
						
					<?php else : ?>
						<?php get_template_part('content', 'missing'); ?>
					<?php  endif; ?>
					
					<?php nabia_pagination( $archives->max_num_pages ); ?>
				</div>

		</div>

		<?php get_sidebar(); ?>
	
		</div>
	</div> <!-- .row .content-wrap -->

</div> <!-- #content -->
<?php get_footer(); ?>