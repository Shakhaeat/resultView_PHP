<?php
class Students{
  
    // database connection and table name
    private $conn;
    private $table_name = "students";
  
    // object properties
    public $id;
    public $roll_id;
    public $std_name;
    public $father_name;
    public $mother_name;
    public $degree;
    public $year;
    public $board;
    public $institute;
    public $bangla;
    public $general_math;
    public $eng;
    public $history;
    public $created_at;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    //Get Students
    public function read(){
        //Create Query
        $query = "SELECT * 
        FROM '.$this->table.' 
        where  roll_id='$roll_id' and degree='degree' and year='year' and board='board'"
        //Prepare Query
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt;

    }
}

?>