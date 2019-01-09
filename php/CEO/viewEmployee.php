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
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>";

$AllEmployeeQuery = "SELECT * FROM nursemanager";
$EmployeeResult = mysqli_query($db, $AllEmployeeQuery);
$Counter = 1;

if (mysqli_num_rows($EmployeeResult) > 0) {
  while ($row = mysqli_fetch_assoc($EmployeeResult)) {
    $GetEmployeeInfoQuery = "SELECT * FROM users WHERE ID = ".$row['userID'];
    $EmployeeInfoResult = mysqli_query($db, $GetEmployeeInfoQuery);
    $Data = mysqli_fetch_array($EmployeeInfoResult);

    if ($Data) {
      echo "
        <tr class='row row".$Counter."'>
          <td> <label id='lblNo'>".$Counter."</label></td>
          <td><label class='lblID-row".$Counter."'>".$row['userID']."</label></td>
          <td><label id='lblName'>".$Data['firstname']." ".$Data['lastname']."</label></td>
          <td><label id='lblGender'>".$Data['gender']."</label></td>
          <td><label id='lblMobile'>".$Data['mobilenumber']."</label></td>
          <td><button onclick='DeleteEmployee()'><i class='fa fa-trash'></i> Delete</button></td>
        </tr>
        <tr class='extra-data extra-data-row".$Counter."'>
          <td colspan='100%'>
            <b>Mobile Number: </b> ".$Data['mobilenumber']."
            <div id='EditorDivName' style='margin-left: 50%'>
             Enter a Mobile Number: <input type='text' id='lblMobNumber-row".$Counter."' value='' />
                                    <input type='button' id='textEditor' value='Change Name' onclick='changeMobileNumber()' />
            </div>
            <hr>
            <b>Weekly Working Hours: </b> ".$row['workingHours']."
            <div id='EditorDivName' style='margin-left: 50%'>
             Enter a Number: <input type='text' id='lblworkingHours-row".$Counter."' value='' />
                             <input type='button' id='textEditor' value='Change Name' onclick='changeWorkingHours()' />
            </div>
            <hr>
            <b>Change Password: </b> *****
            <div id='EditorDivEmail' style='margin-left: 50%'>
             Enter New Password: <input type='text' id='lblPass-row".$Counter."' value='' />
                                 <input type='button' id='textEditor' value='Change Email' onclick='changePassword()' />
            </div>
            <hr>
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
