<?php
include('../db.php');
session_start();
$message = 'hello world'; 

    $time=array();
    
     $room=array();
   
     $subject=array();
    

// $sql="SELECT * FROM scheldue";
// $result1= mysqli_query($db,$sql);
// $count=mysqli_num_rows($result1);

// // echo "<script type='text/javascript'>alert('$count');</script>";

$time[0] = $_POST["time"];
   $room[0] = $_POST["room"];
   $subject[0] = $_POST["subject"];

   $time[1] = $_POST["time1"];
   $room[1] = $_POST["room1"];
   $subject[1] = $_POST["subject"];


for($i=1;$i<3;$i++){
  

$query = "UPDATE scheldue  SET scheldue.subject='$subject[0]', scheldue.room='$room[0]', scheldue.time='$time[0]' where scheldue.id='$i'" ; 
$results = mysqli_query($db, $query);
}


        // $query = "UPDATE scheldue  SET scheldue.subject='$subject', scheldue.room='$room', scheldue.time='$time' where scheldue.id='1'" ;

        //     $results = mysqli_query($db, $query);



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
