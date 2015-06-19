<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
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

					<header class="archive-header">
						<h1 class="archive-title">
							<i class="glyphicon glyphicon-tags small-icon"></i>
							<?php printf( __( 'Tag Archives: %s', 'nabia' ), single_tag_title( '', false ) ); ?>
							</h1>
					</header><!-- .archive-header -->

					<?php
						// Show an optional term description.
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="taxonomy-description">%s</div>', $term_description );
						endif;
					?>

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