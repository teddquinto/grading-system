<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["teachers_id"]))  
 {  

  
      header("location:login.php?action=login");  
 }  
             @$g_level = $_GET['g'];
             @$t_type= $_GET['t'];
              if ($t_type !== 'advisor') {
    echo '<script>
    alert("ACCESS DENIED! For Advisers only!")
     window.location.href = "teachers_home.php?" </script>';

 }else{

     $g_level2 = "SELECT * FROM g_level";      
           $result_g = mysqli_query($connect, $g_level2); 

           $sections = "SELECT * FROM sections";     
           $result_sec = mysqli_query($connect, $sections);

           $sy = get_current_year() + 1;
            $ssy= get_current_year() ."-". $sy;

 

 $teachers_id = $_SESSION["teachers_id"]; 
 $query = "SELECT distinct glevel_section,type_of_teacher FROM teachers_class where teachers_id LIKE '%$teachers_id%' ";    
           $result = mysqli_query($connect, $query);  


            $find_student="SELECT DISTINCT SR.section,SR.grade_level
                   FROM studentinfo SI, student_record SR, teachers_class TC
                   WHERE SI.studno = SR.studno
                   AND   TC.glevel_section = (SELECT DISTINCT CONCAT(SR.grade_level, '-', SR.section) FROM student_record)
                   AND   TC.teachers_id LIKE '%$teachers_id%'
                   AND TC.glevel_section LIKE '%$g_level%'
                    
                          AND SR.school_year = TC.school_year
                            ORDER by SI.lname ASC ";                      
            $student_result = mysqli_query($connect, $find_student);  



 ?>
<!DOCTYPE html>


<html>
<body>

<div class='wrapper row0'>
 <div id='topbar' class='clear'> 
<nav>
 <ul>
 
   <li><a href="teacher_acc.php"><?php echo $_SESSION['lname'].',',$_SESSION['fname'].' ', $_SESSION['mname'];?></a></li>
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
  
          <ul class="clear">

                  <?php  while ($row= mysqli_fetch_assoc($result)){?>
                   <?php $_SESSION['glevel_section'] = $row['glevel_section'];
                   $_SESSION['t_type'] = $row['type_of_teacher'];?>

                  <li><a href="class_handled.php?g=<?php echo $_SESSION['glevel_section'];?>&t=<?php echo $_SESSION['t_type'];?>"><?php echo $_SESSION['glevel_section']."<br>".str_replace('_', ' ',$_SESSION['t_type']) ;  ?></a></li>
                 <?php }?>
               
                </ul>    
                  
                 



     
    </nav>
  </div>
</div>




<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
    <div class="wrapper row3">
  <div class="rounded">
    <main class="container clear">

       <div class="sidebar one_quarter first"> 
       
        <nav class="sdb_holder">
        <ul>
        <li><a href="class.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">ADD GRADE</a></li>
        <ul>
        <li><a href="report_card_learners_values.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">ADD LEARNER'S VALUES</a>
        </ul>
        <li><a href="report.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">STUDENTS REPORT CARD</a></li>
         <li><a href="class_sched.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">CLASS SCHEDULE</a></li>
          <li><a href="student_registration.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">ADD STUDENT</a></li>
       
        </ul>
        </nav>
        </div>
             <div id="content" class="three_quarter"> 
      <form name="add_student" action="add_student.php?g=<?php echo $g_level; ?>&t=<?php echo $t_type; ?>" method="POST" class="add_student_form">

          
          
          
                      <h1 align="center">
                        Register Students
                      </h1>
                   
           <table border = 1>

            <tr><td ><label>Grade Level And Section: </label></td>
            <?php  while ($row= mysqli_fetch_array($student_result, MYSQLI_ASSOC)){

                      $section=  $row['section']; 
                      $grade_level= $row['grade_level'];
                      ?>                  
                  

               
                 
                  <?php }?>
                   <td> <input type="text" name="grade option" value="<?php echo $section .'-'.$grade_level; ?>" readonly></td>
                 <input type="hidden" name="section" value="<?php echo $section ; ?>" readonly>
                  <input type="hidden" name="grade_option" value="<?php echo $grade_level; ?>" readonly>
             

                    <tr><td ><label>*Last Name: </label></td>
                    <td><input type="text" name="student_lname" pattern="[A-Za-z]{2,10}"></td></tr>
                      
                     <tr><td><label>*First Name: </label></td>
                    <td><input type="text" name="student_fname" pattern="[A-Za-z]+{2,30}"></td></tr>
                      
                     <tr><td><label>*Middle Name: </label></td>
                    <td><input type="text" name="student_mname" pattern="[A-Za-z]{1,10}"></td></tr>
                     
                       <tr><td><label>Suffix (Sr., Jr.): </label></td>
                    <td><input type="text" name="student_suffix"></td></tr>
                  
                    
                    <tr><td><label for="field1">*Birthday: </label></td>
                    <td><input type="text" id="student_bday" name="student_bday" placeholder="YYYY-MM-DD" readonly="true"></td></tr>
                    
                     <tr><td><label>*Age: </label></td>
                    <td><input type="text" id="student_age" name="student_age" readonly="true"></td></tr>
                 
                    <tr><td><label>*Gender: </label></td>
                      <td><select name="student_gender">
                            <option value="male">Male</option>
                            <option value="female"> female</option>
                          </select></td></tr>
                   
                    <tr><td><label>*Address: </label></td>
                    <td><input type="text" name="student_address" ></td></tr>
          
                    
                    
               
                    
                    <tr><td><label>*Fathers' Name: </label></td>
                    <td><input type="text" name="student_fathers_name" pattern="[A-Za-z]+{2,30}"></td></tr>
          
                    <tr><td><label>*Mothers' Name: </label></td>
                    <td><input type="text" name="student_mothers_name" pattern="[A-Za-z]+{2,30}"></td>


                  

                        <tr>
                        <td><label>School Year:</label></td>
                        <td>
                            <input type="text" id="school_year" name="school_year"  value="<?php echo $ssy;?>" >
                        </td></tr>
                   <tr><td colspan="2"> Do Student have Birth Certificate?
                    <input type="radio" name="b_certificate" value="complete">Yes
                    <input type="radio" name="b_certificate" value="incomplete">No
                    </td></tr>
                    

                    

                    
                        
                      <tr><td align= "center" colspan = 2><center><input type="submit" id="save_student" value="Add Student"></center></td></tr>

                    
                  </div>
                  </table>
          
                      
                </form>

</div>
      <div class="clear"></div>
    </main>
  </div>



      
</body>
</html>

         


                

                   <script src="js/jquery.js"></script>
                   
                  <script type="text/javascript" src="js/jquery.mask.js"></script>
                 <script type="text/javascript" src="js/jquery.form.js"></script>
               <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
                <link rel='stylesheet' type='text/css' href='js/bootstrap-datepicker.css'>
               <script type="text/javascript">

    $(document).ready(function () {
        $('#student_bday').datepicker({
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

         $('#student_bday').on('change', '', function(){
            var bday = $(this).val().split("-");
            if(bday != ""){
                var age = calculateAge(bday[1],bday[2],bday[0]);            
                if(age > 3){
                    $("#student_age").val(age);
                }else{
                    $("#student_age,#student_bday").val("");
                    alert("Invalid date of birth.");
                }
            }
          });
       

     });
        </script>
 <?php } ?>   


