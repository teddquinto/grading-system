<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["teachers_id"]))  
 {  

  
      header("location:login.php?action=login");  
 }  
 $teachers_id = $_SESSION["teachers_id"]; 


 $sql = "SELECT * FROM teachersinfo WHERE teachers_id = '$teachers_id' ";
        $result = mysqli_query($connect, $sql); 

        while ($row =  mysqli_fetch_assoc($result)) { 
          $lname=  $row['teachers_lname'];
          $fname=  $row['teachers_fname'];
          $mname=  $row['teachers_mname'];
          $bday=  $row[ 'teachers_bday'];
          $age=  $row[  'teachers_age'];
          $gender=  $row['teachers_gender'];
          $address=  $row['teachers_address'];
          $status=  $row['status'];   
          $pass=  $row['password'];        

        }


 $query = "SELECT distinct glevel_section,type_of_teacher FROM teachers_class where teachers_id LIKE '%$teachers_id%' ";    
           $result = mysqli_query($connect, $query);  




       
 ?>
 <!DOCTYPE html>
     <html>
    
       <body>

<div class='wrapper row0'>
 <div id='topbar' class='clear'> 
<nav>
 <ul>
 
  <li><a href=""><?php echo $_SESSION['lname'].',',$_SESSION['fname'].' ', $_SESSION['mname'];?></a></li>
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


<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 


      <div class="one_third first">
                <table>

                <input type="hidden" name="teachers_id" id="teachers_id" value="<?php echo $t_id; ?>">
          
                    <tr><td width= 1000px><label>Last Name: </label></td>
                    <td><?php echo $lname; ?></td></tr>
                      
                     <tr><td><label>First Name: </label></td>
                    <td><?php echo $fname; ?></td></tr>
                      
                     <tr><td><label>Middle Name: </label></td>
                    <td><?php echo $mname; ?></td></tr>
                     
                                      
                    
                    <tr><td> <label for="field1">Birthday: </label></td>
                    <td><?php echo $bday; ?></td></tr>
                    
                     <tr><td><label>Age: </label></td>
                    <td><?php echo $age; ?></td></tr>
                 
                    <tr><td><label>Gender: </label></td>
                    <td><?php echo $gender; ?></td></tr>
                   
                    <tr><td><label>Address: </label></td>
                    <td><?php echo $address; ?></td></tr>
                    <tr><td><label>Status:</label></td>
                   <td><?php echo $status ?></td></tr>
                    <tr><td><label>password:</label></td>
                   <td><?php echo $pass ?></td></tr>
                    
                    


</table>
   
            
          </div>
             <form action="update_pass.php" method="POST" >

            <div class="one_third ">

           
            Change Password:
            <input type="text" name="pass" value= " <?php echo $pass; ?> " >
            

            <br>

            <input type="submit" name="send" value="update">

          
             </div>
                </form>

     
   <div class="clear"></div>
    </main>
 </div>
  </div>

      
</body>
</html>