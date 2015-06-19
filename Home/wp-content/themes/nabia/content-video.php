<?php
/**
 * The template for displaying posts in the Video post format
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-container video-post-format'); ?>>

	<?php the_content(); ?>	

	<?php the_title('<h2 class="post-title"><a href="' . esc_url( get_the_permalink() ) . '" title="' . esc_attr( get_the_title() ) . '">', '</a></h2>'); ?>

	<div class="entry-content clearfix">
		<?php the_excerpt(); ?>
	</div>

	<?php nabia_entry_meta(); ?>

</article>