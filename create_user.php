<?php
  header('Access-Control-Allow-Origin: *' );
  header('Content-Type:application/json' );
  header('Access-Control-Allow-Methods: POST ' );
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,
    Access-Control-Allow-Methods,Autherization,X-Requested-with');

  include_once 'Database.php';
  include_once 'Post_user.php';
  $database=new Database();
  $db=$database->connect();
  $user=new Post_user($db);

  $data=json_decode(file_get_contents("php://input"));

  $user->username=$data->username;
  $user->password=$data->password;
  $user->mob=$data->mob;
  $user->email=$data->email;
  $user->verified=$data->verified;
  $user->has_key=$data->has_key;

  if($user->create()){
    echo json_encode(array('message'=>'User added successfully'));
  }
  else{
    echo json_encode(array('message'=>'User Not added'));
  }
