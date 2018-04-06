<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["teachers_id"]))  
 {  

  
      header("location:teahcers_login.php");  
 }  
 $teachers_id = $_SESSION["teachers_id"]; 
 $query = "SELECT distinct glevel_section,type_of_teacher FROM teachers_class where teachers_id LIKE '%$teachers_id%' ";    
           $result = mysqli_query($connect, $query);  
 ?>


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
	 <?php
	//navigationbar for admin
	 //echo navigation_teacher();

	?>

          <ul class="clear">

                  <?php  while ($row= mysqli_fetch_assoc($result)){?>
                   <?php $g_level = $row['glevel_section'];
                   $t_type = $row['type_of_teacher'];?>

                  <li><a href="class_handled.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>"><?php echo $g_level;  ?></a></li>
                 <?php }?>
               
                </ul>    
                  
                 </div>

     
    </nav>
  </div>
</div>




      
</body>
</html>