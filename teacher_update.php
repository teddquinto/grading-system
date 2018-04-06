<?php 

require "required_files.php";



$teachers_id = $_POST['teachers_id'];
$teachers_lname = $_POST['teachers_lname'];
$teachers_fname = $_POST['teachers_fname'];
$teachers_mname = $_POST['teachers_mname'];
$teachers_bday = $_POST['teachers_bday'];
$teachers_age = $_POST['teachers_age'];
$teachers_gender = $_POST['teachers_gender'];
$teachers_address = $_POST['teachers_address'];
$Status = $_POST['Status'];
$bachelor = $_POST['bachelor'];
$f_concentration = $_POST['f_concentration'];
$course = $_POST['$course'];
  $let=$_POST["let"];
 $doctorate=$_POST["doctorate"];
 $masteral=$_POST["masteral"];


$query = "UPDATE teachersinfo set teachers_lname='$teachers_lname',teachers_fname = '$teachers_fname',
teachers_mname = '$teachers_mname',teachers_bday = '$teachers_bday',teachers_age = '$teachers_age',
teachers_gender = '$teachers_gender',teachers_address = '$teachers_address', status = '$Status' WHERE teachers_id= '$teachers_id'";


$s = implode(',', $f_concentration);

	$check_query="SELECT * FROM teachers_files WHERE teachers_id = '$teachers_id' ";
	$result_check = mysqli_query($connect, $check_query);  
	if(mysqli_num_rows($result_check) == 0)
{  
	$insert = "INSERT INTO teachers_files(teachers_id,bachelor, masteral,doctorate,f_concentration,LET_passer )
             VALUES ( '$teachers_id','$bachelor', '$masteral', '$doctorate', '$s','$let')";
             $ress= mysqli_query($connect,$insert) or die('Error, query failed'); 
}else{  

 if (isset($bachelor)) {

 $query2 = "UPDATE teachers_files set bachelor = '$bachelor', masteral = '$masteral', doctorate = '$doctorate',
 			f_concentration = '$s', LET_passer = '$let' WHERE teachers_id = '$teachers_id' ";


}else{
  $query2 = "UPDATE teachers_files set bachelor = '$course', masteral = '$masteral', doctorate = '$doctorate',
 			f_concentration = '$s', LET_passer = '$let' WHERE teachers_id = '$teachers_id' ";

 
}
$res= mysqli_query($connect,$query2) or die('Error, query failed'); 

		if (mysqli_query($connect, $query)){
			echo "<script>alert('UPdate Done');
				window.location.href = 'teachers.php '; 
					</script>";  

		}

	else{
	
		echo '<script>alert("erro inputs")  </script>';	
		}
	}


	?>