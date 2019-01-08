<?php

include('../db.php');

$AllEmployeeQuery = "SELECT * FROM nursemanager";
$EmployeeResult = mysqli_query($db, $AllEmployeeQuery);
$Counter = 1;

if (mysqli_num_rows($EmployeeResult) > 0) {

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
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>";

  while ($row = mysqli_fetch_assoc($EmployeeResult)) {
    $GetEmployeeInfoQuery = "SELECT * FROM users WHERE ID = ".$row['userID'];
    $EmployeeInfoResult = mysqli_query($db, $GetEmployeeInfoQuery);
    $Data = mysqli_fetch_array($EmployeeInfoResult);

    if ($Data) {
      echo "
      <tbody>
        <tr class='row row".$Counter."'>
          <td> <label id='lblNo'>".$Counter."</label></td>
          <td><label id='lblID'>".$row['userID']."</label></td>
          <td><label id='lblName'>".$Data['firstname']." ".$Data['lastname']."</label></td>
          <td><label id='lblGender'>".$Data['gender']."</label></td>
          <td><label id='lblMobile'>".$Data['mobilenumber']."</label></td>
          <td><button onclick='EditEmployee()'><i class='fa fa-edit'></i> Edit</button></td>
          <td><button onclick='DeleteEmployee()'><i class='fa fa-trash'></i> Delete</button></td>
        </tr>
        <tr class='extra-data extra-data-row".$Counter."'>
          <td colspan='100%'>
            <b>Name: </b> ".$Data['firstname']." ".$Data['lastname']."
            <div id='EditorDivName' style='margin-left: 50%'> Enter a Name: <input type='text' id='emp' value='' /> <input type='button' id='textEditor' value='Change Name' onclick='changeName()' /> </div>
            <hr>
            <b>Mobile: </b> ".$Data['mobilenumber']."
            <div id='EditorDivName' style='margin-left: 50%'> Enter a Name: <input type='text' id='emp' value='' /> <input type='button' id='textEditor' value='Change Name' onclick='changeName()' /> </div>
            <hr>
            <b>Employee Email: </b> ".$Data['email']."
            <div id='EditorDivEmail' style='margin-left: 50%'> Enter New Email: <input type='text' id='emp' value='' /> <input type='button' id='textEditor' value='Change Email' onclick='changeEmail()' /> </div>
            <hr>
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
