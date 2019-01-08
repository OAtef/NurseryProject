<?php
include('../db.php');
session_start();

$email = $_SESSION['email'];
$child = $_POST['name'];

$query = "SELECT children.img, children.accepted from children inner join parent on children.parentID = parent.userID inner join users on parent.userID = users.ID
    WHERE users.email='$email' and children.first_name='$child'";
$result = mysqli_query($db, $query);

$row = mysqli_fetch_array($result);

if($row['accepted'] == 2){
    echo 'data:image/jpeg;base64,';
}
else{
    echo 'data:image/jpeg;base64,'.base64_encode( $row['img'] );
}



?>
