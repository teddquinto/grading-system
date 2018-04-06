<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  
 }  

  $teachers_id = $_GET['id'];

      $query = "SELECT t.teachers_lname,t.teachers_fname,t.teachers_mname,tf.bachelor,tf.bachelor,tf.masteral,tf.doctorate
      ,tf.f_concentration,tf.LET_passer FROM teachersinfo t,teachers_files tf WHERE t.teachers_id= tf.teachers_id
      AND t.teachers_id = '$teachers_id' ";                  
      $result = mysqli_query($connect, $query);  
       while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){
          $teachers_lname= $row['teachers_lname'];
          $teachers_fname = $row['teachers_fname'];
          $teachers_mname = $row['teachers_mname'];
          $bachelor = $row['bachelor'];
          $masteral = $row['masteral'];
          $doctorate = $row['doctorate'];
          $f_concentration = $row['f_concentration'];
          $LET_passer = $row['LET_passer'];
          
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
     
   <h1>Teachers Information </h1>

   <label><u>Teachers Name:</u></label>
  <?php 
    if (!isset($teachers_lname) || !isset($teachers_fname) || !isset($teachers_mname)) {
      echo 'no data yet';
    }else{
        echo $teachers_lname.", ".$teachers_fname." ".$teachers_mname.'<br>
        <br>';  
        echo '<table>
              <th>BACHELORS DEGREE</th>
              <th>MATERALS DEGREE</th>
              <th>DOCTORATE DEGREE</th>
              <th>FIELD OF CONCENTRATION</th>
              <th>LET PASSER</th>


                      ';
        if ($bachelor == '') {
          echo '<tr><td>NONE</td>';
        }else{
        echo '<tr><td>'.$bachelor.'</td>';
        }
        if ($masteral ==  ' ' ) {
            echo '<td> NONE </td>';
        }else{
        echo '<td>'.$masteral.'</td>';
        }
         if ($doctorate == ' ' ) {
            echo '<td> NONE </td>';
             }else{
        echo '<td>'.$doctorate.'</td>';
      }
        echo '<td>'.str_replace(',', '<br> ', $f_concentration).'</td>';
      echo '<td>'.$LET_passer.'</td></tr>';

      echo '</table>';
    }
        ?>



      <div class="clear"></div>
    </main>
 </div>
  </div>



      
</body>
</html>

