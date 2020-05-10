<?php
  require_once 'vendor/autoload.php' ;
  $client=new Google_Client();
  // echo phpversion();
  $client->setAuthConfig('client_secret.json');
  $client->addScope('email');
  $client->addScope('profile');
  $client->setRedirectUri("http://localhost/online3/callback.php");

 ?>
