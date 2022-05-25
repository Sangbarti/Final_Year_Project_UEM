<?php
include "common/header.php";
include "../partials/dbconnect.php";
?>

<!-- Code to insert data in database -->
<?php
//Check whether save button clicked or not
if(isset($_POST['lessonSubmitBtn']))
{
    $course_id=$_POST['course'];
    $lesson_name=$_POST['lesson_name'];
    $lesson_description=$_POST['lesson_desc'];
    $lesson_pdf=$_FILES['file']['name'];
    $temp=$_FILES['file']['tmp_name'];
    $note_folder='../notes/'.$lesson_pdf;
    move_uploaded_file($temp,$note_folder);


    $sql1="INSERT INTO `lesson`(`lesson_name`, `lesson_note`, `lesson_desc`, `course_id`) VALUES ('$lesson_name','$note_folder','$lesson_description','$course_id')";
    $result1=mysqli_query($conn,$sql1);
    //Check whether data inserted or not
    if($result1==true)
    {
        //data inserted successfully
    
        // echo'<div class="alert alert-success" role="alert">
        //        Lesson added Successfully!
        //     </div>';
        $_SESSION['status']="Lesson added Successfully!";
        $_SESSION['status_code']="success";
        header("location:addLesson.php");
    }
    else
    {
        //failed to insert data
        // echo'<div class="alert alert-danger" role="alert">
        //       Failed to add Lesson!
        //     </div>';
        $_SESSION['status']="Failed to add Lesson!";
        $_SESSION['status_code']="error";
    }
}
?>





<!-- Add lessson form starts -->
<form name="addlesson" action="" method="post" enctype="multipart/form-data" onsubmit="return validatelesson()">
    <div class="mt-1">
        <select name="course" id="course" class="border border-info border-3">
            <!-- Display course option dynamically -->
            <?php
            $sql="SELECT * FROM `course` WHERE `status`='active'";
            $result = mysqli_query($conn, $sql);
            $count=mysqli_num_rows($result);
            if($count>0){
               echo' <option value="" selected>---Please choose a Course---</option>';
               while($row = mysqli_fetch_assoc($result)){?>
                <option value="<?php echo $row['course_id']?>"><?php echo $row['course_name']?></option>
            <?php  }
            }
            else{
                // we do not have Course
                echo'<option value="0">No Course found</option>';
            }
            ?>
        </select>
    </div>
    <table class="table table-hover table-striped table-bordered mt-2">
        <thead class="table-dark">
            <tr>
                <th scope="col">Lesson Name</th>
                <th scope="col">Lesson Description</th>
                <th scope="col">Upload</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"><input type="text" name="lesson_name"></th>
                <td><input type="text" name="lesson_desc"></td>
                <td><input type="file" name="file"></td>

            </tr>
        </tbody>
    </table>
    <input type="submit" class="btn btn-success" name="lessonSubmitBtn" value="Save"></div>
</form>





<!-- Show lesson starts -->
<div class=" container alt">
    <h1 class=" alt alert alert-success text-center mb-5 p-3 mt-3">List of Lessons</h1>
</div>

<!-- <form action="" method="post" enctype="multipart/form-data"> -->
<table class="table table-hover table-striped table-bordered mt-2">
    <thead class="table-dark table-hover table-striped">
        <input type="hidden" placeholder="for course id">
        <tr>
            <th scope="col">Courses</th>
            <th scope="col">Lesson Name</th>
            <th scope="col">Lesson Description</th>
            <th scope="col">Upload</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql2="SELECT * FROM `course`,`lesson` where `course`.`course_id`=`lesson`.`course_id`";
        $result2 = mysqli_query($conn, $sql2);
        $count2=mysqli_num_rows($result2);
        if($count2>0){
            while($row2 = mysqli_fetch_assoc($result2)){?>
                <tr>
                    <th scope="row"><?=$row2['course_name']?></th>
                    <td><?=$row2['lesson_name']?></td>
                    <td><?=$row2['lesson_desc']?></td>
                    <td><?=$row2['lesson_note']?></td>
                    <td>
                        <form action="editlessonform.php" method="POST">
                            <input type="hidden" name="lid" value="<?=$row2['lesson_id']?>">
                            <button type="submit" class="btn btn-info" name="view" value="view">Edit</button>
                        </form>
                        <form action="deactiveCourse.php" method="POST">
                            <input type="hidden" name="id" value="<?=$row2['course_id'] ?>">
                            <?php
                            if($row2['status']=='active'){
                                echo'<button type="submit" class="btn btn-warning" name="deactive" value="deactive">Disable</button>';
                            }  
                            else{
                                echo'<button type="submit" class="btn btn-danger" name="active" value="active">Enable</button>';
                            }
                            ?>
                    </td>
                </tr>
           <?php }
        }
        ?>
        
    </tbody>
</table>
<!-- <FORM> -->

<script>  
function validatelesson()  
{  
var course= document.addlesson.course.value;
var lname= document.addlesson.lesson_name.value;
var desc= document.addlesson.lesson_desc.value;
var file= document.addlesson.file.value;

if (course == null || course == "" ){  
  alert("Please select a  course");  
  return false;  
  } 
  else if (lname == null || lname == "") {
    alert("Fill this place");
    return false;
  }  
  else if (desc == null || desc == "") {
    alert("Fill this place");
    return false;
  }
  else if(file== null || file == "") {
    alert("Fill this place");
    return false;
  }
}
</script>  



