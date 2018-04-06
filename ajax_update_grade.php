<?php 

require "required_files.php";

$data = array();


// $data['test'] = $_POST['student_num'];
$studno = $_POST['studno'];
$subjects = $_POST['subjects'];
$grading_period = $_POST['grading_period'];
$grades = $_POST['grades'];

$query = "UPDATE student_gradee set grades='$grades' WHERE studno = '$studno' AND grading_period = '$grading_period' AND subjects = '$subjects'";
$ins = mysqli_query($connect, $query);  
	
if($ins)//
{  
	
	$data['result'] = true;

}  else {

	$data['result'] = false;

}


//$data['test']= $grade_level.' '. $section.' '.$school_year;
echo json_encode($data);