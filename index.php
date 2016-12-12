<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alegaint Job Update</title>
</head>
<body>
<h1>Alegiant Application</h1>
<div class="container">
    <h2>Progress</h2>
    <?php
    /**
     * Created by Dijatek, LLC
     * User: Daniel Kaltenbaugh <d.a.kaltenbaugh@gmail.com>
     * Date: 12/11/2016
     * Time: 6:57 PM
     * TODO-Dan Move most of this code into a class - function is ok for now
     * TODO-Dan review comments and naming conventions for accuracy
     */
    // Autoload vendor files (guzzlehttp as of 12.11.2016)
    require ('./vendor/autoload.php');
    require_once('./config/bullhorn.api.php');

    // Local variables
    $client = new GuzzleHttp\Client();

    /**
     *  Step one - request authorization code from Bullhorn API using Alegiant credentials
     *      Requires configuration settings in /config/bullhorn.api.php and guzzlehttp from
     *      the vendor directory (also in composer).  Returns JSON with the desired code
     *      accessed via $json->code;
     */
    $json = httpCall('GET', $bh_auth_url, $bh_auth_array, "Authentication code retrieved...<br/>");
    //  Use json_decode to parse the response object which is in the form of
    //      {"code":"{actual code}","client_id":"{actual client id}"} 12.11.2016 ~ DAK
    //  Push the bh_auth_code into the bh_oauth_code array
    $bh_oauth_array['code'] = $json->code;

    /**
     *  Step two - Get OAuth Token from Bullhorn
     */
    $json = httpCall('POST', $bh_oauth_url, $bh_oauth_array, "Oauth token retrieved...<br/>");
        // Returns access_token, token_type & refresh_token
    $bh_login_array['access_token'] = $json->access_token;
    // TODO-Dan store refresh_token in session variable or database for use throughout
    /**
     *  Step three - Login to Bullhorn REST services
     */
    $json = httpCall('POST', $bh_login_url, $bh_login_array, "Login successful...<br/>");
        // Returns access_token, rest_token & rest_url
    $bh_job_array['BhRestToken'] = $json->BhRestToken;
    $BhRestURL                   = $json->restUrl;
    $BhRestURL                  .= '/search/JobOrder';

    /**
     *  Step four - get jobs and show them
     */
    $json = httpCall('GET', $BhRestURL, $bh_job_array, "Found some jobs!<br/>");
    // Show jobs until I figure out how to put them in the database
    foreach ($json->data as $key){
        echo "-------------------------------<br/><pre>";
        var_dump($key);
        echo "</pre>";
    }
    /**
     *  Guzzle it up function httpCall - more to follow but this helps a lot
     *  TODO-Dan revisit echo from function - this may be a silent runner with a
     *      redirect so output would not be good.  At least move it out to the
     *      same level as the function call
     */
    function httpCall($method, $url, $call_array, $success_message) {
        /** TODO-Dan fill this out in the correct format and make sure it is in the correct place
         * @param
         * @throws
         * @return
         */
        $client = new GuzzleHttp\Client();
        try {
            $res = $client->request($method, $url, ['query' => $call_array]);
            echo ($success_message);
            return json_decode($res->getBody());
        } Catch (Exception $e) {
            error_log("API request error: $e");
            return false;
        }
    }
?>
</div>

</body>
</html>