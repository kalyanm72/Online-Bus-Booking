<?php
  session_start();
      if(count($_POST)>0){
        $username=$_POST['uname'];
        $password=$_POST['password'];
        $repassword=$_POST['repassword'];
        $mailid=$_POST['emailid'];
        $mob=$_POST['mob'];
        // echo strlen($username<5);
        if(strlen($username)<5){
          $error="<h2>Username too short atleast 5 letters needed</h2>";
        }
        else if($password!=$repassword){

          $error="<h2>passwords do not match try again!!</h2>";
        }
        else{
          $con = new MySQLi("localhost","root","","bus_ticket");

          $username=$con->real_escape_string($username);
          $password=$con->real_escape_string($password);
          $repassword=$con->real_escape_string($repassword);
          $mailid=$con->real_escape_string($mailid);
          $mob=$con->real_escape_string($mob);

          $key=crypt(time(). $username,"something");
          $password=crypt($password,"something");
          $insert=$con->query("INSERT INTO users(username,password,mob,email,has_key)
          VALUES('$username','$password','$mob','$mailid','$key')
          ");
          if(!$insert){
            echo "failed registration";
          }
          else{
            $to=$mailid;
            $subject="verification mail";
            $message="<a href='http://localhost/online3/verify.php?key=$key'>Complete verification Here</a>";
            $header="From:imt_2017052@iiitm.ac.in \r\n";
            $header .="MIME-Version:1.0 " . "\r\n";
            $header .="Content-type:text/html;charset=TUF-8" . "\r\n";
            mail($to,$subject,$message,$header);
            echo "email has been sent check your mail and follow the link provided";
          }
        }
      }
      else{
        echo "fail";
      }
 ?>
