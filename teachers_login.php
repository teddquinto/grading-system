<?php   
  require "required_files.php";
  require_once ("functions/functions.php");
  
  
 if(isset($_POST["teacher_login"]))  
 { 
   if(empty($_POST["teachers_id"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  

      else  
      {  
           $teachers_id = mysqli_real_escape_string($connect, $_POST["teachers_id"]);  
           $password = mysqli_real_escape_string($connect, $_POST["pass"]);

            if(isset($_SESSION['attempts'])){
          $attempts = $_SESSION['attempts'];
        }else{
          $attempts = 0;
        }

        if(isset($_SESSION['last_login'])){
          $last_login = $_SESSION['last_login'];
        }else{
          $last_login = null;
        } 

    $query = "SELECT * FROM teachersinfo WHERE teachers_id = '$teachers_id' AND password = '$password'";
      
           $result = mysqli_query($connect, $query);

           if ($result){
            $totalres = mysqli_num_rows($result);
              if($attempts  >=  3){

             
              if(time() - $last_login < 1*60  ){
                echo "<script>alert('You reached the maximum attempts please wait for 1 minute to login again')</script>";
                  
  
              }else{
                $attempts = 0;
                $last_login = null;
                $_SESSION['attempts'] = 0;
                $_SESSION['last_login'] = time();
             if($totalres >= 1)
            {
                if($totalres >= 1){
                    $row = mysqli_fetch_assoc($result);
                }

                 $_SESSION['teachers_id'] = $teachers_id;
                  $_SESSION['lname'] = $row['teachers_lname'];
                   $_SESSION['fname'] = $row['teachers_fname'];
                    $_SESSION['mname'] = $row['teachers_mname'];
                     unset($_SESSION['attempts']);
                    unset($_SESSION['last_login']);
                    header("location:teachers_home.php?id='$teachers_id'");
           }else{
             $attempts++;
                       $_SESSION['attempts'] = $attempts;
                       if($attempts <3 ){
                          $_SESSION['last_login'] = time();
                     }
           }
             echo '<script>alert("wrong user Details")</script>';
           }
           }else{
            if($totalres >= 1)
            {
                if($totalres >= 1){
                    $row = mysqli_fetch_assoc($result);
                }

                 $_SESSION['teachers_id'] = $teachers_id;
                  $_SESSION['lname'] = $row['teachers_lname'];
                   $_SESSION['fname'] = $row['teachers_fname'];
                    $_SESSION['mname'] = $row['teachers_mname'];
                     unset($_SESSION['attempts']);
                    unset($_SESSION['last_login']);
                    header("location:teachers_home.php?id='$teachers_id'");
           }else{
             $attempts++;
                       $_SESSION['attempts'] = $attempts;
                       if($attempts <3 ){
                          $_SESSION['last_login'] = time();
                     }
           }
             echo '<script>alert("wrong user Details")</script>';
           }

           
         }

          

     }  
   }
   ?>
   <?php
//header or layout
 echo layout();
?>
<form action='' method='POST' class='box login'>

 <br>
 <center>
<label><h3>Login As teacher</h3></label>
<label>teachers ID:</label><input type='text' name='teachers_id' class='box input'>

<label>Password:</label>

  <input type='password' name='pass' class='box input' >

<br>
               
 <input type='submit' name='teacher_login' class='btnLogin' align= 'center'>
		</center>