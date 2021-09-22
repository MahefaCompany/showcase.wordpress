<?php
require_once("Logs.php");

class OAuth2Beneylu {
    const authorize_url = "https://login.school.test.beneylu.com/oauth/v2/authorize";
    const token_url = "https://login.school.test.beneylu.com/oauth/v2/token";
    const me_url = "https://login.school.test.beneylu.com/oauth/v2/me";
    const callback_uri = "/wp-json/mahefa/bp/v1/books/4";

    const client_id = "<<client_id>>";
    const client_secret = "<<client_secret>>";
    const test_api_url = "<<your API>>";

    public static function Main(WP_REST_Request $request): void {
        Logs::info("OAuth2Beneylu::Main::15", null, true);
        // unset(\GuzzleHttp\ClientInterface);
        // add_submenu_page("options-general.php", "Crunchify Plugin", "Crunchify Plugin", "manage_options", "crunchify-hello-world", "crunchify_hello_world_page");

        $idBook = $request->get_param( 'id' );
        Logs::info("OAuth2Beneylu::Main::20, idBook:", $idBook);

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

        Logs::info("OAuth2Beneylu::Main::43, _POST:", $_POST);
        Logs::info("OAuth2Beneylu::Main::44, _GET:", $_GET);

        if (isset($_POST["authorization_code"])) {
            Logs::info("OAuth2Beneylu::Main::47, authorization_code:", $_POST["authorization_code"]);
            //	what to do if there's an authorization code
            $access_token = self::getAccessToken($_POST["authorization_code"]);
            $resource = self::getResource($access_token);
            echo $resource;
        } elseif (isset($_GET["code"])) {
            Logs::info("OAuth2Beneylu::Main::53, code:", $_POST["code"]);
            $access_token = self::getAccessToken($_GET["code"]);
            $resource = self::getResource($access_token);
            echo $resource;
        } else {
            Logs::info("OAuth2Beneylu::Main::58", "else");
            //	what to do if there's no authorization code
            self::getAuthorizationCode();
        }
        
        // header('Location: ' . $urlFull, true, 301);
        // die;
    }

    private static function getSlugByIdEbook(int $idEbook): string{
        return "zero-waste";
    }

    private static function getAuthorizationCode() {
        // $authorization_redirect_url = self::authorize_url . "?response_type=code&client_id=" . self::client_id . "&redirect_uri=" . self::callback_uri . "&scope=openid";
        $authorization_redirect_url = self::authorize_url . "?" .
            http_build_query([
                'response_type' => 'code',
                'client_id' => self::client_id,
                'redirect_uri' => self::getBaseUrl() . self::callback_uri,
                // 'state' => $_SESSION['state'],
                'scope' => 'openid',
            ]);
        Logs::info("OAuth2Beneylu::getAuthorizationCode::80", "authorization_redirect_url: ".$authorization_redirect_url);
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

    private static function getBaseUrl(): string {
        return get_site_url();
    }
}

/**
 * https://developer.byu.edu/docs/consume-api/use-api/oauth-20/oauth-20-php-sample-code
 * 
 * 
 * This is the URL that we use to request a new access token
 * /oauth/request_token
 * 
 * After getting an access token we'll want to have the user authenicate 
 * /oauth/authenticate
 * 
 * This final call fetches an access token.
 * /oauth/access_token
 * 
    $options = array
    (
      'consumer_key' => $key,
      'consumer_secret' => $secret,
      'request_token_uri' => $request_token,
      'authorize_uri' => $authorize_url,
      'access_token_uri' => $access_token
    );
 *  
 * 
 * 
 */