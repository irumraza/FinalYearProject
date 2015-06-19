<?php
/**
 * The template for displaying posts in the Image post format
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-thumbnail">
	
		<a href="<?php echo esc_url( nabia_grab_image() ); ?>" data-gal="prettyPhoto" class="zoom-icon">
			<i class="fa fa-search"></i>
		</a>

		<?php the_content(); ?>

	</div>

	<?php the_title('<h2 class="post-title"><a href="'. esc_url( get_permalink() ) .'">', '</a></h2>'); ?>

	<?php nabia_entry_meta(); ?>

</article>