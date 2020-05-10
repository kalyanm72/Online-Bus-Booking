<?php
  header('Access-Control-Allow-Origin: *' );
  header('Content-Type:application/json' );
  header('Access-Control-Allow-Methods: POST ' );
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,
    Access-Control-Allow-Methods,Autherization,X-Requested-with');

  include_once 'Database.php';
  include_once 'Post_passenger.php';
  $database=new Database();
  $db=$database->connect();
  $routes=new Post_passenger($db);

  $data=json_decode(file_get_contents("php://input"));

  $result=$routes->read();
  $num=$result->rowCount();

  $routes_array=array();$temp;
  $routes_array['data']=array();
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      if(isset($pid))
      $temp=$pid+1;
    }
  $routes->pid=$temp;
  $routes->name=$data->name;
  $routes->email=$data->email;
  $routes->mob=$data->mob;

  if($routes->create()){
    echo json_encode(array('message'=>'Passenger added successfully'));
  }
  else{
    echo json_encode(array('message'=>'Passenger Not added'));
  }
