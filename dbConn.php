<?php
class DbConn{

    private $servername= "localhost";
    private $username= "root";
    private $password = "";
    private $dbname= "VOTING_DATA";


  public function provideCon(){

      try {
        $conn = new PDO("mysql:host={$this->servername};dbname={$this->dbname}", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
      }
      return $conn;
  }
}


?>