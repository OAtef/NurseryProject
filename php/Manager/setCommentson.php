<?php
include('../db.php');
session_start();

$email = $_SESSION['email'];
$comment = $_POST['Comment'];
$childID = $_POST['ChildID'];

// echo $email." ".$comment." ".$childID;

if ($comment) {

  $GetNurseIDQuery = "SELECT ID FROM users WHERE email = '$email'";
  $GetNurseIDResult = mysqli_query($db, $GetNurseIDQuery);
  $NurseIDdata = mysqli_fetch_array($GetNurseIDResult);

  if ($NurseIDdata) {

    $nurseID = $NurseIDdata['ID'];

    $CommentsonSearchQuery = "SELECT * FROM commentson WHERE childID = '$childID'";
    $CommentsonSearchResult = mysqli_query($db, $CommentsonSearchQuery);

    if ($CommentsonSearchResult) {

      $CommentsonQuery = "UPDATE commentson SET comment='$comment' WHERE childID='$childID'";
      $CommentsonResult = mysqli_query($db, $CommentsonQuery);

      if ($CommentsonResult) {

        echo "<script>Swal({
                            type: 'success',
                            title: 'Comment Added',
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 2000
                          })</script>";
      }else {

        echo "<script>Swal({
                            type: 'error',
                            title: 'Problem with updating comment on child',
                            showConfirmButton: true
                          })</script>";
      }
    }else {

      $CommentsonQuery = "INSERT INTO commentson (nurseID, childID, comment) VALUES ('$nurseID', '$childID', '$comment')";
      $CommentsonResult = mysqli_query($db, $CommentsonQuery);

      if ($CommentsonResult) {

        echo "<script>Swal({
                            type: 'success',
                            title: 'Comment Added',
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
