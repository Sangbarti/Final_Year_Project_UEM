<?php include "common/header.php";
include "partials/dbconnect.php";
?>

<style>
body {
    background-image: url('images/background-1.jpg');
    background-repeat: no-repeat;
    /* background-attachment: fixed; */
    background-size: cover;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
}
</style>
<section class="header">
    <?php
        echo'<div class="text-box">
            <h1>India\'s Largest Online Platform</h1>
            <p>Learn anything on your finger tips. <br>Enroll yourself and grab knowlegde from the best people.</p>';
            if(!isset($_SESSION['user_email'])){
            echo'<button class="btn btn-outline-success" data-toggle="modal" data-target="#signupModal">Register Yourself Now</button>';
            }
            else{
                echo'You are ready to start';
            }
        echo'</div>';
?>
</section>

<!------course----->
<section class="course">
    <h1> Courses We Offer</h1>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </p>

    <div class="row">
        <div class="course-col">
            <h3>Intermediate</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean
                massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec
                quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
        </div>
        <div class="course-col">
            <h3>Degree</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean
                massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec
                quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>

        </div>
        <div class="course-col">
            <h3>Advance</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean
                massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec
                quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
        </div>
    </div>
</section>

<!-----campus------->

<center>
    <div class="row">
        <!-- Fetch all the categories and use a loop to iterate through categories -->
        <?php 
         $sql = "SELECT * FROM `category`"; 
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)){
        ?>

        <div class="col-sm-4">
            <div class="card h-100" style="width:20rem">
                <a href="course.php?category_id=<?php echo $row['category_id'] ?>"><img src="images/coding-1.png" height=50% class="card-img-top"
                        alt="..."></a>
                <div class="card-body">
                    <h3 class="card-title"><?=$row['course_category']?></h3>
                </div>
            </div>
        </div>

         <?php } ?>

</center>


<!------Call To Action----->

<section class="cta">
    <h1>Enroll for our various courses from <br>around anywhere.</h1>
    <a href="" class="hero-btn">Contact Us</a>
</section>
<?php include "common/footer.php";?>