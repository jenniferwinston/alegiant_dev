<?php
/**
 * Created by Dijatek, LLC
 * User: Daniel Kaltenbaugh <d.a.kaltenbaugh@gmail.com>
 * Date: 12/11/2016
 * Time: 6:57 PM
 */
// Autoload guzzle
require __DIR__ . '/vendor/autoload.php';
$client = new GuzzleHttp\Client();
$auth_array = array(
    'client_id' => '4c9b0ca8-de30-4b11-9105-511006674c74',
    'client_secret' => 'se5QdUlZ9qslXB4z9jwhMPlkGv4ytrq6',
    'username' => 'alegiantapi',
    'password' => 'PositivePressAsleep@26',
    'redirect_uri' => 'http://alegiantservices.com/app/',
    'response_type' => 'code',
    'action' => 'Login'
);
//print_r($auth_array);
$bh_auth_url = 'https://auth.bullhornstaffing.com/oauth/authorize';

$res = $client->request('GET', $bh_auth_url, ['query' => $auth_array]);
//  Can do a try to make sure that `$res->getStatusCode();` is 200
//      If not, log the error.

//  Use json_decode to parse the response object which is in the form of
//      {"code":"{actual code}","client_id":"{actual client id}"}
//      12.11.2016 ~ DAK
$json = json_decode($res->getBody());
echo "Code: ". $json->code;
?>
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
<h1>Alegiant Application</h1>
</body>
</html>