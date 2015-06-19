<?php
/**
 * The default template for displaying content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 */
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( has_post_thumbnail() ) : ?>
		<div class="entry-thumbnail zoomeffect">
			<?php the_post_thumbnail('nabia-big-thumb', array('class' => 'thumbnail-img')); ?>
			<div class="mask">
         		<a href="<?php the_permalink(); ?>" class="info"><i class="glyphicon glyphicon-link small-icon"></i><?php _e('Read More', 'nabia'); ?></a>
			</div>
		</div>
	<?php endif; ?>

	<?php the_title('<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( get_the_title() ) . '">', '</a></h2>'); ?>

	<div class="entry-content clearfix">
		<?php nabia_content(); ?>
	</div>

	<?php nabia_entry_meta(); ?>

</article>