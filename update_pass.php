<?php

  require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["teachers_id"]))  
 {  

  
      header("location:login.php?action=login");  
 }  



if (isset($_POST['send'])) {

  $teachers_id = $_SESSION["teachers_id"];

 $passkey = $_POST['pass'];
 

  $query = "UPDATE teachersinfo set password = '$passkey' WHERE teachers_id = '$teachers_id' ";

  if (mysqli_query($connect, $query)){
      echo "<script>alert('Password change');
        window.location.href = 'teacher_acc.php '; 
          </script>";  

    }

  else{
  
    echo '<script>alert("erro inputs")  </script>'; 
    }
}else{
 header("location:teacher_acc.php");
}
       
 ?>
 