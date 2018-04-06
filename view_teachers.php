<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  

 }  

 $query1 = "SELECT distinct grade_level FROM student_record";			
           $result1 = mysqli_query($connect, $query1); 

  

$query = "SELECT distinct ti.teachers_id,ti.teachers_lname,ti.teachers_fname,ti.teachers_mname,tc.school_year FROM teachersinfo ti,teachers_class tc WHERE tc.teachers_id=ti.teachers_id ";									
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

    	
		
	
		
		<table class="enrolled_students_tbl">

			<thead>
			<tr>
			<th><a href="javascript:Confirm()">School Year</a></th>

				


			

				<th>Teachers ID</th>
				<th>Name</th>
				<th> CLASS</th>
				<!-- <th>UPDATE Assignments	</th> -->
				
				
			</tr>	
			</thead>
				<?php while ($row =  mysqli_fetch_assoc($result)) { ?>
			<tbody>	
						
				<tr>
					<td><?php echo $row['school_year']; ?></td>
					<td><?php echo $row['teachers_id']; ?></td>
					<td><?php echo $row['teachers_lname']." , ".$row['teachers_fname'] ."  ". $row['teachers_mname']; ?></td>
					<td width="50" height="50" ><a href="teachersinfo.php?id=<?php echo $row['teachers_id'];?>">
					<img src="grade.png"> </a></td>
					<!-- <td width="40" height="40" ><a href="teachersinfo.php?id=<?php echo $row['teachers_id'];?>">
					<img src="grade.png" style="width: 50px; height: 50px;"> </a></td> -->
					


				<?php } ?>
				</tr>	
				<!-- SEARCH RESULT GOES HERE -->
			</tbody>
			
		</table>
		

      <div class="clear"></div>
    </main>
  </div>
</div>


      
</body>
</html>

<script type="text/javascript">
	function Confirm() {
   
      var r = confirm("Are you sure you want to update school year?");
      if (r == true) {
        window.location.href = "update_school_year.php";
      } else {
        window.location.href = "#";
    }
    }

</script>


<!-- <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		
		//#search_grade_lvl_info
		$(document).on("click", "button#search_grade_lvl_info", function(){
			var grade_level = $("#grade_level_drp_down").val();
		
					

			$.ajax({
				type   : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url   : 'ajax_search_teacher.php', // the url where we want to POST
				data   : 'grade_level='+grade_level, // our data object
				dataType : 'json', 
				encode     : true,
				})
				.done(function(data) {
					//alert(JSON.stringify(data));
					//alert(data[0].id);
					//alert(data.length);

					var count_result = data.length;
					if (count_result == 0) {
						$(".enrolled_students_tbl > tbody").html("<tr id='default_data'><td>0 Result(s)...</td></tr>");
					} else {

						$("#default_data").remove(); //remove default data

						for (var i = 0; i < count_result; i++) {

							var student_info_row = "<tr>";
								student_info_row +=		"<td>"+data[i].teachers_id+"</td>";
								student_info_row +=		"<td>"+data[i].teachers_lname+", "+data[i].teachers_fname+" "+data[i].teachers_mname+"</td>";
								student_info_row +=		"<td>"+data[i].type_of_teacher+"</td>";
								student_info_row +=		"<td>"+data[i].glevel_section+"</td>";
								student_info_row +=		"<td>"+data[i].subjects+"</td>";
								
								student_info_row +=	"</tr>";

							$(".enrolled_students_tbl > tbody").append(student_info_row);
						}
					}
			});

		});

	});	
</script> -->