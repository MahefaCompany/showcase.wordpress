<?php
/*
Plugin Name: Add Text To Footer
*/
 
// Hook the 'wp_footer' action hook, add the function named 'mfp_Add_Text' to it
add_action("wp_footer", "mfp_Add_Text");
 
// Define 'mfp_Add_Text'
function mfp_Add_Text()
{
  echo "<p style='color: black;'>After the footer is loaded, my text is added!</p>";
}

function wporg_filter_title($title)
{
    return 'The ' . $title . ' was filtered';
}
add_filter('the_title', 'wporg_filter_title');
add_action ('admin_footer', 'my_admin_footer_function');
function my_admin_footer_function () {
	echo "<p> Ceci sera inséré en bas de la page d'administration </p>";
}