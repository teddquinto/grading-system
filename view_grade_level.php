<?php

require "required_files.php";
require_once ("functions/functions.php");

 if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  
 } 

		   $query = "SELECT distinct school_year FROM student_record";			
           $result = mysqli_query($connect, $query);  

     //        $g_level = "SELECT * FROM g_level";
		   //  $result_g = mysqli_query($connect, $g_level); 

     //       $sections = "SELECT * FROM sections";
     //       $result_sec = mysqli_query($connect, $sections); 

     @$cat=$_GET['g_id']; 
            if(strlen($cat) > 0 and !is_numeric($cat)){ 
            echo "Data Error";
            exit;
            }

           $g_level = "SELECT * FROM g_level GROUP BY g_id  ";           
           $result_g = mysqli_query($connect, $g_level); 

           // $sections = "SELECT * FROM sections GROUP BY sec_id ";
           // $result_sec = mysqli_query($connect, $sections); 
           if(isset($cat) and strlen($cat) > 0){
           $quer="SELECT * FROM sections WHERE g_id= '$cat' "; 
           //$result_sec = mysqli_query($connect, $sections); 
           }else{$quer="SELECT * FROM sections GROUP BY sec_id"; 
             }
              $result_sec = mysqli_query($connect, $quer);

 ?> 



 

<!DOCTYPE html>
<html>
<body>
 <SCRIPT language=JavaScript>
     function reload(form)
     {
     var val=form.grade_option.options[form.grade_option.options.selectedIndex].value;
     self.location='view_grade_level.php?g_id=' + val ;
     }

</script>
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

<!-- layout of the page || page header -->
<?php
echo layout();
?>


	<!-- NAvigation -->


  <div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="clear"> 
				 
<?php if ($_SESSION["username"] == "admin"){echo navigation();
	}else { echo navigation_principal(); }?>
	<?php echo $_SESSION['username']; ?>
				
	</nav>
  </div>
</div>

	<!-- BODY -->

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 

    

	
    	<div class="sidebar one_quarter first"> 
		  <form method=post name=f1 action=''>
          
              	<label>Grade Level</label>   
            <select class="grade_level_drp_down"  onchange="reload(this.form)" name="grade_option">
                <?php  //while ($row= mysqli_fetch_array($result_g, MYSQLI_ASSOC)){?>
                <option>----- ------</option>
                <?php foreach ( $result_g  as $row) {
                       if($row['g_id']==@$cat){echo "<option selected value='$row[g_id]'>$row[grade_name]</option>"."<BR>";}
                       else{echo  "<option value='$row[g_id]'>$row[grade_name]</option>";}
                       }?>
                     
            </select>

		<br>
		

		</div>
		<div class="sidebar one_quarter"> 
		<label>Section</label>
		 <select class="section" >
                        <option>----- ------</option>

                        <?php //while ($row= mysqli_fetch_array($result_sec, MYSQLI_ASSOC)){?>
                       
                        <?php foreach ($result_sec as $rows) {
                           echo  "<option value='$rows[sec_name]'>$rows[sec_name]</option>";
                           }?>
                           </select>
		</div>
		<div class="sidebar one_quarter">
		<label>School Year</label>
		<select id="search_school_yr">
				<?php  while ($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){?>
				<option> <?php echo $row['school_year'];  ?> 
				</option> <?php }?>
		</select>
		</form>
		</div>
		<br>
		<br>
		<button id="search_grade_lvl_info" > Search </button>

		
		<br>
	

			<br><div id="enrolled_students_box">
		<table class="enrolled_students_tbl" border="1" >

			<thead>
				<tr>
				<th>Student Number</th>
				<th>Name</th>
				<th>Birthday</th>
				<th>Age</th>
				<th>Gender</th>
				<th>Address</th>
				<th>Fathers' Name</th>	
				<th>Mothers' Name</th>
				<th> grade rec</th>
				</tr>
			</thead>
			
		
				<tbody>	
					<tr id="default_data">
						<td>0 Result(s)... </td>

					</tr>	
				<!-- SEARCH RESULT GOES HERE -->
				</tbody>
			
		</table>
		
		</div>
			<button id="print_form" onclick="Clickheretoprint('enrolled_students_box')"> print</button>
			
			

	 <div class="clear"></div>
    </main>
  </div>
</div>			
				
			
			
</body>
</html>

<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		
		//#search_grade_lvl_info
		$(document).on("click", "button#search_grade_lvl_info", function(){
			var grade_level = $(".grade_level_drp_down").val();
			var school_year = $("#search_school_yr").val();
			var section = $(".section").val();		

			$.ajax({
				type   : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url   : 'ajax_display_glevel.php', // the url where we want to POST
				data   : 'grade_level='+grade_level+'&school_year='+school_year+'&section='+section, // our data object
				dataType : 'json', 
				encode     : true,
				})
				.done(function(data) {
					//alert(JSON.stringify(data));
					//alert(data[0].id);
					//alert(data.length);

					var count_result = data.length;
					//if (count_result == 0) {
						$(".enrolled_students_tbl > tbody").html("<tr id='default_data'><td>0 Result(s)...</td></tr>");
					//} else {

						$("#default_data").remove(); //remove default data

						for (var i = 0; i < count_result; i++) {

							var student_info_row = "<tr id ='datag'>";
								student_info_row +=		"<td>"+data[i].studno+"</td>";
								student_info_row +=		"<td>"+data[i].lname+", "+data[i].fname+" "+data[i].mname+"</td>";
								student_info_row +=		"<td>"+data[i].bdate+"</td>";
								student_info_row +=		"<td>"+data[i].age+"</td>";
								student_info_row +=		"<td>"+data[i].gender+"</td>";
								student_info_row +=		"<td>"+data[i].address+"</td>";
								student_info_row +=		"<td>"+data[i].fathername+"</td>";
								student_info_row +=		"<td>"+data[i].mothername+"</td>";
								student_info_row +=		"<td><a href='stud_grade.php?id="+data[i].studno+"&g="+grade_level+"&s="+section+"&sy="+school_year+"'><img src = 'images/sds.jpg'  style='width:30px;height:30px;'></a></td>";
								student_info_row +=	"</tr>";

							$(".enrolled_students_tbl > tbody").append(student_info_row);
							//$(".enrolled_students_tbl > tbody > tr > td ").remove(student_info_row);

					//	}

				
					}
						
			});


		});

      $("#print_form").hide();
        $("#search_grade_lvl_info").click(function () {
        	$("#print_form").show();

        	});


	});	
</script>
  <script language="javascript">

function Clickheretoprint(enrolled_students_box)
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,widtd=900, height=400, left=100, top=25"; 
      var restore_page=document.body.innerHTML;
  var content_vlue = document.getElementById("enrolled_students_box").innerHTML;
  	 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>List of Students</title>'); 
   docprint.document.write('<center><img src=greg.jpg style=width:200px;height:100px;></center>');
   docprint.document.write('</head><body onLoad="self.print()" style="widtd: 900px; font-size:16px; font-family:arial;">');         
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>	


