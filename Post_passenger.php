<?php
  class Post_passenger{
    private $conn;
    private $table='passenger';

    public $name;
    public $email;
    public $mob;
    public $pid;

    public function __construct($db){
      $this->conn=$db;
    }
    public function read(){
      $query='SELECT  p.pid,p.name,p.email,p.mob
              FROM ' .$this->table. ' p ';
      $stmt=$this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    }
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . '
          SET
          pid=:pid,
          name = :name,
          email = :email,
          mob = :mob';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
            $this->pid=htmlspecialchars(strip_tags($this->pid));
          $this->name=htmlspecialchars(strip_tags($this->name));
          $this->email=htmlspecialchars(strip_tags($this->email));
          $this->mob=htmlspecialchars(strip_tags($this->mob));




          // Bind data
          $stmt->bindParam(':pid', $this->pid);
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':mob', $this->mob);
          $stmt->bindParam(':email', $this->email);

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
