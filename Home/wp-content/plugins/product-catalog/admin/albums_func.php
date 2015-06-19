<?php

if (function_exists('current_user_can'))
    if (!current_user_can('manage_options')) {
        die('Access Denied');
    }
if (!function_exists('current_user_can')) {
    die('Access Denied');
}

function show_albums(){
    global $wpdb;
    
    $query = "SELECT * FROM " . $wpdb->prefix . "huge_it_catalog_albums,". $wpdb->prefix . "huge_it_catalog_album_catalog_contact WHERE " . $wpdb->prefix . "huge_it_catalog_album_catalog_contact.album_id=" . $wpdb->prefix . "huge_it_catalog_albums.id GROUP BY ". $wpdb->prefix . "huge_it_catalog_album_catalog_contact.album_id";
    $albumsArray = $wpdb->get_results($query);
    $query = "SELECT count(*) as count FROM " . $wpdb->prefix . "huge_it_catalog_album_catalog_contact GROUP BY album_id";
    $catalogsCountsArray = $wpdb->get_results($query);
    html_show_albums($albumsArray,$catalogsCountsArray);
}

function edit_album($id)
{
global $wpdb;
    if(isset($_GET["removeslide"])){
        if($_GET["removeslide"] != ''){
            $wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."huge_it_catalog_album_catalog_contact WHERE album_id = '%s' AND catalog_id='%s'",$_GET['id'], $_GET['removeslide']));
        }
    }

    $catalogsInAlbum = $wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_album_catalog_contact,".$wpdb->prefix."huge_it_catalogs WHERE ".$wpdb->prefix."huge_it_catalog_album_catalog_contact.album_id= %d AND ".$wpdb->prefix."huge_it_catalog_album_catalog_contact.catalog_id=".$wpdb->prefix."huge_it_catalogs.id order by ".$wpdb->prefix."huge_it_catalogs.ordering",$id);
    $catalogsInAlbumArray = $wpdb->get_results($catalogsInAlbum);
    
    $query= "SELECT * FROM ".$wpdb->prefix."huge_it_catalog_albums";
    $AlbumsArray = $wpdb->get_results($query);
    
    $query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_albums WHERE id= %d",$id);
    $row=$wpdb->get_row($query);

//    $query=$wpdb->prepare("SELECT name,ordering FROM ".$wpdb->prefix."huge_it_catalogs WHERE sl_width=%d  ORDER BY `ordering` ",$row->sl_width);
//    $ord_elem=$wpdb->get_results($query);
//    var_dump($row->sl_width);exit;
    $query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_products where catalog_id = %d order by ordering ASC  ",$row->id);
    $rowim=$wpdb->get_results($query);

    $query="SELECT * FROM ".$wpdb->prefix."huge_it_catalog_albums order by id ASC";
    $rowsld=$wpdb->get_results($query);
    $query = "SELECT *  from " . $wpdb->prefix . "huge_it_catalog_params ";
    $rowspar = $wpdb->get_results($query);
    $paramssld = array();
    foreach ($rowspar as $rowpar) {
        $key = $rowpar->name;
        $value = $rowpar->value;
        $paramssld[$key] = $value;
    }

    Html_edit_album($AlbumsArray,$catalogsInAlbumArray, $row, $rowim, $rowsld, $paramssld);
}

function apply_cat($id)
{ //    exit;
    global $wpdb;

    if(isset($_POST["name"])){
        if($_POST["name"] != "" && $_POST["name"] != null){
            $wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_catalog_albums SET  catalog_album_view_mode = '%s'  WHERE id = '%d' ",$_POST["catalog_album_view_mode"], $id));
            $wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_catalog_albums SET  name = '%s'  WHERE id = '%d' ",$_POST["name"], $id));
        }
    }
    
    
    
//    $wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_catalog_albums SET  image_url = '".$_POST["imagess".$rowimages->id.""]."'  WHERE ID = %d ", $rowimages->id));
    
    $getCatalogId=$wpdb->prepare("SELECT catalog_id FROM ".$wpdb->prefix."huge_it_catalog_album_catalog_contact WHERE album_id = %d", $id);
    $getCatalogIdArray=$wpdb->get_results($getCatalogId); // te vor katalognern en irar het kapvac 
    if(!isset($_GET['removeslide'])){
        foreach ($getCatalogIdArray as $key=>$catalog){
            $wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_catalogs SET  name = '%s'  WHERE id = '%s' ", $_POST["name".$catalog->catalog_id.""], $catalog->catalog_id));
            $wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_catalogs SET  description = '%s'  WHERE id = '%s' ", $_POST["description".$catalog->catalog_id.""], $catalog->catalog_id));
//            $wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_catalogs SET  url = '%s'  WHERE id = '%s' ", $_POST["url".$catalog->catalog_id.""], $catalog->catalog_id));
//            $wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_catalogs SET  link_target = '%s'  WHERE id = '%s' ", $_POST["link_target".$catalog->catalog_id.""], $catalog->catalog_id));
            $wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_catalogs SET  cat_thumb = '%s'  WHERE id = '%s' ",$_POST["imagess".$catalog->catalog_id.""], $catalog->catalog_id));
            $wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_catalogs SET  ordering = '%s'  WHERE ID = %d ", $_POST["order_by_".$catalog->catalog_id.""], $catalog->catalog_id));
        }
    }
        
        
    if(isset($_POST["catalogs"]))
    {
        if(isset($_POST["save_or_not"])){
              if($_POST["save_or_not"] != ""){
                  $catalogs = explode(';;;', $_POST["catalogs"]);
                  
                  $catalogsInAlbum = $wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_album_catalog_contact,".$wpdb->prefix."huge_it_catalogs WHERE ".$wpdb->prefix."huge_it_catalog_album_catalog_contact.album_id= %d AND ".$wpdb->prefix."huge_it_catalog_album_catalog_contact.catalog_id=".$wpdb->prefix."huge_it_catalogs.id order by ".$wpdb->prefix."huge_it_catalogs.ordering",$id);
                  $catalogsInAlbumArray = $wpdb->get_results($catalogsInAlbum);
//                var_dump($catalogs);exit;
                  foreach ($catalogs as $catalogForInsert) {
                    if($catalogForInsert != ""){
                        foreach ($catalogsInAlbumArray as $key => $catalogForOrdering) {
//                            var_dump($catalogForOrdering->id);
//                            var_dump($catalogForOrdering->ordering);
                            $newOrdering = $catalogForOrdering->ordering + 1;
                            $wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_catalogs SET  ordering = '%s'  WHERE id = '%d' ",$newOrdering, $catalogForOrdering->id));
                        }
                        
                        $wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->prefix."huge_it_catalogs"
        .               "( `name`, `sl_height`, `sl_width`, `pause_on_hover`, `catalog_list_effects_s`, `description`, `param`, `sl_position`, `ordering`, `published`, `categories`, `ht_show_sorting`, `ht_show_filtering`, `cat_thumb`)"
        .               " VALUES ( 'New Catalog', '375', '600', 'on', 'cubeH', '4000', '1000', 'center', '1', '300', 'My First Category,My Second Category,My Third Category,', 'off', 'off', '%s')", $catalogForInsert ));
                    
                    
                    $getLastIdFromCatalogs="SELECT MAX(id) as last_key FROM ".$wpdb->prefix."huge_it_catalogs";
                    $lastIdArray=$wpdb->get_results($getLastIdFromCatalogs);
                    $last_key = $lastIdArray[0]->last_key;
                    $wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->prefix."huge_it_catalog_album_catalog_contact ( album_id,catalog_id ) VALUES ( %s,$last_key )", $id ));
                }
              }
            }
         }
        
    }
    //    var_dump($id);
    $ifExistsCatalogInAlbum = $wpdb->get_row($wpdb->prepare("SELECT count(*) as count FROM ".$wpdb->prefix."huge_it_catalog_album_catalog_contact WHERE album_id = '%s'",$id));
//    var_dump($ifExistsCatalogInAlbum->count);exit;
    if($ifExistsCatalogInAlbum->count > 1){
        $wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."huge_it_catalog_album_catalog_contact WHERE album_id = '%s' AND catalog_id='0'",$id));
    }
    
}

function add_album()
{
	global $wpdb;
	
	$table_name = $wpdb->prefix . "huge_it_catalog_albums";
        $sql_add_album = "
INSERT INTO 

`" . $table_name . "` ( `name`, `catalog_album_view_mode`) VALUES
( 'New Album', '2')";

     $wpdb->query($sql_add_album);

     $query="SELECT MAX(id) as last_key FROM ".$wpdb->prefix."huge_it_catalog_albums";
     $rowsldcc=$wpdb->get_results($query);
     $last_key = $rowsldcc[0]->last_key;
//     var_dump($last_key);exit;
     $table_name = $wpdb->prefix . "huge_it_catalog_album_catalog_contact";
     
         $sql_add_album_catalog_contact = $wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->prefix."huge_it_catalog_album_catalog_contact ( album_id,catalog_id ) VALUES ( '%s','0' )", $last_key ));
        
     header('Location: admin.php?page=huge_it_catalog_albums_page&task=edit_album&id='.$rowsldcc[0]->last_key);

}

function remove_album($id){
    global $wpdb;
    
    $wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."huge_it_catalog_albums WHERE id = '%s' ",$id));
    $wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."huge_it_catalog_album_catalog_contact WHERE id = '%s' ",$id));
}


?>
