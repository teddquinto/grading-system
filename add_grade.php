<?php 
require "required_files.php";
if(!isset($_SESSION["teachers_id"]))  
 {  
      header("location:login.php?action=login"); 
 } 

 	$grade_level =$_GET['d'];
 	$t_type= $_GET['t'];


	





$grade_by_period_arr = $_POST;
$arr = array();
foreach ($grade_by_period_arr as $key => $value) {
	if (is_array($value) && $key != "check") {
		for ($i=0; $i < count($value); $i++) {
			if (trim($value[$i]) != "") {
				$arr[$i][]= $value[$i];
			}
		}
	}
}
if (isset($_POST['add_grade'])) {

$select=$_POST['check'];
$glevel_section = $grade_level;
$subject=$_POST['subjects'];
 $grades_row = array_values($arr);
//$grades = $_POST['grades'];
$grading_period= $_POST['grading_period'];


foreach ($grades_row as $i => $grd) {


$check_query= "SELECT * from student_gradee WHERE studno='$select[$i]' AND subjects='$subject' AND 
				grading_period = '$grading_period' AND glevel_section ='$glevel_section' ";
				$result= mysqli_query($connect,$check_query);
				if(mysqli_num_rows($result) > 0) {  
	echo "<script> 
	alert('Student already has grade') ;
	
	
		window.location.href = 'class.php?g=$grade_level&t=$t_type';	
		</script>";
}  
else  
{ 

// 	echo "<pre>";
// print_r($grd[$i][0]);	
// echo "</pre>";
	if (count($select) <= 0) {
	 	header("location:class.php?has_error=1&t=$t_type&g=$grade_level");
		
	} else {

	//$gen_ave = ($grd[0] + $grd[1] + $grd[2] + $grd[3]) / 4;

		// $query = "INSERT INTO student_grade(`studno`,`glevel_section`,`subject`,`1st_periodical_test`) VALUES('$select[$i]','$glevel_section','$subject','$grd[0][$i]')" or die(mysqli_error());
		$query="INSERT INTO student_gradee(`studno`,`glevel_section`,`subjects`,`grades`,`grading_period`) 
				VALUES('$select[$i]','$glevel_section','$subject','$grd[0][$i]','$grading_period')" or die(mysqli_error());;

		$ins = mysqli_query($connect, $query);

		if(!$ins)
		{  
			echo '<script> alert("error") </script>';
			
		}else{
			
			 header("location:class.php?g=$grade_level&t=$t_type");
		}

	}

	
	}
}
} else{
	 header("location:class.php?g=$grade_level&t=$t_type");

}
?>
