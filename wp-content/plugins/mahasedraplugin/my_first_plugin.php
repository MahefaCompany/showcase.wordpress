<?php
/*
Plugin Name: Essai de mes devs plugins
*/
 
// Hook the 'wp_footer' action hook, add the function named 'mfp_Add_Text' to it
add_action("wp_footer", "mfp_Add_Text");
 
// Define 'mfp_Add_Text'
function mfp_Add_Text()
{
  echo "<p style='color: black;'>After the footer is loaded, my text is added!</p>";
}


add_action( "admin_menu", "montheme_ajouter_menu_tableau_de_bord" );

function montheme_ajouter_menu_tableau_de_bord() {

   add_menu_page( 

      __( "Mon thème - Configuration", "montheme" ), // texte de la balise <title>

      __( "Mon thème", "montheme" ),  // titre de l'option de menu

      "manage_options", // droits requis pour voir l'option de menu

      "montheme_menu_admin", // slug

      "montheme_creer_page_configuration" // fonction de rappel pour créer la page

   );

}


function montheme_creer_page_configuration() {

  global $title;   // titre de la page du menu, tel que spécifié dans la fonction add_menu_page

  ?>

  <div class="wrap">

     <h2><?php echo $title; ?></h2>   

     ...

  </div>

  <?php

}

add_action( "admin_menu", "montheme_ajouter_sousmenu_tableau_de_bord" );

function montheme_ajouter_sousmenu_tableau_de_bord(){
  add_submenu_page( 

  "montheme_menu_admin",  // slug du menu parent

  __( "Mon thème - Mon sous-menu - Configuration", "montheme" ),  // texte de la balise <title>

  __( "Mon sous-menu", "montheme" ),  // titre de l'option de sous-menu

  "manage_options",  // droits requis pour voir l'option de menu

  "montheme_sousmenu_admin", // slug

  "montheme_sousmenu_creer_page_configuration"  // fonction de rappel pour créer la page

);
}


function montheme_sousmenu_creer_page_configuration() {

    echo "<div class='wrap'><h3>Sous menu1</h3></div>";
    echo  "<p>Mon paragraphe</p>";

}

 