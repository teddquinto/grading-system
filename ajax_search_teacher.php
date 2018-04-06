<?php 

require "required_files.php";

$data = array();

$grade_level = $_POST['grade_level'];

					$query = "SELECT DISTINCT ti.teachers_id,ti.teachers_lname,ti.teachers_fname,ti.teachers_mname,tc.type_of_teacher,tc.glevel_section,tc.subjects
					FROM
					teachersinfo ti,teachers_class tc,student_record SR
					WHERE
					tc.teachers_id=ti.teachers_id
					AND 
					tc.glevel_section = (SELECT DISTINCT CONCAT(SR.grade_level, '-', SR.section) FROM student_record)
					AND
					SR.grade_level LIKE '%$grade_level%'  
					";
					


										

$result = mysqli_query($connect, $query);  
	
  
	
	while ($row =  mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}

  //else {

	// $data[] = "";

//}


echo json_encode($data);