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
    

                      <h1 align="center">
                        Register teacher
                      </h1>
                       <div class="one_third first">
                <form name="add_teacher" action="" method="POST" >

          
                   <label>*Last Name: </label>
                    <input type="text" name="teachers_lname" pattern="[A-Za-z]{2,10}">
                      
                    <label>*First Name: </label>
                    <input type="text" name="teachers_fname" pattern="[A-Za-z]{2,10}">
                      
                    <label>*Middle Name: </label>
                    <input type="text" name="teachers_mname" pattern="[A-Za-z]{1,10}">
                     
                                      
                    
                    <label>*Birthday: </label>
                    <input type="text" id="teachers_bday" name="teachers_bday" placeholder="YYYY-MM-DD" readonly="true">
                    </tr>
                    
                    <label>*Age: </label>
                    <input type="text" id="teachers_age" name="teachers_age" readonly="true">
                 
                   <label>*Gender: </label>
                    <select name="teachers_gender">
                            <option value="male">Male</option>
                            <option value="female"> female</option>
                          </select>
                   
                   <label>*Address: </label>
                    <input type="text" name="teachers_address" pattern="[A-Za-z]{2,20}">
                   <label>Status:</label>
                    <select name="Status">
                      <option value="single">single</option>
                      <option value="married">married</option>
                      <option value="widow">widow</option>
                    </select>
                    <br>

                   </div>
                    
               <div class="one_third">
                          <fieldset id="datas2">
                          Field of Concentration:
                          <ul class="faico clear">
                            <li><input type="checkbox" name="f_concentration[]" value="E.C.E"></li>
                            <li>Early Childhood Education</li>
                              <br>
                            <li><input type="checkbox" name="f_concentration[]" value="SPED"></li>
                            <li>Special Education</li>
                            <br>
                              <li><input type="checkbox" name="f_concentration[]" value="general_education"></li>
                            <li>General Education</li>
                            <br>
                              <li><input type="checkbox" name="f_concentration[]" value="English"></li>
                            <li>English</li>
                            <br>
                              <li><input type="checkbox" name="f_concentration[]" value="Math"></li>
                            <li>Mathematics</li>
                            <br>
                              <li><input type="checkbox" name="f_concentration[]" value="Science"></li>
                            <li>Science</li>
                            <br>
                              <li><input type="checkbox" name="f_concentration[]" value="Filipino"></li>
                            <li>Filipino</li>
                            <br>
                              <li><input type="checkbox" name="f_concentration[]" value="SocSCI"></li>
                            <li>Social Studies</li>
                            <br>
                              <li><input type="checkbox" name="f_concentration[]" value="MAPEH"></li>
                            <li>MAPEH</li>
                            <br>
                              <li><input type="checkbox" name="f_concentration[]" value="Home_eco"></li>
                            <li>Home Economics</li>
                            
                            </ul>

                          </fieldset>
                          </div>
                   <div class="one_third">
                     
                  Teachers Achievments
                  <input type="checkbox" name="Achievements" id="Achievements">
                  <fieldset id="datas">
                  <label> Bachelor in elementary education graduate:</label>
                   <ul class="faico clear">
                   
                   <li><input type="checkbox" name="bachelor" value="BEED"></li>
                   <li>Yes</li>
                   </ul>
                   <ul class="faico clear">
                   
                  <li> <input type="checkbox" name="grad" id="grad"></li>
                  <li>No</li>
                  </ul>
                    <textarea name="course" id="course"></textarea>
                  <!-- <input type="textarea" size="22" name="course" id="course"> -->
                  <br>
                  DID teacher take LET EXAM?
                  <ul class="faico clear">
                  <li>Yes<input type="radio" name="let" value="yes"></li>
                  <li>No<input type="radio" name="let" value="No"></li>
                  </ul>
                  <br>
                  doctorate:
                  <input type="checkbox" name="doc" id="doc">
                  <textarea name="doctorate" id="doctorate"></textarea>
                  <!-- <input type="text" size="22" > -->
                  <br>
                  Masterals:
                  <input type="checkbox" name="mast" id="mast">
                  <textarea name="masteral" id="masteral"></textarea>
                 <!--  <input type="text" size="22" name="masteral" id="masteral"> -->

                  </fieldset>



                    

                    
                        
                       </div>

                       <center><input type="submit" name="save_teacher" value="Add teacher"></center>

                       </form>
              
                         
      <div class="clear"></div>
    </main>
  </div>
				



</div>
</body>
</html>

<?php
if (isset($_POST['save_teacher'])){

		$teachers_lname = ucwords( $_POST["teachers_lname"]);
		$teachers_fname = ucwords($_POST["teachers_fname"]);
		$teachers_mname = ucwords($_POST["teachers_mname"]);
		$teachers_bday = mysqli_real_escape_string($connect,$_POST["teachers_bday"]);
		$teachers_age = mysqli_real_escape_string($connect,$_POST["teachers_age"]);
		$teachers_gender = mysqli_real_escape_string($connect,$_POST["teachers_gender"]);
		$teachers_address = mysqli_real_escape_string($connect,$_POST["teachers_address"]);
     $Status = mysqli_real_escape_string($connect,$_POST["Status"]);
   
  
 if ( empty($_POST['f_concentration'])  || empty($_POST['let']))
    {
  echo '<script>alert("teachers information is required")</script>';
      }else{


 $f_concentration=$_POST["f_concentration"];
    $bachelor=$_POST["bachelor"];
    // $grad=mysqli_real_escape_string($connect,$_POST["grad"]);
    $course=$_POST["course"];
    $let=$_POST["let"];
    // $doc=mysqli_real_escape_string($connect,$_POST["doc"]);
    $doctorate=$_POST["doctorate"];
     //$mast=mysqli_real_escape_string($connect,$_POST["mast"]);
    $masteral=$_POST["masteral"];
//_________________________________________________________________________________________________________________ 

//$s = implode(',', $f_concentration);
//for ($i=0; $i < sizeof($s) ; $i++) { 
  
 //echo $s;
// }
// if (!empty($bachelor)) {
//  echo $bachelor;
// }else{
//   echo "";
// }

// if (!empty($grad)) {
//   //echo $course;
// }
// echo $let;

// ________________________________________________________________________________________________________________________

	$query = "SELECT * FROM teachersinfo WHERE teachers_lname = '$teachers_lname' AND teachers_fname = '$teachers_fname' AND teachers_mname = '$teachers_mname' AND teachers_bday = '$teachers_bday' AND teachers_gender = '$teachers_gender' AND status = '$Status' ";
$result = mysqli_query($connect, $query);  
if(mysqli_num_rows($result) > 0)
{  
	echo '<script>alert("teachers already in the database")</script>';
}  
else  
{ 


	//count_students 
	$count_query = "SELECT COUNT(*) AS total_teachers FROM teachersinfo";
	$result = mysqli_query($connect, $count_query); 
	$row = mysqli_fetch_assoc($result); 

	$total_number_of_teachers = 0;
	if($row["total_teachers"] > 0)
	{  
		$total_number_of_teachers = $row["total_teachers"];
		$teachers_id ="200016" . $total_number_of_teachers++;

	} 
	else
	{
	
		$teachers_id ="200016" . $total_number_of_teachers;
	}
}

      if(empty($_POST["teachers_lname"]) || empty($_POST["teachers_fname"]) || 
	  empty($_POST['teachers_mname']) || empty($_POST['teachers_bday'])){  
           echo '<script>alert("All Fields are required")</script>';  
      }  
      else  
      {  

      	

		$query ="insert into teachersinfo values('$teachers_id', '$teachers_lname', '$teachers_fname', '$teachers_mname', '$teachers_bday', '$teachers_age', '$teachers_gender', '$teachers_address' , '$Status' ,'teacher')";




$s = implode(',', $f_concentration);


 if (isset($bachelor)) {

 $query2 = "INSERT INTO teachers_files(teachers_id,bachelor, masteral,doctorate,f_concentration,LET_passer )
             VALUES ( '$teachers_id','$bachelor', '$masteral', '$doctorate', '$s','$let')";


}else{
  $query2 = "INSERT INTO teachers_files(teachers_id,bachelor, masteral,doctorate,f_concentration,LET_passer)
      VALUES ( '$teachers_id','$course', '$masteral', '$doctorate', '$s','$let')";


 $res= mysqli_query($connect,$query2) or die('Error, query failed'); 
}
		if (mysqli_query($connect, $query)){
			echo '<script>alert("Registration Done")</script>';  
		}

	else{
	
		echo '<script>alert("error inputs")  </script>';	
		}
		}
    }
  }

?>

</head>  
      <body>  
           
           <div class="container" style="width:500px;">  

               


           
          
					
					
				      
                      
             


                  <script src="js/jquery.js"></script>
             
                 <script type="text/javascript" src="js/jquery.mask.js"></script>
                 <script type="text/javascript" src="js/jquery.form.js"></script>
                 <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
                 <link rel='stylesheet' type='text/css' href='js/bootstrap-datepicker.css'>
                 <script type="text/javascript">

    $(document).ready(function () {
        $('#teachers_bday').datepicker({
            'format': 'yyyy-m-d',
            'autoclose': true
        });
         function calculateAge(birthMonth, birthDay, birthYear)
        {
          todayDate = new Date();
          todayYear = todayDate.getFullYear();
          todayMonth = todayDate.getMonth();
          todayDay = todayDate.getDate();
          age = todayYear - birthYear;

          if (todayMonth < birthMonth - 1)
          {
            age--;
          }

          if (birthMonth - 1 == todayMonth && todayDay < birthDay)
          {
            age--;
          }
          return age;
        }

         $('#teachers_bday').on('change', '', function(){
            var bday = $(this).val().split("-");
            if(bday != ""){
                var age = calculateAge(bday[1],bday[2],bday[0]);            
                if(age > 0){
                    $("#teachers_age").val(age);
                }else{
                    $("#teachers_age,#teachers_bday").val("");
                    alert("Invalid date of birth.");
                }
            }
          });
  
    
    $("#datas").hide();
     $("#course").hide();
      $("#masteral").hide();
      $("#doctorate").hide();

     $("#Achievements").click(function () {
      var checked_status = this.checked;
      if(checked_status == true) {
      $("#datas").show();
     
    }else{
      $("#datas").hide();
    }
     
      $("#grad").click(function () {
        var checked_status = this.checked;
        if(checked_status == true) {
           $("#course").show();
        }else{
      $("#course").hide();
    }
         });

        $("#doc").click(function () {
          var checked_status = this.checked;
        if(checked_status == true) {
           $("#doctorate").show();
        }else{
      $("#doctorate").hide();
    }
         });

            $("#mast").click(function () {
          var checked_status = this.checked;
        if(checked_status == true) {
           $("#masteral").show();
        }else{
      $("#masteral").hide();
    }
         });
        });
   // $("#masteral").hide();
   // $("#course").hide();
   // $("#bachelor").hide();

    // $("#clases").click(function () {
    // $("#descripcion").show();
    
    });

        </script>