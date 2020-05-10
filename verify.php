<?php
session_start();
  if(isset($_GET['key'])){
    $key=$_GET['key'];
                $con = new MySQLi("localhost","root","","bus_ticket");
                $result=$con->query(" SELECT verified, has_key FROM users WHERE verified IS NULL AND has_key='$key' LIMIT 1");

                if($result->num_rows==1){
                  $update=$con->query(" UPDATE users SET verified = true WHERE has_key='$key' LIMIT 1");
                  // echo !$update;
                  if($update){
                      echo "<a href='index.html'>verified successfully now login into system</a>";
                  }
                  else{
                    echo "email not verified";
                  }
                }
                else{
                  echo "this is invalid email or verification completed";
                }
  }
  else{
    die("somethings wrong");
  }
 ?>
