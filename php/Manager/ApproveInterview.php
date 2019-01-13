<?php
include('../db.php');
session_start();

$email = $_SESSION['email'];
$ChildID = 0;
$nurseID = 0;

if (isset($_POST['ChildIDApprove'])) {

  $ChildID = $_POST['ChildIDApprove'];

  $GetNurseIDQuery = "SELECT ID FROM users WHERE email = '$email'";
  $GetNurseIDResult = mysqli_query($db, $GetNurseIDQuery);
  $NurseIDdata = mysqli_fetch_array($GetNurseIDResult);

  if ($NurseIDdata) {

    $nurseID = $NurseIDdata['ID'];

    $ApproveChildQuery = "UPDATE children SET accepted = 1, nurseID = '$nurseID' WHERE children.child_id = ".$ChildID;
    $ApproveResult = mysqli_query($db, $ApproveChildQuery)

    if (!$ApproveResult) {

      echo "<script>Swal({
                          type: 'error',
                          title: 'Problem with approving Interview in child table',
                          showConfirmButton: true
                        })</script>";
    }else {

      $DeleteInterviewQuery = "DELETE FROM interviews WHERE interviews.childID = $ChildID";

      if ($DeleteInterviewResult = mysqli_query($db, $DeleteInterviewQuery)) {

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
                            title: 'Problem with deleting Interview table',
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
                      title: 'Couldn't get childID',
                      showConfirmButton: true
                    })</script>";
}
?>
