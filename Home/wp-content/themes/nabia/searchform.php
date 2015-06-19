<?php
/**
 * The template for displaying the Search Form
 *
 * @package WordPress
 * @subpackage Nabia
 * @since Nabia 1.0
 */
?>

<form role="search" method="get" class="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="row">
		<div class="col-xs-12">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="<?php _e('Search', 'nabia'); ?>" value="" name="s">
				<span class="input-group-btn">
					<button class="btn searchsubmit" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</div>
	</div>
</form>
