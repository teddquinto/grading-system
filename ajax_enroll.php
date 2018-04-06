<?php 
require "required_files.php";

$data = array();



$grade_level = $_POST['grade_level'];
$section = $_POST['section'];
$school_year = $_POST['school_year'];
$student_num = $_POST['studno'];
//$studno = $_GET['id'];

$grade_name = "SELECT g.grade_name FROM g_level g,sections s WHERE s.g_id = g.g_id AND g.g_id = '$grade_level' ";
  $result_grade = mysqli_query($connect, $grade_name);
   while ($row= mysqli_fetch_array($result_grade, MYSQLI_ASSOC)){

                 $g_name = $row['grade_name'];
                 
              }

$query = "SELECT * FROM student_record WHERE grade_level = '$g_name' AND section = '$section' AND school_year = '$school_year' AND studno = '$student_num' ";
$result = mysqli_query($connect, $query);  
if(mysqli_num_rows($result) > 0)
{  
	echo "Student Exist";
}  
else  
{ 

$query ="INSERT INTO student_record(grade_level,section,school_year,studno) VALUES('$g_name','$section','$school_year',
'$student_num')";
// $query = "UPDATE student_record set grade_level='$grade_level',section='$section',school_year='$school_year' 
// 			WHERE studno LIKE '%$student_num%' ";
$ins = mysqli_query($connect, $query);  
	
if($ins)//
{  
	
	$data['result'] = true;	

}  else {

	$data['result'] = false;

}


//$data['test']= $grade_level.' '. $section.' '.$school_year;
echo json_encode($data);
}

?>