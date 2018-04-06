<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  
 }  
$t_id = $_GET['id'];

        $sql = "SELECT * FROM teachersinfo WHERE teachers_id = '$t_id' ";
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

        }

         $files = "SELECT * FROM teachers_files WHERE teachers_id = '$t_id' ";
        $result_files = mysqli_query($connect, $files); 

        while ($row = mysqli_fetch_assoc($result_files)) {

          $bachelor =  $row['bachelor'];
          $masteral =  $row['masteral'];
          $doctorate =  $row['doctorate'];
          $f_concentration[] = $row['f_concentration'];
          $LET_passer =  $row['LET_passer'];
      
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
    
      <!-- <input type="text" name="teachers_id" id="teachers_id" -->
      <br>
      <!-- <button id="search">Search</button> -->
                      <h1 align="center">
                      Update Teacher
                      </h1>
                
 <div class="one_third first">
                <form name="add_teacher" action="teacher_update.php" method="POST" >
                <input type="hidden" name="teachers_id" id="teachers_id" value="<?php echo $t_id; ?>">
          
                    <tr><td width= 1000px><label>*Last Name: </label></td>
                    <td><input type="text" name="teachers_lname" id="teachers_lname" value="<?php echo $lname; ?>"></td></tr>
                      
                     <tr><td><label>*First Name: </label></td>
                    <td><input type="text" name="teachers_fname" id="teachers_fname" value="<?php echo $fname; ?>"></td></tr>
                      
                     <tr><td><label>*Middle Name: </label></td>
                    <td><input type="text" name="teachers_mname" id="teachers_mname" value="<?php echo $mname; ?>"></td></tr>
                     
                                      
                    
                    <tr><td> <label for="field1">*Birthday: </label></td>
                    <td><input type="date" id="teachers_bday" name="teachers_bday" value="<?php echo $bday; ?>"></td></tr>
                    
                     <tr><td><label>*Age: </label></td>
                    <td><input type="text" id="teachers_age" name="teachers_age" value="<?php echo $age; ?>"></td></tr>
                 
                    <tr><td><label>*Gender: </label></td>
                    <td><select name="teachers_gender" id="teachers_gender" >

                            <option value="male" <?php if ($gender == 'male') { echo "selected"; }?>>Male</option>
                            <option value="female" <?php if ($gender == 'female') { echo "selected"; }?>> female</option>
                          </select></td></tr>
                   
                    <tr><td><label>*Address: </label></td>
                    <td><input type="text" name="teachers_address" id="teachers_address" value="<?php echo $address; ?>"></td></tr>
                    <tr><td><label>Status:</label></td></tr>
                    <td><select name="Status" id="Status">
                      <option value="single" <?php if ($status == 'single') { echo "selected"; }?>>single</option>
                      <option value="married" <?php if ($status == 'married') { echo "selected"; }?>>married</option>
                      <option value="widow" <?php if ($status == 'widow') { echo "selected"; }?>>widow</option>
                    </select></td>
                    
                    

            
          </div>
                      <div class="one_third">
                          <fieldset id="datas2">
                          Field of Concentration:
                          <ul class="faico clear">
                     
                            <li><input type="checkbox" name="f_concentration[]" id="f_concentration[]" value="E.C.E" ></li>
                            <li>Early Childhood Education</li>
                              <br>
                            <li><input type="checkbox" name="f_concentration[]" id="f_concentration[]" value="SPED"></li>
                            <li>Special Education</li>
                            <br>
                              <li><input type="checkbox" name="f_concentration[]" id="f_concentration[]" value="general_education"></li>
                            <li>General Education</li>
                            <br>
                              <li><input type="checkbox" name="f_concentration[]" id="f_concentration[]" value="English"></li>
                            <li>English</li>
                            <br>
                              <li><input type="checkbox" name="f_concentration[]" id="f_concentration[]" value="Math"></li>
                            <li>Mathematics</li>
                            <br>
                              <li><input type="checkbox" name="f_concentration[]" id="f_concentration[]" value="Science"></li>
                            <li>Science</li>
                            <br>
                              <li><input type="checkbox" name="f_concentration[]" id="f_concentration[]" value="Filipino"></li>
                            <li>Filipino</li>
                            <br>
                              <li><input type="checkbox" name="f_concentration[]" id="f_concentration[]" value="SocSCI"></li>
                            <li>Social Studies</li>
                            <br>
                              <li><input type="checkbox" name="f_concentration[]" id="f_concentration[]" value="MAPEH"></li>
                            <li>MAPEH</li>
                            <br>
                              <li><input type="checkbox" name="f_concentration[]" id="f_concentration[]" value="Home_eco"></li>
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
                   
                   <li><input type="checkbox" name="bachelor" value="BEED" <?php if (@$bachelor == 'BEED') {
                    echo 'checked'; } ?>></li>
                   <li>Yes</li>
                   </ul>
                   <ul class="faico clear">
                   
                  <li> <input type="checkbox" name="grad" id="grad"></li>
                  <li>No</li>
                  </ul>
                    <textarea name="course" id="course">
                    <?php if (@$bachelor != 'BEED') { echo @$bachelor; }?>
                      
                    </textarea>
                  <!-- <input type="textarea" size="22" name="course" id="course"> -->
                  <br>
                  DID teacher take LET EXAM?
                  <ul class="faico clear">
                  <li>Yes<input type="radio" name="let" value="yes" <?php if (@$LET_passer == 'yes') { echo 'checked'; }?>></li>
                  <li>No<input type="radio" name="let" value="No"  <?php if (@$LET_passer == 'No') { echo 'checked'; }?>></li>
                  </ul>
                  <br>
                  doctorate:
                  <input type="checkbox" name="doc" id="doc">
                  <input type="text" name="doctorate" value="<?php echo @$doctorate; ?>">
                  <!-- <textarea name="doctorate" id="doctorate">
                    <?php if (@$doctorate != '') { echo @$doctorate; }?>
                  </textarea> -->
                  <!-- <input type="text" size="22" > -->
                  <br>
                  Masterals:
                  <input type="checkbox" name="mast" id="mast">
                   <input type="text" name="masteral" value="<?php echo @$masteral; ?>">
                 <!--  <textarea name="masteral" id="masteral">
                     <?php if (@$masteral != '') { echo @$masteral; }?>
                  </textarea>
                  -->
                  </fieldset>



                    

                    
                        
                       </div>
                        
                      <tr><td align= "center" colspan = 2><center><input type="submit" name=update_teacher" value="Update teacher"></center></td></tr>

                       </form>
              

      <div class="clear"></div>
    </main>
  </div>
				



</div>
</body>
</html>



                  <!-- <script src="js/jquery.js"></script> -->
             
                  <!-- <script type="text/javascript" src="js/jquery.mask.js"></script>
                 <script type="text/javascript" src="js/jquery.form.js"></script>
               <script type="text/javascript" src="js/bootstrap-datepicker.js"></script> -->
                <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
              <!--  <link rel="stylesheet" type="text/css" href="js/bootstrap-datepicker.css" /> -->
               <script type="text/javascript">




// 

    //   $(document).on("click", "button#search", function(){
    //         $("#search").click(function(){
      
    //   var teachers_id = $("#teachers_id").val();

    //   var teachers_lname =  $("#teachers_lname").val();
    //   var teachers_fname =  $("#teachers_fname").val();
    //   var teachers_mname =  $("#teachers_mname").val();
    //   var teachers_bday =  $("#teachers_bday").val();
    //   var teachers_age =  $("#teachers_age").val();
    //   var teachers_gender =  $("#teachers_gender").val();
    //   var teachers_address = $("#teachers_address").val();
    //   var Status =        $("#Status").val(); 
    //   var bachelor = $("#bachelor").val();


    //   $.ajax({
    //     type   : 'POST', // define the type of HTTP verb we want to use (POST for our form)
    //     url   : 'ajax_search.php', // the url where we want to POST
    //     data   : 'teachers_id='+teachers_id, // our data object
    //     dataType : 'json', 
    //     encode     : true,
    //     })
    //       .done(function(data) {

          
        

          
   
    //   });
    // });
    
  

  
    //     </script>