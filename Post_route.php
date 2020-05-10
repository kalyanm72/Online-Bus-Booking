<?php
  class Post_route{
    private $conn;
    private $table='route';

    public $rid;
    public $bid;
    public $fromLoc;
    public $toLoc;
    public $fare;
    public $dep_time;
    public $dep_date;
    public $arr_time;
    public $arr_date;
    public $avalseats;
    public $maxseats;

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

      $query='SELECT  b.type_sl as type_sl,b.type_ac as type_ac,b.bname as bname,b.bid as bid ,p.rid,p.bid,p.fromLoc,p.toLoc,p.fare,p.dep_date,p.dep_time,p.arr_date,p.arr_time,p.avalseats,p.maxseats
              FROM ' .$this->table. ' p
              LEFT JOIN
                bus b ON p.bid = b.bid
              WHERE p.fromLoc= ? AND p.toLoc= ? AND p.dep_date= ?
              ';
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(1,$this->fromLoc);
        $stmt->bindParam(2,$this->toLoc);
        $stmt->bindParam(3,$this->dep_date);

        $stmt->execute();

        return $stmt;

        $row=$stmt->fetch(PDO::FETCH_ASSOC);

        $this->rid=$row['rid'];
        $this->bname=$row['bname'];

        $this->fare=$row['fare'];

        $this->dep_time=$row['dep_time'];
        $this->arr_time=$row['arr_time'];
        $this->arr_date=$row['arr_date'];
        $this->avalseats=$row['avalseats'];
        $this->type_ac=$row['type_ac'];
        $this->type_sl=$row['type_sl'];
    }
    public function read_single_r(){

      $query='SELECT  b.type_sl as type_sl,b.type_ac as type_ac,b.bname as bname,b.bid as bid ,p.rid,p.bid,p.fromLoc,p.toLoc,p.fare,p.dep_date,p.dep_time,p.arr_date,p.arr_time,p.avalseats,p.maxseats
              FROM ' .$this->table. ' p
              LEFT JOIN
                bus b ON p.bid = b.bid
              WHERE p.rid= ?
              ';
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(1,$this->rid);

        $stmt->execute();

        return $stmt;

        $row=$stmt->fetch(PDO::FETCH_ASSOC);

        $this->rid=$row['rid'];
        $this->bname=$row['bname'];
        $this->fromLoc=$row['fromLoc'];
        $this->fare=$row['fare'];
        $this->dep_date=$row['dep_date'];
        $this->toLoc=$row['toLoc'];
        $this->dep_time=$row['dep_time'];
        $this->arr_time=$row['arr_time'];
        $this->arr_date=$row['arr_date'];
        $this->avalseats=$row['avalseats'];
        $this->type_ac=$row['type_ac'];
        $this->type_sl=$row['type_sl'];
    }
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . '
          SET
          bid = :bid,
          fromLoc = :fromLoc,
          toLoc = :toLoc,
          fare = :fare,
          dep_date = :dep_date,
          dep_time = :dep_time,
          arr_time = :arr_time,
          arr_date = :arr_date, avalseats = :avalseats, maxseats = :maxseats';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->bid=htmlspecialchars(strip_tags($this->bid));
          $this->fromLoc=htmlspecialchars(strip_tags($this->fromLoc));
          $this->toLoc=htmlspecialchars(strip_tags($this->toLoc));
          $this->fare=htmlspecialchars(strip_tags($this->fare));
          $this->dep_date=htmlspecialchars(strip_tags($this->dep_date));
          $this->dep_time=htmlspecialchars(strip_tags($this->dep_time));
          $this->arr_time=htmlspecialchars(strip_tags($this->arr_time));
          $this->arr_date=htmlspecialchars(strip_tags($this->arr_date));
          $this->avalseats=htmlspecialchars(strip_tags($this->avalseats));
          $this->maxseats=htmlspecialchars(strip_tags($this->maxseats));



          // Bind data
          $stmt->bindParam(':bid', $this->bid);
          $stmt->bindParam(':fromLoc', $this->fromLoc);
          $stmt->bindParam(':toLoc', $this->toLoc);
          $stmt->bindParam(':fare', $this->fare);
          $stmt->bindParam(':dep_date', $this->dep_date);
          $stmt->bindParam(':dep_time', $this->dep_time);
          $stmt->bindParam(':arr_date', $this->arr_date);
          $stmt->bindParam(':arr_time', $this->arr_time);
          $stmt->bindParam(':avalseats', $this->avalseats);
          $stmt->bindParam(':maxseats', $this->maxseats);

          // Execute query
          if($stmt->execute()) {
            return true;
      }
    }
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . '
          SET
          bid = :bid,
          fromLoc = :fromLoc,
          toLoc = :toLoc,
          fare = :fare,
          dep_date = :dep_date,
          dep_time = :dep_time,
          arr_time = :arr_time,
          arr_date = :arr_date, avalseats = :avalseats, maxseats = :maxseats
          WHERE
          rid=:rid
          ';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
            $this->rid=htmlspecialchars(strip_tags($this->rid));
          $this->bid=htmlspecialchars(strip_tags($this->bid));
          $this->fromLoc=htmlspecialchars(strip_tags($this->fromLoc));
          $this->toLoc=htmlspecialchars(strip_tags($this->toLoc));
          $this->fare=htmlspecialchars(strip_tags($this->fare));
          $this->dep_date=htmlspecialchars(strip_tags($this->dep_date));
          $this->dep_time=htmlspecialchars(strip_tags($this->dep_time));
          $this->arr_time=htmlspecialchars(strip_tags($this->arr_time));
          $this->arr_date=htmlspecialchars(strip_tags($this->arr_date));
          $this->avalseats=htmlspecialchars(strip_tags($this->avalseats));
          $this->maxseats=htmlspecialchars(strip_tags($this->maxseats));



          // Bind data
          $stmt->bindParam(':rid', $this->rid);
          $stmt->bindParam(':bid', $this->bid);
          $stmt->bindParam(':fromLoc', $this->fromLoc);
          $stmt->bindParam(':toLoc', $this->toLoc);
          $stmt->bindParam(':fare', $this->fare);
          $stmt->bindParam(':dep_date', $this->dep_date);
          $stmt->bindParam(':dep_time', $this->dep_time);
          $stmt->bindParam(':arr_date', $this->arr_date);
          $stmt->bindParam(':arr_time', $this->arr_time);
          $stmt->bindParam(':avalseats', $this->avalseats);
          $stmt->bindParam(':maxseats', $this->maxseats);

          // Execute query
          if($stmt->execute()) {
            return true;
      }
    }
    public function delete(){
      $query='DELETE FROM ' . $this->table . ' WHERE rid=:rid';
      $stmt = $this->conn->prepare($query);

      // Clean data
        $this->rid=htmlspecialchars(strip_tags($this->rid));
        $stmt->bindParam(':rid', $this->rid);
        if($stmt->execute()) {
          return true;
        }
    }
  }
