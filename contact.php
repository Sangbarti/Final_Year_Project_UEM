<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex, nofollow">
  <title>Contact Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container contact">
    <div class="row">
      <div class="col-md-3">
        <div class="contact-info">
          <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image" />
          <h2>Contact Us</h2>
          <h4>We would love to hear from you !</h4>
        </div>
      </div>
      <div class="col-md-9">
        <form method="post" id="frmContactus">
          <div class="contact-form">
            <div class="form-group">
              <label class="control-label col-sm-2" for="name">Name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Email:</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="mobile">Mobile:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="comment">Comment:</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" name="submit" id="submit">Submit</button>
                <span style="color:red;" id="msg"></span>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>


    <div class="row mt-4">
      <div class="col-md-4">
        <div class="card mt-1" style=" background-color:aliceblue">
          <div class="img1 pre ratio ratio-16x9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4381.628581784517!2d88.49068677087979!3d22.560553825628187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a020b9fdef85743%3A0x95dc30809c313ceb!2sPVR%20Uniworld%20Downtown%20Kolkata!5e0!3m2!1sen!2sin!4v1640103527731!5m2!1sen!2sin" width="350" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
          <div class="img2"><img src="assets/image/logo.jpg" alt=""></div>
          <div class="main-text pre" style="font-size: 14px;">
            <div class="row">
              <div class=" col-sm-12">
                <label class="control-label col-sm-6" style="color: #3C589C; font-weight:600px;" for="name">Name:</label>
                <label class="control-label col-sm-6 address" for="name"></label>
              </div>
            </div>
            <div class="row">
              <div class=" col-sm-12">
                <label class="control-label col-sm-6" style="color: #3C589C; font-weight:600px;" for="name">Address:</label>
                <label class="control-label col-sm-6 address" for="name"></label>
              </div>
            </div>
            <div class="row">
              <div class=" col-sm-12">
                <label class="control-label col-sm-6" style="color: #3C589C; font-weight:600px;" for="name">Contacts:</label>
                <label class="control-label col-sm-6 address" for="name"></label>
              </div>
            </div>
            <div class="row">
              <div class=" col-sm-12">
                <label class="control-label col-sm-6" style="color: #3C589C; font-weight:600px;" for="name">MailId:</label>
                <label class="control-label col-sm-6 address" for="name"></label>
              </div>
            </div>
            <div class="row">
              <div class=" col-sm-12">
                <label class="control-label col-sm-6" style="color: #3C589C; font-weight:600px;" for="name">Country:</label>
                <label class="control-label col-sm-6 address" for="name"></label>
              </div>
            </div>
            <div class="row">
              <div class=" col-sm-12">
                <label class="control-label col-sm-6" style="color: #3C589C; font-weight:600px;" for="name">State:</label>
                <label class="control-label col-sm-6 address" for="name"></label>
              </div>
            </div>
            <div class="row">
              <div class=" col-sm-12">
                <label class="control-label col-sm-6" style="color: #3C589C; font-weight:600px;" for="name">City:</label>
                <label class="control-label col-sm-6 address" for="name"></label>
              </div>
            </div>
            <div class="row">
              <div class=" col-sm-12">
                <label class="control-label col-sm-6" style="color: #3C589C; font-weight:600px;" for="name">PinCode:</label>
                <label class="control-label col-sm-6 address" for="name"></label>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
    <!-- </div> -->

  </div>

  </div>



  <script>
    jQuery('#frmContactus').on('submit', function(e) {
      jQuery('#msg').html('');
      jQuery('#submit').html('Please wait');
      jQuery('#submit').attr('disabled', true);
      jQuery.ajax({
        url: 'submit.php',
        type: 'post',
        data: jQuery('#frmContactus').serialize(),
        success: function(result) {
          jQuery('#msg').html(result);
          jQuery('#submit').html('Submit');
          jQuery('#submit').attr('disabled', false);
          jQuery('#frmContactus')[0].reset();
        }
      });
      e.preventDefault();
    });
  </script>
</body>

</html>