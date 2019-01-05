<?php
include('db.php');
session_start();

$email = $_SESSION['email'];

$query = "SELECT child_id, first_name from children inner join parent on children.parentID = parent.userID INNER JOIN users on parent.userID = users.ID WHERE users.email ='$email'";
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) >= 1){
    $json = array();
    while($array = mysqli_fetch_assoc($result)){
        $json[] = $array;
    }
echo json_encode($json);
}

?>
