<?php

require "required_files.php";
  require_once ("functions/functions.php");

   
if(!isset($_SESSION["teachers_id"]))  
 {  

  
      header("location:login.php?action=login"); 

 } 
 $teachers_id = $_SESSION["teachers_id"]; 
 $query = "SELECT distinct glevel_section,type_of_teacher FROM teachers_class where teachers_id LIKE '%$teachers_id%' ";    
           $result = mysqli_query($connect, $query);  

 $studno = $_GET['id'];

             $g_level2 = "SELECT g.g_id,g.grade_name,s.grade_level FROM g_level as g,student_record as s
             WHERE g.grade_name=s.grade_level AND s.studno = '$studno' ";
              $result_g2 = mysqli_query($connect, $g_level2); 
                while ($row= mysqli_fetch_array($result_g2, MYSQLI_ASSOC)){

                 $g_id = $row['g_id'];
                 //echo $g_id;
              }

             //   $section2= "SELECT g.sec_id,g.sec_name,s.section FROM sections as g, student_record as s
             // WHERE g.sec_name=s.section AND s.studno = '$studno' ";
             //  $result_sec2 = mysqli_query($connect, $section2); 
             //  while ($row= mysqli_fetch_array($result_sec2, MYSQLI_ASSOC)){

             //     $sec_id = $row['sec_id'];
             //     //echo $sec_id;
             //  }

            @$cat=$_GET['g_id']; 
            if(strlen($cat) > 0 and !is_numeric($cat)){ 
            echo "Data Error";
            exit;
            }

           $g_level = "SELECT * FROM g_level WHERE g_id = '$g_id' ";           
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
     self.location='repeater.php?id=<?php echo $studno; ?>&g_id=' + val ;
     }

</script>


<div class='wrapper row0'>
 <div id='topbar' class='clear'> 
<nav>
 <ul>
 
  <li><?php echo $_SESSION['lname'].',',$_SESSION['fname'].' ', $_SESSION['mname'];?></li>
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


            <form method=post name=f1 action='repeater.php?id=<?php echo $studno; ?>'>
          
                 
            <select class="grade_option"  onchange="reload(this.form)" name="grade_option">
                <?php  //while ($row= mysqli_fetch_array($result_g, MYSQLI_ASSOC)){?>
                <option>----- ------</option>
                <?php foreach ( $result_g  as $row) {
                       if($row['g_id']==@$cat){echo "<option selected value='$row[g_id]'>$row[grade_name]</option>"."<BR>";}
                       else{echo  "<option value='$row[g_id]'>$row[grade_name]</option>";}
                       }?>
                <?php //}?>         
            </select>

                        <select class="section" >
                        <option>----- ------</option>

                        <?php //while ($row= mysqli_fetch_array($result_sec, MYSQLI_ASSOC)){?>
                       
                        <?php foreach ($result_sec as $rows) {
                           echo  "<option value='$rows[sec_name]'>$rows[sec_name]</option>";
                           }?>


                        <?php //}?>
            </select>   
            <?php $sy = get_current_year() + 1;
            $ssy= get_current_year() ."-". $sy; 
            ?>
            <input type="text" id="school_year" placeholder="schoolyear" value="<?php echo $ssy;?>">
            
                    
            <input type="text" id="student_num" placeholder="Enter Student No." value="<?php echo  $studno;?>">

            <br>
            <button id="enroll_student_btn">Enroll</button>
            </div>
            </form>
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


        
        



        $("#enroll_student_btn").click(function(){
            var grade_level=$(".grade_option").val();
            var section=$(".section").val();
            var school_year=$("#school_year").val();
            var studno=$("#student_num").val();

            // alert(grade_level);

            $.ajax({
                type   : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url   : 'ajax_enroll.php?id=$studno', // the url where we want to POST
                data   : 'grade_level='+grade_level+'&section='+section+'&school_year='+school_year +'&studno='+studno, // our data object
                dataType : 'json', 
                encode     : true,
                })
                .done(function(data) {
                    
                    if(data.result === true){
                        alert('student ' + studno + ' has been successfully enrolled');
                    } else {
                        alert("error")
                    }

            });


        });

    });
</script>

