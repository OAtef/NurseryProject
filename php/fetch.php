<?php
include('db.php');

session_start();



$email = $_SESSION['email'];
$password = $_SESSION['password'];

$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($db, $query);

$json = array();

while($array = mysqli_fetch_assoc($result)){

    $json[] = $array;

} 
echo json_encode($json);

?>