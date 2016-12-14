<?php
/**
 * Created by Dijatek, LLC
 * User: Daniel Kaltenbaugh <d.a.kaltenbaugh@gmail.com>
 * Date: 12/13/2016
 * Time: 3:02 PM
 * TODO-Dan Add a getAge function
 */
// Simulated $_GET from url incoming
$get_title = "%RN%";
$get_location = "%FL%";

require_once ('./config/bullhorn.api.php');
require_once ('./config/alegiant.db.php');
$sql  = "SELECT * FROM jobs WHERE title LIKE ? OR city LIKE ? or state LIKE ? ORDER BY dateAdded DESC LIMIT 30;";

$query = $dbh->prepare($sql);
$query->execute(array($get_title, $get_location, $get_location));
$jobs = $query->fetchAll();
foreach ($jobs as $job) {
    print_r($job);
    echo "<br/><hr>";
}