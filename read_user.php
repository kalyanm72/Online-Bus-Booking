<?php
  header('Access-Control-Allow-Origin: *' );
  header('Content-Type:application/json' );
  include_once 'Database.php';
  include_once 'Post_user.php';
  $database=new Database();
  $db=$database->connect();
  $users=new Post_user($db);
  $result=$users->read();
  $num=$result->rowCount();
  if($num>0){
    $users_array=array();
    $users_array['data']=array();
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $user_item=array(
          'username'=> $username,
          'password' =>$password,
          'email'=> $email,
          'mob' =>$mob,
          'has_key' =>$has_key,
          'verified'=> $verified,
          'CreatedOn' =>$CreatedOn,

        );
        array_push($users_array['data'],$user_item);

    }
    echo json_encode($users_array);
  }
  else{
    echo json_encode(array('message'=>'No routes found'));
  }
