<?php
/**
 * Created by Dijatek, LLC
 * User: Daniel Kaltenbaugh <d.a.kaltenbaugh@gmail.com>
 * Date: 12/13/2016
 * Time: 9:57 AM
 * TODO-Dan Add jobs and search limit variables to administration dashboard or
 *  make it smart so it only goes back for a certain timeframe
 */
//  Variable declarations
$host = 'localhost';
$dbname = 'alegiant_jobs';
$charset= 'utf8';
$username = 'DannyK';
$password = 'BlockProductionRise82';
$jobs_limit = 300;
$search_limit = 30;

try {
    $dbh= new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $username, $password);
} Catch (PDOException $e) {
    error_log("Database connection error $e");
    die();
}

if ($curr_env === 'dev') {
    //  Dev only - All errors shown from database.
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}