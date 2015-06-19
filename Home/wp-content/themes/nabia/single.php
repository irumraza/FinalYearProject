<?php
/**
 * The Template for displaying all single posts
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
						
							<?php if( !get_post_format() ) : ?>

								<article id="single-post-<?php the_ID(); ?>" <?php post_class(); ?>>
								
									<?php
										if( has_post_thumbnail() && nabia_theme_mod('nabia_sgpost_thumbnail') )
											the_post_thumbnail('nabia-big-thumb', array('class' => 'post-thumbnail-img animated zoomIn'));
										
										if( nabia_theme_mod('nabia_sgpost_link_title') ) {
											the_title( '<h1 class="post-title"><a href="'. esc_url( get_permalink() ) .'" title="'. esc_attr( get_the_title() ) .'">', '</a></h1>' );
										} else {
											the_title( '<h1 class="post-title">', '</h1>' );
										}
									?>
									<div class="post-date-cat row">

										<div class="col-sm-3">

											<div class="date-calendar">
												<div class="heading">
													<span class="month"><?php the_time('M'); ?></span>
													<span class="year">&#180;<?php the_time('y'); ?></span>
												</div>
												<div class="calendar-body">
													<span class="day"><?php the_time('d'); ?></span>
													<span class="time"><?php the_time('g:i a'); ?></span>
												</div>
											</div>

										</div>
										<div class="col-sm-9">
											<ul class="entry-info">
												<li><?php printf( __('Posted by: %s', 'nabia'), get_the_author() ); ?> </li>
												<li><?php _e('Category:', 'nabia'); ?> <?php the_category(', '); ?></li>
											</ul>
										</div>

									</div>

									<?php if( current_user_can( 'edit_post', get_the_ID() ) || nabia_theme_mod('nabia_sgpost_fontsize') ) { ?>
										<div class="before-content clearfix">
											<?php edit_post_link( __('Edit post', 'nabia'), '<span class="pull-left"><i class="fa fa-pencil-square-o small-icon"></i>', '</span>'); ?>
											
											<?php if( nabia_theme_mod('nabia_sgpost_fontsize') ) { ?>
												<ul id="set-font-size">
													<li class="label">
														<?php _e('Font size', 'nabia'); ?>
													</li>
													<li>
														<a class="badge" href="javascript:void(0)" id="incfont">A+</a>
														<a class="badge" href="javascript:void(0)" id="decfont">A-</a>
													</li>
												</ul>
											<?php } ?>
										</div>
									<?php } ?>

									<div class="entry-content">
										<?php the_content( __('Continue Reading', 'nabia') ); ?>
									</div>

									<?php
										wp_link_pages();
										nabia_post_tags();
										nabia_posts_navigation();	
									?>

									<div class="post-author-meta">
										<?php $author_id = get_the_author_meta('ID'); ?>
										<h3 class="about-author-label"><?php printf( __('About %s', 'nabia'), get_the_author_meta('display_name') ); ?></h3>
										<!-- Nav tabs -->
										<ul class="nav nav-tabs" role="tablist">
										  	<li class="active"><a href="#authorinfo" role="tab" data-toggle="tab"><?php _e('About', 'nabia'); ?></a></li>
										  	<?php if( nabia_theme_mod('nabia_sgpost_alp') ) { ?>
										  		<li><a href="#authorposts" role="tab" data-toggle="tab"><?php _e('Latest Posts', 'nabia'); ?></a></li>
									  		<?php } ?>
										</ul>

										<!-- Author tabs -->
										<div class="tab-content">
											
											<div class="tab-pane active" id="authorinfo">
										  	
												<div class="author-meta row">
													<div class="col-sm-3">
														<?php echo get_avatar( $author_id, 120 ); ?>
													</div>
													<div class="col-sm-9">
														<div class="author-name-wrap">
															<?php echo '<a href="' . esc_url( get_author_posts_url( $author_id ) ) . '">' . get_the_author_meta('display_name') . '</a>' ?>
															<?php if( get_the_author_meta('user_url') ) : ?>
																<a href="<?php echo esc_url( get_the_author_meta('user_url') ); ?>" title="<?php _e('Website', 'nabia'); ?>" class="fa fa-globe website-link" target="_blank"></a>
															<?php endif; ?>
														</div>
														<?php 
														if( get_the_author_meta('description') ) {
															echo '<p>' . esc_html( get_the_author_meta('description') ) . '</p>';
														}
														?>

														<?php nabia_author_social(); ?>
													</div>
												</div>											  	

											</div>
											
											<?php if( nabia_theme_mod('nabia_sgpost_alp') ) { ?>

												<div class="tab-pane" id="authorposts">

													<?php $author_posts = new WP_Query( array(
														'posts_per_page' => 3,
														'author' => $author_id
													) );

													if( $author_posts->have_posts() ) {
														while( $author_posts->have_posts() ) : $author_posts->the_post();
															get_template_part( 'content', get_post_format() );
														endwhile;
													}
													wp_reset_postdata();
													?>

												</div>

											<?php } ?>

										</div> <!-- .tab-content -->

									</div>
									

								</article>

							<?php else :
								get_template_part('content', get_post_format());
							endif;

						endwhile;
					
					nabia_related_posts(); ?>

					<div id="comments-section">
						<?php comments_template(); ?>
					</div>

				</div>

			</div>

			<?php get_sidebar(); ?>
	
		</div>
	</div> <!-- .row .content-wrap -->

</div> <!-- #content -->
<?php get_footer(); ?>