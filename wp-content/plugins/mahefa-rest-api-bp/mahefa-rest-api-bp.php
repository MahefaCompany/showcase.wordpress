<?php

require_once("vendor/autoload.php");
/**
 * Crunchify Hello World Plugin is the simplest WordPress plugin for beginner.
 * Take this as a base plugin and modify as per your need.
 *
 * @package Rest API BookPrunelle
 * @author Mahefa
 * @license GPL-2.0+
 * @link http://numeric.mahefa.company//tag/wordpress-beginner/
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
    // unset(\GuzzleHttp\ClientInterface);
	// add_submenu_page("options-general.php", "Crunchify Plugin", "Crunchify Plugin", "manage_options", "crunchify-hello-world", "crunchify_hello_world_page");

    $idBook = $request->get_param( 'id' );

    $baseUrl = "https://preprod.bookprunelle.com/wp-content/";
    $endpoint = '/ebooks/regular/en/zero-waste/preview/';
    $urlFull = $baseUrl.$endpoint;
    
    // $client = new GuzzleHttp\Client(['base_uri' => $baseUrl]);
    // $responseHttp = $client->request('GET', $endpoint);
    $responseHttp = "";
    // dump($responseHttp); die;
    // $posts = get_posts(array(
    //     'author' => $data['id'],
    // ));
    // if ( empty( $posts ) ) {
    //     return null;
    // }
    // return $posts[0]->post_title;

    // $response = new WP_REST_Response( $responseHttp );
    // $response->set_status( 200 );
    // $response->header( 'Location', $baseUrl );
    header('Location: ' . $urlFull, true, 301);
    die;
    // return $response;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'mahefa/bp/v1', '/books/(?P<id>\d+)', array(
      'methods' => 'GET',
      'callback' => 'rest_api_main_custom_fct',
    ) );
} );

function get_slug_by_id_ebook(int $idEbook): string{
    return "zero-waste";
}