<?php

include('../db.php');
session_start();

$email = $_SESSION['email'];

$mobile = $_POST['newNumber'];
$hours = $_POST['newHours'];
$password = $_POST['newPass'];
$employeeID = $_POST['EmployeeID'];

if (!empty($mobile)) {

  $UpdateMobileQuery = "UPDATE users SET users.mobilenumber='$mobile' WHERE users.ID='$employeeID'";
  $UpdateMobileResult = mysqli_query($db, $UpdateMobileQuery);

  if ($UpdateMobileResult) {

    echo "<script>Swal({
                        type: 'success',
                        title: 'Mobile Number updated.',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 2000
                      })</script>";
  }else {
    echo "<script>Swal({
                        type: 'error',
                        title: 'Problem while updating mobile number.',
                        showConfirmButton: true
                      })</script>";
  }

}
elseif (!empty($_hours)) {

  $UpdateWorkingHoursQuery = "UPDATE nursemanager SET nursemanager.workingHours='$hours' WHERE nursemanager.userID ='$employeeID'";
  $UpdateWorkingHoursResult = mysqli_query($db, $UpdateWorkingHoursQuery);

  if ($UpdateWorkingHoursResult) {

    echo "<script>Swal({
                        type: 'success',
                        title: 'Working Hours updated.',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 2000
                      })</script>";
  }else {
    echo "<script>Swal({
                        type: 'error',
                        title: 'Problem while updating working hours.',
                        showConfirmButton: true
                      })</script>";
  }

}
elseif (!empty($password)) {

  $UpdatePasswordQuery = "UPDATE users SET users.password='$password' WHERE users.ID='$employeeID'";
  $UpdatePasswordResult = mysqli_query($db, $UpdatePasswordQuery);

  if ($UpdatePasswordResult) {

    echo "<script>Swal({
                        type: 'success',
                        title: 'Password updated.',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 2000
                      })</script>";
  }else {
    echo "<script>Swal({
                        type: 'error',
                        title: 'Problem while updating password.',
                        showConfirmButton: true
                      })</script>";
  }

}else {
  echo "<script>Swal({
                      type: 'error',
                      title: 'Please make sure to enter a value.',
                      showConfirmButton: true
                    })</script>";
}

?>
