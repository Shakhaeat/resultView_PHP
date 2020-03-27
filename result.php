<?php

require_once './config/Connect.php';
require_once 'header.php';
include_once './models/Student.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//Instantiate student object
$student = new Students($db);

// get keywords

 $degree=isset($_GET["degree"]) ? $_GET["degree"] : "";
 $year=isset($_GET["year"]) ? $_GET["year"] : "";
 $board=isset($_GET["board"]) ? $_GET["board"] : "";
 $roll_id=isset($_GET["roll_id"]) ? $_GET["roll_id"] : "";

//Query finding result
$result = $student->read($degree, $year, $board, $roll_id);

//Check row count
$num=$result->rowCount();

//Check if any student
//$conn->close();

  if ($num > 0) {
  	//Student array
  	// $student_arr = array();
  	// $student_arr['data'] = array();
  	while($row = $result->fetch(PDO::FETCH_ASSOC)){
         // $myJSON = json_encode($row);
         // echo $myJSON;

      // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
         $student_item = array(
        'id' => $id,
        'roll_id' => $roll_id,
        //'std_name' => html_entity_decode($body),
        'std_name' => $std_name,
        'father_name' => $father_name,
        'mother_name' => $mother_name,
        'year' => $year,
        'degree' => $degree,
        'board' => $board,
        'institute' => $institute,
        'bangla' => $bangla,
        'general_math' => $general_math,
        'eng' => $eng,
        'history' => $history,
        'created_at' => $created_at,

      );

      // Push to "data"
      //array_push($student_arr['data'], $student_item);
      // array_push($posts_arr['data'], $post_item);
    }
    // set response code - 200 OK
    http_response_code(200);
    // Turn to JSON & output
    echo json_encode($student_item);

  } else {
    // set response code - 404 Not found
    http_response_code(404);
    // No Posts
    echo json_encode(
      array('message' => 'No Result Found')
    );
  }
  


?> 