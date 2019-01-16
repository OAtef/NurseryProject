<?php
include('../db.php');
session_start();

$todayDate = date("Y-m-d");
$email = $_SESSION['email'];

$firstname = $_POST["child_fname"];
$lastname = $_POST["child_lname"];
$bdate = $_POST["child_bdate"];
$gender = $_POST["gender"];

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


$query_name = "SELECT * from children inner join users where users.ID = children.parentID WHERE users.email='$email' and children.first_name='$firstname'";
$query_name_result = mysqli_query($db, $query_name);
if(mysqli_num_rows($query_name_result)) {
  // error child name already exist
}
else{
  $query = "INSERT INTO children (first_name, last_name, Bdate, Gender, parentID, categoryNo, img)
  VALUES ('$firstname', '$lastname', '$bdate', '$gender', '$parent_ID', '$category', '$img')";
  $result = mysqli_query($db, $query);
  $child_id = mysql_insert_id($db);

  if (mysqli_affected_rows($db) == 1) {

    $queryInsert = "INSERT INTO interviews (parentID, childID) VALUES ('$parent_ID', '$child_id'";
    mysqli_query($db, $queryInsert);

  }

  //  if(mysqli_query($db, $sql)){
  //    echo "Records added successfully.";
  //  } else{
  //    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
  //  }
}




?>
