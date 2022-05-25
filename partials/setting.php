<?php 
include "dbconnect.php";

session_start();
if(isset($_POST['Submit']))
{
    $oldpass=md5($_POST['oldpassword']);
    $useremail=$_SESSION['user_email'];
    $newpass=md5($_POST['newpassword']);
    $sql="SELECT * FROM `users` where user_email='$useremail' and user_password='$oldpass'";
    $result = mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
    if($num>0){
        $sql1="UPDATE `users` SET `user_password`='$newpass' WHERE `user_email`='$useremail'";
        $result1 = mysqli_query($conn, $sql1);
        $msg1="Password Changed Successfully !!";        
    }
}
?>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/changepasword.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Change Password</title>
</head>
<body>
    <br><br><br><br><br><br>
    <form action="" method="POSt" onsubmit="return validation()" style="padding-top: 20px;">
        <h2>Change Password</h2>
        <?php if(isset($msg1)){echo $msg1;}?>
        <p class="error"></p>
        <p class="success"></p>
        <label>Old Password</label>

        <input type="password" name="oldpassword" id="oldPassword" placeholder="Old Password">

        <span id="oldPasswords" style="color: red;"> </span>

        <br>

        <label>New Password</label>

        <input type="password" name="newpassword" id="password" placeholder="New Password">

        <span id="passwords" style="color: red;"> </span>

        <br>

        <label>Confirm New Password</label>

        <input type="password" name="confirmnpassword" id="cpassword" placeholder="Confirm New Password">

        <span id="confrmpass" style="color: red;"> </span>

        <br>

        <button type="submit" name="Submit">CHANGE</button>

        <a href="../index.php" class="ca"><i class="fas fa-home fa-2x" style="color: #845ef7;"></i></a>

    </form>


    <script type="text/javascript">
        function validation() {

            var oldPass = document.getElementById('oldPassword').value;

            var newPass = document.getElementById('password').value;

            var confirmPass = document.getElementById('cpassword').value;

            if (oldPass == "") {

                document.getElementById('oldPasswords').innerHTML = " ** Old Password is required";

                return false;

            }

            if (newPass == "") {

                document.getElementById('passwords').innerHTML = " ** New Password is required";

                return false;

            }

            if ((newPass.length < 6) || (newPass.length > 16)) {

                document.getElementById('passwords').innerHTML =

                    " ** Passwords lenght must be between  6 and 16";

                return false;

            }

            if (confirmpass == "") {

                document.getElementById('confrmpass').innerHTML = " ** Please fill the confirmpassword field";

                return false;

            }

            if (newPass != confirmpass) {

                document.getElementById('confrmpass').innerHTML =

                    " ** Password does not match the confirm password";

                return false;

            }

        }
    </script>

</body>

</html>



