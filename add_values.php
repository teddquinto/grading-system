<?php
require "required_files.php";
require_once ("functions/functions.php");


if(!isset($_SESSION["teachers_id"]))  
 {  

  
      header("location:login.php?action=login"); 

 } 



$t=$_GET['t'];
$g=$_GET['g'];
$id= $_GET['i'];
$l = $_GET['l'];
$quarter= $_POST['quarter'];




$bs_id1 = 1;
$bs_id2 = 2;
$bs_id3 = 3;
$bs_id4 = 4;
$bs_id5 = 5;
$bs_id6 = 6;
$bs_id7 = 7;


$val1=$_POST['1'];
$val2=$_POST['2'];
$val3=$_POST['3'];
$val4=$_POST['4'];
$val5=$_POST['5'];
$val6=$_POST['6'];
$val7=$_POST['7'];

//  if(!isset($val1) || !isset($val2) || !isset($val3) || !isset($val4) || !isset($val5) || !isset($val6) || !isset($val7)) {

// 	echo "all Must be selected. ";
// }
$query = "SELECT * FROM student_values WHERE quarter = '$quarter' AND studno = '$id '";
$result = mysqli_query($connect, $query);  
if(mysqli_num_rows($result) > 0)
{  
	//echo "<script> alert('Student Exist') </alert> ";
	header("location:report_form.php?has_error=1&id=$id&t=$t&g=$g&l=$l");

}else{



$query1= ("INSERT  INTO student_values(studno,glevel_section,BS_id,quarter,observance_results) 
	VALUES('$id','$g','$bs_id1','$quarter','$val1') ");
	$insert1 = mysqli_query($connect, $query1);

	$query2= ("INSERT  INTO student_values(studno,glevel_section,BS_id,quarter,observance_results) 
	VALUES('$id','$g','$bs_id2','$quarter','$val2') ");
	$insert2 = mysqli_query($connect, $query2);

	$query3= ("INSERT  INTO student_values(studno,glevel_section,BS_id,quarter,observance_results) 
	VALUES('$id','$g','$bs_id3','$quarter','$val3') ");
	$insert3 = mysqli_query($connect, $query3);

	$query4= ("INSERT  INTO student_values(studno,glevel_section,BS_id,quarter,observance_results) 
	VALUES('$id','$g','$bs_id4','$quarter','$val4') ");
	$insert4 = mysqli_query($connect, $query4);

	$query5= ("INSERT  INTO student_values(studno,glevel_section,BS_id,quarter,observance_results) 
	VALUES('$id','$g','$bs_id5','$quarter','$val5') ");
	$insert5 = mysqli_query($connect, $query5);

	$query6= ("INSERT  INTO student_values(studno,glevel_section,BS_id,quarter,observance_results) 
	VALUES('$id','$g','$bs_id6','$quarter','$val6') ");
	$insert6 = mysqli_query($connect, $query6);

	$query7= ("INSERT  INTO student_values(studno,glevel_section,BS_id,quarter,observance_results) 
	VALUES('$id','$g','$bs_id7','$quarter','$val7') ");
	$insert7 = mysqli_query($connect, $query7);
	
	

	if(!$insert1 || !$insert2 || !$insert3 || !$insert4 || !$insert5 || !$insert6 || !$insert7){
		echo "<script> alert(' error inserting') </script>";
	}else{
		header("location:report_form.php?id=$id&t=$t&g=$g&l=$l");
	}

}

?>