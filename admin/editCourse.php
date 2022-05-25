<?php
include "../partials/dbconnect.php";
//$showAlert=false;
//$showError=false;
if(isset($_POST['requpdate'])){
    // echo"clicked";
    $cid=$_POST['course_id'];
    //echo $cid."<br>";
    $catid=$_POST['category'];
    //echo $catid;
    //$ccat=$_POST['course_cat'];
    //echo $ccat;
    $cname=$_POST['course_name'];
    $cdesc=$_POST['course_desc'];
    $cdur=$_POST['course_dur'];
    $cimg=$_FILES['course_img']['name'];
    $temp=$_FILES['course_img']['tmp_name'];
    $img_folder='../images/'.$cimg;
    move_uploaded_file($temp,$img_folder);

    $sql="UPDATE `course` SET `course_name`='$cname',`course_description`='$cdesc',`course_img`='$img_folder',`category_id`='$catid',`duration`='$cdur' WHERE `course_id`='$cid'";
    $result=mysqli_query($conn,$sql);
    if($result==true){
        //$showAlert=true;
        // echo'<div class="alert alert-success" role="alert">
        //        Course updated Successfully!
        //     </div>';
        header("location:addCourse.php");
    }
    else{
        //$showError=true;
        echo'<div class="alert alert-success" role="alert">
               Unable to update ccourse!
            </div>';
    }
 }
?>
