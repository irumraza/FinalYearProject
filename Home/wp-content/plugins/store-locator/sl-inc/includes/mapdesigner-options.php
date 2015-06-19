<?php
//MapDesigner Options

###Data - Form Inputs###
$icon_str="";$icon2_str="";

$icon_dir=opendir(SL_ICONS_PATH."/"); 
while (false !== ($an_icon=readdir($icon_dir))) {
	if (!preg_match("@^\.{1,2}.*$@", $an_icon) && !preg_match("@shadow@", $an_icon) && !preg_match("@\.db@", $an_icon)) {

		$icon_str.="<img style='height:25px; cursor:hand; cursor:pointer; border:solid white 2px; padding:2px' src='".SL_ICONS_BASE."/$an_icon' onclick='document.forms[\"mapDesigner\"].icon.value=this.src;document.getElementById(\"prev\").src=this.src;' onmouseover='style.borderColor=\"red\";' onmouseout='style.borderColor=\"white\";'>";
	}
}
if (is_dir(SL_CUSTOM_ICONS_PATH)) {
	$icon_upload_dir=opendir(SL_CUSTOM_ICONS_PATH);
	while (false !== ($an_icon=readdir($icon_upload_dir))) {
		if (!preg_match("@^\.{1,2}.*$@", $an_icon) && !preg_match("@shadow@", $an_icon) && !preg_match("@\.db@", $an_icon)) {

			$icon_str.="<img style='height:25px; cursor:hand; cursor:pointer; border:solid white 2px; padding:2px' src='".SL_CUSTOM_ICONS_BASE."/$an_icon' onclick='document.forms[\"mapDesigner\"].icon.value=this.src;document.getElementById(\"prev\").src=this.src;' onmouseover='style.borderColor=\"red\";' onmouseout='style.borderColor=\"white\";'>";
		}
	}
}

$icon_dir=opendir(SL_ICONS_PATH."/");
while (false !== ($an_icon=readdir($icon_dir))) {
	if (!preg_match("@^\.{1,2}.*$@", $an_icon) && !preg_match("@shadow@", $an_icon) && !preg_match("@\.db@", $an_icon)) {

		$icon2_str.="<img style='height:25px; cursor:hand; cursor:pointer; border:solid white 2px; padding:2px' src='".SL_ICONS_BASE."/$an_icon' onclick='document.forms[\"mapDesigner\"].icon2.value=this.src;document.getElementById(\"prev2\").src=this.src;' onmouseover='style.borderColor=\"red\";' onmouseout='style.borderColor=\"white\";'>";
	}
}
if (is_dir(SL_CUSTOM_ICONS_PATH)) {
	$icon_upload_dir=opendir(SL_CUSTOM_ICONS_PATH);
	while (false !== ($an_icon=readdir($icon_upload_dir))) {
		if (!preg_match("@^\.{1,2}.*$@", $an_icon) && !preg_match("@shadow@", $an_icon) && !preg_match("@\.db@", $an_icon)) {

			$icon2_str.="<img style='height:25px; cursor:hand; cursor:pointer; border:solid white 2px; padding:2px' src='".SL_CUSTOM_ICONS_BASE."/$an_icon' onclick='document.forms[\"mapDesigner\"].icon2.value=this.src;document.getElementById(\"prev2\").src=this.src;' onmouseover='style.borderColor=\"red\";' onmouseout='style.borderColor=\"white\";'>";
		}
	}
}

if (is_dir(SL_THEMES_PATH)) {
	$theme_dir=opendir(SL_THEMES_PATH); 
	$theme_str="";
	while (false !== ($a_theme=readdir($theme_dir))) {
		if (!preg_match("@^\.{1,2}.*$@", $a_theme) && !preg_match("@\.(php|txt|htm(l)?)@", $a_theme)) {

			$selected=($a_theme==$sl_vars['theme'])? " selected " : "";
			$theme_str.="<option value='$a_theme' $selected>$a_theme</option>\n";
		}
	}
}

$zl_arr=array();
for ($i=0; $i<=19; $i++) {
	$zl_arr[]=$i;
}

$zoom="<select name='zoom_level'>";
foreach ($zl_arr as $value) {
	$zoom.="<option value='$value' ";
	if ($sl_vars['zoom_level']==$value){ $zoom.=" selected ";}
	$zoom.=">$value</option>";
}
$zoom.="</select>";

$checked=($sl_vars['use_city_search']==1)? " checked " : "";
$checked2="";
//$checked2=($sl_vars['use_name_search']==1)? " checked " : "";
$checked3=($sl_vars['remove_credits']==1)? " checked " : "";
$checked4=($sl_vars['load_locations_default']==1)? " checked " : "";
$checked5=($sl_vars['map_overview_control']==1)? " checked " : "";
$checked6=($sl_vars['geolocate']==1)? " checked " : "";
$checked7=($sl_vars['load_results_with_locations_default']==1)? " checked " : "";

if (isset($sl_vars['scripts_load']) && $sl_vars['scripts_load']=='all'){
	$checked_all=" checked='checked' onclick='jQuery(\"#scripts_load_selective_tr\").fadeOut()' ";
	$checked_selective="onclick='jQuery(\"#scripts_load_selective_tr\").fadeIn()'";
	$hidden_selective_tr="style='display:none;'";
} else {
	$checked_all=" onclick='jQuery(\"#scripts_load_selective_tr\").fadeOut()' "; 
	$checked_selective=" checked='checked' onclick='jQuery(\"#scripts_load_selective_tr\").fadeIn()' ";
	$hidden_selective_tr="";
}
$checked_home=(isset($sl_vars['scripts_load_home']) && $sl_vars['scripts_load_home']==1)? " checked " : "";
$checked_archives_404=(isset($sl_vars['scripts_load_archives_404']) && $sl_vars['scripts_load_archives_404']==1)? " checked " : "";

$map_type["".__("Normal", SL_TEXT_DOMAIN).""]="google.maps.MapTypeId.ROADMAP";
$map_type["".__("Normal + Terrain (Physical)", SL_TEXT_DOMAIN).""]="google.maps.MapTypeId.TERRAIN";
$map_type["".__("Satellite", SL_TEXT_DOMAIN).""]="google.maps.MapTypeId.SATELLITE";
$map_type["".__("Satellite + Labels (Hybrid)", SL_TEXT_DOMAIN).""]="google.maps.MapTypeId.HYBRID";
$map_type_options="";

foreach($map_type as $key=>$value) {
	$selected2=($sl_vars['map_type']==$value)? " selected " : "";
	$map_type_options.="<option value='$value' $selected2>$key</option>\n";
}
$icon_notification_msg=((preg_match("@wordpress-store-locator-location-finder@", $sl_vars['icon']) && preg_match("@^store-locator@", $sl_dir)) || (preg_match("@wordpress-store-locator-location-finder@",$sl_vars['icon2']) && preg_match("@^store-locator@", $sl_dir)))? "<div class='sl_admin_success' style='background-color:LightYellow;color:red'><span style='color:red'>".__("You have switched from <strong>'wordpress-store-locator-location-finder'</strong> to <strong>'store-locator'</strong> --- great!<br>Now, please re-select your <b>'Home Icon'</b> and <b>'Destination Icon'</b> below, so that they show up properly on your store locator map.", SL_TEXT_DOMAIN)."</span></div>" : "" ;


###Defaults###
$sl_mdo[] = array("field_name" => "map_type", "default" => "google.maps.MapTypeId.ROADMAP", "input_zone" => "defaults", "output_zone" => "sl_dyn_js", "label" => __("Default Map Type", SL_TEXT_DOMAIN), "input_template" => "<select name='sl_map_type'>\n$map_type_options</select>");

$sl_mdo[] = array("field_name" => "num_initial_displayed", "default" => "500", "input_zone" => "defaults", "output_zone" => "sl_xml", "label" =>  __("Locations in Results", SL_TEXT_DOMAIN), "input_template" => "<input name='sl_num_initial_displayed' value='$sl_vars[num_initial_displayed]'>");

$sl_mdo[] = array("field_name" => "scripts_load", "default" => "selective", "input_zone" => "defaults", "output_zone" => "sl_head_scripts", "label" => __("JS & CSS Loading", SL_TEXT_DOMAIN), "input_template" => "<input name='sl_scripts_load' value='selective' type='radio' $checked_selective>Selective&nbsp;Loading&nbsp;&nbsp;<input name='sl_scripts_load' value='all' type='radio' $checked_all>All&nbsp;Pages", "more_info" => __("<h2 style='margin-top:0px'>JavaScript & Cascading Style Sheets Loading</h2><b>Selective Loading:</b><br>Attempts to detect where Store Locator JS & CSS scripts are needed and only loads them on those necessary pages. <br><br><b>All Pages:</b><br>Loads JS & CSS scripts on every page of your website.<br><br><div class='sl_code code'><b>Note:</b>&nbsp;\"Selective Loading\" will work for 99% of sites, however, if you experience map loading issues or missing CSS styling on your Store Locator or addon-generated pages, choose the \"All Pages\" option.</div>", SL_TEXT_DOMAIN), "more_info_label" => "info_js_css_load");

$sl_mdo[] = array("field_name" => array("scripts_load_home", "scripts_load_archives_404"), "default" => array("1", "1"), "field_type" =>"checkbox", "input_zone" => "defaults", "output_zone" => array("sl_head_scripts", "sl_head_scripts"), "label" => "", "input_template" => __("Also Load On", SL_TEXT_DOMAIN)." .. <input name='sl_scripts_load_home' value='1' type='checkbox' {$checked_home}>&nbsp;".__("Home", SL_TEXT_DOMAIN)."&nbsp;&nbsp;<input name='sl_scripts_load_archives_404' value='1' type='checkbox' {$checked_archives_404}>&nbsp;".__("Archives", SL_TEXT_DOMAIN)." / 404", "row_id" => "scripts_load_selective_tr", "hide_row" => (isset($sl_vars['scripts_load']) && $sl_vars['scripts_load'] == "all") );

$sl_mdo[] = array("field_name" => array("use_city_search", "map_overview_control"), "default" => array("1", "0"), "field_type" =>"checkbox", "input_zone" => "defaults", "output_zone" => array("sl_template", "sl_dyn_js"), "label" => "<input name='sl_use_city_search' value='1' type='checkbox' $checked>&nbsp;".__("Search By City", SL_TEXT_DOMAIN), "input_template" => "<input name='sl_map_overview_control' value='1' type='checkbox' $checked5>&nbsp;".__("Show Map Inset Box", SL_TEXT_DOMAIN));

$sl_mdo[] = array("field_name" => array("geolocate", "load_locations_default", "load_results_with_locations_default"), "default" => array("0", "1", "1"), "field_type" => "checkbox", "input_zone" => "defaults", "output_zone" => array("sl_dyn_js", "sl_dyn_js", "sl_dyn_js"), "label" => "<input name='sl_geolocate' value='1' type='checkbox' $checked6>&nbsp;".__("Auto-Locate User", SL_TEXT_DOMAIN), "input_template" => "<input name='sl_load_locations_default' value='1' type='checkbox' $checked4>&nbsp;".__("Auto-Load Locations", SL_TEXT_DOMAIN)."&nbsp;&nbsp;(<input name='sl_load_results_with_locations_default' value='1' type='checkbox' $checked7>&nbsp;&amp;&nbsp;".__("Listing", SL_TEXT_DOMAIN)."&nbsp;(<a href='#info_load_results_default' rel='sl_pop'>?</a>)<div style='display:none;' id='info_load_results_default'>".__("<h2 style='margin-top:0px'>Search Results Listing By Default</h2>Determine whether or not both the map icons and the results listing show when loading locations by default. <br><Br>No results listings are shown even if this is checked, but 'Auto-Load Locations' is unchecked", SL_TEXT_DOMAIN).".</div>)");

/*<!--tr><td>".__("Allow User Search By Name of Location?", SL_TEXT_DOMAIN).":</td>
<td><input name='sl_use_name_search' value='1' type='checkbox' $checked2></td></tr-->
<!--/table-->*/
//$sl_vars['use_name_search']=($_POST['sl_use_name_search']==="")? 0 : $_POST['sl_use_name_search'];
###End Defaults###

###Labels###
$sl_mdo[] = array("field_name" => "search_label", "default" => "Address", "input_zone" => "labels", "output_zone" => "sl_template", "label" => __("Address Input", SL_TEXT_DOMAIN), "input_template" => "<input name='search_label' value=\"$sl_vars[search_label]\" size='14'>", "stripslashes" => 1);

$sl_mdo[] = array("field_name" => "radius_label", "default" => "Radius", "input_zone" => "labels", "output_zone" => "sl_template", "label" => __("Radius Dropdown", SL_TEXT_DOMAIN), "input_template" => "<input name='sl_radius_label' value=\"$sl_vars[radius_label]\" size='14'>", "stripslashes" => 1);

$sl_mdo[] = array("field_name" => "website_label", "default" => "Website", "input_zone" => "labels", "output_zone" => "sl_dyn_js", "label" => __("Website URL", SL_TEXT_DOMAIN), "input_template" => "<input name='sl_website_label' value=\"$sl_vars[website_label]\" size='14'>", "stripslashes" => 1);

$sl_mdo[] = array("field_name" => "directions_label", "default" => "Directions", "input_zone" => "labels", "output_zone" => "sl_dyn_js", "label" => __("Directions URL", SL_TEXT_DOMAIN), "input_template" => "<input name='sl_directions_label' value=\"$sl_vars[directions_label]\" size='14'>", "stripslashes" => 1);

$sl_mdo[] = array("field_name" => "instruction_message", "default" => "Enter Your Zip Code or Address Above.", "input_zone" => "labels", "output_zone" => "sl_template", "label" => __("Instruction to Users", SL_TEXT_DOMAIN), "input_template" => "<input name='sl_instruction_message' value=\"".$sl_vars['instruction_message']."\" size='14'>", "stripslashes" => 1);

$sl_mdo[] = array("field_name" => "city_dropdown_label", "default" => "--Search By City--", "input_zone" => "labels", "output_zone" => "sl_template", "label" => __("City Dropdown", SL_TEXT_DOMAIN), "input_template" => "<input name='sl_city_dropdown_label' value=\"".$sl_vars['city_dropdown_label']."\" size='14'>", "stripslashes" => 1);

$sl_mdo[] = array("field_name" => "location_not_found_message", "default" => "", "input_zone" => "labels", "output_zone" => "sl_dyn_js", "label" => __("Location Doesn't Exist", SL_TEXT_DOMAIN), "input_template" => "<input name='sl_location_not_found_message' value=\"".$sl_vars['location_not_found_message']."\" size='14'>", "stripslashes" => 1);

$sl_mdo[] = array("field_name" => "no_results_found_message", "default" => "No Results Found", "input_zone" => "labels", "output_zone" => "sl_dyn_js", "label" => __("No Results Are Found", SL_TEXT_DOMAIN), "input_template" => "<input name='sl_no_results_found_message' value=\"".$sl_vars['no_results_found_message']."\" size='14'>", "stripslashes" => 1);

$sl_mdo[] = array("field_name" => "hours_label", "default" => "Hours", "input_zone" => "labels", "output_zone" => "sl_dyn_js", "label" => __("Hours", SL_TEXT_DOMAIN), "input_template" => "<input name='sl_hours_label' value=\"".$sl_vars['hours_label']."\" size='14'>", "stripslashes" => 1);

$sl_mdo[] = array("field_name" => "phone_label", "default" => "Phone", "input_zone" => "labels", "output_zone" => "sl_dyn_js", "label" => __("Phone", SL_TEXT_DOMAIN), "input_template" => "<input name='sl_phone_label' value=\"".$sl_vars['phone_label']."\" size='14'>", "stripslashes" => 1);

$sl_mdo[] = array("field_name" => "fax_label", "default" => "Fax", "input_zone" => "labels", "output_zone" => "sl_dyn_js", "label" => __("Fax", SL_TEXT_DOMAIN), "input_template" => "<input name='sl_fax_label' value=\"".$sl_vars['fax_label']."\" size='14'>", "stripslashes" => 1);

$sl_mdo[] = array("field_name" => "email_label", "default" => "Email", "input_zone" => "labels", "output_zone" => "sl_dyn_js",  "label" => __("Email", SL_TEXT_DOMAIN), "input_template" => "<input name='sl_email_label' value=\"".$sl_vars['email_label']."\" size='14'>", "stripslashes" => 1);
###End Labels###

###Dimensions###
$sl_mdo[] = array("field_name" => "zoom_level", "default" => "4", "input_zone" => "dimensions", "output_zone" => "sl_dyn_js", "label" => "<nobr>".__("Zoom Level", SL_TEXT_DOMAIN)."</nobr>", "input_template" => $zoom);

$sl_mdo[] = array("field_name" => array("height", "width", "height_units", "width_units"), "default" => array("350", "100", "px", "%"), "input_zone" => "dimensions", "output_zone" => "sl_template", "label" => "<nobr>".__("Map Dimensions (H x W)", SL_TEXT_DOMAIN)."</nobr>", "input_template" => "<input name='height' value='$sl_vars[height]' size='3'>&nbsp;".sl_choose_units($sl_vars['height_units'], "height_units")." <span style='font-size:1.2em; vertical-align:middle'>X</span> <input name='width' value='$sl_vars[width]' size='3'>&nbsp;".sl_choose_units($sl_vars['width_units'], "width_units", ""), "numbers_only" => array(1, 1, 0, 0)
);

$the_distance_unit["".__("Km", SL_TEXT_DOMAIN).""]="km";
$the_distance_unit["".__("Miles", SL_TEXT_DOMAIN).""]="miles";
$radii_select = "";
foreach ($the_distance_unit as $key=>$value) {
	$selected = ($sl_vars['distance_unit']==$value)?" selected " : "";
	$radii_select .= "<option value='$value' $selected>$key</option>\n";
}
$sl_mdo[] = array("field_name" => array("distance_unit", "radii"),  "default" => array("miles", "1,5,10,25,(50),100,200,500"), "input_zone" => "dimensions", "output_zone" => array("sl_dyn_js", "sl_template"), "label" => "<nobr>".__("Radii Options", SL_TEXT_DOMAIN)." (".__("in", SL_TEXT_DOMAIN)." <select name='sl_distance_unit'>$radii_select</select>) </nobr>", "input_template" => "<input  name='radii' value='$sl_vars[radii]' size='25'><br><span style='font-size:80%'>(".__("Parentheses '( )' are for the default radius</span>", SL_TEXT_DOMAIN).")");
###End Dimensions###

###Design###
$sl_mdo[] = array("field_name" => "theme", "default" =>"", "input_zone" => "design", "output_zone" => "sl_template", "label" => __("Choose Theme", SL_TEXT_DOMAIN), "input_template" => "<select name='theme' onchange=\"\"><option value=''>".__("No Theme Selected", SL_TEXT_DOMAIN)."</option>$theme_str</select>&nbsp;&nbsp;&nbsp;<a href='http://www.viadat.com/products-page/store-locator-themes/' target='_blank'>".__("Get&nbsp;Themes", SL_TEXT_DOMAIN)." &raquo;</a>");

$sl_mdo[] = array("field_name" => "remove_credits", "default" =>"0", "field_type" =>"checkbox", "input_zone" => "design", "output_zone" => "sl_template", "label" => __("Remove Credits", SL_TEXT_DOMAIN), "input_template" => "<input name='sl_remove_credits' value='1' type='checkbox' $checked3>");

$sl_mdo[] = array("field_name" => array("icon", "icon2"), "default" => array(SL_ICONS_BASE."/droplet_green.png", SL_ICONS_BASE."/droplet_red.png"), "input_zone" => "design", "output_zone" => array("sl_dyn_js", "sl_dyn_js"), "label" => "<input name='icon' size='20' value='$sl_vars[icon]' onchange=\"document.getElementById('prev').src=this.value\"><img id='prev' src='$sl_vars[icon]' align='top' rel='sl_pop' href='#home_icon' style='cursor:pointer;cursor:hand;height:60%;'> <br><a rel='sl_pop' href='#home_icon'><span style='font-size:80%'>".__("Choose", SL_TEXT_DOMAIN)." ".__("Home Icon", SL_TEXT_DOMAIN)."</span></a><div id='home_icon' style='display:none;'><h2 style='margin-top:0px'>".__("Choose", SL_TEXT_DOMAIN)." ".__("Home Icon", SL_TEXT_DOMAIN)."</h2>$icon_str</div>", "input_template" => "<input name='icon2' size='20' value='$sl_vars[icon2]' onchange=\"document.getElementById('prev2').src=this.value\"><img id='prev2' src='$sl_vars[icon2]' align='top' rel='sl_pop' href='#end_icon' style='cursor:pointer;cursor:hand;height:60%;'> <br><div id='end_icon' style='display:none;'><h2 style='margin-top:0px'>".__("Choose", SL_TEXT_DOMAIN)." ".__("Destination Icon", SL_TEXT_DOMAIN)."</h2>$icon2_str</div><a rel='sl_pop' href='#end_icon'><span style='font-size:80%'>".__("Choose", SL_TEXT_DOMAIN)." ".__("Destination Icon", SL_TEXT_DOMAIN)." </span></a>");

$sl_mdo[] = array("input_zone" => "design", "label" => "<div class=''><b>".__("For more unique icons, visit", SL_TEXT_DOMAIN)." <a href='https://www.geocoderpro.com/en/resources/map-icons-marker-pins/' target='_blank'>GeoCoder Pro</a> & <a href='http://code.google.com/p/google-maps-icons/' target='_blank'>Map Icons Collection</a></b></div>", "input_template" => "", "colspan" => 2);
###End Design###

/*
$sl_mdo[] = array("input_zone" => "defaults", "label" => "Locations in Results", "input_template" => <<<EOQ
<input name='sl_num_initial_displayed' value='$sl_vars[num_initial_displayed]'>
EOQ
);*/

if (function_exists("do_sl_hook")){do_sl_hook('sl_mapdesigner_options'); }
?>