<?php
  header('Access-Control-Allow-Origin: *' );
  header('Content-Type:application/json' );
  include_once 'Database.php';
  include_once 'Post_route.php';
  $database=new Database();
  $db=$database->connect();
  $routes=new Post_route($db);
  $routes->fromLoc=isset($_GET['fromLoc'])?$_GET['fromLoc']:die();
    $routes->toLoc=isset($_GET['toLoc'])?$_GET['toLoc']:die();
      $routes->dep_date=isset($_GET['dep_date'])?$_GET['dep_date']:die();

  $result=$routes->read_single();
  $num=$result->rowCount();
  if($num>0){
    $routes_array=array();
    $routes_array['data']=array();
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $route_item=array(
          'rid'=> $rid,
          'bname' =>$bname,
          'fromLoc'=> $fromLoc,
          'toLoc' =>$toLoc,
          'fare' =>$fare,
          'dep_time'=> $dep_time,
          'dep_date' =>$dep_date,
          'arr_time' =>$arr_time,
          'arr_date' =>$arr_date,
          'avalseats'=> $avalseats,
          'type_ac' =>$type_ac,
          'type_sl' =>$type_sl
        );
        array_push($routes_array['data'],$route_item);
    }
    echo json_encode($routes_array);
  }
  else{
    echo json_encode(array('message'=>'No routes found'));
  }
