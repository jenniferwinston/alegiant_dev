<?php
/**
 * Created by Dijatek, LLC
 * User: Daniel Kaltenbaugh <d.a.kaltenbaugh@gmail.com>
 * Date: 12/14/2016
 * Time: 9:45 AM
 */
if (isset($_GET['keywords'])) {
    echo ("Keywords: ". $_GET['keywords'] ."<br/>");
}
if (isset($_GET['location'])) {
    echo ("Location: ". $_GET['location']);
}