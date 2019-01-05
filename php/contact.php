<html>

<head>
  <title>Contact Form </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="../js/sweetalert2/sweetalert2.all.min.js"></script>
  <style>
    body{
    background: linear-gradient(to left, #3a6186 , #89253e);
    color : #fff;
  }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-xl-8 offset-xl-2 py-5">
        <h1>Contact US </h1>
        <form id="contact-form" method="post" action="" role="form">
          <div class="messages"></div>
          <div class="controls">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_name">Firstname *</label>
                  <input id="form_name" type="text" name="Fname" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_lastname">Lastname *</label>
                  <input id="form_lastname" type="text" name="Lname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_email">Email *</label>
                  <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="form_message">Message *</label>
                  <textarea id="form_message" name="message" class="form-control" placeholder="Message Content*" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-12">
                <input name="submit" type="submit" class="btn btn-success btn-send" value="Send message">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <p class="text-muted">
                  <strong>*</strong> These fields are required.</p>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>

<?php

use PHPMailer\PHPMailer\PHPMailer;

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer;

if(isset($_POST['submit'])){

  $mail->isSMTP();
  $mail->SMTPDebug = 0;
  $mail->Debugoutput = 'html';
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = "nursery.contactus@gmail.com";
  $mail->Password = "NurserySystem123";
  $mail->setFrom($_POST['email'], $_POST['Fname']. ' '. $_POST['Lname']);
  $mail->addAddress('nursery.contactus@gmail.com', 'NurseryProject');

  $mail->Subject = "From ". $_POST['email'];
  $mail->Body    = $_POST['Fname'] . " " . $_POST['Lname'] . " wrote the following:" . "\n\n" . $_POST['message'];

  if (!$mail->send()) {
    echo "<script>Swal({
                        type: 'error',
                        title: 'There was error while sending message, servers might not be working. Please try gain',
                        html: 'If you want to go back to home page '+
                              '<a href="."../welcomePage.php".">Click Here</a>',
                        showConfirmButton: true
                        })</script>";
  } else {
    echo "<script>Swal({
                        type: 'success',
                        title: 'Message Sent successfully',
                        html: 'If you want to go back to home page '+
                              '<a href="."../welcomePage.php".">Click Here</a>',
                        showConfirmButton: true
                        })</script>";
  }
}
?>
