<?php
include('../db.php');
session_start();

$email = $_SESSION['email'];
$comment = $_POST['Comment'];
$childID = $_POST['ChildID'];

if ($comment) {

  $GetNurseIDQuery = "SELECT ID FROM users WHERE email = '$email'";
  $GetNurseIDResult = mysqli_query($db, $GetNurseIDQuery);
  $NurseIDdata = mysqli_fetch_array($GetNurseIDResult);

  if ($NurseIDdata) {

    $nurseID = $NurseIDdata['ID'];

    $CommentsonQuery = "INSERT INTO commentson (nurseID, child id, comment, behaviour) VALUES ('$nurseID', '$childID', '$comment', 'good')";
    $CommentsonResult = mysqli_query($db, $CommentsonQuery)

    if ($CommentsonResult) {

      echo "<script>Swal({
                          type: 'success',
                          title: 'Interview Approved',
                          toast: true,
                          position: 'top-right',
                          showConfirmButton: false,
                          timer: 2000
                        })</script>";
    }else {

      echo "<script>Swal({
                          type: 'error',
                          title: 'Problem with inserting comment on child',
                          showConfirmButton: true
                        })</script>";
    }
  }else {
    echo "<script>Swal({
                        type: 'error',
                        title: 'Problem getting nurseID',
                        showConfirmButton: true
                      })</script>";
  }
}else {
  echo "<script>Swal({
                      type: 'error',
                      title: 'Problem getting comment',
                      showConfirmButton: true
                    })</script>";
}



?>
