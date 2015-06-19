<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-thumbnail">
		<?php the_post_thumbnail('nabia-big-thumb', array('class' => 'thumbnail-img')); ?>
	</div>

	<div class="quote-content clearfix">
		<?php the_content(); ?>
		<div class="quote-author">
			<?php the_title(); ?>
		</div>			
	</div>

	<?php nabia_entry_meta(); ?>

</article>