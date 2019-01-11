<?php

include('../db.php');

$addressID = -1;
$parentID = -1;
$ChildID = -1;

// $DeleteParentQuery = "DELETE FROM parent WHERE parent.userID = 3" // 6)
//
// $DeleteAdressQuery; // 7) get addressID from $DeleteParentQuery and DeleteAddress
//
// $DeleteParentUserQuery = "DELETE FROM users WHERE users.ID = 3" // 8) should be the last query to be done
//
// $DeleteParentChildrenQuery = "DELETE FROM children WHERE parentID = 2"; // 5)
//
// $DeleteChildCommentSonQuery; // 3) should be done before deleting all children and should get all children IDs
//
// $DeleteTeachesQuery; // 4) also should be done before deleting children
//
// $DeleteCommentsToQuery = "DELETE FROM commentsto WHERE parentID = 2" // 1) should be done before deleting parentID
//
// $DeleteInterviewQuery; // 2) should be done before deleting ParentID

if (!empty($_POST["ParentID"])) {

  $parentID = $_POST["ParentID"];

  $GetChildrenIDQuery = "SELECT child_id FROM children WHERE parentID = '$parentID'";
  $ChildrenIDResults = mysqli_query($db, $GetChildrenIDQuery);

  if (mysqli_num_rows($ChildrenIDResults) > 0) {
    while ($row = mysqli_fetch_assoc($ChildrenIDResults)) {

      $ChildID = $row['child_id'];

      $DeleteCommentSonQuery = "DELETE FROM commentson WHERE commentson.child id = ".$ChildID;
      $DeleteCoommentSonResult = mysqli_query($db, $DeleteCommentSonQuery);

      if (!$DeleteCoommentSonResult) {

        echo "<script>Swal({
                            type: 'error',
                            title: 'Problem with deleting CommentSon Table',
                            showConfirmButton: true
                          })</script>";
      }

      $DeleteChildQuery = "DELETE FROM children WHERE children.child_id = ".$ChildID;
      $DeleteChildResult = mysqli_query($db, $DeleteChildQuery);

      if (!$DeleteChildResult) {

        echo "<script>Swal({
                            type: 'error',
                            title: 'There was a problem while deleting one of the children',
                            showConfirmButton: true
                          })</script>";
      }
    }
  }else {
    echo "<script>Swal({
                        type: 'error',
                        title: 'Couldn't get ChildID',
                        showConfirmButton: true
                      })</script>";
  }

  $DeleteCommentsToQuery = "DELETE FROM commentsto WHERE commentsto.ToID = '$parentID' OR commentsto.FromID = '$parentID'";
  $DeleteCommentsToResult = mysqli_query($db, $DeleteCommentsToQuery);

  if (!$DeleteCommentsToResult) {

  echo "<script>Swal({
                      type: 'error',
                      title: 'Problem with deleting CommentsTo table',
                      showConfirmButton: true
                    })</script>";
  }

  $DeleteInterviewQuery = "DELETE FROM interviews WHERE interviews.parentID = ".$parentID;
  $DeleteInterviewResult = mysqli_query($db, $DeleteInterviewQuery);

  if (!$DeleteInterviewResult) {

    echo "<script>Swal({
                        type: 'error',
                        title: 'Problem with deleting Interview table',
                        showConfirmButton: true
                      })</script>";
  }

  $GetAddressIDQuery = "SELECT addressID FROM parent WHERE parent.userID = '$parentID'";
  $GetAddressIDResults = mysqli_query($db, $GetAddressIDQuery);
  $Result = mysqli_fetch_array($GetAddressIDResults);

  if ($Result) {
    $addressID = $Result['addressID'];

    $DeleteAddressQuery = "DELETE FROM address WHERE address.addressID = '$addressID'";
    $DeleteAddressResult = mysqli_query($db, $DeleteAddressQuery);

    if (!$DeleteAddressResult) {

      echo "<script>Swal({
                          type: 'error',
                          title: 'Problem with deleting Address table',
                          showConfirmButton: true
                        })</script>";
    }

  }else {
    echo "<script>Swal({
                        type: 'error',
                        title: 'Couldn't get addressID',
                        showConfirmButton: true
                      })</script>";
  }

  $DeleteParentQuery = "DELETE FROM parent WHERE parent.userID = '$parentID'";
  $DeleteParentResult = mysqli_query($db, $DeleteParentQuery);

  if (!$DeleteParentResult) {

    echo "<script>Swal({
                        type: 'error',
                        title: 'Problem with deleting Parent table',
                        showConfirmButton: true
                      })</script>";
  }

  $DeleteParentFromUserQuery = "DELETE FROM users WHERE users.ID = '$parentID'";
  $DeleteParentFromUserResult = mysqli_query($db, $DeleteParentFromUserQuery);

  if ($DeleteParentFromUserResult) {

    echo "<script>Swal({
                        type: 'success',
                        title: 'Parent Deleted',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 2000
                      })</script>";
  }else {
    echo "<script>Swal({
                        type: 'error',
                        title: 'Problem with deleting Users table',
                        showConfirmButton: true
                      })</script>";
  }

  }else {
    echo "<script>Swal({
                        type: 'error',
                        title: 'Couldn't get ParentID',
                        showConfirmButton: true
                      })</script>";
  }

?>
