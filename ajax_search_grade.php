<?php 

require "required_files.php";

$data = array();


// $data['test'] = $_POST['student_num'];
$studno = $_POST['studno'];
$subjects = $_POST['subjects'];
$grading_period = $_POST['grading_period'];

$query = "SELECT grades FROM student_gradee WHERE studno = '$studno' AND grading_period = '$grading_period' AND subjects = '$subjects'";
$result = mysqli_query($connect, $query);  
	
if(mysqli_num_rows($result) > 0)
{  
	while ($row =  mysqli_fetch_assoc($result)) {
		$data['result'] = $row;
	}

}  else {

	$data['result'] = "0";

}


echo json_encode($data);