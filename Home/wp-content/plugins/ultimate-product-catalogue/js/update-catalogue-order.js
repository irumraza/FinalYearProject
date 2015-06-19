/* This code is required to make changing the catalogue order a drag-and-drop affair */
jQuery(document).ready(function() {
	
	jQuery('.catalogue-list').sortable({
		items: '.list-item',
		opacity: 0.6,
		cursor: 'move',
		axis: 'y',
		update: function() {
			var order = jQuery(this).sortable('serialize') + '&action=catalogue_update_order';
			jQuery.post(ajaxurl, order, function(response) {});
		}
	});
	jQuery('.optional-images-list').sortable({
		items: '.list-item',
		opacity: 0.6,
		cursor: 'move',
		axis: 'y',
		update: function() {
			var order = jQuery(this).sortable('serialize') + '&action=optional_image_update_order';
			jQuery.post(ajaxurl, order, function(response) {});
		}
	});
	jQuery('.videos-list').sortable({
		items: '.video-item',
		opacity: 0.6,
		cursor: 'move',
		axis: 'y',
		update: function() {
			var order = jQuery(this).sortable('serialize') + '&action=video_update_order';
			jQuery.post(ajaxurl, order, function(response) {});
		}
	});
	jQuery('.images-list').sortable({
		items: '.list-item-image',
		opacity: 0.6,
		cursor: 'move',
		axis: 'x,y',
		update: function() {
			var order = jQuery(this).sortable('serialize') + '&action=image_update_order';
			jQuery.post(ajaxurl, order, function(response) {});
		}
	});
	jQuery('.tag-group-list').sortable({
		items: '.list-item-tag-group',
		opacity: 0.6,
		cursor: 'move',
		axis: 'y',
		update: function() {
			var order = jQuery(this).sortable('serialize') + '&action=tag_group_update_order';
			jQuery.post(ajaxurl, order, function(response) {});
		}
	});
});

function RecordView(Item_ID) {
		var data = 'Item_ID=' + Item_ID + '&action=record_view';
		jQuery.post(ajaxurl, data, function(response) {alert(response);});
		alert(data);
}