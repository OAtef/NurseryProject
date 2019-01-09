<?php

include('../db.php');

echo "
<table class='data-table'>
  <thead class='data-table-head'>
    <tr>
      <th> </th>
      <th>Number </th>
      <th>ID</th>
      <th>Name</th>
      <th>Gender</th>
      <th>Bdate</th>
      <th>Interview</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>";


$AllChildrenQuery = "SELECT * FROM children";
$ChildrenResult = mysqli_query($db, $AllChildrenQuery);
$Counter = 1;

if (mysqli_num_rows($ChildrenResult) > 0) {
  while ($row = mysqli_fetch_assoc($ChildrenResult)) {

    $GetParentInfoQuery = "SELECT * FROM users WHERE ID = ".$row['parentID'];
    $ParentInfoResult = mysqli_query($db, $GetParentInfoQuery);
    $ParentData = mysqli_fetch_array($ParentInfoResult);

    if ($ParentData) {

      echo "
        <tr class='row row".$Counter."'>
          <td> <label id='lblNo'>".$Counter."</label></td>
          <td><label class='lblID-row".$Counter."' id='lblID'>".$row['child_id']."</label></td>
          <td><label id='lblName'>".$row['first_name']." ".$row['last_name']."</label></td>
          <td><label id='lblGender'>".$row['Gender']."</label></td>
          <td><label id='lblBdate'>".$row['Bdate']."</label></td>
          <td><label id='lblBdate'>";
          if ($row['accepted'] == 1) {
            echo "Accepted";
          }elseif ($row['accepted'] == 0) {
            echo "Pending";
          }elseif ($row['accepted'] == 2) {
            echo "Rejected";
          }
          echo "</label></td>
          <td><button onclick='DeleteChild()'><i class='fa fa-trash'></i> Delete</button></td>
        </tr>
        <tr class='extra-data extra-data-row".$Counter."'>
          <td colspan='100%'>
            <b>Parent ID: </b> ".$ParentData['ID']."
            <hr>
            <b>Parent Name: </b> ".$ParentData['firstname']." ".$ParentData['lastname']."
            <hr>
            <b>Child ID: </b> ".$row['child_id']."
            <hr>
            <b>Child Birthdate: </b> ".$row['Bdate']."
            <hr>
            ";
            if ($row['accepted'] == 1 || $row['accepted'] == 2) {
              echo "<b>InterView Date: </b> ".$row['interviewdate']."";
            }elseif ($row['accepted'] == 0) {
              echo "<b>InterView Date: </b> ".$row['interviewdate']."
              <div id='EditorDivBdate' style='margin-left: 50%'>
                Enter New Date: <input type='date' id='InterviewDate-row".$Counter."' value='' /> <input type='button' id='textEditor' value='Change Birthday Date' onclick='changeInterviewDate()' />
              </div>";
            }
            echo "
          </td>
        </tr>";

    }
    else {
      echo "user doesn't exist";
    }
  $Counter++;
  }
}

echo "
  </tbody>
</table>";

?>
