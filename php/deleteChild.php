<?php

include('db.php');

// to delete child need to remove first

// delete commentson

// delete teaches

// delete interviews

if (!empty($_POST["ChidlID"])) {

  $ChildID = $_POST['ChidlID'];

  $DeleteInterviewQuery = "DELETE FROM interviews WHERE interviews.childID = ".$ChildID;
  $DeleteInterviewResult = mysqli_query($db, $DeleteInterviewQuery);

  if (!$DeleteInterviewResult) {

    echo "<script>Swal({
                        type: 'error',
                        title: 'Problem with deleting Interview table',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: true
                      })</script>";
  }

  $DeleteTeachesQuery =  "DELETE FROM teaches WHERE teaches.child id = ".$ChildID;
  $DeleteTeachesResult = mysqli_query($db, $DeleteTeachesQuery);

  if (!$DeleteTeachesResult) {

    echo "<script>Swal({
                        type: 'error',
                        title: 'Problem with deleting Teaches table',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: true
                      })</script>";
  }

  $DeleteCommentSonQuery = "DELETE FROM commentson WHERE commentson.child id = ".$ChildID;
  $DeleteCoommentSonResult = mysqli_query($db, $DeleteCommentSonQuery);

  if (!$DeleteCoommentSonResult) {

    echo "<script>Swal({
                        type: 'error',
                        title: 'Problem with deleting CommentSon table',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: true
                      })</script>";
  }

  $DeleteChildQuery = "DELETE FROM children WHERE children.child_id = ".$ChildID;
  $DeleteChildResult = mysqli_query($db, $DeleteChildQuery);

  if ($DeleteChildResult) {

    echo "<script>Swal({
                        type: 'success',
                        title: 'Child Deleted',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 2000
                      })</script>";

  }else {
    echo "<script>Swal({
                        type: 'error',
                        title: 'Problem with deleting Child table',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: true
                      })</script>";
  }

}else {
  echo "<script>Swal({
                      type: 'error',
                      title: 'Couldn't get ChildID',
                      toast: true,
                      position: 'top-right',
                      showConfirmButton: true
                    })</script>";
}

?>
