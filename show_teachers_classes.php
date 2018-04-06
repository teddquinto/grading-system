<?php

require "required_files.php";
require_once ("functions/functions.php");


if(!isset($_SESSION["teachers_id"]))  
 {  

  
      header("location:login.php?action=login"); 

 } 
 $teachers_id = $_SESSION["teachers_id"]; 


$query = "SELECT distinct glevel_section,type_of_teacher FROM teachers_class where teachers_id LIKE '%$teachers_id%' ";    
           $result = mysqli_query($connect, $query);  

           $query2 = "SELECT distinct glevel_section,type_of_teacher FROM teachers_class where teachers_id LIKE '%$teachers_id%' ";    
           $result2 = mysqli_query($connect, $query2);  


?>  

  

<!DOCTYPE html>  
  <html>
 <head>
 <title>List of classes</title>

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

    <?php echo navigation_teacher();?>
  
     
    </nav>
  </div>
</div>



         



<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
     
 <div class="sidebar one_quarter first"> 
        
        <nav class="sdb_holder">
          <ul>

                  <?php  while ($row= mysqli_fetch_assoc($result)){?>
                   <?php $_SESSION['glevel_section'] = $row['glevel_section'];
                   $_SESSION['t_type'] = $row['type_of_teacher'];?>

                  <li><a href="class.php?g=<?php echo $_SESSION['glevel_section'];?>&t=<?php echo $_SESSION['t_type'];?>"><?php echo $_SESSION['glevel_section'];  ?></a></li>
                 <?php }?>
               
                </ul>    
                 </nav>   


            
          


      <div class="clear"></div>
    </main>
  </div>
  </div>


      
</body>
</html>


