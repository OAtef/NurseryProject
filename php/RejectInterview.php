<?php
include('db.php');

$ChildID = 0;

if (isset($_POST['ChildIDReject'])) {

  $ChildID = $_POST['ChildIDReject'];
  $DeleteInterviewQuery = "DELETE FROM interviews WHERE interviews.childID = ".$ChildID;

  // to delete child need to remove first

  // delete commentson

  // delete teaches

  if ($DeleteInterviewResult = mysqli_query($db, $DeleteInterviewQuery)) {

    $DeleteTeachesQuery =  "DELETE FROM teaches WHERE child id = ".$ChildID;

    if ($DeleteTeachesResult = mysqli_query($db, $DeleteTeachesQuery)) {

      $DeleteCommentSonQuery = "DELETE FROM commentson WHERE child id = ".$ChildID;

      if ($DeleteCoommentSonResult = mysqli_query($db, $DeleteCommentSonQuery)) {

        $RejectChildQuery = "UPDATE children SET accepted = 2 WHERE children.child_id = ".$ChildID;

        if ($RejectChildResult = mysqli_query($db, $RejectChildQuery)) {
          echo "Operation Completed";

        }else {
          echo "Error in RejectChildResult";
        }
      }else {
        echo "Error in DeleteCoommentSonResult";
      }
    }else {
      echo "Error in DeleteTeachesResult";
    }
  }else {
    echo "Error in DeleteInterviewResult";
  }
}else {
  echo "Error in getting ChildIDReject";
}

?>
