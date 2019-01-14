<?php
include('../db.php');
session_start();

$email = $_SESSION['email'];
$child = $_POST['ID'];

$query = "SELECT children.img, children.accepted from children WHERE children.child_id='$child'";
$result = mysqli_query($db, $query);

$row = mysqli_fetch_array($result);

if($row['accepted'] == 2){
    echo 'data:image/jpeg;base64,';
}
else{
    echo 'data:image/jpeg;base64,'.base64_encode( $row['img'] );
}



?>
