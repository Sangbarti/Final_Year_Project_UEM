<?php 
include "common/header.php";
include "partials/dbconnect.php";
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  //header("Location:index.php");
  echo "not logged in";
  exit;
}
  
  
?>
<style>
.button {
    border-radius: 50%;
}
</style>
<section class="course">

    <?php
$course_id=$_GET['course_id'];
$sql = "SELECT * FROM `lesson` WHERE course_id='$course_id'"; 
$result = mysqli_query($conn, $sql);?>
    <h1>Notes</h1>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </p>
    <?php while($row = mysqli_fetch_assoc($result)){?>
      
    <form action="notedetailsBeg.php" method="POST">

        <input type="hidden" name="txt1" value="<?php echo $row['lesson_id'] ?>">
        <button style="background-color: transparent;border: none;text-align:left;color: Black;">
            <li style="width: 300px;"><?php echo $row['lesson_name']; ?></li>
        </button>

    </form>
<?php }?>
</section>