<?php
  header('Access-Control-Allow-Origin: *' );
  header('Content-Type:application/json' );
  include_once 'Database.php';
  include_once 'Post_user.php';
  $database=new Database();
  $db=$database->connect();
  $routes=new Post_user($db);
  $routes->email=isset($_GET['email'])?$_GET['email']:die();
    $routes->password=isset($_GET['password'])?$_GET['password']:die();


  $result=$routes->read_single();
  $num=$result->rowCount();
  if($num>0){
    $routes_array=array();
    $routes_array['data']=array();
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $route_item=array(
          'username'=> $username,
          'password' =>$password,
          'CreatedOn'=> $CreatedOn,
          'mob' =>$mob,
          'email' =>$email,
          'has_key'=> $has_key,
          'verified' =>$verified,
        );
        array_push($routes_array['data'],$route_item);
    }
    echo json_encode($routes_array);
  }
  else{
    echo json_encode(array('message'=>'No routes found'));
  }
