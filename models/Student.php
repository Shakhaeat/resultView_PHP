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
    public function read($degree, $year, $board, $roll_id){
        //Create Query
        $query = "SELECT * 
        FROM ".$this->table_name." 
        where degree = ? and year = ? and board = ? and roll_id = ?
        LIMIT 
            0,1";
        //and degree='$degree' and year='year' and board='board'";

       
        //Prepare Query
        $stmt = $this->conn->prepare($query);

        // bind id of product to be updated
        $stmt->bindParam(1, $degree);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $board);
        $stmt->bindParam(4, $roll_id);

        // execute query
        $stmt->execute();
        return $stmt;

    }
}

?>