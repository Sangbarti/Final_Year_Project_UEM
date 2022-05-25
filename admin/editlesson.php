<?php
include "../partials/dbconnect.php";
//$showAlert=false;
//$showError=false;
if(isset($_POST['requpdate'])){
    //echo"clicked";
    $lid=$_POST['lesson_id'];
    //echo $lid."<br>";
    //$cname=$_POST['course_name'];
    //echo $catid;
    //$ccat=$_POST['course_cat'];
    //echo $ccat;
    $lname=$_POST['lesson_name'];
    $ldesc=$_POST['lesson_desc'];
    $lpdf=$_FILES['upload']['name'];
    $temp=$_FILES['upload']['tmp_name'];
    $note_folder='../notes/'.$lpdf;
    move_uploaded_file($temp,$note_folder);

    $sql="UPDATE `lesson` SET `lesson_name`='$lname',`lesson_note`='$note_folder',`lesson_desc`='$ldesc' WHERE `lesson_id`='$lid'";
    $result=mysqli_query($conn,$sql);
    if($result==true){
        //$showAlert=true;
        echo'<div class="alert alert-success" role="alert">
               Course updated Successfully!
            </div>';
    }
    else{
        //$showError=true;
        echo'<div class="alert alert-success" role="alert">
               Unable to update ccourse!
            </div>';
    }
  }
?>
