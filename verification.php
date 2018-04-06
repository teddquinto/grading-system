 <?php
require "required_files.php";
require_once ("functions/functions.php");
 

 if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php");  
 }  

function rand_word($length, $case=0) 
{ 
   $word = ""; 
   for($ix = 1; $ix <= $length; $ix++) 
   { 
      $word .= chr(rand(97, 122)); 
   } 
   if($case == 1) // make it all upper case 
   { 
      $word = strtoupper($word); 
   } 
   elseif($case == 2) // make the first letter upper case 
   { 
      $word = ucwords($word); 
   } 
   return($word); 
} 
// TEST:
$sam =  rand_word(7);
// echo $sam;


$query="UPDATE verification_code set ver_code = '$sam' ";
$inss = mysqli_query($connect, $query);

if ($inss == 'true') {
	echo "updated";
}else{
	echo "not updated";
}




?>