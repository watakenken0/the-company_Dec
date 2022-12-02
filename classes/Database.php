<?php

class Database{
  private $server_name = "localhost";
  private $username = "root";
  private $password = "root";
  private $db_name = "company_December";

  protected $conn;

  // define the constructor
  public function __construct(){
    $this->conn = new mysqli($this->server_name,$this->username, $this->password, $this->db_name);

    // validate the database connection
    if($this->conn->connect_error){
      die('unable to connect to database.'. $this->conn->connect_error);
    }
  }

}

?>
