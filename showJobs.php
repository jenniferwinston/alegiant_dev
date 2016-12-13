<?php
/**
 * Created by Dijatek, LLC
 * User: Daniel Kaltenbaugh <d.a.kaltenbaugh@gmail.com>
 * Date: 12/13/2016
 * Time: 3:02 PM
 */
require_once ('./config/bullhorn.api.php');
require_once ('./config/alegiant.db.php');
$sql  = "SELECT * FROM jobs ORDER BY dateAdded DESC LIMIT 30;";
$jobs = $dbh->query($sql);
foreach ($jobs as $job){
//    echo "<strong><u>{$job['title']}</u></strong>: {$job['description']}<br/>";
    echo "<strong><u>{$job['title']}</u></strong>: ";
    $dateJobAdded = new DateTime(date("Y-m-d", substr($job['dateAdded'], 0, 10)));
    $dateToday = new DateTime(date("Y-m-d"));
    $interval = $dateToday->diff($dateJobAdded);
    $int_interval = intval($interval->format('%a'));
    echo "Added ";
    if ($int_interval != 1) {
        echo $interval->format('%a days');
    } else {
        echo $interval->format('%a day');
    }
    echo " ago.";
    echo "<br/>";
    echo $job['description'];
    echo "<br/><br/>";
}