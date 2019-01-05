<?php
include('db.php');
session_start();

$errors = array();

if (isset($_POST['Send_Msg'])) {

  $FromEmail = $_SESSION['email'];
  $FromID = 0;
  $ToEmail = mysqli_real_escape_string($db, $_POST['email']);
  $ToID = 0;
  $Message = mysqli_real_escape_string($db, $_POST['message']);

  if (empty($ToEmail)) {
    array_push($errors, "email is required");
  }

  if (empty($Message)) {
    array_push($errors, "Message is required");
  }

  if (count($errors) == 0) {

      $GetFromIDQuery = "SELECT ID FROM users WHERE email='$FromEmail'";
      $IDresult = mysqli_query($db, $GetFromIDQuery);
      $result = mysqli_fetch_array($IDresult);
      if ($result) {
        $FromID = $result['ID'];
      }
      else {
        array_push($errors, "<script>Swal({
                                  type: 'error',
                                  title: 'Oops...',
                                  text: 'You dont exist in the database you dont have ID!',
                                })</script>");
      }

      $GetToIDQuery = "SELECT ID FROM users WHERE email LIKE '$ToEmail'";
      $IDresult = mysqli_query($db, $GetToIDQuery);
      $result = mysqli_fetch_array($IDresult);
      if ($result) {
        $ToID = $result['ID'];
      }
      else {
        array_push($errors, "<script>Swal({
                                  type: 'error',
                                  title: 'Oops...',
                                  text: 'There is no manager with this email!',
                                })</script>");
      }

      $SendMsgQuery = "INSERT INTO commentsto (ToID, FromID, msg, date) VALUES ('$ToID', '$FromID', '$Message', '2018-12-04')";
      $results = mysqli_query($db, $SendMsgQuery);

      if (mysqli_affected_rows($db) == 1) {

          $MessageSentScript = "<script>Swal({
                                    type: 'success',
                                    title: 'Message Sent successfully',
                                    toast: true,
                                    position: 'top-right',
                                    showConfirmButton: true
                                  })</script>";
      }else {
          array_push($errors, "<script>Swal({
                                    type: 'error',
                                    title: 'Oops...',
                                    text: 'There was an error while sending message make sure from the Email!',
                                  })</script>");
      }
  }
}
?>
