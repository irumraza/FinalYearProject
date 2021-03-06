<?php
/**
 * The template for displaying posts in the Link post format
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="entry-thumbnail">
		<?php the_post_thumbnail('nabia-big-thumb', array('class' => 'thumbnail-img')); ?>
		<div class="link-format-meta">
			<?php the_title('<h2 class="post-title">', '</h2>'); ?>
			<?php the_content(); ?>
		</div>
	
	</div>

	<?php nabia_entry_meta(); ?>

</article>