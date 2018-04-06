<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  
 }  

      $query = "SELECT * FROM teachersinfo  ";                  
  $result = mysqli_query($connect, $query);  

 ?>
  <!DOCTYPE html>
     <html>
    
       <body>

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
	 echo navigation_principal();
	?>
     
    </nav>
  </div>
</div>




<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
     
   <h1>Teachers Information <!--  <a href="add_teacher.php"><img src="teachers.png" style="width:30px; height:30px; " ></a>  --></h1>


    <table class="teachers_tbl" id="teachers_tbl">

      <thead>
      <tr>
        <th>Teachers ID</th>
        <th>Name</th>
        <th> Birhtday</th>
        <th> Age</th>
        <th> Gender</th>
        <th> Address</th>
        <th> Status</th> 
        <th> Add<br> Class</th>  
        <th>credentials</th>         
      </tr> 
      </thead>

      </table>


      <div class="clear"></div>
    </main>
 </div>
  </div>



      
</body>
</html>

<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="js/dataTables.scroller.js"></script>
    <script type="text/javascript" language="javascript" >
      
      $(document).ready(function() {
        
         var dataTable = $('#teachers_tbl').DataTable( {
        serverSide: true,
        ajax:{
            url :"displayteacher_prin.php", // json datasource
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $("#teachers_tbl").html("");
              $("#teachers_tbl").append('<tbody class="teachers_tbl_error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#teachers_tbl_processing").css("display","none");
            }
          },
        dom: "frtiS",
        scrollY: 200,
        deferRender: true,
        scrollCollapse: true,
        scroller: {
            loadingIndicator: true
        }
          } );
      });
    </script>