<?php
include "common/header.php";
include "partials/dbconnect.php";
?>
<style>
    .button {
        border-radius: 50%;
    }

    .font {
        font-size: 20px;
        color: darkblue;
        font-weight: 800;
    }
</style>
<?php
//Get the category id
$course_id = $_GET['course_id'];
//Fetch course 
$sql = "SELECT * FROM `course` WHERE course_id ='$course_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<section class="course">
    <h1><?php echo $row['course_name'] ?> Courses We Offer</h1>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </p>
    <center>
        <?php

        ?>
        <div class="card h-100 border border-dark rounded" style="width:auto;">
            <div class="card-header list-group-item-primary font">Course Structure</div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Intro </li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
            </ul>
        </div>
        </div>
    </center>

    <div class="row">
        <div class="course-col">
            <h3>Beginner Level </h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean
                massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec
                quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                <form action="questionPaper.php" method="POST">
                    <input type="hidden" name="id" value="<?=$row['course_id'] ?>">
                    <button type="submit" class="btn btn-info" name="test">Take a Test</button>
                </form>
            
            <button type="button" class="btn button btn-dark"><a href="notes.php?course_id=<?php echo $row['course_id'] ?>" style="color:aliceblue;">Notes</button></a>

        </div>

    </div>
</section>

<?php
include "common/footer.php";
?>