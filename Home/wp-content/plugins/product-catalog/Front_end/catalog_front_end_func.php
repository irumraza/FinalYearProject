<?php
function showPublishedcatalogs_1($id)
{
 global $wpdb;
 
	$query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_products WHERE catalog_id = '%d' order by ordering ASC",$id);
        $images=$wpdb->get_results($query);
        
	$query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalogs WHERE id = '%d' order by id ASC",$id);
        $catalog=$wpdb->get_results($query);
			   
//        $query="SELECT * FROM ".$wpdb->prefix."huge_it_catalog_params";
//        $rowspar = $wpdb->get_results($query);
        
        $paramssld = array();
//        foreach ($rowspar as $rowpar) {
//            $key = $rowpar->name;
//            $value = $rowpar->value;
//            $paramssld[$key] = $value;
//        }
//        var_dump($paramssld[$key]);exit;
        
            $getCatalogsFromAlbum=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_album_catalog_contact,".$wpdb->prefix."huge_it_catalogs WHERE ".$wpdb->prefix."huge_it_catalog_album_catalog_contact.album_id = '%d' AND ".$wpdb->prefix."huge_it_catalog_album_catalog_contact.catalog_id=".$wpdb->prefix."huge_it_catalogs.id order by ordering ASC",$id);
            $catalogsFromAlbumArray=$wpdb->get_results($getCatalogsFromAlbum);
            
        if(isset($_GET['single_prod_id'])){
            $id = $_GET['single_prod_id'];
            $getRatings=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_rating WHERE prod_id = '%d'",$id);
            $ratingsArray=$wpdb->get_results($getRatings);
            
            $getReviews=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_reviews WHERE product_id = '%d'",$id);
            $reviewsArray=$wpdb->get_results($getReviews);
            
            $getProduct=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_products WHERE id = '%d' order by ordering ASC",$id);
            $productArray=$wpdb->get_results($getProduct);
            
            $getSpams = $wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_reviews WHERE spam = '%d'",1);
            $spamsArray = $wpdb->get_results($getSpams);
//            var_dump($spamsArray);
            
            $spamReviewsArray = array();
            foreach ($spamsArray as $spamReview) {
                if($spamReview->spam != 0) { $spamReviewsArray[] = $spamReview->ip; }
            }
//            var_dump($spamReviewsArray);
//            $query="SELECT * FROM ".$wpdb->prefix."huge_it_catalog_product_params";
//            $rowspar = $wpdb->get_results($query);
            $paramssld = array();
//            foreach ($rowspar as $rowpar) {
//                $key = $rowpar->name;
//                $value = $rowpar->value;
//                $paramssld[$key] = $value;
//            }
            
//            $query="SELECT * FROM ".$wpdb->prefix."huge_it_catalog_params";
//            $rowspar2 = $wpdb->get_results($query);

            $paramssld2 = array();
//            foreach ($rowspar2 as $rowpar2) {
//                $key2 = $rowpar2->name;
//                $value2 = $rowpar2->value;
//                $paramssld2[$key2] = $value2;
//            }
            $paramssld1 = "";
            $paramssld2 = "";
            $captchaFirstNum = rand(1,9);
            $captchaSecondNum = rand(1,9);
            $captcha_val = $captchaFirstNum + $captchaSecondNum;
            $wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_catalog_products  SET published_in_sl_width = '%s'", $captcha_val));
            
            return html_single_product_page($productArray, $paramssld, $paramssld2, $ratingsArray, $reviewsArray, $spamReviewsArray, $captchaFirstNum, $captchaSecondNum, $captcha_val);
        }
        else{
            $paramssld1 = "";
            $paramssld2 = "";
            if(isset($_GET['asc_seller_product_id'])){
                return front_end_ask_seller();
            }
            else{
                $paramssld1 = "";
                $paramssld2 = "";
                return front_end_catalog($images, $paramssld, $catalog, $catalogsFromAlbumArray);
            }
        }

}
function show_catalogs_from_album($id)
{
    global $wpdb;

        $getCatalogsFromAlbum = $wpdb->prepare("SELECT *, ".$wpdb->prefix."huge_it_catalogs.name as catalog_name  FROM ".$wpdb->prefix."huge_it_catalog_album_catalog_contact,".$wpdb->prefix."huge_it_catalogs,".$wpdb->prefix."huge_it_catalog_albums WHERE ".$wpdb->prefix."huge_it_catalog_album_catalog_contact.album_id = '%d' AND ".$wpdb->prefix."huge_it_catalog_album_catalog_contact.catalog_id=".$wpdb->prefix."huge_it_catalogs.id AND ".$wpdb->prefix."huge_it_catalog_albums.id='%d'", $id, $id);
        $catalogsFromAlbumArray = $wpdb->get_results($getCatalogsFromAlbum);
        
//        $query="SELECT * FROM ".$wpdb->prefix."huge_it_catalog_params";
//        $rowspar = $wpdb->get_results($query);
        
        $paramssld = array();
//        foreach ($rowspar as $rowpar) {
//            $key = $rowpar->name;
//            $value = $rowpar->value;
//            $paramssld[$key] = $value;
//        }
        if(isset($_GET['single_catalog_id'])){
            $id = $_GET['single_catalog_id'];
            $query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_products WHERE catalog_id = '%d' order by ordering ASC",$id);
            $images=$wpdb->get_results($query);

            $query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalogs WHERE id = '%d' order by id ASC",$id);
            $catalog=$wpdb->get_results($query);

//            $query="SELECT * FROM ".$wpdb->prefix."huge_it_catalog_params";
//            $rowspar = $wpdb->get_results($query);

            $paramssld = array();
//            foreach ($rowspar as $rowpar) {
//                $key = $rowpar->name;
//                $value = $rowpar->value;
//                $paramssld[$key] = $value;
//            }
            
            
            return front_end_catalog($images, $paramssld, $catalog, $catalogsFromAlbumArray);
        }
        else if(isset($_GET['single_prod_id'])){
            $id = $_GET['single_prod_id'];
            
            $getRatings=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_rating WHERE prod_id = '%d'",$id);
            $ratingsArray=$wpdb->get_results($getRatings);
            
            $getReviews=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_reviews WHERE product_id = '%d'",$id);
            $reviewsArray=$wpdb->get_results($getReviews);
            
            $getProduct=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_products WHERE id = '%d' order by ordering ASC",$id);
            $productArray=$wpdb->get_results($getProduct);
            
            $spamReviewsArray = array();
            foreach ($reviewsArray as $spamReview) {
                if($spamReview->spam != 0) $spamReviewsArray[] = $spamReview->ip;
            }
            
             
//            $query="SELECT * FROM ".$wpdb->prefix."huge_it_catalog_product_params";
//            $rowspar = $wpdb->get_results($query);
            $paramssld2 = array();
            $paramssld = "";
//            foreach ($rowspar as $rowpar) {
//                $key = $rowpar->name;
//                $value = $rowpar->value;
//                $paramssld[$key] = $value;
//            }
            
            $query="SELECT * FROM ".$wpdb->prefix."huge_it_catalog_params";
            $rowspar2 = $wpdb->get_results($query);

            $paramssld2 = array();
            foreach ($rowspar2 as $rowpar2) {
                $key2 = $rowpar2->name;
                $value2 = $rowpar2->value;
                $paramssld2[$key2] = $value2;
            }
            
            $captchaFirstNum = rand(0,9);
            $captchaSecondNum = rand(0,9);
            $captcha_val = $captchaFirstNum + $captchaSecondNum;
            $captchaValues = $captchaFirstNum.",".$captchaSecondNum;
            $wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_catalog_products  SET published_in_sl_width = '%s'", $captchaValues));
        
            return html_single_product_page($productArray, $paramssld, $paramssld2, $ratingsArray, $reviewsArray, $spamReviewsArray, $captchaFirstNum, $captchaSecondNum, $captcha_val);
        }
        else{
            $paramssld1 = "";
            $paramssld2 = "";
            return album_front_end($paramssld, $catalogsFromAlbumArray);
        }
}

function show_catalogs_single_product($id){

 global $wpdb;
// var_dump($id);exit;
        
            $getRatings=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_rating WHERE prod_id = '%d'",$id);
            $ratingsArray=$wpdb->get_results($getRatings);
            
            $getReviews=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_reviews WHERE product_id = '%d'",$id);
            $reviewsArray=$wpdb->get_results($getReviews);
            
            $getProduct=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_products WHERE id = '%d' order by ordering ASC",$id);
            $productArray=$wpdb->get_results($getProduct);
            
            $getCatalogsFromAlbum=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_catalog_album_catalog_contact,".$wpdb->prefix."huge_it_catalogs WHERE ".$wpdb->prefix."huge_it_catalog_album_catalog_contact.album_id = '%d' AND ".$wpdb->prefix."huge_it_catalog_album_catalog_contact.catalog_id=".$wpdb->prefix."huge_it_catalogs.id order by ordering ASC",$id);
            $catalogsFromAlbumArray=$wpdb->get_results($getCatalogsFromAlbum);
            
            $getSpamReviews="SELECT ip FROM ".$wpdb->prefix."huge_it_catalog_reviews WHERE spam = '1'";
            $spamReviewsArray = $wpdb->get_results($getSpamReviews);
            
//            var_dump($spamReviewsArray);exit;
//            $query="SELECT * FROM ".$wpdb->prefix."huge_it_catalog_product_params";
//            $rowspar = $wpdb->get_results($query);
            $paramssld = array();
//            foreach ($rowspar as $rowpar) {
//                $key = $rowpar->name;
//                $value = $rowpar->value;
//                $paramssld[$key] = $value;
//            }
            
//            $query="SELECT * FROM ".$wpdb->prefix."huge_it_catalog_params";
//            $rowspar2 = $wpdb->get_results($query);

            $paramssld2 = array();
//            foreach ($rowspar2 as $rowpar2) {
//                $key2 = $rowpar2->name;
//                $value2 = $rowpar2->value;
//                $paramssld2[$key2] = $value2;
//            }
            $paramssld2 = array();
            $paramssld2 = "";
            $paramssld = "";
            
            $captchaFirstNum = rand(0,9);
            $captchaSecondNum = rand(0,9);
            $captcha_val = $captchaFirstNum + $captchaSecondNum;
            $captchaValues = $captchaFirstNum.",".$captchaSecondNum;
            $wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_catalog_products  SET published_in_sl_width = '%s'", $captchaValues));
            
            return html_single_product_page($productArray, $paramssld, $paramssld2, $ratingsArray, $reviewsArray, $spamReviewsArray, $captchaFirstNum, $captchaSecondNum, $captcha_val);

}

?>






