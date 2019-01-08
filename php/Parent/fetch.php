<?php
include('../db.php');
session_start();

$email = $_SESSION['email'];

$query = "SELECT users.firstname, users.lastname, users.mobilenumber, users.email, users.nationalID, users.gender, parent.relativeRelation, address.buildingNo,
    address.StreetName, address.city, address.neigherhoodName from users inner join parent on users.ID = parent.userID
    inner join address on parent.addressID = address.addressID WHERE users.email='$email'";
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) == 1){
    $json = array();
    while($array = mysqli_fetch_assoc($result)){
        $json[] = $array;
    }
    echo json_encode($json);
}



?>
