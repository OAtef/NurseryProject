<?php

include('db.php');
session_start();

$ToEmail = $_SESSION['email'];
$ToID = 0;
$FromEmail = "";

$alerts = array();

$ToIDQuery = "SELECT ID FROM users WHERE email='$ToEmail'";
$IDresult = mysqli_query($db, $ToIDQuery);
$result = mysqli_fetch_array($IDresult);
if ($result) {
  $ToID = $result['ID'];
}
else {
  echo"<script>Swal({
                            type: 'error',
                            title: 'Error in viewing messages',
                            text: 'We couldnt get your ID from database'
                          })</script>";
}

$messageQuery = "SELECT FromID, msg, date from commentsto WHERE ToID='$ToID'";
$messagesResult = mysqli_query($db, $messageQuery);
$collapseID = 0;
if (mysqli_num_rows($messagesResult) > 0) {
  while ($row = mysqli_fetch_assoc($messagesResult)) {
    $FromID = $row["FromID"];
    $GetFromEmailQuery = "SELECT email FROM users WHERE ID = '$FromID'";
    $MailResult = mysqli_query($db, $GetFromEmailQuery);
    $Mail = mysqli_fetch_array($MailResult);
    if ($Mail) {
      $FromEmail = $Mail['email'];

      echo "
      <div class='panel-group' id='accordion'>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          <h4 class='panel-title'>
            <a data-toggle='collapse' data-parent='#accordion' href='#collapse".$collapseID."'>From: ".$FromEmail." -- Date: ".$row['date']."</a>
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
}else {
  echo"<script>Swal({
                            type: 'error',
                            title: 'No messages to view'
                          })</script>";
}

?>
