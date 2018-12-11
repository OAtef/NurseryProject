<?php
include('db.php');

session_start();

$errors = array();

if (isset($_POST['Send_Msg'])) {

  $ParentEmail = $_SESSION['email'];
  $ParentID = 0;
  $ManagerEmail = mysqli_real_escape_string($db, $_POST['email']);
  $ManagerID = 0;
  $Message = mysqli_real_escape_string($db, $_POST['message']);

  if (empty($ManagerEmail)) {
    array_push($errors, "email is required");
  }

  if (empty($Message)) {
    array_push($errors, "Message is required");
  }

  if (count($errors) == 0) {

      $GetParentID = "SELECT ID FROM users WHERE email LIKE '$ParentEmail' AND type = 1";
      $IDresult = mysqli_query($db, $GetParentID);
      $result = mysqli_fetch_array($IDresult);
      if ($result) {
        $ParentID = $result['ID'];
      }
      else {
        array_push($errors, "<script>Swal({
                                  type: 'error',
                                  title: 'Oops...',
                                  text: 'You dont exist in the database you dont have ID!',
                                })</script>");
      }

      $GetManagerID = "SELECT ID FROM users WHERE email LIKE '$ManagerEmail' AND type = 2";
      $IDresult = mysqli_query($db, $GetManagerID);
      $result = mysqli_fetch_array($IDresult);
      if ($result) {
        $ManagerID = $result['ID'];
      }
      else {
        array_push($errors, "<script>Swal({
                                  type: 'error',
                                  title: 'Oops...',
                                  text: 'There is no manager with this email!',
                                })</script>");
      }

      $SendMsgQuery = "INSERT INTO commentsto (nurseID, parentID, msg, sentDate) VALUES ('$ManagerID', '$ParentID', '$Message', '2018-12-04')";
      $results = mysqli_query($db, $SendMsgQuery);
      // $test = mysqli_fetch_array($results);
      // echo $test['msg'];
      if (mysqli_num_rows($results) >= 1) {

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
                                    text: 'There was and error while sending message make sure from the Email!',
                                  })</script>");
      }
  }

}


?>
