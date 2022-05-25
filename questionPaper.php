<?php
include "common/header.php";
include "partials/dbconnect.php";
if(isset($_POST['test']))
{
    // $sql="SELECT c.course_id,c.course_name,q.qid,q.question,q.question_number,a.question_number,a.choice,a.correct_ans FROM `questions` q inner join course c on q.course_id=c.course_id inner join answers a on q.question_number=a.question_number where c.status='active' and c.course_id={$_POST['id']}";
    $sql="SELECT * FROM `questions` where course_id={$_POST['id']}";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
    //if($result){
        // echo "success";
    // }else{
        //die("2nd Query could not be executed" . $sql.$conn->error);
        
    // }
    if($count>0){ ?>
        <form method="POST" action="result.php">
            <div class="container-fluid">
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <div>
                    <label class="txt">Q:<?=$row['question_number']?> <?=$row['question']?></label>
                </div>

                <?php
                $sql1="SELECT * FROM `answers` where qid={$row['qid']}";
                $result1=mysqli_query($conn,$sql1);
                ?>
                <div class="txt">
                    <?php while($row1 = mysqli_fetch_assoc($result1)){
                    echo'<td><input type="radio" name="choice">&nbsp;'.$row1['choice'].' &ensp;&nbsp;</td>'; } ?>
                </div><br>
                <?php 
                } ?>
            </div>
            <div style="padding: 10px;"><button type="submit" class="btn btn-success" id="" name="submitpaper" value="Submit">Submit</button></div>
        </form>
    <?php }
    else{
        echo'<div class="alert alert-danger" role="alert">Question is not available!</div>';
    }
}
?>



 

<?php
include "common/footer.php";
?>