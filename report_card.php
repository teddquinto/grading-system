<?php

require_once "required_files.php";
require_once ("functions/functions.php");


if(!isset($_SESSION["teachers_id"]))  
 {  

  
      header("location:login.php?action=login"); 

 } 

 $studno = $_GET['id'];  
 $t_type = $_GET['t'];
  $g_level = $_GET['g'];
 $sy= $_GET['sy']; 
 if ($t_type !== 'advisor') {
    echo '<script>
    alert("ACCESS DENIED! For Advisers only!")
     window.location.href = "teachers_home.php?" </script>';

 }else{

 $teachers_id = $_SESSION["teachers_id"]; 




$query = "SELECT distinct glevel_section,type_of_teacher FROM teachers_class where teachers_id LIKE '%$teachers_id%' ";    
           $result = mysqli_query($connect, $query);  



// $grade= $_GET['g'];


        //     $find_subject = "SELECT distinct subjects FROM teachers_class where teachers_id LIKE '%$teachers_id%' 
        //     AND glevel_section = '$g_level'";     
        //    $subject_result = mysqli_query($connect, $find_subject);  
        //         while($row= mysqli_fetch_array($subject_result, MYSQLI_ASSOC)){
           
        //       $subjects[] = $row['subjects'];
        // }


         
                  $find_student="SELECT DISTINCT  SI.studno, SI.lname, SI.fname, SI.mname,SR.school_year
                            FROM studentinfo SI, student_record SR, teachers_class TC
                            WHERE SI.studno = SR.studno
                            AND   TC.glevel_section = (SELECT DISTINCT CONCAT(SR.grade_level, '-', SR.section) FROM student_record)
                            AND   TC.teachers_id LIKE '%$teachers_id%'
                          AND TC.glevel_section LIKE '%$g_level%'
                           AND SR.school_year = TC.school_year
                           ORDER by SI.lname ASC  ";
                                                       
                              
           $student_result = mysqli_query($connect, $find_student);  

        // $find_student_grade = "SELECT subject,1st_periodical_test,2nd_periodical_test,
        // 3rd_periodical_test,4th_periodical_test,gen_avee ,IF(gen_avee >= 75, 'PASS', 'FAIL') as status 
        //  FROM student_grade WHERE studno = '$studno' AND glevel_section = '$g_level' ";
        // $student_grade_result = mysqli_query($connect, $find_student_grade);
        // while($row= mysqli_fetch_array($student_grade_result, MYSQLI_ASSOC)){
            
        //   $sub[] = $row['subject'];
        //   $first[] = $row['1st_periodical_test'];
        //   $sec[] = $row['2nd_periodical_test'];
        //   $third[] = $row['3rd_periodical_test'];
        //   $fourth[] = $row['4th_periodical_test'];
        //   $gen_ave[] = $row['gen_avee'];
        //   $status[] = $row['status'];

           $find_subjects = "SELECT DISTINCT subjects
          FROM teachers_class WHERE glevel_section = '$g_level'";
         $student_subjects = mysqli_query($connect, $find_subjects);
         while($row= mysqli_fetch_array($student_subjects, MYSQLI_ASSOC)){
          
          $subjects[] = $row['subjects'];
          

        }
       


?>  

  

<!DOCTYPE html>  
  <html>
 <head>




 <link rel="stylesheet" type="text/css" href="js/bootstrap.css">
 <style type="text/css">
   table, tr, td{
    border: 1px solid black !important;
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

          <ul >

                  <?php  while ($row= mysqli_fetch_assoc($result)){ ?>
                   <?php $_SESSION['glevel_section'] = $row['glevel_section'];
                   $_SESSION['t_type'] = $row['type_of_teacher'];?>
                  <li><a href="class_handled.php?g=<?php echo $_SESSION['glevel_section'];?>&t=<?php echo $_SESSION['t_type'];?>"><?php echo $_SESSION['glevel_section'];  ?></a></li>
                 <?php } ?>
               
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
          <li><a href="class.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">ADD GRADE
          </a></li>
          <ul>
          <li><a href="report_card_learners_values.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">ADD LEARNER'S VALUES
          </a></li>
          </ul>
          <li><a href="report.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">STUDENTS REPORT CARD
          </a></li>
         
          </ul>
          </nav>
          </div>
                 <div id="content" class="three_quarter"> 
                 <div id="class">
                  <form>
                 <table>
                  <tr><th>CLass</th><th colspan="3">Type</th></tr>
                  <tr>
                   <td><?php echo $g_level; ?></td>
                
                 <td colspan="3"><?php echo $t_type;?></td>
                                    
                 </tr>                 
                  <tr><td><h3> lastname </h3></td><td><h3> firstname </h3></td><td><h3> Middlename </h3></td>
                  <td><h3> report card  </h3></td></tr>      
                  <?php  while ($row= mysqli_fetch_array($student_result, MYSQLI_ASSOC)){?>                  
                  <tr>
                 <?php 
                    $lname =$row['lname'];
                    $fname =$row['fname'];
                    $mname =$row['mname'];?>  
                 
                  <td> <?php echo $row['lname']; ?> </td>
                  <td> <?php echo $row['fname']; ?> </td>
                  <td> <?php echo $row['mname']; ?> </td> 
                   <td><a href="report_card.php?l=<?php echo $lname." ".$fname." ".$mname; ?>&id=<?php echo $row['studno'];?>&t=<?php echo $t_type;?>&g=<?php echo $g_level;?>&sy=<?php echo $row['school_year'];?>"><center><img src="images/reportcard.png" style="width: 70px; height: 40px;" ></center></a> </td>               
                  </tr>
                  <?php $_SESSION['studno']= $row['studno']; ?>
                  <?php }?>            
                  </table>
                  </form>
                  </div>
                   </div>

      <div class="clear"></div>
    </main>
  </div>
  </div>

<?php $lname2 =$_GET['l']?>
<div class="wrapper row3">
<div class="rounded">
<main class="container clear"> 

    <?php if(!empty($subjects)){ ?>
      <div name="student_grade_info" id="student_grade_info">

      <table style=" border: 1px solid black !important;">
      <tr style=" border: 1px solid black !important;"><td colspan='7' style=" border: 1px solid black !important;">
      <center><h1>REPORT ON LEARNER'S PROGRESS AND  ACHIEVMENTS</h1></center></td></tr>
      <tr style=" border: 1px solid black !important;" > <td colspan='7'>Student Name: <?php echo $lname2; ?></td></tr>
      <tr style=" border: 1px solid black !important;">
      <td style=" border: 1px solid black !important;" rowspan="2"><h2>  Learning Areas </h2></td>
      <td style=" border: 1px solid black !important;" colspan="4"><h2>  Periodical Rating </h2></td>
      <td style=" border: 1px solid black !important;" rowspan="2"><h2>  Final Rating  </h2></td>
      <td style=" border: 1px solid black !important;"><h2> STATUS  </h2></td>
      </tr>

      <tr style=" border: 1px solid black !important;">
      <td style=" border: 1px solid black !important;" width="50">1</td>
      <td style=" border: 1px solid black !important;" width="50">2</td>
      <td style=" border: 1px solid black !important;" width="50">3</td>
      <td style=" border: 1px solid black !important;" width="50">4</td>
       </tr>
        
       <?php for ($i=0; $i < count($subjects); $i++) { 
         
      
       echo '<tr style=" border: 1px solid black !important;">
             <td style=" border: 1px solid black !important;">';
          
        echo $subjects[$i];
        echo '</td>';




        $find_student_grade = "SELECT s.grades   FROM student_gradee as s, student_record as SR  WHERE s.studno = SR.studno   
        AND s.glevel_section = '$g_level'  AND s.studno='$studno'  AND  s.grading_period=1 AND s.subjects='$subjects[$i]'  ";
         $student_grade_result = mysqli_query($connect, $find_student_grade);
         while($row= mysqli_fetch_array($student_grade_result, MYSQLI_ASSOC)){        
          $grades[] = $row['grades'];
        }
       
         if(empty($grades) || @$grades[$i] == 0){
            echo '<td></td>';
        echo '</td>';
          }else{
         
          echo '<td style=" border: 1px solid black !important;">';        
           echo $grades[$i];  
        }
         $find_student_grade2 = "SELECT s.grades   FROM student_gradee as s, student_record as SR  WHERE s.studno = SR.studno   
         AND s.glevel_section = '$g_level'  AND s.studno='$studno'  AND  s.grading_period=2 AND s.subjects='$subjects[$i]' ";
         $student_grade_result2 = mysqli_query($connect, $find_student_grade2);
         while($row= mysqli_fetch_array($student_grade_result2, MYSQLI_ASSOC)){
         
          $sec[] = $row['grades'];

        }

         if( !isset($sec) || @$sec[$i] === null ){

                  echo '<td></td>';
        echo '</td>';
     
          }else{
            echo '<td style=" border: 1px solid black !important;">';        
           echo $sec[$i] ; 
         
        }
              $find_student_grade3 = "SELECT s.grades   FROM student_gradee as s, student_record as SR  WHERE s.studno = SR.studno   AND s.glevel_section = '$g_level'  AND s.studno='$studno'  AND  s.grading_period=3 AND s.subjects='$subjects[$i]' ";
         $student_grade_result3 = mysqli_query($connect, $find_student_grade3);
         while($row= mysqli_fetch_array($student_grade_result3, MYSQLI_ASSOC)){
         
          $third[] = $row['grades'];

        }

         if(empty($third) || @$third[$i] === null){
            echo '<td></td>';
        echo '</td>';
          }else{
          
         echo '<td style=" border: 1px solid black !important;">';        
           echo $third[$i] ;
                
        }
                 $find_student_grade4 = "SELECT s.grades   FROM student_gradee as s, student_record as SR  WHERE s.studno = SR.studno   AND s.glevel_section = '$g_level'  AND s.studno='$studno'  AND  s.grading_period=4 AND s.subjects='$subjects[$i]' ";
         $student_grade_result4 = mysqli_query($connect, $find_student_grade4);
         while($row= mysqli_fetch_array($student_grade_result4, MYSQLI_ASSOC)){
         
          $fourth[] = $row['grades'];

        }

         if(empty($fourth) || @$fourth[$i] === null){
         echo '<td></td>';
        echo '</td>'; 
          }else{
          
            echo '<td style=" border: 1px solid black !important;">';        
           echo $fourth[$i] ; 
           
        }

       
        if (   @$grades[$i] === null || @$sec[$i] === null || @$third[$i] === null ||@$fourth[$i] === null) {
        echo "<td> </td>";
        }else{
        $total_ave = ($grades[$i] + $sec[$i] + $third[$i] + $fourth[$i] )/ 4 ;
        echo "<td>$total_ave </td>";
        }
         
        if (   @$grades[$i] === null || @$sec[$i] === null || @$third[$i] === null ||@$fourth[$i] === null) {
        echo "<td> </td>";
          
      }else{
        if ($total_ave <= 75) {
          echo "<td>FAIL</td>";
        }else{
          echo "<td>PASS</td>";
        }
      }
        }  ?>
        

       </tr>
       <tr>
       <td>General Average:</td>
    
          <?php
           $n= 12;
          if(!isset($grades) || count($grades) != $n ){ 
           
           ?>
         <td>
        
         </td>
         <?php }else{
          $first_gen = array_sum($grades)/$n;
         $first_gen2= number_format((float) $first_gen, 2, '.', '');
          echo "<td> $first_gen2 </td>";
          }?>
            <?php
          if(!isset($sec) || count($sec) != $n){ 
           ?>
         <td>
         </td>
         <?php }else{
          $second_gen = array_sum($sec)/$n;
           $second_gen2= number_format((float) $second_gen, 2, '.', '');
          echo "<td> $second_gen2 </td>";
          }?>
            <?php
          if(!isset($third) || count($third) != $n){ 
           ?>
         <td>         
         </td>
         <?php }else{
          $third_gen = array_sum($third)/$n;
           $third_gen2= number_format((float) $third_gen, 2, '.', '');
          echo "<td> $third_gen2 </td>";
          }?>
            <?php
            
          if(!isset($fourth) || count($fourth) != $n){ 
           ?>
         <td>   

         </td>
         <?php }else{
          $fourth_gen = array_sum($fourth)/$n;
           $fourth_gen2= number_format((float) $fourth_gen, 2, '.', '');
          echo "<td> $fourth_gen2 </td>";
          }
          if (!isset($first_gen) || !isset($second_gen) || !isset($third_gen) || !isset($fourth_gen)) {
            echo "<td></td>";
          }else{
          $general_average = ($first_gen + $second_gen + $third_gen + $fourth_gen) / 4;
         $general_average2= number_format((float) $general_average, 2, '.', '');
          echo "<td> $general_average2 </td>";
           if (isset($general_average) >= 75) {
            echo "<td> PASS </td>";
          }else{
            echo "<td> FAIL </td>";
          }
          }


          ?>

         
       </tr>

      </table>
     

       <table>
       <tr><td  colspan='7'><center><h1>REPORT ON LEARNER'S OBSERVED VALUES</h1></center></td><tr>
       <tr>
       <td rowspan="2"><h2> Core Values </h2></td>
       <td rowspan="2"><h2>  Behavior statements </h2></td>
       <td colspan="4"><h2> Quarter  </h2></td> 
        </tr>
      <tr>

      <td width="50">1</td>
      <td width="50">2</td>
      <td width="50">3</td>
      <td width="50">4</td>
       </tr>

       <?php $values_query= "SELECT b.BS_id,b.B_statements,c.core_values from behavior_statements as b, core_values as c     
        where c.core_id=b.core_id ";  
       $result = mysqli_query($connect, $values_query); 
       while ($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){

        $bs_id [] =$row['BS_id'];
        $core_values[] = $row['core_values'] ;
        $B_statements[] = $row['B_statements'];
        //$obs_res1[]= $row['observance_results'];
       }
        $values_quarter_query = "SELECT observance_results FROM student_values WHERE studno= '$studno' AND glevel_section='$g_level' AND quarter= 1 ";
          $result3 = mysqli_query($connect, $values_quarter_query);
            while ($row= mysqli_fetch_array($result3, MYSQLI_ASSOC)){
              $obs_res1[]= $row['observance_results'];
            }
       $values_quarter2_query = "SELECT observance_results FROM student_values WHERE studno= '$studno' AND glevel_section='$g_level' AND quarter= 2 ";
          $result2 = mysqli_query($connect, $values_quarter2_query);
            while ($row= mysqli_fetch_array($result2, MYSQLI_ASSOC)){
              $obs_res2[]= $row['observance_results'];
            }

             $values_quarter2_query = "SELECT observance_results FROM student_values WHERE studno= '$studno' AND glevel_section='$g_level' AND quarter= 3 ";
          $result3 = mysqli_query($connect, $values_quarter2_query);
            while ($row= mysqli_fetch_array($result3, MYSQLI_ASSOC)){
              $obs_res3[]= $row['observance_results'];
            }

             $values_quarter2_query = "SELECT observance_results FROM student_values WHERE studno= '$studno' AND glevel_section='$g_level' AND quarter= 4 ";
          $result4 = mysqli_query($connect, $values_quarter2_query);
            while ($row= mysqli_fetch_array($result4, MYSQLI_ASSOC)){
              $obs_res4[]= $row['observance_results'];
            }
       ?>

      

       <?php for ($i=0; $i < count($bs_id); $i++) { 

       echo '<tr><td>'; 
       echo $core_values[$i]; 
       echo '</td>'; 
       echo '<td>';
       echo $B_statements[$i];
       echo '</td>';
        if(!empty($obs_res1)){
       echo '<td>';
       echo $obs_res1[$i];
       echo '</td>';
        }else{
       echo '<td>';    
       echo '</td>';
       }
        if(!empty($obs_res2)){
       echo '<td>';
       echo $obs_res2[$i];
       echo '</td>';
        }else{
       echo '<td>';    
       echo '</td>';
       }
       if(!empty($obs_res3) ){
       echo '<td>';
       echo $obs_res3[$i];
       echo '</td>';
       }else{
       echo '<td>';    
       echo '</td>';
       }
       if(!empty($obs_res4)){
       echo '<td>';
       echo $obs_res4[$i];
       echo '</td>';
       }else{
       echo '<td>';     
       echo '</td>';
        }
       
       
       
       
        // <td> $B_statements[$i] </td>
        // <td> $obs_res1[$i] </td>
        // <td>$obs_res2[$i] </td>
        // <td> </td>
            
        //     ';
         
       }
       ?>
         
        

          
             
            </tr>
           
                  
       
      
        </table>
    
      </div>


        <div>
       <center><h2>

          <?php
      if (!isset($general_average)) {
          
         echo "<p id='finale'>no final grade</p>";
         
        
      }elseif(isset($general_average) <= 75) {
     echo "<p id ='pass'>Student is allowed to proceed to the next grade level<p>";
         
        

      }else{
         echo "<p id='fail'>Student failed and is not allowed to proceed to the next grade level</p>";
      }
          
      
      ?>


        </h2></center>
        </div>
     <div>   
     <table>
      <!-- <button id="print_form" onclick="Clickheretoprint('student_grade_info')"> print</button> -->
     <button><a target="_blank" href="print_form.php?id=<?php echo $studno; ?>&g=<?php echo $g_level; ?>">PRINT</a></button>
      <br><br>
      <button id="process"><a href ="enroll_student2.php?id=<?php echo $studno; ?>">PROCEED</a></button>
       <button id="repeat"><a href ="repeater.php?id=<?php echo $studno; ?>">PROCEED</a></button>
       
       </table></div>
 <?php }else{

        echo "No GRADES HAD BEEN ENCODED YET.";
        }?>
            
<div class="clear"></div>
</main>
</div>
</div>
                
               
                           
      </body>  
 </html> 
 <?php }?>

<script>
$(document).ready(function(){
     $("#process").hide();
      $("#repeat").hide();
    $("#pass").click(function(){
       $("#process").show();
    });
   $("#fail").click(function(){
       $("#repeat").show();
    });
});
</script>


