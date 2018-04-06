<?php

require "required_files.php";
  

   if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  

 }  


 	$g_level= $_GET['g'];
 	$t_id = $_GET['t'];
 	$type = $_GET['type'];


 	$delete_query = " DELETE FROM teachers_class WHERE teachers_id = '$t_id' AND glevel_section = '$g_level'
 					  AND type_of_teacher = '$type' ";

 	$result = mysqli_query($connect, $delete_query);  

 	if ($result == 'true') {

 	echo "<script>	window.location.href = 'teachersinfo.php?id=$t_id ';	</script>";

 	}else{

 		echo "<script> alert('error') </script>";
 	}






?>