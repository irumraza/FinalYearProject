<?php
/**
 * The template for displaying Home page
 *
 * This template will not be used if you choose to display a static page from
 * Wp-admin -> Settings -> Reading
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

					<?php if( have_posts() ) : ?>

						<?php while( have_posts() ) : the_post(); ?>
				
							<?php get_template_part( 'content', get_post_format() ); ?>

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