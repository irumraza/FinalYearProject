<?php
/**
 * The template for displaying Author archive pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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

					<header id="author-info" class="page-header">

						<?php $author_id = get_the_author_meta('ID') ?>
						<h1 class="page-title"><?php printf( __( 'All posts by %s (%u)', 'nabia' ), get_the_author(), count_user_posts( $author_id ) ); ?></h1>
					
						<?php echo get_avatar( $author_id, '150' ); ?> 

						<?php 
						$website = get_the_author_meta( 'user_url' );
						if( $website ) : ?>
							<div class="author-url">
								<i class="small-icon fa fa-external-link"></i><?php _e('Website:', 'nabia'); ?><a href="<?php echo esc_url( $website ); ?>" rel="nofollow" target="_blank"><?php echo esc_url( $website ); ?></a>
							</div>
						<?php endif; ?>

						<?php if ( get_the_author_meta( 'description' ) ) : ?>
							<div class="author-description"><?php the_author_meta( 'description' ); ?></div>
							<?php nabia_author_social(); ?>
						<?php endif; ?>
						
					</header>

					<?php if( have_posts() ) : ?>
						
						<?php while( have_posts() ) : the_post(); ?>
						
							<?php get_template_part('content', get_post_format()); ?>

						<?php endwhile; ?>
						
					<?php else : ?>
						<?php get_template_part('content', 'missing'); ?>
					<?php  endif; ?>
					
					<?php nabia_pagination(); ?>

				</div>

			</div>

			<?php get_sidebar(); ?>
	
		</div>
		
	</div> <!-- .row .content-wrap -->

</div> <!-- #content -->
<?php get_footer(); ?>