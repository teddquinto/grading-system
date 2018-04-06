
<?php 
require "required_files.php";

$data = array();

// $data['test'] = $_POST['student_num'];
// $student_num = $_POST['student_num'];
$t_id = $_POST['t_id'];
$subjects= $_POST['subjects'];
$b_time =$_POST['begin_time'];
$e_time =$_POST['end_time'];
$day =$_POST['day'];



$query = "UPDATE teachers_class set subjects= '$subjects', b_time = '$b_time', e_time = '$e_time', day ='$day' 
		  WHERE t_id = '$t_id'";
$ins = mysqli_query($connect, $query);  
	
if($ins)//
{  
	
	$data['result'] = true;

}  else {

	$data['result'] = false;

}


//$data['test']= $grade_level.' '. $section.' '.$school_year;
echo json_encode($data);
