  <?php   
  require "required_files.php";
require_once ("functions/functions.php");


if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php");  
 }  
 
  
   if (isset($_POST['register'])){
 
      if(empty($_POST["uname"]) || empty($_POST["pass"]) || 
	  empty($_POST['lname']) || empty($_POST['fname'])){  
           echo '<script>alert("All Fields are required")</script>';  
      }  
      else  
      {  

  $uname=mysqli_real_escape_string($connect, $_POST["uname"]);
	$pass=mysqli_real_escape_string($connect,$_POST["pass"]);
	$pass2= $_POST["pass2"];
	$lname=mysqli_real_escape_string($connect,$_POST["lname"]);
	$fname=mysqli_real_escape_string($connect,$_POST["fname"]);
  $type_of_user=mysqli_real_escape_string($connect,$_POST["type_of_user"]);
	
	if($pass == $pass2){
		$pass =md5($pass);
		$sql ="insert into admin(username,lname,fname,password,type_of_user) values('$uname', '$lname', '$fname', '$pass', '$type_of_user')";
		if (mysqli_query($connect, $sql)){
			echo '<script>alert("Registration Done")</script>';  
		}

	}else{
		echo '<script>alert("password do not match")  </script>';	
	}
          
      }  
 }
 
   

 ?>  
<html>
<body>


 <div class='wrapper row0'>
 <div id='topbar' class='clear'> 
<nav>
 <ul>
 
  <li><a href="admin.php"> <?php echo $_SESSION['username'];?></a></li>
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
	 echo navigation();
	 ?>
	 <h1>WELCOME <?php echo $_SESSION['username']; ?></h1>
	
     
    </nav>
  </div>
</div>



<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
    
    	<form action='' method='POST' class='box login'>

 <tr><td colspan=2><label><h3>user registration</h3></label></td ></tr> 
<tr><label><td>Username</label><td><input type='text' name='uname' class='box input'>
</td></tr>
<tr><label><td>lastname</label><td><input type='text' name='lname' class='box input'>
</td></tr>
<tr><label><td>firstname</label><td><input type='text' name='fname' class='box input'>
</td></tr>
<tr><label><td>password</label><td><input type='password' name='pass' class='box input'>
</td></tr>
<tr><label><td>confirm password</label><td><input type='password' name='pass2' class='box input'>
</td></tr>
<tr><label><td>Select type of user</label><td>
<select name="type_of_user">
  <option value="principal">principal</option>
  <option value="registrar"> registrar  </option>
</select>
</td></tr>

               
  <tr><td align= "center" colspan = 2> <input type='submit' name='register' class='btnLogin'></center></td></tr>
        <!--  <td align="left"><a href="register_admin.php">Register</a></td>   -->
                </form>  
                


      <div class="clear"></div>
    </main>
  </div>



      
</body>
</html>
 
		

	 
	  
           
                 
               
               