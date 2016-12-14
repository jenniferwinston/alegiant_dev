<?php
/**
 * Created by Dijatek, LLC
 * User: Daniel Kaltenbaugh <d.a.kaltenbaugh@gmail.com>
 * Date: 12/13/2016
 * Time: 3:02 PM
 * Description: Returns 30 most recent job postings.  Will add pagination to the query next.
 * TODO-Dan add start and end limit on search so we can paginate
 */
require_once ('./config/bullhorn.api.php');
require_once ('./config/alegiant.db.php');
$sql  = "SELECT * FROM jobs ORDER BY dateAdded DESC LIMIT 20;";
$jobs = $dbh->query($sql);
$json = json_encode($jobs->fetchAll());
echo $json;
// Testing output code below
//foreach ($jobs as $job){
////    echo "<strong><u>{$job['title']}</u></strong>: {$job['description']}<br/>";
//    echo "<strong><u>{$job['title']}</u></strong>: ";
//    $dateJobAdded = new DateTime(date("Y-m-d", substr($job['dateAdded'], 0, 10)));
//    $dateToday = new DateTime(date("Y-m-d"));
//    $interval = $dateToday->diff($dateJobAdded);
//    $int_interval = intval($interval->format('%a'));
//    echo "Added ";
//    if ($int_interval == 0) {
//        echo 'today';
//    } elseif ($int_interval != 1) {
//        echo $interval->format('%a days ago');
//    } else {
//        echo $interval->format('%a day ago');
//    }
//    echo "<br/>";
//    echo $job['description'];
//    echo "<br/><br/>";
//}