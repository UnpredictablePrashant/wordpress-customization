<?php

//---------------------start here
//Add this piece of code to theme functions.php file
//Removing the help and screen option tabs
add_filter( 'contextual_help', 'mytheme_remove_help_tabs', 999, 3 );
function mytheme_remove_help_tabs($old_help, $screen_id, $screen){
    $screen->remove_help_tabs();
    return $old_help;
}
function remove_screen_options($display_boolean, $wp_screen_object){
  $blacklist = array('post.php', 'post-new.php', 'index.php', 'edit.php');
  if (in_array($GLOBALS['pagenow'], $blacklist)) {
    $wp_screen_object->render_screen_layout();
    $wp_screen_object->render_per_page_options();
    return false;
  } else {
    return true;
  }
}
add_filter('screen_options_show_screen', 'remove_screen_options', 10, 2);

function wpb_remove_screen_options() { 
if(!current_user_can('manage_options')) {
return false;
}
return true; 
}
add_filter('screen_options_show_screen', 'wpb_remove_screen_options');
//-----------end here


?>
