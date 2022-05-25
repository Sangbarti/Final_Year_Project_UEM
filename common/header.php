<!doctype html>
<?php
session_start();
?>
<head>
    <title>Certification Platform</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<body>
    <?php
    //session_start(); ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="index.php">Home<span class="sr-only"></span></a></li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"  role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Course</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        include "partials/dbconnect.php";
                        $sql="SELECT * FROM `category`";
                        $result = mysqli_query($conn, $sql);
                        $count=mysqli_num_rows($result);
                        if($count>0){
                            while($row = mysqli_fetch_assoc($result)){?>
                                <a class="dropdown-item" href="course.php?category_id=<?php echo $row['category_id'] ?>"><?=$row['course_category']?></a>
                          <?php  }
                        }
                        ?>
                        
                    </div>
                </li>
                <li class="nav-item active"><a class="nav-link" href="about.php">About<span class="sr-only"></span></a></li>
                <li class="nav-item active"><a class="nav-link" href="contact.php">Contact-us<span class="sr-only"></span></a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li class="nav-item">

                    <?php
                    
                    if(isset($_SESSION['loggedin']))
                    {

                        echo
                        "<li class='nav-item dropdown'> 
                        <a class='nav-link dropdown-toggle'  id='profileDropdown' role='button' data-toggle='dropdown' aria-haspopup='true'aria-expanded='false'>Welcome " . $_SESSION['user_name'] . "</a>
                        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <li><a class='dropdown-item' href='partials/profile.php'><span class='fas fa-user' style='color: #20c997;'></span> Profile</a></li>
                        <li><a class='dropdown-item' href='partials/setting.php'><span class='fas fa-cog fa-spin' style='color: #339af0;'></span> Setting</a></li>
                        <li><hr class='dropdown-divider'></li>
                        <li><a class='dropdown-item' href='partials/logout.php'><span class='fas fa-sign-out-alt' style='color: #f06595;'></span>Logout</a></li>
                        </ul>
                        </li>";
                    } else {
                        echo " 
                        
                        <button class='btn btn-success' data-toggle='modal' data-target='#signupModal'>SignUp</button>
                        <button class='btn btn-success mx-3' data-toggle='modal' data-target='#loginModal'>Login</button>";

                    } ?>
                </li>
                    

            </ul>

            <form class="d-flex" style="padding-bottom: 5px;">

                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">

                <button class="btn btn-warning mx-3" type="submit">Search</button>

            </form>

           </div>
        </div>
    </nav>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModal">Login Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="myform1" method="POST" action="partials/login.php" onsubmit="return validateemail();">
                        <div class="mb-3">
                            <label for="loginemail" class="form-label">Email Id</label>
                            <input type="email" class="form-control" id="loginemail" name="loginemail" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginpassword" name="loginpassword">
                        </div>

                        <div class="mb-3">
                        <button class='btn btn-success' data-toggle='modal' data-target='#signupModal'>Don't have an account?</button>
                        </div>
                        <button type="submit" class="btn btn-success">Login</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Signup Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupModal">Sign Up</h5>
                    <?php
                    if(isset($_SESSION['showError'])){
                        echo'<div class="alert alert-warning" role="alert">'.$_SESSION['showError'].'</div>';
                        unset($_SESSION['showError']);
                    }
                    ?>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form name="myform" method="POST" action="partials/signup.php" onsubmit="return validateform()">
                        <div class="mb-3">
                            <label for="username" class="form-label">Name</label>
                            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3">
                            <label for="signupemail" class="form-label">Email Id</label>
                            <input type="email" class="form-control" id="signupemail" name="signupemail" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="signuppassword" name="signuppassword">
                        </div>
                        <div class="mb-3">
                            <label for="cpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="signupcpassword" name="signupcpassword">
                            <small id="emailHelp" class="form-text">make sure to put the same password</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Sign up validation -->
    <script>
        function validateform() {
            var name = document.myform.username.value;
            var email = document.myform.signupemail.value;
            var firstpassword = document.myform.signuppassword.value;
            var secondpassword = document.myform.signupcpassword.value;
            if (name == null || name == "") {
                alert("Name can't be blank");
                return false;
            } else if (email == null || email == "") {
                alert("Email can't be blank");
                return false;
            } else if (firstpassword == null || firstpassword == "") {
                alert("Fill the password please");
                return false;
            } else if (firstpassword.length < 6) {
                alert("Password must be at least 6 characters long.");
                return false;
            } else if (firstpassword.length > 16) {
                alert("Password length must not exceed 15 characters");
                return false;
            } else if (firstpassword == secondpassword) {
                return true;
            } else {
                alert("password must be same!");
                return false;
            }

        }
    </script>
    
    <!--LOGIN VALIDATION  -->
<script>  
function validateemail()  
{  
var x=document.myform1.loginemail.value;  
var atposition=x.indexOf("@");  
var dotposition=x.lastIndexOf("."); 
var password = document.myform1.loginpassword.value;

if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
  alert("Please enter a valid e-mail address");  
  return false;  
  } 
  else if (password == null || password == "") {
    alert("Fill the password please");
    return false;
}  
}
</script>  