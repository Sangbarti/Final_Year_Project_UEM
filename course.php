<?php 
  include "common/header.php";
  include "partials/dbconnect.php";

?>
<section class="course">
    <?php 
  //Get the category id 
  $cat_id=$_GET['category_id'];
  //Fetch category name 
  $sql1="SELECT * FROM `category` WHERE `category_id`='$cat_id'";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_assoc($result1);
  ?>
    <!-- div has three attributes namely name(used for .net),class(used for css) and id(used for JS) -->
    <h1><?php echo $row1['course_category'] ?> Courses We Offer</h1>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </p>


    <div class="row">
        <?php 
    
    //Fetch course name based on selected category 
    $sql = "SELECT * FROM `course` WHERE category_id ='$cat_id' and `status`= 'active'"; 
    $result = mysqli_query($conn, $sql);
    //count rows
    $count=mysqli_num_rows($result);
    if($count>0)
    {
      //Course is available
      while($row = mysqli_fetch_assoc($result))
      { ?>
        <div class="col-3 mt-3">
            <div class="card h-100 border border-dark rounded " style="width:16rem">
                <img src="<?php echo str_replace('..','.',$row['course_img']) ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title"> <?=$row['course_name']?></h3>
                  <p class="card-text"> <?= $row['course_description']?></p>
                  <a href="coursedetails.php?course_id=<?php echo $row['course_id'] ?>" class="btn btn-warning">View</a>
                </div>
            </div>
        </div>
        <?php } 
    }
    else
    {
      //Course is not available
      echo'<div class="alert alert-danger" role="alert">Course is not available!</div>';
    }
    
    ?>


        
    </div>
</section>

<?php 
  include "common/footer.php";
?>