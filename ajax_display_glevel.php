<?php 

require "required_files.php";

$data = array();

$grade_level = $_POST['grade_level'];
$school_year = $_POST['school_year'];
$section = $_POST['section'];


$grade_name = "SELECT g.grade_name FROM g_level g,sections s WHERE s.g_id = g.g_id AND g.g_id = '$grade_level' ";
  $result_grade = mysqli_query($connect, $grade_name);
   while ($row= mysqli_fetch_array($result_grade, MYSQLI_ASSOC)){

                 $g_name = $row['grade_name'];
                 
              }



$query = "SELECT stu_info.studno, stu_info.lname, stu_info.fname, stu_info.mname, stu_info.bdate, stu_info.age, stu_info.gender, stu_info.address, stu_info.fathername, stu_info.mothername FROM studentinfo as stu_info INNER JOIN student_record as stu_rec ON stu_info.studno = stu_rec.studno WHERE stu_rec.grade_level LIKE '%$g_name%' AND stu_rec.section LIKE '%$section%' AND stu_rec.school_year LIKE '%$school_year%' ORDER BY stu_info.lname ASC ";

$result = mysqli_query($connect, $query);  
	
if(mysqli_num_rows($result) > 0)//
{  
	
	while ($row =  mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}

}  //else {

	// $data[] = "";

//}


echo json_encode($data);