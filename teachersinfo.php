<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  

 }  


 $t_id = $_GET['id'];	


 	 // $find_class=  "SELECT DISTINCT  SI.studno, SI.lname, SI.fname, SI.mname
   //                 FROM studentinfo SI, student_record SR, teachers_class TC
   //                 WHERE SI.studno = SR.studno
   //                 AND   TC.glevel_section = (SELECT DISTINCT CONCAT(SR.grade_level, '-', SR.section) FROM student_record)
   //                 AND   TC.teachers_id LIKE '%$t_id%'";

   //   $class_result = mysqli_query($connect, $find_class);

   	$find_class = "SELECT DISTINCT 	glevel_section,type_of_teacher,subjects FROM teachers_class  WHERE teachers_id = '$t_id' ";
   	$class_result = mysqli_query($connect, $find_class);


	
   
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
	 echo navigation_principal();
	?>
     
    </nav>
  </div>
</div>



<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 

    	
    	 <table>
                  <tr>
                  <th >CLass handled</th> 
                  <th>type of teacher</th>
                  <th>subjects</th>
                  <th>Class schedule</th>
                  <th>remove</th>
                  </tr>
                  <tr>
                  
                       
                 </tr>                 
                  </tr>      
                  <?php  while ($row= mysqli_fetch_array($class_result, MYSQLI_ASSOC)){?>                  
                  <tr>
                  <td><?php echo $row['glevel_section']; ?> </td>
                  <td> <?php echo $row['type_of_teacher']; ?> </td>
                  <td> <?php echo $row['subjects']; ?> </td>
                  <!-- <td> <?php echo $row['subjects']; ?> </td> -->
                  <td width="50" height="50" ><a href="sched.php?g=<?php echo $row['glevel_section'];?>&t=<?php echo $t_id;?>"><img src="sched.jpg"> </a></td>
                  <td width="50" height="50" ><a href="remove_sched.php?g=<?php echo $row['glevel_section'];?>&t=<?php echo $t_id;?>&type=<?php echo $row['type_of_teacher'];?>"><img src="images/remove.jpg"> </a></td>

                  <?php }?>                
                  </tr>
                  
                                  
                  </table>
		
		

      <div class="clear"></div>
    </main>
  </div>
</div>


      
</body>
</html>

	