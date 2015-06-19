<?php
/**
 * The template for About Me page
 *
 * Template Name: About Me
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
				
					<?php get_search_form(); ?>

					<?php while( have_posts() ) : the_post(); ?>
					
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php $post_id = get_the_ID(); ?>
						
							<header class="page-header">
								<h1 class="page-title"><?php the_title(); ?></h1>
							</header>


							<?php if( has_post_thumbnail() ) {
								the_post_thumbnail('nabia-grid', array( 'class' => 'about-me-thumbnail pull-left' ) );
							} ?>

							<aside class="short-author-description">
								<?php $sd_title = get_post_meta( $post_id, 'nabia_cmb_about_me_sd_title', true ); ?>
								<h3 class="title"><?php echo esc_html( $sd_title ); ?></h3>
								<p class="description">
									<?php
									$sd_text = get_post_meta( $post_id, 'nabia_cmb_about_me_sd_text', true );
									echo esc_html( $sd_text );
									?>
								</p>
							</aside>

							<?php the_content(); ?>

							<div class="about-social">
								
								<?php
								$facebook = get_post_meta( $post_id, 'nabia_cmb_about_me_facebook', true );
								$twitter = get_post_meta( $post_id, 'nabia_cmb_about_me_twitter', true );
								$google_plus = get_post_meta( $post_id, 'nabia_cmb_about_me_gplus', true );
								$linkedin = get_post_meta( $post_id, 'nabia_cmb_about_me_linkedin', true );
								?>
								<?php if( $facebook ) { ?>
									<a href="<?php echo esc_url( $facebook ); ?>" target="_blank" title="<?php _e('Facebook', 'nabia'); ?>" class="facebook"><i class="fa fa-facebook fa-2x"></i></a>
								<?php } ?>

								<?php if( $twitter ) { ?>
									<a href="<?php echo esc_url( $twitter ); ?>" target="_blank" title="<?php _e('Twitter', 'nabia'); ?>" class="twitter"><i class="fa fa-twitter fa-2x"></i></a>
								<?php } ?>

								<?php if( $google_plus ) { ?>
									<a href="<?php echo esc_url( $google_plus ); ?>" target="_blank" title="<?php _e('Google Plus', 'nabia'); ?>" class="googleplus"><i class="fa fa-google-plus fa-2x"></i></a>
								<?php } ?>

								<?php if( $linkedin ) { ?>
									<a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" title="<?php _e('LinkedIn', 'nabia'); ?>" class="linkedin"><i class="fa fa-linkedin fa-2x"></i></a>
								<?php } ?>

							</div>

							<div id="comments-section">
								<?php comments_template(); ?>
							</div>

						</article>

					<?php endwhile; ?>

				</div>

			</div>

			<?php nabia_get_sidebars(); ?>
	
		</div>

	</div> <!-- .row .content-wrap -->

</div> <!-- #content -->
<?php get_footer(); ?>