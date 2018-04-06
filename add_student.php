<?php 

require "required_files.php";
 			 $g_level = $_GET['g'];
             $t_type= $_GET['t'];
/*-------------------------------------------------------------------*/
// STUDENT INFO

$student_lname = ucwords($_POST["student_lname"]);
$student_fname = ucwords($_POST["student_fname"]);
$student_mname = ucwords($_POST["student_mname"]);
$student_suffix = $_POST["student_suffix"];
$student_bday = $_POST["student_bday"];
$student_age = $_POST["student_age"];
$student_gender =ucwords($_POST["student_gender"]);
$student_address = ucwords($_POST["student_address"]);
$student_fathers_name = ucwords($_POST["student_fathers_name"]);
$student_mothers_name = ucwords($_POST["student_mothers_name"]);
$b_certificate =     $_POST["b_certificate"];
$grade_option = $_POST['grade_option'];
$section = $_POST['section'];
$school_year = $_POST['school_year'];


/*-------------------------------------------------------------------*/

// check if student exist in student info


// if student exist
// save the student
// else 
// error message.. student exist


/*
lname
fname
mname
bdate
gender
*/
$query = "SELECT * FROM studentinfo WHERE lname = '$student_lname' AND fname = '$student_fname' AND mname = '$student_mname' AND bdate = '$student_bday' AND gender = '$student_gender'";
$result = mysqli_query($connect, $query);  
if(mysqli_num_rows($result) > 0)
{  
	echo "Student Exist";
}  
else  
{ 


	//count_students 
	$count_query = "SELECT COUNT(*) AS total_students FROM studentinfo";
	$result = mysqli_query($connect, $count_query); 
	$row = mysqli_fetch_assoc($result); 

	$total_number_of_students = 0;
	if($row["total_students"] > 0)
	{  
		$total_number_of_students = $row["total_students"];
		$student_no = get_current_year(). "-" . $total_number_of_students++;

	} 
	else
	{
	
		$student_no = get_current_year(). "-" . $total_number_of_students;
	}


	//(studno, lname, fname, mname, suffix, bdate, age, gender, address, fathername, mothername)
	//'$student_no', '$student_lname', '$student_fname', '$student_mname', '$student_suffix', $student_bday, $student_age, '$student_gender', '$student_address', '$student_fathers_name', '$student_mothers_name'
	
	$insert_student_query = "INSERT INTO studentinfo VALUES ('$student_no', '$student_lname', '$student_fname', '$student_mname', '$student_suffix', '$student_bday', '$student_age', '$student_gender', '$student_address', '$student_fathers_name', '$student_mothers_name', '$b_certificate')";

		$insert_student_query2= "INSERT INTO student_record(grade_level, section, school_year, studno) values('$grade_option','$section', '$school_year','$student_no')";
		$ins2 = mysqli_query($connect, $insert_student_query2);

	if ($student_lname == '' || $student_fname == '' || $student_mname == '' || $student_bday == '' || $student_age == '' || $student_gender == '' || $student_address == '' || $student_fathers_name == '' || $student_mothers_name == '' || $b_certificate == '') 
	{
		echo '<script>alert("All fields are required.")</script>';  
		echo '<script>window.location.replace("student_registration.php?g='. $g_level .'&t='.  $t_type .'")</script>';       
	}
	else 
	{
		$ins = mysqli_query($connect, $insert_student_query);
		if ($ins || $ins2){

			echo '<script>alert("student have been registered!")</script>';  
			echo '<script>window.location.replace("student_registration.php?g='. $g_level .'&t='.  $t_type .'")</script>';  

		} else { 
			echo '<script>alert("An Error Occured!")</script>'; 
			echo '<script>window.location.replace("student_registration.php?g='. $g_level .'&t='.  $t_type .'")</script>';  
		}

	}




	//echo "Add Student";  
}  


