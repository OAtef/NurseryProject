<?php
include('db.php');

$ChildID = 0;

// to delete child need to remove first

// delete commentson

// delete teaches

if (isset($_POST['ChildIDReject'])) {

  $ChildID = $_POST['ChildIDReject'];

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

  $DeleteTeachesQuery =  "DELETE FROM teaches WHERE child id = ".$ChildID;
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

  $DeleteCommentSonQuery = "DELETE FROM commentson WHERE child id = ".$ChildID;
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

  $RejectChildQuery = "UPDATE children SET accepted = 2 WHERE children.child_id = ".$ChildID;
  $RejectChildResult = mysqli_query($db, $RejectChildQuery);

  if ($RejectChildResult) {
    echo "<script>Swal({
                        type: 'success',
                        title: 'Child Rejected',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 2000
                      })</script>";

  }else {
    echo "<script>Swal({
                        type: 'error',
                        title: 'Problem with rejecting Interview in child table',
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