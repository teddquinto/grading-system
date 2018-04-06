<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  
 } 

 		   $g_level = "SELECT * FROM g_level";
			
           $result_g = mysqli_query($connect, $g_level); 

           $sections = "SELECT * FROM sections";
			
           $result_sec = mysqli_query($connect, $sections); 

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
   echo navigation();
  ?>
     
    </nav>
  </div>
</div>



<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 



	  	  
		         
		  	<select class="grade_option">
				<?php  while ($row= mysqli_fetch_array($result_g, MYSQLI_ASSOC)){?>
				<option value="<?php echo $row['grade_name']; ?>"> <?php echo  $row['grade_name']; ?>
	      		</option><?php }?>
				
			</select>

					  	<select class="section">
					  	<option>----- ------</option>
						<?php while ($row= mysqli_fetch_array($result_sec, MYSQLI_ASSOC)){?>
						<option value="<?php echo $row['sec_name']; ?>"> <?php echo  $row['sec_name']; ?>
						 </option><?php }?>
			</select>	

			<input type="text" id="school_year" placeholder="schoolyear">
					
			<input type="text" id="student_num" placeholder="Enter Student No.">

			<br>
			<button id="enroll_student_btn">update</button>
			</div>

		<div class="student_info">
		
		</div>

      <div class="clear"></div>
    </main>
  </div>



      
</body>
</html>
      

	  
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){


		$(document).on("input", "#student_num", function(){

			var student_num = $("#student_num").val(); // to get the value of student id

			$.ajax({
				type   : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url   : 'ajax_displaystud.php', // the url where we want to POST
				data   : 'student_num='+student_num, // our data object
				dataType : 'json', 
				encode     : true,
				})
					.done(function(data) {

						//{"result":{"studno":"2016-0","lname":"Nicart","fname":"Franz Aldrin","mname":"Quintua","suffix":"Jr.","bdate":"1999-10-20","age":"20","gender":"Male","address":"2977 Ramon Magsaysay Blvd, Sta. Mesa, Campidhan, S","fathername":"tata","mothername":"tata"}}

						var studno = data.result["studno"];
						var lname = data.result["lname"];
						var fname = data.result["fname"];
						var mname = data.result["mname"];
						var suffix = data.result["suffix"];
						var bdate = data.result["bdate"];
						var age = data.result["age"];
						var gender = data.result["gender"];
						var address = data.result["address"];
						var fathername = data.result["fathername"];
						var mothername = data.result["mothername"];


					 $('.student_info').html("<br><input type='text' value='"+studno+"' readonly='true'><br><input type='text' value='"+lname+"' readonly='true'><br><input type='text' value='"+fname+"' readonly='true'><br><input type='text' value='"+mname+"' readonly='true'><br><input type='text' value='"+suffix+"' readonly='true'><br><input type='text' value='"+bdate+"' readonly='true'><br><input type='text' value='"+age+"' readonly='true'><br><input type='text' value='"+gender+"' readonly='true'><br><input type='text' value='"+address+"' readonly='true'> <br><input type='text' value='"+fathername+"'readonly='true'><br><input type='text' value='"+mothername+"' readonly='true'>");

					// $("#last_name").val(lname);

					//to display ajax data
					// $('.student_info').text(JSON.stringify(data));
			});
		});
		



		$("#enroll_student_btn").click(function(){
			var grade_level=$(".grade_option").val();
			var section=$(".section").val();
			var school_year=$("#school_year").val();
			var studno=$("#student_num").val();

			// alert(grade_level);

			$.ajax({
				type   : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url   : 'ajax_enrollment.php', // the url where we want to POST
				data   : '&grade_level='+grade_level+'&section='+section+'&school_year='+school_year +'&studno='+studno, // our data object
				dataType : 'json', 
				encode     : true,
				})
				.done(function(data) {
					
					if(data.result === true){
						alert('student ' + studno + ' has been successfully Updated');
					} else {
						alert("error")
					}

			});


		});

	});
</script>

