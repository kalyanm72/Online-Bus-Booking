<?php
  header('Access-Control-Allow-Origin: *' );
  header('Content-Type:application/json' );
  include_once 'Database.php';
  include_once 'Post_reserves.php';
  $database=new Database();
  $db=$database->connect();
  $routes=new Post_reserves($db);
  $routes->pnr=isset($_GET['pnr'])?$_GET['pnr']:die();
    $routes->mob=isset($_GET['mob'])?$_GET['mob']:die();
    // echo

    // echo "hello";
  $routes->read_single();

  // email,name,pnr,bid,fromLoc,toLoc,dep_date,dep_time ,arr_time,fare,mob,status
  $result_arr = array(
 'email' => $routes->email,
 'name' => $routes->name,
 'pnr' => $routes->pnr,
 'bid' => $routes->bid,
 'fromLoc' => $routes->fromLoc,
 'toLoc' => $routes->toLoc,
 'dep_time' => $routes->dep_time,
 'dep_date' => $routes->dep_date,
 'arr_time' => $routes->arr_time,
 'fare' => $routes->fare,
 'mob' => $routes->mob,
 'status' => $routes->status,

  );


    echo json_encode($result_arr);
