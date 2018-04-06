<?php 
require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["teachers_id"]))  
 {  

  
      header("location:teachers_login.php");  
 }  


$code = $_POST['ver_code'];
 $g_level = $_GET['g'];
 $t_type= $_GET['t'];

$query = "SELECT * FROM verification_code ";
$inss = mysqli_query($connect, $query);
while ($row= mysqli_fetch_array($inss, MYSQLI_ASSOC)){
	$ver_code = $row['ver_code'];
}
if ($ver_code == $code) {
	header("location:edit_grade.php?g=$g_level&t=$t_type"); 
}else{
	echo '<script>alert("error code!")</script>';  
	echo '<script>window.location.replace("verify.php?g='. $g_level .'&t='. $t_type .'")</script>'; 
}
?>