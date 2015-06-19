jQuery(document).ready(function () {
	jQuery('#arrows-type input[name="params[catalog_navigation_type]"]').change(function(){
		jQuery(this).parents('ul').find('li.active').removeClass('active');
		jQuery(this).parents('li').addClass('active');
	});
	jQuery('#catalog-view-tabs > li > a').click(function(){
		jQuery('#catalog-view-tabs > li').removeClass('active');
		jQuery(this).parent().addClass('active');
		jQuery('#catalog-view-tabs-contents > li').removeClass('active');
		var liID=jQuery(this).attr('href');
		jQuery(liID).addClass('active');
                var actionForRedirect = jQuery('#adminForm').attr('action');
                if(actionForRedirect.indexOf("Options_catalog_styles") >= 0) {
                    jQuery('#adminForm').attr('action',"admin.php?page=Options_catalog_styles&task=save"+liID);
                }
                else if(actionForRedirect.indexOf("Options_catalog_lightbox_styles") >= 0) {
                    jQuery('#adminForm').attr('action',"admin.php?page=Options_catalog_lightbox_styles&task=save"+liID);
                }
		
		return false;
	});
	
	
	
	imageslistlisize();
	jQuery(window).resize(function(){
		imageslistlisize();
	});
	
	function imageslistlisize(){
		var lisaze = jQuery('#images-list').width();
		lisaze=lisaze*0.06;
		jQuery('#images-list .widget-images-list li').not('.add-image-box').not('.first').height(lisaze);
	}
});
	

	