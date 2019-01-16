<?php
include('db.php');
session_start();

$alerts = array();
$CurrentDate = date("Y-m-d");

$ToEmail = $_POST['Mail'];
$Message = $_POST['Message'];

// echo $ToEmail. " ".$Message;

if ($ToEmail) {

  $FromEmail = $_SESSION['email'];
  $FromID = 0;
  // $ToEmail = mysqli_real_escape_string($db, $_POST['email']);
  $ToID = 0;
  // $Message = mysqli_real_escape_string($db, $_POST['message']);

  if (empty($Message)) {
    echo "<script>Swal({
                        type: 'error',
                        title: 'Error in sending message!!',
                        text: 'Please enter a message to send it',
                      })</script>";
  }else {

    $GetFromIDQuery = "SELECT ID FROM users WHERE email='$FromEmail'";
    $IDresult = mysqli_query($db, $GetFromIDQuery);
    $result = mysqli_fetch_array($IDresult);
    if ($result) {
      $FromID = $result['ID'];
    }
    else {
      echo "<script>Swal({
                          type: 'error',
                          title: 'Error in sending message!!',
                          text: 'Problem getting your ID from database!',
                        })</script>";
    }

    $GetToIDQuery = "SELECT ID FROM users WHERE email LIKE '$ToEmail'";
    $IDresult = mysqli_query($db, $GetToIDQuery);
    $result = mysqli_fetch_array($IDresult);
    if ($result) {
      $ToID = $result['ID'];
    }
    else {
      echo "<script>Swal({
                          type: 'error',
                          title: 'Error in sending message!!',
                          text: 'There is no manager with this email!',
                        })</script>";
    }

    if (count($alerts) == 0) {

      $SendMsgQuery = "INSERT INTO commentsto (ToID, FromID, msg, date) VALUES ('$ToID', '$FromID', '$Message', '$CurrentDate')";
      $results = mysqli_query($db, $SendMsgQuery);

      if (mysqli_affected_rows($db) == 1) {

        echo "<script>Swal({
                            type: 'success',
                            title: 'Message Sent successfully',
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: true
                          })</script>";
      }else {
        echo "<script>Swal({
                            type: 'error',
                            title: 'Error in sending message!!',
                            text: 'There was an error while inserting message in database!',
                          })</script>";
      }
    }
  }
}
?>
