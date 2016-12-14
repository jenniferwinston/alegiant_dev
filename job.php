<?php
/**
 * Created by Dijatek, LLC
 * User: Daniel Kaltenbaugh <d.a.kaltenbaugh@gmail.com>
 * Date: 12/14/2016
 * Time: 9:45 AM
 * Description: Returns job information for the job identified by the incoming id.  This should be accessed
 *  via /job/{id} and rewritten in .htaccess.
 */
// Title location defaults if they aren't sent in from the url.  Shouldn't be used since the if statement will exit
//  without a valid id being sent in.
$get_id = 0;

if (isset($_GET['id'])) {
    $get_id = $_GET['id'];
} else {
    echo "Invalid ID";
    exit();
}

// Simulated $_GET from url incoming
// TODO-Dan create a getAge function  --- maybe not...

require_once ('./config/bullhorn.api.php');
require_once ('./config/alegiant.db.php');
$sql  = "SELECT id, city, state, dateAdded, title, description FROM jobs WHERE id = ? ORDER BY dateAdded DESC LIMIT 1;";
$query = $dbh->prepare($sql);
$query->execute(array($get_id));
$job = $query->fetch();

// Test output print_r($job);
$json = json_encode($job);
// Return job to jQuery ajax call as JSON object
echo $json;