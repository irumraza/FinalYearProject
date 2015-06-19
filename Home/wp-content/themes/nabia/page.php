<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
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
	
					<?php while( have_posts() ) : the_post(); ?>
					
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
							<header class="page-header">
								<h1 class="post-title"><?php the_title(); ?></h1>
							</header>
							
							<?php if( has_post_thumbnail() ) {
								the_post_thumbnail('big-thumb', array( 'class' => 'page-thumbnail thumbnail' ) );
							} ?>

							<?php the_content(); ?>
						
							<div id="comments-section">
								<?php comments_template(); ?>
							</div>

						</article>

					<?php endwhile; ?>
				
				</div>

			</div>

			<?php get_sidebar(); ?>
	
		</div>

	</div> <!-- .row .content-wrap -->

</div> <!-- #content -->
<?php get_footer(); ?>