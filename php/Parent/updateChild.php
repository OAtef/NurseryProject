<?php

include('../db.php');
session_start();

$email = $_SESSION['email'];

$firstname = $_POST["child_fname"];
$lastname = $_POST["child_lname"];
$bdate = $_POST["child_bdate"];
$gender = $_POST["gender"];
$id = $_POST["id"];

$img  = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

$query_name = "SELECT * from children inner join users where users.ID = children.parentID WHERE users.email='$email' and children.first_name='$firstname'";
$query_name_result = mysqli_query($db, $query_name);
if(mysqli_num_rows($query_name_result))
{
  // error child name already exist
}
else{
    if($_FILES['image']['name'] == ''){

        $query = "UPDATE children SET children.first_name='$firstname', children.last_name='$lastname', children.Gender='$gender', children.Bdate='$bdate'
        WHERE children.child_id='$id' and children.parentID IN (SELECT ID FROM users WHERE users.ID = children.parentID and users.email='$email')";

    }else{

        $query = "UPDATE children SET children.first_name='$firstname', children.last_name='$lastname', children.Gender='$gender', children.Bdate='$bdate', children.img='$img'
        WHERE children.child_id='$id' and children.parentID IN (SELECT ID FROM users WHERE users.ID = children.parentID and users.email='$email')";

    }

    $results = mysqli_query($db, $query);
}

if (mysqli_affected_rows($db) == 1) {

    array_push($alerts, "<script>Swal({
                            type: 'success',
                            title: 'Profile Updated successfully',
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: true
                        })</script>");
}else {
    array_push($alerts, "<script>Swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'There was an error while upadting your data!',
                        })</script>");
    }
?>
