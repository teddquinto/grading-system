<?php 

require "required_files.php";

$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 =>'studno', 
	1 => 'lname',
	2 => 'fname',
	3 => 'mname',
	4 => 'suffix',
	5=> 'bdate',
	6 =>'age', 
	7 => 'gender',
	8=> 'address',
	9 =>'fathers_name', 
	10 => 'mothers_name',
	11=> 'b_certificate',
);

	$sql = "SELECT * FROM studentinfo ORDER BY lname ASC ";
 $query = mysqli_query($connect, $sql) or die("ajax_displaystud.php: get student");  
	 
	 $totalData = mysqli_num_rows($query);
	 $totalFiltered = $totalData;


	 $sql = "SELECT * FROM studentinfo WHERE 1=1";

	 if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( lname LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR fname LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR mname LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR gender LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR b_certificate LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($connect, $sql) or die("ajax_displaystud.php: get student");
$totalFiltered = mysqli_num_rows($query);

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 


	$query=mysqli_query($connect, $sql) or die("ajax_displaystud.php: get student");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
	$nestedData[] = $row["studno"];
	$nestedData[] = $row["lname"]." ".$row["fname"]." ".$row["mname"];
	$nestedData[] = $row["bdate"];
	$nestedData[] = $row["age"];
	$nestedData[] = $row["gender"];
	$nestedData[] = $row["address"];
	$nestedData[] = $row["fathername"];
	$nestedData[] = $row["mothername"];
	$nestedData[] = $row["b_certificate"];
	$nestedData[] = "<a href='update2_student.php?id=$nestedData[0]'><img src = 'b_edit.png' style='width:30px;height:30px;'></a>";
	
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

// $data = array();


// // $data['test'] = $_POST['student_num'];

// $search = $_POST['search'];

// $query = "SELECT * FROM studentinfo WHERE CONCAT(`lname`,' ', `fname`) LIKE '%".$search."%' ";
// $result = mysqli_query($connect, $query);  
	
// if(mysqli_num_rows($result) > 0)//
// {  
// 	$row = mysqli_fetch_assoc($result); 

// 	$data[] = $row;

// }  else {

// 	$data['result'] = "0";

// }


// echo json_encode($data);