<?php
include('../db.php');

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
      <th>Approve</th>
      <th>Reject</th>
    </tr>
  </thead>
  <tbody>";

$AllRequestsQuery = "SELECT * FROM interviews WHERE day IS NULL";
$RequestsResult = mysqli_query($db, $AllRequestsQuery);
$Counter = 1;

if (mysqli_num_rows($RequestsResult) > 0) {
  while ($row = mysqli_fetch_assoc($RequestsResult)) {
    $GetParentInfoQuery = "SELECT * FROM users WHERE ID = ".$row['parentID'];
    $ParentInfoResult = mysqli_query($db, $GetParentInfoQuery);
    $ParentData = mysqli_fetch_array($ParentInfoResult);

    $GetChildInfoQuery = "SELECT * FROM children WHERE child_id = ".$row['childID'];
    $ChildInfoResult = mysqli_query($db, $GetChildInfoQuery);
    $ChildData = mysqli_fetch_array($ChildInfoResult);

    if ($ParentData && $ChildData) {

      echo "
        <tr class='row row".$Counter."'>
          <td> <label id='lblNo'>".$Counter."</label></td>
          <td><label id='lblID'>".$ParentData['ID']."</label></td>
          <td><label id='lblName'>".$ParentData['firstname']." ".$ParentData['lastname']."</label></td>
          <td><label id='lblGender'>".$ParentData['gender']."</label></td>
          <td><label id='lblMobile'>".$ParentData['mobilenumber']."</label></td>
          <td><button onclick='ApproveInterview()'><i class='fa fa-edit'></i> Approve</button></td>
          <td><button onclick='RejectInterview()'><i class='fa fa-trash'></i> Reject</button></td>
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
            <b>Enter InterView Date: </b> ".$row['day']."
            <div id='EditorDivInterview' style='margin-left: 50%'>
              Enter New Date: <input type='date' id='InterviewDate-row".$Counter."' value='' />
                              <input type='button' id='textEditor' value='Change Birthday Date' onclick='changeInterviewDate()' />
            </div>
          </td>
        </tr>";
    }
    else {
      echo "user doesn't exist";
    }
  $Counter++;
  }
}else {
  echo "<script>Swal({
                      type: 'error',
                      title: 'There is no data to show.',
                      showConfirmButton: true
                    })</script>";
}

echo "</tbody>
    </table>";

?>
