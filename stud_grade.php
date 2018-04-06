<?php

require "required_files.php";
require_once ("functions/functions.php");

 if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  
 } 

$studno= $_GET['id'];
$g_level = $_GET['g'];
$section = $_GET['s'];
$sy = $_GET['sy'];

          $student = "SELECT lname,fname,mname FROM studentinfo WHERE studno = '$studno' ";
          $res_stud = mysqli_query($connect, $student);
            while($row= mysqli_fetch_array($res_stud, MYSQLI_ASSOC)){
              $lname = $row['lname'];
              $fname = $row['fname'];
              $mname = $row['mname'];
            }

      $grade_level = "SELECT * FROM g_level WHERE g_id = '$g_level' ";
        $grade_level2 = mysqli_query($connect, $grade_level);
         while($row= mysqli_fetch_array($grade_level2, MYSQLI_ASSOC)){
          
          $grade_name = $row['grade_name'];
          

       }
        $section = "SELECT * FROM sections WHERE sec_name = '$section' ";
        $sec_res = mysqli_query($connect, $section);
         while($row= mysqli_fetch_array($sec_res, MYSQLI_ASSOC)){
          
          $sections = $row['sec_name'];
          

       }

  		  $find_subjects = "SELECT DISTINCT subjects
          FROM teachers_class WHERE glevel_section = CONCAT('$grade_name','-','$sections' ) ";
         $student_subjects = mysqli_query($connect, $find_subjects);
         while($row= mysqli_fetch_array($student_subjects, MYSQLI_ASSOC)){
          
          $subjects[] = $row['subjects'];
          

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

<!-- layout of the page || page header -->
<?php
echo layout();
?>


	<!-- NAvigation -->


  <div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="clear"> 
				 
<?php if ($_SESSION["username"] == "admin"){echo navigation();
	}else { echo navigation_principal(); }?>
	<?php echo $_SESSION['username']; ?>
				
	</nav>
  </div>
</div>

	<!-- BODY -->

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 

    <?php if(!empty($subjects)){ ?>
      <div name="student_grade_info" id="student_grade_info">

      <table style=" border: 1px solid black !important;">
      <tr style=" border: 1px solid black !important;"><td colspan='7' style=" border: 1px solid black !important;">
      <center><h1>REPORT ON LEARNER'S PROGRESS AND  ACHIEVMENTS</h1></center></td><tr style=" border: 1px solid black !important;">
       <tr style=" border: 1px solid black !important;">
       <td>student name:<?php echo $lname.",".$fname ." ".$mname ; ?></td>
       </tr>
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




        $find_student_grade = "SELECT s.grades   FROM student_gradee as s, student_record as SR  WHERE s.studno = SR.studno   AND s.glevel_section =  CONCAT('$grade_name','-','$sections' )  AND s.studno='$studno'  AND  s.grading_period=1 AND s.subjects='$subjects[$i]' AND SR.school_year = '$sy' ";
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
         $find_student_grade2 = "SELECT s.grades   FROM student_gradee as s, student_record as SR  WHERE s.studno = SR.studno   AND s.glevel_section =  CONCAT('$grade_name','-','$sections' )  AND s.studno='$studno'  AND  s.grading_period=2 AND s.subjects='$subjects[$i]' AND SR.school_year = '$sy' ";
         $student_grade_result2 = mysqli_query($connect, $find_student_grade2);
         while($row= mysqli_fetch_array($student_grade_result2, MYSQLI_ASSOC)){
         
          $sec[] = $row['grades'];

        }

         if( empty($sec) || @$sec[$i] === null ){

                  echo '<td></td>';
        echo '</td>';
     
          }else{
            echo '<td style=" border: 1px solid black !important;">';        
           echo $sec[$i] ; 
         
        }
              $find_student_grade3 = "SELECT s.grades   FROM student_gradee as s, student_record as SR  WHERE s.studno = SR.studno   AND s.glevel_section =  CONCAT('$grade_name','-','$sections')  AND s.studno='$studno'  AND  s.grading_period=3 AND s.subjects='$subjects[$i]' AND SR.school_year = '$sy' ";
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
                 $find_student_grade4 = "SELECT s.grades   FROM student_gradee as s, student_record as SR  WHERE s.studno = SR.studno   AND s.glevel_section =  CONCAT('$grade_name','-','$sections' )  AND s.studno='$studno'  AND  s.grading_period=4 AND s.subjects='$subjects[$i]' AND SR.school_year = '$sy' ";
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
<!--        <tr style=" border: 1px solid black !important;">
         <td style=" border: 1px solid black !important;">
           General Average  
         </td>
         <td style=" border: 1px solid black !important;"></td>
         <td style=" border: 1px solid black !important;"></td>
         <td style=" border: 1px solid black !important;"></td>
          <td style=" border: 1px solid black !important;"></td>
         <td style=" border: 1px solid black !important;">
              <?php  $N = count($gen_ave);
                $total_ave =array_sum($gen_ave)/$N;
               echo $total_ave;

             
              ?>

         </td>
         <td style=" border: 1px solid black !important;">
           <?php
           if ($total_ave >= 75) {
            $_SESSION['pass']= "PASS";
            echo $_SESSION['pass'];
            
           }else{
             $_SESSION['fail']= "FAIL";
            echo $_SESSION['fail'];
           }
           ?>

         </td> -->
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

}else{
	echo 'NO Data recorded';
}
          ?>

         
       </tr>

      </table>


	
    
	
			
			

	 <div class="clear"></div>
    </main>
  </div>
</div>			
				
			
			
</body>
</html>

