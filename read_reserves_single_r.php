<?php
  header('Access-Control-Allow-Origin: *' );
  header('Content-Type:application/json' );
  include_once 'Database.php';
  include_once 'Post_reserves.php';
  $database=new Database();
  $db=$database->connect();
  $routes=new Post_reserves($db);
  $routes->email=isset($_GET['email'])?$_GET['email']:die();

  $result=$routes->read_single_r();
  $num=$result->rowCount();
  if($num>0){
    $routes_array=array();
    $routes_array['data']=array();
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $route_item=array(
          'fromLoc'=> $fromLoc,
          'toLoc' =>$toLoc,
          'fare' =>$fare,
          'dep_time'=> $dep_time,
          'dep_date' =>$dep_date,
          'arr_time' =>$arr_time,
          'email'=>$email,
          'name'=>$name,
          'pnr'=>$pnr,
          'mob'=>$mob,
          'status'=>$status,
          'bid'=>$bid,

        );
        array_push($routes_array['data'],$route_item);

    }
    echo json_encode($routes_array);
  }
  else{
    echo json_encode(array('message'=>'No routes found'));
  }
