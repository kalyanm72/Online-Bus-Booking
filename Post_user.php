<?php
  class Post_user{
    private $conn;
    private $table='users';

    public $username;
    public $password;
    public $mob;
    public $has_key;
    public $verified;
    public $email;
    public $CreatedOn;


    public function __construct($db){
      $this->conn=$db;
    }
    public function read(){
      $query='SELECT  p.email,p.password,p.verified,p.username,p.verified,p.has_key,p.mob,p.CreatedOn
              FROM ' .$this->table. ' p ';
      $stmt=$this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    }
    public function read_single(){
      $query='SELECT  p.email,p.password,p.verified,p.username,p.verified,p.has_key,p.mob,p.CreatedOn
              FROM ' .$this->table. ' p
              WHERE p.email= ? AND p.password= ?
              ';
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(1,$this->email);
        $stmt->bindParam(2,$this->password);


        $stmt->execute();

        return $stmt;

        $row=$stmt->fetch(PDO::FETCH_ASSOC);

        $this->email=$row['email'];
        $this->password=$row['password'];
        $this->verified=$row['verified'];
        $this->CreatedOn=$row['CreatedOn'];

    }
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . '
          SET
          username = :username,
          password = :password,
          verified = :verified,
          mob = :mob,
          email = :email,
          has_key = :has_key';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->username=htmlspecialchars(strip_tags($this->username));
          $this->password=htmlspecialchars(strip_tags($this->password));
          $this->email=htmlspecialchars(strip_tags($this->email));
          $this->has_key=htmlspecialchars(strip_tags($this->has_key));
          $this->verified=htmlspecialchars(strip_tags($this->verified));
          $this->mob=htmlspecialchars(strip_tags($this->mob));



          // Bind data
          $stmt->bindParam(':username', $this->username);
          $stmt->bindParam(':password', $this->password);
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':has_key', $this->has_key);
          $stmt->bindParam(':verified', $this->verified);
          $stmt->bindParam(':mob', $this->mob);

          // Execute query
          if($stmt->execute()) {
            return true;
      }
    }

  }
