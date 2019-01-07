<?php

include('db.php');

if (!empty($_POST["ChidlID"])) {

  $ChildID = $_POST['ChidlID'];

  // to delete child need to remove first

  // delete commentson

  // delete teaches

  // delete interviews

  $DeleteInterviewQuery = "DELETE FROM interviews WHERE interviews.childID = ".$ChildID;

  if ($DeleteInterviewResult = mysqli_query($db, $DeleteInterviewQuery)) {

    $DeleteTeachesQuery =  "DELETE FROM teaches WHERE teaches.child id = ".$ChildID;

    if ($DeleteTeachesResult = mysqli_query($db, $DeleteTeachesQuery)) {

      $DeleteCommentSonQuery = "DELETE FROM commentson WHERE commentson.child id = ".$ChildID;

      if ($DeleteCoommentSonResult = mysqli_query($db, $DeleteCommentSonQuery)) {

        $DeleteChildQuery = "DELETE FROM children WHERE children.child_id = ".$ChildID;

        if ($DeleteChildResult = mysqli_query($db, $DeleteChildQuery)) {

          echo "Delete Child Done";

        }else {
          echo "Error in DeleteChildResult";
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
  echo "Error getting childID";
}

?>
