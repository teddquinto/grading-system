<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  

 }  
 $t_id = $_GET['t']; 
 $g_level = $_GET['g'];

 
 $teachers_sched = "SELECT t_id,subjects,b_time,e_time,day,glevel_section FROM teachers_class where teachers_id LIKE '%$t_id%' AND glevel_section = '$g_level'";    
                    $result_sched = mysqli_query($connect, $teachers_sched);

          

         
          
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
           <thead>
           <tr>
             <th>Time</th>
             <th>day</th>
             <th>subject</th>
             <th>edit</th>
            </tr> 
           </thead>
           <tbody>
           <?php  while ($row= mysqli_fetch_assoc($result_sched)){
                          $t_id = $row['t_id'];?>
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
                <td width="20"><a href="edit_sched.php?id=<?php echo $t_id; ?>"> <img src="b_edit.png"> </a></td>
               <?php }?>
             </tr>
           </tbody>

         </table>
        

    </main>
  </div>
</div>


      
</body>
</html>

