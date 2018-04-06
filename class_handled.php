<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["teachers_id"]))  
 {  

  
      header("location:teachers_login.php");  
 }  


 $g_level = $_GET['g'];
 $t_type= $_GET['t'];
 

 $teachers_id = $_SESSION["teachers_id"]; 
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
 <li><a href='logout2.php'>logout</a></li>
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

       <div class="sidebar one_quarter first"> 
       
        <nav class="sdb_holder">
        <ul>
        <li><a href="class.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">ADD GRADE</a></li>
        <ul>
        <li><a href="report_card_learners_values.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">ADD LEARNER'S VALUES</a>
        </ul>
        <li><a href="report.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">STUDENTS REPORT CARD</a></li>
         <li><a href="class_sched.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">CLASS SCHEDULE</a></li>
          <li><a href="verify2.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">ADD STUDENT</a></li>
       
        </ul>
        </nav>
        </div>

               <div id="content" class="three_quarter"> 
                 <div id="class">
                  <form>
                 <table>
                  <tr><th colspan=4>CLass</th></tr>
                  <tr>
                   <td><?php echo $g_level; ?></td>
                 <?php  while ($row1= mysqli_fetch_array($result, MYSQLI_ASSOC)){?>
                 <td>type: <?php echo $row['type_of_teacher'];?></td><td></td>
                 <?php }?>                    
                 </tr>                 
                  <tr><td><h3> student Number  </h3></td><td><h3> lastname </h3></td><td><h3> firstnmae </h3></td><td><h3> Middlename </h3></td>
                  </tr>      
                  <?php  while ($row= mysqli_fetch_array($student_result, MYSQLI_ASSOC)){?>                  
                  <tr>
                  <td><?php echo $row['studno']; ?> </td>
                  <td> <?php echo $row['lname']; ?> </td>
                  <td> <?php echo $row['fname']; ?> </td>
                  <td> <?php echo $row['mname']; ?> </td>                
                  </tr>
                  <?php $_SESSION['studno']= $row['studno']; ?>
                  <?php }?>                
                  </table>
                  </form>
                  </div>

                


    </main>
  </div>
</div>


      
</body>
</html>
