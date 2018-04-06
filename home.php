<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  
 }  
 ?>

  <div class='wrapper row0'>
 <div id='topbar' class='clear'> 
<nav>
 <ul>
 
  <li><a href="admin.php"> <?php echo $_SESSION['username'];?></a></li>
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
	 echo navigation();
	?>
     
    </nav>
  </div>
</div>





      
</body>
</html>