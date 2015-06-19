<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 */
?>

<?php $author_id = get_the_author_meta( 'ID' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content clearfix">
		<?php the_content(); ?>
	</div>

	<?php nabia_entry_meta(); ?>

</article>