<?php
/**
 * The template for displaying Search Results pages
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
							<i class="fa fa-search-plus small-icon"></i>
							<?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?>
						</h1>
					</header>

					<?php if( have_posts() ) : ?>
						<ul class="block-grid small-block-grid-2">
							<?php while( have_posts() ) : the_post(); ?>
							
								<?php get_template_part('content', get_post_format()); ?>

							<?php endwhile; ?>
						</ul>
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