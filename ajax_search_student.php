<?php 

require "required_files.php";

$data = array();


// $data['test'] = $_POST['student_num'];

$student_number = $_POST['student_number'];

$query = "SELECT * FROM studentinfo WHERE studno LIKE '%$student_number%'";
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