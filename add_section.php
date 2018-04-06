<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  
 }  

      $g_id = $_GET['g_id'];
     

           $sections = "SELECT * FROM sections WHERE g_id = '$g_id' ";
           $result_sec = mysqli_query($connect, $sections); 
             $g_level = "SELECT * FROM g_level WHERE g_id= '$g_id' ";
            $res = mysqli_query($connect, $g_level); 
             while ($row= mysqli_fetch_array($res, MYSQLI_ASSOC)){
              $grade_level = $row['grade_name'];
             }

if (isset($_POST['submit'])) {
  
  $sec= $_POST['section'];

  $insert = "INSERT INTO sections(g_id,sec_name) VALUES('$g_id','$sec') ";
      $result = mysqli_query($connect, $insert); 
      if ($result == 'true') {
         header("location:grade_levels.php?g_id= $g_id");
       } else{
        echo "error";
       }
   


}else{
             
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
        <form action="" method="POST">
        <label>Section Name</label> 
           <input type="text " name=" section">
           <br>
           <input type="submit" name="submit" value="Add">
          </form>
        </div>

  <div class="clear"></div>
    </main>
  </div>
</div>



      
</body>
</html>
<?php } ?>