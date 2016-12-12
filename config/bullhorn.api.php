<?php
/**
 * Created by Dijatek, LLC
 * User: Daniel Kaltenbaugh <d.a.kaltenbaugh@gmail.com>
 * Date: 12/12/2016
 * Time: 10:22 AM
 * TODO-Dan Move this functionality to the vendor autoload file
 */

//  Bullhorn API Production keys for API read access
$bh_auth_array = array(
    'client_id' => '4c9b0ca8-de30-4b11-9105-511006674c74',
    'client_secret' => 'se5QdUlZ9qslXB4z9jwhMPlkGv4ytrq6',
    'username' => 'alegiantapi',
    'password' => 'PositivePressAsleep@26',
    'redirect_uri' => 'http://alegiantservices.com/app/',
    'response_type' => 'code',
    'action' => 'Login'
);
// Bullhorn API url to call to request an authorization token:
$bh_auth_url = 'https://auth.bullhornstaffing.com/oauth/authorize';