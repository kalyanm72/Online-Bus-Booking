<?php
  header('Access-Control-Allow-Origin: *' );
  header('Content-Type:application/json' );
  header('Access-Control-Allow-Methods: POST ' );
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,
    Access-Control-Allow-Methods,Autherization,X-Requested-with');

  include_once 'Database.php';
  include_once 'Post_reserves.php';
  $database=new Database();
  $db=$database->connect();
  $routes=new Post_reserves($db);

  $data=json_decode(file_get_contents("php://input"));

  $routes->rid=$data->rid;
  $routes->pid=$data->pid;
  $routes->status=$data->status;

  if($routes->create()){
    echo json_encode(array('message'=>'Reservation added successfully'));
  }
  else{
    echo json_encode(array('message'=>'Reservation Not added'));
  }
