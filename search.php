<?php
/**
 * Created by Dijatek, LLC
 * User: Daniel Kaltenbaugh <d.a.kaltenbaugh@gmail.com>
 * Date: 12/14/2016
 * Time: 9:45 AM
 * Description: Search for a job listing by keyword, city or state
 * TODO-Dan this needs some work to incorporate smart search and single site access restrictions
 */
// Title location defaults if they aren't sent in from the url
$get_title = "*";
$get_location = "*";

if (isset($_GET['keywords'])) {
    $get_title = "%{$_GET['keywords']}%";
}
if (isset($_GET['location'])) {
    $get_location= "%{$_GET['location']}%";
}
// Simulated $_GET from url incoming
// TODO-Dan create a getAge function

require_once ('./config/bullhorn.api.php');
require_once ('./config/alegiant.db.php');
$sql  = "SELECT * FROM jobs WHERE title LIKE ? OR city LIKE ? or state LIKE ? ORDER BY dateAdded DESC LIMIT 30;";

$query = $dbh->prepare($sql);
$query->execute(array("%$get_title%", "%$get_location%", "%$get_location%"));
$jobs = $query->fetchAll();
// Test code to see what
//foreach ($jobs as $job) {
//    echo "{$job['title']}: {$job['city']}, {$job['state']}.  Added {$job['dateAdded']}<br/>";
//    echo "<br/><hr>";
//}
$json = json_encode($jobs);
echo $json;