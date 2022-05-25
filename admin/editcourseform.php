<?php
include "common/header.php"; 
include "../partials/dbconnect.php";
if(isset($_POST['edit'])){
    //echo "clicked";
    $sql="SELECT * FROM `course` where `course_id`={$_POST['id']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $current_cat=$row['category_id'];//current category of selected course
}
?>
<form method="POST" action="editCourse.php" enctype="multipart/form-data">
    <input type="hidden" placeholder="for course id" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])){ echo $row['course_id'];} ?>">
    <!-- <input type="hidden" placeholder="for category id" id="category_id" name="category_id" value="<?php //if(isset($row['category_id'])){ echo $row['category_id'];} ?>"> -->
    
    <div class="mb-3">
        <label for="message-text" class="col-form-label">Course Name</label>
        <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])){ echo $row['course_name'];} ?>">
    </div>
    <div class="mb-3">
    <label for="recipient-name" class="col-form-label">Course Category</label> 
        <select name="category" id="category" class="">


            <!-- display category in dropdown from database -->
            <?php
            $sql1="SELECT * FROM `category`";
            $result1 = mysqli_query($conn, $sql1);
            $count=mysqli_num_rows($result1);
            if($count>0){
            // we have categories
                //echo'<option value="" selected>---Please choose Category---</option>';
                while($row1 = mysqli_fetch_assoc($result1)){ ?>
                    <option <?php if($current_cat==$row1['category_id']){echo "selected";}?> value="<?php echo $row1['category_id']?>"><?php echo $row1['course_category']?></option>
                <?php }
            }
            else{
                // we do not have categories
                echo'<option value="0">No Category found</option>';
            }
            ?>
        </select>
        <!-- <label for="recipient-name" class="col-form-label">Course Category</label> -->
        <!-- <input type="text" class="form-control" id="course_cat" name="course_cat" value="<?php //if(isset($row['course_category'])){ echo $row['course_category'];} ?>"> -->
    </div>
    <div class="mb-3">
        <label for="message-text" class="col-form-label">Course Description</label>
        <textarea class="form-control" id="course_desc" name="course_desc"><?php if(isset($row['course_description'])){ echo $row['course_description'];} ?></textarea>
    </div>
    <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Course Duration</label>
        <input type="text" class="form-control" id="course_dur" name="course_dur" value="<?php if(isset($row['duration'])){ echo $row['duration'];} ?>">
    </div>
    <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Course Image</label>
        <img src="<?php if(isset($row['course_img'])){ echo $row['course_img'];} ?>" alt="" class="img-thumbnail">
        <input type="file" class="form-control" id="course_img" name="course_img">
    </div>
    <div class="modal-footer">
        <a href="addCourse.php" class="btn btn-secondary">Cancel</a>
        <button type="submit" name="requpdate" id="requpdate" class="btn btn-primary">Save</button>
    </div>
</form>
