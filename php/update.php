<?php
include('db.php');
session_start();

$email = $_SESSION['email'];
$pass = $_SESSION['password'];

    $firstname = $_POST["fname"];
    $lastname = $_POST["lastname"];
    $mobileNum = $_POST["mobile"];
    $password_old = $_POST["oldpass"];
    $password_new = $_POST["newpass"];
    $natinalID = $_POST["Nid"];
    $relativeRelation = $_POST["relativeRelation"];
    
    $city = $_POST["city"];
    $neigherhoodName = $_POST["neigherhoodName"];
    $StreetName = $_POST["StreetName"];
    $buildno=$_POST["buildno"];

    // img
    $img  = addslashes(file_get_contents($_FILES["imageParent"]["tmp_name"])); 
    
    // check password
    if($password_old == "" && $password_new == ""){
        $password_new = $pass;   
    }else{
        if($password_old == $pass){
            $_SESSION['password'] = $password_new;
        }else{
            array_push($errors, "<script>Swal({
                type: 'error',
                title: 'Oops...',
                text: 'old password is entered wrong please recheck your old password !',
              })</script>");
        }
    }

        // check img exist or not
    if($_FILES['imageParent']['name'] == ''){

        //echo "image does not exist";

        $query = "UPDATE users,parent,address SET users.firstname='$firstname', users.lastname='$lastname', users.mobilenumber='$mobileNum', 
            users.password='$password_new', users.nationalID='$natinalID', parent.relativeRelation='$relativeRelation',
             address.city='$city', address.neigherhoodName='$neigherhoodName', address.StreetName='$StreetName', address.buildingNo='$buildno'
            WHERE users.email='$email' and users.ID = parent.userID and parent.addressID = address.addressID";

    }else{

        //echo "image does exist";

        $query = "UPDATE users,parent,address SET users.firstname='$firstname', users.lastname='$lastname', users.mobilenumber='$mobileNum', 
            users.password='$password_new', users.nationalID='$natinalID', parent.relativeRelation='$relativeRelation', parent.img='$img',
             address.city='$city', address.neigherhoodName='$neigherhoodName', address.StreetName='$StreetName', address.buildingNo='$buildno'
            WHERE users.email='$email' and users.ID = parent.userID and parent.addressID = address.addressID";

    }

    $results = mysqli_query($db, $query);

    if (mysqli_affected_rows($db) == 1) {

        $MessageSentScript = "<script>Swal({
                                  type: 'success',
                                  title: 'Profile Updated successfully',
                                  toast: true,
                                  position: 'top-right',
                                  showConfirmButton: true
                                })</script>";
    }else {
        array_push($errors, "<script>Swal({
                                  type: 'error',
                                  title: 'Oops...',
                                  text: 'There was an error while upadting your data!',
                                })</script>");
    }
?>