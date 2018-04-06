<?php
require "required_files.php";
$data = array();

$student_number = $_POST['student_number'];


$query = "DELETE FROM studentinfo WHERE studno LIKE '$student_number' ";

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