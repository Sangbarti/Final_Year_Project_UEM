<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include '../partials/dbconnect.php';
  $email = $_POST['adminloginemail'];
  $password=$_POST['adminloginpassword'];
  $hash=md5($password);

  //echo $hash;exit;
  //--------------check whether this email exist ---------------
  $sql = "SELECT * FROM `admin` where admin_email='$email' AND admin_password = '$hash' ";
  $result=mysqli_query($conn,$sql);
  $numRows=mysqli_num_rows($result);
  if($numRows==1){
      
    //---------session started after login------------
      // session_start();
      $_SESSION['login']=true;
      $_SESSION['admin_email']=$email;
      //echo"logged in".$email;
      header("Location:dashboard.php");
      exit();

    }
    else{
    //   echo"unable to login";
    $_SESSION['loginError']="Invalid credentials!";
    header("Location:index.php");
    //$_SESSION['login']=false;
    

    }
}

?>