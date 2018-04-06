<?php 

require "required_files.php";
 if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php?action=login");  
 }  

$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 =>'teachers_id', 
	1 => 'teachers_lname',
	2 => 'teachers_fname',
	3 => 'teachers_mname',
	4 => 'teachers_bday',
	5=> 'teachers_age',
	6 =>'teachers_gender', 
	7 => 'teachers_address',
	8=> 'status',
	
);

	$sql = "SELECT * FROM teachersinfo ";
 $query = mysqli_query($connect, $sql) or die("displayteacher.php: get teachers");  
	 
	 $totalData = mysqli_num_rows($query);
	 $totalFiltered = $totalData;


	 $sql = "SELECT * FROM teachersinfo WHERE 1=1";

	 if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND (teachers_lname LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR teachers_fname LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR teachers_mname LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR teachers_gender LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($connect, $sql) or die("displayteacher.php: get teachers");
$totalFiltered = mysqli_num_rows($query);

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 


	$query=mysqli_query($connect, $sql) or die("displayteacher.php: get teachers");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
	$nestedData[] = $row["teachers_id"];
	$nestedData[] = $row["teachers_lname"]." ".$row["teachers_fname"]." ".$row["teachers_mname"];
	$nestedData[] = $row["teachers_bday"];
	$nestedData[] = $row["teachers_age"];
	$nestedData[] = $row["teachers_gender"];
	$nestedData[] = $row["teachers_address"];
	$nestedData[] = $row["status"];	
	$nestedData[] = "<a href='add_teachers_class.php?id=$nestedData[0]'><img src = 'images/add.png' style='width:30px;height:30px;'></a>";
	$nestedData[] = "<a href='t_credentials.php?id=$nestedData[0]'><img src = 'images/avatar.png' style='width:30px;height:30px;'></a>";

	
	//$nestedData[] = $row["b_certificate"];


	
	$data[] = $nestedData;
}


$json_data = array(
			"draw"            => intval( $requestData['draw'] ),  
			"recordsTotal"    => intval( $totalData ), 
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $data   
			);

echo json_encode($json_data); 

