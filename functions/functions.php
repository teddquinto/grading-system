<?php
    $g_level = "SELECT * FROM g_level";
    $grade_result = mysqli_query($connect, $g_level); 
function layout(){

$output ="<html>";
$output .="<head>";
$output .=	"<title>Software Engineering</title>";
$output .=	"<meta charset='utf-8'>";
$output .=	"<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>";
$output .=	"<link href='layout/styles/layout.css' rel='stylesheet' type='text/css' media='all'>";
$output .=	"</head>";
$output .=	"<body id='op'>";
$output .=	"<div class='wrapper row1'>";
 $output .=	"<header id='header' class='clear'>"; 
 $output .=	"<center><img src='logo1.png' style='width:200px;height:100px;'></center> <br />";
 $output .=	"<div id='logo' class='fl_left'>";
 $output .=	"<h1>Gregorio Del Pilar Elementary School</h1><br>";
  $output .=	"</div>";
  $output .="  </header>"; 

  return $output;

}

function navigation(){
	$output = "<ul class='clear'>";
   
    $output .=  "<li a class='active'> <a class ='drop ' href='update_student.php'> Students</a>";
     $output .= "<ul><li><a href='enroll_students.php'>update students gradelevel</a></li></ul></li>";
	$output .=	"<li a class='active'> <a href='view_grade_level.php'>Students Record</a></li>	";
   $output .=  "<li a class='active'> <a href='teachers.php'>teachers</a>";	
  // $output .=	 "<ul><li> <a href='add_teacher.php'>Add Teacher</a>";
  //$output .=   "<li><a class href='update_teacher.php'>sections</a></ul></li>";
	
  $output .=	 "<li a class='active'> <a href='register_admin.php'>Register Admin</a>";
	$output .=	"</div>";      
return $output;


}


function navigation_principal(){
  global $grade_result;

	$output = "<ul class='clear'>";
    $output .= "<li class='active'><a href='view_teachers.php'>view teachers classes</a></li>";
     $output .= "<li  class='active'><a href='teachers_prin.php'>teachers</a></li>";
     
	$output .=	"<li a class='active'> <a href='view_grade_level.php'>Students Record</a></li>";
   
  $output .=  "<li a class='active'> <a class='drop' href='#'>Grade levels</a><ul>";
  while ($row= mysqli_fetch_array($grade_result, MYSQLI_ASSOC)){
     $output .= "<li><a href='grade_levels.php?g_id=".$row['g_id']."'>" .$row['grade_name']. "</a></li>";
}
  $output .=  "</ul></li>";
	$output .=	"</ul>"; 
	$output .=	"</div>";      

return $output;
}

function navigation_teacher(){
	$teachers_id=$_SESSION['teachers_id'];
	$output = "<ul class='clear'>";
	$output .="<li class='active'><a class='drop' href='#'> ADD STUDENTS GRADE AND VALUES</a>";
    $output .= "<ul><li><a href='report_card_learners_values.php'>Add learners observedd values</a></li>";
    $output .= "<li><a href='show_teachers_classes.php?id=$teachers_id'>Add Grade</a></li>";
    $output .= "</ul> </li>";
     $output .= "<li class='active'><a href=generate_report.php>students report card</a></li>";
	$output .=	"</ul></div>"; 	
	
return $output;
}

?>

<!-- <ul class="clear">
<li class="active"><a class="drop" href="#">Pages</a>
          <ul>
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="portfolio.html">Portfolio</a></li>
 </ul>
        </li> -->