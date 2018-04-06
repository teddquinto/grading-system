<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["teachers_id"]))  
 {  

  
      header("location:login.php?action=login");  
 }  

 $grade_level = $_SESSION["glevel_section"]; 
 $teachers_id = $_SESSION["teachers_id"]; 
 $g_level = $_GET['g'];
 $t_type= $_GET['t'];
 $name = $_GET['l'];
 $query = "SELECT distinct glevel_section,type_of_teacher FROM teachers_class where teachers_id LIKE '%$teachers_id%' ";    
           $result = mysqli_query($connect, $query);  


           $find_subject = "SELECT distinct subjects FROM teachers_class where teachers_id LIKE '%$teachers_id%' ";     
           $subject_result = mysqli_query($connect, $find_subject);  


         
                  $find_student="SELECT DISTINCT  SI.studno, SI.lname, SI.fname, SI.mname
                   FROM studentinfo SI, student_record SR, teachers_class TC
                   WHERE SI.studno = SR.studno
                   AND   TC.glevel_section = (SELECT DISTINCT CONCAT(SR.grade_level, '-', SR.section) FROM student_record)
                   AND   TC.teachers_id LIKE '%$teachers_id%'
                   AND TC.glevel_section LIKE '%$g_level%'
                           ";                      
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

                  <li><a href="class_handled.php?g=<?php echo $_SESSION['glevel_section'];?>&t=<?php echo $_SESSION['t_type'];?>"><?php echo $_SESSION['glevel_section'];  ?></a></li>
                 <?php }?>
               
                </ul>    
                  
                </div>



     
    </nav>
  </div>
</div>



<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear">

        <div class="sidebar one_quarter first"> 
       
        <nav class="sdb_holder">
        <ul>
        <li><a href="class.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">ADD GRADE</a></li>
        <ul>
        <li><a href="edit_grade.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">EDIT GRADE</a></li>
        </ul>
        <ul>
        <li><a href="report_card_learners_values.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">ADD LEARNER'S VALUES</a>
        </ul>
        <li><a href="report.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">STUDENTS REPORT CARD</a></li>
         <li><a href="class_sched.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">CLASS SCHEDULE</a></li>
        </ul>
        </nav>
        </div>

               <div id="content" class="three_quarter"> 
                 <div class="sidebar one_quarter first">
                <?php $id = $_GET['id']; ?>
                <input type="hidden" id="studno" value="<?php echo $id; ?>"  >
                <label>Students:<?php echo $name; ?></label>
                <br>
                <select class="subjects" id="subjects" name="subjects" >
                 <?php  while ($row= mysqli_fetch_assoc($subject_result)){?>
                 <?php $subjects = $row['subjects'];?>
                   <option values="<?php echo $subjects; ?>"> 
                   <?php echo $subjects; ?></option>                 
                   <?php } ?>

                     </select>

                     <br>
                       <select name="grading_period" id="grading_period">
                         <option value="1"> 1st grading Period</option>
                         <option value="2"> 2nd grading Period</option>
                         <option value="3"> 3rd grading Period</option>
                         <option value="4"> 4th grading Period</option>
                       </select>
                    
                     <br>
                      <button id="search">Search </button>
                  
                     
                     </div>
                     <div class="sidebar one_quarter">
                     <div class="gradess">

                     </div>
                     <br>
                      <button id="Update_grade">Update Grade</button>
                    <!--  <br>
                     
                     </div>
                      <div class="sidebar one_quarter">
                      <label>First Grading</label>
                     <input type="text" name="first" id ="grades" style="width: 60px;"> 
                     <br>
                     <label>Second Grading</label>
                     <input type="text" name="second" id ="grades" style="width: 60px;"> 
                     <br>
                     </div>
                      <div class="sidebar one_quarter">
                     <label>Third Grading</label>
                     <input type="text" name="third" id ="grades" style="width: 60px;"> 
                     <br>
                     <label>Fourth Grading</label>
                     <input type="text" name="fourth" id ="grades" style="width: 60px;"> 
                     </div>
                
               

                -->

                  </div>

                


    </main>
  </div>
</div>


      
</body>
</html>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
  //$(document).ready(function(){


   // $(document).on("input", "#student_number", function(){
  $(document).on("click", "button#search", function(){
            //$("#search_student").click(function(){
      var studno = $("#studno").val();
      var subjects = $("#subjects").val(); 
      var grading_period = $("#grading_period").val();


      $.ajax({
        type   : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url   : 'ajax_search_grade.php', // the url where we want to POST
        data   : '&studno='+studno+'&subjects='+subjects+'&grading_period='+grading_period, // our data object
        dataType : 'json', 
        encode     : true,
        })
          .done(function(data) {

            var grade = data.result["grades"];
       
           $('.gradess').html(" <input type='text' pattern ='[0-9]{2}' name='first' id ='grades' style='width: 60px;' value='"+grade+"' >" );

      });
    });
  
$(document).on("click", "button#Update_grade", function(){
         var r = confirm("Are you sure you want to edit grade?");  

      var studno = $("#studno").val();
      var subjects = $("#subjects").val(); 
      var grading_period = $("#grading_period").val();
      var grades = $("#grades").val();
 if (r == true) {

      $.ajax({
        type   : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url   : 'ajax_update_grade.php', // the url where we want to POST
        data   : '&studno='+studno+'&subjects='+subjects+'&grading_period='+grading_period+'&grades='+grades, // our data object
        dataType : 'json', 
        encode     : true,
        })
          .done(function(data) {

            if(data.result === true){
            alert('student ' + studno + ' grade for '+ subjects +' has been updated');
          } else {
            alert("error");
          }


      });
           } else {
            
           }
    });



    </script>