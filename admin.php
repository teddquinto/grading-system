<?php

require "required_files.php";
  require_once ("functions/functions.php");

   if(!isset($_SESSION["username"]))  
 {  

  
      header("location:login.php");  
 }  

$username = $_SESSION['username'];

$query = "SELECT * FROM admin where username LIKE '%$username%' ";    
           $result = mysqli_query($connect, $query);
             while ($row =  mysqli_fetch_assoc($result)) { 
          $user=  $row['username'];
          $lname=  $row['lname'];
          $fname=  $row['fname'];
          $password=  $row[ 'password'];
          $type_of_user=  $row[  'type_of_user'];
        

        }  
        $ver = "SELECT * FROM verification_code ";    
           $result_ver = mysqli_query($connect, $ver);
             while ($row =  mysqli_fetch_assoc($result_ver)) { 
              $ver_code = $row['ver_code'];
             }

 ?>
 <!DOCTYPE html>
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
  <?php if ($_SESSION["username"] == "admin"){echo navigation();
  }else { echo navigation_principal(); }?>
  <?php echo $_SESSION['username']; ?>
     
    </nav>
  </div>
</div>

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 

     <div class="one_half first">
         
          <table>


              
                    <tr><td><label>Username : </label></td>
                    <td><?php echo $user; ?></td></tr>
                      
                     <tr><td><label>Lastname: </label></td>
                    <td><?php echo $lname; ?></td></tr>
                      
                     <tr><td><label>Firstname: </label></td>
                    <td><?php echo $fname; ?></td></tr>
                     
                                      
                    
                    <tr><td> <label for="field1">password: </label></td>
                    <td><?php echo $password; ?></td></tr>
                    
                     <tr><td><label>type of user: </label></td>
                    <td><?php echo $type_of_user; ?></td></tr>
                 
                 
             </table>
             </div>

                <div class="one_third ">

           <form action="" method="POST">
            Change Password:
            <input type="text" name="pass" >
            

            <br>
            Confirm Password:
              <input type="text" name="pass2" " >
            <br>

            <input type="submit" name="send" value="update">

            </form>
         
             </div>


  <div class="one_fourth ">

          
            verification code of the day:
            <input type="text" name="pass" value="<?php echo $ver_code; ?>">
            

          
         
             </div>


   <div class="clear"></div>
    </main>
 </div>
  </div>


      
</body>
</html>
<?php
if (isset($_POST['send'])) {
    

    $username = $_SESSION['username'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];


    if($pass == $pass2){
    $pass =md5($pass);
    $sql ="UPDATE admin set password = '$pass' WHERE username = '$username' ";
    if (mysqli_query($connect, $sql)){
      echo '<script>alert("password has been updated")</script>';  
    }else{
      echo '<script>alert("ERROR")</script>';
    }


}
}

?>