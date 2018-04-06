<?php
require "required_files.php";
require_once ("functions/functions.php");
 if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  


 }  

@$teachers_id=$_GET['id'];

 $teacher = "SELECT DISTINCT * FROM teachersinfo WHERE teachers_id = '$teachers_id' " ;
			
            $teachers_result = mysqli_query($connect, $teacher);
             while ($row= mysqli_fetch_array($teachers_result, MYSQLI_ASSOC)){
             	$teachers_id2 = $row['teachers_id'];
             }



      $find_grade_section = "SELECT DISTINCT grade_level, section FROM student_record";
			
       $grade_section_result = mysqli_query($connect, $find_grade_section);

       $subjects = "SELECT * FROM subjects";			
       $subject_result = mysqli_query($connect, $subjects);

       	  $g_level = "SELECT * FROM g_level";      
           $result_g = mysqli_query($connect, $g_level); 

           $sections = "SELECT * FROM sections";     
           $result_sec = mysqli_query($connect, $sections);

       $sy = get_current_year() + 1;
            $ssy= get_current_year() ."-". $sy; 
 
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
    
     <div class="one_quarter first">
     	<form action="ajax_teachers_class.php" method="POST">
     
     	
    					<input type="text" name="teachers_id" value="<?php echo $teachers_id2; ?>" readonly>
    					<br>
						<label>School year:</label>
								<input type="text" id="school_year" name="school_year"  value="<?php echo $ssy;?>" >
								<br>
								<label>Grade level </label>
			 <select class="grade_option" name="grade_option">
                      <?php  while ($row= mysqli_fetch_array($result_g, MYSQLI_ASSOC)){?>
                            <option value="<?php echo $row['grade_name']; ?>"> <?php echo  $row['grade_name']; ?>
                        </option><?php }?>
        
                      </select>
			<br>
			<label>Section:</label>
			 <select class="section" name="section">
                            <option>----- ------</option>
                            <?php while ($row= mysqli_fetch_array($result_sec, MYSQLI_ASSOC)){?>
                            <option value="<?php echo $row['sec_name']; ?>"> <?php echo  $row['sec_name']; ?>
                            </option><?php }?>
                          
                           </select> 
						</div>
			<div class="one_quarter">
			
			</div>

			<div class="one_quarter">
			<label>Type of teacher</label>
			<select id="Type_of_teacher" name ="Type_of_teacher">
			<option value="advisor">advisor</option>
			<option value="Subject_teacher">Subject teacher</option>			
			</select>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br><br>		
				<input type="submit" name="submit" value="Assign Teacher">
			</div>		
						<div class="one_quarter">
						<label>Subjects</label>
						<select id="subjects" name="subjects">
						<?php  while ($row= mysqli_fetch_array($subject_result, MYSQLI_ASSOC)){?>
						<option value="<?php echo $row['sub_name']; ?>"><?php echo $row['sub_name']; ?></option>
						<?php }?>
						</select>
							
							<label>Begin Time:</label>
								<input type="time" id="begin_time" name="begin_time" >
								<label>End Time:</label>
								<input type="time" id="end_time" name="end_time" >
								<label>DAY:</label>
								<select name="day[]" id="day" multiple>
												<option value="M">Monday</option>
												<option value="T">Tuesday</option>
												<option value="W">Wednesday</option>
												<option value="Thu">Thursday</option>
												<option value="Fri">Friday</option>
											</select>
						</div>	
							
						
								
							</form>	
											
										<br>
								<!-- <button id="add_teachers_class_btn">Assign teacher</button>
 -->

      <div class="clear"></div>
    </main>
  </div>
 



</body>
</html>

<!-- 
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">


   

$("#add_teachers_class_btn").click(function(){
			var teachers_id = $("select#teachers_name").val();
			var grade_section=$("#grade_section").val();
			var Type_of_teacher=$("#Type_of_teacher").val();
			var subjects=$("#subjects").val();
			var school_year=$("#school_year").val();
			var begin_time=$("#begin_time").val();
			var end_time=$("#end_time").val();
			var day=$("select#day").val();
			
			

			// alert(grade_level);

			$.ajax({
				type   : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url   : 'ajax_teachers_class.php', // the url where we want to POST
				data   : '&teachers_id='+teachers_id+'&grade_section='+grade_section+'&Type_of_teacher='+Type_of_teacher +'&subjects='+subjects+'&school_year='+school_year+'&begin_time='+begin_time+'&end_time='+end_time+'&day='+day, // our data object
				dataType : 'json', 
				encode     : true,
				})
				.done(function(data) {
					if(data.result === true){
						alert(' ' + teachers_id + ' has been successfully assigned');
					} else {
						alert('date and time is already taken');

					}

			});


		});


</script> -->