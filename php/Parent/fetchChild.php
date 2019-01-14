<?php
include('../db.php');
session_start();

$email = $_SESSION['email'];
$_SESSION['childID'] = $child = $_POST['ID'];

 $query = "SELECT children.first_name, children.last_name, children.Gender, children.Bdate, children.interviewdate, children.accepted
         from children WHERE children.child_id='$child'";

$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) == 1){
    $json = array();
    while($array = mysqli_fetch_assoc($result)){
        $json[] = $array;
    }
    echo json_encode($json);
}
?>
