<?php
if (function_exists('current_user_can'))
    if (!current_user_can('manage_options')) {
        die('Access Denied');
    }
if (!function_exists('current_user_can')) {
    die('Access Denied');
}

function html_show_albums($albumsArray,$catalogsCountsArray) {  //  var_dump($albumsArray);// exit; ?>
    <div class="wrap">
	<?php //$path_site2 = plugins_url("../images", __FILE__); ?>
	<div id="poststuff">
            <div id="catalogs-list-page">
                <h2>Huge-IT Catalog Albums
                        <a onclick="window.location.href='admin.php?page=huge_it_catalog_albums_page&task=add_album'" class="add-new-h2" >Add New Stand</a>
                </h2>
                 <table class="wp-list-table widefat fixed pages" style="width:95%">
                    <thead>
                        <tr>
                            <th scope="col" id="id" style="width:30px" ><span>ID</span><span class="sorting-indicator"></span></th>
                            <th scope="col" id="name" style="width:85px" ><span>Name</span><span class="sorting-indicator"></span></th>
                            <th scope="col" id="prod_count"  style="width:75px;" ><span>Catalogs</span><span class="sorting-indicator"></span></th>
                            <th style="width:40px">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php            //            var_dump($catalogsCountsArray[$albumKey]);
                            $trcount=1;
                            foreach($albumsArray as $albumKey => $album){ $trcount++;  // var_dump($album->catalog_id); ?>
                                <tr <?php if($trcount%2==0){ echo 'class="has-background"';}?>>
                                    <td><?php echo $album->album_id; ?></td>
                                    <td><a  href="admin.php?page=huge_it_catalog_albums_page&task=edit_album&id=<?php echo $album->album_id; ?>"><?php echo $album->name; ?></a></td>
                                    <td>(<?php if($catalogsCountsArray[$albumKey]->count == "" || $album->catalog_id == 0) echo 0;else echo $catalogsCountsArray[$albumKey]->count; ?>)</td>
                                    <td><a  href="admin.php?page=huge_it_catalog_albums_page&task=remove_album&id=<?php echo $album->album_id; ?>">Delete</a></td>
                               </tr>
                      <?php } ?>
                    </tbody>
                </table>
                <input type="hidden" name="oreder_move" id="oreder_move" value="" />
                <input type="hidden" name="asc_or_desc" id="asc_or_desc" value="<?php if(isset($_POST['asc_or_desc'])) echo $_POST['asc_or_desc'];?>"  />
                <input type="hidden" name="order_by" id="order_by" value="<?php if(isset($_POST['order_by'])) echo $_POST['order_by'];?>"  />
                <input type="hidden" name="saveorder" id="saveorder" value="" />
            </div>
        </div>
    </div>

<?php }

function Html_edit_album($AlbumsArray,$catalogsInAlbumArray, $row, $rowim, $rowsld, $paramssld)
{   //    var_dump($catalogsInAlbumArray);
?>

<script>
function submitbutton(pressbutton) 
{
	if(!document.getElementById('name').value){
	alert("Name is required.");
	return;
	
	}
        document.getElementById("save_or_not").value = "1";
	document.getElementById("adminForm").action=document.getElementById("adminForm").action+"&task="+pressbutton;
	document.getElementById("adminForm").submit();
        document.getElementById("save_or_not").value = "0";
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
                  var index = jQuery(this).index() + 1;
                      jQuery(this).find('.order_by').val(index);
              });
	  },
	  revert: true
	});
   // jQuery( "ul, li" ).disableSelection();
});
</script>
    
    
<div class="wrap">
<?php $path_site2 = plugins_url("../images", __FILE__); ?>
<form action="admin.php?page=huge_it_catalog_albums_page&id=<?php echo $row->id; ?>" method="post" name="adminForm" id="adminForm">
	<div id="poststuff" >
	<div id="catalog-header">
		<ul id="catalogs-list">
                    <?php
                    $descAlbumsArray = array_reverse($AlbumsArray, true);
			foreach($descAlbumsArray as $album){
				if($album->id != $row->id){
				?>
					<li>
                                            <a href="#" onclick="window.location.href='admin.php?page=huge_it_catalog_albums_page&task=edit_album&id=<?php echo $album->id; ?>'" ><?php echo $album->name; ?></a>
					</li>
				<?php
				}
				else{ ?>
					<li class="active" style="background-image:url(<?php echo plugins_url('../images/edit.png', __FILE__) ;?>)">
                                            <input class="text_area" onfocus="this.style.width = ((this.value.length + 1) * 8) + 'px'" type="text" name="name" id="name" maxlength="250" value="<?php echo $album->name ;?>" />
					</li>
				<?php	
				}
			}
		?>
			<li class="add-new">
				<a onclick="window.location.href='admin.php?page=huge_it_catalog_albums_page&task=add_album'">+</a>
			</li>
		</ul>
		</div>
		<div id="post-body" class="metabox-holder columns-2">
			<!-- Content -->
			<div id="post-body-content">


			<?php add_thickbox(); ?>

				<div id="post-body">
					<div id="post-body-heading">
						<h3>Catalogs</h3>
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

						<input type="hidden" name="catalogs" id="_unique_name" />
						<span class="wp-media-buttons-icon"></span>
						<div class="huge-it-newuploader uploader button button-primary add-new-image">
						<input type="button" class="button wp-media-buttons-icon album-media-buttons-icon" name="_unique_name_button" id="_unique_name_button" value="Add New Catalog" />
						</div>
				
					</div>
					<ul id="images-list">
                                        <?php
                                                                 
                                        $j=2;
					                                        
					foreach ($catalogsInAlbumArray as $catalog){    //   var_dump($catalogsInAlbumArray); ?>
                                            
						<li <?php if($j%2==0){ echo "class='has-background'"; } $j++; ?>>
							<input class="order_by" type="hidden" name="order_by_<?php echo $catalog->catalog_id; ?>" value="<?php echo $catalog->ordering; ?>" />
							<div class="image-container">
								<ul class="widget-images-list">
                                                                    <li class="editthisimage first">
                                                                        <?php
                                                                        if($catalog->cat_thumb == "" || $catalog->cat_thumb == null || strpos($catalog->cat_thumb,'noimage.png')){ ?>
                                                                            <img src="<?php echo plugins_url('../images/noimage.png',__FILE__);  ?>" />
                                                                        <?php }
                                                                        else  {
                                                                            $img = str_replace(';;;', '', $catalog->cat_thumb);  ?>
                                                                            <img src="<?php echo $img; ?>" />
                                                                        <?php } ?>
                                                                        
                                                                        <input type="button" class="edit-image"  id="" value="Edit" <?php if($catalog->cat_thumb == "" || $catalog->cat_thumb == null || strpos($catalog->cat_thumb,'noimage.png')) { echo "style='right: 0px !important'"; } ?> />
                                                                    <?php 
                                                                        if($catalog->cat_thumb != "" || $catalog->cat_thumb != null) { ?>
                                                                            <a href="#remove" class="remove-image">remove</a>
                                                                  <?php } ?>
                                                                    </li>
                                                                    <li class="add-image-box" style="display: none;">
                                                                            <input type="hidden" name="imagess<?php echo $catalog->catalog_id; ?>" id="unique_name<?php echo $catalog->catalog_id; ?>" class="all-urls" value="<?php echo $catalog->cat_thumb; ?>" />
                                                                            <input type="button" class="button<?php echo $catalog->catalog_id; ?> wp-media-buttons-icon add-image"  id="unique_name_button<?php echo $catalog->catalog_id; ?>" value="+" />	
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
//										jQuery('.huge-it-newuploader .button').click(function(e) {
//											var send_attachment_bkp = wp.media.editor.send.attachment; //  alert(send_attachment_bkp);
//											var button = jQuery(this);
//											var id = button.attr('id').replace('_button', '');
//											_custom_media = true;
//
//											jQuery("#"+id).val('');
//											wp.media.editor.send.attachment = function(props, attachment){
//											  if ( _custom_media ) {
//                                                                                                 jQuery("#"+id).val(attachment.url+';;;'+jQuery("#"+id).val());
//												 jQuery("#save-buttom").click();
//											  } else {
//												return _orig_send_attachment.apply( this, [props, attachment] );
//											  };
//											}
//											wp.media.editor.open(button);
//											return false;
//										});
										  
										
										 /*#####ADD IMAGE######*/  
//										jQuery('.add-image.button<?php echo $rowimages->id; ?>').click(function(e) {
//											var send_attachment_bkp = wp.media.editor.send.attachment;
//
//											var button = jQuery(this);
//											var id = button.attr('id').replace('_button', '');
//											_custom_media = true;
//
//											wp.media.editor.send.attachment = function(props, attachment){
//											  if ( _custom_media ) {
//													jQuery("#"+id).parent().before('<li class="editthisimage1 "><img src="'+attachment.url+'" alt="" /><input type="button" class="edit-image"  id="" value="Edit" /><a href="#remove" class="remove-image">remove</a></li>');
//													//alert(jQuery("#"+id).val());
//													jQuery("#"+id).val(jQuery("#"+id).val()+attachment.url+';');
//													
//													secondimageslistlisize();
//
//											  } else {
//												return _orig_send_attachment.apply( this, [props, attachment] );
//											  };
//											}
//
//											wp.media.editor.open(button);
//											 
//											return false;
//										});
                                                                                
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
													allurls = allurls+jQuery(this).attr('src')+';;;';
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
										
										
										/*#####REMOVE IMAGE######*/  
										jQuery("ul.widget-images-list").on('click','.remove-image',function () {
											jQuery(this).parent().find('img').attr('src','<?php echo plugins_url('../images/noimage.png',__FILE__);  ?>');
											jQuery(this).parent().find('.edit-image').css({'right' : '0px'});
											var allUrls="";
											
											jQuery(this).parents('ul.widget-images-list').find('img').not('.plus').each(function(){
												allUrls=allUrls+jQuery(this).attr('src')+';;;';
												jQuery(this).parent().parent().parent().find('input.all-urls').val(allUrls);
												secondimageslistlisize();
											});
                                                                                        jQuery(this).remove();
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
                                                                                
//                                                                                var parameters_width = jQuery(".options-container").height();    //   alert(parameters_width)
//                                                                                jQuery(".category-container").height(parameters_width);
									});
                                                                        
								</script>
							</div>
							<div class="image-options album-image-options">
								<div class="options-container">
									<div>
										<label for="name<?php echo $catalog->catalog_id; ?>">Title:</label>
										<input  class="text_area" type="text" id="name<?php echo $catalog->catalog_id; ?>" name="name<?php echo $catalog->catalog_id; ?>" id="name<?php echo $catalog->catalog_id; ?>"  value="<?php echo $catalog->name; ?>">
									</div>
									<div class="description-block">
										<label for="description<?php echo $catalog->catalog_id; ?>">Description:</label>
										<textarea id="description<?php echo $catalog->catalog_id; ?>" name="description<?php echo $catalog->catalog_id; ?>" ><?php echo $catalog->description; ?></textarea>
									</div>
<!--									<div class="link-block">
										<label for="url<?php echo $catalog->catalog_id; ?>">URL:</label>
										<input class="text_area url-input" type="text" id="url<?php echo $catalog->catalog_id; ?>" name="url<?php echo $catalog->catalog_id; ?>"  value="<?php echo $catalog->url; ?>" >
										<label class="long" for="link_target<?php echo $catalog->catalog_id; ?>">
											<span>Open in new tab</span>
											<input type="hidden" name="link_target<?php echo $catalog->catalog_id; ?>" value="" />
											<input  <?php if($catalog->link_target == 'on'){ echo 'checked="checked"'; } ?>  class="link_target<?php echo $catalog->catalog_id; ?>" type="checkbox" id="link_target<?php echo $catalog->catalog_id; ?>" name="link_target<?php echo $catalog->catalog_id; ?>" />
										</label>
									</div>-->
								</div>
                                                                
								<div class="remove-image-container">
									<a class="button remove-image" href="admin.php?page=huge_it_catalog_albums_page&task=apply&removeslide=<?php echo $catalog->catalog_id; ?>&id=<?php echo $row->id; ?>">Remove Catalog</a>
                                                                        <a class="button remove-image" href="admin.php?page=catalogs_huge_it_catalog&task=edit_cat&id=<?php echo $catalog->catalog_id; ?>">Edit Catalog</a>
								</div>
							</div>
							<div class="clear"></div>
						</li>
					<?php  } ?>
					</ul>
				</div>

			</div>

                        <!-- SIDEBAR -->
			<div id="postbox-container-1" class="postbox-container">
				<div id="side-sortables" class="meta-box-sortables ui-sortable">
					<div id="catalog-unique-options" class="postbox">
					<h3 class="hndle"><span>Select The Album Theme</span></h3>
					<ul id="catalog-unique-options-list">
						<li>
							<label for="catalog_album_view_mode">Views</label>
							<select name="catalog_album_view_mode" id="catalog_album_view_mode">
									<option <?php if($row->catalog_album_view_mode == '0'){ echo 'selected'; } ?>  value="0">Blocks Toggle Up/Down</option>
									<option <?php if($row->catalog_album_view_mode == '1'){ echo 'selected'; } ?>  value="1">Full-Height Blocks</option>
									<option <?php if($row->catalog_album_view_mode == '2'){ echo 'selected'; } ?>  value="2">Catalog/Content-Popup</option>
									<option <?php if($row->catalog_album_view_mode == '3'){ echo 'selected'; } ?>  value="3">Full-Width Blocks</option>
									<option <?php if($row->catalog_album_view_mode == '5'){ echo 'selected'; } ?>  value="5">Content Slider</option>
							</select>
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
                                                <input type="hidden" name="save_or_not" id="save_or_not" value="" />
					</div>
                                                                        
                                        <div id="catalog-shortcode-box" class="postbox shortcode ms-toggle">
                                            <h3 class="hndle"><span>Usage</span></h3>
                                            <div class="inside">
                                                <ul>
                                                    <li rel="tab-1" class="selected">
                                                        <h4>Shortcode</h4>
                                                        <p>Copy &amp; paste the shortcode directly into any WordPress post or page.</p>
                                                        <textarea class="full" readonly="readonly">[huge_it_catalog_album id="<?php echo $row->id; ?>"]</textarea>
                                                    </li>
                                                    <li rel="tab-2">
                                                        <h4>Template Include</h4>
                                                        <p>Copy &amp; paste this code into a template file to include the slideshow within your theme.</p>
                                                        <textarea class="full" readonly="readonly">&lt;?php echo do_shortcode("[huge_it_catalog_album id='<?php echo $row->id; ?>']"); ?&gt;</textarea>
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