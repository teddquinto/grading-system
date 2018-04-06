<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  
 }  

      $g_id = $_GET['g_id'];
      $sec= $_GET['s'];

           $sections = "SELECT * FROM sections WHERE g_id = '$g_id' ";
           $result_sec = mysqli_query($connect, $sections); 
             $g_level = "SELECT * FROM g_level WHERE g_id= '$g_id' ";
            $res = mysqli_query($connect, $g_level); 
             while ($row= mysqli_fetch_array($res, MYSQLI_ASSOC)){
              $grade_level = $row['grade_name'];
             }


               $find_student="SELECT DISTINCT  SI.studno, SI.lname, SI.fname, SI.mname,SI.gender
                   FROM studentinfo SI, student_record SR,teachers_class tc
                   WHERE SI.studno = SR.studno
                   AND SR.grade_level = '$grade_level' 
                   AND SR.section = '$sec'
                   AND SR.school_year = tc.school_year
                   ORDER by SI.lname ASC 
                     ";               
           $student_result = mysqli_query($connect, $find_student);  
 ?>
<!DOCTYPE html>
<html>
<head>


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
	 echo navigation_principal();
	?>
     
    </nav>
  </div>
</div>



<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 

       <div class="sidebar one_quarter first"> 
        <h6>Sections</h6> <a href='add_section.php?g_id=<?php echo $g_id; ?>'>Add Section</a>
        <nav class="sdb_holder">
        <ul>
        <?php while ($row= mysqli_fetch_array($result_sec, MYSQLI_ASSOC)){ ?>
        <li><a href="grade_sec.php?g_id=<?php echo $g_id; ?>&g=<?php echo $grade_level; ?>&s=<?php echo $row['sec_name']; ?>"><?php echo $row['sec_name']; ?></a></li>
        <?php }?>
     
        </ul>
        </nav>
        </div>
      
        <div id="content" class="three_quarter"> 
             <table>
                  <tr><th colspan=5>CLass</th></tr>
                  <tr>
                  
                              
                 </tr>                 
                  <tr><td><h3> student Number  </h3></td><td><h3> lastname </h3></td><td><h3> firstnmae </h3></td><td><h3> Middlename </h3></td>
                  <td><h3>Gender</h3></td></tr>      
                  <?php  while ($row= mysqli_fetch_array($student_result, MYSQLI_ASSOC)){?>                  
                  <tr>
                  <td><?php echo $row['studno']; ?> </td>
                  <td> <?php echo $row['lname']; ?> </td>
                  <td> <?php echo $row['fname']; ?> </td>
                  <td> <?php echo $row['mname']; ?> </td>  
                   <td> <?php echo $row['gender']; ?> </td>                 
                  </tr>
                  
                  <?php }?>                
                  </table>

        </div>

  <div class="clear"></div>
    </main>
  </div>
</div>



      
</body>
</html>