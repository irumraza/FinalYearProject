<?php
/**
 * The template for displaying 404 pages (Not Found)
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

					<div class="row">
						<div class="col-lg-5">
							<div class="error-404"><?php _e('404', 'nabia'); ?></div>
						</div>
						<div class="col-lg-7">
							<header class="page-header">
								<h1 class="page-title"><?php _e('Page Not Found', 'nabia'); ?></h1>
							</header>
							<p><?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable. Please try using the search box above to search for the desired page.', 'nabia'); ?></p>
						</div>
					</div>
					
				</div>

			</div>

			<?php get_sidebar(); ?>
			
		</div>

	</div> <!-- .row .content-wrap -->

</div> <!-- #content -->
<?php get_footer(); ?>