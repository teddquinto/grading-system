<?php 
require "required_files.php";

$data = array();

// $data['test'] = $_POST['student_num'];
// $student_num = $_POST['student_num'];
$teachers_id = $_POST['teachers_id'];
$grade_option = $_POST['grade_option'];
$section= $_POST['section'];
$Type_of_teacher = $_POST['Type_of_teacher'];
$subjects= $_POST['subjects'];
$b_time =$_POST['begin_time'];
$e_time =$_POST['end_time'];
 $day = implode(', ', $_POST['day']);
//$day =$_POST['day'];
$school_year= $_POST['school_year'];

if (!isset($b_time) || !isset($e_time) || !isset($day) ) {

	echo '<script>
	alert("set date and time!")
	window.location.replace("add_teachers_class.php")
	


	</script>';  
		
}else{

$check_query = "SELECT * FROM teachers_class WHERE b_time = '$b_time' AND e_time = '$e_time' AND day = '$day' AND glevel_section=
CONCAT('$grade_option','-','$section') AND teachers_id = '$teachers_id' ";
$result_check = mysqli_query($connect, $check_query);  
if(mysqli_num_rows($result_check) > 0)
{  
	echo '<script> 
	alert("time, day AND subject is already taken!")
	window.location.replace("add_teachers_class.php?id='.$teachers_id.'") </script>';  
			//echo '<script>window.location.replace("add_teachers_class.php")</script>';   
}  
else  
{ 

	$check_sub = "SELECT * FROM teachers_class WHERE glevel_section= CONCAT('$grade_option','-','$section') AND subjects='$subjects' ";
$result_check2 = mysqli_query($connect, $check_sub);  
if(mysqli_num_rows($result_check2) > 0)
{  
	echo '<script> 
	alert("subject is already been taken!")
	window.location.replace("add_teachers_class.php?id='.$teachers_id.'") </script>';  
			//echo '<script>window.location.replace("add_teachers_class.php")</script>';   
}else{
	$check_sub2 = "SELECT * FROM teachers_class WHERE glevel_section= CONCAT('$grade_option','-','$section') ";
	$result_check3 = mysqli_query($connect, $check_sub2);  
	if(mysqli_num_rows($result_check2) > 12)
{  

	echo '<script> 
	alert("grade level had exceed the corrisponding assigned subjects!")
	window.location.replace("add_teachers_class.php?id='.$teachers_id.'") </script>';  
			//echo '<script>window.location.replace("add_teachers_class.php")</script>';  
	}else{



$query = "INSERT INTO teachers_class (teachers_id,glevel_section,type_of_teacher,subjects,b_time,e_time,day,school_year) values('$teachers_id',CONCAT('$grade_option','-','$section'), '$Type_of_teacher','$subjects','$b_time','$e_time','$day','$school_year')";
$ins = mysqli_query($connect, $query);  



if($ins)//
{  

	
	$data['result'] = true;
	echo '<script>
	alert("teachers hass been assigned!")
	 window.location.replace("add_teachers_class.php?id='.$teachers_id.'") </script>';  

}  else {

	$data['result'] = false;
	echo '<script>
	alert("error assigning")
	 window.location.replace("add_teachers_class.php?id='.$teachers_id.'") </script>'; 

}


}
}	
}
//$data['test']= $grade_level.' '. $section.' '.$school_year;
//echo json_encode($data);
}