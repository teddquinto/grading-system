
<?php


require "required_files.php";
  

   if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  

 }  


  		    $sy = get_current_year() + 1;
            $ssy= get_current_year()  ."-". $sy; 


            $update_query = "UPDATE teachers_class set school_year= '$ssy' ";

            $result = mysqli_query($connect, $update_query);  

 	if ($result == 'true') {

 	echo "<script>	window.location.href = 'view_teachers.php '; </script>";

 	}else{

 		echo "<script> alert('error') </script>";
 	}


?>
