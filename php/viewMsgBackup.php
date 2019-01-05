<?php

include('db.php');
session_start();

$ParentEmail = $_SESSION['email'];
$ParentID = 0;
$NurseMail = "";

$errors = array();
$Messages = array();

$ParentIDQuery = "SELECT ID FROM users WHERE email='$ParentEmail' and type = 1";
$IDresult = mysqli_query($db, $ParentIDQuery);
$result = mysqli_fetch_array($IDresult);
if ($result) {
  $ParentID = $result['ID'];
}
else {
  array_push($errors, "<script>Swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'You dont exist in the database you dont have ID!',
                          })</script>");
}

$messageQuery = "SELECT nurseID, msg, date from commentsto WHERE parentID='$ParentID'";
$commentResult = mysqli_query($db, $messageQuery);
$collapseID = 0;
if (mysqli_num_rows($commentResult) > 0) {
  while ($row = mysqli_fetch_assoc($commentResult)) {
    $nurseID = $row["nurseID"];
    $GetNurseMailQuery = "SELECT email FROM users WHERE ID = '$nurseID' and type = 2";
    $MailResult = mysqli_query($db, $GetNurseMailQuery);
    $Mail = mysqli_fetch_array($MailResult);
    if ($Mail) {
      $NurseMail = $Mail['email'];

      echo "
      <div class='panel-group' id='accordion'>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          <h4 class='panel-title'>
            <a data-toggle='collapse' data-parent='#accordion' href='#collapse".$collapseID."'>".$NurseMail."</a>
          </h4>
        </div>
        <div id='collapse".$collapseID."'class='panel-collapse collapse '>
          <div class='panel-body'>".$row["msg"]."</div>
        </div>
      </div>
      </div>";
    }
    $collapseID += 1;
  }
}

// print_r($Messages);
// echo($Messages);
?>
