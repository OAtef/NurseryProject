<?php
include('db.php');

$ChildID = 0;

if (isset($_POST['ChildIDReject'])) {

  $ChildID = $_POST['ChildIDReject'];

}else {
  echo "Error";
}
?>
