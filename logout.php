<?php

//logout.php
session_start();
include('config.php');

//Reset OAuth access token
$client->revokeToken();
$_SESSION['access_token']=NULL;
//Destroy entire session data.
session_destroy();

//redirect page to index.php
header('location:index.html');

?>
