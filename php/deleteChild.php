<?php

include('db.php');

if (!empty($_POST["ChidlID"])) {


  echo $_POST['ChidlID'];

// $DeleteParentChildrenQuery = "DELETE FROM children WHERE parentID = 2"; // 5)
//
// $DeleteChildCommentSonQuery; // 3) should be done before deleting all children and should get all children IDs
//
// $DeleteTeachesQuery; // 4) also should be done before deleting children
//
// $DeleteInterviewQuery; // 2) should be done before deleting ParentID

}else {
  echo "Error while deleting please try again";
}

?>
