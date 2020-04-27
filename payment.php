<?php include 'selectedbus.php';
$con=mysqli_connect("localhost","root","","bus_ticket");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
echo $rid;

mysqli_close($con);
?>
