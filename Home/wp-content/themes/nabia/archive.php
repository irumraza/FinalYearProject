<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
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
							<?php
								echo '<i class="fa fa-calendar small-icon"></i>';
								if ( is_day() ) :
									printf( __( 'Daily Archives: %s', 'nabia' ), get_the_date() );

								elseif ( is_month() ) :
									printf( __( 'Monthly Archives: %s', 'nabia' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'nabia' ) ) );

								elseif ( is_year() ) :
									printf( __( 'Yearly Archives: %s', 'nabia' ), get_the_date( _x( 'Y', 'yearly archives date format', 'nabia' ) ) );

								else :
									_e( 'Archives', 'nabia' );

								endif;
							?>
						</h1>
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