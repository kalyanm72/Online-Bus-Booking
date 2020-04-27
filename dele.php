
<?php
$con=mysqli_connect("localhost","root","","bus_ticket");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$rid='';


//$password='';


$rid=$_POST['rid'];



// if (isset($_POST['password']))
// {
// $password=$_POST['password'];
// }




$sql="DELETE FROM route WHERE rid='$rid'";
$retval=mysqli_query($con,$sql);
$flag=1;

header("refresh:1;url=adminhome.html");

mysqli_close($con);
?>
