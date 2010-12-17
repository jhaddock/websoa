<?php
/*
Plugin Name: SOA Plugin
Plugin URI: http://www.ariera.net
Description: Allows display of "GoodStaff Categories" taxonomy for each post of GoodStaff
Version: 1.0
Author: ariera
Author URI: http://www.ariera.net
License: GPL2
*/


add_filter('manage_posts_columns', 'add_good_staff_categories_columns');
function add_good_staff_categories_columns($defaults) {
    if($_GET['post_type'] == 'Good Staff'){
        $defaults['goodstaff_categories'] = __('Good Categories');
    }
    return $defaults;
}

add_action('manage_posts_custom_column', 'scompt_custom_column', 10, 2);
function scompt_custom_column($column_name, $id) {
    if( $column_name == 'goodstaff_categories' ) {
        $gscats = wp_get_object_terms( $id, 'good-staff-categories', $args = array());
        if ($gscats){
           foreach ($gscats as $gscat) {
               $url = get_bloginfo( 'url', 'display' )."/wp-admin/edit.php?post_type=Good%20Staff&good-staff-categories=$gscat->slug";
              echo "<a href='$url'>$gscat->name</a>, ";
           }
        }
    }
}

?>