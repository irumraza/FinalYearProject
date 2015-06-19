<?php	
if(function_exists('current_user_can'))
if(!current_user_can('manage_options')) {
die('Access Denied');
}	
if(!function_exists('current_user_can')){
	die('Access Denied');
}

function html_showcatalogs( $rows,  $pageNav,$sort,$cat_row){
	global $wpdb;
	?>
    <script language="javascript">
		function ordering(name,as_or_desc)
		{
			document.getElementById('asc_or_desc').value=as_or_desc;		
			document.getElementById('order_by').value=name;
			document.getElementById('admin_form').submit();
		}
		function saveorder()
		{
			document.getElementById('saveorder').value="save";
			document.getElementById('admin_form').submit();
			
		}
		function listItemTask(this_id,replace_id)
		{
			document.getElementById('oreder_move').value=this_id+","+replace_id;
			document.getElementById('admin_form').submit();
			function doNothing() {  
			var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
			if( keyCode == 13 ) {


				if(!e) var e = window.event;

				e.cancelBubble = true;
				e.returnValue = false;

				if (e.stopPropagation) {
						e.stopPropagation();
						e.preventDefault();
				}
			}
                    }
                }
	</script>


<div class="wrap">
	<?php $path_site2 = plugins_url("../images", __FILE__); ?>
        <div class="slider-options-head">
            <div style="float: left;">
                    <div><a href="http://huge-it.com/wordpress-plugins-product-catalog-user-manual/" target="_blank">User Manual</a></div>
                    <div>This section allows you to configure the Product Catalog options. <a href="http://huge-it.com/wordpress-plugins-product-catalog-user-manual/" target="_blank">More...</a></div>
            </div>
            <div style="float: right;">
                    <a class="header-logo-text" href="http://huge-it.com/product-catalog/" target="_blank">
                            <div><img width="250px" src="<?php echo $path_site2; ?>/huge-it1.png" /></div>
                            <div>Get the full version</div>
                    </a>
            </div>
        </div>
	<div id="poststuff">
		<div id="catalogs-list-page">
			<form method="post"  onkeypress="doNothing()" action="admin.php?page=catalogs_huge_it_catalog" id="admin_form" name="admin_form">
			<h2>Huge-IT Catalogs
				<a onclick="window.location.href='admin.php?page=catalogs_huge_it_catalog&task=add_cat'" class="add-new-h2" >Add New Catalog</a>
			</h2>
			<?php
			$serch_value='';
			if(isset($_POST['serch_or_not'])) {if($_POST['serch_or_not']=="search"){ $serch_value=esc_html(stripslashes($_POST['search_events_by_title'])); }else{$serch_value="";}} 
			$serch_fields='<div class="alignleft actions"">
				<label for="search_events_by_title" style="font-size:14px">Filter: </label>
					<input type="text" name="search_events_by_title" value="'.$serch_value.'" id="search_events_by_title" onchange="clear_serch_texts()">
			</div>
			<div class="alignleft actions">
				<input type="button" value="Search" onclick="document.getElementById(\'page_number\').value=\'1\'; document.getElementById(\'serch_or_not\').value=\'search\';
				 document.getElementById(\'admin_form\').submit();" class="button-secondary action">
				 <input type="button" value="Reset" onclick="window.location.href=\'admin.php?page=catalogs_huge_it_catalog\'" class="button-secondary action">
			</div>';

			 print_html_nav($pageNav['total'],$pageNav['limit'],$serch_fields);
			?>
			<table class="wp-list-table widefat fixed pages" style="width:95%">
				<thead>
				 <tr>
					<th scope="col" id="id" style="width:30px" ><span>ID</span><span class="sorting-indicator"></span></th>
					<th scope="col" id="name" style="width:85px" ><span>Name</span><span class="sorting-indicator"></span></th>
					<th scope="col" id="prod_count"  style="width:75px;" ><span>Images</span><span class="sorting-indicator"></span></th>
					<th style="width:40px">Delete</th>
				 </tr>
				</thead>
				<tbody>
				 <?php 
				 $trcount=1;
				  for($i=0; $i<count($rows);$i++){
					$trcount++;
					$ka0=0;
					$ka1=0;
					if(isset($rows[$i-1]->id)){
						  if($rows[$i]->sl_width==$rows[$i-1]->sl_width){
						  $x1=$rows[$i]->id;
						  $x2=$rows[$i-1]->id;
						  $ka0=1;
						  }
						  else
						  {
							  $jj=2;
							  while(isset($rows[$i-$jj]))
							  {
								  if($rows[$i]->sl_width==$rows[$i-$jj]->sl_width)
								  {
									  $ka0=1;
									  $x1=$rows[$i]->id;
									  $x2=$rows[$i-$jj]->id;
									   break;
								  }
								$jj++;
							  }
						  }
						  if($ka0){
							$move_up='<span><a href="#reorder" onclick="return listItemTask(\''.$x1.'\',\''.$x2.'\')" title="Move Up">   <img src="'.plugins_url('images/uparrow.png',__FILE__).'" width="16" height="16" border="0" alt="Move Up"></a></span>';
						  }
						  else{
							$move_up="";
						  }
					}else{$move_up="";}
					
					
					if(isset($rows[$i+1]->id)){
						
						if($rows[$i]->sl_width==$rows[$i+1]->sl_width){
						  $x1=$rows[$i]->id;
						  $x2=$rows[$i+1]->id;
						  $ka1=1;
						}
						else
						{
							  $jj=2;
							  while(isset($rows[$i+$jj]))
							  {
								  if($rows[$i]->sl_width==$rows[$i+$jj]->sl_width)
								  {
									  $ka1=1;
									  $x1=$rows[$i]->id;
									  $x2=$rows[$i+$jj]->id;
									  break;
								  }
								$jj++;
							  }
						}
						
						if($ka1){
							$move_down='<span><a href="#reorder" onclick="return listItemTask(\''.$x1.'\',\''. $x2.'\')" title="Move Down">  <img src="'.plugins_url('images/downarrow.png',__FILE__).'" width="16" height="16" border="0" alt="Move Down"></a></span>';
						}else{
							$move_down="";	
						}
					}

					$uncat=$rows[$i]->par_name;
					if(isset($rows[$i]->prod_count))
						$pr_count=$rows[$i]->prod_count;
					else
						$pr_count=0;


					?>
					<tr <?php if($trcount%2==0){ echo 'class="has-background"';}?>>
						<td><?php echo $rows[$i]->id; ?></td>
						<td><a  href="admin.php?page=catalogs_huge_it_catalog&task=edit_cat&id=<?php echo $rows[$i]->id?>"><?php echo esc_html(stripslashes($rows[$i]->name)); ?></a></td>
						<td>(<?php if(!($pr_count)){echo '0';} else{ echo $rows[$i]->prod_count;} ?>)</td>
						<td><a  href="admin.php?page=catalogs_huge_it_catalog&task=remove_cat&id=<?php echo $rows[$i]->id?>">Delete</a></td>
					</tr> 
				 <?php } ?>
				</tbody>
			</table>
			 <input type="hidden" name="oreder_move" id="oreder_move" value="" />
			 <input type="hidden" name="asc_or_desc" id="asc_or_desc" value="<?php if(isset($_POST['asc_or_desc'])) echo $_POST['asc_or_desc'];?>"  />
			 <input type="hidden" name="order_by" id="order_by" value="<?php if(isset($_POST['order_by'])) echo $_POST['order_by'];?>"  />
			 <input type="hidden" name="saveorder" id="saveorder" value="" />

			 <?php
			?>
			
			
		   
			</form>
		</div>
	</div>
</div>
    <?php

}
function Html_edit_catalog($catalogsInAlbumArray,$allAlbumsArray,$catalogAlbumIdesArray,$ord_elem, $count_ord, $images, $row, $cat_row, $rowim, $rowsld, $paramssld, $rowsposts, $rowsposts8, $postsbycat)

{
//    var_dump($catalogAlbumIdesArray);

 global $wpdb;
	
	if(isset($_GET["addslide"])){
            if($_GET["addslide"] == 1){
                header('Location: admin.php?page=catalogs_huge_it_catalog&id='.$row->id.'&task=apply');
            }
	}
?>
<script type="text/javascript">
function submitbutton(pressbutton) 
{
	if(!document.getElementById('name').value){
	alert("Name is required.");
	return;
	
	}
	
	document.getElementById("adminForm").action=document.getElementById("adminForm").action+"&task="+pressbutton;
	document.getElementById("adminForm").submit();
}

var  name_changeRight = function(e) {
	document.getElementById("name").value = e.value;
}
var  name_changeTop = function(e) {
		document.getElementById("huge_it_catalog_name").value = e.value;
		//alert(e);
};

function change_select()
{
		submitbutton('apply'); 
	
}
jQuery(function() {
    jQuery( "#images-list" ).sortable({
	  stop: function() {
              jQuery("#images-list > li").removeClass('has-background');
              count=jQuery("#images-list > li").length;
              for(var i=0;i<=count;i+=2){
                              jQuery("#images-list > li").eq(i).addClass("has-background");
              }
              jQuery("#images-list > li").each(function(){
                      jQuery(this).find('.order_by').val(jQuery(this).index());
              });
	  },
	  revert: true
	});
// jQuery( "ul, li" ).disableSelection();
});
</script>

<!-- GENERAL PAGE, ADD IMAGES PAGE -->

	
<div class="wrap">
<?php $path_site2 = plugins_url("../images", __FILE__); ?>
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
<form action="admin.php?page=catalogs_huge_it_catalog&id=<?php echo $row->id; ?>" method="post" name="adminForm" id="adminForm">
	<div id="poststuff" >
	<div id="catalog-header">
		<ul id="catalogs-list">
			
			<?php
			foreach($rowsld as $rowsldires){
				if($rowsldires->id != $row->id){
				?>
					<li>
                                            <a href="#" onclick="window.location.href='admin.php?page=catalogs_huge_it_catalog&task=edit_cat&id=<?php echo $rowsldires->id; ?>'" ><?php echo $rowsldires->name; ?></a>
					</li>
				<?php
				}
				else{ ?>
					<li class="active" style="background-image:url(<?php echo plugins_url('../images/edit.png', __FILE__) ;?>)">
                                            <input class="text_area" onkeyup = "name_changeTop(this)" onfocus="this.style.width = ((this.value.length + 1) * 8) + 'px'" type="text" name="name" id="name" maxlength="250" value="<?php echo esc_html(stripslashes($row->name));?>" />
					</li>
				<?php	
				}
			}
		?>
			<li class="add-new">
				<a onclick="window.location.href='admin.php?page=catalogs_huge_it_catalog&amp;task=add_cat'">+</a>
			</li>
		</ul>
		</div>
		<div id="post-body" class="metabox-holder columns-2">
			<!-- Content -->
			<div id="post-body-content">


			<?php add_thickbox(); ?>

				<div id="post-body">
					<div id="post-body-heading">
						<h3>Products</h3>
							<script>
jQuery(document).ready(function($){


	 

  jQuery('.huge-it-newuploader .button').click(function(e) {
    var send_attachment_bkp = wp.media.editor.send.attachment;
	
    var button = jQuery(this);
    var id = button.attr('id').replace('_button', '');
    _custom_media = true;

	jQuery("#"+id).val('');
	wp.media.editor.send.attachment = function(props, attachment){
      if ( _custom_media ) {
	     jQuery("#"+id).val(attachment.url+';;;'+jQuery("#"+id).val());
		 jQuery("#save-buttom").click();
      } else {
        return _orig_send_attachment.apply( this, [props, attachment] );
      };
    }
  
    wp.media.editor.open(button);
	 
    return false;
  });
  
  	/*#####HIDE NEW UPLOADER'S LEFT MENU######*/  
										jQuery(".wp-media-buttons-icon").click(function() {
											jQuery(".media-menu .media-menu-item").css("display","none");
											jQuery(".media-menu-item:first").css("display","block");
											jQuery(".separator").next().css("display","none");
											jQuery('.attachment-filters').val('image').trigger('change');
											jQuery(".attachment-filters").css("display","none");
										});

});
</script>

						<input type="hidden" name="imagess" id="_unique_name" />
						<span class="wp-media-buttons-icon"></span>
						<div class="huge-it-newuploader uploader button button-primary add-new-image">
						<input type="button" class="button wp-media-buttons-icon catalog-media-buttons-icon" name="_unique_name_button" id="_unique_name_button" value="Add New Product" />
						</div>
				
					</div>
					<ul id="images-list">
                                        <?php
                                                                 
                                        $j=2;
					                                        
                                        $myrows = explode(",",$row->categories);
                                        $getAllParamsArray = getParams();
					foreach ($rowim as $key=>$rowimages){ ?>
                                            
						<li <?php if($j%2==0){echo "class='has-background'";}$j++; ?>>
							<input class="order_by" type="hidden" name="order_by_<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
							<div class="image-container">
								<ul class="widget-images-list">
									<?php $imgurl=explode(";",$rowimages->image_url);
//                                                                        var_dump(array_pop($imgurl));
									array_pop($imgurl);
									$i=0;
									//$imgurl = array_reverse($imgurl);
									foreach($imgurl as $key1=>$img)
									{	?>
										<li class="editthisimage<?php echo $key; ?> <?php if($i==0){echo 'first';} ?>">
											<img src="<?php echo $img; ?>" />
											<input type="button" class="edit-image"  id="" value="Edit" />
											<a href="#remove" class="remove-image">remove</a>	
										</li>
									<?php $i++; } ?>
                                                                        <?php // var_dump($rowimages->id); ?>
									<li class="add-image-box">
                                                                            
										<img src="<?php echo plugins_url( '../images/plus.png', __FILE__ ) ?>" class="plus" alt="" />
										<input type="hidden" name="imagess<?php echo $rowimages->id; ?>" id="unique_name<?php echo $rowimages->id; ?>" class="all-urls" value="<?php echo $rowimages->image_url; ?>" />
										<input type="button" class="button<?php echo $rowimages->id; ?> wp-media-buttons-icon add-image"  id="unique_name_button<?php echo $rowimages->id; ?>" value="+" />	
									</li>
								</ul>
								<script>
									jQuery(document).ready(function($){
										function secondimageslistlisize(){
											var lisaze = jQuery('#images-list').width();
											lisaze=lisaze*0.06;
											jQuery('#images-list .widget-images-list li').not('.add-image-box').not('.first').height(lisaze);
										}
										jQuery(".wp-media-buttons-icon").click(function() {
											jQuery(".attachment-filters").css("display","none");
										});
									  var _custom_media = true,
										  _orig_send_attachment = wp.media.editor.send.attachment;
										 
										/*#####ADD NEW PROJECT######*/ 
										jQuery('.huge-it-newuploader .button').click(function(e) {
											var send_attachment_bkp = wp.media.editor.send.attachment; //  alert(send_attachment_bkp);
											var button = jQuery(this);
											var id = button.attr('id').replace('_button', '');
											_custom_media = true;

											jQuery("#"+id).val('');
											wp.media.editor.send.attachment = function(props, attachment){
											  if ( _custom_media ) {
                                                                                                 jQuery("#"+id).val(attachment.url+';;;'+jQuery("#"+id).val());
												 jQuery("#save-buttom").click();
											  } else {
												return _orig_send_attachment.apply( this, [props, attachment] );
											  };
											}
											wp.media.editor.open(button);
											return false;
										});
										  
										/*#####EDIT IMAGE######*/  
										jQuery('.widget-images-list').on('click','.edit-image',function(e) {
											var send_attachment_bkp = wp.media.editor.send.attachment;
											var button = jQuery(this);
											var id = button.parents('.widget-images-list').find('.all-urls').attr('id');
											var img= button.prev('img');
											_custom_media = true;
											jQuery(".media-menu .media-menu-item").css("display","none");
											jQuery(".media-menu-item:first").css("display","block");
											jQuery(".separator").next().css("display","none");
											jQuery('.attachment-filters').val('image').trigger('change');
											jQuery(".attachment-filters").css("display","none");
											wp.media.editor.send.attachment = function(props, attachment){
											  if ( _custom_media ) {	 
												 img.attr('src',attachment.url);
												 var allurls ='';
												 img.parents('.widget-images-list').find('img').not('.plus').each(function(){
													allurls = allurls+jQuery(this).attr('src')+';';
												 });
												 jQuery("#"+id).val(allurls);
												 secondimageslistlisize();
												 //jQuery("#save-buttom").click();
											  } else {
												return _orig_send_attachment.apply( this, [props, attachment] );
											  };
											}
											wp.media.editor.open(button);
											return false;
										});

										jQuery('.add_media').on('click', function(){
											_custom_media = false;
										});
										
										 /*#####ADD IMAGE######*/  
										jQuery('.add-image.button<?php echo $rowimages->id; ?>').click(function(e) {
											var send_attachment_bkp = wp.media.editor.send.attachment;

											var button = jQuery(this);
											var id = button.attr('id').replace('_button', '');
											_custom_media = true;

											wp.media.editor.send.attachment = function(props, attachment){
											  if ( _custom_media ) {
													jQuery("#"+id).parent().before('<li class="editthisimage1 "><img src="'+attachment.url+'" alt="" /><input type="button" class="edit-image"  id="" value="Edit" /><a href="#remove" class="remove-image">remove</a></li>');
													//alert(jQuery("#"+id).val());
													jQuery("#"+id).val(jQuery("#"+id).val()+attachment.url+';');
													
													secondimageslistlisize();

											  } else {
												return _orig_send_attachment.apply( this, [props, attachment] );
											  };
											}

											wp.media.editor.open(button);
											 
											return false;
										});

										
										/*#####REMOVE IMAGE######*/  
										jQuery("ul.widget-images-list").on('click','.remove-image',function () {
											jQuery(this).parent().find('img').remove();
											
											var allUrls="";
											
											jQuery(this).parents('ul.widget-images-list').find('img').not('.plus').each(function(){
//                                                                                                alert("ok");
												allUrls=allUrls+jQuery(this).attr('src')+';';
												jQuery(this).parent().parent().parent().find('input.all-urls').val(allUrls);
												secondimageslistlisize();
											});					
											jQuery(this).parent().remove();
											return false;
										});
										

										/*#####HIDE NEW UPLOADER'S LEFT MENU######*/  
										jQuery(".wp-media-buttons-icon").click(function() {
											jQuery(".media-menu .media-menu-item").css("display","none");
											jQuery(".media-menu-item:first").css("display","block");
											jQuery(".separator").next().css("display","none");
											jQuery('.attachment-filters').val('image').trigger('change');
											jQuery(".attachment-filters").css("display","none");
										});
                                                                                
                                                                                var parameters_width = jQuery(".options-container").height();    //   alert(parameters_width)
                                                                                jQuery(".category-container").height(parameters_width);
									});
                                                                        
								</script>
							</div>
							<div class="image-options">
								<div class="options-container">
									<div>
										<label for="titleimage<?php echo $rowimages->id; ?>">Title:</label>
										<input  class="text_area" type="text" id="titleimage<?php echo $rowimages->id; ?>" name="titleimage<?php echo $rowimages->id; ?>" id="titleimage<?php echo $rowimages->id; ?>"  value="<?php echo $rowimages->name; ?>">
									</div>
                                                                        <div>
										<label for="price<?php echo $rowimages->id; ?>">Price:</label>
										<input  class="text_area" type="text" id="price<?php echo $rowimages->id; ?>" name="price<?php echo $rowimages->id; ?>" id="price<?php echo $rowimages->id; ?>"  value="<?php echo $rowimages->price; ?>">
									</div>
                                                                        <div>
										<label for="market_price<?php echo $rowimages->id; ?>">Discount Price:</label>
										<input  class="text_area" type="text" id="market_price<?php echo $rowimages->id; ?>" name="market_price<?php echo $rowimages->id; ?>" id="market_price<?php echo $rowimages->id; ?>"  value="<?php echo $rowimages->market_price; ?>">
									</div>
									<div class="description-block">
										<label for="im_description<?php echo $rowimages->id; ?>">Description:</label>
										<textarea id="im_description<?php echo $rowimages->id; ?>" name="im_description<?php echo $rowimages->id; ?>" ><?php echo $rowimages->description; ?></textarea>
									</div>
                                                                        
<!--									<div class="link-block">
										<label for="sl_url<?php echo $rowimages->id; ?>">URL:</label>
										<input class="text_area url-input" type="text" id="sl_url<?php echo $rowimages->id; ?>" name="sl_url<?php echo $rowimages->id; ?>"  value="<?php echo $rowimages->sl_url; ?>" >
										<label class="long" for="sl_link_target<?php echo $rowimages->id; ?>">
											<span>Open in new tab</span>
											<input type="hidden" name="sl_link_target<?php echo $rowimages->id; ?>" value="" />
											<input  <?php if($rowimages->link_target == 'on'){ echo 'checked="checked"'; } ?>  class="link_target" type="checkbox" id="sl_link_target<?php echo $rowimages->id; ?>" name="sl_link_target<?php echo $rowimages->id; ?>" />
										</label>
									</div>-->
								</div>
<div class="category-container">
    <?php
            $allParamsAndChildsInArray = explode('@@', $rowimages->parameters);
            foreach ($allParamsAndChildsInArray as $singleParamAndChild) {   //    var_dump($singleParamAndChild);
                if($singleParamAndChild != "" && $singleParamAndChild != " "){
                    $separateParamAndChildsInArray = explode("@", $singleParamAndChild);
                    $separateParamAndChildFirstParam = $separateParamAndChildsInArray[0]; 
                    $separateParamAndChildWithoutParam = $separateParamAndChildsInArray;
                    unset($separateParamAndChildWithoutParam[0]);   //  var_dump($separateParamAndChildWithoutParam);   //there is a param field without param name 
                    $separateParamAndChildWithoutParam = array_reverse($separateParamAndChildWithoutParam);    //  var_dump($separateParamAndChildWithoutParam);   //there is a ordered param field without param name 

                    $separateParamAndChildsInArrayOrdered[] = $separateParamAndChildFirstParam; 
                    foreach($separateParamAndChildWithoutParam as $aaaa){
                        if($aaaa != ""){
                            $separateParamAndChildsInArrayOrdered[] = $aaaa;
                        }
                    }
                    if(count($separateParamAndChildsInArrayOrdered) != 1){
                        foreach ($separateParamAndChildsInArrayOrdered as $paramKey => $separateParamAndChild){
                            if($separateParamAndChild != "") {
                                if($paramKey == 0){ ?>
                                    <ul class="full_param">
                                        <li class="new_parameter"><span><?php echo $separateParamAndChild; ?></span>
                          <?php }
                                else
                                    if($paramKey == 1){ ?>
                                        <input type="text" size="" class="firstParam" added="added" val_for_editing="<?php echo str_replace("thisisat", "@", $separateParamAndChild); ?>" value="<?php echo str_replace("thisisat", "@", $separateParamAndChild); ?>">
                                        </li>
                              <?php }
                                    else
                                    { ?>
                                        <li style="">
                                            <input type="text" size="" class="firstParam" added="added" val_for_editing="<?php echo str_replace("thisisat", "@", $separateParamAndChild); ?>" value="<?php echo str_replace("thisisat", "@", $separateParamAndChild); ?>">
                                        </li>
                                    <?php }
                            }
                        } ?>
                                        <!--<li style=""><input type="text" size="" class="firstParam" value=""></li>-->
                                    </ul>
    <?php           }
               else {
//                   exit;
                        foreach ($separateParamAndChildsInArrayOrdered as $paramKey => $separateParamAndChild){ ?>
                            <ul class="full_param">
                                <li class="new_parameter"><span><?php echo $separateParamAndChild; ?></span>
                                   <input type="text" size="" class="firstParam">
                                </li>
                            </ul>
                  <?php } ?>

              <?php }
                }
                unset($separateParamAndChildsInArrayOrdered);
            } ?>
</div>
                                                                
								<div class="remove-image-container">
                                                                        <!--<a class="button remove-image" href="admin.php?page=catalogs_huge_it_catalog&id=<?php echo $row->id; ?>&task=apply&removeslide=<?php echo $rowimages->id; ?>">-->
                                                                    <a class="button remove-image" href="admin.php?page=catalogs_huge_it_catalog&id=<?php echo $row->id; ?>&task=apply&removeslide=<?php echo $rowimages->id; ?>">Remove Product</a>
                                                                    <a href="admin.php?page=catalogs_huge_it_catalog&id=<?php echo $row->id; ?>&task=ratings&prod_id=<?php echo $rowimages->id; ?>&TB_iframe=1" class="remove-image button thickbox">View Ratings</a>
                                                                    <a href="admin.php?page=catalogs_huge_it_catalog&id=<?php echo $row->id; ?>&task=reviews&prod_id=<?php echo $rowimages->id; ?>&TB_iframe=1" class="remove-image button thickbox">View Reviews</a>
								</div>
							</div>
                                                        <input type="hidden" name="parameter<?php echo $rowimages->id; ?>" class="parameters" value="<?php echo $rowimages->parameters; ?>">
                                                        <input type="hidden" name="changing_param" class="changing_param" value="">
							<div class="clear"></div>
						</li>
					<?php } ?>
					</ul>
				</div>

			</div>
                        <script>
                                    jQuery(document).on('click', '#add_new_cat_button', function () {
                                       var newCatVal =  jQuery('.inside #add_cat_input input').val();
                                       if(newCatVal !== "") {
                                           jQuery('.parameters').each(function(){       //      alert(jQuery(this).val());
                                                var new_param_val = jQuery(this).val() + "@@" + newCatVal;
                                                jQuery(this).val(new_param_val);
                                           });
                                           
                                           var oldValue = jQuery('.inside input:hidden').val()
                                           var newValue = oldValue + newCatVal + ',';
                                           //console.log(newCatVal); console.log(newValue); console.log(oldValue);
                                           jQuery('.params_inside input:hidden').val(newValue.replace(/ /g,"_"));
                                           jQuery('.inside #add_cat_input input').val('');
                                           jQuery('.inside ul').find('#allCategories').before("\n\
                                                        <span style='display: block;'>\n\
                                                            <li class='hndle'>\n\
                                                                <input class='del_val' value='"+newCatVal+"' style=''>\n\
                                                                <span id='delete_cat' style='' value='a'>\n\
                                                                    <img src='../wp-content/plugins/product-catalog/images/delete1.png' width='9' height='9' value='a'>\n\
                                                                </span>\n\
                                                                <span id='edit_cat' style=''>\n\
                                                                    <img src='../wp-content/plugins/product-catalog/images/edit3.png' width='10' height='10'>\n\
                                                                </span>\n\
                                                            </li>\n\
                                                        </span>");
                                          
                                          jQuery('.category-container').each(function() {
                                              jQuery(this).append("<ul class='full_param'><li class='new_parameter' ><span>"+newCatVal+"  </span>\n\
                                                                       <input type='text' size='' class='firstParam' />\n\
                                                                       </li></ul>");
//                                              jQuery('.category-container ul li input').each(function(){
//                                                  alert(jQuery(this).html());
//                                              });
                                          });
                                       }
                                       else { alert("Please fill the line"); }
                                       
                                    });
                                    
                                    jQuery(document).on('keypress', '#add_cat_input input', function (e){    //alert(jQuery(this).val());
                                        if(jQuery(this).val() !== "") {
                                            if(e.keyCode == 13) {
                                                jQuery('#add_new_cat_button').click();
                                            }
                                        }
                                    });
                                    
                                    jQuery(document).on('change', '.firstParam', function (e){    //alert(jQuery(this).val());
                                        
                                        var change_val_index = jQuery(this).parent().parent().index();
                                        var hidden_input = jQuery(this).parent().parent().parent().parent().parent().find(".parameters");
                                        var params_input_old_val = jQuery(this).parent().parent().parent().parent().parent().find(".parameters").val();    //    alert(params_hidden_input);
                                        var new_child_val = jQuery(this).val();
                                            new_child_val = new_child_val.replace(/@/g, 'thisisat');
                                        var params_input_old_val_in_array = params_input_old_val.split("@@");
                                        if(params_input_old_val_in_array[0] == "")
                                            { var new_change_val_index = parseInt(change_val_index) + parseInt(1); }
                                        else
                                            { var new_change_val_index = parseInt(change_val_index); }
                                        
//                                        alert(params_input_old_val_in_array[new_change_val_index]);//param@child || param@
                                        
                                        var separate_param_and_child_in_array = params_input_old_val_in_array[new_change_val_index].split("@");
//                                        alert(separate_param_and_child_in_array[0]);
                                        if(new_child_val != ''){ var new_param_and_child = separate_param_and_child_in_array[0] + "@" + new_child_val; }
                                        else
                                        {    var new_param_and_child = separate_param_and_child_in_array[0]; }
                                        params_input_old_val_in_array[new_change_val_index] = new_param_and_child;


                                        var params_input_new_val = "";
                                        var forEach = Function.prototype.call.bind( Array.prototype.forEach );
                                        forEach( params_input_old_val_in_array, function( node ) { //            alert( node );
                                            if (node != "") {
                                                params_input_new_val = params_input_new_val + "@@" + node;
                                            }
                                        });

                                        jQuery(hidden_input).val(params_input_new_val);
                                            
                                    });
                                        
                                   
                                    jQuery(document).on('click', '#delete_cat', function (){
                                        var index_new_val = 0;
                                        jQuery(this).parent().parent().each(function(){
                                            jQuery(this).index(index_new_val);
                                            index_new_val++;
                                        });
                                        var del_val_index = jQuery(this).parent().parent().index();                //     alert(del_val_index);
                                        var all_categories_old = jQuery('.inside #allCategories').val();           //     alert(all_categories_old);
                                        var all_categories_old_in_array = all_categories_old.split(",");
                                        
//                                      ###########     <<<<   allCategories hidden input changing     ###########                                       
                                        
                                        var foreach_key = 0;
                                        var newValue = "";
                                        var forEach = Function.prototype.call.bind( Array.prototype.forEach );
                                            forEach( all_categories_old_in_array, function( node ) {               //    alert( node );
                                                if(foreach_key != del_val_index && node !=""){
                                                    newValue = newValue + node + ",";
                                                }
                                                foreach_key++;
                                            });
                                        //alert(newValue);
                                        jQuery('.inside #allCategories').val(newValue);
                                        jQuery(this).parent().parent().find('.hndle').parent().remove();
                                        
                                        
//                                        ###########   >>>>     allCategories hidden input changing       ###########  
                                                        
                                        jQuery('.category-container').each(function(){
                                            //jQuery(this).eq(index_new_val).length);
                                            jQuery(this).find('ul').eq(del_val_index).remove();
                                        });
//                                        return false;
                                        
                                        
                                        var need_to_much_index = 0;
                                        jQuery('.parameters').each(function(){
                                                                                                                                     //  alert(del_val_index);
                                            var all_params_old_val = jQuery(this).val();                                             //  alert(all_params_old_val);
                                            var all_params_old_val_in_array = all_params_old_val.split('@@');                        //  alert(all_params_old_val_in_array[del_val_index]);
                                            if(all_params_old_val_in_array[0] == "" && need_to_much_index == 0){
                                                del_val_index = parseInt(del_val_index) + parseInt(1); need_to_much_index = 1;         ////if first key is empty key = key + 1;
                                            }
                                            var old_param_and_child = "@@" + all_params_old_val_in_array[del_val_index];             //  alert(old_param_and_child);
                                            
                                            
                                            var foreach_key = 0;
                                            var all_params_new_val = "";
                                            var forEach = Function.prototype.call.bind( Array.prototype.forEach );
                                            forEach( all_params_old_val_in_array, function( node ) {                            //      alert( node );
                                                if(foreach_key != del_val_index && node != ""){
                                                    all_params_new_val = all_params_new_val + "@@" +node;              //      alert(param_for_editing);
//                                                    alert( node );
                                                }
                                                
                                                foreach_key++;
                                            });
                                            
//                                            alert(all_params_old_val);
//                                            alert(all_params_new_val);
//                                            return false;
                                            jQuery(this).val(all_params_new_val);   //    alert(all_params_new_val);
                                            
                                        });
                                    });
                                     //ok a

                                    jQuery(document).on('click', '#edit_cat', function (){
                                        jQuery(this).parent().find('.del_val').focus();
                                        var changing_val = jQuery(this).parent().find('.del_val').val().replace(/ /g, '_');
//                                        alert(changing_val);
                                        jQuery('#changing_val').removeAttr('value').attr('value',changing_val);
                                        //console.log(changing_val);
                                    });
                                    //ok a

                                    jQuery(document).on('click', '#catalogs-list .active', function (){
                                        jQuery(this).find('input').focus();
                                    });

                                    //getting category old name
                                    jQuery(document).on('focus', '.del_val', function (){ // Know which category we want to change 
                                            var changing_val = jQuery(this).parent().parent().index();  //console.log(changing_val);
                                            jQuery('#changing_val').removeAttr('value').attr('value',changing_val);
//                                            alert(jQuery(this).parent().parent().index());
                                    });

                                    jQuery(document).on('change', '.del_val', function (){
                                        //alert("ok")
                                            var input_old_val   = jQuery("#allCategories").val();
                                            var old_param_index = jQuery('#changing_val').val();
                                            var param_new_name  = jQuery(this).val();
//                                            alert(param_new_name);
                                            var input_old_val_in_array = input_old_val.split(",");
                                                input_old_val_in_array[old_param_index] = param_new_name;
                                                
                                            var new_cat = "";
                                            var forEach = Function.prototype.call.bind( Array.prototype.forEach );
                                            forEach( input_old_val_in_array, function( node ) {       //      alert( node );
                                                    if(node != ""){ new_cat = new_cat + node + ","; }
                                            });
                                            
                                            jQuery('#allCategories').val(new_cat);      //      alert(jQuery('#allCategories').val());
                                            
                                            jQuery('.parameters').each(function(){
                                                var hidden_input_old_val = jQuery(this).val();    //    all params and values in string
//                                                 alert(hidden_input_old_val);
                                                 
                                                var hidden_input_old_val_in_array = hidden_input_old_val.split("@@");
                                                if(hidden_input_old_val_in_array[0] == ""){
                                                      var new_old_param_index = parseInt(old_param_index) + parseInt(1); }
                                                else{ var new_old_param_index = old_param_index; }
                                                                                                
                                                var old_param_and_child_in_array = hidden_input_old_val_in_array[new_old_param_index].split("@");
                                                var param_old_name = old_param_and_child_in_array[0];
                                                var child_name = old_param_and_child_in_array[1];
//                                                    alert(param_old_name);
//                                                    alert(param_new_name);
//                                                    alert(child_name);
                                                    if(typeof child_name != 'undefined')
                                                    {    var new_param_and_child = param_new_name + "@" + child_name; }
                                                    else
                                                    {    var new_param_and_child = param_new_name; }
//                                                    alert(new_param_and_child);
                                                    
                                                hidden_input_old_val_in_array[new_old_param_index] = new_param_and_child;
                                                var params_input_new_val = "";
                                                var forEach = Function.prototype.call.bind( Array.prototype.forEach );
                                                forEach( hidden_input_old_val_in_array, function( node ) { //            alert( node );
                                                    if (node != "") {
                                                        params_input_new_val = params_input_new_val + "@@" + node;
                                                    }
                                                });
//                                                    alert(params_input_new_val);
                                                jQuery(this).val(params_input_new_val);
                                                
                                            });
                                            
                                            jQuery('.new_parameter').parent().each(function() {
                                                if(jQuery(this).index() == old_param_index) {
                                                    jQuery(this).find("span").text(param_new_name);
                                                }
                                            });
//                                           
                                    });
                                    
                                    jQuery(document).ready(function(){
                                        jQuery('.huge-it-catalog-thumb .button').click(function(e) {
                                            var send_attachment_bkp = wp.media.editor.send.attachment;
                                            var button = jQuery(this);  //  alert(jQuery(this).attr("id").replace('_button', ''));
                                            var id = button.attr("id").replace('_button', '');  //   alert(id);
                                            _custom_media = true;

                                                jQuery("#"+id).val('');  //   alert("#"+id);
                                                wp.media.editor.send.attachment = function(props, attachment){
                                                if ( _custom_media ) {
                                                     jQuery("#"+id).val(attachment.url+';;;');
                                                         jQuery("#save-buttom").click();
                                                }
                                                else {
                                                    return _orig_send_attachment.apply( this, [props, attachment] );
                                                };
                                            }

                                            wp.media.editor.open(button);

                                            return false;
                                       });
                                   });
                                   jQuery(document).ready(function(){
                                        jQuery('.categories_select select').change(function(){
                                            var catalog_cats_val = jQuery(this).val();
                                            jQuery(this).parent().find("#catalog_cats").val(catalog_cats_val);
                                        });
                                   });
                        </script>
                        
			<!-- SIDEBAR -->
			<div id="postbox-container-1" class="postbox-container">
				<div id="side-sortables" class="meta-box-sortables ui-sortable">
					<div id="catalog-unique-options" class="postbox">
					<h3 class="hndle"><span>Select The Catalog Theme</span></h3>
					<ul id="catalog-unique-options-list">
						<li style="display:none;">
							<label for="sl_width">Width</label>
							<input type="text" name="sl_width" id="sl_width" value="<?php echo $row->sl_width; ?>" class="text_area" />
						</li>
						<li style="display:none;">
							<label for="sl_height">Height</label>
							<input type="text" name="sl_height" id="sl_height" value="<?php echo $row->sl_height; ?>" class="text_area" />
						</li>
						<li style="display:none;">
							<label for="pause_on_hover">Pause on hover</label>
							<input type="hidden" value="off" name="pause_on_hover" />					
							<input type="checkbox" name="pause_on_hover"  value="on" id="pause_on_hover"  <?php if($row->pause_on_hover  == 'on'){ echo 'checked="checked"'; } ?> />
						</li>
						<li>
							<label for="catalog_effects_list">Views</label>
							<select name="catalog_effects_list" id="catalog_effects_list">
									<option <?php if($row->catalog_list_effects_s == '0'){ echo 'selected'; } ?>  value="0">Blocks Toggle Up/Down</option>
									<option <?php if($row->catalog_list_effects_s == '1'){ echo 'selected'; } ?>  value="1">Full-Height Blocks</option>
									<option <?php if($row->catalog_list_effects_s == '2'){ echo 'selected'; } ?>  value="2">Catalog/Content-Popup</option>
									<option <?php if($row->catalog_list_effects_s == '3'){ echo 'selected'; } ?>  value="3">Full-Width Blocks</option>
									<option <?php if($row->catalog_list_effects_s == '5'){ echo 'selected'; } ?>  value="5">Content Slider</option>
							</select>
						</li>
                                                
                                                <li>
							<label for="huge_it_catalog_name">Catalog name</label>
							<input type = "text" name="name" id="huge_it_catalog_name" value="<?php echo esc_html(stripslashes($row->name));?>" onkeyup = "name_changeRight(this)">
						</li>
                                                
						<li style="display:none;">
							<label for="sl_pausetime">Pause time</label>
							<input type="text" name="sl_pausetime" id="sl_pausetime" value="<?php echo $row->description; ?>" class="text_area" />
						</li>
						<li style="display:none;">
							<label for="sl_changespeed">Change speed</label>
							<input type="text" name="sl_changespeed" id="sl_changespeed" value="<?php echo $row->param; ?>" class="text_area" />
						</li>
						<li style="display:none;">
							<label for="catalog_position">catalog Position</label>
							<select name="sl_position" id="catalog_position">
									<option <?php if($row->sl_position == 'left'){ echo 'selected'; } ?>  value="left">Left</option>
									<option <?php if($row->sl_position == 'right'){ echo 'selected'; } ?>   value="right">Right</option>
									<option <?php if($row->sl_position == 'center'){ echo 'selected'; } ?>  value="center">Center</option>
							</select>
						</li>

					</ul>
						<div id="major-publishing-actions">
							<div id="publishing-action">
								<input type="button" onclick="submitbutton('apply')" value="Save catalog" id="save-buttom" class="button button-primary button-large">
							</div>
							<div class="clear"></div>
							<!--<input type="button" onclick="window.location.href='admin.php?page=catalogs_huge_it_catalog'" value="Cancel" class="button-secondary action">-->
						</div>
					</div>
                                    
                                        <div class="postbox" style="display: none;">
                                            <div class="inside2">
                                                <ul>
                                                    <li class="allowIsotope">
                                                        Show Sorting Buttons :
                                                        <input type="hidden" value="off" name="ht_show_sorting" />
							<input type="checkbox" id="ht_show_sorting"  <?php if($row->ht_show_sorting  == 'on'){ echo 'checked="checked"'; } ?>  name="ht_show_sorting" value="on" />
                                                    </li>
                                                    <li class="allowIsotope">
                                                        Show Categorie Buttons :
                                                        <input type="hidden" value="off" name="ht_show_filtering" />
							<input type="checkbox" id="ht_show_filtering"  <?php if($row->ht_show_filtering  == 'on'){ echo 'checked="checked"'; } ?>  name="ht_show_filtering" value="on" />
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    
                                    <div class="postbox">
                                            <h3 class="hndle"><span>Parameters</span></h3>
                                            <div class="inside params_inside">
                                                <ul>
                                                <?php
                                                $ifforempty= $row->categories;
                                                $ifforempty= stripslashes($ifforempty);
                                                $ifforempty= esc_html($ifforempty);
                                                $ifforempty= empty($ifforempty);
                                                if(!($ifforempty))
                                                {
                                                    foreach ($myrows as $value) {
                                                        if(!empty($value))
                                                        {
                                                        ?>
                                                            <span>
                                                                <li class="hndle">
                                                                    <input class="del_val" value="<?php echo str_replace("_", " ", $value); ?>" style="">
                                                                    <span id="delete_cat" style="" value="a"><img src="<?php echo $path_site2; ?>/delete1.png" width="9" height="9" value="a"></span>
                                                                    <span id="edit_cat" style=""><img src="<?php echo $path_site2; ?>/edit3.png" width="10" height="10"></span>
                                                                </li>
                                                            </span>
                                                        <?php
                                                        }
                                                    }
                                                }

                                                    ?>
                                                    <input type="hidden" value="<?php if (strpos($row->categories,',,') !== false)  { $row->categories = str_replace(",,",",",$row->categories); } echo $row->categories; ?>" id="allCategories" name="allCategories">
                                                    <li id="add_cat_input" style="">
                                                        <input type="text" size="11">
                                                        <a style="" id="add_new_cat_button">+ Add New Parameter	</a>
                                                    </li>
                                                </ul>
                                                <input type="hidden" value="" id="changing_val">
                                            </div>
                                        </div>
                                        
                                        <div class="postbox" style="display: none;">
                                            <h3 class="hndle"><span>Select Album</span></h3>
                                            <div class="inside">
                                                <div class="categories_select">
                                                    <input type="hidden" name="catalog_old_cats" id="catalog_old_cats" value="<?php foreach($catalogAlbumIdesArray as $catalogAlbumId) { echo $catalogAlbumId->album_id.","; } ?>"/>
                                                    <input type="hidden" name="catalog_cats" id="catalog_cats" value="<?php foreach($catalogAlbumIdesArray as $catalogAlbumId) { echo $catalogAlbumId->album_id.","; } ?>"/>
                                                    <select multiple="multiple" style="width: 100%;" name="" class="">
                                                        <?php
                                                        foreach($allAlbumsArray as $key=> $album){ ?>
                                                        <option value="<?php echo $album->id; ?> " <?php foreach($catalogAlbumIdesArray as $catalogAlbumId) { if($catalogAlbumId->album_id == $album->id)  { echo  "selected='selected'"; } }?>><?php echo $album->name; ?></option>;
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="postbox" style="display: none;">
                                            <h3 class="hndle"><span>Catalog Thumbnail</span></h3>
                                            <div class="inside">
                                                <div style="width: 200px; height: 160px;margin: 10px auto;">
                                                    <img src="<?php echo esc_html(stripslashes(str_replace(";;;", "", $row->cat_thumb))); ?>" style="width: 200px; height: 150px;margin: 0px auto;" />
                                                </div>
                                                <?php // $row->$row->cat_thumb ?>
                                                <input type="hidden" name="cat_thumb" id="cat_thumb" value="<?php echo $row->cat_thumb; ?>"/>
                                                <div class="huge-it-catalog-thumb" style="margin: 0px auto;width: 162px;">
                                                    <input type="button" class="button wp-media-buttons-icon button-primary" name="cat_thumb_button" id="cat_thumb_button" value="<?php if(esc_html(stripslashes(str_replace(";;;", "", $row->cat_thumb))) == "") echo 'Add Catalog Thumbnail'; else echo "Edit Catalog Thumbnail"; ?>" />
                                                </div>
                                            </div>
                                        </div>                                        
                                        
                                        <div id="catalog-shortcode-box" class="postbox shortcode ms-toggle">
                                            <h3 class="hndle"><span>Usage</span></h3>
                                            <div class="inside">
                                                <ul>
                                                    <li rel="tab-1" class="selected">
                                                        <h4>Shortcode</h4>
                                                        <p>Copy &amp; paste the shortcode directly into any WordPress post or page.</p>
                                                        <textarea class="full" readonly="readonly">[huge_it_catalog id="<?php echo $row->id; ?>"]</textarea>
                                                    </li>
                                                    <li rel="tab-2">
                                                        <h4>Template Include</h4>
                                                        <p>Copy &amp; paste this code into a template file to include the slideshow within your theme.</p>
                                                        <textarea class="full" readonly="readonly">&lt;?php echo do_shortcode("[huge_it_catalog id='<?php echo $row->id; ?>']"); ?&gt;</textarea>
                                                    </li>
                                                </ul>
                                            </div>
                                       </div>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" name="task" value="" />
</form>
</div>

<?php

}


function html_popup_posts($ord_elem, $count_ord,$images,$row,$cat_row, $rowim, $rowsld, $paramssld, $rowsposts, $rowsposts8, $postsbycat){

?>
			<style>
				html.wp-toolbar {
					padding:0px !important;
				}
				#wpadminbar,#adminmenuback,#screen-meta, .update-nag,#dolly {
					display:none;
				}
				#wpbody-content {
					padding-bottom:30px;
				}
				#adminmenuwrap {display:none !important;}
				.auto-fold #wpcontent, .auto-fold #wpfooter {
					margin-left: 0px;
				}
				#wpfooter {display:none;}
			</style>
    <?php
        }
    ?>
<?php

function html_catalog_reviews(){
        $getReviews = getComments()
?>
	<style>
		html.wp-toolbar {
			padding:0px !important;
		}
		#wpadminbar,#adminmenuback,#screen-meta, .update-nag,#dolly {
			display:none;
		}
		#wpbody-content {
			padding-bottom:30px;
		}
		#adminmenuwrap {display:none !important;}
		.auto-fold #wpcontent, .auto-fold #wpfooter {
			margin-left: 0px;
		}
		#wpfooter {display:none;}
		iframe {height:250px !important;}
		#TB_window {height:250px !important;}
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function() {
		                
                    jQuery('#check_all_reviews').click(function() {
                        if(jQuery("#check_all_reviews").is(':checked'))
                                jQuery(".del_one_review").each(function(){
                                    jQuery(this).attr('checked',true);
                                });
                        else
                            jQuery(".del_one_review").each(function(){
                            jQuery(this).attr('checked',false);
                        });
                    });

                    jQuery(".del_one_review").click(function() {
                        if(jQuery("#check_all_reviews").is(':checked')) {
                            jQuery("#check_all_reviews").attr('checked',false);
                        }
                    });
                
                        
                    jQuery('.del_few_reviews').on('click',function(){
                            del_few_reviews();
                    });

                    function del_few_reviews() {
                        var reviews_for_delete = [];
                        jQuery(".del_one_review").each(function(){
                            if(jQuery(this).is(':checked')) {
                                reviews_for_delete.push(jQuery(this).val());
                            }
    //                                alert(jQuery(this).val());
                        });
    //                                alert(reviews_for_delete);
                        var data = {
                            action: 'my_action',
                            post: 'delanyreviews',
                            reviews_for_delete: reviews_for_delete
                        };

                        jQuery.post(ajaxurl, data, function(response) {    //      alert(response);
                            if(response == 1) {                            //      alert(reviews_for_delete);
                                var forEach = Function.prototype.call.bind( Array.prototype.forEach );
                                forEach( reviews_for_delete, function( node ) {       //      alert( node );
                                      var class_for_delete = "." + node;              //      alert(jQuery(class_for_delete).val());
                                      jQuery(class_for_delete).parent().parent().remove();
                                });
                            }
                        });
                    }
                    
                    jQuery('.edit_com_name').on('change',function(){
                        var com_new_id = jQuery(this).parent().siblings(':first-child').find("input[name='values_for_delete']").val();  //  alert(com_id);
                        var com_new_name = jQuery(this).val();  //  alert(com_new_name);
                        
                        var data = {
                            action: 'my_action',
                            post: 'editreviewname',
                            com_new_name: com_new_name,
                            com_new_id: com_new_id
                        };

                        jQuery.post(ajaxurl, data, function(response) {     //    alert(response);
                            if(response == 1) {                            //      alert(reviews_for_delete);
                                jQuery('input').blur();
                            }
                            else {
//                                alert("Ajax Error.");
                            }
                        });
                    });
                    
                    jQuery('.edit_com_content').on('change',function(){
                        var com_new_id = jQuery(this).parent().siblings(':first-child').find("input[name='values_for_delete']").val();  //  alert(com_new_id);
                        var com_new_name = jQuery(this).val();   //    alert(com_new_name);
                        
                        var data = {
                            action: 'my_action',
                            post: 'editreviewcontent',
                            com_new_name: com_new_name,
                            com_new_id: com_new_id
                        };

                        jQuery.post(ajaxurl, data, function(response) {     //    alert(response);
                            if(response == 1) {                            //      alert(reviews_for_delete);
                                jQuery('input').blur();
                            }
                            else {
//                                alert("Ajax Error.");
                            }
                        });
                    });
                    
            jQuery("#huge_it_view_reviews_wrap .manager-link").click(function(){
            self.parent.tb_remove();
            self.parent.location.assign('admin.php?page=huge_it_catalog_reviews_page');
        });
                    
                });
	</script>
	 <div id="huge_it_view_reviews">
		<div id="huge_it_view_reviews_wrap">
			<h2>Product Reviews</h2>
                        <a class="manager-link button view_all_reviews">All Reviews Manager</a>
                            <div class="huge_it_prod_reviews_container">
                                <table>
                                    <tr><th><input type="checkbox" id="check_all_reviews"/></th><th>Name</th><th>Comment</th><th class="del_few_reviews"><a class="">Delete</a></th></tr>
                                </table>
                                <table style="border-collapse: collapse;">
                                        <?php
                                            foreach ($getReviews as $reviews) {
                                        ?>
                                                <tr style="border-bottom: 1pt solid #eee;">
                                                    <td><input type="checkbox" class="del_one_review <?php echo $reviews->id; ?>" value="<?php echo $reviews->id; ?>" name="values_for_delete" /></td>
                                                    <td><input type="text" value="<?php echo $reviews->name; ?>" style="text-align: center; border: none;" class="edit_com_name" /></td>
                                                    <td><input type="text" value="<?php echo $reviews->content; ?>" style="text-align: center; border: none;" class="edit_com_content" /></td>
                                                    <td class="del_review"><a href="admin.php?page=catalogs_huge_it_catalog&id=<?php echo $_GET['id']; ?>&task=reviews&prod_id=<?php echo $reviews->product_id; ?>&del_id=<?php echo $reviews->id; ?>">Delete</a></td>
                                                </tr>
                                        <?php } ?>
                                </table>
                            </div>
		</div>	
	</div> 
<?php
}
?>

<?php

function Html_catalog_ratings(){
        $getRatings = getRatings();
?>
<style>
        html.wp-toolbar {
                padding:0px !important;
        }
        #wpadminbar,#adminmenuback,#screen-meta, .update-nag,#dolly {
                display:none;
        }
        #wpbody-content {
                padding-bottom:30px;
        }
        #adminmenuwrap {display:none !important;}
        .auto-fold #wpcontent, .auto-fold #wpfooter {
                margin-left: 0px;
        }
        #wpfooter {display:none;}
        iframe {height:250px !important;}
        #TB_window {height:250px !important;}
</style>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#check_all_ratings').click(function() {
            if(jQuery("#check_all_ratings").is(':checked'))
                    jQuery(".del_one_rating").each(function(){
                        jQuery(this).attr('checked',true);
                    });
            else
                jQuery(".del_one_rating").each(function(){
                jQuery(this).attr('checked',false);
            });
        });

        jQuery(".del_one_rating").click(function() {
            if(jQuery("#check_all_ratings").is(':checked')) {
                jQuery("#check_all_ratings").attr('checked',false);
            }
        });

        jQuery('.del_few_ratings').on('click',function(){
                del_few_ratings();
        });

        function del_few_ratings() {
            var ratings_for_delete = [];
            jQuery(".del_one_rating").each(function(){
                if(jQuery(this).is(':checked')) {
                    ratings_for_delete.push(jQuery(this).val());
                }
            });
//                                alert(ratings_for_delete);
            var data = {
                action: 'my_action',
                post: 'delanyratings',
                ratings_for_delete: ratings_for_delete
            };
            
            jQuery.post(ajaxurl, data, function(response) {    //      alert(response);
                if(response == 1) {                            //      alert(reviews_for_delete);
                    var forEach = Function.prototype.call.bind( Array.prototype.forEach );
                    forEach( ratings_for_delete, function( node ) {       //      alert( node );
                          var class_for_delete = "." + node;              //      alert(jQuery(class_for_delete).val());
                          jQuery(class_for_delete).parent().parent().remove();
                    });
                }
            });
        }
        
        jQuery('.edit_rating_ip').on('change',function(){
            var rating_new_id = jQuery(this).parent().siblings(':first-child').find("input[name='rating_values_for_delete']").val();  //  alert(rating_new_id);
            var rating_new_ip = jQuery(this).val();  //  alert(com_new_name);

            var data = {
                action: 'my_action',
                post: 'editratingip',
                rating_new_ip: rating_new_ip,
                rating_new_id: rating_new_id
        };

                    jQuery.post(ajaxurl, data, function(response) {     //    alert(response);
                            if(response == 1) {                            //      alert(reviews_for_delete);
                                jQuery('input').blur();    //    alert("ay des vor uzum es karum es.");
                            }
                        });
       });
                    
        jQuery('.edit_rating_value').on('change',function(){
            var rating_new_id = jQuery(this).parent().siblings(':first-child').find("input[name='rating_values_for_delete']").val();  //  alert(com_new_id);
            var rating_new_value = jQuery(this).val();  //  alert(rating_new_value);

            var data = {
                action: 'my_action',
                post: 'editratingvalue',
                rating_new_value: rating_new_value,
                rating_new_id: rating_new_id
            };

            jQuery.post(ajaxurl, data, function(response) {     //    alert(response);
                if(response == 1) {                            //      alert(reviews_for_delete);
                    jQuery('input').blur();    //      alert("ay des vor uzum es karum es.");
                }
                else {
//                                alert("Ajax Error.");
                }
            });
        });
        
        jQuery("#huge_it_view_ratings_wrap .manager-link").click(function(){
            self.parent.tb_remove();
            self.parent.location.assign('admin.php?page=huge_it_catalog_ratings_page');
        });
        
    });
</script>
	 <div id="huge_it_view_ratings">
		<div id="huge_it_view_ratings_wrap">
			<h2>Product Ratings</h2>
                        <a class="manager-link button">All Ratings Manager</a>
                            <div class="huge_it_prod_ratings_container">
                                <table>
                                    <tr><th><input type="checkbox" id="check_all_ratings"/></th><th>IP Adress</th><th>Value</th><th class="del_few_ratings"><a class="">Delete</a></th></tr>
                                </table>
                                <table style="border-collapse: collapse;">
                                        <?php
                                            foreach ($getRatings as $rating) {
                                        ?>
                                                <tr style="border-bottom: 1pt solid #eee;">
                                                    <td><input type="checkbox" class="del_one_rating <?php echo $rating->id; ?>" value="<?php echo $rating->id; ?>" name="rating_values_for_delete" /></td>
                                                    <td><input type="text" value="<?php echo $rating->ip; ?>" style="text-align: center; border: none;" class="edit_rating_ip" /></td>
                                                    <td><input type="text" value="<?php echo $rating->value; ?>" style="text-align: center; border: none;" class="edit_rating_value" /></td>
                                                    <td class="del_rating"><a href="admin.php?page=catalogs_huge_it_catalog&id=<?php echo $_GET['id']; ?>&task=ratings&prod_id=<?php echo $rating->prod_id; ?>&del_id=<?php echo $rating->id; ?>">Delete</a></td>
                                                </tr>
                                        <?php } ?>
                                        
                                                
                                </table>
                            </div>
		</div>	
	</div> 
<?php
}
?>