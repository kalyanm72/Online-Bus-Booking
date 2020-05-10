<?php
  header('Access-Control-Allow-Origin: *' );
  header('Content-Type:application/json' );
  header('Access-Control-Allow-Methods: POST ' );
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,
    Access-Control-Allow-Methods,Autherization,X-Requested-with');

  include_once 'Database.php';
  include_once 'Post_route.php';
  $database=new Database();
  $db=$database->connect();
  $routes=new Post_route($db);

  $data=json_decode(file_get_contents("php://input"));

  $routes->bid=$data->bid;
  $routes->fromLoc=$data->fromLoc;
  $routes->toLoc=$data->toLoc;
  $routes->fare=$data->fare;
  $routes->dep_date=$data->dep_date;
  $routes->dep_time=$data->dep_time;
  $routes->arr_date=$data->arr_date;
  $routes->arr_time=$data->arr_time;
  $routes->avalseats=$data->avalseats;
  $routes->maxseats=$data->maxseats;

  if($routes->create()){
    echo json_encode(array('message'=>'Route added successfully'));
  }
  else{
    echo json_encode(array('message'=>'Route Not added'));
  }
