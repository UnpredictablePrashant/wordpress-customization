<?php
//hiding the admin wordpress version
//Copy and paste this in functions.php file of your theme

//Copy start from here
function my_footer_shh() {
    if ( ! current_user_can('manage_options') ) { // 'update_core' may be more appropriate
        remove_filter( 'update_footer', 'core_update_footer' ); 
    }
}
add_action( 'admin_menu', 'my_footer_shh' );
//copy till here

?>
