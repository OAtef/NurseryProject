<?php
include('db.php');
session_start();

$todayDate = date("Y-m-d");
$email = $_SESSION['email'];

$firstname = $_POST["child_fname"];
$lastname = $_POST["child_lname"];
$bdate = $_POST["child_bdate"];
$gender = $_POST["gender"];
$invoiceNo = $_POST["payment"];
$not_accepted = 0;

// need to be removed
$childID = 3;
$nurseID = 0;
// img
$img  = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  


// // calc to find which category
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


$query = "INSERT INTO children (child_id, first_name, last_name, Bdate, Gender, invoiceNo, accepted, parentID, categoryNo, nurseID, img) 
  VALUES ('$childID', '$firstname', '$lastname', '$bdate', '$gender', '$invoiceNo', '$not_accepted', '$parent_ID', '$category', '$nurseID', '$img')";

mysqli_query($db, $query)
// if(mysqli_query($db, $sql)){
//   echo "Records added successfully.";
// } else{
//   echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
// }

?>
