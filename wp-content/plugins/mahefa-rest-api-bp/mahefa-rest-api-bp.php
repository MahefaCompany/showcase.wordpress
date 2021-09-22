<?php
require_once("vendor/autoload.php");
require_once("OAuth2Beneylu.php");
/**
 * Crunchify Hello World Plugin is the simplest WordPress plugin for beginner.
 * Take this as a base plugin and modify as per your need.
 *
 * @package Rest API BookPrunelle
 * @author Mahefa
 * @license GPL-2.0+
 * @link http://numeric.mahefa.company/tag/wordpress-beginner/
 * @copyright 2017 Crunchify, LLC. All rights reserved.
 *
 *            @wordpress-plugin
 *            Plugin Name: Rest API BookPrunelle
 *            Plugin URI: http://numeric.mahefa.company//tag/wordpress-beginner/
 *            Description: Rest API BookPrunelle is the simplest WordPress plugin for beginner. Take this as a base plugin and modify as per your need.
 *            Version: 1.0
 *            Author: Mahefa
 *            Author URI: http://numeric.mahefa.company/
 *            Text Domain: mahefa-hello-world
 *            Contributors: Mahefa
 *            License: GPL-2.0+
 *            License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// http://wp.loc:81/wp-json/mahefa/bp/v1/books/4
 function rest_api_main_custom_fct( WP_REST_Request $request ) {
    OAuth2Beneylu::Main();
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'mahefa/bp/v1', '/books/(?P<id>\d+)', array(
      'methods' => 'GET',
      'callback' => 'rest_api_main_custom_fct',
    ) );
} );