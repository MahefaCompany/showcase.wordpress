<?php

class OAuth2Beneylu {
    const authorize_url = "https://login.school.test.beneylu.com/oauth/v2/authorize";
    const token_url = "https://login.school.test.beneylu.com/oauth/v2/token";
    const me_url = "https://login.school.test.beneylu.com/oauth/v2/me";
    const callback_uri = "<<redirect_uri>>";

    public static function Main():void {
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
        // return $response;
        
        header('Location: ' . $urlFull, true, 301);
        die;
    }

    public static function getSlugByIdEbook(int $idEbook): string{
        return "zero-waste";
    }
}