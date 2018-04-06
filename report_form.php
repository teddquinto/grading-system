  <?php

require "required_files.php";
require_once ("functions/functions.php");


if(!isset($_SESSION["teachers_id"]))  
 {  

  
      header("location:login.php?action=login"); 


 } 
$grade_level = $_SESSION["glevel_section"]; 
 $teachers_id = $_SESSION["teachers_id"]; 
    $t_type= $_GET['t'];
     $g_level = $_GET['g'];
$query = "SELECT distinct glevel_section,type_of_teacher FROM teachers_class where teachers_id LIKE '%$teachers_id%' ";    
           $result = mysqli_query($connect, $query);  



                  $find_student="SELECT DISTINCT  SI.studno, SI.lname, SI.fname, SI.mname
                   FROM studentinfo SI, student_record SR, teachers_class TC
                   WHERE SI.studno = SR.studno
                   AND   TC.glevel_section = (SELECT DISTINCT CONCAT(SR.grade_level, '-', SR.section) FROM student_record)
                   AND   TC.teachers_id LIKE '%$teachers_id%'
                   AND TC.glevel_section LIKE '%$g_level%'
                    AND TC.glevel_section LIKE '%$g_level%'
                          AND SR.school_year = TC.school_year
                           ORDER by SI.lname ASC  ";                      
           $student_result = mysqli_query($connect, $find_student);  
?>  

  

<!DOCTYPE html>  
  <html>
 <head>




 <link rel="stylesheet" type="text/css" href="js/bootstrap.css">
 <script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>




<div class='wrapper row0'>
 <div id='topbar' class='clear'> 
<nav>
 <ul>
 
  <li><?php echo $_SESSION['lname'].',',$_SESSION['fname'].' ', $_SESSION['mname'];?></li>
 <li><a href='logout2.php'>logout</a></li>
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
  <ul class="clear">

                  <?php  while ($row= mysqli_fetch_assoc($result)){?>
                   <?php $_SESSION['glevel_section'] = $row['glevel_section'];
                   $_SESSION['t_type'] = $row['type_of_teacher'];?>

                  <li><a href="class_handled.php?g=<?php echo $_SESSION['glevel_section'];?>&t=<?php echo $_SESSION['t_type'];?>"><?php echo $_SESSION['glevel_section'];  ?></a></li>
                 <?php }?>
               
                </ul>    
                  
                </div>

    </nav>
  </div>
</div>
 <div class="wrapper row3">
  <div class="rounded">
    <main class="container clear">

         <div class="sidebar one_quarter first"> 
          <h4>SIDE BAR</h4>
          <nav class="sdb_holder">
          <ul>
          <li><a href="class.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">ADD GRADE
          </a></li>
          <ul>
          <li><a href="report_card_learners_values.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">ADD LEARNER'S VALUES
          </a></li>
          </ul>
          <li><a href="report.php?g=<?php echo $g_level;?>&t=<?php echo $t_type;?>">STUDENTS REPORT CARD
          </a></li>
         
          </ul>
          </nav>
          </div>

               <div id="content" class="three_quarter"> 
                 <div id="class">
                  <form>
                 <table>
                  <tr><th>CLass</th><th colspan="3">Type</th></tr>
                  <tr>
                   <td><?php echo $g_level; ?></td>
                
                 <td colspan="3"><?php echo $t_type;?></td>
                                    
                 </tr>                 
                 <tr><td><h3> lastname </h3></td><td><h3> firstnmae </h3></td><td><h3> Middlename </h3></td>
                  <td><h3> Add student values </h3></td></tr>      
                  <?php  while ($row= mysqli_fetch_array($student_result, MYSQLI_ASSOC)){
                     $lname =$row['lname'];
                    $fname =$row['fname'];
                    $mname =$row['mname'];?>  

                  <tr>
                 
                  <td> <?php echo $row['lname']; ?> </td>
                  <td> <?php echo $row['fname']; ?> </td>
                  <td> <?php echo $row['mname']; ?> </td>          
                   <td><a href="report_form.php?l=<?php echo $lname." ".$fname." ".$mname; ?>&id=<?php echo $row['lname']; ?>&id=<?php echo $row['studno']; ?>&g=<?php echo $g_level;?>&t=<?php echo $t_type;?>"><center><img src="images/add.png" style="width: 70px; height: 40px;" ></center></a> </td>      
                  </tr>
                  <?php $_SESSION['studno']= $row['studno']; ?>
                  <?php }?>                  
                  </table>
                  </form>
                  </div>

                


    </main>
  </div>
</div>

<div class="wrapper row3">
<div class="rounded">
<main class="container clear"> 
      <div name="student_grade_info" id="student_grade_info">
     
      <?php $id =$_GET['id']?> 
      <?php $lname2 =$_GET['l']?>
      <form action="add_values.php?i=<?php echo $id;?>&g=<?php echo $g_level;?>&t=<?php echo $t_type;?>&l=<?php echo $lname2;?>" method="POST">

       <table>
      <tr><td  colspan='7'><center><h1>REPORT ON LEARNER'S OBSERVED VALUES</h1></center></td><tr>
      <tr><td colspan='7'><?php echo $lname2; ?></td></tr>
      <tr>
      <td rowspan="2"><h2> Core Values </h2></td>
      <td rowspan="2"><h2>  Behavior statements </h2></td>
      <td colspan="4"><h2> Quarter  </h2> 
      <select name="quarter">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select></td>
      <td> </td>
      </tr>
      
      <tr>

      <td width="50">Always Observed</td>
      <td width="50">Sometimes Observed</td>
      <td width="50">Rarely Observed</td>
      <td width="50">Not Observed</td>
       </tr>
        
    <?php $values_query= "SELECT DISTINCT b.BS_id,b.B_statements,c.core_values
    from behavior_statements as b, core_values as c
    where c.core_id=b.core_id";  
     $result = mysqli_query($connect, $values_query); 
     while ($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){
      ?>
        
        <?php $_SESSION['bs_id']=$row['BS_id'];

       
        $_SESSION['core_values']= $row['core_values'] ;
         $_SESSION['B_statements']= $row['B_statements'];
       ?>

      <tr>
        <td>
          <?php echo $_SESSION['core_values']; ?>
        </td>
        <td>
          <?php echo $_SESSION['bs_id']." ".$_SESSION['B_statements']; ?>
          <input type="text" name="b_id" value="<?php echo $_SESSION['bs_id']; ?>" hidden="true">
        </td>
        <td>
          <input type="radio" name=" <?php echo  $_SESSION['bs_id']; ?>" value=" AO">
        </td>
         <td>
          <input type="radio" name=" <?php echo  $_SESSION['bs_id']; ?>" value="SO">
        </td>
         <td>
          <input type="radio" name=" <?php echo  $_SESSION['bs_id']; ?>" value=" RO">
        </td>
         <td>
          <input type="radio" name=" <?php echo  $_SESSION['bs_id']; ?>" value=" NO">
        </td>
        <?php }?>

          
      </tr>     


       
       
       
         </table>
           <input type="submit" name="proceed" value="Submit">
      </form>


    
      </div>

    

            
<div class="clear"></div>
</main>
</div>
</div>
                
               
                           
      </body>  
 </html>   
<script type="text/javascript">
    var has_error = "<?php echo isset($_GET["has_error"]); ?>";

    if (has_error == 1) {

      var r = confirm("student already has values.");
      if (r == true) {
        window.location.href = "#";
      } else {
        window.location.href = "#";
    }
    }

</script>


