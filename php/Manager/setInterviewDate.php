<?php

include('../db.php');

$interview = $_POST['newInterviewDate'];
$childID = $_POST['ChildID'];

// echo $interview . " " . $childID;

if (!empty($interview)) {

  $setInterviewDateQuery = "UPDATE interviews SET day='$interview' WHERE childID='$childID'";
  $setInterviewDateResult = mysqli_query($db, $setInterviewDateQuery);
  if ($setInterviewDateResult) {
    echo "<script>Swal({
                        type: 'success',
                        title: 'Interview Date Updated',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 2000
                      })</script>";
  }else {
    echo "<script>Swal({
                        type: 'error',
                        title: 'Problem while setting interview date',
                        showConfirmButton: true
                      })</script>";
  }
}else {
  echo "<script>Swal({
                      type: 'error',
                      title: 'Please make sure to select a date',
                      showConfirmButton: true
                    })</script>";
}


?>
