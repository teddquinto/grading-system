<?php 
require "required_files.php";

$data = array();


// $data['test'] = $_POST['student_num'];
// $student_num = $_POST['student_num'];
$grade_level = $_POST['grade_level'];
$section = $_POST['section'];
$school_year = $_POST['school_year'];
$student_num = $_POST['studno'];

$check_query="SELECT * FROM student_record WHERE studno = '$student_num' ";
	$result_check = mysqli_query($connect, $check_query);  
	if(mysqli_num_rows($result_check) == 0)
{ 
		$insert = "INSERT INTO student_record(grade_level,section, school_year,studno)
             VALUES ( '$grade_level','$section', '$school_year', '$student_num')";
             $data= mysqli_query($connect,$insert) or die('Error, query failed'); 

 }else{

$query = "UPDATE student_record set grade_level='$grade_level',section='$section',school_year='$school_year' 
			WHERE studno LIKE '%$student_num%' ";
$ins = mysqli_query($connect, $query);  
	}
if($ins)//
{  
	
	$data['result'] = true;

}  else {

	$data['result'] = false;

}


//$data['test']= $grade_level.' '. $section.' '.$school_year;
echo json_encode($data);