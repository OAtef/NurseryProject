<?php
include('../db.php');

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$mobilenumber = $_POST["mobilenumber"];
$gender = $_POST["gender"];
$nationalid = $_POST["nationalid"];
$workingHours = $_POST["hours"];
$email = $_POST["email"];
$password = $_POST["password"];
$type = 2;

$check_email = "SELECT email from users WHERE users.email='$email'";
$check_email_result = mysqli_query($db, $check_email);
if(mysqli_num_rows($check_email_result) > 0) {
  echo "<script>Swal({
                      type: 'error',
                      title: 'Email is used by other user',
                      showConfirmButton: true
                    })</script>";
}
else{
  $query_into_users = "INSERT INTO users (firstname, lastname, mobilenumber, email, password, nationalID, type, gender)
    VALUES ('$firstname', '$lastname', '$mobilenumber', '$email', '$password', '$nationalid', '$type', '$gender')";

  if(mysqli_query($db, $query_into_users)){

    $manager_id_query  = "SELECT ID from users WHERE users.email='$email'";
    $result_id = mysqli_query($db, $manager_id_query);
    $result = mysqli_fetch_array($result_id);
    $id = $result['ID'];

    $query_into_manager = "INSERT INTO nursemanager (userID, workingHours) VALUES ('$id','$workingHours')";

    if(mysqli_query($db, $query_into_manager)){
      echo "<script>Swal({
                          type: 'success',
                          title: 'Employee Added',
                          toast: true,
                          position: 'top-right',
                          showConfirmButton: false,
                          timer: 2000
                        })</script>";
    }

  } else{
    echo "<script>Swal({
                        type: 'error',
                        title: 'Problem inserting into users table',
                        showConfirmButton: true
                      })</script>";
  }
}

?>
