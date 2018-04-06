<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  
 }  
 

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
   echo navigation();
  ?>
     
    </nav>
  </div>
</div>


<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="js/dataTables.scroller.js"></script>
		<script type="text/javascript" language="javascript" >
			
			$(document).ready(function() {
			   var dataTable = $('#enrolled_students_tbl').DataTable( {
				serverSide: true,
				ajax:{
						url :"ajax_displaystud.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".enrolled_students_tbl").html("");
							$("#enrolled_students_tbl").append('<tbody class="enrolled_students_tbl_error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#enrolled_students_tbl_processing").css("display","none");
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

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
    

          <table class="enrolled_students_tbl" id="enrolled_students_tbl" >

			<thead>
				<tr>
				<th>Student Number</th>
				<th width="175">Name</th>
				<th width="110">Birthday</th>
				<th>Age</th>
				<th>Gender</th>
				<th>Address</th>
				<th>Fathers' Name</th>	
				<th>Mothers' Name</th>
				<th>birth certificate</th>
				
				<th>Edit</th>
				</tr>
			</thead>

			
		</table>
		

      <div class="clear"></div>
    </main>
  </div>



      
</body>
</html>
      	  
          

         
      </body>  
 </html>  

        
	 	<!-- <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script> -->
		<script type="text/javascript">


// function myFunction() {
//   var input, filter, table, tr, td, i;
//   input = document.getElementById("search");
//   filter = input.value.toUpperCase();
//   table = document.getElementById("myTable");
//   tr = table.getElementsByTagName("tr");
//   for (i = 0; i < tr.length; i++) {
//     td = tr[i].getElementsByTagName("td")[0];
//     if (td) {
//       if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
//         tr[i].style.display = "";
//       } else {
//         tr[i].style.display = "none";
//       }
//     }       
//   }
// }



// $(document).ready(function(){
// 		$(document).on("input", "#search", function(){


// 			var search = $("#search").val(); // to get the value of student id

// 			$.ajax({
// 				type   : 'POST', // define the type of HTTP verb we want to use (POST for our form)
// 				url   : 'ajax_displaystud.php', // the url where we want to POST
// 				data   : 'search='+search, // our data object
// 				dataType : 'json', 
// 				encode     : true,
// 				})
// 			.done(function(data) {
						
// 						var count_result = data.length;
						
// 						 //remove default data
// 						 if (count_result == 0) {
// 						 		$(".enrolled_students_tbl > tbody");
// 						 	} else {
// 								$("#default_data").remove();
// 						for (var i = 0; i < count_result; i++) {

// 							var student_info_row = "<tr>";
// 								student_info_row +=		"<td>"+data[i].studno+"</td>";
// 								student_info_row +=		"<td>"+data[i].lname+", "+data[i].fname+" "+data[i].mname+"</td>";
// 								student_info_row +=		"<td>"+data[i].bdate+"</td>";
// 								student_info_row +=		"<td>"+data[i].age+"</td>";
// 								student_info_row +=		"<td>"+data[i].gender+"</td>";
// 								student_info_row +=		"<td>"+data[i].address+"</td>";
// 								student_info_row +=		"<td>"+data[i].fathername+"</td>";
// 								student_info_row +=		"<td>"+data[i].mothername+"</td>";
// 								student_info_row +=	"<td></td><td></td></tr>";

// 							$(".enrolled_students_tbl > tbody").append(student_info_row);
// }		
// }
// 	});
// 		 });
// 		 });
	


// 		$(document).on("input", "#student_number", function(){
// 	$(document).on("click", "button#Search_student", function(){
// 						//$("#search_student").click(function(){
			
// 			var student_number = $("#student_number").val(); // to get the value of student id

// 			$.ajax({
// 				type   : 'POST', // define the type of HTTP verb we want to use (POST for our form)
// 				url   : 'ajax_search_student.php', // the url where we want to POST
// 				data   : 'student_number='+student_number, // our data object
// 				dataType : 'json', 
// 				encode     : true,
// 				})
// 					.done(function(data) {

	

// 						var studno = data.result["studno"];
// 						var lname = data.result["lname"];
// 						var fname = data.result["fname"];
// 						var mname = data.result["mname"];
// 						var suffix = data.result["suffix"];
// 						var bdate = data.result["bdate"];
// 						var age = data.result["age"];
// 						var gender = data.result["gender"];
// 						var address = data.result["address"];
// 						var fathername = data.result["fathername"];
// 						var mothername = data.result["mothername"];
// 						var b_certificate= data.result["b_certificate"];

// 						var is_checked, is_checked_no = "";
// 						if (b_certificate == "complete") {
// 							is_checked = "checked";
// 						} else {
// 							is_checked_no = "checked";
// 						}



// 					 $('.student_info').html("<label>Student number</label><input type='text' id='studno' value='"+studno+"' readonly='true'><label>LASTNAME:</label><input type='text' id ='last_name' value='"+lname+"'><label>FIRSTNAME:</label><input type='text' id ='fname' value='"+fname+"' ><label>MIDDLENAME:</label><input type='text'id ='mname' value='"+mname+" '><label>SUFFIX</label><input type='text'id ='suffix' value='"+suffix+"' ><label>BIRTHDAY</label><input type='date'id ='bdate' value='"+bdate+"' ><label>AGE:</label><input type='text'id ='age' value='"+age+"' ><label>GENDER:</label><input type='text'id ='gender' value='"+gender+"' ><label>ADDRESS</label><input type='text'id ='address' value='"+address+"' > <label>fathername:</label><input type='text'id ='fathername' value='"+fathername+"'><label>mothername:</label><input type='text'id ='mothername' value='"+mothername+"'> Do Student have Birth Certificate?<input type='radio' class ='b_certificate' name='b_certificate' value='complete' "+is_checked+"> Yes <input type='radio' class ='b_certificate' name='b_certificate' value='incomplete' "+is_checked_no+"> No " );

// 			});
// 		});
		
	

// 		$(document).on("click", "#Update_student", function(){

// 				var student_number = $("#student_number").val();
// 				var last_name = $("#last_name").val();
// 				var fname = $("#fname").val();
// 				var mname = $("#mname").val();
// 				var suffix = $("#suffix").val();
// 				var bdate = $("#bdate").val();
// 				var age = $("#age").val();
// 				var gender = $("#gender").val();
// 				var address = $("#address").val();
// 				var fathername = $("#fathername").val();
// 				var mothername = $("#mothername").val();  
// 				var b_certificate = $(".b_certificate:checked").val();  
				

// 				alert(b_certificate);


// 			$.ajax({
// 				type   : 'POST', // define the type of HTTP verb we want to use (POST for our form)
// 				url   : 'ajax_update_student.php', // the url where we want to POST
// 				data   : '&student_number='+student_number+ '&last_name='+last_name+ '&fname='+fname+'&mname='+mname+'&suffix='+suffix+'&bdate='+bdate+'&age='+age+'&gender='+gender+'&address='+address+'&fathername='+fathername+'&mothername='+mothername+'&b_certificate='+b_certificate, // our data object
// 				dataType : 'json', 
// 				encode     : true,
// 				})
// 					.done(function(data) {

						


// 						if(data.result === true){
// 						alert('student ' + student_number + ' has been updated');
// 					} else {
// 						alert("error");
// 					}

// 			});


// 		});

// $("#Delete_student").click(function(){
	
// 				var student_number = $("#student_number").val();
				


// 			$.ajax({
// 				type   : 'POST', // define the type of HTTP verb we want to use (POST for our form)
// 				url   : 'ajax_delete_student.php', // the url where we want to POST
// 				data   : '&student_number='+student_number, // our data object
// 				dataType : 'json', 
// 				encode     : true,
// 				})
// 					.done(function(data) {

						
// 						    var r = confirm("are you sure?");
// 						      if (r == true) {
// 						        alert('student ' + student_number + ' has been deleted');
// 						      } else {
// 						       alert("error");
// 						      }
						   

// 					// 	if(data.result === true){
// 					// 	alert('student ' + student_number + ' has been deleted');

// 					// } else {
// 					// 	alert("error");
// 					// }

// 			});


// 		});




</script>




