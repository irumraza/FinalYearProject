<?php
/**
 * The template for displaying Post Format pages
 *
 * Used to display archive-type pages for posts with a post format.
 * If you'd like to further customize these Post Format views, you may create a
 * new template file for each specific one.
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
								if ( is_tax( 'post_format', 'post-format-aside' ) ) :
									echo '<i class="glyphicon glyphicon-info-sign small-icon"></i>';
									_e( 'Asides', 'nabia' );

								elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
									echo '<i class="glyphicon glyphicon-picture small-icon"></i>';
									_e( 'Images', 'nabia' );

								elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
									echo '<i class="glyphicon glyphicon-facetime-video small-icon"></i>';
									_e( 'Videos', 'nabia' );

								elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
									echo '<i class="glyphicon glyphicon-music small-icon"></i>';
									_e( 'Audio', 'nabia' );

								elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
									echo '<i class="fa fa-quote-left small-icon"></i>';
									_e( 'Quotes', 'nabia' );

								elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
									echo '<i class="glyphicon glyphicon-link small-icon"></i>';
									_e( 'Links', 'nabia' );

								elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
									echo '<i class="glyphicon glyphicon-camera small-icon"></i>';
									_e( 'Photo Galleries', 'nabia' );
								
								elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
									echo '<i class="fa fa-comments small-icon"></i>';
									_e( 'Chat Archives', 'nabia' );

								elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
									echo '<i class="glyphicon glyphicon-send small-icon"></i>';
									_e( 'Statuses', 'nabia' );								

								else :
									echo '<i class="fa fa-archive small-icon"></i>';
									_e( 'Archives', 'nabia' );
								endif;
							?>
						</h1>
					</header><!-- .archive-header -->

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