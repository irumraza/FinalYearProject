<?php
if (function_exists('current_user_can'))
    if (!current_user_can('manage_options')) {
        die('Access Denied');
    }
if (!function_exists('current_user_can')) {
    die('Access Denied');
}

function html_show_ratings($ratingsArray) { $keyForBackground = 1;  //  var_dump($ratingsArray);exit; ?>
<?php $path_site2 = plugins_url("../images", __FILE__); ?>
        <div class="wrap">
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
    <div id="poststuff">
        <div id="catalogs-list-page">
            <h2>Huge-IT Catalog Ratings</h2>
            <div id="huge_it_catalog_ratings_page">
            <div id="huge_it_catalog_reviews_container">
                <table class="widefat fixed comments">
                        <thead>
                            <tr>
                                <th scope="col" id="cb" class="manage-column column-cb check-column" style="">
                                    <label class="screen-reader-text" for="cb-select-all-<?php  ?>">Select All</label>
                                    <input id="cb-select-all-<?php  ?>" type="checkbox">
                                </th>
                                <th >
                                    <span>Product Name</span><span class="sorting-indicator"></span>
                                </th>
                                <th >Rating</th>
                                <th >
                                    <span>Author IP</span><span class="sorting-indicator"></span>
                                </th>
                                <th >Submited On</th>
                                <th >Edit</th>
                                <th ><a id="doaction" >Delete</a></th>

                            </tr>
                        </thead>

                        <tbody id="the-comment-list" data-wp-lists="list:comment">
                        <?php foreach ($ratingsArray as $rating) {  ?>
                                <tr id="comment-<?php echo $rating->id; ?>" class="comment even thread-even depth-<?php echo $keyForBackground; if($keyForBackground%2 == 0) echo " alt"; ?> ">
                                    <th scope="row" class="check-column">
                                        <label class="screen-reader-text" for="cb-select-<?php echo $rating->id; ?>">Select comment</label>
                                        <input id="cb-select-<?php echo $keyForBackground; ?>" type="checkbox" name="check_comments" value="<?php echo $rating->id; ?>">
                                    </th>
                                    <td class="response column-response">
                                        <div class="response-links">
                                            <span class="post-com-count-wrapper">
                                                <?php echo $rating->name; ?>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="comment column-comment">
                                        <div class="comment-author">
                                            <strong>
                                                <?php echo $rating->ip; ?>
                                            </strong>
                                            <br>
                                            <a href="edit-comments.php?s=&amp;mode=detail"></a>
                                        </div>
                                        <input class="reviews_textarea" id_for_edit="<?php echo $rating->id; ?>" value="<?php echo $rating->value; ?>" />
                                        <div id="inline-1" class="hidden">
                                        <textarea class="comment" rows="1" cols="1"><?php echo $rating->value; ?></textarea>
                                        <div class="author-email"></div>
                                        <div class="author"><?php echo $rating->ip; ?></div>
                                        <div class="comment_status">1</div>
                                        </div>
                <!--                        <div class="row-actions">
                                            <span class="edit" value="<?php echo $rating->id; ?>"> | <a title="Edit comment">Edit</a></span>
                                            <span class="trash" value="<?php echo $rating->id; ?>"> | <a class="delete vim-d vim-destructive" title="Move this comment to the trash">Trash</a>
                                            </span>
                                        </div>-->
                                    </td>
                                    <td class="author column-author">
                                        <input value="<?php echo $rating->ip; ?>" id_for_edit="<?php echo $rating->id; ?>" />
                                       <br>
                                        <a href="edit-comments.php?s=&amp;mode=detail"></a>
                                    </td>

                                    <td><?php echo " ".$rating->date; ?></td>
                                    <td><span class="edit" value="<?php echo $rating->id; ?>"> <a>Edit</a></td>
                                    <td><span class="trash" value="<?php echo $rating->id; ?>"> <a>Delete</a></td>
                                </tr>
                        <?php $keyForBackground++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    jQuery( document ).ready(function() {
        
//        jQuery("body").not('.wrap .poststuff #catalogs-list-page #huge_it_catalog_ratings_page #huge_it_catalog_reviews_container table .edit').click(function(){
//            jQuery("#the-comment-list input").css({"box-shadow" : "none"});
//        });
        
        jQuery('#huge_it_catalog_ratings_page .trash').click(function(){
            var rating_id = jQuery(this).attr('value');
            var ratings_for_delete = [];
            ratings_for_delete.push(jQuery(this).attr('value'));
            var data = {
                            action: 'my_action',
                            post: 'delanyratings',
                            ratings_for_delete: ratings_for_delete
                       };
            jQuery.post(ajaxurl, data, function(response) {    //      alert(response);
                if(response == 1) {                            //      alert(ratings_for_delete);
                    jQuery("#comment-"+rating_id).remove();
                    var key_for_background = 0;
                    jQuery("#the-comment-list tr").each(function(){
                        key_for_background++;
                        if(key_for_background%2 == 0){ jQuery(this).addClass('alt'); }
                        else{ jQuery(this).removeClass('alt');('alt'); }
                    });
                }
           });
        });
        jQuery('#huge_it_catalog_ratings_page .edit').click(function(){
            jQuery("#the-comment-list input").css({"box-shadow" : "none"});
            jQuery(this).parent().parent().find(".reviews_textarea").css({"box-shadow" : "0 0 4px #007eff"});
            jQuery(this).parent().parent().find(".author input").css({"box-shadow" : "0 0 4px #007eff"});
        });
        
//        jQuery('*').not('.edit_all').not('.edit').click(function(){
//            alert("ok");
//        });
        
        jQuery('.edit_all').click(function(){
            jQuery("#the-comment-list input").css({"box-shadow" : "none"});
            jQuery(".reviews_textarea").css({"box-shadow" : "0 0 4px #007eff"});
            jQuery(".author input").css({"box-shadow" : "0 0 4px #007eff"});
        });
        
        
        
        jQuery('#huge_it_catalog_ratings_page .reviews_textarea').focus(function(){
            jQuery(this).css({"box-shadow" : "0 0 4px #007eff"});
        });
        jQuery('#huge_it_catalog_ratings_page .reviews_textarea').blur(function(){
            jQuery(this).css({"box-shadow" : "none"});
            jQuery(this).parent().parent().parent().find(".author input").css({"box-shadow" : "none"});
        });
        jQuery('#huge_it_catalog_ratings_page .column-author input').focus(function(){
            jQuery(this).css({"box-shadow" : "0 0 1px #007eff"});
        });
        jQuery('#huge_it_catalog_ratings_page .column-author input').blur(function(){
            jQuery(this).css({"box-shadow" : "none"});
            jQuery(this).parent().parent().parent().find(".author input").css({"box-shadow" : "none"});
        });
        jQuery('#huge_it_catalog_ratings_page .reviews_textarea').change(function(){
            var rating_new_id = jQuery(this).attr('id_for_edit');   //   alert(rating_new_id);
            var rating_new_value = jQuery(this).val();  //  alert(rating_new_value);
            if(rating_new_value > 5){ alert('Maximum Value 5');return false; }
            var data = {
                            action: 'my_action',
                            post: 'editratingvalue',
                            rating_new_id: rating_new_id,
                            rating_new_value: rating_new_value
                        };
            jQuery.post(ajaxurl, data, function(response) { // alert(response);
                 if(response == 1) {  }
            });
        });
        jQuery('#huge_it_catalog_ratings_page .author input').change(function(){
            var rating_new_id = jQuery(this).attr('id_for_edit');   //   alert(rating_new_id);
            var rating_new_ip = jQuery(this).val(); //   alert(com_new_name);
            var data = {
                            action: 'my_action',
                            post: 'editratingip',
                            rating_new_id: rating_new_id,
                            rating_new_ip: rating_new_ip
                       };
            jQuery.post(ajaxurl, data, function(response) {
                 if(response == 1) { jQuery('input').blur(); }
            });
        });
        
    });
    jQuery('#huge_it_catalog_ratings_page #doaction').click(function(){
                var checked_ratings = [];
                jQuery("input[name='check_comments']").each(function(){
                    if(jQuery(this).is(':checked')) {
                        checked_ratings.push(jQuery(this).val());
                    }
                });
                if(checked_ratings.length > 0){
                            var data = {
                                action: 'my_action',
                                post: 'delanyratings',
                                ratings_for_delete: checked_ratings
                            };
                }
            
                jQuery.post(ajaxurl, data, function(response) {  //  alert(response);
                    if(response == 1) {
                        var forEach = Function.prototype.call.bind( Array.prototype.forEach );
                        forEach( checked_ratings, function( node ) {       //      alert( node );
                              jQuery("#comment-"+node).remove();
                        });
                    }
               });
        });
    
</script>
<style>
    
#huge_it_catalog_ratings_page a {
    cursor: pointer;
}

#huge_it_catalog_ratings_page .reviews_textarea {
    resize: none;
    border: none;
    box-shadow: none;
    background-color: inherit;
    margin: -4px 0px 0px -4px;
    color: #555;
}

#huge_it_catalog_ratings_page .author input {
    border: none;
    box-shadow: none;
    background-color: inherit;
    margin: -4px 0px 0px -4px;
    padding: 3px;
    color: #555;
}

#huge_it_catalog_ratings_page table tr td {
    padding: 8px 0px 5px 5px !important;
}
#huge_it_catalog_ratings_page table tr th {
    padding: 8px 0px 3px 5px !important;
}

#poststuff h2 {
    margin-top: 0;
    padding-top: 0;
}

</style>

<?php } ?>