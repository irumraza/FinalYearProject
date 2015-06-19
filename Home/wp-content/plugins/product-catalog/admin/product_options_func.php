<?php

if (function_exists('current_user_can'))
    if (!current_user_can('manage_options')) {
        die('Access Denied');
    }
if (!function_exists('current_user_can')) {
    die('Access Denied');
}
function show_product_options(){
    global $wpdb;
//    $query = "SELECT *  FROM " . $wpdb->prefix . "huge_it_catalog_product_params";
//    $rows = $wpdb->get_results($query);
    $param_values = array();
//    foreach ($rows as $row) {
//        $key = $row->name;
//        $value = $row->value;
//        $param_values[$key] = $value;
//    }
    return html_show_product_options($param_values);
}

function save_styles_options()
{
    global $wpdb;
    if (isset($_POST['params'])) {
      $params = $_POST['params'];
      foreach ($params as $key => $value) {
//          $wpdb->update($wpdb->prefix . 'huge_it_catalog_product_params',
//              array('value' => $value),
//              array('name' => $key),
//              array('%s')
//          );
      }
      ?>
      <div class="updated"><p><strong><?php _e('Item Saved'); ?></strong></p></div>
      <?php
    }
}