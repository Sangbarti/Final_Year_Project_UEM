<?php
include "common/header.php";
include "../partials/dbconnect.php";
if(isset($_POST['view'])){
    //echo "clicked";
    $sql="SELECT * FROM `course`,`lesson` where `course`.`course_id`=`lesson`.`course_id` and `lesson_id`={$_POST['lid']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Lesson</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> -->
                <form method="POST" action="editlesson.php" enctype="multipart/form-data">
                    <input type="hidden" placeholder="for lesson id" id="lesson_id" name="lesson_id" value="<?php if(isset($row['lesson_id'])){ echo $row['lesson_id'];} ?>">
                    
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Course Name: </label>
                        <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])){ echo $row['course_name'];} ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Lesson Name</label>
                        <input type="text" class="form-control" id="lesson_name" name="lesson_name" value="<?php if(isset($row['lesson_name'])){ echo $row['lesson_name'];} ?>">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Lesson Description</label>
                        <input type="text" class="form-control" id="lesson_desc" name="lesson_desc" value="<?php if(isset($row['lesson_desc'])){ echo $row['lesson_desc'];} ?>">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Upload</label>
                        <a href="<?php if(isset($row['lesson_note'])){ echo $row['lesson_note'];} ?>" target="_blank"><?php if(isset($row['lesson_note'])){ echo "Download PDF";} ?></a>
                        <input type="file" class="form-control" id="upload" name="upload">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="requpdate" value="requpdate">Save</button>
                    </div>
                </form>
            <!-- </div>
            
        </div>
    </div>
</div> -->