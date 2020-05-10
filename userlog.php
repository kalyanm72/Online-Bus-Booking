<?php
  require_once 'config.php' ;
  
  $authurl=$client->createAuthUrl();
  header("location:".$authurl);
  session_start();
 ?>
