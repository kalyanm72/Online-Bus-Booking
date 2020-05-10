
<?php
$con=mysqli_connect("localhost","root","","bus_ticket");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$rid='';


//$password='';
// session_start();
// echo $_SESSION['user_first_name'];

$rid=$_POST['rid'];



// if (isset($_POST['password']))
// {
// $password=$_POST['password'];
// }


$sql="DELETE FROM  today";
if (!mysqli_query($con,$sql))
	{
  		die('Error: ' . mysqli_error($con));
}
$sql="INSERT INTO  today (tod_time,tod_date) VALUES (CURRENT_TIME,CURRENT_DATE);  ";
if (!mysqli_query($con,$sql))
	{
  		die('Error: ' . mysqli_error($con));
}

$sql = "SELECT * FROM today";
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

$row=mysqli_fetch_array($retval);

$curr_date=$row['tod_date'];

$curr_time=$row['tod_time'];

 // SELECT FROM reserves WHERE DOT<
// $retval=mysqli_query($con,$sql);
$sql="DELETE FROM reserves WHERE DOT<'$curr_date'";
$retval=mysqli_query($con,$sql);
$sql="DELETE FROM route WHERE rid='$rid'";
$retval=mysqli_query($con,$sql);
$flag=1;

header("refresh:1;url=adminhome.html");

mysqli_close($con);
?>
