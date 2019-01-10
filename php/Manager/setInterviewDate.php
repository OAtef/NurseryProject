<?php

include('../db.php');

$interview = $_POST['newInterviewDate'];
$childID = $_POST['ChildID'];


if (!empty($interview)) {

  $query = "UPDATE children SET children.interviewdate='$interview' WHERE children.child_id='$childID'";
  mysqli_query($db, $query);


}else {
  echo "swal error couldnt get new date";
}


?>
