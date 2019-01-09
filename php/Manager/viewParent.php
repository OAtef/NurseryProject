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
    <th>Mobile</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>";

$AllParentsQuery = "SELECT userID, relativeRelation FROM parent";
$ParentResult = mysqli_query($db, $AllParentsQuery);
$Counter = 1;

if (mysqli_num_rows($ParentResult) > 0) {
  while ($row = mysqli_fetch_assoc($ParentResult)) {
    $GetParentInfoQuery = "SELECT * FROM users WHERE ID = ".$row['userID'];
    $ParentInfoResult = mysqli_query($db, $GetParentInfoQuery);
    $Data = mysqli_fetch_array($ParentInfoResult);

    if ($Data) {
      echo "
      <tr class='row row".$Counter."'>
        <td> <label id='lblNo'>".$Counter."</label></td>
        <td><label class='lblID-row".$Counter."' id='lblID'>".$row['userID']."</label></td>
        <td><label id='lblName'>".$Data['firstname']." ".$Data['lastname']."</label></td>
        <td><label id='lblGender'>".$Data['gender']."</label></td>
        <td><label id='lblMobile'>".$Data['mobilenumber']."</label></td>
        <td><button onclick='DeleteParent()'><i class='fa fa-trash'></i> Delete</button></td>
      </tr>
      <tr class='extra-data extra-data-row".$Counter."'>
        <td colspan='100%'>
          <b>Name: </b> ".$Data['firstname']." ".$Data['lastname']."
          <hr>
          <b>Mobile: </b> ".$Data['mobilenumber']."
          <hr>
          <b>Parent Email: </b> ".$Data['email']."
          <hr>
          <b>Invoice ID: </b> Value 4
          <hr>
          <b>Children Count: </b> 0
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
