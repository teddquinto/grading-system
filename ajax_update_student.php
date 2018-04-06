<?php
require "required_files.php";
$data = array();

$student_number = $_POST['student_number'];

$last_name = $_POST['last_name'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$suffix = $_POST['suffix'];
$bdate = $_POST['bdate'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$fathername = $_POST['fathername'];
$mothername = $_POST['mothername'];
$b_certificate = $_POST['b_certificate'];



$query = "UPDATE studentinfo set lname='$last_name', fname='$fname', mname='$mname', suffix='$suffix', 
bdate='$bdate', age='$age', gender='$gender', address='$address', fathername='$fathername', 
mothername='$mothername', b_certificate='$b_certificate' WHERE studno LIKE '%$student_number%' ";

$result = mysqli_query($connect, $query);  

/* if(! $result ) {
               die('Could not update data: ' . mysql_error());
            }
            echo "Updated data successfully\n";
            
            mysql_close($conn);
	
*/

            if($result){  
	
	$data['result'] = true;

}  else {

	$data['result'] = false;

}

echo json_encode($data);
?>