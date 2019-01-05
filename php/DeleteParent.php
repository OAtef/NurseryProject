<?php

include('db.php');

if (!empty($_POST["ParentID"])) {


  echo $_POST["ParentID"];

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

}else {
  echo "Error while deleting please try again";
}

?>
