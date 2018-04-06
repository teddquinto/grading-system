<?php

require "required_files.php";
require_once ("functions/functions.php");


if(!isset($_SESSION["teachers_id"]))  
 {  

  
      header("location:login.php?action=login"); 

 } 

  $g_level = $_GET['g'];
 $t_type= $_GET['t'];
 if ($t_type !== 'advisor') {
   
   echo '<script> window.location.href = "report_card_learners_values.php" </script>';

 }else{
 $teachers_id = $_SESSION["teachers_id"]; 
 $grade_level = $_SESSION["glevel_section"]; 



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
 <head>




 <link rel="stylesheet" type="text/css" href="js/bootstrap.css">
 <script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>




<div class='wrapper row0'>
 <div id='topbar' class='clear'> 
<nav>
 <ul>
 
  <li><?php echo $_SESSION['lname'].',',$_SESSION['fname'].' ', $_SESSION['mname'];?></li>
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
   echo navigation_teacher();
  ?>
     
    </nav>
  </div>
</div>
 

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
 
            <div class="container">                                          
              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Class Handled
                <span class="caret"></span></button>
                
               <ul class="dropdown-menu">
                  <?php  while ($row= mysqli_fetch_assoc($result)){?>
                   <?php $_SESSION['glevel_section'] = $row['glevel_section'];
                   $_SESSION['t_type'] = $row['type_of_teacher'];?>

                  <li><a href="report_values.php?g=<?php echo $_SESSION['glevel_section'];?>&t=<?php echo $_SESSION['t_type'];?>"><?php echo $_SESSION['glevel_section'];  ?></a></li>
                 <?php }?>
               
                </ul> 
              </div>
            
      <div class="clear"></div>
    </main>
  </div>
  </div>
                  <div class="wrapper row3">
                  <div class="rounded">
                    <main class="container clear"> 

                           

                    <div id="class">
                    <form>
                 <table>
                  <tr><th >CLass</th></tr>
                  <tr>
                   <td><?php echo $grade_level; ?></td>
                 <?php  while ($row1= mysqli_fetch_array($result, MYSQLI_ASSOC)){?>
                 <td>type: <?php echo $row['type_of_teacher'];?></td><td></td>
                 <?php }?>
                      
                 </tr> 
                 
                  <tr><td><h3> student Number  </h3></td><td><h3> lastname </h3></td><td><h3> firstnmae </h3></td><td><h3> Middlename </h3></td>
                  </tr>      
                  <?php  while ($row= mysqli_fetch_array($student_result, MYSQLI_ASSOC)){?>
                  
                  <tr><td><a href="report_form.php?id='<?php echo $row['studno']; ?>'"> <?php echo $row['studno']; ?><a></td>
                  <td> <?php echo $row['lname']; ?></td>
                  <td> <?php echo $row['fname']; ?></td>
                  <td> <?php echo $row['mname']; ?></td>
                 
                  </tr>
                 <?php $_SESSION['studno']= $row['studno']; ?>
                  <?php }?>
                  </div>
                </table>
       
             </form>
                  
                    


      <div class="clear"></div>
    </main>
  </div>
  </div>
                  

               
                           
      </body>  
 </html>   



<?php } ?>