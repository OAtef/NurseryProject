<?php
include('../db.php');
session_start();

$email = $_SESSION['email'];

    $query = "SELECT img FROM users INNER JOIN parent ON users.ID = parent.userID  WHERE users.email='$email'";
    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_array($result);

    echo 'data:image/jpeg;base64,'.base64_encode( $row['img'] );
?>
