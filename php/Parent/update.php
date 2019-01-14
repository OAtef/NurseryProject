<?php
include('../db.php');
session_start();

$email = $_SESSION['email'];
$pass = $_SESSION['password'];

    $firstname = $_POST["fname"];
    $lastname = $_POST["lastname"];
    $mobileNum = $_POST["mobile"];
    $password_old = $_POST["oldpass"];
    $password_new = $_POST["newpass"];
    $relativeRelation = $_POST["relativeRelation"];

    $city = $_POST["city"];
    $neigherhoodName = $_POST["neigherhoodName"];
    $StreetName = $_POST["StreetName"];
    $buildno=$_POST["buildno"];

    $query = "SELECT addressID FROM parent IINER JOIN users ON parent.userID = users.ID WHERE users.email='$email'";
    $result = mysqli_query($db, $query);
    $resultadd = mysqli_fetch_array($result);
    $address = $resultadd['addressID'];

    // img
    $img  = addslashes(file_get_contents($_FILES["imageParent"]["tmp_name"]));

    if($password_old == "" && $password_new == ""){
        $password_new = $pass;

        if($_FILES['imageParent']['size'] == 0 && $_FILES['imageParent']['error'] == 0){

            if($address != null){
                $query = "UPDATE users,parent,address SET users.firstname='$firstname', users.lastname='$lastname', users.mobilenumber='$mobileNum',
                users.password='$password_new', parent.relativeRelation='$relativeRelation',
                address.city='$city', address.neigherhoodName='$neigherhoodName', address.StreetName='$StreetName', address.buildingNo='$buildno'
                WHERE users.email='$email' and users.ID = parent.userID and parent.addressID = address.addressID";
            }
            else{

                $query_addressID = "SELECT addressID FROM address WHERE address.city='$city' and address.neigherhoodName='$neigherhoodName' 
                and address.StreetName='$StreetName' and address.buildingNo='$buildno'";
                $result_addID = mysqli_query($db, $query_address);
                $resultaddressID = mysqli_fetch_array($result_addID);
                $addressID = $resultaddressID['addressID'];

                if($addressID == null){ // means there is pre. address record

                    $queryInsert = "INSERT INTO address (city, neigherhoodName, StreetName, buildingNo) VALUES('$city','$neigherhoodName','$StreetName','$buildno')";
                    mysqli_query($db, $queryInsert);

                    $query_add = "SELECT addressID FROM address WHERE address.city='$city' and address.neigherhoodName='$neigherhoodName' 
                    and address.StreetName='$StreetName' and address.buildingNo='$buildno'";
                    $result_adds = mysqli_query($db, $query_add);
                    $resultaddID = mysqli_fetch_array($result_adds);
                    $addressIdd = $resultaddID['addressID'];

                    $query = "UPDATE users,parent SET users.firstname='$firstname', users.lastname='$lastname', users.mobilenumber='$mobileNum',
                        users.password='$password_new', parent.relativeRelation='$relativeRelation', parent.addressID='$addressIdd'
                         WHERE users.email='$email' and users.ID = parent.userID";
                }
                else{
                    $query = "UPDATE users,parent SET users.firstname='$firstname', users.lastname='$lastname', users.mobilenumber='$mobileNum',
                        users.password='$password_new', parent.relativeRelation='$relativeRelation', parent.addressID='$addressID'
                         WHERE users.email='$email' and users.ID = parent.userID";
                }
            }

        }else{
            if($address != null){ // means there is pre. address record
                $query = "UPDATE users,parent,address SET users.firstname='$firstname', users.lastname='$lastname', users.mobilenumber='$mobileNum',
                users.password='$password_new', parent.relativeRelation='$relativeRelation', parent.img='$img',
                 address.city='$city', address.neigherhoodName='$neigherhoodName', address.StreetName='$StreetName', address.buildingNo='$buildno'
                WHERE users.email='$email' and users.ID = parent.userID and parent.addressID = address.addressID";
            }
            else{

                $query_addressID = "SELECT addressID FROM address WHERE address.city='$city' and address.neigherhoodName='$neigherhoodName' 
                and address.StreetName='$StreetName' and address.buildingNo='$buildno'";
                $result_addID = mysqli_query($db, $query_address);
                $resultaddressID = mysqli_fetch_array($result_addID);
                $addressID = $resultaddressID['addressID'];

                if($addressID == null){ // means there is no address with the same informations

                    $queryInsert = "INSERT INTO address (city, neigherhoodName, StreetName, buildingNo) VALUES('$city','$neigherhoodName','$StreetName','$buildno')";
                    mysqli_query($db, $queryInsert);

                    $query_add = "SELECT addressID FROM address WHERE address.city='$city' and address.neigherhoodName='$neigherhoodName' 
                    and address.StreetName='$StreetName' and address.buildingNo='$buildno'";
                    $result_adds = mysqli_query($db, $query_add);
                    $resultaddID = mysqli_fetch_array($result_adds);
                    $addressIdd = $resultaddID['addressID'];

                    $query = "UPDATE users,parent SET users.firstname='$firstname', users.lastname='$lastname', users.mobilenumber='$mobileNum', parent.img='$img',
                        users.password='$password_new', parent.relativeRelation='$relativeRelation', parent.addressID='$addressIdd'
                         WHERE users.email='$email' and users.ID = parent.userID";
                }
                else{
                    $query = "UPDATE users,parent SET users.firstname='$firstname', users.lastname='$lastname', users.mobilenumber='$mobileNum', parent.img='$img',
                        users.password='$password_new', parent.relativeRelation='$relativeRelation', parent.addressID='$addressID'
                         WHERE users.email='$email' and users.ID = parent.userID";
                }
            }
            
        }
    }
    else{
        if($password_old == $pass){
            $_SESSION['password'] = $password_new;

            if($_FILES['imageParent']['size'] == 0 && $_FILES['imageParent']['error'] == 0){

                if($address != null){
                    $query = "UPDATE users,parent,address SET users.firstname='$firstname', users.lastname='$lastname', users.mobilenumber='$mobileNum',
                    users.password='$password_new', parent.relativeRelation='$relativeRelation',
                     address.city='$city', address.neigherhoodName='$neigherhoodName', address.StreetName='$StreetName', address.buildingNo='$buildno'
                    WHERE users.email='$email' and users.ID = parent.userID and parent.addressID = address.addressID";
                }
                else{
    
                    $queryInsert = "INSERT INTO address (city, neigherhoodName, StreetName, buildingNo) VALUES('$city','$neigherhoodName','$StreetName','$buildno')";
                    mysqli_query($db, $queryInsert);
    
                    $query_addressID = "SELECT addressID FROM address WHERE address.city='$city' and address.neigherhoodName='$neigherhoodName' 
                        and address.StreetName='$StreetName' and address.buildingNo='$buildno'";
                    $result_addID = mysqli_query($db, $query_address);
                    $resultaddressID = mysqli_fetch_array($result_addID);
                    $addressID = $resultaddressID['addressID'];
    
                    $query = "UPDATE users,parent SET users.firstname='$firstname', users.lastname='$lastname', users.mobilenumber='$mobileNum',
                    users.password='$password_new', parent.relativeRelation='$relativeRelation', parent.addressID='$addressID'
                    WHERE users.email='$email' and users.ID = parent.userID";
                }
    
            }else{
                if($address != null){
                    $query = "UPDATE users,parent,address SET users.firstname='$firstname', users.lastname='$lastname', users.mobilenumber='$mobileNum',
                    users.password='$password_new', parent.relativeRelation='$relativeRelation', parent.img='$img',
                     address.city='$city', address.neigherhoodName='$neigherhoodName', address.StreetName='$StreetName', address.buildingNo='$buildno'
                    WHERE users.email='$email' and users.ID = parent.userID and parent.addressID = address.addressID";
                }
                else{
                    $queryInsert = "INSERT INTO address (city, neigherhoodName, StreetName, buildingNo) VALUES('$city','$neigherhoodName','$StreetName','$buildno')";
                    mysqli_query($db, $queryInsert);
    
                    $query_addressID = "SELECT addressID FROM address WHERE address.city='$city' and address.neigherhoodName='$neigherhoodName' 
                        and address.StreetName='$StreetName' and address.buildingNo='$buildno'";
                    $result_addID = mysqli_query($db, $query_address);
                    $resultaddressID = mysqli_fetch_array($result_addID);
                    $addressID = $resultaddressID['addressID'];
    
                    $query = "UPDATE users,parent SET users.firstname='$firstname', users.lastname='$lastname', users.mobilenumber='$mobileNum',
                    users.password='$password_new', parent.relativeRelation='$relativeRelation', parent.img='$img', parent.addressID='$addressID'
                    WHERE users.email='$email' and users.ID = parent.userID";
                }
                
            }
        }else{
            array_push($errors, "<script>Swal({
                type: 'error',
                title: 'Oops...',
                text: 'old password is entered wrong please recheck your old password !',
              })</script>");
        }
    }

    mysqli_query($db, $query);

    echo "ERROR: Could not able to execute $query. " . mysqli_error($db);


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
