<?php
/**
 * The template for displaying posts in the Gallery post format
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

	<?php the_title('<h2 class="post-title"><a href="' . esc_url( get_the_permalink() ) . '" title="' . esc_attr( get_the_title() ) . '">', '</a></h2>'); ?>

	<?php nabia_entry_meta(); ?>

</article>