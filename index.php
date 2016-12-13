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
    // TODO-Dan store refresh_token in session storage or database for use throughout
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
     *  TODO-Dan add a check (db) to get highest id then override start and count in $bh_job_array before API query
     */
    require_once('./config/alegiant.db.php');
    // Get highest id from database.  If none returned, then set highest id to 0
    $qry = $dbh->prepare("SELECT id FROM jobs ORDER BY id DESC LIMIT 1;");
    $qry->execute();
    $db_res = $qry->fetch();
    if (isset($db_res['id'])) {
        $highest_id = $db_res['id'];
    } else {
        $highest_id = 0;
    }
    findJobs(0, 500, $BhRestURL, $bh_job_array, $dbh, $highest_id);
    //  Check Bullhorn api and return jobs in $json
    function findJobs($start, $count, $BhRestURL, $bh_job_array, $dbh, $highest_id) {
        $bh_job_array['start'] = $start;
        $bh_job_array['count'] = $count;
        $json = httpCall('GET', $BhRestURL, $bh_job_array, "Found some jobs!<br/>");
        // Setup the database handler ($dbh) if we have made it this far.  Config in alegiant.db.php and it is PDO
        // Show jobs until I figure out how to put them in the database
        foreach ($json->data as $key){
            // Database needs: id, street, city, state, zip, county, dateAdded, dateModified, title & description
            $qry  = "INSERT INTO jobs (id, street, city, state, zip, country, dateAdded, dateLastModified, title, description) ";
            $qry .= "VALUES (:id, :street, :city, :state, :zip, :country, :dateAdded, :dateLastModified, :title, :description)";
            $stmt = $dbh->prepare($qry);
            $stmt_array = array (
                ':id' => $key->id,
                ':street' => $key->address->address1,
                ':city' => $key->address->city,
                ':state' => $key->address->state,
                ':zip' => $key->address->zip,
                ':country' => $key->address->countryID,
                ':dateAdded' => $key->dateAdded,
                ':dateLastModified' => $key->dateLastModified,
                ':title' => $key->title,
                ':description' => $key->description
            );
            // TODO-Dan make sure we go back and get any modified jobs later.
            if ($key->id > $highest_id) {
                try {
                    $stmt->execute($stmt_array);
                    var_dump($stmt_array);
                } Catch (Exception $e) {
                    echo "<br>Database error $e<br/>";
                }
            }
        }
        if (!empty($json) && ($count < 200000)){
            echo "Count: $count";
            findJobs($count, $count+500, $BhRestURL, $bh_job_array, $dbh, $highest_id);
        } else {
            exit();
        };
    }

    echo "Done updating job database.<br/>";

    /**
     *  Guzzle it up function httpCall - more to follow but this helps a lot
     *  TODO-Dan revisit echo from function - this may be a silent runner with ...
     *      a redirect so output would not be good.  At least move it out to the
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