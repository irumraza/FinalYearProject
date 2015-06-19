<?php

function front_end_catalog($images, $paramssld, $catalog)
{
 ob_start();
	$catalogID=$catalog[0]->id;
	$catalogtitle=$catalog[0]->name;
	$catalogheight=$catalog[0]->sl_height;
	$catalogwidth=$catalog[0]->sl_width;
	$catalogeffect=$catalog[0]->catalog_list_effects_s;
	$slidepausetime=($catalog[0]->description+$catalog[0]->param);
	$catalogpauseonhover=$catalog[0]->pause_on_hover;
	$catalogposition=$catalog[0]->sl_position;
	$slidechangespeed=$catalog[0]->param;
        $catalogCats=$catalog[0]->categories;
        $catalogShowSorting=$catalog[0]->ht_show_sorting;
        $catalogShowFiltering=$catalog[0]->ht_show_filtering;

        global $wpdb;
        
$paramssld["ht_view0_border_width"] = "0";
$paramssld["ht_view0_togglebutton_style"] = "dark";
$paramssld["ht_view0_show_separator_lines"] = "on";
$paramssld["ht_view0_linkbutton_text"] = "View Product";
$paramssld["ht_view0_show_linkbutton"] = "on";
$paramssld["ht_view0_linkbutton_background_hover_color"] = "df2e1b";
$paramssld["ht_view0_linkbutton_background_color"] = "e74c3c";
$paramssld["ht_view0_linkbutton_font_hover_color"] = "ffffff";
$paramssld["ht_view0_linkbutton_color"] = "ffffff";
$paramssld["ht_view0_linkbutton_font_size"] = "14";
$paramssld["ht_view0_description_color"] = "5b5b5b";
$paramssld["ht_view0_description_font_size"] = "14";
$paramssld["ht_view0_show_description"] = "on";
$paramssld["ht_view0_thumbs_width"] = "75";
$paramssld["ht_view0_thumbs_position"] = "before";
$paramssld["ht_view0_show_thumbs"] = "on";
$paramssld["ht_view0_title_font_size"] = "15";
$paramssld["ht_view0_title_font_color"] = "555555";
$paramssld["ht_view0_element_border_width"] = "1";
$paramssld["ht_view0_element_border_color"] = "D0D0D0";
$paramssld["ht_view0_element_background_color"] = "f7f7f7";
$paramssld["ht_view0_block_width"] = "275";
$paramssld["ht_view0_block_height"] = "275";

$paramssld["ht_view1_show_separator_lines"] = "on";
$paramssld["ht_view1_linkbutton_text"] = "View Product";
$paramssld["ht_view1_show_linkbutton"] = "on";
$paramssld["ht_view1_linkbutton_background_hover_color"] = "df2e1b";
$paramssld["ht_view1_linkbutton_background_color"] = "e74c3c";
$paramssld["ht_view1_linkbutton_font_hover_color"] = "ffffff";
$paramssld["ht_view1_linkbutton_color"] = "ffffff";
$paramssld["ht_view1_linkbutton_font_size"] = "14";
$paramssld["ht_view1_description_color"] = "5b5b5b";
$paramssld["ht_view1_description_font_size"] = "14";
$paramssld["ht_view1_show_description"] = "on";
$paramssld["ht_view1_thumbs_width"] = "75";
$paramssld["ht_view1_thumbs_position"] = "before";
$paramssld["ht_view1_show_thumbs"] = "on";
$paramssld["ht_view1_title_font_size"] = "15";
$paramssld["ht_view1_title_font_color"] = "555555";
$paramssld["ht_view1_element_border_width"] = "1";
$paramssld["ht_view1_element_border_color"] = "D0D0D0";
$paramssld["ht_view1_element_background_color"] = "f7f7f7";
$paramssld["ht_view1_block_width"] = "275";
$paramssld["ht_view2_element_linkbutton_text"] = "View Product";
$paramssld["ht_view2_element_show_linkbutton"] = "on";
$paramssld["ht_view2_element_linkbutton_color"] = "ffffff";
$paramssld["ht_view2_element_linkbutton_font_size"] = "14";
$paramssld["ht_view2_element_linkbutton_background_color"] = "2ea2cd";
$paramssld["ht_view2_show_popup_linkbutton"] = "on";
$paramssld["ht_view2_popup_linkbutton_text"] = "View Product";
$paramssld["ht_view2_popup_linkbutton_background_hover_color"] = "0074a2";
$paramssld["ht_view2_popup_linkbutton_background_color"] = "2ea2cd";
$paramssld["ht_view2_popup_linkbutton_font_hover_color"] = "ffffff";
$paramssld["ht_view2_popup_linkbutton_color"] = "ffffff";
$paramssld["ht_view2_popup_linkbutton_font_size"] = "14";
$paramssld["ht_view2_description_color"] = "222222";
$paramssld["ht_view2_description_font_size"] = "14";
$paramssld["ht_view2_show_description"] = "on";
$paramssld["ht_view2_thumbs_width"] = "75";
$paramssld["ht_view2_thumbs_height"] = "75";
$paramssld["ht_view2_thumbs_position"] = "before";
$paramssld["ht_view2_show_thumbs"] = "on";
$paramssld["ht_view2_popup_background_color"] = "FFFFFF";
$paramssld["ht_view2_popup_overlay_color"] = "000000";
$paramssld["ht_view2_popup_overlay_transparency_color"] = "70";
$paramssld["ht_view2_popup_closebutton_style"] = "dark";
$paramssld["ht_view2_show_separator_lines"] = "on";
$paramssld["ht_view2_show_popup_title"] = "on";
$paramssld["ht_view2_element_title_font_size"] = "18";
$paramssld["ht_view2_element_title_font_color"] = "222222";
$paramssld["ht_view2_popup_title_font_size"] = "18";
$paramssld["ht_view2_popup_title_font_color"] = "222222";
$paramssld["ht_view2_element_overlay_color"] = "FFFFFF";
$paramssld["ht_view2_element_overlay_transparency"] = "70";
$paramssld["ht_view2_zoombutton_style"] = "light";
$paramssld["ht_view2_element_border_width"] = "1";
$paramssld["ht_view2_element_border_color"] = "dedede";
$paramssld["ht_view2_element_background_color"] = "f9f9f9";
$paramssld["ht_view2_element_width"] = "275";
$paramssld["ht_view2_element_height"] = "275";

$paramssld["ht_view3_show_separator_lines"] = "on";
$paramssld["ht_view3_linkbutton_text"] = "View Product";
$paramssld["ht_view3_show_linkbutton"] = "on";
$paramssld["ht_view3_linkbutton_background_hover_color"] = "0074a2";
$paramssld["ht_view3_linkbutton_background_color"] = "2ea2cd";
$paramssld["ht_view3_linkbutton_font_hover_color"] = "ffffff";
$paramssld["ht_view3_linkbutton_color"] = "ffffff";
$paramssld["ht_view3_linkbutton_font_size"] = "14";
$paramssld["ht_view3_description_color"] = "555555";
$paramssld["ht_view3_description_font_size"] = "14";
$paramssld["ht_view3_show_description"] = "on";
$paramssld["ht_view3_thumbs_width"] = "75";
$paramssld["ht_view3_thumbs_height"] = "75";
$paramssld["ht_view3_show_thumbs"] = "on";
$paramssld["ht_view3_title_font_size"] = "18";
$paramssld["ht_view3_title_font_color"] = "0074a2";
$paramssld["ht_view3_mainimage_width"] = "240";
$paramssld["ht_view3_element_border_width"] = "1";
$paramssld["ht_view3_element_border_color"] = "dedede";
$paramssld["ht_view3_element_background_color"] = "f9f9f9";

$paramssld["ht_view5_icons_style"] = "dark";
$paramssld["ht_view5_show_separator_lines"] = "on";
$paramssld["ht_view5_linkbutton_text"] = "View Product";
$paramssld["ht_view5_show_linkbutton"] = "on";
$paramssld["ht_view5_linkbutton_background_hover_color"] = "0074a2";
$paramssld["ht_view5_linkbutton_background_color"] = "2ea2cd";
$paramssld["ht_view5_linkbutton_font_hover_color"] = "ffffff";
$paramssld["ht_view5_linkbutton_color"] = "ffffff";
$paramssld["ht_view5_linkbutton_font_size"] = "14";
$paramssld["ht_view5_description_color"] = "555555";
$paramssld["ht_view5_description_font_size"] = "14";
$paramssld["ht_view5_show_description"] = "on";
$paramssld["ht_view5_thumbs_width"] = "75";
$paramssld["ht_view5_thumbs_height"] = "75";
$paramssld["ht_view5_show_thumbs"] = "on";
$paramssld["ht_view5_title_font_size"] = "16";
$paramssld["ht_view5_title_font_color"] = "0074a2";
$paramssld["ht_view5_main_image_width"] = "275";
$paramssld["ht_view5_slider_tabs_font_color"] = "d9d99";
$paramssld["ht_view5_slider_tabs_background_color"] = "555555";
$paramssld["ht_view5_slider_background_color"] = "f9f9f9";

$paramssld["ht_view6_title_font_size"] = "16";
$paramssld["ht_view6_title_font_color"] = "0074A2";
$paramssld["ht_view6_title_font_hover_color"] = "2EA2CD";
$paramssld["ht_view6_title_background_color"] = "000000";
$paramssld["ht_view6_title_background_transparency"] = "80";
$paramssld["ht_view6_border_radius"] = "3";
$paramssld["ht_view6_border_width"] = "0";
$paramssld["ht_view6_border_color"] = "eeeeee";
$paramssld["ht_view6_width"] = "275";

$paramssld["light_box_size"] = "17";
$paramssld["light_box_width"] = "500";
$paramssld["light_box_transition"] = "elastic";
$paramssld["light_box_speed"] = "800";
$paramssld["light_box_href"] = "False";
$paramssld["light_box_title"] = "false";
$paramssld["light_box_scalephotos"] = "true";
$paramssld["light_box_rel"] = "false";
$paramssld["light_box_scrolling"] = "false";
$paramssld["light_box_opacity"] = "20";
$paramssld["light_box_open"] = "false";
$paramssld["light_box_overlayclose"] = "true";
$paramssld["light_box_esckey"] = "false";
$paramssld["light_box_arrowkey"] = "false";
$paramssld["light_box_loop"] = "true";
$paramssld["light_box_data"] = "false";
$paramssld["light_box_classname"] = "false";
$paramssld["light_box_fadeout"] = "300";
$paramssld["light_box_closebutton"] = "false";
$paramssld["light_box_current"] = "image";
$paramssld["light_box_previous"] = "previous";
$paramssld["light_box_next"] = "next";
$paramssld["light_box_close"] = "close";
$paramssld["light_box_iframe"] = "false";
$paramssld["light_box_inline"] = "false";
$paramssld["light_box_html"] = "false";
$paramssld["light_box_photo"] = "false";
$paramssld["light_box_height"] = "500";
$paramssld["light_box_innerwidth"] = "false";
$paramssld["light_box_innerheight"] = "false";
$paramssld["light_box_initialwidth"] = "300";
$paramssld["light_box_initialheight"] = "100";
$paramssld["light_box_maxwidth"] = "768";
$paramssld["light_box_maxheight"] = "500";
$paramssld["light_box_slideshow"] = "false";
$paramssld["light_box_slideshowspeed"] = "2500";
$paramssld["light_box_slideshowauto"] = "true";
$paramssld["light_box_slideshowstart"] = "start slideshow";
$paramssld["light_box_slideshowstop"] = "stop slideshow";
$paramssld["light_box_fixed"] = "true";
$paramssld["light_box_top"] = "false";
$paramssld["light_box_bottom"] = "false";
$paramssld["light_box_left"] = "false";
$paramssld["light_box_right"] = "false";
$paramssld["light_box_reposition"] = "false";
$paramssld["light_box_retinaimage"] = "true";
$paramssld["light_box_retinaurl"] = "false";
$paramssld["light_box_retinasuffix"] = "@2x.$1";
$paramssld["light_box_returnfocus"] = "true";
$paramssld["light_box_trapfocus"] = "true";
$paramssld["light_box_fastiframe"] = "true";
$paramssld["light_box_preloading"] = "true";
$paramssld["slider_title_position"] = "5";
$paramssld["light_box_style"] = "1";
$paramssld["light_box_size_fix"] = "false";

$paramssld["ht_view2_popup_full_width"] = "on";
$paramssld["ht_view0_price_text"] = "Price";
$paramssld["ht_view1_price_text"] = "Price";
$paramssld["ht_view2_price_text"] = "Price";
$paramssld["ht_view3_price_text"] = "Price";
$paramssld["ht_view5_price_text"] = "Price";

$paramssld["ht_catalog_view0_show_price"] = "on";
$paramssld["ht_catalog_view0_price_font_size"] = "15";
$paramssld["ht_catalog_view0_price_font_color"] = "e74c3c";
$paramssld["ht_catalog_view0_market_price_font_size"] = "15";
$paramssld["ht_catalog_view0_market_price_font_color"] = "000000";
$paramssld["ht_catalog_view1_show_price"] = "on";
$paramssld["ht_catalog_view1_price_font_size"] = "15";
$paramssld["ht_catalog_view1_price_font_color"] = "e74c3c";
$paramssld["ht_catalog_view1_market_price_font_size"] = "15";
$paramssld["ht_catalog_view1_market_price_font_color"] = "000000";
$paramssld["ht_catalog_view2_show_price"] = "on";
$paramssld["ht_catalog_view2_price_font_size"] = "15";
$paramssld["ht_catalog_view2_price_font_color"] = "e74c3c";
$paramssld["ht_catalog_view2_market_price_font_size"] = "15";
$paramssld["ht_catalog_view2_market_price_font_color"] = "000000";
$paramssld["ht_catalog_view3_show_price"] = "on";
$paramssld["ht_catalog_view3_price_font_size"] = "15";
$paramssld["ht_catalog_view3_price_font_color"] = "0074a2";
$paramssld["ht_catalog_view3_market_price_font_size"] = "15";
$paramssld["ht_catalog_view3_market_price_font_color"] = "000000";
$paramssld["ht_catalog_view5_show_price"] = "on";
$paramssld["ht_catalog_view5_price_font_size"] = "15";
$paramssld["ht_catalog_view5_price_font_color"] = "0074a2";
$paramssld["ht_catalog_view5_market_price_font_size"] = "15";
$paramssld["ht_catalog_view5_market_price_font_color"] = "000000";
$paramssld["ht_catalog_zoom_window_type"] = "window";
$paramssld["ht_catalog_zoom_window_width"] = "200";
$paramssld["ht_catalog_zoom_window_height"] = "150";
$paramssld["ht_catalog_zoom_x_asis"] = "0";
$paramssld["ht_catalog_zoom_y_asis"] = "0";
$paramssld["ht_catalog_zoom_window_position"] = "16";
$paramssld["ht_catalog_zoom_window_border_size"] = "2";
$paramssld["ht_catalog_zoom_window_border_color"] = "#000";
$paramssld["ht_catalog_zoom_window_lens_size"] = "200";
$paramssld["ht_catalog_zoom_window_fadein"] = "200";
$paramssld["ht_catalog_zoom_window_fadeout"] = "200";
$paramssld["ht_catalog_zoom_lens_fadein"] = "200";
$paramssld["ht_catalog_zoom_lens_fadeout"] = "200";
$paramssld["ht_catalog_zoom_lens_hide"] = "false";
$paramssld["ht_catalog_zoom_lens_shape"] = "square";
$paramssld["ht_catalog_zoom_lens_color"] = "#fff";
$paramssld["ht_catalog_zoom_lens_opacity"] = "40";
$paramssld["ht_catalog_zoom_cursor"] = "crosshair";
$paramssld["ht_catalog_zoom_scrollzoom"] = "true";
$paramssld["ht_catalog_zoom_easing"] = "true";
$paramssld["ht_catalog_zoom_lens_size_fix"] = "false";
$paramssld["ht_catalog_zoom_lens_height"] = "100";
$paramssld["ht_catalog_zoom_lens_width"] = "100";
$paramssld["ht_catalog_zoom_tint"] = "true";
$paramssld["ht_catalog_zoom_tint_colour"] = "#fff";
$paramssld["ht_catalog_zoom_tint_opacity"] = "40";
$paramssld["ht_catalog_zoom_tint_fadein"] = "200";
$paramssld["ht_catalog_zoom_tint_fadeout"] = "200";
$paramssld["ht_view3_allow_lightbox"] = "off";
$paramssld["ht_catalog_zoom_thumbs_zoom"] = "off";
$paramssld["ht_view3_allow_zooming"] = "on";

$paramssld["ht_view0_sorting_float"] = "none";
$paramssld["ht_view1_sorting_float"] = "none";
$paramssld["ht_view2_sorting_float"] = "none";
$paramssld["ht_view3_sorting_float"] = "none";
$paramssld["ht_view4_sorting_float"] = "none";
$paramssld["ht_view5_sorting_float"] = "none";
$paramssld["ht_view6_sorting_float"] = "none";

$paramssld["ht_view0_filtering_float"] = "none";
$paramssld["ht_view1_filtering_float"] = "none";
$paramssld["ht_view2_filtering_float"] = "none";
$paramssld["ht_view3_filtering_float"] = "none";
$paramssld["ht_view4_filtering_float"] = "none";
$paramssld["ht_view5_filtering_float"] = "none";
$paramssld["ht_view6_filtering_float"] = "none";
$paramssld["ht_view0_allow_zooming"] = "off";
        $paramssld["ht_view0_allow_lightbox"] = "on";
        $paramssld["ht_view1_allow_zooming"] = "off";
        $paramssld["ht_view1_allow_lightbox"] = "on";
        $paramssld["ht_view2_allow_zooming"] = "off";
        $paramssld["ht_view2_allow_lightbox"] = "on";
        $paramssld["ht_view5_allow_zooming"] = "on";
        $paramssld["ht_view5_allow_lightbox"] = "off"; 
        
?>
<script>
        var allowZooming;
        var allowLightbox;
            var for_zoom;
            if("<?php echo $paramssld['ht_catalog_zoom_thumbs_zoom']; ?>" == "on"){
                for_zoom = ".for_zoom img, .thumbs-block img";
            }
            else if("<?php echo $paramssld['ht_catalog_zoom_thumbs_zoom']; ?>" == "off"){
                for_zoom = ".for_zoom img";
            }
//            var catalogThumbsZoom = "<?php echo $paramssld['ht_catalog_zoom_thumbs_zoom'];?>";
            var catalogZoomType = "<?php echo $paramssld['ht_catalog_zoom_window_type'];?>";
            var catalogWindowWidth = <?php echo $paramssld['ht_catalog_zoom_window_width'];?>;
            var catalogWindowHeight = <?php echo $paramssld['ht_catalog_zoom_window_height'];?>;
            var catalogWindowOffetx = <?php echo $paramssld['ht_catalog_zoom_x_asis'];?>;
            var catalogWindowOffety = <?php echo $paramssld['ht_catalog_zoom_y_asis'];?>;
            var catalogWindowPosition = <?php echo $paramssld['ht_catalog_zoom_window_position'];?>;
            var catalogBorderSize = <?php echo $paramssld['ht_catalog_zoom_window_border_size'];?>;
            var catalogBorderColour = "<?php echo $paramssld['ht_catalog_zoom_window_border_color'];?>";
            var catalogWindowFadeIn = <?php echo $paramssld['ht_catalog_zoom_window_fadein'];?>;
            var catalogWindowFadeOut = <?php echo $paramssld['ht_catalog_zoom_window_fadeout'];?>;
            var catalogLensSize = <?php echo $paramssld['ht_catalog_zoom_window_lens_size'];?>;

            var catalogLensFadeIn = <?php echo $paramssld['ht_catalog_zoom_lens_fadein'];?>;
            var catalogLensFadeOut = <?php echo $paramssld['ht_catalog_zoom_lens_fadeout'];?>;
            var catalogZoomLens = <?php echo $paramssld['ht_catalog_zoom_lens_hide'];?>;
            var catalogLensShape = "<?php echo $paramssld['ht_catalog_zoom_lens_shape'];?>";
            var catalogLensColour = "<?php echo $paramssld['ht_catalog_zoom_lens_color'];?>";
            var catalogLensOpacity = <?php echo $paramssld['ht_catalog_zoom_lens_opacity'];?>/100;
            var catalogCursor = "<?php echo $paramssld['ht_catalog_zoom_cursor'];?>";
            var catalogScrollZoom = <?php echo $paramssld['ht_catalog_zoom_scrollzoom'];?>;
            var catalogEasing = <?php echo $paramssld['ht_catalog_zoom_easing'];?>;

            var catalogTint = "<?php echo $paramssld['ht_catalog_zoom_tint'];?>";
            var catalogTintColour = "<?php echo $paramssld['ht_catalog_zoom_tint_colour'];?>";
            var catalogTintOpacity = <?php echo $paramssld['ht_catalog_zoom_tint_opacity'];?>/100;
            var catalogZoomTintFadeIn = <?php echo $paramssld['ht_catalog_zoom_tint_fadein'];?>;
            var catalogZoomTintFadeOut = <?php echo $paramssld['ht_catalog_zoom_tint_fadeout'];?>;
            var catalogGallery = null;
            
            var lightbox_transition = '<?php echo $paramssld['light_box_transition'];?>';
            var lightbox_speed = <?php echo $paramssld['light_box_speed'];?>;
            var lightbox_fadeOut = <?php echo $paramssld['light_box_fadeout'];?>;
            var lightbox_title = <?php echo $paramssld['light_box_title'];?>;
            var lightbox_scalePhotos = <?php echo $paramssld['light_box_scalephotos'];?>;
            var lightbox_scrolling = <?php echo $paramssld['light_box_scrolling'];?>;
            var lightbox_opacity = <?php echo ($paramssld['light_box_opacity']/100)+0.001;?>;
            var lightbox_open = <?php echo $paramssld['light_box_open'];?>;
            var lightbox_returnFocus = <?php echo $paramssld['light_box_returnfocus'];?>;
            var lightbox_trapFocus = <?php echo $paramssld['light_box_trapfocus'];?>;
            var lightbox_fastIframe = <?php echo $paramssld['light_box_fastiframe'];?>;
            var lightbox_preloading = <?php echo $paramssld['light_box_preloading'];?>;
            var lightbox_overlayClose = <?php echo $paramssld['light_box_overlayclose'];?>;
            var lightbox_escKey = <?php echo $paramssld['light_box_esckey'];?>;
            var lightbox_arrowKey = <?php echo $paramssld['light_box_arrowkey'];?>;
            var lightbox_loop = <?php echo $paramssld['light_box_loop'];?>;
            var lightbox_closeButton = <?php echo $paramssld['light_box_closebutton'];?>;
            var lightbox_previous = "<?php echo $paramssld['light_box_previous'];?>";
            var lightbox_next = "<?php echo $paramssld['light_box_next'];?>";
            var lightbox_close = "<?php echo $paramssld['light_box_close'];?>";
            var lightbox_html = <?php echo $paramssld['light_box_html'];?>;
            var lightbox_photo = <?php echo $paramssld['light_box_photo'];?>;
            var lightbox_width = '<?php if($paramssld['light_box_size_fix'] == 'false'){ echo 'false';} else { echo $paramssld['light_box_width']; } ?>';
            var lightbox_height = '<?php if($paramssld['light_box_size_fix'] == 'false'){ echo 'false';} else { echo $paramssld['light_box_height']; } ?>';
            var lightbox_innerWidth = '<?php echo $paramssld['light_box_innerwidth'];?>';
            var lightbox_innerHeight = '<?php echo $paramssld['light_box_innerheight'];?>';
            var lightbox_initialWidth = '<?php echo $paramssld['light_box_initialwidth'];?>';
            var lightbox_initialHeight = '<?php echo $paramssld['light_box_initialheight'];?>';

            var maxwidth=jQuery(window).width();
            if(maxwidth><?php echo $paramssld['light_box_maxwidth'];?>){ maxwidth=<?php echo $paramssld['light_box_maxwidth'];?>; }
            var lightbox_maxWidth = <?php if($paramssld['light_box_size_fix'] == 'true'){ echo '"100%"';} else { echo 'maxwidth'; } ?>;
            var lightbox_maxHeight = <?php if($paramssld['light_box_size_fix'] == 'true'){ echo '"100%"';} else { echo $paramssld['light_box_maxheight']; } ?>;

            var lightbox_slideshow = <?php echo $paramssld['light_box_slideshow'];?>;
            var lightbox_slideshowSpeed = <?php echo $paramssld['light_box_slideshowspeed'];?>;
            var lightbox_slideshowAuto = <?php echo $paramssld['light_box_slideshowauto'];?>;
            var lightbox_slideshowStart = "<?php echo $paramssld['light_box_slideshowstart'];?>";
            var lightbox_slideshowStop = "<?php echo $paramssld['light_box_slideshowstop'];?>";
            var lightbox_fixed = <?php echo $paramssld['light_box_fixed'];?>;
        
        
	<?php
	$pos = $paramssld['slider_title_position'];
	switch($pos){
	case 1:
	?>
		var lightbox_top = '10%';
		var lightbox_bottom = false;
		var lightbox_left = '10%';
		var lightbox_right = false;
	<?php
	break;	
	case 1:
	?>
		var lightbox_top = '10%';
		var lightbox_bottom = false;
		var lightbox_left = '10%';
		var lightbox_right = false;
	<?php
	break;	
	case 2:
	?>
		var lightbox_top = '10%';
		var lightbox_bottom = false;
		var lightbox_left = false;
		var lightbox_right = false;
	<?php
	break;	
	case 3:
	?>
		var lightbox_top = '10%';
		var lightbox_bottom = false;
		var lightbox_left = false;
		var lightbox_right = '10%';
	<?php
	break;
	case 4:
	?>
		var lightbox_top = false;
		var lightbox_bottom = false;
		var lightbox_left = '10%';
		var lightbox_right = false;
	<?php
	break;	
	case 5:
	?>
		var lightbox_top = false;
		var lightbox_bottom = false;
		var lightbox_left = false;
		var lightbox_right = false;
	<?php
	break;	
	case 6:
	?>
		var lightbox_top = false;
		var lightbox_bottom = false;
		var lightbox_left = false;
		var lightbox_right = '10%';
	<?php
	break;	
	case 7:
	?>
		var lightbox_top = false;
		var lightbox_bottom = '10%';
		var lightbox_left = '10%';
		var lightbox_right = false;
	<?php
	break;	
	case 8:
	?>
		var lightbox_top = false;
		var lightbox_bottom = '10%';
		var lightbox_left = false;
		var lightbox_right = false;
	<?php
	break;	
	case 9:
	?>
		var lightbox_top = false;
		var lightbox_bottom = '10%';
		var lightbox_left = false;
		var lightbox_right = '10%';
	<?php
	break;	
	} ?>
	
	var lightbox_reposition = <?php echo $paramssld['light_box_reposition'];?>;
	var lightbox_retinaImage = <?php echo $paramssld['light_box_retinaimage'];?>;
	var lightbox_retinaUrl = <?php echo $paramssld['light_box_retinaurl'];?>;
	var lightbox_retinaSuffix = "<?php echo $paramssld['light_box_retinasuffix'];?>";
	
				jQuery(document).ready(function(){

                                        var group_count = 0;
                                        jQuery(".catalog_colorbox_grouping_<?php echo $catalogID; ?>").each(function(){
                                            group_count++;
                                        });
                                        var i;
                                        for(i = 1; i <= group_count; i++){
                                            jQuery(".catalog_group" + i).colorbox({rel:'catalog_group' + i});
                                        }
        				
                                        var catalog_slider_slides_count = 0;
                                        jQuery(".slider-content").each(function(){
                                            catalog_slider_slides_count++;
                                        });
                                        catalog_slider_slides_count = catalog_slider_slides_count - 1;
                                        
                                        for(i = 1; i <= catalog_slider_slides_count; i++){
                                            jQuery(".catalog_slider_group" + i).colorbox({rel:'catalog_slider_group' + i});
                                            jQuery(".clone .catalog_slider_group" + i).removeClass("catalog_slider_group" + i + " cboxElement");
                                        }
                                        //alert(catalog_slider_slides_count);
                                        
                                        jQuery(".callbacks").colorbox({
                                                onOpen:function(){ alert('onOpen: colorbox is about to open'); },
                                                onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
                                                onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
                                                onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
                                                onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
                                        });
        
                                        jQuery('.non-retina').colorbox({rel:'group5', transition:'none'})
                                        jQuery('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
        				
        
                                        jQuery("#click").click(function(){ 
                                                jQuery('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
                                                return false;
                                        });
                                });
</script>
	<!--Huge IT catalog START-->
	<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( !(is_plugin_active( 'lightbox/lightbox.php' ) )) { 
		?>
	<link href="<?php echo plugins_url('../style/colorbox-'.$paramssld['light_box_style'].'.css', __FILE__);?>" rel="stylesheet" type="text/css" />
	<?php } ?>
		
	<?php
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( !(is_plugin_active( 'wp-lightbox-2/wp-lightbox-2.php' ) )) { ?>

	<?php } ?>
	
	
	
	

	<?php 
	$i = $catalogeffect;
	switch ($i) {
	
	
	/////////////////////////////// VIEW 0 Toggle Up/Down Blocks /////////////////////////////////////////
    case 0:
	?>

<?php
//    if($paramssld["ht_view0_sorting_float"] == "left" && $paramssld["ht_view0_filtering_float"] == "right" ||
//       $paramssld["ht_view0_sorting_float"] == "right" && $paramssld["ht_view0_filtering_float"] == "left" ||
//       $paramssld["ht_view0_sorting_float"] == $paramssld["ht_view0_filtering_float"])
//       { $sorting_block_width ="20%"; $filtering_block_width ="20%"; $middle_with = "56%"; }
//    else if($paramssld["ht_view0_sorting_float"] == "left" || $paramssld["ht_view0_sorting_float"] == "right" && $paramssld["ht_view0_filtering_float"] == "top")
//       { $sorting_block_width ="30%"; $filtering_block_width ="100%"; $paramssld["ht_view0_filtering_float"] = "none"; $width_middle = "65%"; }
//    else if($paramssld["ht_view0_filtering_float"] == "left" || $paramssld["ht_view0_filtering_float"] == "right" && $paramssld["ht_view0_sorting_float"] == "top")
//       { $sorting_block_width ="100%"; $filtering_block_width ="30%"; $paramssld["ht_view0_sorting_float"] = "none"; $width_middle = "65%"; }
//    if($paramssld["ht_view0_sorting_float"] == "top" && $paramssld["ht_view0_filtering_float"] == "top")
//       { $sorting_block_width ="100%"; $filtering_block_width ="100%"; $left_to_top = "ok"; }
?>
<style type="text/css">

.element_<?php echo $catalogID; ?> {
	background:#<?php echo $paramssld['ht_view0_element_background_color']?>;
	width:<?php echo $paramssld['ht_view0_block_width']; ?>px !important;
	margin: 5px;
	float: left;
	overflow: hidden;
	outline:none;
	border:<?php echo $paramssld['ht_view0_element_border_width']; ?>px solid #<?php echo $paramssld['ht_view0_element_border_color']; ?>;
}

.element_<?php echo $catalogID; ?>.large,
.variable-sizes .element_<?php echo $catalogID; ?>.large,
.variable-sizes .element_<?php echo $catalogID; ?>.large.width2.height2 {
	width: <?php echo $paramssld['ht_view0_block_width']; ?>px;
	z-index: 10;
}

.default-block_<?php echo $catalogID; ?> {
	position:relative;
	width:<?php echo $paramssld['ht_view0_block_width']; ?>px !important;
	height:<?php echo $paramssld['ht_view0_block_height']+45;?>px !important;
} 

.default-block_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> {
	margin:0px;
	padding:0px;
	line-height:0px;
	border-bottom:1px solid #<?php echo $paramssld['ht_view0_element_border_color']; ?>;
}

.default-block_<?php echo $catalogID; ?> img {
	margin:0px !important;
	padding:0px !important;
	max-width:none !important;
	width:<?php echo $paramssld['ht_view0_block_width']; ?>px !important;
	height:<?php echo $paramssld['ht_view0_block_height']; ?>px !important;
	border-radius:0px;
}

.default-block_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> {
	position:relative;
	display:block;
	height:35px;
	padding:10px 0px 0px 0px;
	width:<?php echo $paramssld['ht_view0_block_width']; ?>px !important;
}

.default-block_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> h3 {
	position:relative;
	margin:0px !important;
	padding:0px 0px 0px 5px !important;
	width:<?php echo $paramssld['ht_view0_block_width']-30; ?>px !important;
	text-overflow: ellipsis;
	overflow: hidden; 
	white-space:nowrap;
	font-weight:normal;
	color:#<?php echo $paramssld['ht_view0_title_font_color']; ?>;
	font-size:<?php echo $paramssld['ht_view0_title_font_size']; ?>px !important;
	line-height:<?php echo $paramssld['ht_view0_title_font_size']+4; ?>px !important;
}

.element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> .open-close-button {
	width:20px;
	height:20px;
	display:block;
	position:absolute;
	top:13px;
	right:2%;
	background:url('<?php echo  plugins_url( '../images/open-close.'.$paramssld['ht_view0_togglebutton_style'].'.png' , __FILE__ ); ?>') left top no-repeat;
	z-index:5;
	cursor:pointer;
	opacity:0.33;
}

 .element_<?php echo $catalogID; ?>:hover .title-block_<?php echo $catalogID; ?> .open-close-button {opacity:1;}

.element_<?php echo $catalogID; ?>.large .open-close-button {
	background:url('<?php echo  plugins_url( '../images/open-close.'.$paramssld['ht_view0_togglebutton_style'].'.png' , __FILE__ ); ?>') left bottom no-repeat;
}

.wd-catalog-panel_<?php echo $catalogID; ?> {
	position: absolute;
	display:block;
	width:<?php echo $paramssld['ht_view0_block_width']-10; ?>px !important;
	margin:0px 5px 0px 5px;
	padding:0px;
	text-align:left;
	top:<?php echo $paramssld['ht_view0_block_height']+45; ?>px;  
	z-index:6; 
	height:200px;
}


.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?>, .element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> * {
	position:relative;
	clear:both;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> p,.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> * {	
	text-align:justify;
	font-weight:normal;
	font-size:<?php echo $paramssld['ht_view0_description_font_size']; ?>px;
	color:#<?php echo $paramssld['ht_view0_description_color']; ?>;
	margin:0px;
	padding:0px;
}



.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h1,
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h2,
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h3,
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h4,
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h5,
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h6,
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> p, 
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> strong,
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> span {
	padding:2px !important;
	margin:0px !important;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> ul,
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> li {
	padding:2px 0px 2px 5px;
	margin:0px 0px 0px 8px;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .price-block_<?php echo $catalogID; ?> {
    color: #<?php echo $paramssld['ht_catalog_view0_price_font_color']?>;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .price-block_<?php echo $catalogID; ?> .old-price {
	text-decoration: line-through;
        margin: 0px;
        padding: 0px;
        font-weight: normal;
/*        font-size: 14px;*/
        padding: 7px 10px 7px 10px;
        margin: 0px 10px 0px 0px;
        border-radius: 5px;
        color: #<?php echo $paramssld['ht_view0_element_background_color']?>;
        background: #<?php echo $paramssld['ht_catalog_view0_price_font_color']?>;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .price-block_<?php echo $catalogID; ?>> .old-price-block {
	font-size: <?php echo $paramssld['ht_catalog_view0_price_font_size']; ?>px;
        color: #<?php echo $paramssld['ht_catalog_view0_price_font_color']; ?>;
        
}

.wd-catalog-panel_<?php echo $catalogID; ?> .price-block_<?php echo $catalogID; ?>> .discont-price-block {
	/*font-size: <?php echo $paramssld['ht_catalog_view0_market_price_font_size']; ?>px;*/
        /*color: #<?php echo $paramssld['ht_catalog_view0_market_price_font_color']; ?>;*/
}

.wd-catalog-panel_<?php echo $catalogID; ?> .thumbs-list_<?php echo $catalogID; ?> {
	position:relative;
	clear:both;
	list-style:none;
	display:table;
	width:100%;
	padding:0px;
	margin:3px 0px 0px 0px;
	text-align:center;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .thumbs-list_<?php echo $catalogID; ?> li {
	display:inline-block;
	margin:0px 3px 0px 2px;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .thumbs-list_<?php echo $catalogID; ?> li a {
	display:block;
	width:<?php echo $paramssld['ht_view0_thumbs_width']; ?>px;
	height:<?php echo $paramssld['ht_view0_thumbs_width']; ?>px;
	opacity:0.7;
	display:table;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .thumbs-list_<?php echo $catalogID; ?> li a:hover {
	opacity:1;
}

.wd-catalog-panel_<?php echo $catalogID; ?> img {
	margin:0px !important;
	padding:0px !important;
	display:table-cell;
	vertical-align:middle;
	width:<?php echo $paramssld['ht_view0_thumbs_width']; ?>px !important;
	max-height:<?php echo $paramssld['ht_view0_thumbs_width']; ?>px !important;
	width:100%;
	height:100%;
}

.wd-catalog-panel_<?php echo $catalogID; ?> > div {
	position:relative;
	clear:both;
	padding: 15px 0 3px 0px;
	margin-bottom:10px;
	<?php if($paramssld['ht_view0_show_separator_lines']=="on") {?>
		background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center top repeat-x;
	<?php } ?>
}

.wd-catalog-panel_<?php echo $catalogID; ?> .button-block {
	padding-top:10px;
	margin-bottom:10px;
	
}

.wd-catalog-panel_<?php echo $catalogID; ?> .button-block a, .wd-catalog-panel_<?php echo $catalogID; ?> .button-block a:link, .wd-catalog-panel_<?php echo $catalogID; ?> .button-block a:visited {
	padding:6px 12px;
	text-decoration:none;
	display:inline-block;
	font-size:<?php echo $paramssld['ht_view0_linkbutton_font_size']; ?>px;
	background:#<?php echo $paramssld['ht_view0_linkbutton_background_color']; ?>;
	color:#<?php echo $paramssld['ht_view0_linkbutton_color']; ?>;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .button-block a:hover, .wd-catalog-panel_<?php echo $catalogID; ?> .button-block a:focus, .wd-catalog-panel_<?php echo $catalogID; ?> .button-block a:active {
	background:#<?php echo $paramssld['ht_view0_linkbutton_background_hover_color']; ?>;
	color:#<?php echo $paramssld['ht_view0_linkbutton_font_hover_color']; ?>;
	text-decoration:none;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> {
    <?php if ($paramssld["ht_view0_show_sorting"] == 'off')
    echo "display:none;";
    if($paramssld["ht_view0_filtering_float"] == 'left' && $paramssld["ht_view0_sorting_float"] == 'none') { if($catalogShowFiltering == "on") { echo "margin-left: 31%;"; } else echo "margin-left: 1%;"; }
    else if($paramssld["ht_view0_filtering_float"] == 'right' && $paramssld["ht_view0_sorting_float"] == 'none' || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%;"; } ?>
    overflow: hidden;
    margin-top: 5px;
    float: <?php echo $paramssld["ht_view0_sorting_float"]; ?>;
    width: <?php echo $sorting_block_width; ?>;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul {
  margin: 0px !important;
  padding: 0px !important;
  list-style: none;
<?php if($paramssld["ht_view0_sorting_float"] == 'top') {
      echo "float:left;margin-left:1%;";
      } ?>
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul {
  margin: 0px !important;
  padding: 0px !important;
  overflow: hidden;
  <?php if($paramssld["ht_view0_filtering_float"] == 'top') {
      echo "float:left;margin-left:1%;";
      } ?>
}

<?php if($paramssld["ht_view0_sorting_float"] == 'none') { ?>
            #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul {
                float: left;
            }
    <?php } ?>
            
#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li {
    border-radius: <?php echo $paramssld["ht_view0_sortbutton_border_radius"];?>px;
    list-style-type: none;
    margin: 0px !important;
    <?php
        if($sorting_block_width == "100%" ) {
            echo "float:left !important;margin: 4px 8px 4px 0px !important;";
        }
        if($left_to_top == "ok")
        { echo "float:left !important;"; }
        if($paramssld["ht_view0_sorting_float"] == "left" || $paramssld["ht_view0_sorting_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else
        { echo 'border: 1px solid #ccc;'; }
    ?>
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li a {
    background-color: #<?php echo $paramssld["ht_view0_sortbutton_background_color"];?> !important;
    font-size:<?php echo $paramssld["ht_view0_sortbutton_font_size"];?>px !important;
    color:#<?php echo $paramssld["ht_view0_sortbutton_font_color"];?> !important;
    text-decoration: none;
    cursor: pointer;
    margin: 0px !important;
    display: block;
    padding:3px;
}

/*#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li:hover {
    
}*/

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li a:hover {
    background-color: #<?php echo $paramssld["ht_view0_sortbutton_hover_background_color"];?> !important;
    color:#<?php echo $paramssld["ht_view0_sortbutton_hover_font_color"];?> !important;
    cursor: pointer;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> {
    margin-top: 5px;
    float: <?php echo $paramssld["ht_view0_filtering_float"]; ?>;
    width: <?php echo $filtering_block_width; ?>;
    <?php
        if ($paramssld["ht_view0_show_filtering"] == 'off') echo "display:none;";
        if($paramssld["ht_view0_filtering_float"] == 'none' && ($paramssld["ht_view0_sorting_float"] == 'left') ) { if($catalogShowSorting == 'on') { echo "margin-left: 31%;"; } else echo "margin-left: 1%"; } 
        if(($paramssld["ht_view0_filtering_float"] == 'none' && ($paramssld["ht_view0_sorting_float"] == 'right')) || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%";}
    ?>
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul li {
    list-style-type: none;
    <?php
        if($filtering_block_width == "100%") { echo "float:left !important;margin: 4px 8px 4px 0px !important;"; }
        if($left_to_top == "ok") { echo "float:left !important;"; }
        if($paramssld["ht_view0_filtering_float"] == "left" || $paramssld["ht_view0_filtering_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else echo "border: 1px solid #ccc;";
    ?>
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul li a {
    font-size:<?php echo $paramssld["ht_view0_filterbutton_font_size"];?>px !important;
    color:#<?php echo $paramssld["ht_view0_filterbutton_font_color"];?> !important;
    background-color: #<?php echo $paramssld["ht_view0_filterbutton_background_color"];?> !important;
    border-radius: <?php echo $paramssld["ht_view0_filterbutton_border_radius"];?>px;
    padding: 3px;
    display: block;
    text-decoration: none;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?>  ul li a:hover {
    color:#<?php echo $paramssld["ht_view0_filterbutton_hover_font_color"];?> !important;
    background-color: #<?php echo $paramssld["ht_view0_filterbutton_hover_background_color"];?> !important;
    cursor: pointer;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> section {
    position:relative;
    display:block;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_container_<?php echo $catalogID; ?> {
<?php if($paramssld["ht_view0_sorting_float"] == "left" && $paramssld["ht_view0_filtering_float"] == "right" ||
         $paramssld["ht_view0_sorting_float"] == "right" && $paramssld["ht_view0_filtering_float"] == "left")
       { echo "margin: 0px auto;"; }
       if((($paramssld["ht_view0_filtering_float"] == "left" || $paramssld["ht_view0_filtering_float"] == "right" && $paramssld["ht_view0_sorting_float"] == "top") || ($paramssld["ht_view0_sorting_float"] == "left" || $paramssld["ht_view0_sorting_float"] == "right" && $paramssld["ht_view0_filting_float"] == "top")) && $catalogShowFiltering == "on" && $catalogShowSorting == "on")
       {
?>
        width: <?php echo $width_middle; ?> !important;
 <?php } ?>
}

.zoomContainer {
    z-index: 10;
}

</style>

<section id="huge_it_catalog_content_<?php echo $catalogID; ?>">
      <?php if($catalogShowSorting == "on")
        { ?>
          <div id="huge_it_catalog_options_<?php echo $catalogID; ?>" class="" >
            <ul id="sort-by" class="option-set clearfix" data-option-key="sortBy">
                <li><a href="#sortBy=original-order" data-option-value="original-order" class="selected" data><?php echo $paramssld["ht_view0_sorting_name_by_default"]; ?></a></li>
                <li><a href="#sortBy=id" data-option-value="id"><?php echo $paramssld["ht_view0_sorting_name_by_id"]; ?></a></li>
                <li><a href="#sortBy=symbol" data-option-value="symbol"><?php echo $paramssld["ht_view0_sorting_name_by_name"]; ?></a></li>
                <li id="shuffle"><a href='#shuffle'><?php echo $paramssld["ht_view0_sorting_name_by_random"]; ?></a></li>
            </ul>
              
            <ul id="sort-direction" class="option-set clearfix" data-option-key="sortAscending">
                <li><a href="#sortAscending=true" data-option-value="true" class="selected"><?php echo $paramssld["ht_view0_sorting_name_by_asc"]; ?></a></li>
                <li><a href="#sortAscending=false" data-option-value="false"><?php echo $paramssld["ht_view0_sorting_name_by_desc"]; ?></a></li>
            </ul>
          </div>
  <?php }
   if($catalogShowFiltering == "on")
      { ?>
         <div id="huge_it_catalog_filters_<?php echo $catalogID; ?>" style>
            <ul>
                <li rel="*"><a>All</a></li>
                <?php
                $catalogCats = explode(",", $catalogCats);
                foreach ($catalogCats as $catalogCatsValue) {
                    if(!empty($catalogCatsValue))
                    {
                ?>
                <li rel=".<?php echo str_replace(" ","_",$catalogCatsValue); ?>"><a><?php echo str_replace("_"," ",$catalogCatsValue); ?></a></li>
                    <?php
                    }
                }
                ?>
            </ul>
        </div>
<?php } ?>
        <div id="huge_it_catalog_container_<?php echo $catalogID; ?>" class="super-list variable-sizes clearfix" <?php // if($paramssld["ht_view0_sorting_float"] == "top" && $paramssld["ht_view0_filtering_float"] == "top") echo "style='clear: both;'";?>>
              <?php
              $group_key = 0;
              foreach($images as $key=>$row)
              {
                      $group_key++;
                      $link = $row->sl_url;
                      $descnohtml=strip_tags($row->description);
                      $result = substr($descnohtml, 0, 50);
//                      $catForFilter = explode(",", $row->category);
                      ?>
                      <div class="element_<?php echo $catalogID; ?>  <?php if($paramssld['ht_view0_allow_lightbox'] == "on"){ echo "catalog_colorbox_grouping_".$catalogID;} ?> " data-symbol="<?php echo $row->name; ?>" data-category="alkaline-earth">
                              <div class="default-block_<?php echo $catalogID; ?>">
                                      <div class="image-block_<?php echo $catalogID; ?> for_zoom">
                                              <?php $imgurl=explode(";",$row->image_url); ?>
                                              <?php 	if($row->image_url != ';'){ ?>
                                                    <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo $imgurl[0]; ?>" />
                                              <?php } else { ?>
                                              <img id="wd-cl-img<?php echo $key; ?>" src="images/noimage.png" />
                                              <?php
                                              } ?>	
                                      </div>
                                      <div class="title-block_<?php echo $catalogID; ?>">
                                              <h3 class="title"><?php echo $row->name; ?></h3>
                                              <div class="open-close-button"></div>
                                      </div>
                              </div>

                              <div class="wd-catalog-panel_<?php echo $catalogID; ?>" id="panel<?php echo $key; ?>">
                              <?php if($paramssld['ht_view0_show_thumbs']=='on' and $paramssld['ht_view0_thumbs_position']=="before")
                                      {?>
                                              <div class="thumbs-block">
                                                      <ul class="thumbs-list_<?php echo $catalogID; ?>">
                                                              <?php
                                                              $imgurl=explode(";",$row->image_url);
                                                              array_pop($imgurl);
                                                              foreach($imgurl as $key1=>$img)
                                                              {
                                                              ?>
                                                              <li>
                                                                      <a href="<?php echo $img; ?>" class="catalog_group<?php echo $group_key; ?>"><img src="<?php echo $img; ?>"></a>
                                                              </li>
                                                              <?php
                                                              }
                                                              ?>
                                                      </ul>
                                              </div>
                                      <?php } 
                                      if($paramssld['ht_view0_show_description']=='on'){?>
                                              <div class="description-block_<?php echo $catalogID; ?>">
                                                      <p><?php echo $row->description; ?></p>
                                              </div>
                                      <?php }
                                      if($paramssld['ht_view0_show_thumbs']=='on' and $paramssld['ht_view0_thumbs_position']=="after"){?>
                                          <div class="thumbs-block">
                                              <ul class="thumbs-list_<?php echo $catalogID; ?>">
                                                <?php
                                                    $imgurl=explode(";",$row->image_url);
                                                    array_pop($imgurl);
                                                    foreach($imgurl as $key=>$img)
                                                    { ?>
                                                        <li>
                                                                <a href="<?php echo $img; ?>" class=""><img src="<?php echo $img; ?>"></a>
                                                        </li>
                                              <?php }
                                                ?>
                                              </ul>
                                          </div>
                                <?php } ?>
                                  
                                <?php if($paramssld["ht_catalog_view0_show_price"] == 'on' && $row->price != ""){ ?>
                                          <div class="price-block_<?php echo $catalogID; ?>">
                                              <span class="old-price-block" ><?php echo $paramssld['ht_view0_price_text']; ?> : <span class="old-price" <?php if($row->market_price == "") { echo "style='text-decoration: none !important;'"; } ?>><?php echo $row->price; ?></span></span>
                                              <span class="discont-price-block" ><span class="discont-price" ><?php echo $row->market_price; ?></span></span>
                                          </div>
                                <?php } ?>
                                  
                                <?php
                                      if($paramssld['ht_view0_show_linkbutton']=='on'){
                                          $page_link = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                                          if (strpos(get_permalink(),'/?') !== false) { $product_page_link = get_permalink()."&single_prod_id=$row->id"; } else { if (strpos(get_permalink(),'/') !== false) { $product_page_link = get_permalink()."?single_prod_id=$row->id"; } else { $product_page_link = get_permalink()."/?single_prod_id=$row->id"; } }
                                          ?>
                                              <div class="button-block">
                                                      <a href="<?php echo $product_page_link; ?>" <?php if ($row->link_target=="on"){echo 'target="_blank"';}?>><?php echo $paramssld['ht_view0_linkbutton_text']; ?></a>
                                              </div>
                                <?php } ?>
                              </div>
                      </div>

                      <?php
              }
              ?>
        </div>
</section>

<script>
    var allowZooming = '<?php echo $paramssld['ht_view0_allow_zooming'];?>';
jQuery(function(){        
var defaultBlockHeight=<?php echo $paramssld['ht_view0_block_height']; ?>;
var defaultBlockWidth=<?php echo $paramssld['ht_view0_block_width']; ?>;
    
    var $container = jQuery('#huge_it_catalog_container_<?php echo $catalogID; ?>');
    
    
      // add randomish size classes
      $container.find('.element_<?php echo $catalogID; ?>').each(function(){
        var $this = jQuery(this),
            number = parseInt( $this.find('.number').text(), 10 );
			//alert(number);
        if ( number % 7 % 2 === 1 ) {
          $this.addClass('width2');
        }
        if ( number % 3 === 0 ) {
          $this.addClass('height2');
        }
      });
    
    $container.hugeitmicro({
      itemSelector : '.element_<?php echo $catalogID; ?>',
      masonry : {
        columnWidth :  <?php echo $paramssld['ht_view0_block_width']; ?>+20+<?php echo $paramssld['ht_view0_element_border_width']*2; ?>
      },
      masonryHorizontal : {
        rowHeight: 300+20
      },
      cellsByRow : {
        columnWidth : 300+20,
        rowHeight : 240
      },
      cellsByColumn : {
        columnWidth : 300+20,
        rowHeight : 240
      },
      getSortData : {
        symbol : function( $elem ) {
          return $elem.attr('data-symbol');
        },
        category : function( $elem ) {
          return $elem.attr('data-category');
        },
        number : function( $elem ) {
          return parseInt( $elem.find('.number').text(), 10 );
        },
        weight : function( $elem ) {
          return parseFloat( $elem.find('.weight').text().replace( /[\(\)]/g, '') );
        },
        id : function ( $elem ) {
          return $elem.find('.id').text();
        }
      }
    });
        

    var $optionSets = jQuery('#huge_it_catalog_options_<?php echo $catalogID; ?> .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = jQuery(this);

        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  

        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');

        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {

          changeLayoutMode( $this, options )
        } else {

          $container.hugeitmicro( options );
        }
        
        return false;
      });

      var isHorizontal = false;
      function changeLayoutMode( $link, options ) {
        var wasHorizontal = isHorizontal;
        isHorizontal = $link.hasClass('horizontal');

        if ( wasHorizontal !== isHorizontal ) {

          var style = isHorizontal ? 
            { height: '75%', width: $container.width() } : 
            { width: 'auto' };

          $container.filter(':animated').stop();

          $container.addClass('no-transition').css( style );
          setTimeout(function(){
            $container.removeClass('no-transition').hugeitmicro( options );
          }, 100 )
        } else {
          $container.hugeitmicro( options );
        }
      }
    

      $container.delegate( '.title-block_<?php echo $catalogID; ?>', 'click', function(){
          var strheight=0;
          jQuery(this).parents('.element_<?php echo $catalogID; ?>').find('.wd-catalog-panel_<?php echo $catalogID; ?> > div').each(function(){
                strheight+=jQuery(this).outerHeight()+10;
                //alert(strheight);
          })
          strheight+=<?php echo $paramssld['ht_view0_block_height']+45; ?>;
	  			if(jQuery(this).parents('.element_<?php echo $catalogID; ?>').hasClass("large")){
			jQuery(this).parents('.element_<?php echo $catalogID; ?>').animate({
				height: "<?php echo $paramssld['ht_view0_block_height']+45; ?>px"
			}, 300, function() {
				jQuery(this).removeClass('large');
				$container.hugeitmicro('reLayout');
			});
			
			jQuery(this).parents('.element_<?php echo $catalogID; ?>').removeClass("active");
			return false;
		}
		
	
		jQuery(this).parents('.element_<?php echo $catalogID; ?>').css({height:strheight});
		jQuery(this).parents('.element_<?php echo $catalogID; ?>').addClass('large');

		$container.hugeitmicro('reLayout');
		jQuery(this).parents('.element_<?php echo $catalogID; ?>').css({height:"<?php echo $paramssld['ht_view0_block_height']+45; ?>px"});		 
		 
		//alert(strheight);
		 
		 jQuery(this).parents('.element_<?php echo $catalogID; ?>').animate({
			height:strheight+"px",
		  }, 300,function(){	$container.hugeitmicro('reLayout');});
	});

    var $sortBy =  jQuery('#huge_it_catalog_content_<?php echo $catalogID; ?> #sort-by');
    jQuery('#huge_it_catalog_content_<?php echo $catalogID; ?> #shuffle a').click(function(){
      $container.hugeitmicro('shuffle');
      $sortBy.find('.selected').removeClass('selected');
      $sortBy.find('[data-option-value="random"]').addClass('selected');
      return false;
    });
    
        // bind filter on select change
        jQuery(document).ready(function(){
            jQuery('#huge_it_catalog_filters_<?php echo $catalogID; ?> ul li').click(function() {
              // get filter value from option value
              var filterValue = jQuery(this).attr('rel');
              // use filterFn if matches value
              filterValue = filterValue;//filterFns[ filterValue ] || 
              $container.hugeitmicro({ filter: filterValue });
            });
            <?php // if(($paramssld["ht_view0_sorting_float"] == "left" || $paramssld["ht_view0_sorting_float"] == "right") && $paramssld["ht_view0_filtering_float"] == "none")
//                  { ?>
//                        var topmargin = jQuery("#huge_it_catalog_filters_<?php echo $catalogID; ?> ul").height();
//                        jQuery("#huge_it_catalog_options_<?php echo $catalogID; ?>").css({'margin-top':parseInt(topmargin) + 5});
            <?php // }
//            else  {
//                    if(($paramssld["ht_view0_filtering_float"] == "left" || $paramssld["ht_view0_filtering_float"] == "right") && $paramssld["ht_view0_sorting_float"] == "none")
//                      { ?>
//                         var topmargin = jQuery("#huge_it_catalog_options_<?php echo $catalogID; ?>").height();
//                         jQuery("#huge_it_catalog_filters_<?php echo $catalogID; ?>").css({'margin-top':'5px'});
                <?php // }
//                  } ?>
        });
        
        jQuery(window).load(function(){

            $container.hugeitmicro({ filter: '*' });
        });
  });
</script>
	
<?php        
        break;
	
	///////////////////////////////// VIEW 1 FullHeight Blocks //////////////////////////////////////////////
	
	case 1;
 ?>
<?php
//    if($paramssld["ht_view1_sorting_float"] == "left" && $paramssld["ht_view1_filtering_float"] == "right" ||
//       $paramssld["ht_view1_sorting_float"] == "right" && $paramssld["ht_view1_filtering_float"] == "left" ||
//       $paramssld["ht_view1_sorting_float"] == $paramssld["ht_view1_filtering_float"])
//       { $sorting_block_width ="20%"; $filtering_block_width ="20%"; $middle_with = "56%"; }
//    else if($paramssld["ht_view1_sorting_float"] == "left" || $paramssld["ht_view1_sorting_float"] == "right" && $paramssld["ht_view1_filtering_float"] == "top")
//       { $sorting_block_width ="30%"; $filtering_block_width ="100%"; $paramssld["ht_view1_filtering_float"] = "none"; $width_middle = "65%"; }
//    else if($paramssld["ht_view1_filtering_float"] == "left" || $paramssld["ht_view1_filtering_float"] == "right" && $paramssld["ht_view1_sorting_float"] == "top")
//       { $sorting_block_width ="100%"; $filtering_block_width ="30%"; $paramssld["ht_view1_sorting_float"] = "none"; $width_middle = "65%"; }
//    if($paramssld["ht_view1_sorting_float"] == "top" && $paramssld["ht_view1_filtering_float"] == "top")
//       { $sorting_block_width ="100%"; $filtering_block_width ="100%"; $left_to_top = "ok"; }
?>

<style type="text/css"> 
.element_<?php echo $catalogID; ?> {
  width:<?php echo $paramssld['ht_view1_block_width']; ?>px;
  height:auto;
  margin: 5px;
  float: left;
  overflow: hidden;
  position: relative;
  outline:none; 
  background:#<?php echo $paramssld['ht_view1_element_background_color']?>;
  border:<?php echo $paramssld['ht_view1_element_border_width']; ?>px solid #<?php echo $paramssld['ht_view1_element_border_color']; ?>;
}

.default-block_<?php echo $catalogID; ?> {
	position:relative;;
	width:<?php echo $paramssld['ht_view1_block_width']; ?>px;
} 

.default-block_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> {
	margin:0px;
	padding:0px;
	line-height:0px;
	border:1px solid #<?php echo $paramssld['ht_view1_element_border_color']; ?>;
}

.default-block_<?php echo $catalogID; ?> img {
  margin:0px !important;
  padding:0px !important;
  max-width:none !important;
  width:<?php echo $paramssld['ht_view1_block_width']; ?>px !important;
  border-radius:0px;
}

.default-block_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> {
	display:block;
	height:35px;
	padding:10px 0px 0px 0px;
	width:100%;
}

.default-block_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> h3 {
	position:relative;
	margin:0px !important;
	padding:0px 5px 0px 5px !important;
	width:<?php echo $paramssld['ht_view1_block_width']; ?>px !important;
	text-overflow: ellipsis;
	overflow: hidden; 
	white-space:nowrap;
	font-weight:normal;
	color:#<?php echo $paramssld['ht_view1_title_font_color']; ?>;
	font-size:<?php echo $paramssld['ht_view1_title_font_size']; ?>px !important;
	line-height:<?php echo $paramssld['ht_view1_title_font_size']+4; ?>px !important;
}


.wd-catalog-panel_<?php echo $catalogID; ?> {
	position: relative;
	display:block;
	width:<?php echo $paramssld['ht_view1_block_width']-10; ?>px !important;
	margin:10px 5px 0px 5px;
	padding:0px;
	text-align:left;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> p,.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> * {	
	text-align:justify;
	font-weight:normal;
	font-size:<?php echo $paramssld['ht_view1_description_font_size']; ?>px !important;
	color:#<?php echo $paramssld['ht_view1_description_color']; ?>;
	margin:0px !important;
	padding:0px !important;
}


.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h1,
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h2,
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h3,
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h4,
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h5,
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h6,
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> p, 
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> strong,
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> span {
	padding:2px !important;
	margin:0px !important;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> ul,
.wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> li {
	padding:2px 0px 2px 5px;
	margin:0px 0px 0px 8px;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .price-block_<?php echo $catalogID; ?>{
    color: #<?php echo $paramssld['ht_catalog_view1_price_font_color']?>;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .price-block_<?php echo $catalogID; ?> .old-price {
	text-decoration: line-through;
        margin: 0px;
        padding: 0px;
        font-weight: normal;
/*        font-size: 14px;*/
        padding: 7px 10px 7px 10px;
        margin: 0px 10px 0px 0px;
        border-radius: 5px;
        color: #<?php echo $paramssld['ht_view1_element_background_color']?>;
        background: #<?php echo $paramssld['ht_catalog_view1_price_font_color']?>;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .price-block_<?php echo $catalogID; ?> .old-price-block {
	font-size: <?php echo $paramssld['ht_catalog_view1_price_font_size']; ?>px;
        color: #<?php echo $paramssld['ht_catalog_view1_price_font_color']; ?>;
        
}

.wd-catalog-panel_<?php echo $catalogID; ?> .price-block_<?php echo $catalogID; ?> .discont-price-block {
/*	font-size: <?php echo $paramssld['ht_catalog_view1_market_price_font_size']; ?>px;
        color: #<?php echo $paramssld['ht_catalog_view1_market_price_font_color']; ?>; */
}

.wd-catalog-panel_<?php echo $catalogID; ?> .thumbs-list_<?php echo $catalogID; ?> {
	list-style:none;
	clear:both;
	display:table;
	width:100%;
	padding:0px;
	margin:3px 0px 0px 0px;
	text-align:center;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .thumbs-list_<?php echo $catalogID; ?> li {
	display:inline-block;
	margin:0px 3px 0px 2px;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .thumbs-list_<?php echo $catalogID; ?> li a {
	display:block;
	width:<?php echo $paramssld['ht_view1_thumbs_width']; ?>px;
	height:<?php echo $paramssld['ht_view1_thumbs_width']; ?>px;
	opacity:0.7;
	display:table;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .thumbs-list_<?php echo $catalogID; ?> li a:hover {
	opacity:1;
}

.wd-catalog-panel_<?php echo $catalogID; ?> img {
	margin:0px !important;
	padding:0px !important;
	display:table-cell;
	vertical-align:middle;
	width:<?php echo $paramssld['ht_view1_thumbs_width']; ?>px !important;
	max-height:<?php echo $paramssld['ht_view1_thumbs_width']; ?>px !important;
	width:100%;
	height:100%;
}

.wd-catalog-panel_<?php echo $catalogID; ?> > div {
	padding: 15px 0 3px 0px;
	margin-bottom:10px;
	<?php if($paramssld['ht_view1_show_separator_lines']=="on") {?>
		background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center top repeat-x;
	<?php } ?>
}

.wd-catalog-panel_<?php echo $catalogID; ?> .button-block {
	padding-top:10px;
	margin-bottom:10px;
	
}

.wd-catalog-panel_<?php echo $catalogID; ?> .button-block a, .wd-catalog-panel_<?php echo $catalogID; ?> .button-block a:link, .wd-catalog-panel_<?php echo $catalogID; ?> .button-block a:visited {
	padding:10px;
	display:inline-block;
	font-size:<?php echo $paramssld['ht_view1_linkbutton_font_size']; ?>px;
	background:#<?php echo $paramssld['ht_view1_linkbutton_background_color']; ?>;
	color:#<?php echo $paramssld['ht_view1_linkbutton_color']; ?>;
	padding:6px 12px;
	text-decoration:none;
}

.wd-catalog-panel_<?php echo $catalogID; ?> .button-block a:hover, .wd-catalog-panel_<?php echo $catalogID; ?> .button-block a:focus, .wd-catalog-panel_<?php echo $catalogID; ?> .button-block a:active {
	background:#<?php echo $paramssld['ht_view1_linkbutton_background_hover_color']; ?>;
	color:#<?php echo $paramssld['ht_view1_linkbutton_font_hover_color']; ?>;
	text-decoration:none;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> {
    <?php if ($paramssld["ht_view1_show_sorting"] == 'off')
    echo "display:none;";
//    if($paramssld["ht_view1_filtering_float"] == 'left' && $paramssld["ht_view1_sorting_float"] == 'none') { if($catalogShowFiltering == "on") { echo "margin-left: 31%;"; } else echo "margin-left: 1%;"; }
//    else if($paramssld["ht_view1_filtering_float"] == 'right' && $paramssld["ht_view1_sorting_float"] == 'none' || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%;"; } ?>
    overflow: hidden;
    margin-top: 5px;
    float: <?php // echo $paramssld["ht_view1_sorting_float"]; ?>;
    width:<?php echo $sorting_block_width; ?>;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul {
  margin: 0px !important;
  padding: 0px !important;
  list-style: none;
<?php // if($paramssld["ht_view1_sorting_float"] == 'top') {
//      echo "float:left;margin-left:1%;";
//      } ?>
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul {
  margin: 0px !important;
  padding: 0px !important;
  overflow: hidden;
  <?php // if($paramssld["ht_view1_filtering_float"] == 'top') {
//      echo "float:left;margin-left:1%;";
//      } ?>
}

<?php // if($paramssld["ht_view1_sorting_float"] == 'none') { ?>
/*            #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul {
                float: left;
            }*/
    <?php // } ?>


#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li {
    border-radius: <?php echo $paramssld["ht_view1_sortbutton_border_radius"];?>px;
    list-style-type: none;
    margin: 0px !important;
    <?php
//        if($sorting_block_width == "100%" ) {
//            echo "float:left !important;margin: 4px 8px 4px 0px !important;";
//        }
//        if($left_to_top == "ok")
//        { echo "float:left !important;"; }
//        if($paramssld["ht_view1_sorting_float"] == "left" || $paramssld["ht_view1_sorting_float"] == "right")
//        { echo 'border-bottom: 1px solid #ccc;'; }
//        else
//        { echo 'border: 1px solid #ccc;'; }
    ?>
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li a {
    background-color: #<?php echo $paramssld["ht_view1_sortbutton_background_color"];?> !important;
    font-size:<?php echo $paramssld["ht_view1_sortbutton_font_size"];?>px !important;
    color:#<?php echo $paramssld["ht_view1_sortbutton_font_color"];?> !important;
    text-decoration: none;
    cursor: pointer;
    margin: 0px !important;
    display: block;
    padding:3px;
}

/*#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li:hover {
    
}*/

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li a:hover {
    background-color: #<?php echo $paramssld["ht_view1_sortbutton_hover_background_color"];?> !important;
    color:#<?php echo $paramssld["ht_view1_sortbutton_hover_font_color"];?> !important;
    cursor: pointer;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> {
    margin-top: 5px;
/*    float: <?php echo $paramssld["ht_view1_filtering_float"]; ?>;
    width: <?php echo $filtering_block_width; ?>;*/
    <?php
        if ($paramssld["ht_view1_show_filtering"] == 'off') echo "display:none;";
//        if($paramssld["ht_view1_filtering_float"] == 'none' && $paramssld["ht_view1_sorting_float"] == 'left' ) { if($catalogShowSorting == 'on') { echo "margin-left: 31%;"; } else echo "margin-left: 1%";} 
//        if(($paramssld["ht_view1_filtering_float"] == 'none' && ($paramssld["ht_view1_sorting_float"] == 'right')) || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%";}
    ?>
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul li {
    list-style-type: none;
    <?php
//        if($filtering_block_width == "100%") { echo "float:left !important;margin: 4px 8px 4px 0px !important;"; }
//        if($left_to_top == "ok") { echo "float:left !important;"; }
//        if($paramssld["ht_view1_filtering_float"] == "left" || $paramssld["ht_view1_filtering_float"] == "right")
//        { echo 'border-bottom: 1px solid #ccc;'; }
//        else echo "border: 1px solid #ccc;";
    ?>
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul li a {
    font-size:<?php echo $paramssld["ht_view1_filterbutton_font_size"];?>px !important;
    color:#<?php echo $paramssld["ht_view1_filterbutton_font_color"];?> !important;
    background-color: #<?php echo $paramssld["ht_view1_filterbutton_background_color"];?> !important;
    border-radius: <?php echo $paramssld["ht_view1_filterbutton_border_radius"];?>px;
    padding: 3px;
    display: block;
    text-decoration: none;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?>  ul li a:hover {
    color:#<?php echo $paramssld["ht_view1_filterbutton_hover_font_color"];?> !important;
    background-color: #<?php echo $paramssld["ht_view1_filterbutton_hover_background_color"];?> !important;
    cursor: pointer
}

#huge_it_catalog_content_<?php echo $catalogID; ?> section {
    position:relative;
    display:block;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_container_<?php echo $catalogID; ?> {
<?php // if($paramssld["ht_view1_sorting_float"] == "left" && $paramssld["ht_view1_filtering_float"] == "right" ||
//         $paramssld["ht_view1_sorting_float"] == "right" && $paramssld["ht_view1_filtering_float"] == "left")
//       { echo "margin: 0px auto;"; }
//       if((($paramssld["ht_view1_filtering_float"] == "left" || $paramssld["ht_view1_filtering_float"] == "right" && $paramssld["ht_view1_sorting_float"] == "top") || ($paramssld["ht_view1_sorting_float"] == "left" || $paramssld["ht_view1_sorting_float"] == "right" && $paramssld["ht_view1_filting_float"] == "top")) && $catalogShowFiltering == "on" && $catalogShowSorting == "on")
//       {
?>
    /*width: <?php echo $width_middle; ?> !important;*/
 <?php // } ?>
}
.zoomContainer {
    z-index: 10;
}

</style>
<section id="huge_it_catalog_content_<?php echo $catalogID; ?>">
    <?php if($catalogShowSorting == "on")
        { ?>
          <div id="huge_it_catalog_options_<?php echo $catalogID; ?>" class="">
            <ul id="sort-by" class="option-set clearfix" data-option-key="sortBy">
                <li><a href="#sortBy=original-order" data-option-value="original-order" class="selected" data><?php echo $paramssld["ht_view1_sorting_name_by_default"]; ?></a></li>
                <li><a href="#sortBy=id" data-option-value="id"><?php echo $paramssld["ht_view1_sorting_name_by_id"]; ?></a></li>
                <li><a href="#sortBy=symbol" data-option-value="symbol"><?php echo $paramssld["ht_view1_sorting_name_by_name"]; ?></a></li>
                <li id="shuffle"><a href='#shuffle'><?php echo $paramssld["ht_view1_sorting_name_by_random"]; ?></a></li>
            </ul>
              
            <ul id="sort-direction" class="option-set clearfix" data-option-key="sortAscending">
                <li><a href="#sortAscending=true" data-option-value="true" class="selected"><?php echo $paramssld["ht_view1_sorting_name_by_asc"]; ?></a></li>
                <li><a href="#sortAscending=false" data-option-value="false"><?php echo $paramssld["ht_view1_sorting_name_by_desc"]; ?></a></li>
            </ul>
          </div>
  <?php }
   if($catalogShowFiltering == "on")
      { ?>
         <div id="huge_it_catalog_filters_<?php echo $catalogID; ?>" >
            <ul>
                <li rel="*"><a>All</a></li>
                <?php
                $catalogCats = explode(",", $catalogCats);
                foreach ($catalogCats as $catalogCatsValue) {
                    if(!empty($catalogCatsValue))
                    {
                ?>
                <li rel=".<?php echo str_replace(" ","_",$catalogCatsValue); ?>"><a><?php echo str_replace("_"," ",$catalogCatsValue); ?></a></li>
                    <?php
                    }
                }
                ?>
            </ul>
        </div>
<?php } ?>
        <div id="huge_it_catalog_container_<?php echo $catalogID; ?>" class="super-list variable-sizes clearfix" <?php //if($paramssld["ht_view1_sorting_float"] == "top" && $paramssld["ht_view1_filtering_float"] == "top") echo "style='clear: both;'";?>>
              <?php
              $group_key = 0;
              foreach($images as $key=>$row)
              {
                      $group_key ++;
                      $link = $row->sl_url;
                      $descnohtml=strip_tags($row->description);
                      $result = substr($descnohtml, 0, 50);
//                      $catForFilter = explode(",", $row->category);
                      ?>
                      <div class="element_<?php echo $catalogID; ?>  <?php if($paramssld['ht_view1_allow_lightbox'] == "on"){ echo "catalog_colorbox_grouping_".$catalogID;} ?> " data-symbol="<?php echo $row->name; ?>" data-category="alkaline-earth">
                              <div class="default-block_<?php echo $catalogID; ?>">
                                      <div class="image-block_<?php echo $catalogID; ?> for_zoom">
                                              <?php $imgurl=explode(";",$row->image_url); ?>
                                              <?php 	if($row->image_url != ';'){ ?>
                                              <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo $imgurl[0]; ?>" />
                                              <?php } else { ?>
                                              <img id="wd-cl-img<?php echo $key; ?>" src="images/noimage.png" />
                                              <?php
                                              } ?>	
                                      </div>
                                      <div class="title-block_<?php echo $catalogID; ?>">
                                              <h3 class="title"><?php echo $row->name; ?></h3>
                                      </div>
                              </div>

                              <div class="wd-catalog-panel_<?php echo $catalogID; ?>" id="panel<?php echo $key; ?>">
                              <?php if($paramssld['ht_view1_show_thumbs']=='on' and $paramssld['ht_view1_thumbs_position']=="before")
                                      {?>
                                              <div>
                                                      <ul class="thumbs-list_<?php echo $catalogID; ?>">
                                                              <?php
                                                              $imgurl=explode(";",$row->image_url);
                                                              array_pop($imgurl);
                                                              foreach($imgurl as $key=>$img)
                                                              {
                                                              ?>
                                                              <li>
                                                                      <a href="<?php echo $img; ?>" class="catalog_group<?php echo $group_key; ?>"><img src="<?php echo $img; ?>"></a>
                                                              </li>
                                                              <?php
                                                              }
                                                              ?>
                                                      </ul>
                                              </div>
                                      <?php } 
                                      if($paramssld['ht_view1_show_description']=='on'){?>
                                              <div class="description-block_<?php echo $catalogID; ?>">
                                                      <p><?php echo $row->description; ?></p>
                                              </div>
                                      <?php }
                                      if($paramssld['ht_view1_show_thumbs']=='on' and $paramssld['ht_view1_thumbs_position']=="after"){?>
                                              <div>
                                                      <ul class="thumbs-list_<?php echo $catalogID; ?>">
                                                              <?php
                                                              $imgurl=explode(";",$row->image_url);
                                                              array_pop($imgurl);
                                                              foreach($imgurl as $key=>$img)
                                                              {
                                                              ?>
                                                              <li>
                                                                      <a href="<?php echo $img; ?>" class="group1"><img src="<?php echo $img; ?>"></a>
                                                              </li>
                                                              <?php
                                                              }
                                                              ?>
                                                      </ul>
                                              </div>
                                      <?php } ?>
                                      
                                      <?php if($paramssld["ht_catalog_view1_show_price"]=='on' && $row->price != ""){ ?>
                                                <div class="price-block_<?php echo $catalogID; ?>">
                                                    <span class="old-price-block" ><?php echo $paramssld['ht_view1_price_text']; ?> : <span class="old-price" <?php if($row->market_price == "") { echo "style='text-decoration: none !important;'"; } ?>><?php echo $row->price; ?></span></span>
                                                    <span class="discont-price-block" ><span class="discont-price" ><?php echo $row->market_price; ?></span></span>
                                                </div>
                                      <?php } ?>
                                      
                                      <?php
                                      if($paramssld['ht_view1_show_linkbutton']=='on'){
                                          $page_link = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                                          if (strpos(get_permalink(),'/?') !== false) { $product_page_link = get_permalink()."&single_prod_id=$row->id"; } else { $product_page_link = get_permalink()."/?single_prod_id=$row->id"; }
                                          ?>
                                              <div class="button-block">
                                                      <a href="<?php echo $product_page_link; ?>" <?php if ($row->link_target=="on"){echo 'target="_blank"';}?>><?php echo $paramssld['ht_view1_linkbutton_text']; ?></a>
                                              </div>
                                      <?php } ?>
                              </div>
                      </div>

                      <?php
              }
              ?>
        </div>
 </section>
<script>
    var allowZooming = '<?php echo $paramssld['ht_view1_allow_zooming'];?>';
    var allowLightbox = '<?php // echo $paramssld['ht_view1_allow_lightbox'];?>';
jQuery(function(){    
var defaultBlockWidth=<?php echo $paramssld['ht_view1_block_width']; ?>;
    
    var $container = jQuery('#huge_it_catalog_container_<?php echo $catalogID; ?>');
    
    
      // add randomish size classes
      $container.find('.element_<?php echo $catalogID; ?>').each(function(){
        var $this = jQuery(this),
            number = parseInt( $this.find('.number').text(), 10 );
			//alert(number);
        if ( number % 7 % 2 === 1 ) {
          $this.addClass('width2');
        }
        if ( number % 3 === 0 ) {
          $this.addClass('height2');
        }
      });
    
    $container.hugeitmicro({
      itemSelector : '.element_<?php echo $catalogID; ?>',
      masonry : {
        columnWidth : <?php echo $paramssld['ht_view1_block_width']; ?>+20+<?php echo $paramssld['ht_view1_element_border_width']*2; ?>
      },
      masonryHorizontal : {
        rowHeight: 300+20
      },
      cellsByRow : {
        columnWidth : 300+20,
        rowHeight : 240
      },
      cellsByColumn : {
        columnWidth : 300+20,
        rowHeight : 240
      },
      getSortData : {
        symbol : function( $elem ) {
          return $elem.attr('data-symbol');
        },
        category : function( $elem ) {
          return $elem.attr('data-category');
        },
        number : function( $elem ) {
          return parseInt( $elem.find('.number').text(), 10 );
        },
        weight : function( $elem ) {
          return parseFloat( $elem.find('.weight').text().replace( /[\(\)]/g, '') );
        },
        id : function ( $elem ) {
          return $elem.find('.id').text();
        }
      }
    });
    
    
      var $optionSets = jQuery('#huge_it_catalog_options_<?php echo $catalogID; ?> .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = jQuery(this);

        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  

        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');

        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {

          changeLayoutMode( $this, options )
        } else {

          $container.hugeitmicro( options );
        }
        
        return false;
      });


    

      var isHorizontal = false;
      function changeLayoutMode( $link, options ) {
        var wasHorizontal = isHorizontal;
        isHorizontal = $link.hasClass('horizontal');

        if ( wasHorizontal !== isHorizontal ) {

          var style = isHorizontal ? 
            { height: '75%', width: $container.width() } : 
            { width: 'auto' };

          $container.filter(':animated').stop();

          $container.addClass('no-transition').css( style );
          setTimeout(function(){
            $container.removeClass('no-transition').hugeitmicro( options );
          }, 100 )
        } else {
          $container.hugeitmicro( options );
        }
      }

    var $sortBy =  jQuery('#huge_it_catalog_content_<?php echo $catalogID; ?> #sort-by');
    jQuery('#huge_it_catalog_content_<?php echo $catalogID; ?> #shuffle a').click(function(){
      $container.hugeitmicro('shuffle');
      $sortBy.find('.selected').removeClass('selected');
      $sortBy.find('[data-option-value="random"]').addClass('selected');
      return false;
    });
    
    ////filteringgggggg

        // bind filter on select change
        jQuery(document).ready(function(){
            jQuery('#huge_it_catalog_filters_<?php echo $catalogID; ?> ul li').click(function() {
              // get filter value from option value
              var filterValue = jQuery(this).attr('rel');
              // use filterFn if matches value
              filterValue = filterValue;//filterFns[ filterValue ] || 
              $container.hugeitmicro({ filter: filterValue });
            });
            <?php // if(($paramssld["ht_view1_sorting_float"] == "left" || $paramssld["ht_view1_sorting_float"] == "right") && $paramssld["ht_view1_filtering_float"] == "none")
//                  { ?>
//                        var topmargin = jQuery("#huge_it_catalog_filters_<?php echo $catalogID; ?> ul").height();
//                        jQuery("#huge_it_catalog_options_<?php echo $catalogID; ?>").css({'margin-top':parseInt(topmargin) + 5});
            <?php // }
//            else  {
//                    if(($paramssld["ht_view1_filtering_float"] == "left" || $paramssld["ht_view1_filtering_float"] == "right") && $paramssld["ht_view1_sorting_float"] == "none")
//                      { ?>
//                         var topmargin = jQuery("#huge_it_catalog_options_<?php echo $catalogID; ?>").height();
//                         jQuery("#huge_it_catalog_filters_<?php echo $catalogID; ?>").css({'margin-top':'5px'});
                <?php // }
//                  } ?>
        });
        
        jQuery(window).load(function(){

            $container.hugeitmicro({ filter: '*' });
        });
  });
</script>	  
	  <?php
	  
        break;
/////////////////////////////// VIEW 2 Popup /////////////////////////////
		  case 2:
      
	
	  ?>
<?php
//    if($paramssld["ht_view2_sorting_float"] == "left" && $paramssld["ht_view2_filtering_float"] == "right" ||
//       $paramssld["ht_view2_sorting_float"] == "right" && $paramssld["ht_view2_filtering_float"] == "left" ||
//       $paramssld["ht_view2_sorting_float"] == $paramssld["ht_view2_filtering_float"])
//       { $sorting_block_width ="20%"; $filtering_block_width ="20%"; $middle_with = "56%"; }
//    else if($paramssld["ht_view2_sorting_float"] == "left" || $paramssld["ht_view2_sorting_float"] == "right" && $paramssld["ht_view2_filtering_float"] == "top")
//       { $sorting_block_width ="30%"; $filtering_block_width ="100%"; $paramssld["ht_view2_filtering_float"] = "none"; $width_middle = "65%"; }
//    else if($paramssld["ht_view2_filtering_float"] == "left" || $paramssld["ht_view2_filtering_float"] == "right" && $paramssld["ht_view2_sorting_float"] == "top")
//       { $sorting_block_width ="100%"; $filtering_block_width ="30%"; $paramssld["ht_view2_sorting_float"] = "none"; $width_middle = "65%"; }
//    if($paramssld["ht_view2_sorting_float"] == "top" && $paramssld["ht_view2_filtering_float"] == "top")
//       { $sorting_block_width ="100%"; $filtering_block_width ="100%"; $left_to_top = "ok"; }
?>

<script>
    var allowZooming = '<?php echo $paramssld['ht_view2_allow_zooming'];?>';
    
jQuery(function(){    
var defaultBlockWidth=<?php echo $paramssld['ht_view2_element_width']; ?>;
var defaultBlockHeight=<?php echo $paramssld['ht_view2_element_height']; ?>;
    
    var $container = jQuery('#huge_it_catalog_container_<?php echo $catalogID; ?>');
    
    
      // add randomish size classes
      $container.find('.element_<?php echo $catalogID; ?>').each(function(){
        var $this = jQuery(this),
            number = parseInt( $this.find('.number').text(), 10 );
			//alert(number);
        if ( number % 7 % 2 === 1 ) {
          $this.addClass('width2');
        }
        if ( number % 3 === 0 ) {
          $this.addClass('height2');
        }
      });
    
    $container.hugeitmicro({
      itemSelector : '.element_<?php echo $catalogID; ?>',
      masonry : {
        columnWidth : <?php echo $paramssld['ht_view2_element_width']; ?>+20+<?php echo $paramssld['ht_view2_element_border_width']*2; ?>
      },
      masonryHorizontal : {
        rowHeight: 300+20
      },
      cellsByRow : {
        columnWidth : 300+20,
        rowHeight : 240
      },
      cellsByColumn : {
        columnWidth : 300+20,
        rowHeight : 240
      },
      getSortData : {
        symbol : function( $elem ) {
          return $elem.attr('data-symbol');
        },
        category : function( $elem ) {
          return $elem.attr('data-category');
        },
        number : function( $elem ) {
          return parseInt( $elem.find('.number').text(), 10 );
        },
        weight : function( $elem ) {
          return parseFloat( $elem.find('.weight').text().replace( /[\(\)]/g, '') );
        },
        id : function ( $elem ) {
          return $elem.find('.id').text();
        }
      }
    });
    
    
      var $optionSets = jQuery('#huge_it_catalog_options_<?php echo $catalogID; ?> .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = jQuery(this);

        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  

        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');

        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {

          changeLayoutMode( $this, options )
        } else {

          $container.hugeitmicro( options );
        }
        
        return false;
      });


    

      var isHorizontal = false;
      function changeLayoutMode( $link, options ) {
        var wasHorizontal = isHorizontal;
        isHorizontal = $link.hasClass('horizontal');

        if ( wasHorizontal !== isHorizontal ) {

          var style = isHorizontal ? 
            { height: '75%', width: $container.width() } : 
            { width: 'auto' };

          $container.filter(':animated').stop();

          $container.addClass('no-transition').css( style );
          setTimeout(function(){
            $container.removeClass('no-transition').hugeitmicro( options );
          }, 100 )
        } else {
          $container.hugeitmicro( options );
        }
      }


    

      $container.delegate( '.default-block_<?php echo $catalogID; ?>', 'click', function(){
          var strheight=0;
          jQuery(this).parents('.element_<?php echo $catalogID; ?>').find('.wd-catalog-panel_<?php echo $catalogID; ?> > div').each(function(){
                strheight+=jQuery(this).outerHeight()+10;
                //alert(strheight);
          })
          strheight+=<?php echo $paramssld['ht_view0_block_height']+45; ?>;
	  			if(jQuery(this).parents('.element_<?php echo $catalogID; ?>').hasClass("large")){
			jQuery(this).parents('.element_<?php echo $catalogID; ?>').animate({
				height: "<?php echo $paramssld['ht_view0_block_height']+45; ?>px"
			}, 300, function() {
				jQuery(this).removeClass('large');
				$container.hugeitmicro('reLayout');
			});
			
			jQuery(this).parents('.element_<?php echo $catalogID; ?>').removeClass("active");
			return false;
		}
		
	
		jQuery(this).parents('.element_<?php echo $catalogID; ?>').css({height:strheight});
		jQuery(this).parents('.element_<?php echo $catalogID; ?>').addClass('large');

		$container.hugeitmicro('reLayout');
		jQuery(this).parents('.element_<?php echo $catalogID; ?>').css({height:"<?php echo $paramssld['ht_view0_block_height']+45; ?>px"});		 
		 
		//alert(strheight);
		 
		 jQuery(this).parents('.element_<?php echo $catalogID; ?>').animate({
			height:strheight+"px",
		  }, 300,function(){	$container.hugeitmicro('reLayout');});
	});

    var $sortBy =  jQuery('#huge_it_catalog_content_<?php echo $catalogID; ?> #sort-by');
    jQuery('#huge_it_catalog_content_<?php echo $catalogID; ?> #shuffle a').click(function(){
      $container.hugeitmicro('shuffle');
      $sortBy.find('.selected').removeClass('selected');
      $sortBy.find('[data-option-value="random"]').addClass('selected');
      return false;
    });
    
    jQuery(window).load(function(){
        $container.hugeitmicro({ filter: '*' });
    });
    
    ////filteringgggggg

        // bind filter on select change
        jQuery(document).ready(function(){
            jQuery('#huge_it_catalog_filters_<?php echo $catalogID; ?> ul li').click(function() {
              // get filter value from option value
              var filterValue = jQuery(this).attr('rel');
              // use filterFn if matches value
              filterValue = filterValue;//filterFns[ filterValue ] || 
              $container.hugeitmicro({ filter: filterValue });
            });
            <?php // if(($paramssld["ht_view2_sorting_float"] == "left" || $paramssld["ht_view2_sorting_float"] == "right") && $paramssld["ht_view2_filtering_float"] == "none")
//                  { ?>
//                        var topmargin = jQuery("#huge_it_catalog_filters_<?php echo $catalogID; ?> ul").height();
//                        jQuery("#huge_it_catalog_options_<?php echo $catalogID; ?>").css({'margin-top':parseInt(topmargin) + 5});
            <?php // }
//            else  {
//                    if(($paramssld["ht_view2_filtering_float"] == "left" || $paramssld["ht_view2_filtering_float"] == "right") && $paramssld["ht_view2_sorting_float"] == "none")
//                      { ?>
//                         var topmargin = jQuery("#huge_it_catalog_options_<?php echo $catalogID; ?>").height();
//                         jQuery("#huge_it_catalog_filters_<?php echo $catalogID; ?>").css({'margin-top':'5px'});
                <?php // }
//                  } ?>
        });

  });
  jQuery(document).ready(function(){

	jQuery('.element_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> .image-overlay a').on('click',function(){
		var strid = jQuery(this).attr('href').replace('#','');
		jQuery('body').append('<div id="huge-popup-overlay_<?php echo $catalogID; ?>"></div>');
		jQuery('#huge_it_catalog_popup_list_<?php echo $catalogID; ?>').insertBefore('#huge-popup-overlay_<?php echo $catalogID; ?>');
		var height = jQuery(window).height();
		var width=jQuery(window).width();
		if(width<=767){
			jQuery('body').scrollTop(0);
		}
		jQuery('#huge_it_catalog_pupup_element_'+strid).addClass('active').css({height:height*0.7});
		jQuery('#huge_it_catalog_popup_list_<?php echo $catalogID; ?>').addClass('active');
		
		jQuery('#huge_it_catalog_pupup_element_'+strid+' ul.thumbs-list_<?php echo $catalogID; ?> li:first-child').addClass('active');
		var strsrc=jQuery('#huge_it_catalog_pupup_element_'+strid+' ul.thumbs-list_<?php echo $catalogID; ?> li:first-child a img').attr('src');
		jQuery('#huge_it_catalog_pupup_element_'+strid+' .image-block_<?php echo $catalogID; ?> img').attr('src',strsrc);
		//alert(strsrc);
		return false;
	});
	
	jQuery('#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block ul.thumbs-list_<?php echo $catalogID; ?> li a').click(function(){
		var width=jQuery(window).width();
		if(width<=767){
			jQuery('body').scrollTop(0);
		}
		jQuery(this).parent().parent().find('li.active').removeClass('active');
		jQuery(this).parent().addClass('active');
		jQuery(this).parents('.right-block').prev().find('img').attr('src',jQuery(this).find('img').attr('src'));
		return false;
	});
	
	jQuery('#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .close').on('click',function(){
		closePopup();
		return false;
	});
	
	jQuery('body').on('click','#huge-popup-overlay_<?php echo $catalogID; ?>',function(){
		closePopup();
		return false;
	});
	
	function closePopup() {
		jQuery('#huge-popup-overlay_<?php echo $catalogID; ?>').remove();
		jQuery('#huge_it_catalog_popup_list_<?php echo $catalogID; ?> li').removeClass('active');
		jQuery('#huge_it_catalog_popup_list_<?php echo $catalogID; ?>').removeClass('active');
	}        
}); 
</script>

<style type="text/css">

.element_<?php echo $catalogID; ?> {
	width:<?php echo $paramssld['ht_view2_element_width']; ?>px;
	height:<?php echo $paramssld['ht_view2_element_height']+45; ?>px;
	margin:0px 0px 10px 0px;
	background:#<?php echo $paramssld['ht_view2_element_background_color']; ?>;
	border:<?php echo $paramssld['ht_view2_element_border_width']; ?>px solid #<?php echo $paramssld['ht_view2_element_border_color']; ?>;
	outline:none;
}

.element_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> {
	position:relative;
	width:100%;
}

.element_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> img {
	margin:0px !important;
	padding:0px !important;
	width:<?php echo $paramssld['ht_view2_element_width']; ?>px !important;
	height:<?php echo $paramssld['ht_view2_element_height']; ?>px !important;
	display:block;
	border-radius: 0px !important;
	box-shadow: 0 0px 0px rgba(0, 0, 0, 0) !important; 
}

.element_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> .image-overlay {
	position:absolute;
	top:0px;
	left:0px;
	width:100%;
	height:100%;
	background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($paramssld['ht_view2_element_overlay_color'],2));
				$titleopacity=$paramssld["ht_view2_element_overlay_transparency"]/100;						
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important'; 		
	?>;
	display:none;
}

.element_<?php echo $catalogID; ?>:hover .image-block_<?php echo $catalogID; ?>  .image-overlay {
	display:block;
}

.element_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> .image-overlay a {
	position:absolute;
	top:0px;
	left:0px;
	display:block;
	width:100%;
	height:100%;
	background:url('<?php echo  plugins_url( '../images/zoom.'.$paramssld["ht_view2_zoombutton_style"].'.png' , __FILE__ ); ?>') center center no-repeat;
}

.element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> {
	position:relative;
	height: 30px;
	margin: 0;
	padding: 15px 0px 15px 0px;
	-webkit-box-shadow: inset 0 1px 0 rgba(0,0,0,.1);
	box-shadow: inset 0 1px 0 rgba(0,0,0,.1);
}

.element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> h3 {
	position:relative;
	margin:0px !important;
	padding:0px 1% 0px 1% !important;
	width:98%;
	text-overflow: ellipsis;
	overflow: hidden; 
	white-space:nowrap;
	font-weight:normal;
	font-size: <?php echo $paramssld["ht_view2_popup_title_font_size"];?>px !important;
	line-height: <?php echo $paramssld["ht_view2_popup_title_font_size"]+4;?>px !important;
	color:#<?php echo $paramssld["ht_view2_popup_title_font_color"];?>;
}

.element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> .button-block {
	position:absolute;
	right:0px;
	top:0px;
	display:none;
	vertical-align:middle;
	height:30px;
	padding:10px 10px 4px 10px;
	background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($paramssld['ht_view2_element_overlay_color'],2));
				$titleopacity=$paramssld["ht_view2_element_overlay_transparency"]/100;						
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important'; 		
	?>;
	border-left: 1px solid rgba(0,0,0,.05);
}
.element_<?php echo $catalogID; ?>:hover .title-block_<?php echo $catalogID; ?> .button-block {display:block;}

.element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> a,.element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> a:link,.element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> a:visited,
.element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> a:hover,.element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> a:focus,.element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> a:active {
	position:relative;
	display:block;
	vertical-align:middle;
	padding: 3px 10px 3px 10px; 
	border-radius:3px;
	font-size:<?php echo $paramssld["ht_view2_element_linkbutton_font_size"];?>px;
	background:#<?php echo $paramssld["ht_view2_element_linkbutton_background_color"];?>;
	color:#<?php echo $paramssld["ht_view2_element_linkbutton_color"];?>;
	text-decoration:none;
}

/*#####POPUP#####*/

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> {
	position:fixed;
	display:table;
	width:80%;
	top:7%;
	left:7%;
	margin:0px !important;
	list-style:none;
	z-index:2000;
	display:none;
	height:90%;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?>.active {display:table;}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> li.pupup-element {
	position:relative;
	display:none;
	width:100%;
	padding:40px 0px 20px 0px;
	min-height:100%;
	position:relative;
	background:#<?php echo $paramssld["ht_view2_popup_background_color"];?>;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> li.pupup-element.active {
	display:block;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> {
	position:absolute;
	width:100%;
	height:40px;
	top:0px;
	left:0px;
	z-index:2001;
	background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center bottom repeat-x;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .close,#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .close:link, #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .close:visited {
	position:relative;
	float:right;
	width:40px;
	height:40px;
	display:block;
	background:url('<?php echo  plugins_url( '../images/close.popup.'.$paramssld["ht_view2_popup_closebutton_style"].'.png' , __FILE__ ); ?>') center center no-repeat;
	border-left:1px solid #ccc;
	opacity:.65;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .close:hover, #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .close:focus, #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .close:active {opacity:1;}


#huge_it_catalog_popup_list_<?php echo $catalogID; ?> li.pupup-element .popup-wrapper_<?php echo $catalogID; ?> {
	overflow-y:scroll;
	position:relative;
	width:96%;
	height:98%;
	padding:2% 2% 0% 2%;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> {
	width:60%;
        <?php if($paramssld['ht_view2_popup_full_width'] == 'off') { echo "height:100%;"; } ?>
	position:relative;
	float:left;
	margin-right:2%;
	border-right:1px solid #ccc;
	min-width:200px;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> img {
        <?php
            if($paramssld['ht_view2_popup_full_width'] == 'off') { echo "max-width:100% !important; max-height:100% !important; margin: 0px auto !important; position:relative;"; }
            else { echo "width:100% !important;"; }
        ?>
	display:block;
	padding:0px !important;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block {
	width:37%;
	position:relative;
	float:left;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> li.pupup-element .popup-wrapper_<?php echo $catalogID; ?> .right-block > div {
	padding-top:10px;
	margin-bottom:10px;
	<?php if($paramssld['ht_view2_show_separator_lines']=="on") {?>
		background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center top repeat-x;
	<?php } ?>
}
#huge_it_catalog_popup_list_<?php echo $catalogID; ?> li.pupup-element .popup-wrapper_<?php echo $catalogID; ?> .right-block > div:last-child {background:none;}


#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .title {
	position:relative;
	display:block;
	margin:0px 0px 10px 0px !important;
	font-size:<?php echo $paramssld["ht_view2_popup_title_font_size"];?>px !important;
	line-height:<?php echo $paramssld["ht_view2_popup_title_font_size"]+4;?>px !important;
	color:#<?php echo $paramssld["ht_view2_popup_title_font_color"];?>;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description {
	clear:both;
	position:relative;
	font-weight:normal;
	text-align:justify;
	font-size:<?php echo $paramssld["ht_view2_description_font_size"];?>px !important;
	color:#<?php echo $paramssld["ht_view2_description_color"];?>;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description h1,
#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description h2,
#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description h3,
#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description h4,
#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description h5,
#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description h6,
#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description p, 
#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description strong,
#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description span {
	padding:2px !important;
	margin:0px !important;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description ul,
#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description li {
	padding:2px 0px 2px 5px;
	margin:0px 0px 0px 8px;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .price-block_<?php echo $catalogID; ?> {
    padding: 20px 0px 7px 0px !important;
    font-size: <?php echo $paramssld['ht_catalog_view2_price_font_size']; ?>px;
    color: #<?php echo $paramssld['ht_catalog_view2_price_font_color']; ?>;
}
    
#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .old-price {
	text-decoration: line-through;
        margin: 0px;
        padding: 0px;
        font-weight: normal;
/*        font-size: 14px;*/
        padding: 7px 10px 7px 10px;
        margin: 0px 10px 0px 0px;
        border-radius: 5px;
        color: #<?php echo $paramssld['ht_view2_popup_background_color']; ?>;
        background: #<?php echo $paramssld['ht_catalog_view2_price_font_color']; ?>;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .old-price-block {
	font-size: <?php echo $paramssld['ht_catalog_view2_price_font_size']; ?>px;
        color: #<?php echo $paramssld['ht_catalog_view2_price_font_color']; ?>;
        
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .discont-price-block {
/*	font-size: <?php echo $paramssld['ht_catalog_view2_market_price_font_size']; ?>px;
        color: #<?php echo $paramssld['ht_catalog_view2_market_price_font_color']; ?>; */
}


#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block ul.thumbs-list_<?php echo $catalogID; ?> {
	list-style:none;
	display:table;
	position:relative;
	clear:both;
	width:100%;
	margin:0px auto;
	padding:0px;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block ul.thumbs-list_<?php echo $catalogID; ?> li {
	display:block;
	float:left;
	width:<?php echo $paramssld["ht_view2_thumbs_width"];?>px;
	height:<?php echo $paramssld["ht_view2_thumbs_height"];?>px;
	margin:0px 2% 5px 1% !important;
	opacity:0.45;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block ul.thumbs-list_<?php echo $catalogID; ?> li.active,#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block ul.thumbs-list_<?php echo $catalogID; ?> li:hover {
	opacity:1;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block ul.thumbs-list_<?php echo $catalogID; ?> li a {
	display:block;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block ul.thumbs-list_<?php echo $catalogID; ?> li img {
	margin:0px !important;
	padding:0px !important;
	width:<?php echo $paramssld["ht_view2_thumbs_width"];?>px !important;
	height:<?php echo $paramssld["ht_view2_thumbs_height"];?>px !important;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .price-block_<?php echo $catalogID; ?> p {
        font-size: <?php echo $paramssld['ht_catalog_view2_price_font_size']; ?>px;
        color: #<?php echo $paramssld['ht_catalog_view2_price_font_color']; ?>;
}

#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .market-price-block_<?php echo $catalogID; ?> p {
        font-size: <?php echo $paramssld['ht_catalog_view2_market_price_font_size']; ?>px;
        color: #<?php echo $paramssld['ht_catalog_view2_market_price_font_color']; ?>;
}

.pupup-element .button-block {
	position:relative;
}

.pupup-element .button-block a,.pupup-element .button-block a:link,.pupup-element .button-block a:visited{
	position:relative;
	display:inline-block;
	padding:6px 12px;
	background:#<?php echo $paramssld["ht_view2_popup_linkbutton_background_color"];?>;
	color:#<?php echo $paramssld["ht_view2_popup_linkbutton_color"];?>;
	font-size:<?php echo $paramssld["ht_view2_popup_linkbutton_font_size"];?>;
	text-decoration:none;
}

.pupup-element .button-block a:hover,.pupup-element .button-block a:focus,.pupup-element .button-block a:active {
	background:#<?php echo $paramssld["ht_view2_popup_linkbutton_background_hover_color"];?>;
	color:#<?php echo $paramssld["ht_view2_popup_linkbutton_font_hover_color"];?>;
}


#huge-popup-overlay_<?php echo $catalogID; ?> {
	position:fixed;
	top:0px;
	left:0px;
	width:100%;
	height:100%;
	z-index:199;
	background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($paramssld['ht_view2_popup_overlay_color'],2));
				$titleopacity=$paramssld["ht_view2_popup_overlay_transparency_color"]/100;						
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important'; 		
	?>
}


@media only screen and (max-width: 767px) {
	
	#huge_it_catalog_popup_list_<?php echo $catalogID; ?> {
		position:absolute;
		left:0px;
		top:0px;
		width:100%;
		height:auto !important;
		left:0px;
	}
	
	#huge_it_catalog_popup_list_<?php echo $catalogID; ?> li.pupup-element {
		margin:0px;
		height:auto !important;
		position:absolute;
		left:0px;
		top:0px;
	}

	#huge_it_catalog_popup_list_<?php echo $catalogID; ?> li.pupup-element .popup-wrapper_<?php echo $catalogID; ?> {
		height:auto !important;
		overflow-y:auto;
	}


	#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> {
		width:100%;
		float:none;
		clear:both;
		margin-right:0px;
		border-right:0px;
	}

	#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block {
		width:100%;
		float:none;
		clear:both;
		margin-right:0px;
		border-right:0px;
	}

	#huge-popup-overlay_<?php echo $catalogID; ?> {
		position:fixed;
		top:0px;
		left:0px;
		width:100%;
		height:100%;
		z-index:199;
	}

}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> {
    <?php if ($paramssld["ht_view2_show_sorting"] == 'off')
    echo "display:none;";
    if($paramssld["ht_view2_filtering_float"] == 'left' && $paramssld["ht_view2_sorting_float"] == 'none') { if($catalogShowFiltering == "on") { echo "margin-left: 30%;"; } else { echo "margin-left: 0%;"; } }
    //else if($paramssld["ht_view2_filtering_float"] == 'right' && $paramssld["ht_view2_sorting_float"] == 'none' || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%;"; } ?>
    overflow: hidden;
    /*margin-top: 5px;*/
    float: <?php echo $paramssld["ht_view2_sorting_float"]; ?>;
    width: <?php echo $sorting_block_width; ?>;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul {
  margin: 0px !important;
  padding: 0px !important;
  list-style: none;
<?php if($paramssld["ht_view2_sorting_float"] == 'top') {
      echo "float:left;margin-left:1%;";
      } ?>
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul {
  margin: 0px !important;
  padding: 0px !important;
  overflow: hidden;
  <?php if($paramssld["ht_view2_filtering_float"] == 'top') {
      echo "float:left;margin-left:1%;";
      } ?>
}

<?php if($paramssld["ht_view2_sorting_float"] == 'none') { ?>
            #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul {
                float: left;
            }
    <?php } ?>
            
            
#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li {
    border-radius: <?php echo $paramssld["ht_view2_sortbutton_border_radius"];?>px;
    list-style-type: none;
    margin: 0px !important;
    <?php
        if($sorting_block_width == "100%" ) {
            echo "float:left !important;margin: 4px 8px 4px 0px !important;";
        }
        if($left_to_top == "ok")
        { echo "float:left !important;"; }
        if($paramssld["ht_view2_sorting_float"] == "left" || $paramssld["ht_view2_sorting_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else
        { echo 'border: 1px solid #ccc;'; }
    ?>
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li a {
    background-color: #<?php echo $paramssld["ht_view2_sortbutton_background_color"];?> !important;
    font-size:<?php echo $paramssld["ht_view2_sortbutton_font_size"];?>px !important;
    color:#<?php echo $paramssld["ht_view2_sortbutton_font_color"];?> !important;
    text-decoration: none;
    cursor: pointer;
    margin: 0px !important;
    display: block;
    padding:3px;
}

/*#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li:hover {
    
}*/

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li a:hover {
    background-color: #<?php echo $paramssld["ht_view2_sortbutton_hover_background_color"];?> !important;
    color:#<?php echo $paramssld["ht_view2_sortbutton_hover_font_color"];?> !important;
    cursor: pointer;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> {
    /*margin-top: 5px;*/
    float: <?php echo $paramssld["ht_view2_filtering_float"]; ?>;
    width: <?php echo $filtering_block_width; ?>;
    <?php
        if ($paramssld["ht_view2_show_filtering"] == 'off') echo "display:none;";
        if($paramssld["ht_view2_filtering_float"] == 'top' && ($paramssld["ht_view2_sorting_float"] == 'left') ) { if($catalogShowSorting == 'on') { echo "margin-left: 31%;"; } else echo "margin-left: 1%"; } 
        //if(($paramssld["ht_view2_filtering_float"] == 'none' && ($paramssld["ht_view2_sorting_float"] == 'right')) || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%";}
    ?>
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul li {
    list-style-type: none;
    <?php
        if($filtering_block_width == "100%") { echo "float:left !important;margin: 4px 8px 4px 0px !important;"; }
        if($left_to_top == "ok") { echo "float:left !important;"; }
        if($paramssld["ht_view2_filtering_float"] == "left" || $paramssld["ht_view2_filtering_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else echo "border: 1px solid #ccc;";
    ?>
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul li a {
    font-size:<?php echo $paramssld["ht_view2_filterbutton_font_size"];?>px !important;
    color:#<?php echo $paramssld["ht_view2_filterbutton_font_color"];?> !important;
    background-color: #<?php echo $paramssld["ht_view2_filterbutton_background_color"];?> !important;
    border-radius: <?php echo $paramssld["ht_view2_filterbutton_border_radius"];?>px;
    padding: 3px;
    display: block;
    text-decoration: none;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?>  ul li a:hover {
    color:#<?php echo $paramssld["ht_view2_filterbutton_hover_font_color"];?> !important;
    background-color: #<?php echo $paramssld["ht_view2_filterbutton_hover_background_color"];?> !important;
    cursor: pointer
}

#huge_it_catalog_content_<?php echo $catalogID; ?> section {
    position:relative;
    display:block;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_container_<?php echo $catalogID; ?> {
<?php if($paramssld["ht_view2_sorting_float"] == "left" && $paramssld["ht_view2_filtering_float"] == "right" ||
         $paramssld["ht_view2_sorting_float"] == "right" && $paramssld["ht_view2_filtering_float"] == "left")
       { echo "margin: 0px auto;"; }
       if((($paramssld["ht_view2_filtering_float"] == "left" || $paramssld["ht_view2_filtering_float"] == "right" && $paramssld["ht_view2_sorting_float"] == "top") || ($paramssld["ht_view2_sorting_float"] == "left" || $paramssld["ht_view2_sorting_float"] == "right" && $paramssld["ht_view2_filting_float"] == "top")) && $catalogShowFiltering == "on" && $catalogShowSorting == "on")
       {
?>
        width: <?php echo $width_middle; ?> !important;
 <?php } ?>
}

.zoomContainer {
    z-index: 10;
}

</style>
    
<section id="huge_it_catalog_content_<?php echo $catalogID; ?>">
    <?php if($catalogShowSorting == "on")
        { ?>
          <div id="huge_it_catalog_options_<?php echo $catalogID; ?>" class="">
            <ul id="sort-by" class="option-set clearfix" data-option-key="sortBy">
                <li><a href="#sortBy=original-order" data-option-value="original-order" class="selected" data><?php echo $paramssld["ht_view2_sorting_name_by_default"]; ?></a></li>
                <li><a href="#sortBy=id" data-option-value="id"><?php echo $paramssld["ht_view2_sorting_name_by_id"]; ?></a></li>
                <li><a href="#sortBy=symbol" data-option-value="symbol"><?php echo $paramssld["ht_view2_sorting_name_by_name"]; ?></a></li>
                <li id="shuffle"><a href='#shuffle'><?php echo $paramssld["ht_view2_sorting_name_by_random"]; ?></a></li>
            </ul>
              
            <ul id="sort-direction" class="option-set clearfix" data-option-key="sortAscending">
                <li><a href="#sortAscending=true" data-option-value="true" class="selected"><?php echo $paramssld["ht_view2_sorting_name_by_asc"]; ?></a></li>
                <li><a href="#sortAscending=false" data-option-value="false"><?php echo $paramssld["ht_view2_sorting_name_by_desc"]; ?></a></li>
            </ul>
          </div>
  <?php }
   if($catalogShowFiltering == "on")
      { ?>
         <div id="huge_it_catalog_filters_<?php echo $catalogID; ?>">
            <ul>
                <li rel="*"><a>All</a></li>
                <?php
                $catalogCats = explode(",", $catalogCats);
                foreach ($catalogCats as $catalogCatsValue) {
                    if(!empty($catalogCatsValue))
                    {
                ?>
                <li rel=".<?php echo str_replace(" ","_",$catalogCatsValue); ?>"><a><?php echo str_replace("_"," ",$catalogCatsValue); ?></a></li>
                    <?php
                    }
                }
                ?>
            </ul>
        </div>
<?php } ?>
    <div id="huge_it_catalog_container_<?php echo $catalogID; ?>" class="super-list variable-sizes clearfix" <?php //if($paramssld["ht_view2_sorting_float"] == "top" && $paramssld["ht_view2_filtering_float"] == "top") echo "style='clear: both;'";?> style="margin-top: 5px;">
              <?php

              foreach($images as $key=>$row)
              {
                      $link = $row->sl_url;
                      $descnohtml=strip_tags($row->description);
                      $result = substr($descnohtml, 0, 50);
//                      $catForFilter = explode(",", $row->category);
                      ?>
                      <div class="element_<?php echo $catalogID; ?> <?php if($paramssld['ht_view2_allow_lightbox'] == "on"){ echo "catalog_colorbox_grouping_".$catalogID;} ?> " tabindex="0" data-symbol="<?php echo $row->name; ?>" data-category="alkaline-earth">
                              <div class="image-block_<?php echo $catalogID; ?>">
                                      <?php $imgurl=explode(";",$row->image_url); ?>
                                              <?php 	if($row->image_url != ';'){ ?>
                                              <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo $imgurl[0]; ?>" alt="" />
                                              <?php } else { ?>
                                              <img id="wd-cl-img<?php echo $key; ?>" src="images/noimage.png" alt="" />
                                              <?php
                                              } ?>	
                                      <div class="image-overlay"><a href="#<?php echo $row->id; ?>"></a></div>
                              </div>
                              <div class="title-block_<?php echo $catalogID; ?>">
                                      <h3><?php echo $row->name; ?></h3>
                                      <?php if($paramssld["ht_view2_element_show_linkbutton"]=='on'){
                                          $page_link = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                                          if (strpos(get_permalink(),'/?') !== false) { $product_page_link = get_permalink()."&single_prod_id=$row->id"; } else { $product_page_link = get_permalink()."/?single_prod_id=$row->id"; }
                                          ?>
                                              <div class="button-block"><a href="<?php echo $product_page_link; ?>" <?php if ($row->link_target=="on"){echo 'target="_blank"';}?> ><?php echo $paramssld["ht_view2_element_linkbutton_text"]; ?></a></div>
                                      <?php } ?>
                              </div>
                      </div>	
                      <?php
              }?>
              <div style="clear:both;"></div>
        </div>
</section>
<ul id="huge_it_catalog_popup_list_<?php echo $catalogID; ?>">
	<?php
	foreach($images as $key=>$row)
	{
		$imgurl=explode(";",$row->image_url);array_pop($imgurl);
		$link = $row->sl_url;
		$descnohtml=strip_tags($row->description);
		$result = substr($descnohtml, 0, 50);
		?>
		<li class="pupup-element" id="huge_it_catalog_pupup_element_<?php echo $row->id; ?>">
			<div class="heading-navigation_<?php echo $catalogID; ?>">
				<a href="#close" class="close"></a>
				<div style="clear:both;"></div>
			</div>
			<div class="popup-wrapper_<?php echo $catalogID; ?>">
				<div class="image-block_<?php echo $catalogID; ?>">
					<?php 	if($row->image_url != ';'){ ?>
					<img id="wd-cl-img<?php echo $key; ?>" src="<?php echo $imgurl[0]; ?>" alt="" />
					<?php } else { ?>
					<img id="wd-cl-img<?php echo $key; ?>" src="images/noimage.png" alt="" />
					<?php
					} ?>					
				</div>
				<div class="right-block">
					<?php if($paramssld["ht_view2_show_popup_title"]=='on'){?><h3 class="title"><?php echo $row->name; ?></h3><?php } ?>
					
					<?php if($paramssld["ht_view2_thumbs_position"]=='before' and $paramssld["ht_view2_show_thumbs"] == 'on'){?>
					<div><ul class="thumbs-list_<?php echo $catalogID; ?>">
						<?php   
								foreach($imgurl as $key=>$img){?>
									<li><a href="<?php echo $row->sl_url; ?>" class=""><img src="<?php echo $img; ?>"></a></li>
								<?php } ?>
					</ul></div>
					<?php } ?>
					
					<?php if($paramssld["ht_view2_show_description"]=='on'){?><div class="description"><?php echo $row->description; ?></div><?php } ?>
					
					<?php if($paramssld["ht_view2_thumbs_position"]=='after' and $paramssld["ht_view2_show_thumbs"] == 'on'){?>
					<div><ul class="thumbs-list_<?php echo $catalogID; ?>">
						<?php   $imgurl=explode(";",$row->image_url);array_pop($imgurl);
								foreach($imgurl as $key=>$img){?>
									<li><a href="#" class="group1"><img src="<?php echo $img; ?>"></a></li>
								<?php } ?>
					</ul></div>
					<?php } ?>
                                        
                                         <?php if($paramssld["ht_catalog_view2_show_price"]=='on' && $row->price != ""){ ?>
                                                   <div class="price-block_<?php echo $catalogID; ?>">
                                                       <span class="old-price-block" ><?php echo $paramssld['ht_view2_price_text']; ?> : <span class="old-price" <?php if($row->market_price == "") { echo "style='text-decoration: none !important;'"; } ?>><?php echo $row->price; ?></span></span>
                                                       <span class="discont-price-block" ><span class="discont-price" ><?php echo $row->market_price; ?></span></span>
                                                   </div>
                                         <?php } ?>
                                        
                                       <?php if($paramssld["ht_view2_show_popup_linkbutton"]=='on'){
                                           $page_link = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                                               if (strpos(get_permalink(),'/?') !== false) { $product_page_link = get_permalink()."&single_prod_id=$row->id"; } else { $product_page_link = get_permalink()."/?single_prod_id=$row->id"; }
                                       ?>
						<div class="button-block">
						<a href="<?php echo $product_page_link; ?>"  <?php if ($row->link_target=="on"){echo 'target="_blank"';}?>><?php echo $paramssld["ht_view2_element_linkbutton_text"]; ?></a>
						</div>
					<?php } ?>
					<div style="clear:both;"></div>
				</div>
				<div style="clear:both;"></div>
			</div>
		</li>
		<?php
	}?>
</ul>
	  
  <?php	  
	break;
	////////////////////////////// VIEW 3 FullWidth ////////////////////////////////////////////// 
	case 3:
  ?>

<?php
//    if($paramssld["ht_view3_sorting_float"] == "left" && $paramssld["ht_view3_filtering_float"] == "right" ||
//       $paramssld["ht_view3_sorting_float"] == "right" && $paramssld["ht_view3_filtering_float"] == "left" ||
//       $paramssld["ht_view3_sorting_float"] == $paramssld["ht_view3_filtering_float"])
//       { $sorting_block_width ="20%"; $filtering_block_width ="20%"; $middle_with = "56%"; }
//    else if($paramssld["ht_view3_sorting_float"] == "left" || $paramssld["ht_view3_sorting_float"] == "right" && $paramssld["ht_view3_filtering_float"] == "top")
//       { $sorting_block_width ="30%"; $filtering_block_width ="100%"; $paramssld["ht_view3_filtering_float"] = "none"; $width_middle = "65%"; }
//    else if($paramssld["ht_view3_filtering_float"] == "left" || $paramssld["ht_view3_filtering_float"] == "right" && $paramssld["ht_view3_sorting_float"] == "top")
//       { $sorting_block_width ="100%"; $filtering_block_width ="30%"; $paramssld["ht_view3_sorting_float"] = "none"; $width_middle = "65%"; }
//    if($paramssld["ht_view3_sorting_float"] == "top" && $paramssld["ht_view3_filtering_float"] == "top")
//       { $sorting_block_width ="100%"; $filtering_block_width ="100%"; $left_to_top = "ok"; }
?>

<style type="text/css">
<?php if($paramssld["ht_catalog_zoom_lens_size_fix"] == "true") { ?>

.zoomLens {
    width: <?php echo $paramssld["ht_catalog_zoom_lens_width"]; ?>px !important;
    height: <?php echo $paramssld["ht_catalog_zoom_lens_height"]; ?>px !important;
}
<?php } ?>

.element_<?php echo $catalogID; ?> {
	position: relative;
	width:93%; 
	margin:5px 0px 5px 0px;
	padding:2%;
	clear:both;
	overflow: hidden;
	border:<?php echo $paramssld['ht_view3_element_border_width']; ?>px solid #<?php echo $paramssld['ht_view3_element_border_color']; ?>;
	background:#<?php echo $paramssld['ht_view3_element_background_color']; ?>;
}

.element_<?php echo $catalogID; ?> > div {
	display:table-cell;
}

.element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> {
	padding-right:10px;
}

.element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .main-image-block_<?php echo $catalogID; ?> {
	clear:both;
	width:<?php echo $paramssld['ht_view3_mainimage_width']; ?>px; 
}

.element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .main-image-block_<?php echo $catalogID; ?> img {
	margin:0px !important;
	padding:0px !important;
	width:<?php echo $paramssld['ht_view3_mainimage_width']; ?>px !important; 
	height:auto;
}

.element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .thumbs-block {
	position:relative;
	margin-top:10px;
}

.element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .thumbs-block ul {
	width:<?php echo $paramssld['ht_view3_mainimage_width']; ?>px; 
	height:auto;
	display:table;
	margin:0px;
	padding:0px;
	list-style:none;
}

.element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .thumbs-block ul li {
	margin:0px 3px 0px 2px;
	padding:0px;
	width:<?php echo $paramssld['ht_view3_thumbs_width']; ?>px; 
	height:<?php echo $paramssld['ht_view3_thumbs_height']; ?>px; 
	float:left;
}

.element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .thumbs-block ul li a {
	display:block;
	width:<?php echo $paramssld['ht_view3_thumbs_width']; ?>px; 
	height:<?php echo $paramssld['ht_view3_thumbs_height']; ?>px; 
}

.element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .thumbs-block ul li a img {
	margin:0px !important;
	padding:0px !important;
	width:<?php echo $paramssld['ht_view3_thumbs_width']; ?>px; 
	height:<?php echo $paramssld['ht_view3_thumbs_height']; ?>px; 
}

.element_<?php echo $catalogID; ?> div.right-block {
	vertical-align:top;
}

.element_<?php echo $catalogID; ?> div.right-block > div {
	width:100%;
	padding-bottom:10px;
	margin-top:10px;
	<?php if($paramssld['ht_view3_show_separator_lines']=="on") {?>
		background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center bottom repeat-x;
	<?php } ?>	
}

.element_<?php echo $catalogID; ?> div.right-block > div:last-child {
	background:none;
}

.element_<?php echo $catalogID; ?> div.right-block .title-block_<?php echo $catalogID; ?>  {
	margin-top:3px;
}

.element_<?php echo $catalogID; ?> div.right-block .title-block_<?php echo $catalogID; ?> h3 {
	margin:0px;
	padding:0px;
	font-weight:normal;
	font-size:<?php echo $paramssld['ht_view3_title_font_size']; ?>px !important;
	line-height:<?php echo $paramssld['ht_view3_title_font_size']+4; ?>px !important;
	color:#<?php echo $paramssld['ht_view3_title_font_color']; ?>;
}

.element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> p,.element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> * {
	margin:0px;
	padding:0px;
	font-weight:normal;
	font-size:<?php echo $paramssld['ht_view3_description_font_size']; ?>px;
	color:#<?php echo $paramssld['ht_view3_description_color']; ?>;
}


.element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> h1,
.element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> h2,
.element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> h3,
.element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> h4,
.element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> h5,
.element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> h6,
.element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> p, 
.element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> strong,
.element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> span {
	padding:2px !important;
	margin:0px !important;
}

.element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> ul,
.element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> li {
	padding:2px 0px 2px 5px;
	margin:0px 0px 0px 8px;
}

.element_<?php echo $catalogID; ?> div.right-block .price-block_<?php echo $catalogID; ?> {
    color: #<?php echo $paramssld['ht_catalog_view3_price_font_color']; ?>;
}

.element_<?php echo $catalogID; ?> div.right-block .old-price {
	text-decoration: line-through;
        margin: 0px;
        padding: 0px;
        font-weight: normal;
        font-size: <?php echo $paramssld['ht_catalog_view3_price_font_size']; ?>px;
        padding: 7px 10px 7px 10px;
        margin: 0px 10px 0px 0px;
        border-radius: 5px;
        color: #<?php echo $paramssld['ht_view3_element_background_color']; ?>;
        background: #<?php echo $paramssld['ht_catalog_view3_price_font_color']; ?>;
}

.element_<?php echo $catalogID; ?> div.right-block .old-price-block {

}

.element_<?php echo $catalogID; ?> div.right-block .discont-price-block {

}

.element_<?php echo $catalogID; ?> .button-block {
	position:relative;
}

.element_<?php echo $catalogID; ?> div.right-block .button-block a,.element_<?php echo $catalogID; ?> div.right-block .button-block a:link,.element_<?php echo $catalogID; ?> div.right-block .button-block a:visited {
	position:relative;
	display:inline-block;
	padding:6px 12px;
	background:#<?php echo $paramssld["ht_view3_linkbutton_background_color"];?>;
	color:#<?php echo $paramssld["ht_view3_linkbutton_color"];?>;
	font-size:<?php echo $paramssld["ht_view3_linkbutton_font_size"];?>;
	text-decoration:none;
}

.element_<?php echo $catalogID; ?> div.right-block .button-block a:hover,.pupup-elemen.element div.right-block .button-block a:focus,.element_<?php echo $catalogID; ?> div.right-block .button-block a:active {
	background:#<?php echo $paramssld["ht_view3_linkbutton_background_hover_color"];?>;
	color:#<?php echo $paramssld["ht_view3_linkbutton_font_hover_color"];?>;
}



@media only screen and (max-width: 767px) {
	
	.element_<?php echo $catalogID; ?> > div {
		display:block;
		width:100%;
		clear:both;
	}

	.element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> {
		padding-right:0px;
	}

	.element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .main-image-block_<?php echo $catalogID; ?> {
		clear:both;
		width:100%; 
	}

	.element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .main-image-block_<?php echo $catalogID; ?> img {
		margin:0px !important;
		padding:0px !important;
		width:100% !important;  
		height:auto;
	}

	.element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .thumbs-block ul {
		width:100%; 
	}
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> {
    <?php if ($paramssld["ht_view3_show_sorting"] == 'off')
    echo "display:none;";
    if($paramssld["ht_view3_filtering_float"] == 'left' && $paramssld["ht_view3_sorting_float"] == 'none') { if($catalogShowFiltering == "on") { echo "margin-left: 30%;"; } else echo "margin-left: 0%;"; }
//    else if($paramssld["ht_view3_filtering_float"] == 'right' && $paramssld["ht_view3_sorting_float"] == 'none' || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%;"; } ?>
    overflow: hidden;
    margin-top: 5px;
    float: <?php echo $paramssld["ht_view3_sorting_float"]; ?>;
    width: <?php echo $sorting_block_width; ?>;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul {
  margin: 0px !important;
  padding: 0px !important;
  list-style: none;
<?php if($paramssld["ht_view3_sorting_float"] == 'top') {
      echo "float:left;margin-left:1%;";
      } ?>
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul {
  margin: 0px !important;
  padding: 0px !important;
  overflow: hidden;
  <?php if($paramssld["ht_view3_filtering_float"] == 'top') {
      echo "float:left;margin-left:1%;";
      } ?>
}

<?php if($paramssld["ht_view3_sorting_float"] == 'none') { ?>
            #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul {
                float: left;
            }
    <?php } ?>

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li {
    border-radius: <?php echo $paramssld["ht_view3_sortbutton_border_radius"];?>px;
    list-style-type: none;
    margin: 0px !important;
    <?php
        if($sorting_block_width == "100%" ) {
            echo "float:left !important;margin: 4px 8px 4px 0px !important;";
        }
        if($left_to_top == "ok")
        { echo "float:left !important;"; }
        if($paramssld["ht_view3_sorting_float"] == "left" || $paramssld["ht_view3_sorting_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else
        { echo 'border: 1px solid #ccc;'; }
    ?>
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li a {
    background-color: #<?php echo $paramssld["ht_view3_sortbutton_background_color"];?> !important;
    font-size:<?php echo $paramssld["ht_view3_sortbutton_font_size"];?>px !important;
    color:#<?php echo $paramssld["ht_view3_sortbutton_font_color"];?> !important;
    text-decoration: none;
    cursor: pointer;
    margin: 0px !important;
    display: block;
    padding:3px;
}

/*#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li:hover {
    
}*/

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li a:hover {
    background-color: #<?php echo $paramssld["ht_view3_sortbutton_hover_background_color"];?> !important;
    color:#<?php echo $paramssld["ht_view3_sortbutton_hover_font_color"];?> !important;
    cursor: pointer;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> {
    margin-top: 5px;
    float: <?php echo $paramssld["ht_view3_filtering_float"]; ?>;
   width: <?php echo $filtering_block_width; ?>;
    <?php
        if ($paramssld["ht_view3_show_filtering"] == 'off') echo "display:none;";
        if($paramssld["ht_view3_filtering_float"] == 'none' && ($paramssld["ht_view3_sorting_float"] == 'left') ) { if($catalogShowSorting == 'on') { echo "margin-left: 31%;"; } else echo "margin-left: 1%"; } 
//        if(($paramssld["ht_view3_filtering_float"] == 'none' && ($paramssld["ht_view3_sorting_float"] == 'right')) || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%";}
    ?>
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul li {
    list-style-type: none;
    <?php
        if($filtering_block_width == "100%") { echo "float:left !important;margin: 4px 8px 4px 0px !important;"; }
        if($left_to_top == "ok") { echo "float:left !important;"; }
        if($paramssld["ht_view3_filtering_float"] == "left" || $paramssld["ht_view3_filtering_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else echo "border: 1px solid #ccc;";
    ?>
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul li a {
    font-size:<?php echo $paramssld["ht_view3_filterbutton_font_size"];?>px !important;
    color:#<?php echo $paramssld["ht_view3_filterbutton_font_color"];?> !important;
    background-color: #<?php echo $paramssld["ht_view3_filterbutton_background_color"];?> !important;
    border-radius: <?php echo $paramssld["ht_view3_filterbutton_border_radius"];?>px;
    padding: 3px;
    display: block;
    text-decoration: none;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?>  ul li a:hover {
    color:#<?php echo $paramssld["ht_view3_filterbutton_hover_font_color"];?> !important;
    background-color: #<?php echo $paramssld["ht_view3_filterbutton_hover_background_color"];?> !important;
    cursor: pointer;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> section {
    position:relative;
    display:block;
}

#huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_container_<?php echo $catalogID; ?> {

    <?php
        if($paramssld["ht_view3_sorting_float"] == "left" && $paramssld["ht_view3_filtering_float"] == "right" ||
           $paramssld["ht_view3_sorting_float"] == "right" && $paramssld["ht_view3_filtering_float"] == "left")
        { ?>
            margin-left: 21%;
            <?php } 
            if((($paramssld["ht_view3_filtering_float"] == "left" || $paramssld["ht_view3_filtering_float"] == "right" && $paramssld["ht_view3_sorting_float"] == "top") || ($paramssld["ht_view3_sorting_float"] == "left" || $paramssld["ht_view3_sorting_float"] == "right" && $paramssld["ht_view3_filting_float"] == "top")) && $catalogShowFiltering == "on" && $catalogShowSorting == "on")
                 { ?>
                  width: <?php echo $width_middle; ?> !important;
           <?php } ?>
}
.zoomContainer {
    z-index: 10;
}

</style>
      
<section id="huge_it_catalog_content_<?php echo $catalogID; ?>">
    <?php if($catalogShowSorting == "on")
        { ?>
          <div id="huge_it_catalog_options_<?php echo $catalogID; ?>" class="">
            <ul id="sort-by" class="option-set clearfix" data-option-key="sortBy">
                <li><a href="#sortBy=original-order" data-option-value="original-order" class="selected" data><?php echo $paramssld["ht_view3_sorting_name_by_default"]; ?></a></li>
                <li><a href="#sortBy=id" data-option-value="id"><?php echo $paramssld["ht_view3_sorting_name_by_id"]; ?></a></li>
                <li><a href="#sortBy=symbol" data-option-value="symbol"><?php echo $paramssld["ht_view3_sorting_name_by_name"]; ?></a></li>
                <li id="shuffle"><a href='#shuffle'><?php echo $paramssld["ht_view3_sorting_name_by_random"]; ?></a></li>
            </ul>
              
            <ul id="sort-direction" class="option-set clearfix" data-option-key="sortAscending">
                <li><a href="#sortAscending=true" data-option-value="true" class="selected"><?php echo $paramssld["ht_view3_sorting_name_by_asc"]; ?></a></li>
                <li><a href="#sortAscending=false" data-option-value="false"><?php echo $paramssld["ht_view3_sorting_name_by_desc"]; ?></a></li>
            </ul>
          </div>
  <?php }
   if($catalogShowFiltering == "on")
      { ?>
         <div id="huge_it_catalog_filters_<?php echo $catalogID; ?>">
            <ul>
                <li rel="*"><a>All</a></li>
                <?php
                $catalogCats = explode(",", $catalogCats);
                foreach ($catalogCats as $catalogCatsValue) {
                    if(!empty($catalogCatsValue))
                    {
                ?>
                <li rel=".<?php echo str_replace(" ","_",$catalogCatsValue); ?>"><a><?php echo str_replace("_"," ",$catalogCatsValue); ?></a></li>
                    <?php
                    }
                }
                ?>
            </ul>
        </div>
<?php } ?>
        <div id="huge_it_catalog_container_<?php echo $catalogID; ?>" class="super-list variable-sizes clearfix" <?php // if($paramssld["ht_view3_sorting_float"] == "top" && $paramssld["ht_view3_filtering_float"] == "top") echo "style='clear: both;'";?>>
              <?php
              $group_key = 0;
              foreach($images as $key=>$row)
              {
                      $group_key++;
                      $link = $row->sl_url;
                      ?>
                      <div class="element_<?php echo $catalogID; ?> <?php if($paramssld['ht_view3_allow_lightbox'] == "on"){ echo "catalog_colorbox_grouping_".$catalogID;} ?> " data-symbol="<?php echo $row->name; ?>" data-category="alkaline-earth">
                              <div class="left-block_<?php echo $catalogID; ?>">
                                      <div class="main-image-block_<?php echo $catalogID; ?> for_zoom">
                                              <?php $imgurl=explode(";",$row->image_url); ?>
                                              <?php 	if($row->image_url != ';'){ ?>
                                                <a href="<?php echo $imgurl[0]; ?>" class="catalog_group<?php echo $group_key; ?>"><img id="wd-cl-img<?php echo $key; ?>"src="<?php echo $imgurl[0]; ?>"></a>
                                              <?php } else { ?>
                                                      <a href="<?php echo $imgurl[0]; ?>"><img id="wd-cl-img<?php echo $key; ?>" src="images/noimage.png"></a>
                                              <?php
                                              }
                                              ?>
                                      </div>
                                      <div class="thumbs-block">
                                          <?php
                                          if($paramssld["ht_view3_show_thumbs"] == 'on')
                                              {
                                          ?>
                                              <ul class="thumbs-list_<?php echo $catalogID; ?>">					
                                                      <?php
                                                      $imgurl=explode(";",$row->image_url);
                                                      array_pop($imgurl);
                                                      array_shift($imgurl);

                                                      foreach($imgurl as $key=>$img)
                                                      {
                                                              ?>
                                                                      <li><a href="<?php echo $img;?>" class="catalog_group<?php echo $group_key; ?>"><img src="<?php echo $img; ?>"></a></li>
                                                      <?php
                                                      }
                                                      ?>
                                              </ul>
                                          <?php
                                          }
                                          ?>
                                      </div>
                              </div>
                              <div class="right-block">
                                <?php if($row->name!=''){?><div class="title-block_<?php echo $catalogID; ?>"><h3><?php echo $row->name; ?></h3></div><?php } ?>
                                <?php
                                if($paramssld["ht_view3_show_description"] == 'on')
                                    {
                                      if($row->description!='')
                                          { ?>
                                          <div class="description-block_<?php echo $catalogID; ?>"><p><?php echo $row->description; ?></p></div>
                                    <?php } ?>
                              <?php } ?>
                                          
                                  <?php if($paramssld["ht_catalog_view3_show_price"]=='on' && $row->price != ""){ ?>
                                            <div class="price-block_<?php echo $catalogID; ?>">
                                                <span class="old-price-block" ><?php echo $paramssld['ht_view3_price_text']; ?> : <span class="old-price" <?php if($row->market_price == "") { echo "style='text-decoration: none !important;'"; } ?>><?php echo $row->price; ?></span></span>
                                                <span class="discont-price-block" ><span class="discont-price" ><?php echo $row->market_price; ?></span></span>
                                            </div>
                                  <?php } ?>
                                          
                                      <?php
//                                      if($paramssld["ht_view3_show_linkbutton"] == 'on') {
                                          $page_link = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                                          if (strpos(get_permalink(),'/?') !== false) { $product_page_link = get_permalink()."&single_prod_id=$row->id"; } else { $product_page_link = get_permalink()."/?single_prod_id=$row->id"; }
                                      ?>
                                          <div class="button-block">
                                                  <a href="<?php echo $product_page_link; ?>" <?php if ($row->link_target=="on"){ echo 'target="_blank"';}?>><?php echo $paramssld["ht_view3_linkbutton_text"]; ?></a>
                                          </div>
                                      <?php 
//                                      } ?>
                              </div>
                      </div>

          <?php
              }
              ?>

        </div>
 </section>
  
<script>
    var allowZooming = '<?php echo $paramssld['ht_view3_allow_zooming'];?>';
jQuery(function(){  
    var defaultBlockWidth=<?php echo $paramssld['ht_view3_mainimage_width']; ?>;
    
    var $container = jQuery('#huge_it_catalog_container_<?php echo $catalogID; ?>');
    
    
      // add randomish size classes
      $container.find('.element_<?php echo $catalogID; ?>').each(function(){
        var $this = jQuery(this),
            number = parseInt( $this.find('.number').text(), 10 );
			//alert(number);
        if ( number % 7 % 2 === 1 ) {
          $this.addClass('width2');
        }
        if ( number % 3 === 0 ) {
          $this.addClass('height2');
        }
      });
    
    $container.hugeitmicro({
      itemSelector : '.element_<?php echo $catalogID; ?>',
      masonry : {
        columnWidth : <?php echo $paramssld['ht_view3_mainimage_width']; ?>+20+<?php echo $paramssld['ht_view3_element_border_width']*2; ?>
      },
      masonryHorizontal : {
        rowHeight: 300+20
      },
      cellsByRow : {
        columnWidth : 300+20,
        rowHeight : 240
      },
      cellsByColumn : {
        columnWidth : 300+20,
        rowHeight : 240
      },
      getSortData : {
        symbol : function( $elem ) {
          return $elem.attr('data-symbol');
        },
        category : function( $elem ) {
          return $elem.attr('data-category');
        },
        number : function( $elem ) {
          return parseInt( $elem.find('.number').text(), 10 );
        },
        weight : function( $elem ) {
          return parseFloat( $elem.find('.weight').text().replace( /[\(\)]/g, '') );
        },
        id : function ( $elem ) {
          return $elem.find('.id').text();
        }
      }
    });
    
    
      var $optionSets = jQuery('#huge_it_catalog_options_<?php echo $catalogID; ?> .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = jQuery(this);

        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  

        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');

        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {

          changeLayoutMode( $this, options )
        } else {

          $container.hugeitmicro( options );
        }
        
        return false;
      });


    

      var isHorizontal = false;
      function changeLayoutMode( $link, options ) {
        var wasHorizontal = isHorizontal;
        isHorizontal = $link.hasClass('horizontal');

        if ( wasHorizontal !== isHorizontal ) {

          var style = isHorizontal ? 
            { height: '75%', width: $container.width() } : 
            { width: 'auto' };

          $container.filter(':animated').stop();

          $container.addClass('no-transition').css( style );
          setTimeout(function(){
            $container.removeClass('no-transition').hugeitmicro( options );
          }, 100 )
        } else {
          $container.hugeitmicro( options );
        }
      }


    

      $container.delegate( '.default-block_<?php echo $catalogID; ?>', 'click', function(){
          var strheight=0;
          jQuery(this).parents('.element_<?php echo $catalogID; ?>').find('.wd-catalog-panel_<?php echo $catalogID; ?> > div').each(function(){
                strheight+=jQuery(this).outerHeight()+10;
                //alert(strheight);
          })
          strheight+=<?php echo $paramssld['ht_view0_block_height']+45; ?>;
	  			if(jQuery(this).parents('.element_<?php echo $catalogID; ?>').hasClass("large")){
			jQuery(this).parents('.element_<?php echo $catalogID; ?>').animate({
				height: "<?php echo $paramssld['ht_view0_block_height']+45; ?>px"
			}, 300, function() {
				jQuery(this).removeClass('large');
				$container.hugeitmicro('reLayout');
			});
			
			jQuery(this).parents('.element_<?php echo $catalogID; ?>').removeClass("active");
			return false;
		}
		
	
		jQuery(this).parents('.element_<?php echo $catalogID; ?>').css({height:strheight});
		jQuery(this).parents('.element_<?php echo $catalogID; ?>').addClass('large');

		$container.hugeitmicro('reLayout');
		jQuery(this).parents('.element_<?php echo $catalogID; ?>').css({height:"<?php echo $paramssld['ht_view0_block_height']+45; ?>px"});		 
		 
		//alert(strheight);
		 
		 jQuery(this).parents('.element_<?php echo $catalogID; ?>').animate({
			height:strheight+"px",
		  }, 300,function(){	$container.hugeitmicro('reLayout');});
	});

    var $sortBy =  jQuery('#huge_it_catalog_content_<?php echo $catalogID; ?> #sort-by');
    jQuery('#huge_it_catalog_content_<?php echo $catalogID; ?> #shuffle a').click(function(){
      $container.hugeitmicro('shuffle');
      $sortBy.find('.selected').removeClass('selected');
      $sortBy.find('[data-option-value="random"]').addClass('selected');
      return false;
    });
    
    ////filteringgggggg

        // bind filter on select change
        jQuery(document).ready(function(){
            jQuery('#huge_it_catalog_filters_<?php echo $catalogID; ?> ul li').click(function() {
              // get filter value from option value
              var filterValue = jQuery(this).attr('rel');
              // use filterFn if matches value
              filterValue = filterValue;//filterFns[ filterValue ] || 
              $container.hugeitmicro({ filter: filterValue });
            });
            <?php // if(($paramssld["ht_view3_sorting_float"] == "left" || $paramssld["ht_view3_sorting_float"] == "right") && $paramssld["ht_view3_filtering_float"] == "none")
//                  { ?>
//                        var topmargin = jQuery("#huge_it_catalog_filters_<?php echo $catalogID; ?> ul").height();
//                        jQuery("#huge_it_catalog_options_<?php echo $catalogID; ?>").css({'margin-top':parseInt(topmargin) + 5});
            <?php // }
//            else  {
//                    if(($paramssld["ht_view3_filtering_float"] == "left" || $paramssld["ht_view3_filtering_float"] == "right") && $paramssld["ht_view3_sorting_float"] == "none")
//                      { ?>
//                         var topmargin = jQuery("#huge_it_catalog_options_<?php echo $catalogID; ?>").height();
//                         jQuery("#huge_it_catalog_filters_<?php echo $catalogID; ?>").css({'margin-top':'5px'});
                <?php // }
//                  } ?>
           
           
//           jQuery("#huge_it_catalog_content_<?php echo $catalogID; ?> .element_<?php echo $catalogID; ?> .button-block a").click(function(){
//               alert("kpar");
//           });
        });
        
        //end of filtering
        
        jQuery(window).load(function(){
		$container.hugeitmicro('reLayout');
		jQuery(window).resize(function(){$container.hugeitmicro('reLayout');});
	});

  });
</script>
	  
	  <?php
	    
        break;
		

?>
  
	  <?php
	  
        break;
/////////////////////////////////// VIEW 5 Slider ////////////////////////////////////
		case 5;
?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.0.0/animate.min.css">
  <link href="<?php echo plugins_url('../style/liquid-slider.css', __FILE__);?>" rel="stylesheet" type="text/css" />
 
<style>
#main-slider_<?php echo $catalogID; ?>-wrapper .ls-nav { display: none; }
#main-slider_<?php echo $catalogID; ?> {background:#<?php echo $paramssld["ht_view5_slider_background_color"];?>;}

#main-slider_<?php echo $catalogID; ?> div.slider-content {
	position:relative;
	width:100%;
	padding:0px 0px 0px 0px;
	position:relative;
	background:#<?php echo $paramssld["ht_view5_slider_background_color"];?>;
}



[class$="-arrow"] {
	background-image:url(<?php echo plugins_url('../images/arrow.'.$paramssld["ht_view5_icons_style"].'.png', __FILE__);?>);
}

.ls-select-box {
	background:url(<?php echo plugins_url('../images/menu.'.$paramssld["ht_view5_icons_style"].'.png', __FILE__);?>) right center no-repeat #<?php echo $paramssld["ht_view5_slider_background_color"];?>;
}

#main-slider_<?php echo $catalogID; ?>-nav-select {
	color:#<?php echo $paramssld["ht_view5_title_font_color"];?>;
}

#main-slider_<?php echo $catalogID; ?> div.slider-content .slider-content-wrapper {
	position:relative;
	width:100%;
	padding:0px;
	display:block;
}

#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?> {
	width:<?php echo $paramssld["ht_view5_main_image_width"];?>px;
	display:table-cell;
	padding:0px 10px 0px 0px;
	float:left;
}

#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?> img.main-image {
	position:relative !important;
	width:100%;
	height:auto;
	display:block;
}

#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?> ul.thumbs-list_<?php echo $catalogID; ?> {
	list-style:none;
	display:table;
	position:relative;
	clear:both;
	width:100%;
	margin:10px 0px 0px 0px;
	padding:0px;
	clear:both;
}

#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?> ul.thumbs-list_<?php echo $catalogID; ?> li {
	display:block;
	float:left;
	width:<?php echo $paramssld["ht_view5_thumbs_width"];?>px;
	height:<?php echo $paramssld["ht_view5_thumbs_height"];?>px;
	margin:0px 2% 5px 1%;
	opacity:0.45;
}

#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?> ul.thumbs-list_<?php echo $catalogID; ?> li.active,#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?> ul.thumbs-list_<?php echo $catalogID; ?> li:hover {
	opacity:1;
}

#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?> ul.thumbs-list_<?php echo $catalogID; ?> li a {
	display:block;
}

#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?> ul.thumbs-list_<?php echo $catalogID; ?> li img {
	margin:0px !important;
	padding:0px !important;
	width:<?php echo $paramssld["ht_view5_thumbs_width"];?>px !important;
	height:<?php echo $paramssld["ht_view5_thumbs_height"];?>px !important;
}

#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block {
	display:table-cell;
}

#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block > div {
	padding-bottom:10px;
	margin-top:10px;
	<?php if($paramssld['ht_view5_show_separator_lines']=="on") {?>
		background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center bottom repeat-x;
	<?php } ?>
}
#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block > div:last-child {background:none;}


#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .title {
	position:relative;
	display:block;
	margin:-10px 0px 0px 0px;
	font-size:<?php echo $paramssld["ht_view5_title_font_size"];?>px !important;
	line-height:<?php echo $paramssld["ht_view5_title_font_size"]+4;?>px !important;
	color:#<?php echo $paramssld["ht_view5_title_font_color"];?>;
}

#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description {
	clear:both;
	position:relative;
	font-weight:normal;
	text-align:justify;
	font-size:<?php echo $paramssld["ht_view5_description_font_size"];?>px !important;
	line-height:<?php echo $paramssld["ht_view5_description_font_size"]+4;?>px !important;
	color:#<?php echo $paramssld["ht_view5_description_color"];?>;
}

#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description h1,
#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description h2,
#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description h3,
#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description h4,
#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description h5,
#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description h6,
#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description p, 
#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description strong,
#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description span {
	padding:2px !important;
	margin:0px !important;
}

#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description ul,
#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description li {
	padding:2px 0px 2px 5px;
	margin:0px 0px 0px 8px;
}



#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .old-price {
	text-decoration: line-through;
        margin: 0px;
        padding: 0px;
        font-weight: normal;
/*        font-size: 14px;*/
        padding: 7px 10px 7px 10px;
        margin: 0px 10px 0px 0px;
        border-radius: 5px;
        color: #<?php echo $paramssld['ht_view5_slider_background_color']; ?>;
        background: #<?php echo $paramssld['ht_catalog_view5_price_font_color']; ?>;
}

#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .price-block_<?php echo $catalogID; ?> {
	font-size: <?php echo $paramssld['ht_catalog_view5_price_font_size']; ?>px;
        color: #<?php echo $paramssld['ht_catalog_view5_price_font_color']; ?>;
}

#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .discont-price-block {
	
}



#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .button-block {
	position:relative;
}

#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .button-block a,#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .button-block a:link,#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .button-block a:visited{
	position:relative;
	display:inline-block;
	padding:6px 12px;
	background:#<?php echo $paramssld["ht_view5_linkbutton_background_color"];?>;
	color:#<?php echo $paramssld["ht_view5_linkbutton_color"];?>;
	font-size:<?php echo $paramssld["ht_view5_linkbutton_font_size"];?>;
	text-decoration:none;
}

#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .button-block a:hover,#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .button-block a:focus,#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .button-block a:active {
	background:#<?php echo $paramssld["ht_view5_linkbutton_background_hover_color"];?>;
	color:#<?php echo $paramssld["ht_view5_linkbutton_font_hover_color"];?>;
}

@media only screen and (min-width:500px) {
	#main-slider-nav-ul {
		visibility:hidden !important;
		height:1px;
	}
}

@media only screen and (max-width:500px) {
	#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?>,#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block {
		width:100%;
		display:block;
		float:none;
		clear:both;
	}
}
.zoomContainer {
    z-index: 10;
}

</style>
<div id="main-slider_<?php echo $catalogID; ?>" class="liquid-slider">
	<?php
	$catalog_slider_group = 0;
	foreach($images as $key=>$row)
	{
                $catalog_slider_group++;
		$imgurl=explode(";",$row->image_url);array_pop($imgurl);
		$link = $row->sl_url;
		$descnohtml=strip_tags($row->description);
		$result = substr($descnohtml, 0, 50);
		?>
		<div class="slider-content">
			
			<div class="slider-content-wrapper">
				<div class="image-block_<?php echo $catalogID; ?>  ">
					<?php 	if($row->image_url != ';'){ ?>
					<a class="<?php if($paramssld['ht_view5_allow_lightbox'] == "on"){ echo "catalog_slider_group".$catalog_slider_group; } ?> for_zoom" href="<?php echo $imgurl[0]; ?>" >
                                            <img class="main-image" src="<?php echo $imgurl[0]; ?>" alt="" />
                                        </a>
					<?php } else { ?>
					<img class="main-image" src="images/noimage.png" alt="" />
					<?php
					} ?>

					<?php if($paramssld["ht_view5_show_thumbs"]){ ?>
					<div class="thumbs-block">
                                            <ul class="thumbs-list_<?php echo $catalogID; ?>">
						<?php  
						array_shift($imgurl);
                                                foreach($imgurl as $key=>$img){?>
                                                        <li><a class="<?php if($paramssld['ht_view5_allow_lightbox'] == "on"){ echo "catalog_slider_group".$catalog_slider_group; } ?>" href="<?php echo $img; ?>"><img src="<?php echo $img; ?>"></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
					<?php } ?>					
				</div>
				<div class="right-block">
					<div><h2 class="title"><?php echo $row->name; ?></h2></div>
					<?php if($paramssld["ht_view5_show_description"]=='on'){ ?>
                                            <div class="description"><?php echo $row->description; ?></div>
                                        <?php } ?>
                                        
                                        <?php if($paramssld["ht_catalog_view5_show_price"]=='on' && $row->price != ""){ ?>
                                                  <div class="price-block_<?php echo $catalogID; ?>">
                                                      <span class="old-price-block" ><?php echo $paramssld['ht_view5_price_text']; ?> : <span class="old-price" <?php if($row->market_price == "") { echo "style='text-decoration: none !important;'"; } ?> ><?php echo $row->price; ?></span></span>
                                                      <span class="discont-price-block" ><span class="discont-price" ><?php echo $row->market_price; ?></span></span>
                                                  </div>
                                        <?php } ?>
                                        
                                        <?php if($paramssld["ht_view5_show_linkbutton"]=='on'){
                                                $page_link = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                                                if (strpos(get_permalink(),'/?') !== false) { $product_page_link = get_permalink()."&single_prod_id=$row->id"; } else { $product_page_link = get_permalink()."/?single_prod_id=$row->id"; }
                                        ?>
						<div class="button-block">
							<a class="" href="<?php echo $product_page_link; ?>"  <?php if ($row->link_target=="on"){echo 'target="_blank"';}?>><?php echo $paramssld["ht_view5_linkbutton_text"]; ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php
	} ?>
</div>
  <script src="<?php echo plugins_url('../js/jquery.liquid-slider.min.js', __FILE__);?>"></script>  
   <script>
       var allowZooming = '<?php echo $paramssld['ht_view5_allow_zooming'];?>';
    /**
     * If you need to access the internal property or methods, use this:
     * var api = $.data( jQuery('#main-slider_<?php echo $catalogID; ?>')[0], 'liquidSlider');
     * console.log(api);
     */
	 jQuery('#main-slider_<?php echo $catalogID; ?>').liquidSlider();
  </script>
<?php  
        break;
   ?>




<?php 
}
 ?>
<?php
	return ob_get_clean();
}
?>

<?php
    function html_single_product_page($productArray, $paramssld, $paramssld2, $ratingsArray, $reviewsArray, $spamReviewsArray, $captchaFirstNum, $captchaSecondNum, $captcha_val){
        ob_start();              //       var_dump($paramssld);  var_dump($paramssld2);
        $rating = 0;
        if(!empty($ratingsArray)){
            for($i = 0; $i < count($ratingsArray) ; $i++ ){
                $rating = $rating + $ratingsArray[$i]->value;
            }
            $rating = intval($rating / count($ratingsArray));
        };
        if(isset($_GET['single_prod_id'])) $prod_id = $_GET['single_prod_id'];
        else $prod_id = 1;
        
        get_currentuserinfo() ;
        global $user_level;$user_info = get_userdata(1);
        
        

        $prod_params = $productArray[0]->parameters;
        $productArray = $productArray[0];
        $allParamsAndChildsInArray = explode('@@', $prod_params);
        //var_dump($prod_params);     var_dump($rating);
        $group_key = $productArray->id;
        //		var_dump($productArray->id);exit;
        $link =$productArray->image_url;

        $myPageLink = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        
        $adminLink = get_option( 'admin_email' );
//        		var_dump($adminLink);exit;


$paramssld["ht_view0_sorting_float"] = "none";
$paramssld["ht_view1_sorting_float"] = "none";
$paramssld["ht_view2_sorting_float"] = "none";
$paramssld["ht_view3_sorting_float"] = "none";
$paramssld["ht_view4_sorting_float"] = "none";
$paramssld["ht_view5_sorting_float"] = "none";
$paramssld["ht_view6_sorting_float"] = "none";

$paramssld["ht_view0_filtering_float"] = "none";
$paramssld["ht_view1_filtering_float"] = "none";
$paramssld["ht_view2_filtering_float"] = "none";
$paramssld["ht_view3_filtering_float"] = "none";
$paramssld["ht_view4_filtering_float"] = "none";
$paramssld["ht_view5_filtering_float"] = "none";
$paramssld["ht_view6_filtering_float"] = "none";
$paramssld["ht_single_product_allow_lightbox"] = "off";
$paramssld["ht_single_product_allow_zooming"] = "on";
$paramssld["ht_single_product_border_width"] = "1";
$paramssld["ht_single_product_border_color"] = "f9f9f9";
$paramssld["ht_single_product_background_color"] = "efefef";
$paramssld["ht_single_product_mainimage_width"] = "240";
$paramssld["ht_single_product_show_separator_lines"] = "on";
$paramssld["ht_single_product_title_font_size"] = "24";
$paramssld["ht_single_product_title_font_color"] = "0074A2";
$paramssld["ht_single_product_show_description"] = "on";
$paramssld["ht_single_product_description_font_size"] = "14";
$paramssld["ht_single_product_description_font_color"] = "000";
$paramssld["ht_single_product_show_thumbs"] = "on";
$paramssld["ht_single_product_thumbs_width"] = "75";
$paramssld["ht_single_product_thumbs_height"] = "75";
$paramssld["ht_single_product_price_font_size"] = "14";
$paramssld["ht_single_product_price_font_color"] = "E22828";
$paramssld["ht_single_product_market_price_font_size"] = "14";
$paramssld["ht_single_product_market_price_font_color"] = "E22828";
$paramssld["ht_single_product_rating_font_size"] = "14";
$paramssld["ht_single_product_rating_font_color"] = "000000";
$paramssld["ht_single_product_tabs_font_color"] = "fff";
$paramssld["ht_single_product_tabs_font_hover_color"] = "fff";
$paramssld["ht_single_product_params_tab_box_background_color"] = "fff";
$paramssld["ht_single_product_params_tab_words_font_color"] = "000";
$paramssld["ht_single_product_comments_tab_words_font_color"] = "000";
$paramssld["ht_single_product_params_name_font_color"] = "000";
$paramssld["ht_single_product_params_values_font_color"] = "000";
$paramssld["ht_single_product_comments_name_font_color"] = "000";
$paramssld["ht_single_product_comments_content_font_color"] = "000";
$paramssld["ht_single_product_comments_submit_button_text"] = "Submit";
$paramssld["ht_single_product_comments_submit_button_text_font_size"] = "14";
$paramssld["ht_single_product_comments_submit_button_text_font_color"] = "FFFFFF";
$paramssld["ht_single_product_comments_submit_button_text_font_hover_color"] = "FFFFFF";
$paramssld["ht_single_product_comments_submit_button_text_background_color"] = "4ca6cf";
$paramssld["ht_single_product_comments_submit_button_text_background_hover_olor"] = "21759b";
$paramssld["ht_single_product_price_text"] = "Price";
$paramssld["ht_single_product_market_price_text"] = "Discount Price";
$paramssld["ht_single_product_comments_text"] = "Comments";
$paramssld["ht_single_product_parameters_text"] = "Parameters";
$paramssld["ht_single_product_rating_text"] = "Rating";
$paramssld["ht_single_product_share_text"] = "Share";
$paramssld["ht_single_product_show_price"] = "on";
$paramssld["ht_single_product_show_rating"] = "on";
$paramssld["ht_single_product_show_share_buttons"] = "on";
$paramssld["ht_single_product_show_parameters"] = "on";
$paramssld["ht_single_product_show_comments"] = "on";
$paramssld["ht_single_product_tabs_border_color"] = "cccccc";
$paramssld["ht_single_product_your_name_text"] = "Your Name";
$paramssld["ht_single_product_your_Comment_text"] = "Your Comment";
$paramssld["ht_single_product_captcha_text"] = "Captcha";
$paramssld["ht_single_product_invalid_captcha_text"] = "Invalid Captcha";

$paramssld2["ht_view0_togglebutton_style"] = "dark";
$paramssld2["ht_view0_show_separator_lines"] = "on";
$paramssld2["ht_view0_linkbutton_text"] = "View Product";
$paramssld2["ht_view0_show_linkbutton"] = "on";
$paramssld2["ht_view0_linkbutton_background_hover_color"] = "df2e1b";
$paramssld2["ht_view0_linkbutton_background_color"] = "e74c3c";
$paramssld2["ht_view0_linkbutton_font_hover_color"] = "ffffff";
$paramssld2["ht_view0_linkbutton_color"] = "ffffff";
$paramssld2["ht_view0_linkbutton_font_size"] = "14";
$paramssld2["ht_view0_description_color"] = "5b5b5b";
$paramssld2["ht_view0_description_font_size"] = "14";
$paramssld2["ht_view0_show_description"] = "on";
$paramssld2["ht_view0_thumbs_width"] = "75";
$paramssld2["ht_view0_thumbs_position"] = "before";
$paramssld2["ht_view0_show_thumbs"] = "on";
$paramssld2["ht_view0_title_font_size"] = "15";
$paramssld2["ht_view0_title_font_color"] = "555555";
$paramssld2["ht_view0_element_border_width"] = "1";
$paramssld2["ht_view0_element_border_color"] = "D0D0D0";
$paramssld2["ht_view0_element_background_color"] = "f7f7f7";
$paramssld2["ht_view0_block_width"] = "275";
$paramssld2["ht_view0_block_height"] = "160";
$paramssld2["ht_view1_show_separator_lines"] = "on";
$paramssld2["ht_view1_linkbutton_text"] = "View Product";
$paramssld2["ht_view1_show_linkbutton"] = "on";
$paramssld2["ht_view1_linkbutton_background_hover_color"] = "df2e1b";
$paramssld2["ht_view1_linkbutton_background_color"] = "e74c3c";
$paramssld2["ht_view1_linkbutton_font_hover_color"] = "ffffff";
$paramssld2["ht_view1_linkbutton_color"] = "ffffff";
$paramssld2["ht_view1_linkbutton_font_size"] = "14";
$paramssld2["ht_view1_description_color"] = "5b5b5b";
$paramssld2["ht_view1_description_font_size"] = "14";
$paramssld2["ht_view1_show_description"] = "on";
$paramssld2["ht_view1_thumbs_width"] = "75";
$paramssld2["ht_view1_thumbs_position"] = "before";
$paramssld2["ht_view1_show_thumbs"] = "on";
$paramssld2["ht_view1_title_font_size"] = "15";
$paramssld2["ht_view1_title_font_color"] = "555555";
$paramssld2["ht_view1_element_border_width"] = "1";
$paramssld2["ht_view1_element_border_color"] = "D0D0D0";
$paramssld2["ht_view1_element_background_color"] = "f7f7f7";
$paramssld2["ht_view1_block_width"] = "275";
$paramssld2["ht_view2_element_linkbutton_text"] = "View Product";
$paramssld2["ht_view2_element_show_linkbutton"] = "on";
$paramssld2["ht_view2_element_linkbutton_color"] = "ffffff";
$paramssld2["ht_view2_element_linkbutton_font_size"] = "14";
$paramssld2["ht_view2_element_linkbutton_background_color"] = "2ea2cd";
$paramssld2["ht_view2_show_popup_linkbutton"] = "on";
$paramssld2["ht_view2_popup_linkbutton_text"] = "View Product";
$paramssld2["ht_view2_popup_linkbutton_background_hover_color"] = "0074a2";
$paramssld2["ht_view2_popup_linkbutton_background_color"] = "2ea2cd";
$paramssld2["ht_view2_popup_linkbutton_font_hover_color"] = "ffffff";
$paramssld2["ht_view2_popup_linkbutton_color"] = "ffffff";
$paramssld2["ht_view2_popup_linkbutton_font_size"] = "14";
$paramssld2["ht_view2_description_color"] = "222222";
$paramssld2["ht_view2_description_font_size"] = "14";
$paramssld2["ht_view2_show_description"] = "on";
$paramssld2["ht_view2_thumbs_width"] = "75";
$paramssld2["ht_view2_thumbs_height"] = "75";
$paramssld2["ht_view2_thumbs_position"] = "before";
$paramssld2["ht_view2_show_thumbs"] = "on";
$paramssld2["ht_view2_popup_background_color"] = "FFFFFF";
$paramssld2["ht_view2_popup_overlay_color"] = "000000";
$paramssld2["ht_view2_popup_overlay_transparency_color"] = "70";
$paramssld2["ht_view2_popup_closebutton_style"] = "dark";
$paramssld2["ht_view2_show_separator_lines"] = "on";
$paramssld2["ht_view2_show_popup_title"] = "on";
$paramssld2["ht_view2_element_title_font_size"] = "18";
$paramssld2["ht_view2_element_title_font_color"] = "222222";
$paramssld2["ht_view2_popup_title_font_size"] = "18";
$paramssld2["ht_view2_popup_title_font_color"] = "222222";
$paramssld2["ht_view2_element_overlay_color"] = "FFFFFF";
$paramssld2["ht_view2_element_overlay_transparency"] = "70";
$paramssld2["ht_view2_zoombutton_style"] = "light";
$paramssld2["ht_view2_element_border_width"] = "1";
$paramssld2["ht_view2_element_border_color"] = "dedede";
$paramssld2["ht_view2_element_background_color"] = "f9f9f9";
$paramssld2["ht_view2_element_width"] = "275";
$paramssld2["ht_view2_element_height"] = "160";
$paramssld2["ht_view3_show_separator_lines"] = "on";
$paramssld2["ht_view3_linkbutton_text"] = "View Product";
$paramssld2["ht_view3_show_linkbutton"] = "on";
$paramssld2["ht_view3_linkbutton_background_hover_color"] = "0074a2";
$paramssld2["ht_view3_linkbutton_background_color"] = "2ea2cd";
$paramssld2["ht_view3_linkbutton_font_hover_color"] = "ffffff";
$paramssld2["ht_view3_linkbutton_color"] = "ffffff";
$paramssld2["ht_view3_linkbutton_font_size"] = "14";
$paramssld2["ht_view3_description_color"] = "555555";
$paramssld2["ht_view3_description_font_size"] = "14";
$paramssld2["ht_view3_show_description"] = "on";
$paramssld2["ht_view3_thumbs_width"] = "75";
$paramssld2["ht_view3_thumbs_height"] = "75";
$paramssld2["ht_view3_show_thumbs"] = "on";
$paramssld2["ht_view3_title_font_size"] = "18";
$paramssld2["ht_view3_title_font_color"] = "0074a2";
$paramssld2["ht_view3_mainimage_width"] = "240";
$paramssld2["ht_view3_element_border_width"] = "1";
$paramssld2["ht_view3_element_border_color"] = "dedede";
$paramssld2["ht_view3_element_background_color"] = "f9f9f9";
$paramssld2["ht_view5_icons_style"] = "dark";
$paramssld2["ht_view5_show_separator_lines"] = "on";
$paramssld2["ht_view5_linkbutton_text"] = "View Product";
$paramssld2["ht_view5_show_linkbutton"] = "on";
$paramssld2["ht_view5_linkbutton_background_hover_color"] = "0074a2";
$paramssld2["ht_view5_linkbutton_background_color"] = "2ea2cd";
$paramssld2["ht_view5_linkbutton_font_hover_color"] = "ffffff";
$paramssld2["ht_view5_linkbutton_color"] = "ffffff";
$paramssld2["ht_view5_linkbutton_font_size"] = "14";
$paramssld2["ht_view5_description_color"] = "555555";
$paramssld2["ht_view5_description_font_size"] = "14";
$paramssld2["ht_view5_show_description"] = "on";
$paramssld2["ht_view5_thumbs_width"] = "75";
$paramssld2["ht_view5_thumbs_height"] = "75";
$paramssld2["ht_view5_show_thumbs"] = "on";
$paramssld2["ht_view5_title_font_size"] = "16";
$paramssld2["ht_view5_title_font_color"] = "0074a2";
$paramssld2["ht_view5_main_image_width"] = "275";
$paramssld2["ht_view5_slider_tabs_font_color"] = "d9d99";
$paramssld2["ht_view5_slider_tabs_background_color"] = "555555";
$paramssld2["ht_view5_slider_background_color"] = "f9f9f9";
$paramssld2["ht_view6_title_font_size"] = "16";
$paramssld2["ht_view6_title_font_color"] = "0074A2";
$paramssld2["ht_view6_title_font_hover_color"] = "2EA2CD";
$paramssld2["ht_view6_title_background_color"] = "000000";
$paramssld2["ht_view6_title_background_transparency"] = "80";
$paramssld2["ht_view6_border_radius"] = "3";
$paramssld2["ht_view6_border_width"] = "0";
$paramssld2["ht_view6_border_color"] = "eeeeee";
$paramssld2["ht_view6_width"] = "275";
$paramssld2["light_box_size"] = "17";
$paramssld2["light_box_width"] = "500";
$paramssld2["light_box_transition"] = "elastic";
$paramssld2["light_box_speed"] = "800";
$paramssld2["light_box_href"] = "False";
$paramssld2["light_box_title"] = "false";
$paramssld2["light_box_scalephotos"] = "true";
$paramssld2["light_box_rel"] = "false";
$paramssld2["light_box_scrolling"] = "false";
$paramssld2["light_box_opacity"] = "20";
$paramssld2["light_box_open"] = "false";
$paramssld2["light_box_overlayclose"] = "true";
$paramssld2["light_box_esckey"] = "false";
$paramssld2["light_box_arrowkey"] = "false";
$paramssld2["light_box_loop"] = "true";
$paramssld2["light_box_data"] = "false";
$paramssld2["light_box_classname"] = "false";
$paramssld2["light_box_fadeout"] = "300";
$paramssld2["light_box_closebutton"] = "false";
$paramssld2["light_box_current"] = "image";
$paramssld2["light_box_previous"] = "previous";
$paramssld2["light_box_next"] = "next";
$paramssld2["light_box_close"] = "close";
$paramssld2["light_box_iframe"] = "false";
$paramssld2["light_box_inline"] = "false";
$paramssld2["light_box_html"] = "false";
$paramssld2["light_box_photo"] = "false";
$paramssld2["light_box_height"] = "500";
$paramssld2["light_box_innerwidth"] = "false";
$paramssld2["light_box_innerheight"] = "false";
$paramssld2["light_box_initialwidth"] = "300";
$paramssld2["light_box_initialheight"] = "100";
$paramssld2["light_box_maxwidth"] = "768";
$paramssld2["light_box_maxheight"] = "500";
$paramssld2["light_box_slideshow"] = "false";
$paramssld2["light_box_slideshowspeed"] = "2500";
$paramssld2["light_box_slideshowauto"] = "true";
$paramssld2["light_box_slideshowstart"] = "start slideshow";
$paramssld2["light_box_slideshowstop"] = "stop slideshow";
$paramssld2["light_box_fixed"] = "true";
$paramssld2["light_box_top"] = "false";
$paramssld2["light_box_bottom"] = "false";
$paramssld2["light_box_left"] = "false";
$paramssld2["light_box_right"] = "false";
$paramssld2["light_box_reposition"] = "false";
$paramssld2["light_box_retinaimage"] = "true";
$paramssld2["light_box_retinaurl"] = "false";
$paramssld2["light_box_retinasuffix"] = "@2x.$1";
$paramssld2["light_box_returnfocus"] = "true";
$paramssld2["light_box_trapfocus"] = "true";
$paramssld2["light_box_fastiframe"] = "true";
$paramssld2["light_box_preloading"] = "true";
$paramssld2["slider_title_position"] = "5";
$paramssld2["light_box_style"] = "1";
$paramssld2["light_box_size_fix"] = "false";
$paramssld2["ht_view2_popup_full_width"] = "on";
$paramssld2["ht_view0_price_text"] = "Price";
$paramssld2["ht_view1_price_text"] = "Price";
$paramssld2["ht_view2_price_text"] = "Price";
$paramssld2["ht_view3_price_text"] = "Price";
$paramssld2["ht_view5_price_text"] = "Price";
$paramssld2["ht_catalog_view0_show_price"] = "on";
$paramssld2["ht_catalog_view0_price_font_size"] = "15";
$paramssld2["ht_catalog_view0_price_font_color"] = "e74c3c";
$paramssld2["ht_catalog_view0_market_price_font_size"] = "15";
$paramssld2["ht_catalog_view0_market_price_font_color"] = "000000";
$paramssld2["ht_catalog_view1_show_price"] = "on";
$paramssld2["ht_catalog_view1_price_font_size"] = "15";
$paramssld2["ht_catalog_view1_price_font_color"] = "e74c3c";
$paramssld2["ht_catalog_view1_market_price_font_size"] = "15";
$paramssld2["ht_catalog_view1_market_price_font_color"] = "000000";
$paramssld2["ht_catalog_view2_show_price"] = "on";
$paramssld2["ht_catalog_view2_price_font_size"] = "15";
$paramssld2["ht_catalog_view2_price_font_color"] = "e74c3c";
$paramssld2["ht_catalog_view2_market_price_font_size"] = "15";
$paramssld2["ht_catalog_view2_market_price_font_color"] = "000000";
$paramssld2["ht_catalog_view3_show_price"] = "on";
$paramssld2["ht_catalog_view3_price_font_size"] = "15";
$paramssld2["ht_catalog_view3_price_font_color"] = "0074a2";
$paramssld2["ht_catalog_view3_market_price_font_size"] = "15";
$paramssld2["ht_catalog_view3_market_price_font_color"] = "000000";
$paramssld2["ht_catalog_view5_show_price"] = "on";
$paramssld2["ht_catalog_view5_price_font_size"] = "15";
$paramssld2["ht_catalog_view5_price_font_color"] = "0074a2";
$paramssld2["ht_catalog_view5_market_price_font_size"] = "15";
$paramssld2["ht_catalog_view5_market_price_font_color"] = "000000";
$paramssld2["ht_catalog_zoom_window_type"] = "window";
$paramssld2["ht_catalog_zoom_window_width"] = "200";
$paramssld2["ht_catalog_zoom_window_height"] = "150";
$paramssld2["ht_catalog_zoom_x_asis"] = "0";
$paramssld2["ht_catalog_zoom_y_asis"] = "0";
$paramssld2["ht_catalog_zoom_window_position"] = "16";
$paramssld2["ht_catalog_zoom_window_border_size"] = "2";
$paramssld2["ht_catalog_zoom_window_border_color"] = "#000";
$paramssld2["ht_catalog_zoom_window_lens_size"] = "200";
$paramssld2["ht_catalog_zoom_window_fadein"] = "200";
$paramssld2["ht_catalog_zoom_window_fadeout"] = "200";
$paramssld2["ht_catalog_zoom_lens_fadein"] = "200";
$paramssld2["ht_catalog_zoom_lens_fadeout"] = "200";
$paramssld2["false"] = "true";
$paramssld2["ht_catalog_zoom_lens_shape"] = "square";
$paramssld2["ht_catalog_zoom_lens_color"] = "#fff";
$paramssld2["ht_catalog_zoom_lens_opacity"] = "40";
$paramssld2["ht_catalog_zoom_cursor"] = "crosshair";
$paramssld2["ht_catalog_zoom_scrollzoom"] = "true";
$paramssld2["ht_catalog_zoom_easing"] = "true";
$paramssld2["ht_catalog_zoom_lens_size_fix"] = "false";
$paramssld2["ht_catalog_zoom_lens_height"] = "100";
$paramssld2["ht_catalog_zoom_lens_width"] = "100";
$paramssld2["ht_catalog_zoom_tint"] = "true";
$paramssld2["ht_catalog_zoom_tint_colour"] = "#fff";
$paramssld2["ht_catalog_zoom_tint_opacity"] = "40";
$paramssld2["ht_catalog_zoom_tint_fadein"] = "200";
$paramssld2["ht_catalog_zoom_tint_fadeout"] = "200";
$paramssld2['ht_catalog_zoom_lens_hide'] = "false";
$paramssld2["ht_view3_allow_lightbox"] = "on";
$paramssld2["ht_catalog_zoom_thumbs_zoom"] = "off";
$paramssld2["ht_view3_allow_zooming"] = "on";
$paramssld["ht_view0_allow_zooming"] = "off";
$paramssld["ht_view0_allow_lightbox"] = "on";
$paramssld["ht_view1_allow_zooming"] = "off";
$paramssld["ht_view1_allow_lightbox"] = "on";
$paramssld["ht_view2_allow_zooming"] = "off";
$paramssld["ht_view2_allow_lightbox"] = "on";
$paramssld["ht_view5_allow_zooming"] = "on";
$paramssld["ht_view5_allow_lightbox"] = "off";

?>

<script>
	var allowZooming = '<?php echo $paramssld['ht_single_product_allow_zooming'];?>';
	var allowLightbox = '<?php echo $paramssld['ht_single_product_allow_lightbox'];?>';
	if(allowZooming == "on"){
		var for_zoom;
		if("<?php echo $paramssld2['ht_catalog_zoom_thumbs_zoom']; ?>" == "on"){
			for_zoom = ".for_zoom img, .thumbs-block img";
		}
		else if("<?php echo $paramssld2['ht_catalog_zoom_thumbs_zoom']; ?>" == "off"){
			for_zoom = ".for_zoom img";
		}
//            var catalogThumbsZoom = "<?php echo $paramssld2['ht_catalog_zoom_thumbs_zoom'];?>";
		var catalogZoomType = "<?php echo $paramssld2['ht_catalog_zoom_window_type'];?>";
		var catalogWindowWidth = <?php echo $paramssld2['ht_catalog_zoom_window_width'];?>;
		var catalogWindowHeight = <?php echo $paramssld2['ht_catalog_zoom_window_height'];?>;
		var catalogWindowOffetx = <?php echo $paramssld2['ht_catalog_zoom_x_asis'];?>;
		var catalogWindowOffety = <?php echo $paramssld2['ht_catalog_zoom_y_asis'];?>;
		var catalogWindowPosition = <?php echo $paramssld2['ht_catalog_zoom_window_position'];?>;
		var catalogBorderSize = <?php echo $paramssld2['ht_catalog_zoom_window_border_size'];?>;
		var catalogBorderColour = "<?php echo $paramssld2['ht_catalog_zoom_window_border_color'];?>";
		var catalogWindowFadeIn = <?php echo $paramssld2['ht_catalog_zoom_window_fadein'];?>;
		var catalogWindowFadeOut = <?php echo $paramssld2['ht_catalog_zoom_window_fadeout'];?>;
		var catalogLensSize = <?php echo $paramssld2['ht_catalog_zoom_window_lens_size'];?>;

		var catalogLensFadeIn = <?php echo $paramssld2['ht_catalog_zoom_lens_fadein'];?>;
		var catalogLensFadeOut = <?php echo $paramssld2['ht_catalog_zoom_lens_fadeout'];?>;
		var catalogZoomLens = <?php echo $paramssld2['ht_catalog_zoom_lens_hide'];?>;
		var catalogLensShape = "<?php echo $paramssld2['ht_catalog_zoom_lens_shape'];?>";
		var catalogLensColour = "<?php echo $paramssld2['ht_catalog_zoom_lens_color'];?>";
		var catalogLensOpacity = <?php echo $paramssld2['ht_catalog_zoom_lens_opacity'];?>/100;
		var catalogCursor = "<?php echo $paramssld2['ht_catalog_zoom_cursor'];?>";
                if(catalogZoomType != "inner") { var catalogScrollZoom = <?php echo $paramssld2['ht_catalog_zoom_scrollzoom'];?>; }
                else{ var catalogScrollZoom = false; }
                                                          
		var catalogEasing = <?php echo $paramssld2['ht_catalog_zoom_easing'];?>;

		var catalogTint = <?php echo $paramssld2['ht_catalog_zoom_tint'];?>;
		var catalogTintColour = "<?php echo $paramssld2['ht_catalog_zoom_tint_colour'];?>";
		var catalogTintOpacity = <?php echo $paramssld2['ht_catalog_zoom_tint_opacity'];?>/100;
		var catalogZoomTintFadeIn = <?php echo $paramssld2['ht_catalog_zoom_tint_fadein'];?>;
		var catalogZoomTintFadeOut = <?php echo $paramssld2['ht_catalog_zoom_tint_fadeout'];?>;

		var catalogGallery = null;
	}
	if(allowLightbox == "on"){
		var lightbox_transition = '<?php echo $paramssld2['light_box_transition'];?>';
		var lightbox_speed = <?php echo $paramssld2['light_box_speed'];?>;
		var lightbox_fadeOut = <?php echo $paramssld2['light_box_fadeout'];?>;
		var lightbox_title = <?php echo $paramssld2['light_box_title'];?>;
		var lightbox_scalePhotos = <?php echo $paramssld2['light_box_scalephotos'];?>;
		var lightbox_scrolling = <?php echo $paramssld2['light_box_scrolling'];?>;
		var lightbox_opacity = <?php echo ($paramssld2['light_box_opacity']/100)+0.001;?>;
		var lightbox_open = <?php echo $paramssld2['light_box_open'];?>;
		var lightbox_returnFocus = <?php echo $paramssld2['light_box_returnfocus'];?>;
		var lightbox_trapFocus = <?php echo $paramssld2['light_box_trapfocus'];?>;
		var lightbox_fastIframe = <?php echo $paramssld2['light_box_fastiframe'];?>;
		var lightbox_preloading = <?php echo $paramssld2['light_box_preloading'];?>;
		var lightbox_overlayClose = <?php echo $paramssld2['light_box_overlayclose'];?>;
		var lightbox_escKey = <?php echo $paramssld2['light_box_esckey'];?>;
		var lightbox_arrowKey = <?php echo $paramssld2['light_box_arrowkey'];?>;
		var lightbox_loop = <?php echo $paramssld2['light_box_loop'];?>;
		var lightbox_closeButton = <?php echo $paramssld2['light_box_closebutton'];?>;
		var lightbox_previous = "<?php echo $paramssld2['light_box_previous'];?>";
		var lightbox_next = "<?php echo $paramssld2['light_box_next'];?>";
		var lightbox_close = "<?php echo $paramssld2['light_box_close'];?>";
		var lightbox_html = <?php echo $paramssld2['light_box_html'];?>;
		var lightbox_photo = <?php echo $paramssld2['light_box_photo'];?>;
		var lightbox_width = '<?php if($paramssld2['light_box_size_fix'] == 'false'){ echo 'false';} else { echo $paramssld2['light_box_width']; } ?>';
		var lightbox_height = '<?php if($paramssld2['light_box_size_fix'] == 'false'){ echo 'false';} else { echo $paramssld2['light_box_height']; } ?>';
		var lightbox_innerWidth = '<?php echo $paramssld2['light_box_innerwidth'];?>';
		var lightbox_innerHeight = '<?php echo $paramssld2['light_box_innerheight'];?>';
		var lightbox_initialWidth = '<?php echo $paramssld2['light_box_initialwidth'];?>';
		var lightbox_initialHeight = '<?php echo $paramssld2['light_box_initialheight'];?>';

		var maxwidth=jQuery(window).width();
		if(maxwidth><?php echo $paramssld2['light_box_maxwidth'];?>){ maxwidth=<?php echo $paramssld2['light_box_maxwidth'];?>; }
		var lightbox_maxWidth = <?php if($paramssld2['light_box_size_fix'] == 'true'){ echo '"100%"';} else { echo 'maxwidth'; } ?>;
		var lightbox_maxHeight = <?php if($paramssld2['light_box_size_fix'] == 'true'){ echo '"100%"';} else { echo $paramssld2['light_box_maxheight']; } ?>;

		var lightbox_slideshow = <?php echo $paramssld2['light_box_slideshow'];?>;
		var lightbox_slideshowSpeed = <?php echo $paramssld2['light_box_slideshowspeed'];?>;
		var lightbox_slideshowAuto = <?php echo $paramssld2['light_box_slideshowauto'];?>;
		var lightbox_slideshowStart = "<?php echo $paramssld2['light_box_slideshowstart'];?>";
		var lightbox_slideshowStop = "<?php echo $paramssld2['light_box_slideshowstop'];?>";
		var lightbox_fixed = <?php echo $paramssld2['light_box_fixed'];?>;
	
	
		<?php
		$pos = $paramssld2['slider_title_position'];
		switch($pos){ 
			case 1:
			?>
				var lightbox_top = '10%';
				var lightbox_bottom = false;
				var lightbox_left = '10%';
				var lightbox_right = false;
			<?php
			break;	
			case 1:
			?>
				var lightbox_top = '10%';
				var lightbox_bottom = false;
				var lightbox_left = '10%';
				var lightbox_right = false;
			<?php
			break;	
			case 2:
			?>
				var lightbox_top = '10%';
				var lightbox_bottom = false;
				var lightbox_left = false;
				var lightbox_right = false;
			<?php
			break;	
			case 3:
			?>
				var lightbox_top = '10%';
				var lightbox_bottom = false;
				var lightbox_left = false;
				var lightbox_right = '10%';
			<?php
			break;
			case 4:
			?>
				var lightbox_top = false;
				var lightbox_bottom = false;
				var lightbox_left = '10%';
				var lightbox_right = false;
			<?php
			break;	
			case 5:
			?>
				var lightbox_top = false;
				var lightbox_bottom = false;
				var lightbox_left = false;
				var lightbox_right = false;
			<?php
			break;	
			case 6:
			?>
				var lightbox_top = false;
				var lightbox_bottom = false;
				var lightbox_left = false;
				var lightbox_right = '10%';
			<?php
			break;	
			case 7:
			?>
				var lightbox_top = false;
				var lightbox_bottom = '10%';
				var lightbox_left = '10%';
				var lightbox_right = false;
			<?php
			break;	
			case 8:
			?>
				var lightbox_top = false;
				var lightbox_bottom = '10%';
				var lightbox_left = false;
				var lightbox_right = false;
			<?php
			break;	
			case 9:
			?>
				var lightbox_top = false;
				var lightbox_bottom = '10%';
				var lightbox_left = false;
				var lightbox_right = '10%';
			<?php
			break;	
		} ?>
		
		var lightbox_reposition = <?php echo $paramssld2['light_box_reposition'];?>;
		var lightbox_retinaImage = <?php echo $paramssld2['light_box_retinaimage'];?>;
		var lightbox_retinaUrl = <?php echo $paramssld2['light_box_retinaurl'];?>;
		var lightbox_retinaSuffix = "<?php echo $paramssld2['light_box_retinasuffix'];?>";

			jQuery(document).ready(function(){
								
//				jQuery("#huge_it_catalog_content_<?php //echo $catalogID; ?> a[href$='.jpg'], #huge_it_catalog_content_<?php //echo $catalogID; ?> a[href$='.png'], #huge_it_catalog_content_<?php //echo $catalogID; ?> a[href$='.gif']").addClass('group1');
//                                var group_count = 0;
//                                jQuery(".catalog_colorbox_grouping").each(function(){
//                                        group_count++;
//                                });
//                                for(var i = 1; i <= group_count; i++){
                                        jQuery(".catalog_single_product_group_<?php echo $productArray->id; ?>").colorbox({rel:'catalog_single_product_group_<?php echo $productArray->id; ?>'});
//                                }
			
			jQuery(".callbacks").colorbox({
				onOpen:function(){ alert('onOpen: colorbox is about to open'); },
				onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
				onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
				onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
				onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
			});

			jQuery('.non-retina').colorbox({rel:'group5', transition:'none'})
			jQuery('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
			

			jQuery("#click").click(function(){ 
				jQuery('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
		});
	}	
</script>


	
	<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( !(is_plugin_active( 'lightbox/lightbox.php' ) )) { 
		?>
	<link href="<?php echo plugins_url('../style/colorbox-'.$paramssld2['light_box_style'].'.css', __FILE__);?>" rel="stylesheet" type="text/css" />
	<?php } ?>
		
	<?php
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( !(is_plugin_active( 'wp-lightbox-2/wp-lightbox-2.php' ) )) { ?>

	<?php } ?>        
        
<style type="text/css">
<?php if($paramssld2["ht_catalog_zoom_lens_size_fix"] == "true") { ?>

.zoomLens {
    width: <?php echo $paramssld2["ht_catalog_zoom_lens_width"]; ?>px !important;
    height: <?php echo $paramssld2["ht_catalog_zoom_lens_height"]; ?>px !important;
}

.zoomContainer {
    z-index: 10;
}

<?php } ?>

.huge_it_catalog_single_product_page {
	position: relative;
	width:98%; 
	margin:5px 0px 5px 0px;
	padding:2%;
	clear:both;
	overflow: hidden;
	/*border:<?php echo $paramssld['ht_single_product_border_width']; ?>px solid #<?php echo $paramssld['ht_single_product_border_color']; ?>;*/
	background:#<?php echo $paramssld['ht_single_product_background_color']; ?>;
}

.huge_it_catalog_single_product_page div.left-block {
	position:relative;
	float:left;
	width:40%;
}

.huge_it_catalog_single_product_page div.left-block .main-image-block {
	clear:both;
	width:<?php echo $paramssld['ht_single_product_mainimage_width']; ?>px; 
}

.for_zoom {
	max-width:100% !important;
}

.huge_it_catalog_single_product_page div.left-block .main-image-block img {
	margin:0px !important;
	padding:0px !important;
	width:<?php echo $paramssld['ht_single_product_mainimage_width']; ?>px !important; 
	height:auto;
}

.huge_it_catalog_single_product_page div.left-block .thumbs-block {
	position:relative;
	margin-top:10px;
}

.huge_it_catalog_single_product_page div.left-block .thumbs-block ul {
	width:100%; 
	height:auto;
	display:table;
	margin:0px;
	padding:0px;
	list-style:none;
}

.huge_it_catalog_single_product_page div.left-block .thumbs-block ul li {
	margin:0px 3px 0px 2px;
	padding:0px;
	width:<?php echo $paramssld['ht_single_product_thumbs_width']; ?>px; 
	height:<?php echo $paramssld['ht_single_product_thumbs_height']; ?>px; 
	float:left;
}

.huge_it_catalog_single_product_page div.left-block .thumbs-block ul li a {
	display:block;
	width:<?php echo $paramssld['ht_single_product_thumbs_width']; ?>px; 
	height:<?php echo $paramssld['ht_single_product_thumbs_height']; ?>px; 
}

.huge_it_catalog_single_product_page div.left-block .thumbs-block ul li a img {
	margin:0px !important;
	padding:0px !important;
	width:<?php echo $paramssld['ht_single_product_thumbs_width']; ?>px; 
	height:<?php echo $paramssld['ht_single_product_thumbs_height']; ?>px; 
}


/*######RIGHT BLOCK########*/

.huge_it_catalog_single_product_page .rating-and-share-blocks {
	font-size:<?php echo $paramssld['ht_single_product_rating_font_size']; ?>px !important;
	color:#<?php echo $paramssld['ht_single_product_rating_font_color']; ?> !important;
        /*padding-bottom: 2% !important;*/
}

.huge_it_catalog_single_product_page div.right-block {
	position:relative;
	float:left;
	width:58%;
	padding-left:2%;
}

.huge_it_catalog_single_product_page div.right-block > div {
	padding:3px 0px 3px 0px;
	<?php if($paramssld['ht_single_product_show_separator_lines']=="on") {?>
		background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center bottom repeat-x;
	<?php } ?>	
}

.huge_it_catalog_single_product_page div.right-block > div p {
	margin:0px;
        padding: 4px 0px 12px 0px;
}

.huge_it_catalog_single_product_page div.right-block > div:last-child {
	/*background:none;*/
        display: inline-block;
        width: 100%;
}

.huge_it_catalog_single_product_page div.right-block .title-block  {
	margin-top:3px;
}

.huge_it_catalog_single_product_page div.right-block .title-block h2 {
	margin:-10px 0px 0px 0px;
	padding:0px;
	font-weight:normal;
	font-size:<?php echo $paramssld['ht_single_product_title_font_size']; ?>px !important;
	line-height:<?php echo $paramssld['ht_single_product_title_font_size']+4; ?>px !important;
	color:#<?php echo $paramssld['ht_single_product_title_font_color']; ?>;
}

.huge_it_catalog_single_product_page .price-block {
	margin:0px;
	padding:10px 0px 5px 0px !important;
	font-weight:normal;
	font-size:<?php echo $paramssld['ht_single_product_price_font_size']; ?>px;
	color:#<?php echo $paramssld['ht_single_product_price_font_color']; ?>;
}

.huge_it_catalog_single_product_page .price-block .old-price {
	text-decoration:line-through;
	margin:0px;
	padding:0px;
	font-weight:normal;
	font-size:<?php echo $paramssld['ht_single_product_price_font_size']; ?>px;
	padding:7px 10px 7px 10px;
	margin:0px 10px 0px 0px;
	border-radius:5px;
	color:#<?php echo $paramssld['ht_single_product_background_color']; ?>;
	background:#<?php echo $paramssld['ht_single_product_price_font_color']; ?>;
}



.huge_it_catalog_single_product_page div.right-block .description-block p,.huge_it_catalog_single_product_page div.right-block .description-block * {
	margin:0px;
	padding:0px;
	font-weight:normal;
	font-size:<?php echo $paramssld['ht_single_product_description_font_size']; ?>px;
	color:#<?php echo $paramssld['ht_single_product_description_font_color']; ?>;
}


.huge_it_catalog_single_product_page div.right-block .description-block h1,
.huge_it_catalog_single_product_page div.right-block .description-block h2,
.huge_it_catalog_single_product_page div.right-block .description-block h3,
.huge_it_catalog_single_product_page div.right-block .description-block h4,
.huge_it_catalog_single_product_page div.right-block .description-block h5,
.huge_it_catalog_single_product_page div.right-block .description-block h6,
.huge_it_catalog_single_product_page div.right-block .description-block p, 
.huge_it_catalog_single_product_page div.right-block .description-block strong,
.huge_it_catalog_single_product_page div.right-block .description-block span {
	padding:2px !important;
	margin:0px !important;
}

.huge_it_catalog_single_product_page div.right-block .description-block ul,
.huge_it_catalog_single_product_page div.right-block .description-block li {
	padding:2px 0px 2px 5px;
	margin:0px 0px 0px 8px;
}



.huge_it_catalog_single_product_page .rating-block {
	margin:0px 10px 0px 0px;
	padding:0px;
	font-weight:normal;
	float:left;
        padding: 2% 0px;
}

.huge_it_catalog_single_product_page .rating-block .label {
	display:block;
	float:left;
	line-height:15px;
	margin-right: 5px;
}


.huge_it_catalog_single_product_page .right-block .rating-block ul.rating-stars  {
	background-image:url(<?php echo plugins_url('../images/stars.png', __FILE__); ?>);
	background-repeat: no-repeat;
	background-position: 0px <?php if($rating != 0) echo $rating * (-15); else echo 0; ?>px;
	line-height: 15px;
        height: 15px;
	width: 100px;
	display: table;
	margin: 0px !important;
        padding: 0px !important;
}

.huge_it_catalog_single_product_page .right-block .rating-stars li {
    float: left;
    list-style: none;
    height: 15px;
    width: 19px;
    margin: 0px !important;
    padding: 0px !important;
	
}

.huge_it_catalog_single_product_page .right-block .rating-stars li input[type='radio'] {
    display: block;
    opacity: 0;
    height: 19px;
    width: 16px;
    margin: 0px !important;
    padding: 0px !important;
    cursor:pointer;
}


.huge_it_catalog_single_product_page .right-block .share_buttons_block {
	padding: 0px;
        font-weight: normal;
        float: left;
        padding: 2% 0px;
        height: 21px;
}

.huge_it_catalog_single_product_page .right-block .share_buttons_block .label {
	display: block;
        float: left;
        line-height: 15px;
}

.huge_it_catalog_single_product_page .right-block .share_buttons_block ul {
	display: table;
        margin: -2px 0px 0px 40px !important;
        padding: 0px !important;
        list-style: none !important;
        height: 21px;
}

.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li {
	float:left;
	margin:0px 3px 0px 3px;
}

.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li.mail {margin:0px 7px 0px 0px;}

.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li a {
	display:block;
	width: 20px !important;
	height: 20px !important;
        padding: 0 !important;
        margin: 0 !important;
	cursor:pointer;
	text-indent:-9999px !important;
	background-image:url('<?php echo  plugins_url( '../images/share.buttons.png', __FILE__ ); ?>');
}

.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li.twitter {
	width: 20px;
        border-right: 1px solid #ccc;
        overflow: hidden;
        height: 20px;
        border-radius: 4px;
	background-image:url('<?php echo  plugins_url( '../images/share.buttons.png', __FILE__ ); ?>');
}

.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li.facebook a {background-position:left top; border: 1px solid #ccc; border-radius: 3px;width:20px !important;height:20px !important; }
.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li.twitter a {background-position:-20px top;}
.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li.pinterest a {background-position:-43px top; border: 1px solid #ccc; border-radius: 3px;width:20px !important;height:20px !important;}
.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li.mail a {background-position:right top;}

.huge_it_catalog_single_product_page .order_button {
    display: inline-block;
    margin: 10px;
}

.huge_it_catalog_single_product_page .order_button a {
  width: 100%;
  text-decoration: none;
  font-weight: bold;
  margin: 0px;
  padding: 0px;
  font-size: <?php echo $paramssld['ht_single_product_asc_seller_button_text_size']; ?>px;
  padding: 7px 10px 7px 10px;
  margin: 0px 10px 0px 0px;
  border-radius: 5px;
  color: #<?php echo $paramssld['ht_single_product_asc_seller_button_text_color']; ?>;
  background: #<?php echo $paramssld['ht_single_product_asc_seller_button_background_color']; ?>;
}
.huge_it_catalog_single_product_page .order_button a:hover {
  color: #<?php echo $paramssld['ht_single_product_asc_seller_button_text_hover_color']; ?>;
  background: #<?php echo $paramssld['ht_single_product_asc_seller_button_background_hover_color']; ?>;
}



/*###NAYAC CHI###*/

#catalog-order-popup-1 input{
    display: block;
    width: 100%;
    margin: 6px 0px 0px 0px;
}

#catalog-order-popup-1 #order_popup_submit {
    font-size: <?php echo $paramssld["ht_single_product_asc_seller_popup_button_text_size"]; ?>px !important;
    color: #<?php echo $paramssld["ht_single_product_asc_seller_popup_button_text_color"]; ?> !important;
    background: #<?php echo $paramssld["ht_single_product_asc_seller_popup_button_background_color"]; ?> !important;
    border: none;
}

#catalog-order-popup-1 #order_popup_submit:hover {
    background: #<?php echo $paramssld["ht_single_product_asc_seller_popup_button_background_hover_color"]; ?> !important;
}

#catalog-order-popup-1 .empty::-webkit-input-placeholder { color: #E22828; }
        
        
.modalDialog {
	position: fixed;
	font-family: Arial, Helvetica, sans-serif;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	/*background: rgba(0,0,0,0.8);*/
	z-index: 99999;
	opacity:0;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition: opacity 400ms ease-in;
	pointer-events: none;
}
.modalDialog:target {
	opacity:1;
	pointer-events: auto;
}

.modalDialog > div {
	width: 400px;
	position: relative;
	margin: 10% auto;
	padding: 5px 20px 13px 20px;
	border-radius: 10px;
	background: #fff;
	background: -moz-linear-gradient(#<?php echo $paramssld["ht_single_product_asc_seller_popup_background_1"]; ?>, #<?php echo $paramssld["ht_single_product_asc_seller_popup_background_2"]; ?>);
	background: -webkit-linear-gradient(#<?php echo $paramssld["ht_single_product_asc_seller_popup_background_1"]; ?>, #<?php echo $paramssld["ht_single_product_asc_seller_popup_background_2"]; ?>);
	background: -o-linear-gradient(#<?php echo $paramssld["ht_single_product_asc_seller_popup_background_1"]; ?>, #<?php echo $paramssld["ht_single_product_asc_seller_popup_background_2"]; ?>);
}



.catalog-order-popup-close {
        line-height: 25px;
        position: absolute;
        right: 5px;
        text-align: center;
        top: 7px;
        width: 24px;
        text-decoration: none !important;
        font-weight: bold;
        font-size: 30px;
        color: #<?php if($paramssld["ht_single_product_asc_seller_popup_close_style"] == "dark"){ echo "000"; } else { echo "fff"; } ?> !important;
}

.catalog-order-popup-close:hover { color: #<?php if($paramssld["ht_single_product_asc_seller_popup_close_style"] == "dark"){ echo "000"; } else { echo "fff"; } ?> !important; }



.zoomContainer {
    z-index: 99999;
}
.huge-it-catalog-bottom-block {
	clear:both;
	padding-top:20px;
}


.huge_it_catalog_view_tabs {
	margin:0px 0px -1px 0px !important;
	padding:0px !important;
	position:relative;
	list-style:none;
	height:30px;
	clear:both;
}

.huge_it_catalog_view_tabs > li  {
	float:left;
	margin:0px 5px 0px 0px;
        list-style-type: none;
}

.huge_it_catalog_view_tabs  > li > a,.huge_it_catalog_view_tabs  > li > a:link,.huge_it_catalog_view_tabs  > li > a:visited {
	display:block;
	height:29px;
	border-bottom:0px;
	text-decoration:none;
	outline:none;
        color: #<?php echo $paramssld["ht_single_product_tabs_font_color"]; ?> !important;
        <?php if($paramssld["ht_single_product_show_parameters"] == 'on' && $paramssld["ht_single_product_show_comments"] == 'on')
              { ?>
                background:url('<?php echo  plugins_url( '../images/tab.bg.png', __FILE__ ); ?>') left top repeat-x;
        <?php }
              else
              { ?>
                font-size: 20px;
                /*color: #000;*/
                margin: 0 !important;
                padding :0 !important;
        <?php }if($paramssld["ht_single_product_show_parameters"] == 'on' && $paramssld["ht_single_product_show_comments"] == 'on')
              { ?>
                border: 1px solid #<?php echo $paramssld['ht_single_product_tabs_border_color']; ?>;
                border-bottom: none;
                
        <?php } ?>
                padding:0px 10px 0px 6px;
}


.huge_it_catalog_view_tabs  > li > a:hover,.huge_it_catalog_view_tabs  > li > a:focus, .huge_it_catalog_view_tabs  > li > a:active {
	background:#<?php echo $paramssld['ht_single_product_background_color']; ?>;
}

.huge_it_catalog_view_tabs  > li.active > a {
	height:30px;
	margin:0px 0px -1px 0px !important;
	background:#<?php echo $paramssld['ht_single_product_background_color']; ?>;
}

.huge_it_catalog_view_tabs_contents {
<?php if($paramssld["ht_single_product_show_parameters"] == 'on' && $paramssld["ht_single_product_show_comments"] == 'on')
      { ?>
          border-top: 1px solid #<?php echo $paramssld['ht_single_product_tabs_border_color']; ?>;
<?php } ?>
	display:table;
	margin:0px !important;
	padding:10px 0% 10px 0% !important;
	width: 100%;
}

.huge_it_catalog_view_tabs_contents > li {
        margin-top: 1% !important;
	position:relative;
	width:100%;
	float:left;
	display:none;
}

.huge_it_catalog_view_tabs_contents > li.active  {
	display:block;
}


.huge_it_catalog_view_tabs_contents > li .params-list {
	padding:0px !important;
	margin:0px !important;
	width:100%;
}

.huge_it_catalog_view_tabs_contents > li .params-list li {
	float: left;
        display: block;
        width: 29%;
        height: 27px;
        margin: 0px 0% 10px 0px !important;
        padding: 3px 0px 0px 1% !important;
        background: url('<?php echo  plugins_url( '../images/params.bg.png', __FILE__ ); ?>') left top repeat-x;
}

.huge_it_catalog_view_tabs_contents > li .params-list li.parameter-block {
	color: #<?php echo $paramssld['ht_single_product_params_name_font_color']; ?>;
}


.huge_it_catalog_view_tabs_contents > li .params-list li.value-block {
	width:69%;
	background:url('<?php echo  plugins_url( '../images/params.bg.png', __FILE__ ); ?>') left bottom repeat-x;
        color: #<?php echo $paramssld['ht_single_product_params_values_font_color']; ?>;
}

/*UNCHECKED*/

/*.huge_it_catalog_view_tabs_contents > li  > div {
	position:relative;
	display:block;
	float:left;
	margin:10px 1% 25px 1%;
	padding:0px 1% 10px 1%;
	width:46%;
	background:#f9f9f9;
}*/
.huge_it_catalog_view_tabs_contents > li   div.has-background {background:#fff;}
.huge_it_catalog_view_tabs_contents > li   div.has-height > div {display:inline-block;}


.huge_it_catalog_view_tabs_contents > li  > div  h3 {
	display:block;
	text-align:center;
	margin:0px 0px 10px 0px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div {
	position:relative;
	clear:both;
	width:100%;
	/*height:60px;*/
	padding:5px 0px 0px 0px;
	margin:0px !important;
}

.huge_it_catalog_view_tabs_contents .reviews-block .review p {
	margin: 0px 0px 10px 0px !important;
        padding: 0px !important;
        line-height: 20px !important;
}

.huge_it_catalog_view_tabs_contents .reviews-block .review p:first-child {
	color: #<?php echo $paramssld["ht_single_product_comments_name_font_color"];?>;
}

.huge_it_catalog_view_tabs_contents .reviews-block .review p:last-child {
	color: #<?php echo $paramssld["ht_single_product_comments_content_font_color"];?>;
        margin-top: 3% !important;
}

.huge_it_catalog_view_tabs_contents .reviews-block .review {
	margin: 0px 0px 10px 0 !important;
        padding: 0px !important;
        line-height: 20px !important;
        border-bottom: 1px solid #<?php echo $paramssld["ht_single_product_tabs_border_color"]; ?>;
}

.huge_it_catalog_view_tabs_contents > li  > div > div label {
	display:inline-block;
	width:60%;
	padding:5px 0px 0px 2%;
	height:30px;
	float:left;
}



.huge_it_catalog_view_tabs_contents > li  > div > div div.slider-container {
	position:relative;
	display: inline-block;
	width: 145px;
	margin-left:-5px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div div.slider-container span {
	position:absolute;
	top:-3px;
	right:0px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div input[type='text'],.huge_it_catalog_view_tabs_contents > li  > div > div select {
	width:100px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div input[type='checkbox'] {
	margin:7px 0px 3px 0px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div.bws_position_table input {
	margin:3px 17px 3px 3px;
}



.huge_it_catalog_view_tabs_contents > li  > div {
	position:relative;
	display:block;
	float:left;
	/*margin:10px 1% 25px 1%;*/
	/*padding:0px 1% 10px 0%;*/
	width: 100%;
	/*background:#f9f9f9;*/
}
.huge_it_catalog_view_tabs_contents > li   div.has-background {background:#fff;}
.huge_it_catalog_view_tabs_contents > li   div.has-height > div {display:inline-block;}


.huge_it_catalog_view_tabs_contents > li  > div  h2 {
	display:block;
	text-align:center;
	margin:0px 0px 10px 0px;
}

/*.huge_it_catalog_view_tabs_contents > li  > div > div {
	position:relative;
	clear:both;
	width:100%;
	height:35px;
	padding:5px 0px 0px 0px;
	margin:0px !important;
}*/

.huge_it_catalog_view_tabs_contents > li  > div > div label {
	display:inline-block;
	width:60%;
	padding:5px 0px 0px 2%;
	height:30px;
	float:left;
}


.huge_it_catalog_view_tabs_contents > li  > div > div div.slider-container {
	position:relative;
	display: inline-block;
	width: 145px;
	margin-left:-5px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div div.slider-container span {
	position:absolute;
	top:-3px;
	right:0px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div input[type='text'],.huge_it_catalog_view_tabs_contents > li  > div > div select {
	width:100px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div input[type='checkbox'] {
	margin:7px 0px 3px 0px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div.bws_position_table input {
	margin:3px 17px 3px 3px;
}

.huge_it_catalog_view_tabs_contents div {
	width: 100%;
}

.huge_it_catalog_view_tabs li a {
	color: #<?php echo $paramssld["ht_single_product_tabs_font_color"];?> !important;
      
}

.huge_it_catalog_view_tabs li a:hover {
	color: #<?php echo $paramssld["ht_single_product_tabs_font_hover_color"];?>  !important;
 
}

.huge_it_catalog_view_tabs_contents .options-block > li:first-child {
	color: #<?php echo $paramssld["ht_single_product_params_tab_words_font_color"];?>;
        font-size: 15px;
        background-color: #<?php echo $paramssld["ht_single_product_background_color"];?>;
        overflow: hidden;
}

.huge_it_catalog_view_tabs_contents .options-block .review {
	display: inline;
}

.huge_it_catalog_view_tabs_contents .options-block li div ,.huge_it_catalog_view_tabs_contents .options-block li:last-child {
	color: #<?php echo $paramssld["ht_single_product_comments_tab_words_font_color"];?>;
        font-size: 15px;
/*        background-color: #<?php echo $paramssld["ht_single_product_background_color"];?>;*/
        /*overflow: hidden;*/
}

.huge_it_catalog_view_tabs_contents #catalog-view-options-1_<?php echo $productArray->id; ?> {
    
}

.huge_it_catalog_single_product_page .write-rate-block form {
    margin: 0;
    padding: 0;
}

.huge_it_catalog_single_product_page .write-rate-block p {
    margin: 0;
    padding: 0;
}

.huge_it_catalog_single_product_page .write-rate-block input, .huge_it_catalog_single_product_page .write-rate-block label {
	margin: 0%;
        margin-bottom: 10px;
        display: block;
        width: 100%;
}

.huge_it_catalog_single_product_page .write-rate-block input,.huge_it_catalog_single_product_page .write-rate-block textarea, .huge_it_catalog_single_product_page .write-rate-block label.rating-label {
	margin: 0%;
        display: block;
        width: 100%;
}

.huge_it_catalog_single_product_page .write-rate-block textarea {
    min-height: 100px;
    width: 100%;
}


.huge_it_catalog_single_product_page .write-rate-block #comments_submit {
    font-size: <?php echo $paramssld["ht_single_product_comments_submit_button_text_font_size"];?>px;
    color: #<?php echo $paramssld["ht_single_product_comments_submit_button_text_font_color"];?>;
    background: #<?php echo $paramssld["ht_single_product_comments_submit_button_text_background_color"];?>;
    background-color: #<?php echo $paramssld["ht_single_product_comments_submit_button_text_background_color"];?>;
    border: none;
    display: block;
    width: 100%;
}
.huge_it_catalog_single_product_page .write-rate-block #comments_submit:hover {
    color: #<?php echo $paramssld["ht_single_product_comments_submit_button_text_font_hover_color"];?>;
    background-color: #<?php echo $paramssld["ht_single_product_comments_submit_button_text_background_hover_olor"];?>;
    border: none;
}

.huge_it_catalog_single_product_page .write-rate-block .empty {
    border: 1px solid #ff0000;
}

/*
.huge_it_catalog_single_product_page .button-block {
	position:relative;
}

.huge_it_catalog_single_product_page div.right-block .button-block a,.huge_it_catalog_single_product_page div.right-block .button-block a:link,.huge_it_catalog_single_product_page div.right-block .button-block a:visited {
	position:relative;
	display:inline-block;
	padding:6px 12px;
	background:#<?php echo $paramssld["ht_view3_linkbutton_background_color"];?>;
	color:#<?php echo $paramssld["ht_view3_linkbutton_color"];?>;
	font-size:<?php echo $paramssld["ht_view3_linkbutton_font_size"];?>;
	text-decoration:none;
}

.huge_it_catalog_single_product_page div.right-block .button-block a:hover,.pupup-elemen.huge_it_catalog_single_product_page div.right-block .button-block a:focus,.huge_it_catalog_single_product_page div.right-block .button-block a:active {
	background:#<?php echo $paramssld["ht_view3_linkbutton_background_hover_color"];?>;
	color:#<?php echo $paramssld["ht_view3_linkbutton_font_hover_color"];?>;
}
*/




/*  ################### MOBILE ################  */



@media only screen and (max-width: 640px) {
    
/*  ### responsive tabs ###  */
	
        .huge_it_catalog_view_tabs {
            display: none;
        }
        
        #catalog-view-options-0_<?php echo $productArray->id; ?> {
            display: block !important;
        }
        #catalog-view-options-1_<?php echo $productArray->id; ?> {
            display: block !important;
        }
        #catalog-view-options-0_<?php echo $productArray->id; ?> .title_for_mobile {
            display: block !important;
        }
        #catalog-view-options-1_<?php echo $productArray->id; ?> .title_for_mobile {
            display: block !important;
        }
        
/*  ### responsive tabs  OVER ###  */   
        


	.huge_it_catalog_single_product_page > div {
		display:block;
		width:100%;
		clear:both;
	}

	.huge_it_catalog_single_product_page div.left-block,.huge_it_catalog_single_product_page div.right-block {
		clear:both;
		float:none;
		width:100%;
		margin:10px 0px 10px 0px;
	}

	.huge_it_catalog_single_product_page div.left-block .main-image-block {
		clear:both;
		width:100%; 
	}

	.huge_it_catalog_single_product_page div.left-block .main-image-block img {
		margin:0px !important;
		padding:0px !important;
		width:100% !important;  
		height:auto;
	}

	.huge_it_catalog_single_product_page div.left-block .thumbs-block ul {
		width:100%; 
	}
        
        
        
}
.zoomContainer {
    z-index: 10;
}

</style>
      
<section id="huge_it_catalog_content_<?php echo $productArray->id; ?>" class="huge_it_catalog_single_product_page">
    <div class="huge_it_catalog_container">
		<div class="left-block">
			<div class="main-image-block for_zoom">
				<?php $imgurl=explode(";",$productArray->image_url); ?>
				<?php 	if($productArray->image_url != ';'){ ?>
					<a href="<?php echo $imgurl[0]; ?>" class="catalog_single_product_group_<?php echo $productArray->id; ?>"><img id="wd-cl-img<?php echo $productArray->id; ?>"src="<?php echo $imgurl[0]; ?>"></a>
				<?php } else { ?>
					  <a href="<?php echo $imgurl[0]; ?>"><img id="wd-cl-img<?php echo $key; ?>" src="images/noimage.jpg"></a>
				<?php
					}
				?>
			</div>
			<?php
			if($paramssld["ht_single_product_show_thumbs"] == 'on')
			{
			?>
                            <div class="thumbs-block">
                                    <ul class="thumbs-list">
                                      <?php
                                      $imgurl=explode(";",$productArray->image_url);
                                      array_pop($imgurl);
                                      array_shift($imgurl);

                                      foreach($imgurl as $key=>$img){
                                      ?>
                                              <li><a href="<?php echo $img;?>" class="catalog_single_product_group_<?php echo $productArray->id; ?>"><img src="<?php echo $img; ?>"></a></li>
                                      <?php
                                      }
                                      ?>
                                    </ul>
                            </div>
			<?php
			}
			?>
		</div>
		<div class="right-block">
			
			
			<?php if($productArray->name!=''){?>
				<div class="title-block"><h2><?php echo $productArray->name; ?></h2></div>
			<?php } ?>
			<?php
                        
                            if($paramssld["ht_single_product_show_price"] == 'on' && $productArray->price != "")
                            {  ?>
                                <div class="price-block">
                                    <p>Price :
                                        <span class="old-price" <?php if($productArray->market_price == '') { echo "style='text-decoration: none !important;'"; } ?>> <?php echo $productArray->price; ?> </span>
                                        <?php
                                                if($productArray->market_price != ''){ ?>
                                                    <span class="discont-price"><?php echo $productArray->market_price; ?></span>
                                        <?php   } ?>
                                    </p>
                                </div>
                     <?php  }
			
			if($paramssld["ht_single_product_show_description"] == 'on')
			{
				if($productArray->description!='') { ?>
					<div class="description-block">
						<p><?php echo $productArray->description; ?></p>
					</div>
				<?php }
			}
			
                        if($paramssld["ht_single_product_show_rating"] == 'on')
                        {  ?>
                        <div class="rating-and-share-blocks">
                            <div class="rating-block">
				<span class="label"><?php echo $paramssld["ht_single_product_rating_text"]; ?>:</span>
				<ul class="rating-stars">
					<li><input type="radio" name="" value="1"></li>
					<li><input type="radio" name="" value="2"></li>
					<li><input type="radio" name="" value="3"></li>
					<li><input type="radio" name="" value="4"></li>
					<li><input type="radio" name="" value="5"></li>
				</ul>
				<?php 
                                        $path_site = plugins_url("/../images", __FILE__);
                                        $pageTitle = get_the_title();
                                        if($productArray->image_url != ';'){ $pintimage[0] = $productArray->image_url; }
                                        else { $pintimage[0] = $path_site.'/noimage.jpg'; }
//                                        if (has_post_thumbnail( $post->ID ) ){ ?>
                                            <?php // $pintimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                            <?php // } else {
//                                            $pintimage[0] = $path_site.'/noimage.png';
//                                        }
                                        
					$spam = 0;
                                        
					foreach($spamReviewsArray as $spamReviews) {
                                            if($spamReviewsz == $_SERVER['SERVER_ADDR']){ $spam = 1; }
                                        }
				?>
				<input type="hidden" name="spam" class="huge_it_catalog_spam" value="<?php echo $spam; ?>" />
				<input type="hidden" name="product_id" class="huge_it_catalog_product_id" value="<?php echo $productArray->id; ?>" />
				<input type="hidden" name="ip" class="huge_it_catalog_product_ip" value="<?php echo $_SERVER['SERVER_ADDR']; ?>" />
                            </div>
                            
                        <?php }
                        
                        if($paramssld["ht_single_product_show_share_buttons"] == 'on')
                        {  ?>
                            <div class="share_buttons_block">
				<span class="label">Share:</span>
				<ul>
<!--					<li class="mail">
                                            <a href="mailto:Insert%20Link?subject=I%20wanted%20to%20share%20this%20post%20with%20you%20from%20<?php bloginfo('name'); ?>&body=<?php the_permalink(); ?>" >Share via Email</a>
                                        </li>-->
					<li class="facebook"><a href=""  target="_blank" onclick="javascript:void window.open('<?php echo "https://www.facebook.com/sharer/sharer.php?u=".$myPageLink.""; ?>','1410949501326','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">Facebook</a></li>
					<li class="twitter" style="">
                                            
                                            <!--<a href="https://twitter.com/share" class="twitter-share-button" data-dnt="true" data-count="none" data-via="twitterdev" onclick="window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src='https://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,'script','twitter-wjs'));"> Tweet</a>-->
                                            
                                            <a class="twitter-share-button" href="https://twitter.com/share" data-count="none" data-size="small" >Tweet</a>
                                         <!--<a href="#"  target="_blank" onclick="javascript:void window.open('<?php // echo "https://twitter.com/intent/tweet?url=".$myPageLink."&text=".$pageTitle ?>','1410949501326','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');location.href='<?php echo myPageLink; ?>'; return false;">Twitter</a></li>-->
					<li class="pinterest"  style="width: 20px; height: 20px;">
                                            <a style="width: 20px; height: 20px;" href="#" target="_blank" onclick="javascript:void window.open('http://www.pinterest.com/pin/create/button/?url=<?php echo $myPageLink; ?>&media=<?php echo $pintimage[0]; ?>&description=<?php echo $pageTitle; ?>','1410949501326','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">Pinterest</a>
                                        </li>
				</ul>
                            </div>
                            
                  <?php } ?>
                                <?php $product_page_link = get_permalink()."&single_prod_id=$productArray->id&asc_seller"; ?>
                            <div class="order_button" style="">
                                <a href="#catalog-order-popup-1" style="display: none;"><span class="label"><?php echo $paramssld['ht_single_product_asc_seller_button_text']; ?></span></a>
                            </div>
                                
                                    <div id="catalog-order-popup-1" class="modalDialog">
                                        <div>
                                                <a href="#catalog-order-popup-close" title="Close" class="catalog-order-popup-close">X</a>
                                                <h2><?php echo $paramssld['ht_single_product_asc_to_seller_text']; ?></h2>
                                                <label><input type="text" name="asc_seller_name" class="asc_seller_name" placeholder="<?php echo $paramssld["ht_single_product_your_name_text"]; ?>" /></label>
                                                <label><input type="text" name="asc_seller_mail" class="asc_seller_mail" placeholder="<?php echo $paramssld["ht_single_product_your_mail_text"]; ?>"  /></label>
                                                <label><input type="text" name="asc_seller_phone" class="asc_seller_phone" placeholder="<?php echo $paramssld["ht_single_product_your_phone_text"]; ?>" /></label>
                                                <label><input type="text" name="asc_seller_massage" class="asc_seller_massage" placeholder="<?php echo $paramssld["ht_single_product_your_message_text"]; ?>" /></label>
                                                <label>
                                                    <input type="text" class="captchaInputValue" placeholder="<?php echo $captchaFirstNum." + ".$captchaSecondNum." = ?"; ?>" autocomplete="off" />
                                                    <p class="invalid"></p>
                                                </label>
                                                <input type="hidden" name="asc_seller_product_id" class="asc_seller_product_id" value="<?php echo $productArray->id; ?>" />
                                                <input type="hidden" name="asc_seller_spam" class="asc_seller_spam" value="<?php echo $spam; ?>" />
                                                <input type="hidden" name="asc_seller_ip" class="huge_it_catalog_product_ip" value="<?php echo $_SERVER['SERVER_ADDR']; ?>" />
                                                <input type="submit" name="order_popup_submit" id="order_popup_submit" value="<?php echo $paramssld["ht_single_product_asc_seller_popup_button_text"];?>" />
                                        </div>
                                    </div>
                        </div>
			
		</div>
		
		
    <div class="huge-it-catalog-bottom-block" style="display: block;">
            <ul class="huge_it_catalog_view_tabs">
                <?php if($paramssld["ht_single_product_show_parameters"] == 'on'){ ?>
                    <li class="active" >
                        <a href="#catalog-view-options-0_<?php echo $productArray->id; ?>">
                            Parameters
                        </a>
                    </li>
                <?php } ?>
                <?php if($paramssld["ht_single_product_show_comments"] == 'on'){ ?>
                        <li>
                            <a href="#catalog-view-options-1_<?php echo $productArray->id; ?>">
                                Comments (<?php echo count($reviewsArray) - count($spamReviewsArray); ?>)
                            </a>
                        </li>
              <?php } ?>
            </ul>
            <ul class="huge_it_catalog_view_tabs_contents">
                <?php if($paramssld["ht_single_product_show_parameters"] == 'on'){ ?>
                    <li id="catalog-view-options-0_<?php echo $productArray->id; ?>" class="active" >
                        <h4 style="display: none;" class="title_for_mobile">Parameters</h4>
                            <ul class="params-list">
                            <?php
//                            var_dump($allParamsAndChildsInArray);exit;
                                if($allParamsAndChildsInArray != ""){
                                    foreach ($allParamsAndChildsInArray as $singleParamAndChild) {
                                        if(!empty($singleParamAndChild)){
                                            $separateParamAndChildsInArray = explode("@", $singleParamAndChild);
                                            foreach ($separateParamAndChildsInArray as $paramKey => $separateParamAndChild) {
//                                                var_dump($separateParamAndChild);
                                                if($paramKey == 0){
                                                    if(count($separateParamAndChildsInArray) == 1){
//                                                        echo "param/datark child<br>";
                                                        echo "<li class='parameter-block'>".$separateParamAndChild." : </li>";
                                                        echo "<li class='value-block'></li>";
                                                    }
                                                    else{
                                                        echo "<li class='parameter-block'>".$separateParamAndChild." : </li>";
                                                    }
                                                }
                                                else{
                                                        if(count($separateParamAndChildsInArray) != ($paramKey + 1)){
                                                                echo $separateParamAndChild.", ";
//                                                                if(count($separateParamAndChildsInArray == 1)) echo '<li class="value-block"></li>';
                                                        }
                                                        else {
                                                                $separateParamAndChild = htmlspecialchars_decode($separateParamAndChild);
                                                                $separateParamAndChild = str_replace("thisisat", "@", $separateParamAndChild);
                                                                echo '<li class="value-block">'.$separateParamAndChild.'</li>';
                                                        }
                                                }
                                            }
                                        }
                                    }
                                }
                                else { echo "<br>No Params"; }
                            ?>
                            </ul>
                      </li>
                      <?php } ?>
                      <?php if($paramssld["ht_single_product_show_comments"] == 'on'){ ?>
                      <li id="catalog-view-options-1_<?php echo $productArray->id; ?>"  <?php if($paramssld["ht_single_product_show_parameters"] == 'off'){ echo "class='active'"; } ?>>
                          <h4 style="display: none;" class="title_for_mobile">Comments</h4>
                          <div class="reviews-block"><?php
                            if(!empty($reviewsArray)){
                              if($reviewsArray[0]->id == ""){
                                      echo "<br>no comments";
                              }
                              else{
                                      foreach ($reviewsArray as $review) { ?>
                                            <div class="review">
                                               <?php if($review->spam == 0) echo "<p style='font-weight: bold;' >".$review->name."</p><p>".$review->content."</p>"; ?>
                                            </div>
                       <?php          }
                                  }
                            } ?>

                          </div>
                          <div class = "write-rate-block">
                              <form action="<?php echo wp_get_referer(); ?>" method="POST" name="comments-form">
                                    <label><?php echo $paramssld["ht_single_product_your_name_text"]; ?>: 
                                        <?php if ($user_level > 9) { ?> <input type="text" name="comments_name" id="comments_name" value="<?php echo ' '.$user_info->user_login; ?>"/> <?php } else { ?>
                                        <input type="text" name="comments_name" id="comments_name"/> <?php } ?>
                                    </label>
                                    <label><?php echo $paramssld["ht_single_product_your_Comment_text"]; ?>:
                                        <textarea name="author_comment" id="author_comment" value="" ></textarea>
                                    </label>
                                    <label>
                                        <?php echo $paramssld["ht_single_product_captcha_text"]; ?>
                                        <input type="text" id="captchaInputValue" placeholder="<?php echo $captchaFirstNum." + ".$captchaSecondNum." = ?"; ?>" autocomplete="off" />
                                        <p class="invalid"></p>
                                    </label>
                                    <input type="submit" name="comments_submit" id="comments_submit" value="<?php echo $paramssld["ht_single_product_comments_submit_button_text"];?>" />
                              </form>
                          </div>
                    </li>
                    <?php } ?>
            </ul>
    </div>
	<div class="clear"></div>
	</div>
</section>
  
<script>
    
window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return t;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
        // bind filter on select change
jQuery(document).ready(function(){
    jQuery('#huge_it_catalog_filters ul li').click(function() {
      // get filter value from option value
      var filterValue = jQuery(this).attr('rel');
      // use filterFn if matches value
      filterValue = filterValue;//filterFns[ filterValue ] || 
      $container.hugeitmicro({ filter: filterValue });
    });
    
});

jQuery(document).ready(function($) {
    jQuery('.ask_seller_popup').click(function() {
        var NWin = window.open(jQuery(this).prop('href'), '', 'scrollbars=1,height=400,width=400');
        if (window.focus)
        {
          NWin.focus();
        }
        return false;
    });
});
  
jQuery(document).ready(function () {
	jQuery('.huge_it_catalog_view_tabs > li > a').click(function(){
//            alert("ok");
		jQuery('.huge_it_catalog_view_tabs > li').removeClass('active');
		jQuery(this).parent().addClass('active');
		jQuery('.huge_it_catalog_view_tabs_contents > li').removeClass('active');
		var liID=jQuery(this).attr('href');
		jQuery(liID).addClass('active');
                return false;
	});
        
        jQuery('#comments_submit').click(function(){
//            if(jQuery("#captchaInputValue").val() == <?php echo $captcha_val; ?>){
                var comments_name = jQuery("#comments_name").val();
                var author_comment = jQuery("#author_comment").val();
                var ip = jQuery(".huge_it_catalog_product_ip").val();
                var spam =  jQuery(".huge_it_catalog_spam").val();
                var product_id =  jQuery(".huge_it_catalog_product_id").val();
                var captcha_val = jQuery("#captchaInputValue").val();
                if(comments_name == "" || author_comment == "" || captcha_val == ""){
                    if(comments_name == ""){ jQuery("#comments_name").addClass("empty"); }
                    else{ jQuery("#comments_name").removeClass("empty"); }
                    
                    if(jQuery("#author_comment").val() == ""){ jQuery("#author_comment").addClass("empty"); }
                    else{ jQuery("#author_comment").removeClass("empty"); }
                    
                    if(captcha_val == ""){ jQuery("#captchaInputValue").addClass("empty"); }
                    else{ jQuery("#captchaInputValue").removeClass("empty"); }
                    //alert("empty field");
                    return false;
                }
                else{
                    jQuery("#comments_name,#author_comment,#captchaInputValue").removeClass("empty");
//                   alert(comments_name + " " + author_comment+ " " + ip + " " + spam + " " + product_id);
    //            return false;
                var data = {
                    action: 'my_action',
                    post: 'applyproductcommentfromuser',
                    comments_name: comments_name,
                    spam: spam,
                    ip: ip,
                    product_id: product_id,
                    author_comment: author_comment,
                    captcha_val: captcha_val
                };

                jQuery.post("<?php echo admin_url('admin-ajax.php'); ?>", data, function(response) {
                    response = JSON.parse(response);      //       alert(response.captcha1 + " " + response.captcha2);
                    if(response.index == 1){
                        if( jQuery(".reviews-block .review").text().length == 0 ) { jQuery(".reviews-block").text(""); }
                        jQuery(".reviews-block").append("<div class='review'><p style='font-weight: bold;'>"+ comments_name +"</p><p>" + author_comment + "</p></div>");
                        jQuery("#comments_name").removeAttr('value');
                        jQuery("#author_comment").removeAttr('value');
                        jQuery("#captchaInputValue").removeAttr('value');
                        jQuery("#captchaInputValue").attr("placeholder",response.captcha1 +" + "+response.captcha2 + " = ?");
                        jQuery("#captchaInputValue").parent().find(".invalid").text("");
                    }
                    if(response.index == 2){
                        jQuery("#captchaInputValue").parent().find(".invalid").text("<?php echo $paramssld["ht_single_product_invalid_captcha_text"]; ?>");
                    }
                });
                return false;
                }
//            }
//            else{
//                jQuery("#captchaInputValue").parent().find(".invalid").text("<?php echo $paramssld["ht_single_product_invalid_captcha_text"]; ?>");
////                alert("invalid");
//                return false;
//            }
        });
        
        jQuery('#order_popup_submit').click(function(){
                var user_name       = jQuery("#catalog-order-popup-1 .asc_seller_name").val();
                var user_mail       = jQuery("#catalog-order-popup-1 .asc_seller_mail").val();
                var user_phone      = jQuery("#catalog-order-popup-1 .asc_seller_phone").val();
                var user_massage    = jQuery("#catalog-order-popup-1 .asc_seller_massage").val();
                var user_product_id = jQuery("#catalog-order-popup-1 .asc_seller_product_id").val();
                var user_spam       = jQuery("#catalog-order-popup-1 .asc_seller_spam").val();
                var captcha_val     = jQuery("#catalog-order-popup-1 .captchaInputValue").val();
                var user_ip         = jQuery("#catalog-order-popup-1 .huge_it_catalog_product_ip").val();
                var emailCheck=/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i;
                    if(user_name == "" || user_mail == ""  || user_phone == ""  || user_massage == ""  || user_product_id == "" || captcha_val == ""){
//                    alert("empty field");
                    jQuery("#catalog-order-popup-1 input[type=text]").each(function(){
                        if(!jQuery(this).val()){        //        alert(jQuery(this).attr("name"));
                            jQuery(this).addClass("empty");
                        }
                        else{ jQuery(this).removeClass("empty"); }
                    });
                    return false;
                    }
                    else{
                        if(!(emailCheck.test(user_mail))){
                            alert("invalid email");return false;
                        }
                        else{
                            
    //                   alert(user_name + " " + user_mail+ " " + user_phone + " " + user_massage + " " + user_product_id + " " + captcha_val + " " + user_spam + " " + user_ip);
                        var data = {
                            action: 'my_action',
                            post: 'applyproductascsellerfromuser',
                            user_name: user_name,
                            user_mail: user_mail,
                            user_phone: user_phone,
                            user_product_id: user_product_id,
                            user_massage: user_massage,
                            user_spam: user_spam,
                            user_ip: user_ip,
                            captcha_val: captcha_val
                        };

                        jQuery.post("<?php echo admin_url('admin-ajax.php'); ?>", data, function(response) {    //    alert(response);
                            response = JSON.parse(response); 
                            if(response.index == 1){
                                if( jQuery(".reviews-block .review").text().length == 0 ) { jQuery(".reviews-block").text(""); }
                                jQuery("#catalog-order-popup-1 .asc_seller_name").removeAttr('value');
                                jQuery("#catalog-order-popup-1 .asc_seller_mail").removeAttr('value');
                                jQuery("#catalog-order-popup-1 .asc_seller_phone").removeAttr('value');
                                jQuery("#catalog-order-popup-1 .asc_seller_massage").removeAttr('value');
                                jQuery("#catalog-order-popup-1 .captchaInputValue").val("").attr("placeholder",response.captcha1 +" + "+response.captcha2 + " = ?").parent().find(".invalid").text("");
                                jQuery("#catalog-order-popup-1 input[type=text]").each(function(){
                                    jQuery(this).removeClass("empty");
                                });
    //                            jQuery(".modalDialog ").find("a.catalog-order-popup-close").click();
                            }
                            if(response.index == 2){
                                jQuery("#catalog-order-popup-1").find(".invalid").text("<?php echo $paramssld["ht_single_product_invalid_captcha_text"]; ?>");
                            }
                        });
                        return false;
                    }
    //            }
    //            else{
    //                jQuery("#captchaInputValue").parent().find(".invalid").text("<?php echo $paramssld["ht_single_product_invalid_captcha_text"]; ?>");
    ////                alert("invalid");
    //                return false;
    //            }
                
                        }
                        
        });
            
            jQuery(".rating-stars li").hover(function() {
                var rate_val = jQuery(this).find("input").val();
                var background_margin = (rate_val * 15);
				
                jQuery(this).parent().css({
                    'background-position' : '0px -' + background_margin + 'px'
                });
           },function(){
                    if(jQuery(this).parent().hasClass('rated')){
                            var rateis=jQuery(this).parent().attr('data-rateis')*15;
                            jQuery(this).parent().css({
                                    'background-position' : '0px -'+rateis+'px'
                            });
                    }else{
                       jQuery(this).parent().css({
                                    'background-position' : '0px  <?php echo $rating * (-15) ; ?>px'
                            });
                    }
            });
           
           
           jQuery(".rating-stars li input[type='radio']").click(function(){
               var strthis=jQuery(this);
               var rate_val = jQuery(this).val();
               var ip = jQuery(".huge_it_catalog_product_ip").val();
               var spam =  jQuery(".huge_it_catalog_spam").val();
               var product_id =  jQuery(".huge_it_catalog_product_id").val();
               var data = {
                    action: 'my_action',
                    post: 'productratingfromuser',
                    spam: spam,
                    ip: ip,
                    product_id: product_id,
                    rate_val: rate_val
               };
               
//               alert(ip + " " + spam + " " + product_id); return false;
               
               jQuery.post("<?php echo admin_url('admin-ajax.php'); ?>", data, function(response) {     //    alert(response.index);
                    response = JSON.parse(response);
//                    alert(response.index);
//                    alert(response.rating);
                    if(response.index == 1){
                        var newrate = response.rating;      //      alert(newrate);
                        jQuery(strthis).parent().parent().addClass('rated').attr('data-rateis',newrate);
                        jQuery(strthis).parent().parent().css({
                                     'background-position' : '0px -' + newrate*15 + 'px'
                        });
                        
                    }
               });
           });
           
});
</script>
  
<?php  } ?>


    <?php

function album_front_end($paramssld, $catalogsFromAlbumArray)
{  //  var_dump($catalogsFromAlbumArray);
     global $wpdb;
     ob_start();
	$albumID=$catalogsFromAlbumArray[0]->id;
	$catalogeffect=$catalogsFromAlbumArray[0]->catalog_album_view_mode;
//        $catalogCats=$catalog[0]->categories;
//        $catalogShowSorting=$catalog[0]->ht_show_sorting;
//        $catalogShowFiltering=$catalog[0]->ht_show_filtering;
        
$paramssld["ht_view0_togglebutton_style"] = "dark";
        $paramssld["ht_view0_show_separator_lines"] = "on";
        $paramssld["ht_view0_linkbutton_text"] = "View Product";
        $paramssld["ht_view0_show_linkbutton"] = "on";
        $paramssld["ht_view0_linkbutton_background_hover_color"] = "df2e1b";
        $paramssld["ht_view0_linkbutton_background_color"] = "e74c3c";
        $paramssld["ht_view0_linkbutton_font_hover_color"] = "ffffff";
        $paramssld["ht_view0_linkbutton_color"] = "ffffff";
        $paramssld["ht_view0_linkbutton_font_size"] = "14";
        $paramssld["ht_view0_description_color"] = "5b5b5b";
        $paramssld["ht_view0_description_font_size"] = "14";
        $paramssld["ht_view0_show_description"] = "on";
        $paramssld["ht_view0_thumbs_width"] = "75";
        $paramssld["ht_view0_thumbs_position"] = "before";
        $paramssld["ht_view0_show_thumbs"] = "on";
        $paramssld["ht_view0_title_font_size"] = "15";
        $paramssld["ht_view0_title_font_color"] = "555555";
        $paramssld["ht_view0_element_border_width"] = "1";
        $paramssld["ht_view0_element_border_color"] = "D0D0D0";
        $paramssld["ht_view0_element_background_color"] = "f7f7f7";
        $paramssld["ht_view0_block_width"] = "275";
        $paramssld["ht_view0_block_height"] = "320";

        $paramssld["ht_view1_show_separator_lines"] = "on";
        $paramssld["ht_view1_linkbutton_text"] = "View Product";
        $paramssld["ht_view1_show_linkbutton"] = "on";
        $paramssld["ht_view1_linkbutton_background_hover_color"] = "df2e1b";
        $paramssld["ht_view1_linkbutton_background_color"] = "e74c3c";
        $paramssld["ht_view1_linkbutton_font_hover_color"] = "ffffff";
        $paramssld["ht_view1_linkbutton_color"] = "ffffff";
        $paramssld["ht_view1_linkbutton_font_size"] = "14";
        $paramssld["ht_view1_description_color"] = "5b5b5b";
        $paramssld["ht_view1_description_font_size"] = "14";
        $paramssld["ht_view1_show_description"] = "on";
        $paramssld["ht_view1_thumbs_width"] = "75";
        $paramssld["ht_view1_thumbs_position"] = "before";
        $paramssld["ht_view1_show_thumbs"] = "on";
        $paramssld["ht_view1_title_font_size"] = "15";
        $paramssld["ht_view1_title_font_color"] = "555555";
        $paramssld["ht_view1_element_border_width"] = "1";
        $paramssld["ht_view1_element_border_color"] = "D0D0D0";
        $paramssld["ht_view1_element_background_color"] = "f7f7f7";
        $paramssld["ht_view1_block_width"] = "275";

        $paramssld["ht_view2_element_linkbutton_text"] = "View Product";
        $paramssld["ht_view2_element_show_linkbutton"] = "on";
        $paramssld["ht_view2_element_linkbutton_color"] = "ffffff";
        $paramssld["ht_view2_element_linkbutton_font_size"] = "14";
        $paramssld["ht_view2_element_linkbutton_background_color"] = "2ea2cd";
        $paramssld["ht_view2_show_popup_linkbutton"] = "on";
        $paramssld["ht_view2_popup_linkbutton_text"] = "View Product";
        $paramssld["ht_view2_popup_linkbutton_background_hover_color"] = "0074a2";
        $paramssld["ht_view2_popup_linkbutton_background_color"] = "2ea2cd";
        $paramssld["ht_view2_popup_linkbutton_font_hover_color"] = "ffffff";
        $paramssld["ht_view2_popup_linkbutton_color"] = "ffffff";
        $paramssld["ht_view2_popup_linkbutton_font_size"] = "14";
        $paramssld["ht_view2_description_color"] = "222222";
        $paramssld["ht_view2_description_font_size"] = "14";
        $paramssld["ht_view2_show_description"] = "on";
        $paramssld["ht_view2_thumbs_width"] = "75";
        $paramssld["ht_view2_thumbs_height"] = "75";
        $paramssld["ht_view2_thumbs_position"] = "before";
        $paramssld["ht_view2_show_thumbs"] = "on";
        $paramssld["ht_view2_popup_background_color"] = "FFFFFF";
        $paramssld["ht_view2_popup_overlay_color"] = "000000";
        $paramssld["ht_view2_popup_overlay_transparency_color"] = "70";
        $paramssld["ht_view2_popup_closebutton_style"] = "dark";
        $paramssld["ht_view2_show_separator_lines"] = "on";
        $paramssld["ht_view2_show_popup_title"] = "on";
        $paramssld["ht_view2_element_title_font_size"] = "18";
        $paramssld["ht_view2_element_title_font_color"] = "222222";
        $paramssld["ht_view2_popup_title_font_size"] = "18";
        $paramssld["ht_view2_popup_title_font_color"] = "222222";
        $paramssld["ht_view2_element_overlay_color"] = "FFFFFF";
        $paramssld["ht_view2_element_overlay_transparency"] = "70";
        $paramssld["ht_view2_zoombutton_style"] = "light";
        $paramssld["ht_view2_element_border_width"] = "1";
        $paramssld["ht_view2_element_border_color"] = "dedede";
        $paramssld["ht_view2_element_background_color"] = "f9f9f9";
        $paramssld["ht_view2_element_width"] = "275";
        $paramssld["ht_view2_element_height"] = "160";

        $paramssld["ht_view3_show_separator_lines"] = "on";
        $paramssld["ht_view3_linkbutton_text"] = "View Product";
        $paramssld["ht_view3_show_linkbutton"] = "on";
        $paramssld["ht_view3_linkbutton_background_hover_color"] = "0074a2";
        $paramssld["ht_view3_linkbutton_background_color"] = "2ea2cd";
        $paramssld["ht_view3_linkbutton_font_hover_color"] = "ffffff";
        $paramssld["ht_view3_linkbutton_color"] = "ffffff";
        $paramssld["ht_view3_linkbutton_font_size"] = "14";
        $paramssld["ht_view3_description_color"] = "555555";
        $paramssld["ht_view3_description_font_size"] = "14";
        $paramssld["ht_view3_show_description"] = "on";
        $paramssld["ht_view3_thumbs_width"] = "75";
        $paramssld["ht_view3_thumbs_height"] = "75";
        $paramssld["ht_view3_show_thumbs"] = "on";
        $paramssld["ht_view3_title_font_size"] = "18";
        $paramssld["ht_view3_title_font_color"] = "0074a2";
        $paramssld["ht_view3_mainimage_width"] = "240";
        $paramssld["ht_view3_element_border_width"] = "1";
        $paramssld["ht_view3_element_border_color"] = "dedede";
        $paramssld["ht_view3_element_background_color"] = "f9f9f9";

        $paramssld["ht_view5_icons_style"] = "dark";
        $paramssld["ht_view5_show_separator_lines"] = "on";
        $paramssld["ht_view5_linkbutton_text"] = "View Product";
        $paramssld["ht_view5_show_linkbutton"] = "on";
        $paramssld["ht_view5_linkbutton_background_hover_color"] = "0074a2";
        $paramssld["ht_view5_linkbutton_background_color"] = "2ea2cd";
        $paramssld["ht_view5_linkbutton_font_hover_color"] = "ffffff";
        $paramssld["ht_view5_linkbutton_color"] = "ffffff";
        $paramssld["ht_view5_linkbutton_font_size"] = "14";
        $paramssld["ht_view5_description_color"] = "555555";
        $paramssld["ht_view5_description_font_size"] = "14";
        $paramssld["ht_view5_show_description"] = "on";
        $paramssld["ht_view5_thumbs_width"] = "75";
        $paramssld["ht_view5_thumbs_height"] = "75";
        $paramssld["ht_view5_show_thumbs"] = "on";
        $paramssld["ht_view5_title_font_size"] = "16";
        $paramssld["ht_view5_title_font_color"] = "0074a2";
        $paramssld["ht_view5_main_image_width"] = "275";
        $paramssld["ht_view5_slider_tabs_font_color"] = "d9d99";
        $paramssld["ht_view5_slider_tabs_background_color"] = "555555";
        $paramssld["ht_view5_slider_background_color"] = "f9f9f9";

        $paramssld["ht_view6_title_font_size"] = "16";
        $paramssld["ht_view6_title_font_color"] = "0074A2";
        $paramssld["ht_view6_title_font_hover_color"] = "2EA2CD";
        $paramssld["ht_view6_title_background_color"] = "000000";
        $paramssld["ht_view6_title_background_transparency"] = "80";
        $paramssld["ht_view6_border_radius"] = "3";
        $paramssld["ht_view6_border_width"] = "0";
        $paramssld["ht_view6_border_color"] = "eeeeee";
        $paramssld["ht_view6_width"] = "275";

        $paramssld["light_box_size"] = "17";
        $paramssld["light_box_width"] = "500";
        $paramssld["light_box_transition"] = "elastic";
        $paramssld["light_box_speed"] = "800";
        $paramssld["light_box_href"] = "False";
        $paramssld["light_box_title"] = "false";
        $paramssld["light_box_scalephotos"] = "true";
        $paramssld["light_box_rel"] = "false";
        $paramssld["light_box_scrolling"] = "false";
        $paramssld["light_box_opacity"] = "20";
        $paramssld["light_box_open"] = "false";
        $paramssld["light_box_overlayclose"] = "true";
        $paramssld["light_box_esckey"] = "false";
        $paramssld["light_box_arrowkey"] = "false";
        $paramssld["light_box_loop"] = "true";
        $paramssld["light_box_data"] = "false";
        $paramssld["light_box_classname"] = "false";
        $paramssld["light_box_fadeout"] = "300";
        $paramssld["light_box_closebutton"] = "false";
        $paramssld["light_box_current"] = "image";
        $paramssld["light_box_previous"] = "previous";
        $paramssld["light_box_next"] = "next";
        $paramssld["light_box_close"] = "close";
        $paramssld["light_box_iframe"] = "false";
        $paramssld["light_box_inline"] = "false";
        $paramssld["light_box_html"] = "false";
        $paramssld["light_box_photo"] = "false";
        $paramssld["light_box_height"] = "500";
        $paramssld["light_box_innerwidth"] = "false";
        $paramssld["light_box_innerheight"] = "false";
        $paramssld["light_box_initialwidth"] = "300";
        $paramssld["light_box_initialheight"] = "100";
        $paramssld["light_box_maxwidth"] = "768";
        $paramssld["light_box_maxheight"] = "500";
        $paramssld["light_box_slideshow"] = "false";
        $paramssld["light_box_slideshowspeed"] = "2500";
        $paramssld["light_box_slideshowauto"] = "true";
        $paramssld["light_box_slideshowstart"] = "start slideshow";
        $paramssld["light_box_slideshowstop"] = "stop slideshow";
        $paramssld["light_box_fixed"] = "true";
        $paramssld["light_box_top"] = "false";
        $paramssld["light_box_bottom"] = "false";
        $paramssld["light_box_left"] = "false";
        $paramssld["light_box_right"] = "false";
        $paramssld["light_box_reposition"] = "false";
        $paramssld["light_box_retinaimage"] = "true";
        $paramssld["light_box_retinaurl"] = "false";
        $paramssld["light_box_retinasuffix"] = "@2x.$1";
        $paramssld["light_box_returnfocus"] = "true";
        $paramssld["light_box_trapfocus"] = "true";
        $paramssld["light_box_fastiframe"] = "true";
        $paramssld["light_box_preloading"] = "true";
        $paramssld["slider_title_position"] = "5";
        $paramssld["light_box_style"] = "1";
        $paramssld["light_box_size_fix"] = "false";

        $paramssld["ht_view2_popup_full_width"] = "on";
        $paramssld["ht_view0_price_text"] = "Price";
        $paramssld["ht_view1_price_text"] = "Price";
        $paramssld["ht_view2_price_text"] = "Price";
        $paramssld["ht_view3_price_text"] = "Price";
        $paramssld["ht_view5_price_text"] = "Price";

        $paramssld["ht_catalog_view0_show_price"] = "on";
        $paramssld["ht_catalog_view0_price_font_size"] = "15";
        $paramssld["ht_catalog_view0_price_font_color"] = "e74c3c";
        $paramssld["ht_catalog_view0_market_price_font_size"] = "15";
        $paramssld["ht_catalog_view0_market_price_font_color"] = "E22828";
        $paramssld["ht_catalog_view1_show_price"] = "on";
        $paramssld["ht_catalog_view1_price_font_size"] = "15";
        $paramssld["ht_catalog_view1_price_font_color"] = "e74c3c";
        $paramssld["ht_catalog_view1_market_price_font_size"] = "15";
        $paramssld["ht_catalog_view1_market_price_font_color"] = "E22828";
        $paramssld["ht_catalog_view2_show_price"] = "on";
        $paramssld["ht_catalog_view2_price_font_size"] = "15";
        $paramssld["ht_catalog_view2_price_font_color"] = "e74c3c";
        $paramssld["ht_catalog_view2_market_price_font_size"] = "15";
        $paramssld["ht_catalog_view2_market_price_font_color"] = "E22828";
        $paramssld["ht_catalog_view3_show_price"] = "on";
        $paramssld["ht_catalog_view3_price_font_size"] = "15";
        $paramssld["ht_catalog_view3_price_font_color"] = "0074a2";
        $paramssld["ht_catalog_view3_market_price_font_size"] = "15";
        $paramssld["ht_catalog_view3_market_price_font_color"] = "E22828";
        $paramssld["ht_catalog_view5_show_price"] = "on";
        $paramssld["ht_catalog_view5_price_font_size"] = "15";
        $paramssld["ht_catalog_view5_price_font_color"] = "0074a2";
        $paramssld["ht_catalog_view5_market_price_font_size"] = "15";
        $paramssld["ht_catalog_view5_market_price_font_color"] = "E22828";
        $paramssld["ht_catalog_zoom_window_type"] = "window";
        $paramssld["ht_catalog_zoom_window_width"] = "200";
        $paramssld["ht_catalog_zoom_window_height"] = "150";
        $paramssld["ht_catalog_zoom_x_asis"] = "0";
        $paramssld["ht_catalog_zoom_y_asis"] = "0";
        $paramssld["ht_catalog_zoom_window_position"] = "16";
        $paramssld["ht_catalog_zoom_window_border_size"] = "2";
        $paramssld["ht_catalog_zoom_window_border_color"] = "#000";
        $paramssld["ht_catalog_zoom_window_lens_size"] = "200";
        $paramssld["ht_catalog_zoom_window_fadein"] = "200";
        $paramssld["ht_catalog_zoom_window_fadeout"] = "200";
        $paramssld["ht_catalog_zoom_lens_fadein"] = "200";
        $paramssld["ht_catalog_zoom_lens_fadeout"] = "200";
        $paramssld["ht_catalog_zoom_lens_hide"] = "false";
        $paramssld["ht_catalog_zoom_lens_shape"] = "square";
        $paramssld["ht_catalog_zoom_lens_color"] = "#fff";
        $paramssld["ht_catalog_zoom_lens_opacity"] = "40";
        $paramssld["ht_catalog_zoom_cursor"] = "crosshair";
        $paramssld["ht_catalog_zoom_scrollzoom"] = "true";
        $paramssld["ht_catalog_zoom_easing"] = "true";
        $paramssld["ht_catalog_zoom_lens_size_fix"] = "false";
        $paramssld["ht_catalog_zoom_lens_height"] = "100";
        $paramssld["ht_catalog_zoom_lens_width"] = "100";
        $paramssld["ht_catalog_zoom_tint"] = "true";
        $paramssld["ht_catalog_zoom_tint_colour"] = "#fff";
        $paramssld["ht_catalog_zoom_tint_opacity"] = "40";
        $paramssld["ht_catalog_zoom_tint_fadein"] = "200";
        $paramssld["ht_catalog_zoom_tint_fadeout"] = "200";
        $paramssld["ht_view3_allow_lightbox"] = "off";
        $paramssld["ht_catalog_zoom_thumbs_zoom"] = "off";
        $paramssld["ht_view3_allow_zooming"] = "on";
        
	$paramssld["ht_view0_sorting_float"] = "none";
	$paramssld["ht_view1_sorting_float"] = "none";
	$paramssld["ht_view2_sorting_float"] = "none";
	$paramssld["ht_view3_sorting_float"] = "none";
	$paramssld["ht_view4_sorting_float"] = "none";
	$paramssld["ht_view5_sorting_float"] = "none";
	$paramssld["ht_view6_sorting_float"] = "none";

	$paramssld["ht_view0_filtering_float"] = "none";
	$paramssld["ht_view1_filtering_float"] = "none";
	$paramssld["ht_view2_filtering_float"] = "none";
	$paramssld["ht_view3_filtering_float"] = "none";
	$paramssld["ht_view4_filtering_float"] = "none";
	$paramssld["ht_view5_filtering_float"] = "none";
	$paramssld["ht_view6_filtering_float"] = "none";
        $paramssld["ht_view0_allow_zooming"] = "off";
        $paramssld["ht_view0_allow_lightbox"] = "on";
        $paramssld["ht_view1_allow_zooming"] = "off";
        $paramssld["ht_view1_allow_lightbox"] = "on";
        $paramssld["ht_view2_allow_zooming"] = "off";
        $paramssld["ht_view2_allow_lightbox"] = "on";
        $paramssld["ht_view5_allow_zooming"] = "on";
        $paramssld["ht_view5_allow_lightbox"] = "off";

?>
<script>
        var allowZooming = '<?php echo $paramssld['ht_view3_allow_zooming'];?>';
        var allowLightbox = '<?php echo $paramssld['ht_view3_allow_lightbox'];?>';
        if(allowZooming == "on"){
            var for_zoom;
            if("<?php echo $paramssld['ht_catalog_zoom_thumbs_zoom']; ?>" == "on"){
                for_zoom = ".for_zoom img, .thumbs-block img";
            }
            else if("<?php echo $paramssld['ht_catalog_zoom_thumbs_zoom']; ?>" == "off"){
                for_zoom = ".for_zoom img";
            }
//            var catalogThumbsZoom = "<?php echo $paramssld['ht_catalog_zoom_thumbs_zoom'];?>";
            var catalogZoomType = "<?php echo $paramssld['ht_catalog_zoom_window_type'];?>";
            var catalogWindowWidth = <?php echo $paramssld['ht_catalog_zoom_window_width'];?>;
            var catalogWindowHeight = <?php echo $paramssld['ht_catalog_zoom_window_height'];?>;
            var catalogWindowOffetx = <?php echo $paramssld['ht_catalog_zoom_x_asis'];?>;
            var catalogWindowOffety = <?php echo $paramssld['ht_catalog_zoom_y_asis'];?>;
            var catalogWindowPosition = <?php echo $paramssld['ht_catalog_zoom_window_position'];?>;
            var catalogBorderSize = <?php echo $paramssld['ht_catalog_zoom_window_border_size'];?>;
            var catalogBorderColour = "<?php echo $paramssld['ht_catalog_zoom_window_border_color'];?>";
            var catalogWindowFadeIn = <?php echo $paramssld['ht_catalog_zoom_window_fadein'];?>;
            var catalogWindowFadeOut = <?php echo $paramssld['ht_catalog_zoom_window_fadeout'];?>;
            var catalogLensSize = <?php echo $paramssld['ht_catalog_zoom_window_lens_size'];?>;

            var catalogLensFadeIn = <?php echo $paramssld['ht_catalog_zoom_lens_fadein'];?>;
            var catalogLensFadeOut = <?php echo $paramssld['ht_catalog_zoom_lens_fadeout'];?>;
            var catalogZoomLens = <?php echo $paramssld['ht_catalog_zoom_lens_hide'];?>;
            var catalogLensShape = "<?php echo $paramssld['ht_catalog_zoom_lens_shape'];?>";
            var catalogLensColour = "<?php echo $paramssld['ht_catalog_zoom_lens_color'];?>";
            var catalogLensOpacity = <?php echo $paramssld['ht_catalog_zoom_lens_opacity'];?>/100;
            var catalogCursor = "<?php echo $paramssld['ht_catalog_zoom_cursor'];?>";
            var catalogScrollZoom = <?php echo $paramssld['ht_catalog_zoom_scrollzoom'];?>;
            var catalogEasing = <?php echo $paramssld['ht_catalog_zoom_easing'];?>;

            var catalogTint = "<?php echo $paramssld['ht_catalog_zoom_tint'];?>";
            var catalogTintColour = "<?php echo $paramssld['ht_catalog_zoom_tint_colour'];?>";
            var catalogTintOpacity = <?php echo $paramssld['ht_catalog_zoom_tint_opacity'];?>/100;
            var catalogZoomTintFadeIn = <?php echo $paramssld['ht_catalog_zoom_tint_fadein'];?>;
            var catalogZoomTintFadeOut = <?php echo $paramssld['ht_catalog_zoom_tint_fadeout'];?>;

            var catalogGallery = null;
            }
        if(allowLightbox == "on"){
            var lightbox_transition = '<?php echo $paramssld['light_box_transition'];?>';
            var lightbox_speed = <?php echo $paramssld['light_box_speed'];?>;
            var lightbox_fadeOut = <?php echo $paramssld['light_box_fadeout'];?>;
            var lightbox_title = <?php echo $paramssld['light_box_title'];?>;
            var lightbox_scalePhotos = <?php echo $paramssld['light_box_scalephotos'];?>;
            var lightbox_scrolling = <?php echo $paramssld['light_box_scrolling'];?>;
            var lightbox_opacity = <?php echo ($paramssld['light_box_opacity']/100)+0.001;?>;
            var lightbox_open = <?php echo $paramssld['light_box_open'];?>;
            var lightbox_returnFocus = <?php echo $paramssld['light_box_returnfocus'];?>;
            var lightbox_trapFocus = <?php echo $paramssld['light_box_trapfocus'];?>;
            var lightbox_fastIframe = <?php echo $paramssld['light_box_fastiframe'];?>;
            var lightbox_preloading = <?php echo $paramssld['light_box_preloading'];?>;
            var lightbox_overlayClose = <?php echo $paramssld['light_box_overlayclose'];?>;
            var lightbox_escKey = <?php echo $paramssld['light_box_esckey'];?>;
            var lightbox_arrowKey = <?php echo $paramssld['light_box_arrowkey'];?>;
            var lightbox_loop = <?php echo $paramssld['light_box_loop'];?>;
            var lightbox_closeButton = <?php echo $paramssld['light_box_closebutton'];?>;
            var lightbox_previous = "<?php echo $paramssld['light_box_previous'];?>";
            var lightbox_next = "<?php echo $paramssld['light_box_next'];?>";
            var lightbox_close = "<?php echo $paramssld['light_box_close'];?>";
            var lightbox_html = <?php echo $paramssld['light_box_html'];?>;
            var lightbox_photo = <?php echo $paramssld['light_box_photo'];?>;
            var lightbox_width = '<?php if($paramssld['light_box_size_fix'] == 'false'){ echo 'false';} else { echo $paramssld['light_box_width']; } ?>';
            var lightbox_height = '<?php if($paramssld['light_box_size_fix'] == 'false'){ echo 'false';} else { echo $paramssld['light_box_height']; } ?>';
            var lightbox_innerWidth = '<?php echo $paramssld['light_box_innerwidth'];?>';
            var lightbox_innerHeight = '<?php echo $paramssld['light_box_innerheight'];?>';
            var lightbox_initialWidth = '<?php echo $paramssld['light_box_initialwidth'];?>';
            var lightbox_initialHeight = '<?php echo $paramssld['light_box_initialheight'];?>';

            var maxwidth=jQuery(window).width();
            if(maxwidth > <?php echo $paramssld['light_box_maxwidth'];?>){ maxwidth=<?php echo $paramssld['light_box_maxwidth'];?>; }
            var lightbox_maxWidth = <?php if($paramssld['light_box_size_fix'] == 'true'){ echo '"100%"';} else { echo 'maxwidth'; } ?>;
            var lightbox_maxHeight = <?php if($paramssld['light_box_size_fix'] == 'true'){ echo '"100%"';} else { echo $paramssld['light_box_maxheight']; } ?>;

            var lightbox_slideshow = <?php echo $paramssld['light_box_slideshow'];?>;
            var lightbox_slideshowSpeed = <?php echo $paramssld['light_box_slideshowspeed'];?>;
            var lightbox_slideshowAuto = <?php echo $paramssld['light_box_slideshowauto'];?>;
            var lightbox_slideshowStart = "<?php echo $paramssld['light_box_slideshowstart'];?>";
            var lightbox_slideshowStop = "<?php echo $paramssld['light_box_slideshowstop'];?>";
            var lightbox_fixed = <?php echo $paramssld['light_box_fixed'];?>;
        
        
	<?php
	$pos = $paramssld['slider_title_position'];
	switch($pos){ 
	case 1:
	?>
		var lightbox_top = '10%';
		var lightbox_bottom = false;
		var lightbox_left = '10%';
		var lightbox_right = false;
	<?php
	break;	
	case 1:
	?>
		var lightbox_top = '10%';
		var lightbox_bottom = false;
		var lightbox_left = '10%';
		var lightbox_right = false;
	<?php
	break;	
	case 2:
	?>
		var lightbox_top = '10%';
		var lightbox_bottom = false;
		var lightbox_left = false;
		var lightbox_right = false;
	<?php
	break;	
	case 3:
	?>
		var lightbox_top = '10%';
		var lightbox_bottom = false;
		var lightbox_left = false;
		var lightbox_right = '10%';
	<?php
	break;
	case 4:
	?>
		var lightbox_top = false;
		var lightbox_bottom = false;
		var lightbox_left = '10%';
		var lightbox_right = false;
	<?php
	break;	
	case 5:
	?>
		var lightbox_top = false;
		var lightbox_bottom = false;
		var lightbox_left = false;
		var lightbox_right = false;
	<?php
	break;	
	case 6:
	?>
		var lightbox_top = false;
		var lightbox_bottom = false;
		var lightbox_left = false;
		var lightbox_right = '10%';
	<?php
	break;	
	case 7:
	?>
		var lightbox_top = false;
		var lightbox_bottom = '10%';
		var lightbox_left = '10%';
		var lightbox_right = false;
	<?php
	break;	
	case 8:
	?>
		var lightbox_top = false;
		var lightbox_bottom = '10%';
		var lightbox_left = false;
		var lightbox_right = false;
	<?php
	break;	
	case 9:
	?>
		var lightbox_top = false;
		var lightbox_bottom = '10%';
		var lightbox_left = false;
		var lightbox_right = '10%';
	<?php
	break;	
	} ?>
	
	var lightbox_reposition = <?php echo $paramssld['light_box_reposition'];?>;
	var lightbox_retinaImage = <?php echo $paramssld['light_box_retinaimage'];?>;
	var lightbox_retinaUrl = <?php echo $paramssld['light_box_retinaurl'];?>;
	var lightbox_retinaSuffix = "<?php echo $paramssld['light_box_retinasuffix'];?>";
	
				jQuery(document).ready(function(){
                                    
				var group_count = 0;
                                jQuery(".catalog_album_colorbox_grouping_<?php echo $albumID; ?>").each(function(){
                                    group_count++;
                                });
                                var i;
                                for(i = 1; i <= group_count; i++){
                                    jQuery(".catalog_album_group" + i).colorbox({rel:'catalog_album_group' + i});
                                }
                                
                                var catalog_slider_slides_count = 0;
                                jQuery(".class_for_catalog_slider_count").each(function(){
                                    catalog_slider_slides_count++;
                                });
                                catalog_slider_slides_count = catalog_slider_slides_count - 1;

                                for(i = 1; i <= catalog_slider_slides_count; i++){
                                    jQuery(".catalog_album_slider_group" + i).colorbox({rel:'catalog_album_slider_group' + i});
                                    jQuery(".clone .catalog_album_slider_group" + i).removeClass("catalog_album_slider_group" + i + " cboxElement");
                                }
                                //alert(catalog_slider_slides_count);
				
				jQuery(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				jQuery('.non-retina').colorbox({rel:'group5', transition:'none'})
				jQuery('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				

				jQuery("#click").click(function(){ 
					jQuery('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
        }
	
		
</script>
	<!--Huge IT catalog START-->
	<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( !(is_plugin_active( 'lightbox/lightbox.php' ) )) { 
		?>
	<link href="<?php echo plugins_url('../style/colorbox-'.$paramssld['light_box_style'].'.css', __FILE__);?>" rel="stylesheet" type="text/css" />
	<?php } ?>
		
	<?php
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( !(is_plugin_active( 'wp-lightbox-2/wp-lightbox-2.php' ) )) { ?>

	<?php } ?>
	
	
	
	

	<?php 
	$i = $catalogeffect;
	switch ($i) {
	
	
	/////////////////////////////// VIEW 0 Toggle Up/Down Blocks /////////////////////////////////////////
    case 0:
	?>

<?php
//    if($paramssld["ht_view0_sorting_float"] == "left" && $paramssld["ht_view0_filtering_float"] == "right" ||
//       $paramssld["ht_view0_sorting_float"] == "right" && $paramssld["ht_view0_filtering_float"] == "left" ||
//       $paramssld["ht_view0_sorting_float"] == $paramssld["ht_view0_filtering_float"])
//       { $sorting_block_width ="20%"; $filtering_block_width ="20%"; $middle_with = "56%"; }
//    else if($paramssld["ht_view0_sorting_float"] == "left" || $paramssld["ht_view0_sorting_float"] == "right" && $paramssld["ht_view0_filtering_float"] == "top")
//       { $sorting_block_width ="30%"; $filtering_block_width ="100%"; $paramssld["ht_view0_filtering_float"] = "none"; $width_middle = "65%"; }
//    else if($paramssld["ht_view0_filtering_float"] == "left" || $paramssld["ht_view0_filtering_float"] == "right" && $paramssld["ht_view0_sorting_float"] == "top")
//       { $sorting_block_width ="100%"; $filtering_block_width ="30%"; $paramssld["ht_view0_sorting_float"] = "none"; $width_middle = "65%"; }
//    if($paramssld["ht_view0_sorting_float"] == "top" && $paramssld["ht_view0_filtering_float"] == "top")
//       { $sorting_block_width ="100%"; $filtering_block_width ="100%"; $left_to_top = "ok"; }
?>
<style type="text/css">

.zoomContainer {
    z-index: 10;
}

.album_element_<?php echo $albumID; ?> {
	background:#<?php echo $paramssld['ht_view0_element_background_color']?>;
	width:<?php echo $paramssld['ht_view0_block_width']; ?>px !important;
	margin: 5px;
	float: left;
	overflow: hidden;
	outline:none;
	border:<?php echo $paramssld['ht_view0_element_border_width']; ?>px solid #<?php echo $paramssld['ht_view0_element_border_color']; ?>;
}

.album_element_<?php echo $albumID; ?>.large,
.variable-sizes .album_element_<?php echo $albumID; ?>.large,
.variable-sizes .album_element_<?php echo $albumID; ?>.large.width2.height2 {
	width: <?php echo $paramssld['ht_view0_block_width']; ?>px;
	z-index: 10;
}

.album_default-block_<?php echo $albumID; ?> {
	position:relative;
	width:<?php echo $paramssld['ht_view0_block_width']; ?>px !important;
	height:<?php echo $paramssld['ht_view0_block_height']+45;?>px !important;
} 

.album_default-block_<?php echo $albumID; ?> .album_image-block_<?php echo $albumID; ?> {
	margin:0px;
	padding:0px;
	line-height:0px;
	border-bottom:1px solid #<?php echo $paramssld['ht_view0_element_border_color']; ?>;
}

.album_default-block_<?php echo $albumID; ?> img {
	margin:0px !important;
	padding:0px !important;
	max-width:none !important;
	width:<?php echo $paramssld['ht_view0_block_width']; ?>px !important;
	height:<?php echo $paramssld['ht_view0_block_height']; ?>px !important;
	border-radius:0px;
}

.album_default-block_<?php echo $albumID; ?> .album_title-block_<?php echo $albumID; ?> {
	position:relative;
	display:block;
	height:42px;
	padding:10px 0px 0px 0px;
	width:<?php echo $paramssld['ht_view0_block_width']; ?>px !important;
}

.album_default-block_<?php echo $albumID; ?> .album_title-block_<?php echo $albumID; ?> h3 {
	position:relative;
	margin:0px !important;
	padding:0px 0px 0px 5px !important;
	width:<?php echo $paramssld['ht_view0_block_width']-30; ?>px !important;
	text-overflow: ellipsis;
	overflow: hidden; 
	white-space:nowrap;
	font-weight:normal;
	color:#<?php echo $paramssld['ht_view0_title_font_color']; ?>;
	font-size:<?php echo $paramssld['ht_view0_title_font_size']; ?>px !important;
	line-height:<?php echo $paramssld['ht_view0_title_font_size']+4; ?>px !important;
}

.album_element_<?php echo $albumID; ?> .album_title-block_<?php echo $albumID; ?> .open-close-button {
	width:20px;
	height:20px;
	display:block;
	position:absolute;
	top:13px;
	right:2%;
	background:url('<?php echo  plugins_url( '../images/open-close.'.$paramssld['ht_view0_togglebutton_style'].'.png' , __FILE__ ); ?>') left top no-repeat;
	z-index:5;
	cursor:pointer;
	opacity:0.33;
}

 .album_element_<?php echo $albumID; ?>:hover .album_title-block_<?php echo $albumID; ?> .open-close-button {opacity:1;}

.album_element_<?php echo $albumID; ?>.large .open-close-button {
	background:url('<?php echo  plugins_url( '../images/open-close.'.$paramssld['ht_view0_togglebutton_style'].'.png' , __FILE__ ); ?>') left bottom no-repeat;
}

.album_wd-catalog-panel_<?php echo $albumID; ?> {
	position: absolute;
	display:block;
	width:<?php echo $paramssld['ht_view0_block_width']-10; ?>px !important;
	margin:0px 5px 0px 5px;
	padding:0px;
	text-align:left;
	top:<?php echo $paramssld['ht_view0_block_height']+45; ?>px;  
	z-index:6; 
	height:200px;
}


.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?>, .album_element_<?php echo $albumID; ?> div.right-block .description-block_<?php echo $albumID; ?> * {
	position:relative;
	clear:both;
}

.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> p,.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> * {	
	text-align:justify;
	font-weight:normal;
	font-size:<?php echo $paramssld['ht_view0_description_font_size']; ?>px;
	color:#<?php echo $paramssld['ht_view0_description_color']; ?>;
	margin:0px;
	padding:0px;
}



.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> h1,
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> h2,
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> h3,
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> h4,
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> h5,
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> h6,
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> p, 
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> strong,
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> span {
	padding:2px !important;
	margin:0px !important;
}

.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> ul,
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> li {
	padding:2px 0px 2px 5px;
	margin:0px 0px 0px 8px;
}


.album_wd-catalog-panel_<?php echo $albumID; ?> .thumbs-list_<?php echo $albumID; ?> {
	position:relative;
	clear:both;
	list-style:none;
	display:table;
	width:100%;
	padding:0px;
	margin:3px 0px 0px 0px;
	text-align:center;
}

.album_wd-catalog-panel_<?php echo $albumID; ?> .thumbs-list_<?php echo $albumID; ?> li {
	display:inline-block;
	margin:0px 3px 0px 2px;
}

.album_wd-catalog-panel_<?php echo $albumID; ?> .thumbs-list_<?php echo $albumID; ?> li a {
	display:block;
	width:<?php echo $paramssld['ht_view0_thumbs_width']; ?>px;
	height:<?php echo $paramssld['ht_view0_thumbs_width']; ?>px;
	opacity:0.7;
	display:table;
}

.album_wd-catalog-panel_<?php echo $albumID; ?> .thumbs-list_<?php echo $albumID; ?> li a:hover {
	opacity:1;
}

.album_wd-catalog-panel_<?php echo $albumID; ?> img {
	margin:0px !important;
	padding:0px !important;
	display:table-cell;
	vertical-align:middle;
	width:<?php echo $paramssld['ht_view0_thumbs_width']; ?>px !important;
	max-height:<?php echo $paramssld['ht_view0_thumbs_width']; ?>px !important;
	width:100%;
	height:100%;
}

.album_wd-catalog-panel_<?php echo $albumID; ?> > div {
	position:relative;
	clear:both;
	padding-top:10px;
	margin-bottom:10px;
	<?php if($paramssld['ht_view0_show_separator_lines']=="on") {?>
		background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center top repeat-x;
	<?php } ?>
}

.album_wd-catalog-panel_<?php echo $albumID; ?> .button-block {
	padding-top:10px;
	margin-bottom:10px;
	
}

.album_wd-catalog-panel_<?php echo $albumID; ?> .button-block a, .album_wd-catalog-panel_<?php echo $albumID; ?> .button-block a:link, .album_wd-catalog-panel_<?php echo $albumID; ?> .button-block a:visited {
	padding:6px 12px;
	text-decoration:none;
	display:inline-block;
	font-size:<?php echo $paramssld['ht_view0_linkbutton_font_size']; ?>px;
	background:#<?php echo $paramssld['ht_view0_linkbutton_background_color']; ?>;
	color:#<?php echo $paramssld['ht_view0_linkbutton_color']; ?>;
}

.album_wd-catalog-panel_<?php echo $albumID; ?> .button-block a:hover, .album_wd-catalog-panel_<?php echo $albumID; ?> .button-block a:focus, .album_wd-catalog-panel_<?php echo $albumID; ?> .button-block a:active {
	background:#<?php echo $paramssld['ht_view0_linkbutton_background_hover_color']; ?>;
	color:#<?php echo $paramssld['ht_view0_linkbutton_font_hover_color']; ?>;
	text-decoration:none;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> {
    <?php if ($paramssld["ht_view0_show_sorting"] == 'off')
    echo "display:none;";
    if($paramssld["ht_view0_filtering_float"] == 'left' && $paramssld["ht_view0_sorting_float"] == 'none') { if($catalogShowFiltering == "on") { echo "margin-left: 31%;"; } else echo "margin-left: 1%;"; }
    else if($paramssld["ht_view0_filtering_float"] == 'right' && $paramssld["ht_view0_sorting_float"] == 'none' || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%;"; } ?>
    overflow: hidden;
    margin-top: 5px;
    float: <?php echo $paramssld["ht_view0_sorting_float"]; ?>;
    width: <?php echo $sorting_block_width; ?>;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul {
  margin: 0px !important;
  padding: 0px !important;
  list-style: none;
<?php if($paramssld["ht_view0_sorting_float"] == 'top') {
      echo "float:left;margin-left:1%;";
      } ?>
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?> ul {
  margin: 0px !important;
  padding: 0px !important;
  overflow: hidden;
  <?php if($paramssld["ht_view0_filtering_float"] == 'top') {
      echo "float:left;margin-left:1%;";
      } ?>
}

<?php if($paramssld["ht_view0_sorting_float"] == 'none') { ?>
            #album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul {
                float: left;
            }
    <?php } ?>
            
#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul li {
    border-radius: <?php echo $paramssld["ht_view0_sortbutton_border_radius"];?>px;
    list-style-type: none;
    margin: 0px !important;
    <?php
        if($sorting_block_width == "100%" ) {
            echo "float:left !important;margin: 4px 8px 4px 0px !important;";
        }
        if($left_to_top == "ok")
        { echo "float:left !important;"; }
        if($paramssld["ht_view0_sorting_float"] == "left" || $paramssld["ht_view0_sorting_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else
        { echo 'border: 1px solid #ccc;'; }
    ?>
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul li a {
    background-color: #<?php echo $paramssld["ht_view0_sortbutton_background_color"];?> !important;
    font-size:<?php echo $paramssld["ht_view0_sortbutton_font_size"];?>px !important;
    color:#<?php echo $paramssld["ht_view0_sortbutton_font_color"];?> !important;
    text-decoration: none;
    cursor: pointer;
    margin: 0px !important;
    display: block;
    padding:3px;
}

/*#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul li:hover {
    
}*/

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul li a:hover {
    background-color: #<?php echo $paramssld["ht_view0_sortbutton_hover_background_color"];?> !important;
    color:#<?php echo $paramssld["ht_view0_sortbutton_hover_font_color"];?> !important;
    cursor: pointer;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?> {
    margin-top: 5px;
    float: <?php echo $paramssld["ht_view0_filtering_float"]; ?>;
    width: <?php echo $filtering_block_width; ?>;
    <?php
        if ($paramssld["ht_view0_show_filtering"] == 'off') echo "display:none;";
        if($paramssld["ht_view0_filtering_float"] == 'none' && ($paramssld["ht_view0_sorting_float"] == 'left') ) { if($catalogShowSorting == 'on') { echo "margin-left: 31%;"; } else echo "margin-left: 1%"; } 
        if(($paramssld["ht_view0_filtering_float"] == 'none' && ($paramssld["ht_view0_sorting_float"] == 'right')) || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%";}
    ?>
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?> ul li {
    list-style-type: none;
    <?php
        if($filtering_block_width == "100%") { echo "float:left !important;margin: 4px 8px 4px 0px !important;"; }
        if($left_to_top == "ok") { echo "float:left !important;"; }
        if($paramssld["ht_view0_filtering_float"] == "left" || $paramssld["ht_view0_filtering_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else echo "border: 1px solid #ccc;";
    ?>
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?> ul li a {
    font-size:<?php echo $paramssld["ht_view0_filterbutton_font_size"];?>px !important;
    color:#<?php echo $paramssld["ht_view0_filterbutton_font_color"];?> !important;
    background-color: #<?php echo $paramssld["ht_view0_filterbutton_background_color"];?> !important;
    border-radius: <?php echo $paramssld["ht_view0_filterbutton_border_radius"];?>px;
    padding: 3px;
    display: block;
    text-decoration: none;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?>  ul li a:hover {
    color:#<?php echo $paramssld["ht_view0_filterbutton_hover_font_color"];?> !important;
    background-color: #<?php echo $paramssld["ht_view0_filterbutton_hover_background_color"];?> !important;
    cursor: pointer;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> section {
    position:relative;
    display:block;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_container_<?php echo $albumID; ?> {
<?php if($paramssld["ht_view0_sorting_float"] == "left" && $paramssld["ht_view0_filtering_float"] == "right" ||
         $paramssld["ht_view0_sorting_float"] == "right" && $paramssld["ht_view0_filtering_float"] == "left")
       { echo "margin: 0px auto;"; }
       if((($paramssld["ht_view0_filtering_float"] == "left" || $paramssld["ht_view0_filtering_float"] == "right" && $paramssld["ht_view0_sorting_float"] == "top") || ($paramssld["ht_view0_sorting_float"] == "left" || $paramssld["ht_view0_sorting_float"] == "right" && $paramssld["ht_view0_filting_float"] == "top")) && $catalogShowFiltering == "on" && $catalogShowSorting == "on")
       {
?>
        width: <?php echo $width_middle; ?> !important;
 <?php } ?>
}
.zoomContainer {
    z-index: 10;
}

</style>

<section id="album_huge_it_catalog_content_<?php echo $albumID; ?>">
      <?php // if($catalogShowSorting == "on")
//        { ?>
<!--          <div id="album_huge_it_catalog_options_<?php echo $albumID; ?>" class="" >
            <ul id="sort-by" class="option-set clearfix" data-option-key="sortBy">
                <li><a href="#sortBy=original-order" data-option-value="original-order" class="selected" data><?php echo $paramssld["ht_view0_sorting_name_by_default"]; ?></a></li>
                <li><a href="#sortBy=id" data-option-value="id"><?php echo $paramssld["ht_view0_sorting_name_by_id"]; ?></a></li>
                <li><a href="#sortBy=symbol" data-option-value="symbol"><?php echo $paramssld["ht_view0_sorting_name_by_name"]; ?></a></li>
                <li id="shuffle"><a href='#shuffle'><?php echo $paramssld["ht_view0_sorting_name_by_random"]; ?></a></li>
            </ul>
              
            <ul id="sort-direction" class="option-set clearfix" data-option-key="sortAscending">
                <li><a href="#sortAscending=true" data-option-value="true" class="selected"><?php echo $paramssld["ht_view0_sorting_name_by_asc"]; ?></a></li>
                <li><a href="#sortAscending=false" data-option-value="false"><?php echo $paramssld["ht_view0_sorting_name_by_desc"]; ?></a></li>
            </ul>
          </div>-->
  <?php // }
//   if($catalogShowFiltering == "on")
//      { ?>
<!--         <div id="album_huge_it_catalog_filters_<?php echo $albumID; ?>" style>
            <ul>
                <li rel="*"><a>All</a></li>
                <?php
//                $catalogCats = explode(",", $catalogCats);
//                foreach ($catalogCats as $catalogCatsValue) {
//                    if(!empty($catalogCatsValue))
//                    {
                ?>
                <li rel=".<?php // echo str_replace(" ","_",$catalogCatsValue); ?>"><a><?php // echo str_replace("_"," ",$catalogCatsValue); ?></a></li>
                    <?php
//                    }
//                }
                ?>
            </ul>
        </div>-->
<?php // } ?>
        <div id="album_huge_it_catalog_container_<?php echo $albumID; ?>" class="super-list variable-sizes clearfix" <?php // if($paramssld["ht_view0_sorting_float"] == "top" && $paramssld["ht_view0_filtering_float"] == "top") echo "style='clear: both;'";?>>
              <?php
              $group_key = 0;
              foreach($catalogsFromAlbumArray as $key=>$row)
              {
                      $group_key++;
//                      $link = $row->sl_url;
                      $descnohtml=strip_tags($row->description);
                      $result = substr($descnohtml, 0, 50);
//                      $catForFilter = explode(",", $row->categories);
                      ?>
             <?php // foreach ($catForFilter as $catForFilterValue) { echo str_replace(" ","-",$catForFilterValue)." ";} ?>
                      <div class="album_element_<?php echo $albumID; ?> catalog_album_colorbox_grouping_<?php echo $albumID; ?> " data-symbol="<?php echo $row->name; ?>" data-category="alkaline-earth">
                              <div class="album_default-block_<?php echo $albumID; ?>">
                                      <div class="album_image-block_<?php echo $albumID; ?> for_zoom">
                                          <?php $imgurl=explode(";;;",$row->cat_thumb);?>
                                          <?php     if($imgurl[0] != ''){ ?>
                                          <a class="catalog_album_group<?php echo $group_key; ?>" href="<?php echo $imgurl[0]; ?>">
                                              <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo $imgurl[0]; ?>" />
                                          </a>
                                            
                                           <?php } else { ?>
                                           <a class="catalog_album_group<?php echo $group_key; ?>" href="<?php echo  plugins_url( '' , __FILE__ ); ?>/../images/noimage.png">
                                               <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo  plugins_url( '' , __FILE__ ); ?>/../images/noimage.png" />
                                           </a>
                                           <?php
                                           } ?>	
                                      </div>
                                      <div class="album_title-block_<?php echo $albumID; ?>">
                                              <h3 class="title"><?php echo $row->catalog_name; ?></h3>
                                              <div class="open-close-button"></div>
                                      </div>
                              </div>

                              <div class="album_wd-catalog-panel_<?php echo $albumID; ?>" id="panel<?php echo $key; ?>">
                                      <?php if($paramssld['ht_view0_show_description']=='on'){?>
                                              <div class="description-block_<?php echo $albumID; ?>">
                                                    <p><?php echo $row->description; ?></p>
                                              </div>
                                      <?php }
                                     
                                      if($paramssld['ht_view0_show_linkbutton']=='on'){
                                          $page_link = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                                          if (strpos(get_permalink(),'/?') !== false) { $product_page_link = get_permalink()."&single_catalog_id=$row->catalog_id"; } else { $product_page_link = get_permalink()."/?single_catalog_id=$row->catalog_id"; }
                                      ?>
                                              <div class="button-block">
                                                      <a href="<?php echo $product_page_link; ?>" <?php if ($row->link_target=="on"){ echo 'target="_blank"'; }?>><?php echo $paramssld['ht_view0_linkbutton_text']; ?></a>
                                              </div>
                                      <?php } ?>
                              </div>
                      </div>

                      <?php
              }
              ?>
        </div>
</section>

<script>
jQuery(function(){
var defaultBlockHeight=<?php echo $paramssld['ht_view0_block_height']; ?>;
var defaultBlockWidth=<?php echo $paramssld['ht_view0_block_width']; ?>;
    
    var $container = jQuery('#album_huge_it_catalog_container_<?php echo $albumID; ?>');
    
    
      // add randomish size classes
      $container.find('.album_element_<?php echo $albumID; ?>').each(function(){
        var $this = jQuery(this),
            number = parseInt( $this.find('.number').text(), 10 );
			//alert(number);
        if ( number % 7 % 2 === 1 ) {
          $this.addClass('width2');
        }
        if ( number % 3 === 0 ) {
          $this.addClass('height2');
        }
      });
    
    $container.hugeitmicro({
      itemSelector : '.album_element_<?php echo $albumID; ?>',
      masonry : {
        columnWidth :  <?php echo $paramssld['ht_view0_block_width']; ?>+20+<?php echo $paramssld['ht_view0_element_border_width']*2; ?>
      },
      masonryHorizontal : {
        rowHeight: 300+20
      },
      cellsByRow : {
        columnWidth : 300+20,
        rowHeight : 240
      },
      cellsByColumn : {
        columnWidth : 300+20,
        rowHeight : 240
      },
      getSortData : {
        symbol : function( $elem ) {
          return $elem.attr('data-symbol');
        },
        category : function( $elem ) {
          return $elem.attr('data-category');
        },
        number : function( $elem ) {
          return parseInt( $elem.find('.number').text(), 10 );
        },
        weight : function( $elem ) {
          return parseFloat( $elem.find('.weight').text().replace( /[\(\)]/g, '') );
        },
        id : function ( $elem ) {
          return $elem.find('.id').text();
        }
      }
    });
        

    var $optionSets = jQuery('#album_huge_it_catalog_options_<?php echo $albumID; ?> .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = jQuery(this);

        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  

        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');

        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {

          changeLayoutMode( $this, options )
        } else {

          $container.hugeitmicro( options );
        }
        
        return false;
      });

      var isHorizontal = false;
      function changeLayoutMode( $link, options ) {
        var wasHorizontal = isHorizontal;
        isHorizontal = $link.hasClass('horizontal');

        if ( wasHorizontal !== isHorizontal ) {

          var style = isHorizontal ? 
            { height: '75%', width: $container.width() } : 
            { width: 'auto' };

          $container.filter(':animated').stop();

          $container.addClass('no-transition').css( style );
          setTimeout(function(){
            $container.removeClass('no-transition').hugeitmicro( options );
          }, 100 )
        } else {
          $container.hugeitmicro( options );
        }
      }
    

      $container.delegate( '.album_title-block_<?php echo $albumID; ?>', 'click', function(){
          var strheight=0;
          jQuery(this).parents('.album_element_<?php echo $albumID; ?>').find('.album_wd-catalog-panel_<?php echo $albumID; ?> > div').each(function(){
                strheight+=jQuery(this).outerHeight()+10;
                //alert(strheight);
          })
          strheight+=<?php echo $paramssld['ht_view0_block_height']+45; ?>;
	  			if(jQuery(this).parents('.album_element_<?php echo $albumID; ?>').hasClass("large")){
			jQuery(this).parents('.album_element_<?php echo $albumID; ?>').animate({
				height: "<?php echo $paramssld['ht_view0_block_height']+45; ?>px"
			}, 300, function() {
				jQuery(this).removeClass('large');
				$container.hugeitmicro('reLayout');
			});
			
			jQuery(this).parents('.album_element_<?php echo $albumID; ?>').removeClass("active");
			return false;
		}
		
	
		jQuery(this).parents('.album_element_<?php echo $albumID; ?>').css({height:strheight});
		jQuery(this).parents('.album_element_<?php echo $albumID; ?>').addClass('large');

		$container.hugeitmicro('reLayout');
		jQuery(this).parents('.album_element_<?php echo $albumID; ?>').css({height:"<?php echo $paramssld['ht_view0_block_height']+45; ?>px"});		 
		 
		//alert(strheight);
		 
		 jQuery(this).parents('.album_element_<?php echo $albumID; ?>').animate({
			height:strheight+"px",
		  }, 300,function(){	$container.hugeitmicro('reLayout');});
	});

    var $sortBy =  jQuery('#album_huge_it_catalog_content_<?php echo $albumID; ?> #sort-by');
    jQuery('#album_huge_it_catalog_content_<?php echo $albumID; ?> #shuffle a').click(function(){
      $container.hugeitmicro('shuffle');
      $sortBy.find('.selected').removeClass('selected');
      $sortBy.find('[data-option-value="random"]').addClass('selected');
      return false;
    });
    
        // bind filter on select change
        jQuery(document).ready(function(){
            jQuery('#album_huge_it_catalog_filters_<?php echo $albumID; ?> ul li').click(function() {
              // get filter value from option value
              var filterValue = jQuery(this).attr('rel');
              // use filterFn if matches value
              filterValue = filterValue;//filterFns[ filterValue ] || 
              $container.hugeitmicro({ filter: filterValue });
            });
            <?php // if(($paramssld["ht_view0_sorting_float"] == "left" || $paramssld["ht_view0_sorting_float"] == "right") && $paramssld["ht_view0_filtering_float"] == "none")
//                  { ?>
//                        var topmargin = jQuery("#album_huge_it_catalog_filters_<?php echo $albumID; ?> ul").height();
//                        jQuery("#album_huge_it_catalog_options_<?php echo $albumID; ?>").css({'margin-top':parseInt(topmargin) + 5});
            <?php // }
//            else  {
//                    if(($paramssld["ht_view0_filtering_float"] == "left" || $paramssld["ht_view0_filtering_float"] == "right") && $paramssld["ht_view0_sorting_float"] == "none")
//                      { ?>
//                         var topmargin = jQuery("#album_huge_it_catalog_options_<?php echo $albumID; ?>").height();
//                         jQuery("#album_huge_it_catalog_filters_<?php echo $albumID; ?>").css({'margin-top':'5px'});
                <?php // }
//                  } ?>
        });
        
        jQuery(window).load(function(){

            $container.hugeitmicro({ filter: '*' });
        });
  });
</script>
	
<?php        
        break;
	
	///////////////////////////////// VIEW 1 FullHeight Blocks //////////////////////////////////////////////
	
	case 1;
 ?>
<?php
//    if($paramssld["ht_view1_sorting_float"] == "left" && $paramssld["ht_view1_filtering_float"] == "right" ||
//       $paramssld["ht_view1_sorting_float"] == "right" && $paramssld["ht_view1_filtering_float"] == "left" ||
//       $paramssld["ht_view1_sorting_float"] == $paramssld["ht_view1_filtering_float"])
//       { $sorting_block_width ="20%"; $filtering_block_width ="20%"; $middle_with = "56%"; }
//    else if($paramssld["ht_view1_sorting_float"] == "left" || $paramssld["ht_view1_sorting_float"] == "right" && $paramssld["ht_view1_filtering_float"] == "top")
//       { $sorting_block_width ="30%"; $filtering_block_width ="100%"; $paramssld["ht_view1_filtering_float"] = "none"; $width_middle = "65%"; }
//    else if($paramssld["ht_view1_filtering_float"] == "left" || $paramssld["ht_view1_filtering_float"] == "right" && $paramssld["ht_view1_sorting_float"] == "top")
//       { $sorting_block_width ="100%"; $filtering_block_width ="30%"; $paramssld["ht_view1_sorting_float"] = "none"; $width_middle = "65%"; }
//    if($paramssld["ht_view1_sorting_float"] == "top" && $paramssld["ht_view1_filtering_float"] == "top")
//       { $sorting_block_width ="100%"; $filtering_block_width ="100%"; $left_to_top = "ok"; }
?>

<style type="text/css">

.zoomContainer {
    z-index: 10;
}

.album_element_<?php echo $albumID; ?> {
  width:<?php echo $paramssld['ht_view1_block_width']; ?>px;
  height:auto;
  margin: 5px;
  float: left;
  overflow: hidden;
  position: relative;
  outline:none; 
  background:#<?php echo $paramssld['ht_view1_element_background_color']?>;
  border:<?php echo $paramssld['ht_view1_element_border_width']; ?>px solid #<?php echo $paramssld['ht_view1_element_border_color']; ?>;
}

.album_default-block_<?php echo $albumID; ?> {
	position:relative;;
	width:<?php echo $paramssld['ht_view1_block_width']; ?>px;
} 

.album_default-block_<?php echo $albumID; ?> .album_image-block_<?php echo $albumID; ?> {
	margin:0px;
	padding:0px;
	line-height:0px;
	border:1px solid #<?php echo $paramssld['ht_view1_element_border_color']; ?>;
}

.album_default-block_<?php echo $albumID; ?> img {
  margin:0px !important;
  padding:0px !important;
  max-width:none !important;
  width:<?php echo $paramssld['ht_view1_block_width']; ?>px !important;
  border-radius:0px;
}

.album_default-block_<?php echo $albumID; ?> .album_title-block_<?php echo $albumID; ?> {
	display:block;
	height:35px;
	padding:10px 0px 0px 0px;
	width:100%;
}

.album_default-block_<?php echo $albumID; ?> .album_title-block_<?php echo $albumID; ?> h3 {
	position:relative;
	margin:0px !important;
	padding:0px 5px 0px 5px !important;
	width:<?php echo $paramssld['ht_view1_block_width']; ?>px !important;
	text-overflow: ellipsis;
	overflow: hidden; 
	white-space:nowrap;
	font-weight:normal;
	color:#<?php echo $paramssld['ht_view1_title_font_color']; ?>;
	font-size:<?php echo $paramssld['ht_view1_title_font_size']; ?>px !important;
	line-height:<?php echo $paramssld['ht_view1_title_font_size']+4; ?>px !important;
}


.album_wd-catalog-panel_<?php echo $albumID; ?> {
	position: relative;
	display:block;
	width:<?php echo $paramssld['ht_view1_block_width']-10; ?>px !important;
	margin:10px 5px 0px 5px;
	padding:0px;
	text-align:left;
}

.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> p,.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> * {	
	text-align:justify;
	font-weight:normal;
	font-size:<?php echo $paramssld['ht_view1_description_font_size']; ?>px !important;
	color:#<?php echo $paramssld['ht_view1_description_color']; ?>;
	margin:0px !important;
	padding:0px !important;
}


.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> h1,
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> h2,
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> h3,
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> h4,
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> h5,
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> h6,
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> p, 
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> strong,
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> span {
	padding:2px !important;
	margin:0px !important;
}

.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> ul,
.album_wd-catalog-panel_<?php echo $albumID; ?> .description-block_<?php echo $albumID; ?> li {
	padding:2px 0px 2px 5px;
	margin:0px 0px 0px 8px;
}


.album_wd-catalog-panel_<?php echo $albumID; ?> .thumbs-list_<?php echo $albumID; ?> {
	list-style:none;
	clear:both;
	display:table;
	width:100%;
	padding:0px;
	margin:3px 0px 0px 0px;
	text-align:center;
}

.album_wd-catalog-panel_<?php echo $albumID; ?> .thumbs-list_<?php echo $albumID; ?> li {
	display:inline-block;
	margin:0px 3px 0px 2px;
}

.album_wd-catalog-panel_<?php echo $albumID; ?> .thumbs-list_<?php echo $albumID; ?> li a {
	display:block;
	width:<?php echo $paramssld['ht_view1_thumbs_width']; ?>px;
	height:<?php echo $paramssld['ht_view1_thumbs_width']; ?>px;
	opacity:0.7;
	display:table;
}

.album_wd-catalog-panel_<?php echo $albumID; ?> .thumbs-list_<?php echo $albumID; ?> li a:hover {
	opacity:1;
}

.album_wd-catalog-panel_<?php echo $albumID; ?> img {
	margin:0px !important;
	padding:0px !important;
	display:table-cell;
	vertical-align:middle;
	width:<?php echo $paramssld['ht_view1_thumbs_width']; ?>px !important;
	max-height:<?php echo $paramssld['ht_view1_thumbs_width']; ?>px !important;
	width:100%;
	height:100%;
}

.album_wd-catalog-panel_<?php echo $albumID; ?> > div {
	padding-top:10px;
	margin-bottom:10px;
	<?php if($paramssld['ht_view1_show_separator_lines']=="on") {?>
		background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center top repeat-x;
	<?php } ?>
}

.album_wd-catalog-panel_<?php echo $albumID; ?> .button-block {
	padding-top:10px;
	margin-bottom:10px;
	
}

.album_wd-catalog-panel_<?php echo $albumID; ?> .button-block a, .album_wd-catalog-panel_<?php echo $albumID; ?> .button-block a:link, .album_wd-catalog-panel_<?php echo $albumID; ?> .button-block a:visited {
	padding:10px;
	display:inline-block;
	font-size:<?php echo $paramssld['ht_view1_linkbutton_font_size']; ?>px;
	background:#<?php echo $paramssld['ht_view1_linkbutton_background_color']; ?>;
	color:#<?php echo $paramssld['ht_view1_linkbutton_color']; ?>;
	padding:6px 12px;
	text-decoration:none;
}

.album_wd-catalog-panel_<?php echo $albumID; ?> .button-block a:hover, .album_wd-catalog-panel_<?php echo $albumID; ?> .button-block a:focus, .album_wd-catalog-panel_<?php echo $albumID; ?> .button-block a:active {
	background:#<?php echo $paramssld['ht_view1_linkbutton_background_hover_color']; ?>;
	color:#<?php echo $paramssld['ht_view1_linkbutton_font_hover_color']; ?>;
	text-decoration:none;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> {
    <?php if ($paramssld["ht_view1_show_sorting"] == 'off')
    echo "display:none;";
    if($paramssld["ht_view1_filtering_float"] == 'left' && $paramssld["ht_view1_sorting_float"] == 'none') { if($catalogShowFiltering == "on") { echo "margin-left: 31%;"; } else echo "margin-left: 1%;"; }
    else if($paramssld["ht_view1_filtering_float"] == 'right' && $paramssld["ht_view1_sorting_float"] == 'none' || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%;"; } ?>
    overflow: hidden;
    margin-top: 5px;
    float: <?php echo $paramssld["ht_view1_sorting_float"]; ?>;
    width:<?php echo $sorting_block_width; ?>;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul {
  margin: 0px !important;
  padding: 0px !important;
  list-style: none;
<?php if($paramssld["ht_view1_sorting_float"] == 'top') {
      echo "float:left;margin-left:1%;";
      } ?>
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?> ul {
  margin: 0px !important;
  padding: 0px !important;
  overflow: hidden;
  <?php if($paramssld["ht_view1_filtering_float"] == 'top') {
      echo "float:left;margin-left:1%;";
      } ?>
}

<?php if($paramssld["ht_view1_sorting_float"] == 'none') { ?>
            #album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul {
                float: left;
            }
    <?php } ?>


#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul li {
    border-radius: <?php echo $paramssld["ht_view1_sortbutton_border_radius"];?>px;
    list-style-type: none;
    margin: 0px !important;
    <?php
        if($sorting_block_width == "100%" ) {
            echo "float:left !important;margin: 4px 8px 4px 0px !important;";
        }
        if($left_to_top == "ok")
        { echo "float:left !important;"; }
        if($paramssld["ht_view1_sorting_float"] == "left" || $paramssld["ht_view1_sorting_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else
        { echo 'border: 1px solid #ccc;'; }
    ?>
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul li a {
    background-color: #<?php echo $paramssld["ht_view1_sortbutton_background_color"];?> !important;
    font-size:<?php echo $paramssld["ht_view1_sortbutton_font_size"];?>px !important;
    color:#<?php echo $paramssld["ht_view1_sortbutton_font_color"];?> !important;
    text-decoration: none;
    cursor: pointer;
    margin: 0px !important;
    display: block;
    padding:3px;
}

/*#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul li:hover {
    
}*/

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul li a:hover {
    background-color: #<?php echo $paramssld["ht_view1_sortbutton_hover_background_color"];?> !important;
    color:#<?php echo $paramssld["ht_view1_sortbutton_hover_font_color"];?> !important;
    cursor: pointer;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?> {
    margin-top: 5px;
    float: <?php echo $paramssld["ht_view1_filtering_float"]; ?>;
    width: <?php echo $filtering_block_width; ?>;
    <?php
        if ($paramssld["ht_view1_show_filtering"] == 'off') echo "display:none;";
        if($paramssld["ht_view1_filtering_float"] == 'none' && $paramssld["ht_view1_sorting_float"] == 'left' ) { if($catalogShowSorting == 'on') { echo "margin-left: 31%;"; } else echo "margin-left: 1%";} 
        if(($paramssld["ht_view1_filtering_float"] == 'none' && ($paramssld["ht_view1_sorting_float"] == 'right')) || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%";}
    ?>
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?> ul li {
    list-style-type: none;
    <?php
        if($filtering_block_width == "100%") { echo "float:left !important;margin: 4px 8px 4px 0px !important;"; }
        if($left_to_top == "ok") { echo "float:left !important;"; }
        if($paramssld["ht_view1_filtering_float"] == "left" || $paramssld["ht_view1_filtering_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else echo "border: 1px solid #ccc;";
    ?>
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?> ul li a {
    font-size:<?php echo $paramssld["ht_view1_filterbutton_font_size"];?>px !important;
    color:#<?php echo $paramssld["ht_view1_filterbutton_font_color"];?> !important;
    background-color: #<?php echo $paramssld["ht_view1_filterbutton_background_color"];?> !important;
    border-radius: <?php echo $paramssld["ht_view1_filterbutton_border_radius"];?>px;
    padding: 3px;
    display: block;
    text-decoration: none;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?>  ul li a:hover {
    color:#<?php echo $paramssld["ht_view1_filterbutton_hover_font_color"];?> !important;
    background-color: #<?php echo $paramssld["ht_view1_filterbutton_hover_background_color"];?> !important;
    cursor: pointer
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> section {
    position:relative;
    display:block;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_container_<?php echo $albumID; ?> {
<?php if($paramssld["ht_view1_sorting_float"] == "left" && $paramssld["ht_view1_filtering_float"] == "right" ||
         $paramssld["ht_view1_sorting_float"] == "right" && $paramssld["ht_view1_filtering_float"] == "left")
       { echo "margin: 0px auto;"; }
       if((($paramssld["ht_view1_filtering_float"] == "left" || $paramssld["ht_view1_filtering_float"] == "right" && $paramssld["ht_view1_sorting_float"] == "top") || ($paramssld["ht_view1_sorting_float"] == "left" || $paramssld["ht_view1_sorting_float"] == "right" && $paramssld["ht_view1_filting_float"] == "top")) && $catalogShowFiltering == "on" && $catalogShowSorting == "on")
       {
?>
    width: <?php echo $width_middle; ?> !important;
 <?php } ?>
}
.zoomContainer {
    z-index: 10;
}

</style>
<section id="album_huge_it_catalog_content_<?php echo $albumID; ?>">
    <?php // if($catalogShowSorting == "on")
//        { ?>
<!--          <div id="album_huge_it_catalog_options_<?php echo $albumID; ?>" class="">
            <ul id="sort-by" class="option-set clearfix" data-option-key="sortBy">
                <li><a href="#sortBy=original-order" data-option-value="original-order" class="selected" data><?php echo $paramssld["ht_view1_sorting_name_by_default"]; ?></a></li>
                <li><a href="#sortBy=id" data-option-value="id"><?php echo $paramssld["ht_view1_sorting_name_by_id"]; ?></a></li>
                <li><a href="#sortBy=symbol" data-option-value="symbol"><?php echo $paramssld["ht_view1_sorting_name_by_name"]; ?></a></li>
                <li id="shuffle"><a href='#shuffle'><?php echo $paramssld["ht_view1_sorting_name_by_random"]; ?></a></li>
            </ul>
              
            <ul id="sort-direction" class="option-set clearfix" data-option-key="sortAscending">
                <li><a href="#sortAscending=true" data-option-value="true" class="selected"><?php echo $paramssld["ht_view1_sorting_name_by_asc"]; ?></a></li>
                <li><a href="#sortAscending=false" data-option-value="false"><?php echo $paramssld["ht_view1_sorting_name_by_desc"]; ?></a></li>
            </ul>
          </div>-->
  <?php // }
//   if($catalogShowFiltering == "on")
//      { ?>
<!--         <div id="album_huge_it_catalog_filters_<?php echo $albumID; ?>" >
            <ul>
                <li rel="*"><a>All</a></li>
                <?php
//                $catalogCats = explode(",", $catalogCats);
//                foreach ($catalogCats as $catalogCatsValue) {
//                    if(!empty($catalogCatsValue))
//                    {
                ?>
                <li rel=".<?php echo str_replace(" ","_",$catalogCatsValue); ?>"><a><?php echo str_replace("_"," ",$catalogCatsValue); ?></a></li>
                    <?php
//                    }
//                }
                ?>
            </ul>
        </div>-->
<?php // } ?>
        <div id="album_huge_it_catalog_container_<?php echo $albumID; ?>" class="super-list variable-sizes clearfix" <?php // if($paramssld["ht_view1_sorting_float"] == "top" && $paramssld["ht_view1_filtering_float"] == "top") echo "style='clear: both;'";?>>
              <?php
              $group_key = 0;
              foreach($catalogsFromAlbumArray as $key=>$row)
              {
                      $group_key++;
                      $descnohtml=strip_tags($row->description);
                      $result = substr($descnohtml, 0, 50);
//                      $catForFilter = explode(",", $row->category);
                      ?>
                      <div class="album_element_<?php echo $albumID; ?>  catalog_album_colorbox_grouping_<?php echo $albumID; ?> " data-symbol="<?php echo $row->name; ?>" data-category="alkaline-earth">
                              <div class="album_default-block_<?php echo $albumID; ?>">
                                      <div class="album_image-block_<?php echo $albumID; ?> for_zoom">
                                            <?php $imgurl=explode(";;;",$row->cat_thumb); ?>
                                            <?php 	if($imgurl[0] != ''){ ?>
                                            <a class="catalog_album_group<?php echo $group_key; ?>" href="<?php echo $imgurl[0]; ?>">
                                                <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo $imgurl[0]; ?>" />
                                            </a>
                                            
                                            <?php } else { ?>
                                            <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo  plugins_url( '' , __FILE__ ); ?>/../images/noimage.png" />
                                            <?php
                                            } ?>	
                                      </div>
                                      <div class="album_title-block_<?php echo $albumID; ?>">
                                              <h3 class="title"><?php echo $row->catalog_name; ?></h3>
                                      </div>
                              </div>

                              <div class="album_wd-catalog-panel_<?php echo $albumID; ?>" id="panel<?php echo $key; ?>">
                              <?php  
                                      if($paramssld['ht_view1_show_description']=='on'){ ?>
                                              <div class="description-block_<?php echo $albumID; ?>">
                                                      <p><?php echo $row->description; ?></p>
                                              </div>
                                      <?php }
                                      if($paramssld['ht_view1_show_thumbs']=='on' and $paramssld['ht_view1_thumbs_position']=="after"){?>
                                      
                                      <?php } 
                                      if($paramssld['ht_view1_show_linkbutton']=='on'){
                                          $page_link = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                                          if (strpos(get_permalink(),'/?') !== false) { $product_page_link = get_permalink()."&single_catalog_id=$row->catalog_id"; } else { $product_page_link = get_permalink()."/?single_catalog_id=$row->catalog_id"; }
                                      ?>
                                              <div class="button-block">
                                                      <a href="<?php echo $product_page_link; ?>" <?php if ($row->link_target=="on"){echo 'target="_blank"';}?>><?php echo $paramssld['ht_view1_linkbutton_text']; ?></a>
                                              </div>
                                      <?php } ?>
                              </div>
                      </div>

                      <?php
              }
              ?>
        </div>
 </section>
    <script>
jQuery(function(){
var defaultBlockWidth=<?php echo $paramssld['ht_view1_block_width']; ?>;
    
    var $container = jQuery('#album_huge_it_catalog_container_<?php echo $albumID; ?>');
    
    
      // add randomish size classes
      $container.find('.album_element_<?php echo $albumID; ?>').each(function(){
        var $this = jQuery(this),
            number = parseInt( $this.find('.number').text(), 10 );
			//alert(number);
        if ( number % 7 % 2 === 1 ) {
          $this.addClass('width2');
        }
        if ( number % 3 === 0 ) {
          $this.addClass('height2');
        }
      });
    
    $container.hugeitmicro({
      itemSelector : '.album_element_<?php echo $albumID; ?>',
      masonry : {
        columnWidth : <?php echo $paramssld['ht_view1_block_width']; ?>+20+<?php echo $paramssld['ht_view1_element_border_width']*2; ?>
      },
      masonryHorizontal : {
        rowHeight: 300+20
      },
      cellsByRow : {
        columnWidth : 300+20,
        rowHeight : 240
      },
      cellsByColumn : {
        columnWidth : 300+20,
        rowHeight : 240
      },
      getSortData : {
        symbol : function( $elem ) {
          return $elem.attr('data-symbol');
        },
        category : function( $elem ) {
          return $elem.attr('data-category');
        },
        number : function( $elem ) {
          return parseInt( $elem.find('.number').text(), 10 );
        },
        weight : function( $elem ) {
          return parseFloat( $elem.find('.weight').text().replace( /[\(\)]/g, '') );
        },
        id : function ( $elem ) {
          return $elem.find('.id').text();
        }
      }
    });
    
    
      var $optionSets = jQuery('#album_huge_it_catalog_options_<?php echo $albumID; ?> .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = jQuery(this);

        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  

        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');

        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {

          changeLayoutMode( $this, options )
        } else {

          $container.hugeitmicro( options );
        }
        
        return false;
      });


    

      var isHorizontal = false;
      function changeLayoutMode( $link, options ) {
        var wasHorizontal = isHorizontal;
        isHorizontal = $link.hasClass('horizontal');

        if ( wasHorizontal !== isHorizontal ) {

          var style = isHorizontal ? 
            { height: '75%', width: $container.width() } : 
            { width: 'auto' };

          $container.filter(':animated').stop();

          $container.addClass('no-transition').css( style );
          setTimeout(function(){
            $container.removeClass('no-transition').hugeitmicro( options );
          }, 100 )
        } else {
          $container.hugeitmicro( options );
        }
      }

    var $sortBy =  jQuery('#album_huge_it_catalog_content_<?php echo $albumID; ?> #sort-by');
    jQuery('#album_huge_it_catalog_content_<?php echo $albumID; ?> #shuffle a').click(function(){
      $container.hugeitmicro('shuffle');
      $sortBy.find('.selected').removeClass('selected');
      $sortBy.find('[data-option-value="random"]').addClass('selected');
      return false;
    });
    
    ////filteringgggggg

        // bind filter on select change
        jQuery(document).ready(function(){
            jQuery('#album_huge_it_catalog_filters_<?php echo $albumID; ?> ul li').click(function() {
              // get filter value from option value
              var filterValue = jQuery(this).attr('rel');
              // use filterFn if matches value
              filterValue = filterValue;//filterFns[ filterValue ] || 
              $container.hugeitmicro({ filter: filterValue });
            });
            <?php // if(($paramssld["ht_view1_sorting_float"] == "left" || $paramssld["ht_view1_sorting_float"] == "right") && $paramssld["ht_view1_filtering_float"] == "none")
//                  { ?>
//                        var topmargin = jQuery("#album_huge_it_catalog_filters_<?php echo $albumID; ?> ul").height();
//                        jQuery("#album_huge_it_catalog_options_<?php echo $albumID; ?>").css({'margin-top':parseInt(topmargin) + 5});
            <?php // }
//            else  {
//                    if(($paramssld["ht_view1_filtering_float"] == "left" || $paramssld["ht_view1_filtering_float"] == "right") && $paramssld["ht_view1_sorting_float"] == "none")
//                      { ?>
//                         var topmargin = jQuery("#album_huge_it_catalog_options_<?php echo $albumID; ?>").height();
//                         jQuery("#album_huge_it_catalog_filters_<?php echo $albumID; ?>").css({'margin-top':'5px'});
                <?php // }
//                  } ?>
        });
        
        jQuery(window).load(function(){

            $container.hugeitmicro({ filter: '*' });
        });
  });
</script>	  
	  <?php
	  
        break;
/////////////////////////////// VIEW 2 Popup /////////////////////////////
		  case 2:
      
	?>
	  

<?php
//    if($paramssld["ht_view2_sorting_float"] == "left" && $paramssld["ht_view2_filtering_float"] == "right" ||
//       $paramssld["ht_view2_sorting_float"] == "right" && $paramssld["ht_view2_filtering_float"] == "left" ||
//       $paramssld["ht_view2_sorting_float"] == $paramssld["ht_view2_filtering_float"])
//       { $sorting_block_width ="20%"; $filtering_block_width ="20%"; $middle_with = "56%"; }
//    else if($paramssld["ht_view2_sorting_float"] == "left" || $paramssld["ht_view2_sorting_float"] == "right" && $paramssld["ht_view2_filtering_float"] == "top")
//       { $sorting_block_width ="30%"; $filtering_block_width ="100%"; $paramssld["ht_view2_filtering_float"] = "none"; $width_middle = "65%"; }
//    else if($paramssld["ht_view2_filtering_float"] == "left" || $paramssld["ht_view2_filtering_float"] == "right" && $paramssld["ht_view2_sorting_float"] == "top")
//       { $sorting_block_width ="100%"; $filtering_block_width ="30%"; $paramssld["ht_view2_sorting_float"] = "none"; $width_middle = "65%"; }
//    if($paramssld["ht_view2_sorting_float"] == "top" && $paramssld["ht_view2_filtering_float"] == "top")
//       { $sorting_block_width ="100%"; $filtering_block_width ="100%"; $left_to_top = "ok"; }
?>

<script>
jQuery(function(){
var defaultBlockWidth=<?php echo $paramssld['ht_view2_element_width']; ?>;
var defaultBlockHeight=<?php echo $paramssld['ht_view2_element_height']; ?>;
    
    var $container = jQuery('#album_huge_it_catalog_container_<?php echo $albumID; ?>');
    
    
      // add randomish size classes
      $container.find('.album_element_<?php echo $albumID; ?>').each(function(){
        var $this = jQuery(this),
            number = parseInt( $this.find('.number').text(), 10 );
			//alert(number);
        if ( number % 7 % 2 === 1 ) {
          $this.addClass('width2');
        }
        if ( number % 3 === 0 ) {
          $this.addClass('height2');
        }
      });
    
    $container.hugeitmicro({
      itemSelector : '.album_element_<?php echo $albumID; ?>',
      masonry : {
        columnWidth : <?php echo $paramssld['ht_view2_element_width']; ?>+20+<?php echo $paramssld['ht_view2_element_border_width']*2; ?>
      },
      masonryHorizontal : {
        rowHeight: 300+20
      },
      cellsByRow : {
        columnWidth : 300+20,
        rowHeight : 240
      },
      cellsByColumn : {
        columnWidth : 300+20,
        rowHeight : 240
      },
      getSortData : {
        symbol : function( $elem ) {
          return $elem.attr('data-symbol');
        },
        category : function( $elem ) {
          return $elem.attr('data-category');
        },
        number : function( $elem ) {
          return parseInt( $elem.find('.number').text(), 10 );
        },
        weight : function( $elem ) {
          return parseFloat( $elem.find('.weight').text().replace( /[\(\)]/g, '') );
        },
        id : function ( $elem ) {
          return $elem.find('.id').text();
        }
      }
    });
    
    
      var $optionSets = jQuery('#album_huge_it_catalog_options_<?php echo $albumID; ?> .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = jQuery(this);

        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  

        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');

        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {

          changeLayoutMode( $this, options )
        } else {

          $container.hugeitmicro( options );
        }
        
        return false;
      });


    

      var isHorizontal = false;
      function changeLayoutMode( $link, options ) {
        var wasHorizontal = isHorizontal;
        isHorizontal = $link.hasClass('horizontal');

        if ( wasHorizontal !== isHorizontal ) {

          var style = isHorizontal ? 
            { height: '75%', width: $container.width() } : 
            { width: 'auto' };

          $container.filter(':animated').stop();

          $container.addClass('no-transition').css( style );
          setTimeout(function(){
            $container.removeClass('no-transition').hugeitmicro( options );
          }, 100 )
        } else {
          $container.hugeitmicro( options );
        }
      }


    

      $container.delegate( '.album_default-block_<?php echo $albumID; ?>', 'click', function(){
          var strheight=0;
          jQuery(this).parents('.album_element_<?php echo $albumID; ?>').find('.album_wd-catalog-panel_<?php echo $albumID; ?> > div').each(function(){
                strheight+=jQuery(this).outerHeight()+10;
                //alert(strheight);
          })
          strheight+=<?php echo $paramssld['ht_view0_block_height']+45; ?>;
	  			if(jQuery(this).parents('.album_element_<?php echo $albumID; ?>').hasClass("large")){
			jQuery(this).parents('.album_element_<?php echo $albumID; ?>').animate({
				height: "<?php echo $paramssld['ht_view0_block_height']+45; ?>px"
			}, 300, function() {
				jQuery(this).removeClass('large');
				$container.hugeitmicro('reLayout');
			});
			
			jQuery(this).parents('.album_element_<?php echo $albumID; ?>').removeClass("active");
			return false;
		}
		
	
		jQuery(this).parents('.album_element_<?php echo $albumID; ?>').css({height:strheight});
		jQuery(this).parents('.album_element_<?php echo $albumID; ?>').addClass('large');

		$container.hugeitmicro('reLayout');
		jQuery(this).parents('.album_element_<?php echo $albumID; ?>').css({height:"<?php echo $paramssld['ht_view0_block_height']+45; ?>px"});		 
		 
		//alert(strheight);
		 
		 jQuery(this).parents('.album_element_<?php echo $albumID; ?>').animate({
			height:strheight+"px",
		  }, 300,function(){	$container.hugeitmicro('reLayout');});
	});

    var $sortBy =  jQuery('#album_huge_it_catalog_content_<?php echo $albumID; ?> #sort-by');
    jQuery('#album_huge_it_catalog_content_<?php echo $albumID; ?> #shuffle a').click(function(){
      $container.hugeitmicro('shuffle');
      $sortBy.find('.selected').removeClass('selected');
      $sortBy.find('[data-option-value="random"]').addClass('selected');
      return false;
    });
    
    jQuery(window).load(function(){
        $container.hugeitmicro({ filter: '*' });
    });
    
    ////filteringgggggg

        // bind filter on select change
        jQuery(document).ready(function(){
            jQuery('#album_huge_it_catalog_filters_<?php echo $albumID; ?> ul li').click(function() {
              // get filter value from option value
              var filterValue = jQuery(this).attr('rel');
              // use filterFn if matches value
              filterValue = filterValue;//filterFns[ filterValue ] || 
              $container.hugeitmicro({ filter: filterValue });
            });
            <?php // if(($paramssld["ht_view2_sorting_float"] == "left" || $paramssld["ht_view2_sorting_float"] == "right") && $paramssld["ht_view2_filtering_float"] == "none")
                  { ?>
//                        var topmargin = jQuery("#album_huge_it_catalog_filters_<?php echo $albumID; ?> ul").height();
//                        jQuery("#album_huge_it_catalog_options_<?php echo $albumID; ?>").css({'margin-top':parseInt(topmargin) + 5});
            <?php }
//            else  {
//                    if(($paramssld["ht_view2_filtering_float"] == "left" || $paramssld["ht_view2_filtering_float"] == "right") && $paramssld["ht_view2_sorting_float"] == "none")
//                      { ?>
//                         var topmargin = jQuery("#album_huge_it_catalog_options_<?php echo $albumID; ?>").height();
//                         jQuery("#album_huge_it_catalog_filters_<?php echo $albumID; ?>").css({'margin-top':'5px'});
                <?php // }
//                  } ?>
        });

  });
  jQuery(document).ready(function(){

	jQuery('.album_element_<?php echo $albumID; ?> .album_image-block_<?php echo $albumID; ?> .image-overlay a').on('click',function(){
		var strid = jQuery(this).attr('href').replace('#','');
		jQuery('body').append('<div id="album_huge-popup-overlay_<?php echo $albumID; ?>"></div>');
		jQuery('#album_huge_it_catalog_popup_list_<?php echo $albumID; ?>').insertBefore('#album_huge-popup-overlay_<?php echo $albumID; ?>');
		var height = jQuery(window).height();
		var width=jQuery(window).width();
		if(width<=767){
			jQuery('body').scrollTop(0);
		}
		jQuery('#album_huge_it_catalog_pupup_element_'+strid).addClass('active').css({height:height*0.7});
		jQuery('#album_huge_it_catalog_popup_list_<?php echo $albumID; ?>').addClass('active');
		
		jQuery('#album_huge_it_catalog_pupup_element_'+strid+' ul.album_thumbs-list_<?php echo $albumID; ?> li:first-child').addClass('active');
		var strsrc=jQuery('#album_huge_it_catalog_pupup_element_'+strid+' ul.album_thumbs-list_<?php echo $albumID; ?> li:first-child a img').attr('src');
		jQuery('#album_huge_it_catalog_pupup_element_'+strid+' .album_image-block_<?php echo $albumID; ?> img').attr('src',strsrc);
		//alert(strsrc);
		return false;
	});
	
	jQuery('#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block ul.album_thumbs-list_<?php echo $albumID; ?> li a').click(function(){
		var width=jQuery(window).width();
		if(width<=767){
			jQuery('body').scrollTop(0);
		}
		jQuery(this).parent().parent().find('li.active').removeClass('active');
		jQuery(this).parent().addClass('active');
		jQuery(this).parents('.right-block').prev().find('img').attr('src',jQuery(this).find('img').attr('src'));
		return false;
	});
	
	jQuery('#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_heading-navigation_<?php echo $albumID; ?> .close').on('click',function(){
		closePopup();
		return false;
	});
	
	jQuery('body').on('click','#album_huge-popup-overlay_<?php echo $albumID; ?>',function(){
		closePopup();
		return false;
	});
	
	function closePopup() {
		jQuery('#album_huge-popup-overlay_<?php echo $albumID; ?>').remove();
		jQuery('#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> li').removeClass('active');
		jQuery('#album_huge_it_catalog_popup_list_<?php echo $albumID; ?>').removeClass('active');
	}        
}); 
</script>

<style type="text/css"> 

.zoomContainer {
    z-index: 10;
}

.album_element_<?php echo $albumID; ?> {
	width:<?php echo $paramssld['ht_view2_element_width']; ?>px;
	height:<?php echo $paramssld['ht_view2_element_height']+45; ?>px;
	margin:0px 0px 10px 0px;
	background:#<?php echo $paramssld['ht_view2_element_background_color']; ?>;
	border:<?php echo $paramssld['ht_view2_element_border_width']; ?>px solid #<?php echo $paramssld['ht_view2_element_border_color']; ?>;
	outline:none;
}

.album_element_<?php echo $albumID; ?> .album_image-block_<?php echo $albumID; ?> {
	position:relative;
	width:100%;
}

.album_element_<?php echo $albumID; ?> .album_image-block_<?php echo $albumID; ?> img {
	margin:0px !important;
	padding:0px !important;
	width:<?php echo $paramssld['ht_view2_element_width']; ?>px !important;
	height:<?php echo $paramssld['ht_view2_element_height']; ?>px !important;
	display:block;
	border-radius: 0px !important;
	box-shadow: 0 0px 0px rgba(0, 0, 0, 0) !important; 
}

.album_element_<?php echo $albumID; ?> .album_image-block_<?php echo $albumID; ?> .image-overlay {
	position:absolute;
	top:0px;
	left:0px;
	width:100%;
	height:100%;
	background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($paramssld['ht_view2_element_overlay_color'],2));
				$titleopacity=$paramssld["ht_view2_element_overlay_transparency"]/100;						
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important'; 		
	?>;
	display:none;
}

.album_element_<?php echo $albumID; ?>:hover .album_image-block_<?php echo $albumID; ?>  .image-overlay {
	display:block;
}

.album_element_<?php echo $albumID; ?> .album_image-block_<?php echo $albumID; ?> .image-overlay a {
	position:absolute;
	top:0px;
	left:0px;
	display:block;
	width:100%;
	height:100%;
	background:url('<?php echo  plugins_url( '../images/zoom.'.$paramssld["ht_view2_zoombutton_style"].'.png' , __FILE__ ); ?>') center center no-repeat;
}

.album_element_<?php echo $albumID; ?> .album_title-block_<?php echo $albumID; ?> {
	position:relative;
	height: 30px;
	margin: 0;
	padding: 15px 0px 15px 0px;
	-webkit-box-shadow: inset 0 1px 0 rgba(0,0,0,.1);
	box-shadow: inset 0 1px 0 rgba(0,0,0,.1);
}

.album_element_<?php echo $albumID; ?> .album_title-block_<?php echo $albumID; ?> h3 {
	position:relative;
	margin:0px !important;
	padding:0px 1% 0px 1% !important;
	width:98%;
	text-overflow: ellipsis;
	overflow: hidden; 
	white-space:nowrap;
	font-weight:normal;
	font-size: <?php echo $paramssld["ht_view2_popup_title_font_size"];?>px !important;
	line-height: <?php echo $paramssld["ht_view2_popup_title_font_size"]+4;?>px !important;
	color:#<?php echo $paramssld["ht_view2_popup_title_font_color"];?>;
}

.album_element_<?php echo $albumID; ?> .album_title-block_<?php echo $albumID; ?> .button-block {
	position:absolute;
	right:0px;
	top:0px;
	display:none;
	vertical-align:middle;
	height:30px;
	padding:10px 10px 4px 10px;
	background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($paramssld['ht_view2_element_overlay_color'],2));
				$titleopacity=$paramssld["ht_view2_element_overlay_transparency"]/100;						
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important'; 		
	?>;
	border-left: 1px solid rgba(0,0,0,.05);
}
.album_element_<?php echo $albumID; ?>:hover .album_title-block_<?php echo $albumID; ?> .button-block {display:block;}

.album_element_<?php echo $albumID; ?> .album_title-block_<?php echo $albumID; ?> a,.album_element_<?php echo $albumID; ?> .album_title-block_<?php echo $albumID; ?> a:link,.album_element_<?php echo $albumID; ?> .album_title-block_<?php echo $albumID; ?> a:visited,
.album_element_<?php echo $albumID; ?> .album_title-block_<?php echo $albumID; ?> a:hover,.album_element_<?php echo $albumID; ?> .album_title-block_<?php echo $albumID; ?> a:focus,.album_element_<?php echo $albumID; ?> .album_title-block_<?php echo $albumID; ?> a:active {
	position:relative;
	display:block;
	vertical-align:middle;
	padding: 3px 10px 3px 10px; 
	border-radius:3px;
	font-size:<?php echo $paramssld["ht_view2_element_linkbutton_font_size"];?>px;
	background:#<?php echo $paramssld["ht_view2_element_linkbutton_background_color"];?>;
	color:#<?php echo $paramssld["ht_view2_element_linkbutton_color"];?>;
	text-decoration:none;
}

/*#####POPUP#####*/

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> {
	position:fixed;
	display:table;
	width:80%;
	top:7%;
	left:7%;
	margin:0px !important;
	list-style:none;
	z-index:2000;
	display:none;
	height:90%;
}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?>.active {display:table;}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> li.pupup-element {
	position:relative;
	display:none;
	width:100%;
	padding:40px 0px 20px 0px;
	min-height:100%;
	position:relative;
	background:#<?php echo $paramssld["ht_view2_popup_background_color"];?>;
}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> li.pupup-element.active {
	display:block;
}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_heading-navigation_<?php echo $albumID; ?> {
	position:absolute;
	width:100%;
	height:40px;
	top:0px;
	left:0px;
	z-index:2001;
	background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center bottom repeat-x;
}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_heading-navigation_<?php echo $albumID; ?> .close,#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_heading-navigation_<?php echo $albumID; ?> .close:link, #album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_heading-navigation_<?php echo $albumID; ?> .close:visited {
	position:relative;
	float:right;
	width:40px;
	height:40px;
	display:block;
	background:url('<?php echo  plugins_url( '../images/close.popup.'.$paramssld["ht_view2_popup_closebutton_style"].'.png' , __FILE__ ); ?>') center center no-repeat;
	border-left:1px solid #ccc;
	opacity:.65;
}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_heading-navigation_<?php echo $albumID; ?> .close:hover, #album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_heading-navigation_<?php echo $albumID; ?> .close:focus, #album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_heading-navigation_<?php echo $albumID; ?> .close:active {opacity:1;}


#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> li.pupup-element .album_popup-wrapper_<?php echo $albumID; ?> {
	overflow-y:scroll;
	position:relative;
	width:96%;
	height:98%;
	padding:2% 2% 0% 2%;
}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .album_image-block_<?php echo $albumID; ?> {
	width:60%;
        <?php if($paramssld['ht_view2_popup_full_width'] == 'off') { echo "height:100%;"; } ?>
	position:relative;
	float:left;
	margin-right:2%;
	border-right:1px solid #ccc;
	min-width:200px;
}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .album_image-block_<?php echo $albumID; ?> img {
        <?php
            if($paramssld['ht_view2_popup_full_width'] == 'off') { echo "max-width:100% !important; max-height:100% !important; margin: 0px auto !important; position:relative;"; }
            else { echo "width:100% !important;"; }
        ?>
	display:block;
	padding:0px !important;
}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block {
	width:37%;
	position:relative;
	float:left;
}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> li.pupup-element .album_popup-wrapper_<?php echo $albumID; ?> .right-block > div {
	padding-top:10px;
	margin-bottom:10px;
	<?php if($paramssld['ht_view2_show_separator_lines']=="on") {?>
		background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center top repeat-x;
	<?php } ?>
}
#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> li.pupup-element .album_popup-wrapper_<?php echo $albumID; ?> .right-block > div:last-child {background:none;}


#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block .title {
	position:relative;
	display:block;
	margin:0px 0px 10px 0px !important;
	font-size:<?php echo $paramssld["ht_view2_element_title_font_sizet"];?>px !important;
	line-height:<?php echo $paramssld["ht_view2_element_title_font_sizet"]+4;?>px !important;
	color:#<?php echo $paramssld["ht_view2_popup_title_font_color"];?>;
}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block .description {
	clear:both;
	position:relative;
	font-weight:normal;
	text-align:justify;
	font-size:<?php echo $paramssld["ht_view2_description_font_size"];?>px !important;
	color:#<?php echo $paramssld["ht_view2_description_color"];?>;
}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block .description h1,
#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block .description h2,
#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block .description h3,
#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block .description h4,
#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block .description h5,
#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block .description h6,
#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block .description p, 
#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block .description strong,
#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block .description span {
	padding:2px !important;
	margin:0px !important;
}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block .description ul,
#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block .description li {
	padding:2px 0px 2px 5px;
	margin:0px 0px 0px 8px;
}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block ul.album_thumbs-list_<?php echo $albumID; ?> {
	list-style:none;
	display:table;
	position:relative;
	clear:both;
	width:100%;
	margin:0px auto;
	padding:0px;
}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block ul.album_thumbs-list_<?php echo $albumID; ?> li {
	display:block;
	float:left;
	width:<?php echo $paramssld["ht_view2_thumbs_width"];?>px;
	height:<?php echo $paramssld["ht_view2_thumbs_height"];?>px;
	margin:0px 2% 5px 1% !important;
	opacity:0.45;
}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block ul.album_thumbs-list_<?php echo $albumID; ?> li.active,#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block ul.album_thumbs-list_<?php echo $albumID; ?> li:hover {
	opacity:1;
}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block ul.album_thumbs-list_<?php echo $albumID; ?> li a {
	display:block;
}

#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block ul.album_thumbs-list_<?php echo $albumID; ?> li img {
	margin:0px !important;
	padding:0px !important;
	width:<?php echo $paramssld["ht_view2_thumbs_width"];?>px !important;
	height:<?php echo $paramssld["ht_view2_thumbs_height"];?>px !important;
}


.pupup-element .button-block {
	position:relative;
}

.pupup-element .button-block a,.pupup-element .button-block a:link,.pupup-element .button-block a:visited{
	position:relative;
	display:inline-block;
	padding:6px 12px;
	background:#<?php echo $paramssld["ht_view2_popup_linkbutton_background_color"];?>;
	color:#<?php echo $paramssld["ht_view2_popup_linkbutton_color"];?>;
	font-size:<?php echo $paramssld["ht_view2_popup_linkbutton_font_size"];?>;
	text-decoration:none;
}

.pupup-element .button-block a:hover,.pupup-element .button-block a:focus,.pupup-element .button-block a:active {
	background:#<?php echo $paramssld["ht_view2_popup_linkbutton_background_hover_color"];?>;
	color:#<?php echo $paramssld["ht_view2_popup_linkbutton_font_hover_color"];?>;
}


#album_huge-popup-overlay_<?php echo $albumID; ?> {
	position:fixed;
	top:0px;
	left:0px;
	width:100%;
	height:100%;
	z-index:199;
	background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($paramssld['ht_view2_popup_overlay_color'],2));
				$titleopacity=$paramssld["ht_view2_popup_overlay_transparency_color"]/100;						
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important'; 		
	?>
}


@media only screen and (max-width: 767px) {
	
	#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> {
		position:absolute;
		left:0px;
		top:0px;
		width:100%;
		height:auto !important;
		left:0px;
	}
	
	#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> li.pupup-element {
		margin:0px;
		height:auto !important;
		position:absolute;
		left:0px;
		top:0px;
	}

	#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> li.pupup-element .album_popup-wrapper_<?php echo $albumID; ?> {
		height:auto !important;
		overflow-y:auto;
	}


	#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .album_image-block_<?php echo $albumID; ?> {
		width:100%;
		float:none;
		clear:both;
		margin-right:0px;
		border-right:0px;
	}

	#album_huge_it_catalog_popup_list_<?php echo $albumID; ?> .album_popup-wrapper_<?php echo $albumID; ?> .right-block {
		width:100%;
		float:none;
		clear:both;
		margin-right:0px;
		border-right:0px;
	}

	#album_huge-popup-overlay_<?php echo $albumID; ?> {
		position:fixed;
		top:0px;
		left:0px;
		width:100%;
		height:100%;
		z-index:199;
	}

}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> {
    <?php if ($paramssld["ht_view2_show_sorting"] == 'off')
    echo "display:none;";
    if($paramssld["ht_view2_filtering_float"] == 'left' && $paramssld["ht_view2_sorting_float"] == 'none') { if($catalogShowFiltering == "on") { echo "margin-left: 30%;"; } else { echo "margin-left: 0%;"; } }
    //else if($paramssld["ht_view2_filtering_float"] == 'right' && $paramssld["ht_view2_sorting_float"] == 'none' || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%;"; } ?>
    overflow: hidden;
    /*margin-top: 5px;*/
    float: <?php echo $paramssld["ht_view2_sorting_float"]; ?>;
    width: <?php echo $sorting_block_width; ?>;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul {
  margin: 0px !important;
  padding: 0px !important;
  list-style: none;
<?php if($paramssld["ht_view2_sorting_float"] == 'top') {
      echo "float:left;margin-left:1%;";
      } ?>
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?> ul {
  margin: 0px !important;
  padding: 0px !important;
  overflow: hidden;
  <?php if($paramssld["ht_view2_filtering_float"] == 'top') {
      echo "float:left;margin-left:1%;";
      } ?>
}

<?php if($paramssld["ht_view2_sorting_float"] == 'none') { ?>
            #album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul {
                float: left;
            }
    <?php } ?>
            
            
#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul li {
    border-radius: <?php echo $paramssld["ht_view2_sortbutton_border_radius"];?>px;
    list-style-type: none;
    margin: 0px !important;
    <?php
        if($sorting_block_width == "100%" ) {
            echo "float:left !important;margin: 4px 8px 4px 0px !important;";
        }
        if($left_to_top == "ok")
        { echo "float:left !important;"; }
        if($paramssld["ht_view2_sorting_float"] == "left" || $paramssld["ht_view2_sorting_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else
        { echo 'border: 1px solid #ccc;'; }
    ?>
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul li a {
    background-color: #<?php echo $paramssld["ht_view2_sortbutton_background_color"];?> !important;
    font-size:<?php echo $paramssld["ht_view2_sortbutton_font_size"];?>px !important;
    color:#<?php echo $paramssld["ht_view2_sortbutton_font_color"];?> !important;
    text-decoration: none;
    cursor: pointer;
    margin: 0px !important;
    display: block;
    padding:3px;
}

/*#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul li:hover {
    
}*/

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul li a:hover {
    background-color: #<?php echo $paramssld["ht_view2_sortbutton_hover_background_color"];?> !important;
    color:#<?php echo $paramssld["ht_view2_sortbutton_hover_font_color"];?> !important;
    cursor: pointer;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?> {
    /*margin-top: 5px;*/
    float: <?php echo $paramssld["ht_view2_filtering_float"]; ?>;
    width: <?php echo $filtering_block_width; ?>;
    <?php
        if ($paramssld["ht_view2_show_filtering"] == 'off') echo "display:none;";
        if($paramssld["ht_view2_filtering_float"] == 'top' && ($paramssld["ht_view2_sorting_float"] == 'left') ) { if($catalogShowSorting == 'on') { echo "margin-left: 31%;"; } else echo "margin-left: 1%"; } 
        //if(($paramssld["ht_view2_filtering_float"] == 'none' && ($paramssld["ht_view2_sorting_float"] == 'right')) || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%";}
    ?>
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?> ul li {
    list-style-type: none;
    <?php
        if($filtering_block_width == "100%") { echo "float:left !important;margin: 4px 8px 4px 0px !important;"; }
        if($left_to_top == "ok") { echo "float:left !important;"; }
        if($paramssld["ht_view2_filtering_float"] == "left" || $paramssld["ht_view2_filtering_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else echo "border: 1px solid #ccc;";
    ?>
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?> ul li a {
    font-size:<?php echo $paramssld["ht_view2_filterbutton_font_size"];?>px !important;
    color:#<?php echo $paramssld["ht_view2_filterbutton_font_color"];?> !important;
    background-color: #<?php echo $paramssld["ht_view2_filterbutton_background_color"];?> !important;
    border-radius: <?php echo $paramssld["ht_view2_filterbutton_border_radius"];?>px;
    padding: 3px;
    display: block;
    text-decoration: none;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?>  ul li a:hover {
    color:#<?php echo $paramssld["ht_view2_filterbutton_hover_font_color"];?> !important;
    background-color: #<?php echo $paramssld["ht_view2_filterbutton_hover_background_color"];?> !important;
    cursor: pointer
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> section {
    position:relative;
    display:block;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_container_<?php echo $albumID; ?> {
<?php if($paramssld["ht_view2_sorting_float"] == "left" && $paramssld["ht_view2_filtering_float"] == "right" ||
         $paramssld["ht_view2_sorting_float"] == "right" && $paramssld["ht_view2_filtering_float"] == "left")
       { echo "margin: 0px auto;"; }
       if((($paramssld["ht_view2_filtering_float"] == "left" || $paramssld["ht_view2_filtering_float"] == "right" && $paramssld["ht_view2_sorting_float"] == "top") || ($paramssld["ht_view2_sorting_float"] == "left" || $paramssld["ht_view2_sorting_float"] == "right" && $paramssld["ht_view2_filting_float"] == "top")) && $catalogShowFiltering == "on" && $catalogShowSorting == "on")
       {
?>
        width: <?php echo $width_middle; ?> !important;
 <?php } ?>
}
.zoomContainer {
    z-index: 10;
}

</style>
    
<section id="album_huge_it_catalog_content_<?php echo $albumID; ?>">
    <?php // if($catalogShowSorting == "on")
//        { ?>
<!--          <div id="album_huge_it_catalog_options_<?php echo $albumID; ?>" class="">
            <ul id="sort-by" class="option-set clearfix" data-option-key="sortBy">
                <li><a href="#sortBy=original-order" data-option-value="original-order" class="selected" data><?php echo $paramssld["ht_view2_sorting_name_by_default"]; ?></a></li>
                <li><a href="#sortBy=id" data-option-value="id"><?php echo $paramssld["ht_view2_sorting_name_by_id"]; ?></a></li>
                <li><a href="#sortBy=symbol" data-option-value="symbol"><?php echo $paramssld["ht_view2_sorting_name_by_name"]; ?></a></li>
                <li id="shuffle"><a href='#shuffle'><?php echo $paramssld["ht_view2_sorting_name_by_random"]; ?></a></li>
            </ul>
              
            <ul id="sort-direction" class="option-set clearfix" data-option-key="sortAscending">
                <li><a href="#sortAscending=true" data-option-value="true" class="selected"><?php echo $paramssld["ht_view2_sorting_name_by_asc"]; ?></a></li>
                <li><a href="#sortAscending=false" data-option-value="false"><?php echo $paramssld["ht_view2_sorting_name_by_desc"]; ?></a></li>
            </ul>
          </div>-->
  <?php // }
//   if($catalogShowFiltering == "on")
//      { ?>
<!--         <div id="album_huge_it_catalog_filters_<?php echo $albumID; ?>">
            <ul>
                <li rel="*"><a>All</a></li>
                <?php
//                $catalogCats = explode(",", $catalogCats);
//                foreach ($catalogCats as $catalogCatsValue) {
//                    if(!empty($catalogCatsValue))
//                    {
                ?>
                <li rel=".<?php echo str_replace(" ","_",$catalogCatsValue); ?>"><a><?php echo str_replace("_"," ",$catalogCatsValue); ?></a></li>
                    <?php
//                    }
//                }
                ?>
            </ul>
        </div>-->
<?php // } ?>
    <div id="album_huge_it_catalog_container_<?php echo $albumID; ?>" class="super-list variable-sizes clearfix" <?php // if($paramssld["ht_view2_sorting_float"] == "top" && $paramssld["ht_view2_filtering_float"] == "top") echo "style='clear: both;'";?> style="margin-top: 5px;">
              <?php
              foreach($catalogsFromAlbumArray as $key=>$row)
              {       
                  $descnohtml=strip_tags($row->description);
                  $result = substr($descnohtml, 0, 50);
//                  $catForFilter = explode(",", $row->category);
                ?>
                      <div class="album_element_<?php echo $albumID; ?> catalog_colorbox_grouping  <?php /* foreach ($catForFilter as $catForFilterValue) { echo str_replace(" ","-",$catForFilterValue)." ";} */?> " tabindex="0" data-symbol="<?php echo $row->name; ?>" data-category="alkaline-earth">
                              <div class="album_image-block_<?php echo $albumID; ?>">
                                      <?php $imgurl=explode(";;;",$row->cat_thumb); // var_dump($imgurl);?>
                                              <?php 	if($imgurl[0] != ''){ ?>
                                              <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo $imgurl[0]; ?>" alt="" />
                                              <?php } else { ?>
                                              <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo  plugins_url( '' , __FILE__ ); ?>/../images/noimage.png" alt="" />
                                              <?php
                                              } ?>	
                                      <div class="image-overlay"><a href="#<?php echo $row->catalog_id; ?>"></a></div>
                              </div>
                              <div class="album_title-block_<?php echo $albumID; ?>">
                                      <h3><?php echo $row->catalog_name; ?></h3>
                                      <?php if($paramssld["ht_view2_element_show_linkbutton"]=='on'){
                                          $page_link = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                                          if (strpos(get_permalink(),'/?') !== false) { $product_page_link = get_permalink()."&single_catalog_id=$row->catalog_id"; } else { $product_page_link = get_permalink()."/?single_catalog_id=$row->catalog_id"; }
                                          ?>
                                              <div class="button-block">
                                                  <a href="<?php echo $product_page_link; ?>" <?php if ($row->link_target=="on"){echo 'target="_blank"';}?> >
                                                      <?php echo $paramssld["ht_view2_element_linkbutton_text"]; ?>
                                                  </a>
                                              </div>
                                      <?php } ?>
                              </div>
                      </div>	
                      <?php
              }?>
              <div style="clear:both;"></div>
        </div>
</section>
<ul id="album_huge_it_catalog_popup_list_<?php echo $albumID; ?>">
    <?php 
        
	foreach($catalogsFromAlbumArray as $key=>$row)
	{
            $imgurl=explode(";;;",$row->cat_thumb);//array_pop($imgurl);
            $descnohtml=strip_tags($row->description);
            $result = substr($descnohtml, 0, 50);
    ?>
		<li class="pupup-element" id="album_huge_it_catalog_pupup_element_<?php echo $row->catalog_id; ?>">
			<div class="album_heading-navigation_<?php echo $albumID; ?>">
				<a href="#close" class="close"></a>
				<div style="clear:both;"></div>
			</div>
			<div class="album_popup-wrapper_<?php echo $albumID; ?>">
				<div class="album_image-block_<?php echo $albumID; ?>">
                                    <?php    if($imgurl[0] != ''){ ?>
                                    <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo $imgurl[0]; ?>" alt="" />
                                    <?php  }
                                    else { ?>
                                    <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo  plugins_url( '' , __FILE__ ); ?>/../images/noimage.png" alt="" />
                                    <?php
                                    } ?>	
                                    <div class="image-overlay"><a href="#<?php echo $row->catalog_id; ?>"></a></div>
                              </div>
				<div class="right-block">
					<?php if($paramssld["ht_view2_show_popup_title"]=='on'){?><h3 class="title"><?php echo $row->catalog_name; ?></h3><?php } ?>
					
					
					<?php if($paramssld["ht_view2_show_description"]=='on'){?><div class="description"><?php echo $row->description; ?></div><?php } ?>
					
                                        <?php if($paramssld["ht_view2_show_popup_linkbutton"]=='on'){
                                          $page_link = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                                          if (strpos(get_permalink(),'/?') !== false) { $product_page_link = get_permalink()."&single_catalog_id=$row->catalog_id"; } else { $product_page_link = get_permalink()."/?single_catalog_id=$row->catalog_id"; }
                                          ?>
                                              <div class="button-block"><a href="<?php echo $product_page_link; ?>" <?php if ($row->link_target=="on"){echo 'target="_blank"';}?> ><?php echo $paramssld["ht_view2_element_linkbutton_text"]; ?></a></div>
                                      <?php } ?>
					<div style="clear:both;"></div>
				</div>
				<div style="clear:both;"></div>
			</div>
		</li>
		<?php
	} ?>
</ul>


	  
  <?php	  
	break;
	////////////////////////////// VIEW 3 FullWidth ////////////////////////////////////////////// 
	case 3:
  ?>

<?php
//    if($paramssld["ht_view3_sorting_float"] == "left" && $paramssld["ht_view3_filtering_float"] == "right" ||
//       $paramssld["ht_view3_sorting_float"] == "right" && $paramssld["ht_view3_filtering_float"] == "left" ||
//       $paramssld["ht_view3_sorting_float"] == $paramssld["ht_view3_filtering_float"])
//       { $sorting_block_width ="20%"; $filtering_block_width ="20%"; $middle_with = "56%"; }
//    else if($paramssld["ht_view3_sorting_float"] == "left" || $paramssld["ht_view3_sorting_float"] == "right" && $paramssld["ht_view3_filtering_float"] == "top")
//       { $sorting_block_width ="30%"; $filtering_block_width ="100%"; $paramssld["ht_view3_filtering_float"] = "none"; $width_middle = "65%"; }
//    else if($paramssld["ht_view3_filtering_float"] == "left" || $paramssld["ht_view3_filtering_float"] == "right" && $paramssld["ht_view3_sorting_float"] == "top")
//       { $sorting_block_width ="100%"; $filtering_block_width ="30%"; $paramssld["ht_view3_sorting_float"] = "none"; $width_middle = "65%"; }
//    if($paramssld["ht_view3_sorting_float"] == "top" && $paramssld["ht_view3_filtering_float"] == "top")
//       { $sorting_block_width ="100%"; $filtering_block_width ="100%"; $left_to_top = "ok"; }
?>

<style type="text/css">
<?php if($paramssld["ht_catalog_zoom_lens_size_fix"] == "true") { ?>

.zoomContainer {
    z-index: 10;
}

.zoomLens {
    width: <?php echo $paramssld["ht_catalog_zoom_lens_width"]; ?>px !important;
    height: <?php echo $paramssld["ht_catalog_zoom_lens_height"]; ?>px !important;
}
<?php } ?>

.album_element_<?php echo $albumID; ?> {
	position: relative;
	width:93%; 
	margin:5px 0px 5px 0px;
	padding:2%;
	clear:both;
	overflow: hidden;
	border:<?php echo $paramssld['ht_view3_element_border_width']; ?>px solid #<?php echo $paramssld['ht_view3_element_border_color']; ?>;
	background:#<?php echo $paramssld['ht_view3_element_background_color']; ?>;
}

.album_element_<?php echo $albumID; ?> > div {
	display:table-cell;
}

.album_element_<?php echo $albumID; ?> div.left-block_<?php echo $albumID; ?> {
	padding-right:10px;
}

.album_element_<?php echo $albumID; ?> div.left-block_<?php echo $albumID; ?> .main-album_image-block_<?php echo $albumID; ?> {
	clear:both;
	width:<?php echo $paramssld['ht_view3_mainimage_width']; ?>px; 
}

.album_element_<?php echo $albumID; ?> div.left-block_<?php echo $albumID; ?> .main-album_image-block_<?php echo $albumID; ?> img {
	margin:0px !important;
	padding:0px !important;
	width:<?php echo $paramssld['ht_view3_mainimage_width']; ?>px !important; 
	height:auto;
}

.album_element_<?php echo $albumID; ?> div.right-block {
	vertical-align:top;
}

.album_element_<?php echo $albumID; ?> div.right-block > div {
	width:100%;
	padding-bottom:10px;
	margin-top:10px;
	<?php if($paramssld['ht_view3_show_separator_lines']=="on") {?>
		background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center bottom repeat-x;
	<?php } ?>	
}

.album_element_<?php echo $albumID; ?> div.right-block > div:last-child {
	background:none;
}

.album_element_<?php echo $albumID; ?> div.right-block .album_title-block_<?php echo $albumID; ?>  {
	margin-top:3px;
}

.album_element_<?php echo $albumID; ?> div.right-block .album_title-block_<?php echo $albumID; ?> h3 {
	margin:0px;
	padding:0px;
	font-weight:normal;
	font-size:<?php echo $paramssld['ht_view3_title_font_size']; ?>px !important;
	line-height:<?php echo $paramssld['ht_view3_title_font_size']+4; ?>px !important;
	color:#<?php echo $paramssld['ht_view3_title_font_color']; ?>;
}

.album_element_<?php echo $albumID; ?> div.right-block .description-block_<?php echo $albumID; ?> p,.album_element_<?php echo $albumID; ?> div.right-block .description-block_<?php echo $albumID; ?> * {
	margin:0px;
	padding:0px;
	font-weight:normal;
	font-size:<?php echo $paramssld['ht_view3_description_font_size']; ?>px;
	color:#<?php echo $paramssld['ht_view3_description_color']; ?>;
}


.album_element_<?php echo $albumID; ?> div.right-block .description-block_<?php echo $albumID; ?> h1,
.album_element_<?php echo $albumID; ?> div.right-block .description-block_<?php echo $albumID; ?> h2,
.album_element_<?php echo $albumID; ?> div.right-block .description-block_<?php echo $albumID; ?> h3,
.album_element_<?php echo $albumID; ?> div.right-block .description-block_<?php echo $albumID; ?> h4,
.album_element_<?php echo $albumID; ?> div.right-block .description-block_<?php echo $albumID; ?> h5,
.album_element_<?php echo $albumID; ?> div.right-block .description-block_<?php echo $albumID; ?> h6,
.album_element_<?php echo $albumID; ?> div.right-block .description-block_<?php echo $albumID; ?> p, 
.album_element_<?php echo $albumID; ?> div.right-block .description-block_<?php echo $albumID; ?> strong,
.album_element_<?php echo $albumID; ?> div.right-block .description-block_<?php echo $albumID; ?> span {
	padding:2px !important;
	margin:0px !important;
}

.album_element_<?php echo $albumID; ?> div.right-block .description-block_<?php echo $albumID; ?> ul,
.album_element_<?php echo $albumID; ?> div.right-block .description-block_<?php echo $albumID; ?> li {
	padding:2px 0px 2px 5px;
	margin:0px 0px 0px 8px;
}

.album_element_<?php echo $albumID; ?> .button-block {
	position:relative;
}

.album_element_<?php echo $albumID; ?> div.right-block .button-block a,.album_element_<?php echo $albumID; ?> div.right-block .button-block a:link,.album_element_<?php echo $albumID; ?> div.right-block .button-block a:visited {
	position:relative;
	display:inline-block;
	padding:6px 12px;
	background:#<?php echo $paramssld["ht_view3_linkbutton_background_color"];?>;
	color:#<?php echo $paramssld["ht_view3_linkbutton_color"];?>;
	font-size:<?php echo $paramssld["ht_view3_linkbutton_font_size"];?>;
	text-decoration:none;
}

.album_element_<?php echo $albumID; ?> div.right-block .button-block a:hover,.pupup-elemen.element div.right-block .button-block a:focus,.album_element_<?php echo $albumID; ?> div.right-block .button-block a:active {
	background:#<?php echo $paramssld["ht_view3_linkbutton_background_hover_color"];?>;
	color:#<?php echo $paramssld["ht_view3_linkbutton_font_hover_color"];?>;
}



@media only screen and (max-width: 767px) {
	
	.album_element_<?php echo $albumID; ?> > div {
		display:block;
		width:100%;
		clear:both;
	}

	.album_element_<?php echo $albumID; ?> div.left-block_<?php echo $albumID; ?> {
		padding-right:0px;
	}

	.album_element_<?php echo $albumID; ?> div.left-block_<?php echo $albumID; ?> .main-album_image-block_<?php echo $albumID; ?> {
		clear:both;
		width:100%; 
	}

	.album_element_<?php echo $albumID; ?> div.left-block_<?php echo $albumID; ?> .main-album_image-block_<?php echo $albumID; ?> img {
		margin:0px !important;
		padding:0px !important;
		width:100% !important;  
		height:auto;
	}
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> {
    <?php if ($paramssld["ht_view3_show_sorting"] == 'off')
    echo "display:none;";
    if($paramssld["ht_view3_filtering_float"] == 'left' && $paramssld["ht_view3_sorting_float"] == 'none') { if($catalogShowFiltering == "on") { echo "margin-left: 30%;"; } else echo "margin-left: 0%;"; }
//    else if($paramssld["ht_view3_filtering_float"] == 'right' && $paramssld["ht_view3_sorting_float"] == 'none' || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%;"; } ?>
    overflow: hidden;
    margin-top: 5px;
    float: <?php echo $paramssld["ht_view3_sorting_float"]; ?>;
    width: <?php echo $sorting_block_width; ?>;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul {
  margin: 0px !important;
  padding: 0px !important;
  list-style: none;
<?php if($paramssld["ht_view3_sorting_float"] == 'top') {
      echo "float:left;margin-left:1%;";
      } ?>
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?> ul {
  margin: 0px !important;
  padding: 0px !important;
  overflow: hidden;
  <?php if($paramssld["ht_view3_filtering_float"] == 'top') {
      echo "float:left;margin-left:1%;";
      } ?>
}

<?php if($paramssld["ht_view3_sorting_float"] == 'none') { ?>
            #album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul {
                float: left;
            }
    <?php } ?>

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul li {
    border-radius: <?php echo $paramssld["ht_view3_sortbutton_border_radius"];?>px;
    list-style-type: none;
    margin: 0px !important;
    <?php
        if($sorting_block_width == "100%" ) {
            echo "float:left !important;margin: 4px 8px 4px 0px !important;";
        }
        if($left_to_top == "ok")
        { echo "float:left !important;"; }
        if($paramssld["ht_view3_sorting_float"] == "left" || $paramssld["ht_view3_sorting_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else
        { echo 'border: 1px solid #ccc;'; }
    ?>
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul li a {
    background-color: #<?php echo $paramssld["ht_view3_sortbutton_background_color"];?> !important;
    font-size:<?php echo $paramssld["ht_view3_sortbutton_font_size"];?>px !important;
    color:#<?php echo $paramssld["ht_view3_sortbutton_font_color"];?> !important;
    text-decoration: none;
    cursor: pointer;
    margin: 0px !important;
    display: block;
    padding:3px;
}

/*#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul li:hover {
    
}*/

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_options_<?php echo $albumID; ?> ul li a:hover {
    background-color: #<?php echo $paramssld["ht_view3_sortbutton_hover_background_color"];?> !important;
    color:#<?php echo $paramssld["ht_view3_sortbutton_hover_font_color"];?> !important;
    cursor: pointer;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?> {
    margin-top: 5px;
    float: <?php echo $paramssld["ht_view3_filtering_float"]; ?>;
   width: <?php echo $filtering_block_width; ?>;
    <?php
        if ($paramssld["ht_view3_show_filtering"] == 'off') echo "display:none;";
        if($paramssld["ht_view3_filtering_float"] == 'none' && ($paramssld["ht_view3_sorting_float"] == 'left') ) { if($catalogShowSorting == 'on') { echo "margin-left: 31%;"; } else echo "margin-left: 1%"; } 
//        if(($paramssld["ht_view3_filtering_float"] == 'none' && ($paramssld["ht_view3_sorting_float"] == 'right')) || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%";}
    ?>
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?> ul li {
    list-style-type: none;
    <?php
        if($filtering_block_width == "100%") { echo "float:left !important;margin: 4px 8px 4px 0px !important;"; }
        if($left_to_top == "ok") { echo "float:left !important;"; }
        if($paramssld["ht_view3_filtering_float"] == "left" || $paramssld["ht_view3_filtering_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else echo "border: 1px solid #ccc;";
    ?>
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?> ul li a {
    font-size:<?php echo $paramssld["ht_view3_filterbutton_font_size"];?>px !important;
    color:#<?php echo $paramssld["ht_view3_filterbutton_font_color"];?> !important;
    background-color: #<?php echo $paramssld["ht_view3_filterbutton_background_color"];?> !important;
    border-radius: <?php echo $paramssld["ht_view3_filterbutton_border_radius"];?>px;
    padding: 3px;
    display: block;
    text-decoration: none;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_filters_<?php echo $albumID; ?>  ul li a:hover {
    color:#<?php echo $paramssld["ht_view3_filterbutton_hover_font_color"];?> !important;
    background-color: #<?php echo $paramssld["ht_view3_filterbutton_hover_background_color"];?> !important;
    cursor: pointer;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> section {
    position:relative;
    display:block;
}

#album_huge_it_catalog_content_<?php echo $albumID; ?> #album_huge_it_catalog_container_<?php echo $albumID; ?> {

    <?php
        if($paramssld["ht_view3_sorting_float"] == "left" && $paramssld["ht_view3_filtering_float"] == "right" ||
           $paramssld["ht_view3_sorting_float"] == "right" && $paramssld["ht_view3_filtering_float"] == "left")
        { ?>
            margin-left: 21%;
            <?php } 
            if((($paramssld["ht_view3_filtering_float"] == "left" || $paramssld["ht_view3_filtering_float"] == "right" && $paramssld["ht_view3_sorting_float"] == "top") || ($paramssld["ht_view3_sorting_float"] == "left" || $paramssld["ht_view3_sorting_float"] == "right" && $paramssld["ht_view3_filting_float"] == "top")) && $catalogShowFiltering == "on" && $catalogShowSorting == "on")
                 { ?>
                  width: <?php echo $width_middle; ?> !important;
           <?php } ?>
}
.zoomContainer {
    z-index: 10;
}

</style>
      
<section id="album_huge_it_catalog_content_<?php echo $albumID; ?>">
    <?php // if($catalogShowSorting == "on")
//        { ?>
<!--          <div id="album_huge_it_catalog_options_<?php echo $albumID; ?>" class="">
            <ul id="sort-by" class="option-set clearfix" data-option-key="sortBy">
                <li><a href="#sortBy=original-order" data-option-value="original-order" class="selected" data><?php echo $paramssld["ht_view3_sorting_name_by_default"]; ?></a></li>
                <li><a href="#sortBy=id" data-option-value="id"><?php echo $paramssld["ht_view3_sorting_name_by_id"]; ?></a></li>
                <li><a href="#sortBy=symbol" data-option-value="symbol"><?php echo $paramssld["ht_view3_sorting_name_by_name"]; ?></a></li>
                <li id="shuffle"><a href='#shuffle'><?php echo $paramssld["ht_view3_sorting_name_by_random"]; ?></a></li>
            </ul>
              
            <ul id="sort-direction" class="option-set clearfix" data-option-key="sortAscending">
                <li><a href="#sortAscending=true" data-option-value="true" class="selected"><?php echo $paramssld["ht_view3_sorting_name_by_asc"]; ?></a></li>
                <li><a href="#sortAscending=false" data-option-value="false"><?php echo $paramssld["ht_view3_sorting_name_by_desc"]; ?></a></li>
            </ul>
          </div>-->
  <?php // }
//   if($catalogShowFiltering == "on")
//      { ?>
<!--         <div id="album_huge_it_catalog_filters_<?php echo $albumID; ?>">
            <ul>
                <li rel="*"><a>All</a></li>
                <?php
//                $catalogCats = explode(",", $catalogCats);
//                foreach ($catalogCats as $catalogCatsValue) {
//                    if(!empty($catalogCatsValue))
//                    {
                ?>
                <li rel=".<?php // echo str_replace(" ","_",$catalogCatsValue); ?>"><a><?php // echo str_replace("_"," ",$catalogCatsValue); ?></a></li>
                    <?php
//                    }
//                }
                ?>
            </ul>
        </div>-->
<?php // } ?>
    <?php // if($paramssld["ht_view3_sorting_float"] == "top" && $paramssld["ht_view3_filtering_float"] == "top") echo "style='clear: both;'";?>
        <div id="album_huge_it_catalog_container_<?php echo $albumID; ?>" class="super-list variable-sizes clearfix" >
              <?php
              $group_key = 0;
              foreach($catalogsFromAlbumArray as $key=>$row)
              {
                      $group_key++;
//                      $link = $row->sl_url;
//                      $catForFilter = explode(",", $row->category);
                      ?>
                      <div class="album_element_<?php echo $albumID; ?> catalog_album_colorbox_grouping_<?php echo $albumID; ?> " data-symbol="<?php echo $row->name; ?>" data-category="alkaline-earth">
                              <div class="left-block_<?php echo $albumID; ?>">
                                      <div class="main-album_image-block_<?php echo $albumID; ?> for_zoom">
                                            <?php $imgurl=explode(";;;",$row->cat_thumb); ?>
                                            <?php 	if($row->cat_thumb != ''){ ?>
                                            <a href="<?php echo $imgurl[0]; ?>" class="catalog_album_group<?php echo $group_key; ?>"><img id="wd-cl-img<?php echo $key; ?>"src="<?php echo $imgurl[0]; ?>"></a>
                                            <?php } else { ?>
                                                <a href="<?php echo  plugins_url( '' , __FILE__ ); ?>/../images/noimage.png" class="catalog_album_group<?php echo $group_key; ?>"><img id="wd-cl-img<?php echo $key; ?>" src="<?php echo  plugins_url( '' , __FILE__ ); ?>/../images/noimage.png"></a>
                                            <?php
                                            }
                                            ?>
                                      </div>
                              </div>
                              <div class="right-block">
                                <?php if($row->name!=''){?><div class="album_title-block_<?php echo $albumID; ?>"><h3><?php echo $row->catalog_name; ?></h3></div><?php } ?>
                                <?php
                                if($paramssld["ht_view3_show_description"] == 'on')
                                    {
                                      if($row->description!='')
                                          { ?>
                                          <div class="description-block_<?php echo $albumID; ?>"><p><?php echo $row->description; ?></p></div>
                                    <?php } ?>
                              <?php }

//                                      if($paramssld["ht_view3_show_linkbutton"] == 'on') {
                                          $page_link = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                                          if (strpos(get_permalink(),'/?') !== false) { $product_page_link = get_permalink()."&single_catalog_id=$row->catalog_id"; } else { $product_page_link = get_permalink()."/?single_catalog_id=$row->catalog_id"; }
                              ?>
                                          <div class="button-block">
                                                  <a href="<?php echo $product_page_link; ?>" <?php if ($row->link_target=="on"){ echo 'target="_blank"';}?>><?php echo $paramssld["ht_view3_linkbutton_text"]; ?></a>
                                          </div>
                              </div>
                      </div>

          <?php
              }
              ?>

        </div>
 </section>
  
<script>
jQuery(function(){
    var defaultBlockWidth=<?php echo $paramssld['ht_view3_mainimage_width']; ?>;
    
    var $container = jQuery('#album_huge_it_catalog_container_<?php echo $albumID; ?>');
    
    
      // add randomish size classes
      $container.find('.album_element_<?php echo $albumID; ?>').each(function(){
        var $this = jQuery(this),
            number = parseInt( $this.find('.number').text(), 10 );
			//alert(number);
        if ( number % 7 % 2 === 1 ) {
          $this.addClass('width2');
        }
        if ( number % 3 === 0 ) {
          $this.addClass('height2');
        }
      });
    
    $container.hugeitmicro({
      itemSelector : '.album_element_<?php echo $albumID; ?>',
      masonry : {
        columnWidth : <?php echo $paramssld['ht_view3_mainimage_width']; ?>+20+<?php echo $paramssld['ht_view3_element_border_width']*2; ?>
      },
      masonryHorizontal : {
        rowHeight: 300+20
      },
      cellsByRow : {
        columnWidth : 300+20,
        rowHeight : 240
      },
      cellsByColumn : {
        columnWidth : 300+20,
        rowHeight : 240
      },
      getSortData : {
        symbol : function( $elem ) {
          return $elem.attr('data-symbol');
        },
        category : function( $elem ) {
          return $elem.attr('data-category');
        },
        number : function( $elem ) {
          return parseInt( $elem.find('.number').text(), 10 );
        },
        weight : function( $elem ) {
          return parseFloat( $elem.find('.weight').text().replace( /[\(\)]/g, '') );
        },
        id : function ( $elem ) {
          return $elem.find('.id').text();
        }
      }
    });
    
    
      var $optionSets = jQuery('#album_huge_it_catalog_options_<?php echo $albumID; ?> .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = jQuery(this);

        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  

        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');

        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {

          changeLayoutMode( $this, options )
        } else {

          $container.hugeitmicro( options );
        }
        
        return false;
      });


    

      var isHorizontal = false;
      function changeLayoutMode( $link, options ) {
        var wasHorizontal = isHorizontal;
        isHorizontal = $link.hasClass('horizontal');

        if ( wasHorizontal !== isHorizontal ) {

          var style = isHorizontal ? 
            { height: '75%', width: $container.width() } : 
            { width: 'auto' };

          $container.filter(':animated').stop();

          $container.addClass('no-transition').css( style );
          setTimeout(function(){
            $container.removeClass('no-transition').hugeitmicro( options );
          }, 100 )
        } else {
          $container.hugeitmicro( options );
        }
      }


    

      $container.delegate( '.album_default-block_<?php echo $albumID; ?>', 'click', function(){
          var strheight=0;
          jQuery(this).parents('.album_element_<?php echo $albumID; ?>').find('.album_wd-catalog-panel_<?php echo $albumID; ?> > div').each(function(){
                strheight+=jQuery(this).outerHeight()+10;
                //alert(strheight);
          })
          strheight+=<?php echo $paramssld['ht_view0_block_height']+45; ?>;
	  			if(jQuery(this).parents('.album_element_<?php echo $albumID; ?>').hasClass("large")){
			jQuery(this).parents('.album_element_<?php echo $albumID; ?>').animate({
				height: "<?php echo $paramssld['ht_view0_block_height']+45; ?>px"
			}, 300, function() {
				jQuery(this).removeClass('large');
				$container.hugeitmicro('reLayout');
			});
			
			jQuery(this).parents('.album_element_<?php echo $albumID; ?>').removeClass("active");
			return false;
		}
		
	
		jQuery(this).parents('.album_element_<?php echo $albumID; ?>').css({height:strheight});
		jQuery(this).parents('.album_element_<?php echo $albumID; ?>').addClass('large');

		$container.hugeitmicro('reLayout');
		jQuery(this).parents('.album_element_<?php echo $albumID; ?>').css({height:"<?php echo $paramssld['ht_view0_block_height']+45; ?>px"});		 
		 
		//alert(strheight);
		 
		 jQuery(this).parents('.album_element_<?php echo $albumID; ?>').animate({
			height:strheight+"px",
		  }, 300,function(){	$container.hugeitmicro('reLayout');});
	});

    var $sortBy =  jQuery('#album_huge_it_catalog_content_<?php echo $albumID; ?> #sort-by');
    jQuery('#album_huge_it_catalog_content_<?php echo $albumID; ?> #shuffle a').click(function(){
      $container.hugeitmicro('shuffle');
      $sortBy.find('.selected').removeClass('selected');
      $sortBy.find('[data-option-value="random"]').addClass('selected');
      return false;
    });
    
    ////filteringgggggg

        // bind filter on select change
        jQuery(document).ready(function(){
            jQuery('#album_huge_it_catalog_filters_<?php echo $albumID; ?> ul li').click(function() {
              // get filter value from option value
              var filterValue = jQuery(this).attr('rel');
              // use filterFn if matches value
              filterValue = filterValue;//filterFns[ filterValue ] || 
              $container.hugeitmicro({ filter: filterValue });
            });
            <?php // if(($paramssld["ht_view3_sorting_float"] == "left" || $paramssld["ht_view3_sorting_float"] == "right") && $paramssld["ht_view3_filtering_float"] == "none")
//                  { ?>
//                        var topmargin = jQuery("#album_huge_it_catalog_filters_<?php echo $albumID; ?> ul").height();
//                        jQuery("#album_huge_it_catalog_options_<?php echo $albumID; ?>").css({'margin-top':parseInt(topmargin) + 5});
            <?php // }
//            else  {
//                    if(($paramssld["ht_view3_filtering_float"] == "left" || $paramssld["ht_view3_filtering_float"] == "right") && $paramssld["ht_view3_sorting_float"] == "none")
//                      { ?>
//                         var topmargin = jQuery("#album_huge_it_catalog_options_<?php echo $albumID; ?>").height();
//                         jQuery("#album_huge_it_catalog_filters_<?php echo $albumID; ?>").css({'margin-top':'5px'});
                <?php // }
//                  } ?>
           
           
//           jQuery("#album_huge_it_catalog_content_<?php echo $albumID; ?> .album_element_<?php echo $albumID; ?> .button-block a").click(function(){
//               alert("kpar");
//           });

        });
        
        //end of filtering
        
        jQuery(window).load(function(){
		$container.hugeitmicro('reLayout');
		jQuery(window).resize(function(){$container.hugeitmicro('reLayout');});
	});

  });
</script>
	  
	  <?php
	    
        break;
		

?>
  
	  <?php
	  
        break;
/////////////////////////////////// VIEW 5 Slider ////////////////////////////////////
		case 5;
?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.0.0/animate.min.css">
  <link href="<?php echo plugins_url('../style/liquid-slider.css', __FILE__);?>" rel="stylesheet" type="text/css" />
 
<style>

.zoomContainer {
    z-index: 10;
}

#album_main-slider_<?php echo $albumID; ?>-wrapper .ls-nav { display: none; }
#album_main-slider_<?php echo $albumID; ?> {background:#<?php echo $paramssld["ht_view5_slider_background_color"];?>;}

#album_main-slider_<?php echo $albumID; ?> div.slider-content {
	position:relative;
	width:100%;
	padding:0px 0px 0px 0px;
	position:relative;
	background:#<?php echo $paramssld["ht_view5_slider_background_color"];?>;
}



[class$="-arrow"] {
	background-image:url(<?php echo plugins_url('../images/arrow.'.$paramssld["ht_view5_icons_style"].'.png', __FILE__);?>);
}

.ls-select-box {
	background:url(<?php echo plugins_url('../images/menu.'.$paramssld["ht_view5_icons_style"].'.png', __FILE__);?>) right center no-repeat #<?php echo $paramssld["ht_view5_slider_background_color"];?>;
}

#album_main-slider_<?php echo $albumID; ?>-nav-select {
	color:#<?php echo $paramssld["ht_view5_title_font_color"];?>;
}

#album_main-slider_<?php echo $albumID; ?> div.slider-content .slider-content-wrapper {
	position:relative;
	width:100%;
	padding:0px;
	display:block;
}

#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .album_image-block_<?php echo $albumID; ?> {
	width:<?php echo $paramssld["ht_view5_main_image_width"];?>px;
	display:table-cell;
	padding:0px 10px 0px 0px;
	float:left;
}

#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .album_image-block_<?php echo $albumID; ?> img.main-image {
	position:relative !important;
	width:100%;
	height:auto;
	display:block;
}

#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .album_image-block_<?php echo $albumID; ?> ul.album_thumbs-list_<?php echo $albumID; ?> {
	list-style:none;
	display:table;
	position:relative;
	clear:both;
	width:100%;
	margin:10px 0px 0px 0px;
	padding:0px;
	clear:both;
}

#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .album_image-block_<?php echo $albumID; ?> ul.album_thumbs-list_<?php echo $albumID; ?> li {
	display:block;
	float:left;
	width:<?php echo $paramssld["ht_view5_thumbs_width"];?>px;
	height:<?php echo $paramssld["ht_view5_thumbs_height"];?>px;
	margin:0px 2% 5px 1%;
	opacity:0.45;
}

#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .album_image-block_<?php echo $albumID; ?> ul.album_thumbs-list_<?php echo $albumID; ?> li.active,#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .album_image-block_<?php echo $albumID; ?> ul.album_thumbs-list_<?php echo $albumID; ?> li:hover {
	opacity:1;
}

#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .album_image-block_<?php echo $albumID; ?> ul.album_thumbs-list_<?php echo $albumID; ?> li a {
	display:block;
}

#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .album_image-block_<?php echo $albumID; ?> ul.album_thumbs-list_<?php echo $albumID; ?> li img {
	margin:0px !important;
	padding:0px !important;
	width:<?php echo $paramssld["ht_view5_thumbs_width"];?>px !important;
	height:<?php echo $paramssld["ht_view5_thumbs_height"];?>px !important;
}

#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .right-block {
	display:table-cell;
}

#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .right-block > div {
	padding-bottom:10px;
	margin-top:10px;
	<?php if($paramssld['ht_view5_show_separator_lines']=="on") {?>
		background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center bottom repeat-x;
	<?php } ?>
}
#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .right-block > div:last-child {background:none;}


#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .right-block .title {
	position:relative;
	display:block;
	margin:-10px 0px 0px 0px;
	font-size:<?php echo $paramssld["ht_view5_title_font_size"];?>px !important;
	line-height:<?php echo $paramssld["ht_view5_title_font_size"]+4;?>px !important;
	color:#<?php echo $paramssld["ht_view5_title_font_color"];?>;
}

#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .right-block .description {
	clear:both;
	position:relative;
	font-weight:normal;
	text-align:justify;
	font-size:<?php echo $paramssld["ht_view5_description_font_size"];?>px !important;
	line-height:<?php echo $paramssld["ht_view5_description_font_size"]+4;?>px !important;
	color:#<?php echo $paramssld["ht_view5_description_color"];?>;
}

#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .right-block .description h1,
#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .right-block .description h2,
#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .right-block .description h3,
#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .right-block .description h4,
#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .right-block .description h5,
#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .right-block .description h6,
#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .right-block .description p, 
#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .right-block .description strong,
#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .right-block .description span {
	padding:2px !important;
	margin:0px !important;
}

#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .right-block .description ul,
#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .right-block .description li {
	padding:2px 0px 2px 5px;
	margin:0px 0px 0px 8px;
}



#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .button-block {
	position:relative;
}

#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .button-block a,#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .button-block a:link,#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .button-block a:visited{
	position:relative;
	display:inline-block;
	padding:6px 12px;
	background:#<?php echo $paramssld["ht_view5_linkbutton_background_color"];?>;
	color:#<?php echo $paramssld["ht_view5_linkbutton_color"];?>;
	font-size:<?php echo $paramssld["ht_view5_linkbutton_font_size"];?>;
	text-decoration:none;
}

#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .button-block a:hover,#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .button-block a:focus,#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .button-block a:active {
	background:#<?php echo $paramssld["ht_view5_linkbutton_background_hover_color"];?>;
	color:#<?php echo $paramssld["ht_view5_linkbutton_font_hover_color"];?>;
}

@media only screen and (min-width:500px) {
	#main-slider-nav-ul {
		visibility:hidden !important;
		height:1px;
	}
}

@media only screen and (max-width:500px) {
	#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .album_image-block_<?php echo $albumID; ?>,#album_main-slider_<?php echo $albumID; ?> .slider-content-wrapper .right-block {
		width:100%;
		display:block;
		float:none;
		clear:both;
	}
}
</style>
<div id="album_main-slider_<?php echo $albumID; ?>" class="liquid-slider">
	<?php
	$group_key = 0;
	foreach($catalogsFromAlbumArray as $key=>$row)
	{            //var_dump($row);
                $group_key++;
		$imgurl=explode(";;;",$row->cat_thumb);
		$link = $row->sl_url;
		$descnohtml=strip_tags($row->description);
		$result = substr($descnohtml, 0, 50);
		?>
		<div class="slider-content class_for_catalog_slider_count">
			<div class="slider-content-wrapper">
				<div class="album_image-block_<?php echo $albumID; ?>  for_zoom">
					<?php 	if($imgurl[0] != ''){ ?>
					<a class="catalog_album_slider_group<?php echo $group_key; ?>" href="<?php echo $imgurl[0]; ?>">
                                            <img class="main-image" src="<?php echo $imgurl[0]; ?>" alt="" />
                                        </a>
					<?php } else { ?>
                                        <a class="catalog_album_slider_group<?php echo $group_key; ?>" href="<?php echo  plugins_url( '' , __FILE__ ); ?>/../images/noimage.png">
                                            <img class="main-image" src="<?php echo  plugins_url( '' , __FILE__ ); ?>/../images/noimage.png" alt="" />
                                        </a>
					<?php } ?>
                                        
                                </div>
				<div class="right-block">
					<div><h2 class="title"><?php echo $row->catalog_name; ?></h2></div>
					<?php if($paramssld["ht_view5_show_description"]=='on'){?><div class="description"><?php echo $row->description; ?></div><?php } ?>
					
                                        <?php if($paramssld["ht_view5_show_linkbutton"]=='on'){
                                            $page_link = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                                            if (strpos(get_permalink(),'/?') !== false) { $product_page_link = get_permalink()."&single_catalog_id=$row->catalog_id"; } else { $product_page_link = get_permalink()."/?single_catalog_id=$row->catalog_id"; }
                                        ?>
						<div class="button-block">
							<a class="" href="<?php echo $product_page_link; ?>"  <?php if ($row->link_target=="on"){echo 'target="_blank"';}?>><?php echo $paramssld["ht_view5_linkbutton_text"]; ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php
	} ?>
</div>
  <script src="<?php echo plugins_url('../js/jquery.liquid-slider.min.js', __FILE__);?>"></script>  
   <script>
    /**
     * If you need to access the internal property or methods, use this:
     * var api = $.data( jQuery('#album_main-slider_<?php echo $albumID; ?>')[0], 'liquidSlider');
     * console.log(api);
     */
	 jQuery('#album_main-slider_<?php echo $albumID; ?>').liquidSlider();
         
  </script>
<?php  
        break;
   ?>




<?php 
}
 ?>
   
	
      <?php   
	return ob_get_clean();
}
    
    

?>