<?php
include('../db.php');
session_start();

$email = $_SESSION['email'];
$child = $_SESSION['childname'];

$query = "SELECT children.child_id, children.first_name, children.last_name, category.categoryName, children.interviewdate, children.Bdate,
            parent.relativeRelation, users.firstname, users.lastname, users.mobilenumber, users.nationalID,  users.email from children
        inner join category on children.categoryNo = category.categoryNo
        inner join parent on children.parentID = parent.userID
        inner join users on parent.userID = users.ID
        WHERE users.email='$email' and children.first_name='$child'";
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) == 1){
    $json = array();
    while($array = mysqli_fetch_assoc($result)){
        $json[] = $array;
    }
    echo json_encode($json);
}
?>
