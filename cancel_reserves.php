<?php
  header('Access-Control-Allow-Origin: *' );
  header('Content-Type:application/json' );
  header('Access-Control-Allow-Methods: PUT ' );
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,
    Access-Control-Allow-Methods,Autherization,X-Requested-with');

  include_once 'Database.php';
  include_once 'Post_reserves.php';
  $database=new Database();
  $db=$database->connect();
  $reserves=new Post_reserves($db);

  $data=json_decode(file_get_contents("php://input"));
  $reserves->pnr=$data->pnr;


  if($reserves->update()){
    echo json_encode(array('message'=>'Ticket '. $reserves->pnr . ' Cancelled successfully'));
  }
  else{
    echo json_encode(array('message'=>'Ticket Not Found'));
  }
