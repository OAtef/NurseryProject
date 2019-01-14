<?php

include('../db.php');

$child = $_POST["child"];

$query = "UPDATE children SET children.reqDelete=1 WHERE children.child_id='$child'";

mysqli_query($db, $query);

?>
