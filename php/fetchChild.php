<?php
include('db.php');
session_start();

$email = $_SESSION['email'];
$_SESSION['childname'] = $child = $_POST['name'];

$query = "SELECT children.first_name, children.last_name, children.Gender, children.Bdate, children.interviewdate, children.accepted
        from children inner join parent on children.parentID = parent.userID inner join users on parent.userID = users.ID
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
