<?php
include "common/header.php"; 
include "../partials/dbconnect.php";
?>


<!-- Code to insert data in database -->
<?php
//Check whether save button clicked or not
if(isset($_POST['courseSubmitBtn']))
{
    $course_cat=$_POST['category'];
    $course_name=$_POST['course_name'];
    $course_description=$_POST['course_desc'];
    $course_duration=$_POST['course_dur'];
    $course_image=$_FILES['course_img']['name'];
    $temp=$_FILES['course_img']['tmp_name'];
    $img_folder='../images/'.$course_image;
    move_uploaded_file($temp,$img_folder);

    $sql1="INSERT INTO `course`(`course_name`, `course_description`, `course_img`, `category_id`,`duration`, `status`) VALUES ('$course_name','$course_description','$img_folder','$course_cat','$course_duration','active')";
    $result1=mysqli_query($conn,$sql1);
    //Check whether data inserted or not
    if($result1==true)
    {
        //data inseted successfully
        
        // echo'<div class="alert alert-success" role="alert">
        //        Course added Successfully!
        //     </div>';
        $_SESSION['status']="Course added Successfully!";
        $_SESSION['status_code']="success";
            header("location:addCourse.php");
    }
    else
    {
        //failed to insert data
        // echo'<div class="alert alert-danger" role="alert">
        //       Failed to add course!
        //     </div>';
        $_SESSION['status']="Failed to add course!";
        $_SESSION['status_code']="error";
    }
}
?>



<!-- Code for active and deactive action in course-->
<?php
if(isset($_POST['deactive'])){
    $sql="UPDATE `course` SET `status`='deactive'  where `course_id`={$_POST['id']}";
    $result=mysqli_query($conn,$sql);
    if($result==true){
        header("location:addCourse.php");
        
        echo'<div class="alert alert-success" role="alert">Course deactivated successfully!</div>';
    }
    else{
        echo'<div class="alert alert-danger" role="alert">Course is not deactivated</div>';
    }
}

if(isset($_POST['active'])){
    $sql="UPDATE `course` SET `status`='active'  where `course_id`={$_POST['id']}";
    $result=mysqli_query($conn,$sql);
    if($result==true){

        //header("location:addCourse.php");
        //echo'<div class="alert alert-success" role="alert">Course activated successfully!</div>';
    }
    else{
        echo'<div class="alert alert-danger" role="alert">Course is not activated</div>';
    }
}
?>




<!-- Add course form starts here-->

<form name="addcourse" action="" method="post" enctype="multipart/form-data" onsubmit="return validatecourse()">
    <div class="mt-1">
        <select name="category" id="category" class="border border-info border-3">


            <!-- display category in dropdown from database -->
            <?php
            $sql="SELECT * FROM `category`";
            $result = mysqli_query($conn, $sql);
            $count=mysqli_num_rows($result);
            if($count>0){
                // we have categories
                echo'<option value="" selected>---Please choose Category---</option>';
                while($row = mysqli_fetch_assoc($result)){ 
            ?>
                <option value="<?php echo $row['category_id']?>"><?php echo $row['course_category']?></option>
                <?php }
            }
            else{
                // we do not have categories
                echo'<option value="0">No Category found</option>';
            }
            ?>
        </select>
    </div>
    <table class="table table-hover table-striped table-bordered mt-1">
        <thead class="table-dark">
            <tr>
                <!-- <th scope="col">Course Type</th> -->
                <th scope="col">Course Name</th>
                <th scope="col">Course Description</th>
                <th scope="col">Course Duration
                <th scope="col">Course Image</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"><input type="text" id="course_name" name="course_name"></th>
                <td><input type="text" id="course_desc" name="course_desc"></td>
                <td><input type="text" id="course_dur" name="course_dur"></td>
                <td><input type="file" id="course_img" name="course_img"></td>
                <!-- <td></td> -->

            </tr>
        </tbody>
    </table>
    <input type="submit" class="btn btn-success" id="courseSubmitBtn" name="courseSubmitBtn" value="Save"></div>
</form>
<!-- End -->









<!----------------------- Show course table ---------------------------->
<div class=" container alt">
    <h1 class=" alt alert alert-success text-center mb-5 p-3 mt-3">List of Courses</h1>
</div>

<!-- <form action="editcourseform.php" method="post" enctype="multipart/form-data"> -->
    <table class="table table-hover table-striped table-bordered mt-2">
        <thead class="table-dark table-hover table-striped">
            <!-- <input type="hidden" placeholder="for course id"> -->
            <tr>

                <th scope="col">Course Category</th>
                <!-- <th scope="col"> Course Id</th> -->
                <th scope="col"> Course Name</th>
                <th scope="col"> Course Description</th>
                <th scope="col">Course Duration</th>
                <th scope="col">Course Image</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

        <?php
        //join category and course table and fetch all data
        $sql2="SELECT * FROM `category`,`course` where `category`.`category_id`=`course`.`category_id`";
        $result2 = mysqli_query($conn, $sql2);
        $count2=mysqli_num_rows($result2);
        //count rows
        if($count2>0){
            //We have course in database
            while($row2 = mysqli_fetch_assoc($result2)){?>
            <tr>
                <th scope="row"><?=$row2['course_category']?></th>
                <td><?=$row2['course_name']?></td>
                <td><?=$row2['course_description']?></td>
                <td><?=$row2['duration']?></td>
                <td><img src="<?=$row2['course_img']?>" height="50px" width="100px" alt=""></td>
                <td><?=$row2['status']?></td>
                <td>
                    <form action="editcourseform.php" method="POST">
                        <input type="hidden" name="id" value="<?=$row2['course_id'] ?>">
                        <button type="submit" class="btn btn-info" name="edit" value="edit">Edit</button>
                    </form>

                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?=$row2['course_id'] ?>">
                        <?php
                        if($row2['status']=='active'){
                            echo'<button type="submit" class="btn btn-warning" name="deactive" value="deactive">Disable</button>';
                        }
                        else{
                            echo'<button type="submit" class="btn btn-danger" name="active" value="active">Enable</button>';
                        }
                        ?>
                        <!-- <button type="submit" class="btn btn-secondary" name="deactive" value="deactive">Deactivate</button>
                        <button type="submit" class="btn btn-warning" name="active" value="active">Activate</button> -->
                    </form>   
                </td>
            </tr>
        <?php }
        }
        else{
            //we do not have course in database
            echo'<div class="alert alert-danger" role="alert">Course is not available!</div>';
        }
        ?>

            
        </tbody>
    </table>

<!-- </form> -->


<script>  
function validatecourse()  
{  
var category= document.addcourse.category.value;
var cname= document.addcourse.course_name.value;
var desc=document.addcourse.course_desc.value;
var dur=document.addcourse.course_dur.value;
var img=document.addcourse.course_img.value;

if (category  == null || category == "" ){  
  alert("Please select a  category");  
  return false;  
  } 
  else if (cname == null || cname == "") {
    alert("Enter course name");
    return false;
  }  
  else if (desc == null || desc == "") {
    alert("Enter course description");
    return false;
  }
  else if (dur== null || dur == "") {
    alert("Enter course duration");
    return false;
  }
  else if (img == null || img == "") {
    alert("Fill this place");
    return false;
  }
}
</script>  