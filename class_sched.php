<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["teachers_id"]))  
 {  

  
      header("location:login.php?action=login");  
 }  


 $g_level = $_GET['g'];
 $t_type= $_GET['t'];
 

 $teachers_id = $_SESSION["teachers_id"]; 
 $query = "SELECT distinct glevel_section,type_of_teacher FROM teachers_class where teachers_id LIKE '%$teachers_id%' ";    
           $result = mysqli_query($connect, $query);  

 
 $teachers_sched = "SELECT subjects,b_time,e_time,day,glevel_section FROM teachers_class where teachers_id LIKE '%$teachers_id%' AND glevel_section = '$g_level' ";    
                    $result_sched = mysqli_query($connect, $teachers_sched);

          

         
          
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
        <li><a href="class.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;;?>">ADD GRADE</a></li>
        <ul>
        
        <li><a href="report_card_learners_values.php?g=<?php echo $g_level;?>&t=<?php echo $t_type; ?>">ADD LEARNER'S VALUES</a>
        </ul>
        <li><a href="report.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">STUDENTS REPORT CARD</a></li>
         <li><a href="#">CLASS SCHEDULE</a></li>
         <li><a href="verify2.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">ADD STUDENT</a></li>
        </ul>
        </nav>
        </div>

                
         <div id="content" class="three_quarter"> 
         <table>
           <thead>
           <tr>
             <th>Time</th>
             <th>day</th>
             <th>subject</th>
            </tr> 
           </thead>
           <tbody>
           <?php  while ($row= mysqli_fetch_assoc($result_sched)){?>
             <tr>
               <td>
                <?php echo $row['b_time']." - ". $row['e_time'];  ?> 
               </td>
               <td>
                <?php echo $row['day'];  ?> 
               </td>
               <td>
                <?php echo $row['subjects'];  ?>
               </td>
               <?php }?>
             </tr>
           </tbody>

         </table>
         </div>

    </main>
  </div>
</div>


      
</body>
</html>
