<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  

 }  
  $t_id = $_GET['id']; 
 // $g_level = $_GET['g'];

 
 $teachers_sched = "SELECT subjects,b_time,e_time,day,glevel_section FROM teachers_class where t_id = '$t_id' ";    
                    $result_sched = mysqli_query($connect, $teachers_sched);

           while ($row= mysqli_fetch_array($result_sched, MYSQLI_ASSOC)){
            $sub =$row['subjects'];
            $b_time =$row['b_time'];
            $e_time =$row['e_time'];
            $day = $row['day'];
           }

          

         
          
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
   echo navigation_principal();
  ?>
     
    </nav>
  </div>
</div>



<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear">


            <div class="one_quarter first">
            <input type="hidden" name="t_id" id="t_id" value="<?php echo $t_id; ?>" >

            <label>Subjects</label>
            <select id="subjects" >
            <option value="<?php echo $sub; ?>"><?php echo $sub; ?> </option>
         
            </select>
            </div>    
              <div class="one_quarter">

              <label>Begin Time:</label>
                <input type="time" id="begin_time" name="begin_time" value="<?php echo $b_time; ?>">
                <label>End Time:</label>
                <input type="time" id="end_time" name="end_time" value="<?php echo $e_time; ?>">


                <br>
              <button id="add_teachers_class_btn">Update Schedule</button>

                </div>

                <label>DAY:</label>
                <select name="day" id="day" multiple>
                        <option value="M">Monday</option>
                        <option value="T">Tuesday</option>
                        <option value="W">Wednesday</option>
                        <option value="Thu">Thursday</option>
                        <option value="Fri">Friday</option>
                      </select>
          
          

                </div>  
    </main>
  </div>
</div>


      
</body>
</html>

<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$("#add_teachers_class_btn").click(function(){
      var t_id=$("#t_id").val();
      var subjects=$("#subjects").val();
      var begin_time=$("#begin_time").val();
      var end_time=$("#end_time").val();
      var day=$("select#day").val();
      
      

      // alert(grade_level);

      $.ajax({
        type   : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url   : 'ajax_update_sched.php', // the url where we want to POST
        data   : '&t_id='+t_id+'&subjects='+subjects+'&begin_time='+begin_time+'&end_time='+end_time+'&day='+day, // our data object
        dataType : 'json', 
        encode     : true,
        })
        .done(function(data) {
          if(data.result === true){
            alert(' Class Schedule Has Been Updated');
          } else {
            alert('Error');
          }

      });


    });

</script>
