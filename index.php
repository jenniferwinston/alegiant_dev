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

//  $res->getBody() returns a string of the form
//      "code":"{actual code with : & everything}","client_id":"{actual client_id}"
//      Exploding on the comma puts the "code":"{asdfadfa}" in index zero
//      then we can explode that index (string) on quote (") and index 3 is the actual code
//      There has to be a better way - so this will go into a function soon.
//      12.11.2016 ~ DAK
$tmp_left = explode(",", $res->getBody());
$tmp_left = explode("\"", $tmp_left[0]);
$code = $tmp_left[3];

echo "Code: $code <br/>";
// {"type":"User"...'
?>
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
<h1>Alegiant Application</h1>
</body>
</html>