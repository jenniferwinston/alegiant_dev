<?php
    /**
     * Created by Dijatek, LLC
     * User: Daniel Kaltenbaugh <d.a.kaltenbaugh@gmail.com>
     * Date: 12/11/2016
     * Time: 6:57 PM
     */
    // Autoload vendor files (guzzlehttp as of 12.11.2016)
    require __DIR__ . '/vendor/autoload.php';
    require_once('./config/bullhorn.api.php');

    $client = new GuzzleHttp\Client();
    $res = $client->request('GET', $bh_auth_url, ['query' => $bh_auth_array]);
    //  Can do a try to make sure that `$res->getStatusCode();` is 200 and if not, log the error.

    //  Use json_decode to parse the response object which is in the form of
    //      {"code":"{actual code}","client_id":"{actual client id}"} 12.11.2016 ~ DAK
    $json = json_decode($res->getBody());  // The code is $json->code

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alegaint Job Update</title>
</head>
<body>
    <h1>Alegiant Application</h1>
</body>
</html>