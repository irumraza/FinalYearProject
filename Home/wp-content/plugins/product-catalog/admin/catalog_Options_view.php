<?php
if (function_exists('current_user_can'))
    if (!current_user_can('manage_options')) {
        die('Access Denied');
    }
if (!function_exists('current_user_can')) {
    die('Access Denied');
}

function      html_showStyles($param_values, $op_type)
{
    ?>
<script>

jQuery(document).ready(function () {
	var strliID=jQuery(location).attr('hash');
	//alert(strliID);
	jQuery('#catalog-view-tabs li').removeClass('active');
	if(jQuery('#catalog-view-tabs li a[href="'+strliID+'"]').length>0){
		jQuery('#catalog-view-tabs li a[href="'+strliID+'"]').parent().addClass('active');
	}else {
		jQuery('#catalog-view-tabs li a[href="#catalog-view-options-0"]').parent().addClass('active');
	}
	jQuery('#catalog-view-tabs-contents li').removeClass('active');
	strliID=strliID;
	//alert(strliID);
	if(jQuery(strliID).length>0){
		jQuery(strliID).addClass('active');
	}else {
		jQuery('#catalog-view-options-0').addClass('active');
	}
	jQuery('input[data-slider="true"]').bind("slider:changed", function (event, data) {
		 jQuery(this).parent().find('span').html(parseInt(data.value)+"%");
		 jQuery(this).val(parseInt(data.value));
	});	
});
</script>
<div class="wrap">

<?php $path_site2 = plugins_url("../images", __FILE__); ?>

<div id="poststuff">
		<?php $path_site = plugins_url("Front_images", __FILE__); ?>
        <div style="float: left;">
            <div><a href="http://huge-it.com/wordpress-plugins-product-catalog-user-manual/" target="_blank">User Manual</a></div>
            <div>This section allows you to configure the Product Catalog options. <a href="http://huge-it.com/wordpress-plugins-product-catalog-user-manual/" target="_blank">More...</a></div>
            <div>This options are disabled in free version. Get full version to customize them. <a href="http://huge-it.com/wordpress-plugins-product-catalog-user-manual/" target="_blank">Get full Version</a></div>
        </div>
        <div style="float: right;">
                <a class="header-logo-text" href="http://huge-it.com/product-catalog/" target="_blank">
                        <div><img width="250px" src="<?php echo $path_site2; ?>/huge-it1.png" /></div>
                        <div>Get the full version</div>
                </a>
        </div>
        <div style="clear:both;"></div>
        <div style="color: #a00; margin-bottom: 15px;">Dear user. Thank you for your interest in our product.
            Please be known, that this page is for commercial users, and in order to use options from there,
            you should have pro license. We please you to be understanding. The money we get for pro license
            is expended on constantly improvements of our plugins, making them more professional useful and effective,
            as well as for keeping fast support for every user.
        </div>
		<div id="post-body-content" class="catalog-options">
<div style="margin-left: -20px;" id="poststuff">
<div id="post-body-content" class="catalog-options">
			<img style="width: 100%;" src="<?php echo $path_site2; ?>/options-1.jpg">
		</div>			
		</div>			
	</div>
</div>
</div>
<input type="hidden" name="option" value=""/>
<input type="hidden" name="task" value=""/>
<input type="hidden" name="controller" value="options"/>
<input type="hidden" name="op_type" value="styles"/>
<input type="hidden" name="boxchecked" value="0"/>

<?php
}