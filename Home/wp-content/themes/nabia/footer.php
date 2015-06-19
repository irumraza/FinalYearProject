<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #wrapper div element.
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 */
?>
		<footer id="footer" class="container">
			<div class="go-to-top">
				<a href="#top"><span class="glyphicon glyphicon-chevron-up"></span></a>
			</div>
			<?php get_sidebar('footer'); ?>
		</footer>

		<div id="footer-copy" class="container">
			<div class="row">
				<div class="col-md-4 copyrights">
					<?php echo( nabia_theme_mod( 'nabia_footer_copyright' ) ? nabia_theme_mod('nabia_footer_copyright') : bloginfo('name') .' '. date('Y'));  ?>
				</div>
				<div class="col-md-8">
					<?php nabia_menu('footer'); ?>
					<!--
					<?php echo get_num_queries(); ?> queries in <?php timer_stop(1); ?> seconds.
					-->
				</div>
			</div>
		</div>
		
	</div> <!-- #wrapper -->
	<?php wp_footer(); ?>
</body>
</html>