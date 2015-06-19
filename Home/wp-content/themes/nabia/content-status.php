<?php
/**
 * The template for displaying posts in the Status post format
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 */
?>

<?php $author_id = get_the_author_meta( 'ID' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-thumbnail">
		<?php the_post_thumbnail('nabia-big-thumb', array('class' => 'thumbnail-img')); ?>
	</div>

	<div class="entry-content clearfix">
		<div class="status-author pull-left">
			<?php echo get_avatar( $author_id, 80 ); ?>
		</div>
		<span class="status-author-name"><?php the_author_posts_link(); ?></span>
		<span class="status-added"><i class="glyphicon glyphicon-time small-icon"></i><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
		<?php the_content(); ?>
	</div>

	<?php nabia_entry_meta(); ?>

</article>