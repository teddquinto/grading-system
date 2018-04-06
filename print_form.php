<?php

require "required_files.php";
require_once ("functions/functions.php");

$studno = $_GET['id'];
$g_level =$_GET['g'];  
          
           $find_subjects = "SELECT DISTINCT subjects
          FROM student_gradee WHERE glevel_section = '$g_level'";
         $student_subjects = mysqli_query($connect, $find_subjects);
         while($row= mysqli_fetch_array($student_subjects, MYSQLI_ASSOC)){
          
          $subjects[] = $row['subjects'];         

        }

   $find_student = "SELECT studno,lname,fname,mname,age,gender from studentinfo
         WHERE studno = '$studno' ";
        $student_result = mysqli_query($connect, $find_student);
        while ($row= mysqli_fetch_array($student_result, MYSQLI_ASSOC)){
          $studno = $row['studno'];
          $lname= $row['lname'];
          $fname= $row['fname'];
          $mname= $row['mname'];
          $age = $row['age'];
          $gender= $row['gender'];
                    }
    $find_grade = "SELECT grade_level,section,school_year from student_record
         WHERE studno = '$studno' ";
         $grade_level_result = mysqli_query($connect, $find_grade);
        while ($row= mysqli_fetch_array($grade_level_result, MYSQLI_ASSOC)){
          $grade_level = $row['grade_level'];
          $section = $row['section'];
          $school_year = $row['school_year'];
        }


 // $find_student_grade = "SELECT subject,1st_periodical_test,2nd_periodical_test,
 //        3rd_periodical_test,4th_periodical_test,gen_avee ,IF(gen_avee >= 75, 'PASS', 'FAIL') as status 
 //         FROM student_grade WHERE studno = '$studno' ";
 //        $student_grade_result = mysqli_query($connect, $find_student_grade);

 $values_query= "SELECT b.BS_id,b.B_statements,c.core_values from behavior_statements as b, core_values as c     
        where c.core_id=b.core_id ";  
       $result = mysqli_query($connect, $values_query); 
       while ($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){

        $bs_id [] =$row['BS_id'];
        $core_values[] = $row['core_values'] ;
        $B_statements[] = $row['B_statements'];
        //$obs_res1[]= $row['observance_results'];
       }
        $values_quarter_query = "SELECT observance_results FROM student_values WHERE studno= '$studno' AND quarter= 1 ";
          $result3 = mysqli_query($connect, $values_quarter_query);
            while ($row= mysqli_fetch_array($result3, MYSQLI_ASSOC)){
              $obs_res1[]= $row['observance_results'];
            }
       $values_quarter2_query = "SELECT observance_results FROM student_values WHERE studno= '$studno' AND quarter= 2 ";
          $result2 = mysqli_query($connect, $values_quarter2_query);
            while ($row= mysqli_fetch_array($result2, MYSQLI_ASSOC)){
              $obs_res2[]= $row['observance_results'];
            }

             $values_quarter2_query = "SELECT observance_results FROM student_values WHERE studno= '$studno' AND quarter= 3 ";
          $result3 = mysqli_query($connect, $values_quarter2_query);
            while ($row= mysqli_fetch_array($result3, MYSQLI_ASSOC)){
              $obs_res3[]= $row['observance_results'];
            }

             $values_quarter2_query = "SELECT observance_results FROM student_values WHERE studno= '$studno' AND quarter= 4 ";
          $result4 = mysqli_query($connect, $values_quarter2_query);
            while ($row= mysqli_fetch_array($result4, MYSQLI_ASSOC)){
              $obs_res4[]= $row['observance_results'];
            }
      


$front_page = '
<html>
<body>
<style>
body {
  font-size: 11px;
}
</style>

<center><img src="pic.jpg" style="width:65px;height:65px;"><img src="pic2.jpg" style="width:65px;height:65px;"></center>

<p style= "font-size:11px; " ><center>Republic of the Philippines<br>
Department of Education<br>
National Capital Region<br>
Divison of City Schools<br>
MANILA
<br>________________ <br>DISTRICT</p>
<br><h3>Gregorio Del Pilar</h3>

SCHOOL';


  
$front_page.='<p align="left">Name:<u width="15"> '; 
$front_page.= $lname .", ".$fname ." ".$mname."";
$front_page.='<br>
<p align="left">Age:                                 ';
$front_page.=$age;
$front_page.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Sex:   ';
$front_page.=$gender;
$front_page.='<br>
<p align="left">Grade:     ';
$front_page .=$grade_level;
$front_page .=' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Section:';
$front_page.=$section;
$front_page.='<br>
<p align="left">School Year:    ';
$front_page.=$school_year;
$front_page.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student Number:  ';
$front_page.=$studno;

$front_page.='<p align="left">Dear Parent:<br>
This report card shows the ability and progress your child has
made in the different learning areas as well as his/her core values.
The school welcomes you should you desire to know more about
your child\'s progress.</p><br>

_________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  __________________________
<br>Principal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Teacher
  
<p align="center"> Certificate of Transfer<br>
<p align="left">  Admitted to Grade: ___________________ Section: _________________________
<p align="left"> 
 Eligibility for Admission to Grade: ____________________________________
<br>  Approved:<br>

________________________
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ___________________________
<p align="left">Teacher &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Principal<br>

<p align="left">Cancellation of Eligibility to Transfer
<p align="left">  Admitted in: ____________________________
<p align="left"> Date: _________________________________<br>


<p align="right">Principal___________________________</p>



  

<pagebreak />
</body>
</html>
';

$back_page='
<html>
<head>
<style>
table {
    empty-cells: show;
    border: 1px solid #000;
}

table td,
table th {
    min-width: 2em;
    min-height: 2em;
    border: 1px solid #000;
}
</style>


<center><table>
<p> <b>REPORT ON ATTENDANCE
    <thead>
        <tr>
           <th rowspan="2"></th>
            
        </tr>
        <tr>
           <td>Jun</td>
            <td>Jul</td>
            <td>Aug</td>
            <td>Sept</td>
             <td>Oct</td>
            <td>Nov</td>
            <td>Dec</td>
            <td>Jan</td>
            <td>Feb</td>
            <td>Mar</td>
            <td>Total</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>No of <br> school days</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
<td></td>
         </tr>
         <tr>
            <td>No of <br> days present</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
<td></td>
         </tr>
         <tr>
            <td>No <br> of days absent</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
<td></td>
         </tr>
    </tbody>
</table>
</table>
<br><br>

<center><b> PARENT/GUARDIAN\'S SIGNATURE

<p align="left"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1st Quarter ___________________________

<p align="left"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2nd Quarter ___________________________

<p align="left"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3rd Quarter ___________________________

<p align="left"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4th Quarter ___________________________

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>



';

 $header ='
 <!--mpdf
 <style>
 table{
 	border: 1px solid black ;
  border-spacing:0;
  width:150px;
  height: 150px;
 }
  table,td,tr{
 	border: 1px solid black ;
  border-spacing:0;
  font-size:11px;
 }



	</style>
<div name="grade">
  
      <h3>REPORT ON LEARNER\'S PROGRESS AND  ACHIEVMENTS</h3>		
      <table  width="40">
    
      <tr>
      <td  rowspan="2"><h2>  Learning Areas </h2></td>
      <td  colspan="4"><h2>  Periodical Rating </h2></td>
      <td  rowspan="2"><h2>  Final Rating  </h2></td>
      </tr>

      <tr >
      <td  width="50">1</td>
      <td  width="50">2</td>
      <td  width="50">3</td>
      <td  width="50">4</td>
     </tr>'; 

      for ($i=0; $i < count($subjects); $i++) {              
       $header .='<tr><td>';          
       $header .= $subjects[$i];
       $header .= '</td>';
     
    
            $find_student_grade = "SELECT grades 
            FROM student_gradee WHERE studno = '$studno' AND glevel_section = '$g_level' AND grading_period=1
            AND subjects='$subjects[$i]'";
            $student_grade_result = mysqli_query($connect, $find_student_grade);
            while($row= mysqli_fetch_array($student_grade_result, MYSQLI_ASSOC)){        
            $grades[] = $row['grades'];
        }
       
         if(empty($grades) || @$grades[$i] == 0){
         $header .='<td></td>';
         $header .='</td>';
          }else{
         
          $header .= '<td>';        
          $header .= $grades[$i];  
          }
           $find_student_grade2 = "SELECT grades 
           FROM student_gradee WHERE studno = '$studno' AND glevel_section = '$g_level' 
           AND grading_period=2 AND subjects = '$subjects[$i]'";
           $student_grade_result2 = mysqli_query($connect, $find_student_grade2);
           while($row= mysqli_fetch_array($student_grade_result2, MYSQLI_ASSOC)){       
           $sec[] = $row['grades'];
        }
         if( !isset($sec) || @$sec[$i] === null ){

        $header .= '<td></td>';
        $header .= '</td>';
     
          }else{
           $header .='<td>';        
           $header .=$sec[$i] ; 
         
        }
            $find_student_grade3 = "SELECT grades 
            FROM student_gradee WHERE studno = '$studno' AND glevel_section = '$g_level' 
            AND grading_period=3 AND subjects='$subjects[$i]'";
            $student_grade_result3 = mysqli_query($connect, $find_student_grade3);
            while($row= mysqli_fetch_array($student_grade_result3, MYSQLI_ASSOC)){
            $third[] = $row['grades'];
        }

         if(empty($third) || @$third[$i] === null){
            $header .= '<td></td>';
        $header .= '</td>';
          }else{
          
         $header .= '<td>';        
         $header .= $third[$i] ;
                
        }
          $find_student_grade4 = "SELECT grades 
          FROM student_gradee WHERE studno = '$studno' AND glevel_section = '$g_level' 
          AND grading_period=4 AND subjects='$subjects[$i]'";
         $student_grade_result4 = mysqli_query($connect, $find_student_grade4);
         while($row= mysqli_fetch_array($student_grade_result4, MYSQLI_ASSOC)){
         
          $fourth[] = $row['grades'];

        }

         if(empty($fourth) || @$fourth[$i] === null){
         $header .= '<td></td>';
         $header .= '</td>'; 
          }else{
          
           $header .= '<td>';        
           $header .= $fourth[$i] ; 
           
        }
   
        if (   @$grades[$i] === null || @$sec[$i] === null || @$third[$i] === null ||@$fourth[$i] === null) {
        $header .= "<td> </td>";
        }else{
        $total_ave = ($grades[$i] + $sec[$i] + $third[$i] + $fourth[$i] )/ 4 ;
        $header .= "<td>$total_ave </td>";
        }
         
      //   if (   @$grades[$i] === null || @$sec[$i] === null || @$third[$i] === null ||@$fourth[$i] === null) {
      //   $header .= "<td> </td>";
          
      // }else{
      //   if ($total_ave <= 75) {
      //     $header .= "<td>FAIL</td>";
      //   }else{
      //     $header .= "<td>PASS</td>";
      //   }
      // }
      //   }  
        
        }
         $header .='</tr>';
       $header .='</tr><tr><td>General Average:</td>';
           $n= 12;
          if(!isset($grades) || count($grades) != $n ){ 
           
           
         $header .='<td></td>';
          }else{
           $first_gen  = array_sum($grades)/$n;
           $first_gen2= number_format((float) $first_gen, 2, '.', '');
          $header .= "<td> $first_gen2 </td>";
          }
            if(!isset($sec) || count($sec) != $n){ 
             
           $header .='<td></td>';
            }else{
            $second_gen = array_sum($sec)/$n;
            $second_gen2= number_format((float) $second_gen, 2, '.', '');
            $header .= "<td> $second_gen2 </td>";
            }
              
            if(!isset($third) || count($third) != $n){ 
             
           $header .='<td></td>';
            }else{
            $third_gen = array_sum($third)/$n;
             $third_gen2= number_format((float) $third_gen, 2, '.', '');
            $header .= "<td> $third_gen2 </td>";
            }
            if(!isset($fourth) || count($fourth) != $n){ 
             
           $header .='<td></td>';
            }else{
            $fourth_gen = array_sum($fourth)/$n;
             $fourth_gen2= number_format((float) $fourth_gen, 2, '.', '');
            $header .= "<td> $fourth_gen2 </td>";
            }
            if (!isset($first_gen2) || !isset($second_gen2) || !isset($third_gen2) || !isset($fourth_gen2)) {
              $header .= "<td></td>";
            }else{
            $general_average = ($first_gen + $second_gen + $third_gen + $fourth_gen) / 4;
             $general_average2= number_format((float) $general_average, 2, '.', '');
            $header .= "<td> $general_average2 </td>";
            //  if (isset($general_average) >= 75) {
            //   $header .= "<td> PASS </td>";
            // }else{
            //   $header .= "<td> FAIL </td></tr></table>";
            // }
          }
        

  $header.="</table>
  <br>
  <br>
  <table>

     <tr>
    <th>Descriptors</th>
    <th>Grading Scale</th>
    <th>Remarks</th>
  </tr>
  <tr>
    <td>Outsanding</td>
    <td>90-100</td>
    <td>PASSED</td>
  </tr>
  <tr>
    <td>Very Satisfactory</td>
    <td>85-89</td>
    <td>PASSED</td>
  </tr>
  <tr>
    <td>Satisfactory</td>
    <td>80-84</td>
    <td>PASSED</td>
  </tr>
  <tr>
    <td>Fairly Satisfactory</td>
    <td>75-79</td>
    <td>PASSED</td>
  </tr>
  <tr>
    <td>Did not Meet With Expectations</td>
    <td>Below 75</td>
    <td>Failed</td>
  </tr>

</table>";
           
             
              
   $header2 ="<div name='obs'>";
  //      $header2 .="</table>";
      

    $header2 .="
    <center><h2>REPORT ON LEARNER'S OBSERVED VALUES</h2></center>
           <table>
       
       <tr>
       <td rowspan='2'><h2> Core Values </h2></td>
      
       <td colspan='4'><h2> Quarter  </h2></td> 
        <td rowspan='2' width='150' ><h2>  Behavior statements </h2></td>
      </tr>
      <tr>

      <td width='30'>1</td>
      <td width='30'>2</td>
      <td width='30'>3</td>
      <td width='30'>4</td>
       </tr>
       ";
        // while ($row2= mysqli_fetch_array($result, MYSQLI_ASSOC)){

        //  $bs_id =$row['BS_id'];
        //  $core_values= $row2['core_values'] ;
        //  $B_statements= $row2['B_statements'];
        //  $obs_res1= $row2['observance_results'];
        //  $obs_res2= $row2['2nd'];    
        // $obs_res3= $row['3rd'];
for ($i=0; $i < count($bs_id); $i++) { 
        $header2 .= "<tr><td>"; 
       $header2 .=$core_values[$i]; 
     $header2 .='</td>'; 
     
        if(!empty($obs_res1)){
      $header2 .='<td>';
       $header2 .=$obs_res1[$i];
      $header2 .='</td>';
        }else{
      $header2 .='<td>';    
      $header2 .='</td>';
       }
        if(!empty($obs_res2)){
      $header2 .='<td>';
       $header2 .=$obs_res2[$i];
      $header2 .='</td>';
        }else{
      $header2 .='<td>';    
      $header2 .='</td>';
       }
       if(!empty($obs_res3) ){
      $header2 .='<td>';
       $header2 .=$obs_res3[$i];
      $header2 .='</td>';
       }else{
      $header2 .='<td>';    
      $header2 .='</td>';
       }
       if(!empty($obs_res4)){
      $header2 .='<td>';
       $header2 .=$obs_res4[$i];
      $header2 .='</td>';
       }else{
      $header2 .='<td>';     
      $header2 .='</td>';  

            }
             $header2 .='<td>';
       $header2 .=$B_statements[$i];
      $header2 .='</td>';
       
       
  $header2 .= "</tr>";
       }  
             
        
        $header2 .="</table><br><br>";
           
        
          $header2 .="<table>
            <tr>
              <th>Marking</th>
              <th>Non -Numerical Rating</th>
             
            </tr>
           
            <tr>

              <td> <center>AO  </center></td>
              <td><center>Always Observed </center></td>
              
            </tr>
            <tr>
              <td><center>SO</center></td>
              <td><center>Somtimes Observed</center></td>
  
            </tr>
            <tr>
              <td><center>RO</center></td>
              <td><center>rarely Observed</center></td>
             
            </tr>
            <tr>
              <td><center>NO</center></td>
              <td><center>Not Observed</center></td>
               
            </tr>
           
          </table>";
// </body>
//  </html>
      //$letter = '<table border=1><tr><td>asdlasdsadk</td></tr></table>';

require "../mpdf60/mpdf.php";

//include("MPDF53/mpdf.php");
 


$mpdf = new MPDF('','',0,'',10,10,10,1);

$mpdf->AddPage('L','Letter'); 
$mpdf->SetColumns(2,'',1); 
$mpdf->WriteHTML($back_page,0);
$mpdf->WriteHTML($front_page,0);
$mpdf->WriteHTML('<pagebreak/>');
$mpdf->WriteHTML($header,0);
$mpdf->WriteHTML($header2, 0); 

 $mpdf-> Output();
 ?>



          