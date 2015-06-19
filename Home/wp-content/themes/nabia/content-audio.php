<?php
/**
 * The template for displaying posts in the Audio post format
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-thumbnail">
		<?php the_post_thumbnail('nabia-big-thumb', array('class' => 'thumbnail-img')); ?>
		<?php the_content(); ?>
	</div>

	<?php the_title('<h2 class="post-title"><a href="' . esc_url( get_the_permalink() ) . '" title="' . esc_attr( get_the_title() ) . '">', '</a></h2>'); ?>

	<div class="entry-content clearfix">
		<?php the_excerpt(); ?>
	</div>
	
	<?php nabia_entry_meta(); ?>

</article>