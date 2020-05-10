<?php
  header('Access-Control-Allow-Origin: *' );
  header('Content-Type:application/json' );
  header('Access-Control-Allow-Methods: DELETE ' );
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,
    Access-Control-Allow-Methods,Autherization,X-Requested-with');

  include_once 'Database.php';
  include_once 'Post_route.php';
  $database=new Database();
  $db=$database->connect();
  $routes=new Post_route($db);

  $data=json_decode(file_get_contents("php://input"));
  $routes->rid=$data->rid;

  if($routes->delete()){
    echo json_encode(array('message'=>'Route '. $routes->rid . ' Deleted successfully'));
  }
  else{
    echo json_encode(array('message'=>'Route Not Found'));
  }
