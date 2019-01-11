<?php

include('../db.php');
session_start();

$email = $_SESSION['email'];

$mobile = $_POST['newNumber'];
$hours = $_POST['newHours'];
$password = $_POST['newPass'];

if (!empty($mobile)) {

  $query = "UPDATE users SET users.mobilenumber='$mobile' WHERE users.email='$email'";


}
elseif (!empty($_hours)) {

  $query = "UPDATE nursemanager SET nursemanager.workingHours='$hours' INNER JOIN users ON nursemanager.userID = users.ID WHERE users.email='$email'";

}
elseif (!empty($password)) {

  $query = "UPDATE users SET users.password='$password' WHERE users.email='$email'";

}else {
  echo "swal error getting update value";
}

mysqli_query($db, $query);

?>
