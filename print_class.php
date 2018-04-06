<?php 

require "required_files.php";

// $data = array();

// $grade_level = $_POST['grade_level'];
// $school_year = $_POST['school_year'];
// $section = $_POST['section'];

$query = "SELECT stu_info.studno, stu_info.lname, stu_info.fname, stu_info.mname, stu_info.bdate, stu_info.age, stu_info.gender, stu_info.address, stu_info.fathername, stu_info.mothername FROM studentinfo as stu_info INNER JOIN student_record as stu_rec ON stu_info.studno = stu_rec.studno WHERE stu_rec.grade_level = 'Grade 4' AND stu_rec.section = 'Narra4' AND stu_rec.school_year = '2017-2018' ORDER BY stu_info.lname ASC ";

$result = mysqli_query($connect, $query);  
	
if(mysqli_num_rows($result) > 0)//
{  
	
	while ($row =  mysqli_fetch_assoc($result)) {
		$lname = $row['lname'];
		
	}


} 
$sam = "<table><tr><td>".$lname."</td></tr></table>";

$aw ="<table><tr><td>asdsadsadsds</td></tr></table>";

require "../mpdf60/mpdf.php";
 $mpdf = new MPDF();
 
$mpdf->WriteHTML($sam);

	
 $data = $mpdf-> Output();

echo json_encode($data);
?>
