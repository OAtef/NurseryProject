<?php
include('../db.php');
session_start();
$message = 'hello world'; 


    $time = $_POST["time"];
    $room = $_POST["room"];
    $subject = $_POST["subject"];



        $query = "UPDATE scheldue  SET scheldue.subject='$subject', scheldue.room='$room', scheldue.time='$time'" ;

            $results = mysqli_query($db, $query);



            if (mysqli_affected_rows($results) == 1) {

                $MessageSentScript = "<script>Swal({
                                          type: 'success',
                                          title: 'Scheldue Updated successfully',
                                          toast: true,
                                          position: 'top-right',
                                          showConfirmButton: true
                                        })</script>";
            }
            else {
                array_push($errors, "<script>Swal({
                                          type: 'error',
                                          title: 'Oops...',
                                          text: 'There was an error while upadting your data!',
                                        })</script>");  }

        


?>
