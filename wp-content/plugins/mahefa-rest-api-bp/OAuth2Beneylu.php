<?php

class OAuth2Beneylu {
    const authorize_url = "https://login.school.test.beneylu.com/oauth/v2/authorize";
    const token_url = "https://login.school.test.beneylu.com/oauth/v2/token";
    const me_url = "https://login.school.test.beneylu.com/oauth/v2/me";
    const callback_uri = "<<redirect_uri>>";

    const client_id = "<<client_id>>";
    const client_secret = "<<client_secret>>";
    const test_api_url = "<<your API>>";

    public static function Main(WP_REST_Request $request): void {
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


        if ($_POST["authorization_code"]) {
            //	what to do if there's an authorization code
            $access_token = getAccessToken($_POST["authorization_code"]);
            $resource = getResource($access_token);
            echo $resource;
        } elseif ($_GET["code"]) {
            $access_token = getAccessToken($_GET["code"]);
            $resource = getResource($access_token);
            echo $resource;
        } else {
            //	what to do if there's no authorization code
            getAuthorizationCode();
        }
        
        // header('Location: ' . $urlFull, true, 301);
        // die;
    }

    private static function getSlugByIdEbook(int $idEbook): string{
        return "zero-waste";
    }

    private static function getAuthorizationCode() {
        $authorization_redirect_url = self::authorize_url . "?response_type=code&client_id=" . self::client_id . "&redirect_uri=" . self::callback_uri . "&scope=openid";
    
        header("Location: " . $authorization_redirect_url);
    
        //	if you don't want to redirect
        // echo "Go <a href='$authorization_redirect_url'>here</a>, copy the code, and paste it into the box below.<br /><form action=" . $_SERVER["PHP_SELF"] . " method = 'post'><input type='text' name='authorization_code' /><br /><input type='submit'></form>";
    }

    private static function getAccessToken($authorization_code) {   
        $authorization = base64_encode(self::client_id.":".self::client_secret);
        $header = array("Authorization: Basic {$authorization}","Content-Type: application/x-www-form-urlencoded");
        $content = "grant_type=authorization_code&code=$authorization_code&redirect_uri=".self::callback_uri;
    
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => self::token_url,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $content
        ));
        $response = curl_exec($curl);
        curl_close($curl);
    
        if ($response === false) {
            echo "Failed";
            echo curl_error($curl);
            echo "Failed";
        } elseif (json_decode($response)->error) {
            echo "Error:<br />";
            echo $authorization_code;
            echo $response;
        }
    
        return json_decode($response)->access_token;
    }

    private static function getResource($access_token) {
    
        $header = array("Authorization: Bearer {$access_token}");
    
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => self::test_api_url,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true
        ));
        $response = curl_exec($curl);
        curl_close($curl);
    
        return json_decode($response, true);
    }
}