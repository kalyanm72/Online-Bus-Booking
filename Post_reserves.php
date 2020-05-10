<?php
  class Post_reserves{
    private $conn;
    private $table='reserves';

    public $email;
    public $pnr;
    public $name;
    public $bid;
    public $fromLoc;
    public $toLoc;
    public $dep_date;
    public $dep_time;
    public $arr_time;
    public $fare;
    public $mob;
    public $status;
    public $rid;
    public $pid;


    public function __construct($db){
      $this->conn=$db;
    }
    public function read(){
      $query='SELECT  p.rid,p.bid,p.fromLoc,p.toLoc,p.fare,p.dep_date,p.dep_time,p.arr_date,p.arr_time,p.avalseats,p.maxseats
              FROM ' .$this->table. ' p ';
      $stmt=$this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    }
    public function read_single(){
      $query='SELECT b.email as email ,b.name as name ,
            p.pnr,r.bid as bid,r.fromLoc as fromLoc,r.toLoc as toLoc,
            r.dep_date as dep_date,r.dep_time as dep_time,r.arr_time as arr_time,
            r.fare as fare,b.mob as mob,p.status,p.rid,p.pid,p.DOT
              FROM  ' .$this->table. ' p
              INNER JOIN
                route r ON p.rid=r.rid
              INNER JOIN
                passenger b ON b.pid=p.pid
              WHERE  pnr=? AND mob =?  ' ;
      // $query='SELECT  b.type_sl as type_sl,b.type_ac as type_ac,b.bname as bname,b.bid as bid ,p.rid,p.bid,p.fromLoc,p.toLoc,p.fare,p.dep_date,p.dep_time,p.arr_date,p.arr_time,p.avalseats,p.maxseats
      //         FROM ' .$this->table. ' p
      //         LEFT JOIN
      //           bus b ON p.bid = b.bid
      //         WHERE p.fromLoc= ? AND p.toLoc= ? AND p.dep_date= ?
      //         ';
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(1,$this->pnr);
        $stmt->bindParam(2,$this->mob);

        $stmt->execute();

        $row=$stmt->fetch(PDO::FETCH_ASSOC);

        $this->email=$row['email'];
        $this->name=$row['name'];
        $this->bid=$row['bid'];
        $this->fromLoc=$row['fromLoc'];
        $this->toLoc=$row['toLoc'];
        $this->dep_time=$row['dep_time'];
        $this->dep_date=$row['dep_date'];
        $this->arr_time=$row['arr_time'];
        $this->fare=$row['fare'];
        $this->status=$row['status'];

    }
    public function read_single_r(){

      $query='SELECT b.email as email ,b.name as name ,
            p.pnr,r.bid as bid,r.fromLoc as fromLoc,r.toLoc as toLoc,
            r.dep_date as dep_date,r.dep_time as dep_time,r.arr_time as arr_time,
            r.fare as fare,b.mob as mob,p.status,p.rid,p.pid,p.DOT
              FROM  ' .$this->table. ' p
              INNER JOIN
                route r ON p.rid=r.rid
              INNER JOIN
                passenger b ON b.pid=p.pid
              WHERE  email=? ' ;
      // $query='SELECT  b.type_sl as type_sl,b.type_ac as type_ac,b.bname as bname,b.bid as bid ,p.rid,p.bid,p.fromLoc,p.toLoc,p.fare,p.dep_date,p.dep_time,p.arr_date,p.arr_time,p.avalseats,p.maxseats
      //         FROM ' .$this->table. ' p
      //         LEFT JOIN
      //           bus b ON p.bid = b.bid
      //         WHERE p.fromLoc= ? AND p.toLoc= ? AND p.dep_date= ?
      //         ';
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(1,$this->email);

        $stmt->execute();
        return $stmt;
        $row=$stmt->fetch(PDO::FETCH_ASSOC);

        $this->email=$row['email'];
        $this->name=$row['name'];
        $this->bid=$row['bid'];
        $this->fromLoc=$row['fromLoc'];
        $this->toLoc=$row['toLoc'];
        $this->dep_time=$row['dep_time'];
        $this->dep_date=$row['dep_date'];
        $this->arr_time=$row['arr_time'];
        $this->fare=$row['fare'];
        $this->status=$row['status'];
    }
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . '
          SET
          rid = :rid,
          pid = :pid,
          status = :status
          ';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->rid=htmlspecialchars(strip_tags($this->rid));
          $this->pid=htmlspecialchars(strip_tags($this->pid));
          $this->status=htmlspecialchars(strip_tags($this->status));

          // Bind data
          $stmt->bindParam(':rid', $this->rid);
          $stmt->bindParam(':pid', $this->pid);
          $stmt->bindParam(':status', $this->status);

          // Execute query
          if($stmt->execute()) {
            return true;
      }
    }
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . '
          SET
          status="cancelled"
          WHERE
          pnr=:pnr
          ';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
            $this->pnr=htmlspecialchars(strip_tags($this->pnr));
          // Bind data
          $stmt->bindParam(':pnr', $this->pnr);

          // Execute query
          if($stmt->execute()) {
            return true;
      }
    }

  }
