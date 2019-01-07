<?php

include('db.php');

$addressID = -1;
$parentID = -1;
$ChildID = -1;


if (!empty($_POST["ParentID"])) {

  $parentID = $_POST["ParentID"];

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

  $DeleteCommentsToQuery = "DELETE FROM commentsto WHERE commentsto.ToID = '$parentID' OR commentsto.FromID = '$parentID'";

  if ($DeleteCommentsToResult = mysqli_query($db, $DeleteCommentsToQuery)) {

    $DeleteInterviewQuery = "DELETE FROM interviews WHERE interviews.parentID = ".$parentID;

    if ($DeleteInterviewResult = mysqli_query($db, $DeleteInterviewQuery)) {

      $GetChildrenIDQuery = "SELECT child_id FROM children WHERE parentID = '$parentID'";
      $ChildrenIDResults = mysqli_query($db, $GetChildrenIDQuery);

      if (mysqli_num_rows($ChildrenIDResults) > 0) {
        while ($row = mysqli_fetch_assoc($ChildrenIDResults)) {

          $ChildID = $row['child_id'];

          $DeleteTeachesQuery =  "DELETE FROM teaches WHERE teaches.child id = ".$ChildID;

          if ($DeleteTeachesResult = mysqli_query($db, $DeleteTeachesQuery)) {

            $DeleteCommentSonQuery = "DELETE FROM commentson WHERE commentson.child id = ".$ChildID;

            if ($DeleteCoommentSonResult = mysqli_query($db, $DeleteCommentSonQuery)) {

              $DeleteChildQuery = "DELETE FROM children WHERE children.child_id = ".$ChildID;

              if ($DeleteChildResult = mysqli_query($db, $DeleteChildQuery)) {

                echo "Delete Child Done";

              }else {
                echo "Error in DeleteChildResult ";
              }
            }else {
              echo "Error in DeleteCoommentSonResult";
            }
          }else {
            echo "Error in DeleteTeachesResult";
          }
        }
      }else {
        echo "Error in ChildrenIDResults fetch";
      }


      $GetAddressIDQuery = "SELECT addressID FROM parent WHERE parent.userID = '$parentID'";
      $GetAddressIDResults = mysqli_query($db, $GetAddressIDQuery);
      $Result = mysqli_fetch_array($GetAddressIDResults);

      if ($Result) {
        $addressID = $Result['addressID'];

        $DeleteAddressQuery = "DELETE FROM address WHERE address.addressID = '$addressID'"

        if ($DeleteAddressResult = mysqli_query($db, $DeleteAddressQuery)) {

          $DeleteParentQuery = "DELETE FROM parent WHERE parent.userID = '$parentID'";

          if ($DeleteParentResult = mysqli_query($db, $DeleteParentQuery)) {

            $DeleteParentFromUserQuery = "DELETE FROM users WHERE users.ID = '$parentID'";

            if ($DeleteParentFromUserResult = mysqli_query($db, $DeleteParentFromUserQuery)) {

              echo "Parent Deleted";

            }else {
              echo "Error in DeleteParentFromUserResult";
            }

          }else {
            echo "Error in DeleteParentResult";
          }

        }else {
          echo "Error in DeleteAddressResult";
        }

      }else {
        echo "Error in GetAddressIDResults";
      }

    }else {
      echo "Error in DeleteInterviewResult";
    }

  }else {
    echo "Error in DeleteCommentsToResult";
  }

}else {
  echo "Error getting parentID";
}

?>
