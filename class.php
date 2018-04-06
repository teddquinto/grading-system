<?php

require_once "required_files.php";
require_once ("functions/functions.php");


if(!isset($_SESSION["teachers_id"]))  
 {  

  
      header("location:login.php?action=login"); 

 } 
 $teachers_id = $_SESSION["teachers_id"]; 
 $grade_level = $_GET["g"];
  $t_type = $_GET["t"]; 
 



           $query = "SELECT distinct glevel_section,type_of_teacher FROM teachers_class where teachers_id LIKE '%$teachers_id%' ";
			
           $result = mysqli_query($connect, $query);  




            $search_subject = "SELECT distinct subjects FROM teachers_class where teachers_id LIKE '%$teachers_id%' AND 
                       glevel_section LIKE '%$grade_level%'";
      
           $subject_result = mysqli_query($connect, $search_subject);  


         
                  $query1="SELECT DISTINCT  SI.studno, SI.lname, SI.fname, SI.mname,SR.school_year
                            FROM studentinfo SI, student_record SR, teachers_class TC
                            WHERE SI.studno = SR.studno
                            AND   TC.glevel_section = (SELECT DISTINCT CONCAT(SR.grade_level, '-', SR.section) FROM student_record)
                          AND   TC.teachers_id LIKE '%$teachers_id%'
                          AND TC.glevel_section LIKE '%$grade_level%'
                          
                            AND SR.school_year = TC.school_year
                           ORDER by SI.lname ASC ";
                                                       
                              
           $result1 = mysqli_query($connect, $query1);  

?>  

  

<!DOCTYPE html>  
  <html>
 <head>




 <link rel="stylesheet" type="text/css" href="js/bootstrap.css">
 <style type="text/css">
    #table_grades{
      width: 100%;
    }
 </style>
 <script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>




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

                  <li><a href="class_handled.php?g=<?php echo $_SESSION['glevel_section'];?>&t=<?php echo $_SESSION['t_type'];?>"><?php echo $_SESSION['glevel_section'];  ?></a></li>
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
        <li><a href="class.php?g=<?php echo $grade_level;?>&t=<?php echo $t_type;?>">ADD GRADE</a></li>
        <ul>
        <li><a href="verify.php?g=<?php echo $grade_level;?>&t=<?php echo $t_type;?>">EDIT GRADE</a></li>
        </ul>
        <ul>
        <li><a href="report_card_learners_values.php?g=<?php echo $grade_level;?>&t=<?php echo $t_type;?>">ADD LEARNER'S VALUES</a>
        </ul>
        <li><a href="report.php?g=<?php echo $grade_level;?>&t=<?php echo $t_type;?>">STUDENTS REPORT CARD</a></li>
         <li><a href="class_sched.php?g=<?php echo $grade_level;?>&t=<?php echo $t_type;?>">CLASS SCHEDULE</a></li>
           <li><a href="verify2.php?g=<?php echo $grade_level;?>&t=<?php echo $t_type;?>">ADD STUDENT</a></li>
        </ul>
        </nav>
        </div>



                  <div id="content" class="three_quarter"> 
                  <form action="add_grade.php?d=<?php echo $grade_level; ?>&t=<?php echo $t_type; ?>" method="POST">
                    <div id="class">
                    
                 <table id="table_grades" >
                  <tr><th >CLass</th><th>TYPE:</th><th>subjects</th><th>Grading Period</th></tr>
                  <tr>
                   <td><?php echo $grade_level; ?></td>
                 
                  <td><?php echo str_replace('_', ' ', $t_type);?></td>
                  
                 
                 
                      <td>
                         <select class="subjects" id="subjects" name="subjects">
                 <?php  while ($row= mysqli_fetch_assoc($subject_result)){?>
                 <?php $subjects = $row['subjects'];?>
                   <option values="<?php echo $subjects; ?>"> 
                   <?php echo $subjects; ?></option>
                   
                   <?php } ?>
                     </select>
                     </td>
                     <td>
                       <select name="grading_period" >
                         <option value="1"> 1st grading Period</option>
                         <option value="2"> 2nd grading Period</option>
                         <option value="3"> 3rd grading Period</option>
                         <option value="4"> 4th grading Period</option>
                       </select>
                     </td>
                     </tr>
                    </table>
                 <table>
                  <tr><td>
                    <input name="all_check" id="all_check" type="checkbox" >
                 
                  </td><td><h3>lastname</h3></td><td><h3>firstname</h3></td><td><h3>Middlename</h3></td>
                  <td  width="10">input grade</td>
                  <!-- <td>2nd grading</td><td>3rd grading</td><td>4th grading</td> --></tr>      
                  <?php  while ($row= mysqli_fetch_array($result1, MYSQLI_ASSOC)){
                    $sy= $row['school_year'] ?>
                  <tr>

                  <td><input name="check[]"
                   type="checkbox" class="optionsCheckbox" value="<?php echo $row['studno']; ?>"> </td>
                  <!-- <input type="hidden" name="school_year[]" value="<?php echo $sy; ?>"> -->
                  <td> <?php echo $row['lname']; ?></td>
                  <td> <?php echo $row['fname']; ?></td>
                  <td> <?php echo $row['mname']; ?></td>
                 
                  <td><input type="text" name="grades[]" id ="grades" style="width: 60px;" pattern="[0-9]{2}"> </td>      
                 <!--  <td> <input type="text" name="2nd_periodical_exam[]" id ="2Periodical_design" style="width: 60px;" >    </td>
                  <td><input type="text" name="3rd_periodical_exam[]" id ="3Periodical_design" style="width: 60px;"></td>
                  <td> <input type="text" name="4th_periodical_exam[]" id ="4Periodical_design" style="width: 60px;"></td> -->

                   </tr>
                 <?php $_SESSION['studno']= $row['studno']; ?>
                  <?php }?>
                  </div>
                </table>
                      
                      <input type="submit" id="add_grade" name="add_grade" value="submit">

             </form>
                  
             </div>

            
          


      <div class="clear"></div>
    </main>
  </div>
  </div>

                  <div class="wrapper row3">
                  <div class="rounded">
                    <main class="container clear"> 

                           
           
                    

      <div class="clear"></div>
    </main> 
  </div>
  </div>
                  
 </body>  
</html>  
               
  <script type="text/javascript">
    var has_error = "<?php echo isset($_GET["has_error"]); ?>";

    if (has_error == 1) {

      var r = confirm("check atleast one.");
      if (r == true) {
        window.location.href = "#";
      } else {
        window.location.href = "#";
    }
    }

var select_all = document.getElementById("all_check"); //select all checkbox
var checkboxes = document.getElementsByClassName("optionsCheckbox"); //checkbox items

//select all checkboxes
select_all.addEventListener("change", function(e){
    for (i = 0; i < checkboxes.length; i++) { 
        checkboxes[i].checked = select_all.checked;
    }
});


for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].addEventListener('change', function(e){ //".checkbox" change 
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if(this.checked == false){
            select_all.checked = false;
        }
        //check "select all" if all checkbox items are checked
        if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
            select_all.checked = true;
        }
    });
}


  </script>                         
  



