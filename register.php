
<?php
include "connection.php";

if($conn){
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordc'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordc= $_POST['passwordc'];

            if($password===$passwordc){

          $query = "INSERT INTO `users` (username, pass, email) VALUES ('$username', '$password', '$email')";
            $result = mysqli_query($conn, $query);
          if($result){
              $smsg = "User Created Successfully.";
          }else{
              $fmsg ="User Registration Failed";
          }

            }
      }
       
    }


?>