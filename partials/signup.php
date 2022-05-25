<?php
session_start();
//$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include'dbconnect.php';
  $user_name=$_POST['username'];
  $user_email = $_POST['signupemail'];
  $password = $_POST['signuppassword'];
  $cpassword = $_POST['signupcpassword'];

  //check whether this email exist 
  $existSql = "SELECT * FROM `users` where user_email='$user_email'";
  $result=mysqli_query($conn,$existSql);
  $numRows=mysqli_num_rows($result);
  if($numRows>0){
      $_SESSION['showError'] = "Email already exists!";
      // echo"Email already exists";
      header("Location:/onlinelearning/index.php");
  }
  else{
      if($password==$cpassword)
      {
        $hash=md5($password);
        //$_SESSION['spswrd']=$hash;
        //echo $hash; exit;
        $sql="INSERT INTO `users` (`user_name`, `user_email`, `user_password`,`status`, `timestamp`) VALUES ('$user_name', '$user_email', '$hash', 'active',current_timestamp())";
        $result=mysqli_query($conn,$sql);
        if($result){
          // $showAlert=true;
          header("Location:/onlinelearning/index.php");
          exit();
        }
      }
      
  }
}
?>