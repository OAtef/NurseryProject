<?php
include('db.php');
session_start();

$todayDate = date("Y-m-d");
$email = $_SESSION['email'];

$firstname = $_POST["child_fname"];
$lastname = $_POST["child_lname"];
$bdate = $_POST["child_bdate"];
$gender = $_POST["gender"];
$interviewDate = $_POST["interview_Date"];
$invoiceNo = $_POST["payment"];
$not_accepted = 0;

// need to be removed
$childID = 4;

// calc to find which category
$diff = date_diff($bdate, $todayDate);
$years = $diff / 365;

$categories_query  = "SELECT categoryNo from category WHERE category.startAge <= '$years' and '$years' <=  category.endAge";
$result_cat = mysqli_query($db, $categories_query);
$resultcat = mysqli_fetch_array($result_cat);
$category = $resultcat['categoryNo'];

// geting the parent id
$parent_ID_query = "SELECT ID from users WHERE users.email='$email'";
$result_ID = mysqli_query($db, $parent_ID_query);
$resultid = mysqli_fetch_array($result_ID);
$parent_ID = $resultid['ID'];

// img
$img  = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  


    //insert form data in the database
    $query = 'INSERT INTO children (child_id, first_name, last_name, Bdate, Gender, interviewdate, invoiceNo, accepted, parentID, categoryNo, img) 
      VALUES("'.$childID.'", "'.$firstname.'", "'.$lastname.'", "'.$bdate.'", "'.$gender.'", "'.$interviewDate.'", "'.$invoiceNo.'", "'.$not_accepted.'", "'.$parent_ID.'", "'.$category.'", "'.$img.'")';
    mysqli_query($db,$query); 
    
    if (mysqli_affected_rows($db) == 1) {
      $MessageSentScript = "<script>Swal({
                                type: 'success',
                                title: 'Child Information Inserted successfully',
                                toast: true,
                                position: 'top-right',
                                showConfirmButton: true
                              })</script>";
    }else {
      array_push($errors, "<script>Swal({
                                type: 'error',
                                title: 'Oops...',
                                text: 'There was an error while inserting your data!',
                              })</script>");
    }

    $query2 = "SELECT children.child_id, children.first_name from children inner join parent on children.parentID = parent.userID inner join users on parent.userID = users.ID
    WHERE users.email='$email' and children.first_name='$firstname'";
$result = mysqli_query($db, $query2);
if(mysqli_num_rows($result) == 1){
    $json = array();
    while($array = mysqli_fetch_assoc($result)){
        $json[] = $array;
    }
    echo json_encode($json);
}

?>
