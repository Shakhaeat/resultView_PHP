<?php
	
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "result";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 

class Database{
  
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "result";
    private $username = "root";
    private $password = "";
    public $conn;
  
    // get the database connection
    public function connect(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
           // $this->conn->exec("set names utf8");
            $this->$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>