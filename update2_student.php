<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  
 }  
 
 $studno=$_GET['id'];

      $student= "SELECT * FROM studentinfo WHERE studno='$studno' ";
      $result= mysqli_query($connect, $student);
      while ($studentinfo = mysqli_fetch_assoc($result)) {
          
          $lname = $studentinfo['lname'];
          $fname = $studentinfo['fname'];
          $mname = $studentinfo['mname'];
          $suffix = $studentinfo['suffix'];
          $bdate = $studentinfo['bdate'];
          $age = $studentinfo['age'];
          $gender = $studentinfo['gender'];
          $address = $studentinfo['address'];
          $fathername = $studentinfo['fathername'];
          $mothername = $studentinfo['mothername'];
          $b_certificate = $studentinfo['b_certificate'];

      }


 ?>
<!DOCTYPE html>


<html>
<body>

<div class='wrapper row0'>
 <div id='topbar' class='clear'> 
<nav>
 <ul>
 
  <li> <?php echo $_SESSION['username'];?></li>
 <li><a href='logout.php'>logout</a></li>
 </ul>
 </nav>
 </div>
</div>


<?php
//header or layout
 echo layout();
?>






<div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="clear"> 
   <?php
  //navigationbar for admin
   echo navigation();
  ?>
     
    </nav>
  </div>
</div>


<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
     <h1><float='left'> STUDENT INFORMATION:</h1>
      <div class="sidebar one_quarter first">
      <input type="hidden" id="studno" value="<?php echo $studno;?>" >
      <label>Lastname:</label>
      <input type="text" pattern="[A-Za-z]" name="lname" id="lname" value="<?php echo $lname; ?>">
      <label>Firstname:</label>
      <input type="text" pattern="[A-Za-z]" name="fname" id="fname" value="<?php echo $fname; ?>">
      <label>Middlename:</label>
      <input type="text" pattern="[A-Za-z]" name="mname" id="mname" value="<?php echo $mname; ?>">
      <label>Suffix:</label>
      <input type="text" id="suffix" value="<?php echo $suffix; ?>">


      </div>

          <div class="sidebar one_quarter">
          <label>Birthday:</label>
          <input type="text" id="bdate" name="bdate" readonly="true"" value="<?php echo $bdate; ?>">
          <label>Age:</label>
          <input type="text" id="age" name="age" value="<?php echo $age; ?>">
          <label>Gender:</label>
          Male:
          <input type="radio" name="gender" id="gender" value="male" <?php if($gender == 'male' ){echo 'checked' ;} ?>>
          Female:
          <input type="radio" name="gender" id="gender" value="female" <?php if($gender == 'female' ){echo 'checked' ;} ?>>

          </div>


      <div class="sidebar one_quarter">
      <label>Address:</label>
      <input type="text" id="address" value="<?php echo $address; ?>"> 
      <label>father's Name:</label>
      <input type="text" id="fathername" value="<?php echo $fathername; ?>"> 
      <label>Mother's Name:</label>
      <input type="text" id="mothername" value="<?php echo $mothername; ?>"> 

      </div>  

           <div class="sidebar one_quarter">
           <label>Birth Certificate:</label>
          YES:
          <input type="radio" name="b_certificate" id="b_certificate" value="complete" <?php if($b_certificate == 'complete' ){echo 'checked' ;} ?>>
          NO:
          <input type="radio" name="b_certificate" id="b_certificate" value="incomplete" <?php if($b_certificate == 'incomplete' ){echo 'checked' ;} ?>>
          <br><br>
          <!-- <input type="submit" id="update" value="Update" > -->
          <button id="Update_student">Update</button>
           </div>


      <div class="clear"></div>
    </main>
  </div>
 <script src="js/jquery.js"></script>
 <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<link rel='stylesheet' type='text/css' href='js/bootstrap-datepicker.css'>

<script type="text/javascript">
  

   $(document).ready(function () {
        $('#bdate').datepicker({
            'format': 'yyyy-m-d',
            'autoclose': true
        });
         function calculateAge(birthMonth, birthDay, birthYear)
        {
          todayDate = new Date();
          todayYear = todayDate.getFullYear();
          todayMonth = todayDate.getMonth();
          todayDay = todayDate.getDate();
          age = todayYear - birthYear;

          if (todayMonth < birthMonth - 1)
          {
            age--;
          }

          if (birthMonth - 1 == todayMonth && todayDay < birthDay)
          {
            age--;
          }
          return age;
        }

         $('#bdate').on('change', '', function(){
            var bday = $(this).val().split("-");
            if(bday != ""){
                var age = calculateAge(bday[1],bday[2],bday[0]);            
                if(age > 3){
                    $("#age").val(age);
                }else{
                    $("#age,#bdate").val("");
                    alert("Invalid date of birth.");
                }
            }
          });
        });


$(document).ready(function(){

  $(document).on("click", "#Update_student", function(){

       var student_number = $("#studno").val();
       var last_name = $("#lname").val();
       var fname = $("#fname").val();
       var mname = $("#mname").val();
       var suffix = $("#suffix").val();
       var bdate = $("#bdate").val();
       var age = $("#age").val();
       var gender = $("#gender:checked").val();
       var address = $("#address").val();
       var fathername = $("#fathername").val();
       var mothername = $("#mothername").val();  
       var b_certificate = $("#b_certificate:checked").val();  
        

      // alert(b_certificate);


     $.ajax({
       type   : 'POST', // define the type of HTTP verb we want to use (POST for our form)
       url   : 'ajax_update_student.php', // the url where we want to POST
       data   : '&student_number='+student_number+ '&last_name='+last_name+ '&fname='+fname+'&mname='+mname+'&suffix='+suffix+'&bdate='+bdate+'&age='+age+'&gender='+gender+'&address='+address+'&fathername='+fathername+'&mothername='+mothername+'&b_certificate='+b_certificate, // our data object
       dataType : 'json', 
       encode     : true,
       })
         .done(function(data) {

            


           if(data.result === true){
           alert('student ' + student_number + ' has been updated');
         } else {
           alert("error");
         }

     });


   });
   });

</script>