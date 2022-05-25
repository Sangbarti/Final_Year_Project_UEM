<?php

// session_start();

include "../common/header.php";
include "../partials/dbconnect.php";

//error_reporting(E_ALL & ~E_WARNING);

// if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) { ?>

<script>
// location.replace("index.php");
</script>

<?php

//}

?>
<center>
    <div class="profile-area">

        <div class="container mt-3" style="padding:12px;">



            <div class="card bg-dark mb-1" style="max-width: 20rem;">

                <?php

            $sql = "SELECT * FROM `users` WHERE `user_rmail` = '$_SESSION[user_email]' ";

            //$res = $conn->query($sql);

            //$row = $res->fetch_assoc();
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>

                <h2>

                    <div class="card-header">Profile Information</div>

                </h2>

                <hr style="color:greenyellow; height:5px;">

                <div class="card-body">



                    <div class="row mt-4">

                        <!-- <div class="col-md-6 box-size address"> -->

                        <!-- <div class="border border-3 border-success av"> -->

                        <div class="row ax">

                            <div class=" col-2">

                                <label class="control-label" for="name"><span class='fas fa-user fa-lg'
                                        style='color: #20c997;'></span></label>

                            </div>



                            <div class="col-6">

                                <label class="control-label text-white" style="font-size: 14px;text-align: justify;"
                                    for="name"><?php echo $row['user_name'] ?></label>

                            </div>



                            <div class="col-4">

                                <label class="control-label" for="name">

                                    <button type="button" name="edit" class="btn btn-dark editbtn"
                                        data-bs-toggle="modal" data-bs-target="#profileEdit">

                                        <span class="fas fa-edit fa-2x" style="color: #51cf66;"></span>

                                    </button>

                                </label>

                            </div>

                        </div>



                        <div class="row">

                            <div class=" col-2">

                                <label class="control-label" for="name"><span class="fas fa-map-marker-alt"
                                        style="color: #ff6b6b;"></span></label>

                            </div>



                            <div class="col-6">

                                <label class="control-label text-white" style="font-size: 14px; text-align: justify;"
                                    for="name"><?php echo $row['address'] ?></label>

                            </div>

                        </div>



                        <div class="row">

                            <div class=" col-2">

                                <label class="control-label" for="name"><span class="fas fa-mobile"
                                        style="color: #339af0;"></span></label>

                            </div>



                            <div class="col-6">

                                <label class="control-label text-white" style="font-size: 14px; text-align: justify;"
                                    for="name"><?php echo $row['contact'] ?></label>

                            </div>

                        </div>



                        <div class="row">

                            <div class=" col-2">

                                <label class="control-label" for="name"><span class="far fa-envelope"
                                        style="color: #ff922b;"></span></label>

                            </div>



                            <div class="col-6">

                                <label class="control-label text-white" style="font-size: 14px; text-align: justify;"
                                    for="name"><?php echo $row['email'] ?></label>

                            </div>

                        </div>



                        <div class="row">

                            <div class=" col-2">

                                <label class="control-label" for="name"><span class="fas fa-venus-mars fa-lg"
                                        style="color: #845ef7;"></span></label>

                            </div>

                            <div class="col-6">

                                <label class="control-label text-white" style="font-size: 14px; text-align: justify;"
                                    for="name"><?php echo $row['gender'] ?></label>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</center>



<?php

$_SESSION['name'] = $row['fullName'];

$_SESSION['contact'] = $row['contact'];

$_SESSION['gender'] = $row['gender'];

$_SESSION['address'] = $row['address'];

//print_r($_SESSION);

?>

<!-- Edit POP up Modal bootstrap-->

<div class="modal fade" id="profileEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content bg-dark mb-1">

            <div class="modal-header">

                <h5 class="modal-title text-white" id="exampleModalLabel">Update Your Profile</h5>

                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>

            </div>

            <form action="_updateProfile.php" method="post" onsubmit="return validation()">

                <div class="modal-body">

                    <label class="control-label text-white" for="name">Name</label>

                    <input type="text" name="name" id="name" value="<?= $_SESSION['name'] ?>" class="form-control" />

                    <span id="username" class="text-danger font-weight-bold"> </span>

                    <br />

                    <label class="control-label text-white" for="name">Address</label>

                    <input type="text" name="address" id="address" rows="5" class="form-control"
                        value="<?= $_SESSION['address'] ?>">

                    <span id="addressval" class="text-danger font-weight-bold"> </span>

                    <br />

                    <label class="control-label text-white" for="name">Gender</label>

                    <select name="gender" id="gender" class="form-control">

                        <span id="genderval" class="text-danger font-weight-bold"></span>

                        <?php

                        if ($_SESSION['username']) {

                            echo "<option value='$_SESSION[gender]'>$_SESSION[gender]</option>

                            <option value='Male'>Male</option>

                            <option value='Female'>Female</option>

                            <option value='Other'>Other</option>

                            <option value='notMentioned'>Not Mention</option>";
                        } else {

                            echo " <option value='' selected>---Please choose an option---</option>

                        <option value='Male'>Male</option>

                        <option value='Female'>Female</option>

                        <option value='Other'>Other</option>

                        <option value='notMentioned'>Not Mention</option>";
                        }

                        ?>

                    </select>

                    <br />

                    <label class="control-label text-white" for="name">E-Mail</label>

                    <input type="text" name="email" id="email" class="form-control"
                        value="<?= $_SESSION['username'] ?>" />

                    <span id="emailids" class="text-danger font-weight-bold"> </span>

                    <br />

                    <label class="control-label text-white" for="name">Contact</label>

                    <input type="text" name="contact" id="contact" class="form-control"
                        value="<?= $_SESSION['contact'] ?>" />

                    <span id="contactno" class="text-danger font-weight-bold"> </span>

                    <br />

                    <input type="hidden" name="id" id="id" value="<?= $_SESSION['id'] ?>" />

                </div>

                <div class="modal-footer">

                    <button type="submit" name="update" value="Update" id="update"
                        class="btn btn-success">Update</button>

                </div>

            </form>

        </div>

    </div>

</div>

<script type="text/javascript">
function validation() {

    var user = document.getElementById('name').value;

    var gender = document.getElementById('gender').value;

    var address = document.getElementById('address').value;

    var mobileNumber = document.getElementById('contact').value;

    var emails = document.getElementById('email').value;


    if (user == "") {

        document.getElementById('username').innerHTML = " ** Please fill the username field";

        return false;

    }

    if ((user.length <= 2) || (user.length > 20)) {

        document.getElementById('username').innerHTML = " ** Username lenght must be between 2 and 20";

        return false;

    }

    if (!isNaN(user)) {

        document.getElementById('username').innerHTML = " ** only characters are allowed";

        return false;

    }



    if (emails == "") {

        document.getElementById('emailids').innerHTML = " ** Please fill the email idx` field";

        return false;

    }

    if (emails.indexOf('@') <= 0) {

        document.getElementById('emailids').innerHTML = " ** @ Invalid Position";

        return false;

    }



    if ((emails.charAt(emails.length - 4) != '.') && (emails.charAt(emails.length - 3) != '.')) {

        document.getElementById('emailids').innerHTML = " ** . Invalid Position";

        return false;

    }





    if (mobileNumber == "") {

        document.getElementById('contactno').innerHTML = " ** Please fill the mobile Number field";

        return false;

    }

    if (isNaN(mobileNumber)) {

        document.getElementById('contactno').innerHTML =

            " ** user must write digits only not characters";

        return false;

    }

    if (mobileNumber.length != 10) {

        document.getElementById('contactno').innerHTML = " ** Mobile Number must be 10 digits only";

        return false;

    }



    if ((address == "") || (address.length < 15)) {

        document.getElementById('addressval').innerHTML = " ** Adderess field cann't empty and minimum length 15";

        return false;

    }

}
</script>



<?php

include "common/footer.php";

?>
<script>
$(document).ready(function() {

    $('.editbtn').on('click', function() {

        $('#profileEdit').modal('show');

        console.log("1");

    });

});
</script>