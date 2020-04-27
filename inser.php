
<?php
$con=mysqli_connect("localhost","root","","bus_ticket");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$rid='';
$bid='';
$fromLoc='';
$toLoc='';
$fare='';
$dep_date='';
$dep_time='';
$arr_date='';
$arr_time='';
$avalseats='';
$maxseats='';

//$password='';


$rid=$_POST['rid'];
$bid=$_POST['bid'];
$fromLoc=$_POST['fromLoc'];
$toLoc=$_POST['toLoc'];

$fare=$_POST['fare'];


$dep_date=$_POST['dep_date'];


$dep_time=$_POST['dep_time'];



$arr_date=$_POST['arr_date'];


$arr_time=$_POST['arr_time'];



$avalseats=$_POST['avalseats'];


$maxseats=$_POST['maxseats'];


// if (isset($_POST['password']))
// {
// $password=$_POST['password'];
// }




$sql="INSERT INTO route (rid,bid,fromLoc,toLoc,fare,dep_date,dep_time,arr_time,arr_date,avalseats,maxseats) VALUES('$rid','$bid','$fromLoc','$toLoc','$fare','$dep_date','$dep_time','$arr_time','$arr_date','$avalseats','$maxseats')";
$retval=mysqli_query($con,$sql);
$flag=1;

header("refresh:1;url=adminhome.html");

mysqli_close($con);
?>
