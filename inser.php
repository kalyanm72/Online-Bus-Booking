
<?php
$con=mysqli_connect("localhost","root","","bus_ticket");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$captcha;
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

if(isset($_POST['rid']))
$rid=$_POST['rid'];
if(isset($_POST['bid']))
$bid=$_POST['bid'];
if(isset($_POST['fromLoc']))
$fromLoc=$_POST['fromLoc'];
if(isset($_POST['toLoc']))
$toLoc=$_POST['toLoc'];
if(isset($_POST['fare']))
$fare=$_POST['fare'];
if(isset($_POST['dep_date']))
$dep_date=$_POST['dep_date'];
if(isset($_POST['dep_time']))
$dep_time=$_POST['dep_time'];
if(isset($_POST['arr_date']))
$arr_date=$_POST['arr_date'];
if(isset($_POST['arr_time']))
$arr_time=$_POST['arr_time'];
if(isset($_POST['avalseats']))
$avalseats=$_POST['avalseats'];
if(isset($_POST['maxseats']))
$maxseats=$_POST['maxseats'];
if(isset($_POST['g-recaptcha-response']))
$captcha=$_POST['g-recaptcha-response'];
if(!$captcha){
  echo '<h2>Please check the the captcha form.</h2>';
  header("refresh:1;url=inser.html");
          exit;
}
$secretKey = "6LdOQ_MUAAAAAJGlFNTMg-fqS_IwiFlFsLkPnRTv";
        $ip = $_SERVER['REMOTE_ADDR'];
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        // should return JSON with success as true
        if($responseKeys["success"]) {

        } else {
                echo 'You are a NOT HUMAN';
                exit;
        }
// if (isset($_POST['password']))
// {
// $password=$_POST['password'];
// }

$low="BB001";
$hi="BB025";
// echo $bid;
// echo ($bid[0]=='B'&&$bid[1]=='B');
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if(strcmp($bid,$low)>=0&&strcmp($bid,$hi)<=0)
alert("Route Saved Successfully");
else{
alert("Route Not Saved (check bus id range from BB001 to BB025)");

header("refresh:1;url=adminhome.html");

mysqli_close($con);
  }



$sql="INSERT INTO route (rid,bid,fromLoc,toLoc,fare,dep_date,dep_time,arr_time,arr_date,avalseats,maxseats) VALUES('$rid','$bid','$fromLoc','$toLoc','$fare','$dep_date','$dep_time','$arr_time','$arr_date','$avalseats','$maxseats')";
$retval=mysqli_query($con,$sql);
$flag=1;


header("refresh:1;url=adminhome.html");

mysqli_close($con);
?>
