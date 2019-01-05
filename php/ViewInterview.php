<?php
include('db.php');

$AllRequestsQuery = "SELECT parentID, childID, day, childAge FROM interviews ";
$RequestsResult = mysqli_query($db, $AllRequestsQuery);
$Counter = 1;

if (mysqli_num_rows($RequestsResult) > 0) {

  echo "
  <table class='data-table'>
    <thead class='data-table-head'>
      <tr>
        <th> </th>
        <th># </th>
        <th>ID</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Mobile</th>
        <th>Day</th>
        <th>Approve</th>
        <th>Reject</th>
      </tr>
    </thead>";

  while ($row = mysqli_fetch_assoc($RequestsResult)) {
    $GetParentInfoQuery = "SELECT * FROM users WHERE ID = ".$row['parentID'];
    $ParentInfoResult = mysqli_query($db, $GetParentInfoQuery);
    $ParentData = mysqli_fetch_array($ParentInfoResult);

    $GetChildInfoQuery = "SELECT * FROM children WHERE child_id = ".$row['childID'];
    $ChildInfoResult = mysqli_query($db, $GetChildInfoQuery);
    $ChildData = mysqli_fetch_array($ChildInfoResult);

    if ($ParentData && $ChildData) {

      echo "
      <tbody>
        <tr class='row row".$Counter."'>
          <td> <label id='lblNo'>".$Counter."</label></td>
          <td><label id='lblID'>".$ParentData['ID']."</label></td>
          <td><label id='lblName'>".$ParentData['firstname']." ".$ParentData['lastname']."</label></td>
          <td><label id='lblGender'>".$ParentData['gender']."</label></td>
          <td><label id='lblMobile'>".$ParentData['mobilenumber']."</label></td>
          <td><label id='lblDay'>".$row['day']."</label></td>
          <td><button onclick='ApproveInterview()'><i class='fa fa-edit'></i> Approve</button></td>
          <td><button onclick='RejectInterview()><i class='fa fa-trash'></i> Reject</button></td>
        </tr>
        <tr class='extra-data extra-data-row".$Counter."'>
          <td colspan='100%'>
            <b>Name: </b> <span id='lblName'>".$ParentData['firstname']." ".$ParentData['lastname']."</span>
            <hr>
            <b>Child Name: </b> <span id='lblChildName'>".$ChildData['first_name']."</span>
            <hr>
            <b>Child ID: </b> <span class='lblChildID-row".$Counter."'>".$ChildData['child_id']."</span>
            <hr>
            <b>Bdate: </b> <span id='lblChildBdate'>".$ChildData['Bdate']."</span>
            <hr>
            <b>Child Age: </b> <span id='lblChildAge'>".$row['childAge']."</span>
          </td>
        </tr>
      </tbody>";

    }
    else {
      echo "user doesn't exist";
    }
  $Counter++;
  }
}

echo "</table>";

?>
