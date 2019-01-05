<?php
include('db.php');

$query = "SELECT payment_type,invoiceNo from invoice";
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) >= 1){
    $json = array();
while($array = mysqli_fetch_assoc($result)){
    $json[] = $array;
}
echo json_encode($json);
}

?>
