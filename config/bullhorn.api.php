<?php
/**
 * Created by Dijatek, LLC
 * User: Daniel Kaltenbaugh <d.a.kaltenbaugh@gmail.com>
 * Date: 12/12/2016
 * Time: 10:22 AM
 * TODO-Dan Move this functionality to the vendor autoload file
 */
//  Variable declarations
$bh_auth_url  = 'https://auth.bullhornstaffing.com/oauth/authorize';        // Step one
$bh_oauth_url = 'https://auth.bullhornstaffing.com/oauth/token';            // Step two
$bh_login_url = 'https://rest.bullhornstaffing.com/rest-services/login';    // Step three

// Bullhorn API url to call to request an authorization token:
$bh_client_id       = '4c9b0ca8-de30-4b11-9105-511006674c74';
$bh_client_secret   = 'se5QdUlZ9qslXB4z9jwhMPlkGv4ytrq6';
$bh_username        = 'alegiantapi';
$bh_password        = 'PositivePressAsleep@26';
$bh_redirect_uri    = 'http://alegiantservices.com/app/';
    //  Alegiant Bullhorn API redirect url for all API responses using this client_id & client_secret

//  Bullhorn API Production keys for API read access - used in index.php, step one
$bh_auth_array = array(
    'client_id'     => $bh_client_id,
    'client_secret' => $bh_client_secret,
    'username'      => $bh_username,
    'password'      => $bh_password,
    'redirect_uri'  => $bh_redirect_uri,
    'response_type' => 'code',
    'action'        => 'Login',
);

// Bullhorn API data for API OAuth Token request - used in step two, index.php
$bh_oauth_array = array(
    'grant_type'    => 'authorization_code',
    'code'          => '', // Code value is added in step two of index.php after retrieved from the API
    'client_id'     => $bh_client_id,
    'client_secret' => $bh_client_secret,
    'redirect_uri'  => $bh_redirect_uri,
);

// Bullhorn API data for API Rest Services Login - step three of index.php
$bh_login_array = array(
    'access_token'  => '', // Code value is added in step three of index.php after retrieved from API
    'version'       => '*',
);

// Bullhorn Rest Services access for job listing retrieval - step four of index.php
$bh_job_array = array(
    'BhRestToken'   => '',  // Code value is added in step three of index.php after retrieved from API
    'query'         => "isOpen:1 AND isDeleted:0 AND NOT status:archive",
    'fields'        => "id,clientCorporation,clientContact,description",
    'count'         => 20,
    'start'         => 0,
);