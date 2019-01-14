<?php
include('../db.php');
session_start();

$email = $_SESSION['email'];

$queryadd = "SELECT addressID FROM parent INNER JOIN users ON parent.userID = users.ID WHERE users.email='$email'";
$resultt = mysqli_query($db, $queryadd);
$resultadd = mysqli_fetch_array($resultt);
$address = $resultadd['addressID'];

if($address != null){
    $query = "SELECT users.firstname, users.lastname, users.mobilenumber, users.email, users.nationalID, users.gender, parent.relativeRelation, parent.addressID, address.buildingNo,
    address.StreetName, address.city, address.neigherhoodName FROM users INNER JOIN parent ON users.ID = parent.userID
    inner join address on parent.addressID = address.addressID WHERE users.email='$email'";

}else{
    $query = "SELECT users.firstname, users.lastname, users.mobilenumber, users.email, users.nationalID, users.gender, parent.relativeRelation
    FROM users INNER JOIN parent ON users.ID = parent.userID WHERE users.email='$email'";
}

$result = mysqli_query($db, $query);

if(mysqli_num_rows($result) == 1){
    $json = array();
    while($array = mysqli_fetch_assoc($result)){
        $json[] = $array;
    }
    echo json_encode($json);
}
?>
