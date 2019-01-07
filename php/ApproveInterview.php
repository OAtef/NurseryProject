<?php
include('db.php');

$ChildID = 0;

if (isset($_POST['ChildIDApprove'])) {

  $ChildID = $_POST['ChildIDApprove'];
  $ApproveChildQuery = "UPDATE children SET accepted = 1 WHERE children.child_id = ".$ChildID;

  if ($ApproveResult = mysqli_query($db, $ApproveChildQuery)) {

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
      echo "Error in DeleteInterviewResult";
    }

  }else {
    echo "Error in ApproveResult";
  }

}else {
  echo "Error in getting ChildIDApprove";
}
?>
