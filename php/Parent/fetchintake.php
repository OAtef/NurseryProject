<?php
include('../db.php');
session_start();

$email = $_SESSION['email'];
$child = $_SESSION['childID'];


$query = "SELECT children.child_id, children.first_name, children.last_name, category.categoryName, category.cost from children
        inner join category on children.categoryNo = category.categoryNo
        WHERE children.child_id='$child'";
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) == 1){


    $json = array();
    while($array = mysqli_fetch_assoc($result)){
        $json[] = $array;
    }
    echo json_encode($json);
}

?>
