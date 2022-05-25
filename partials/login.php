<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
  include 'dbconnect.php';
  $email = $_POST['loginemail'];
  $password=$_POST['loginpassword'];
  $hash=md5($password);

  
  //--------------check whether this email exist ---------------
  $sql = "SELECT * FROM `users` where user_email='$email' AND user_password = '$hash' ";
  $result=mysqli_query($conn,$sql);
  $numRows=mysqli_num_rows($result);
  if($numRows==1){
    $row = mysqli_fetch_assoc($result);
    //---------session started after login------------
      session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['user_email']=$email;
      $_SESSION['user_name']=$row['user_name'];
      //echo"logged in".$email;
      header("Location:../index.php");
      exit();

    }
    else{
      // echo"unable to login";
      $_SESSION['error']="Invalid Credentials";

    }
}

