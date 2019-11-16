<?php

include "connection.php";



if($conn) {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username1']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['pass']); 
      
      $sql = "SELECT id FROM users WHERE username = '$myusername' and pass = '$mypassword'";
      $result1 = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result1,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result1);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: inventory.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }



?>


