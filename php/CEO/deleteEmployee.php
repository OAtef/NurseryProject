<?php

include('../db.php');

// remove nurse from users

// delete nurse from nursemanager

// update table interviews

// no change commentson

// update children

// no change to commentsto

if (!empty($_POST["oldEmployee"]) && !empty($_POST["newEmployee"])) {

  $oldID = $_POST["oldEmployee"];
  $newID = $_POST["newEmployee"];

  $UpdateTableInterviewQuery = "UPDATE interviews SET nurseID = '$newID' WHERE interviews.nurseID = '$oldID'";
  $UpdateTableInterviewResult = mysqli_query($db, $UpdateTableInterviewQuery);

  if (!$UpdateTableInterviewResult) {
    echo "<script>Swal({
                        type: 'error',
                        title: 'no interviews with the deleted employee',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: true
                      })</script>";
  }

  $UpdateTableChildrenQuery = "UPDATE children SET nurseID = '$newID' WHERE children.nurseID = '$oldID'";
  $UpdateTableChildrenResult = mysqli_query($db, $UpdateTableChildrenQuery);

  if (!$UpdateTableChildrenResult) {
    echo "<script>Swal({
                        type: 'error',
                        title: 'no children related with the deleted employee',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: true
                      })</script>";
  }

  $DeleteNursemanagerQuery = "DELETE FROM nursemanager WHERE nursemanager.userID = ".$oldID;
  $DeleteNursemanagerResult = mysqli_query($db, $DeleteNursemanagerQuery);

  if (!$DeleteNursemanagerResult) {
    echo "<script>Swal({
                        type: 'error',
                        title: 'Problem with deleting nursemanager table',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: true
                      })</script>";
  }

  $DeleteNurseFromUserQuery = "DELETE FROM users WHERE users.ID = ".$oldID;
  $DeleteNurseFromUserResult = mysqli_query($db, $DeleteNurseFromUserQuery);

  if ($DeleteNurseFromUserResult) {

    echo "<script>Swal({
                        type: 'success',
                        title: 'Employee Deleted',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 2000
                      })</script>";
  }else {
    echo "<script>Swal({
                        type: 'error',
                        title: 'Problem with deleting Users table',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: true
                      })</script>";
  }
}else {
  echo "You should enter the new employee";
}
 ?>
