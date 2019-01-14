<?php
include('../db.php');
session_start();
$message = 'hello world'; 

    $time=array();
    
     $room=array();
   
     $subject=array();
    
for($i=0;$i<3;$i++){ // fadel bs el 3 elly bnloop aleha de nkhleha count of row number b2a ashan law ghyrna aktr mn 3 

   
        $roomname = "room"."$i"; //To make it automated for any data in the table 
        $timename = "time"."$i";  
        $subjectname = "subject"."$i"; 
        ////////////////////////////
        $time[$i] = $_POST[$timename]; 
        $room[$i] = $_POST[$roomname];
        $subject[$i] = $_POST[$subjectname];
        
    
/*
    else if ($i==0){ //only in the 0 condition because we need to write in S_post time without .$i
        $time[$i] = $_POST["time"];
    $room[$i] = $_POST["room"];
    $subject[$i] = $_POST["subject"];
}*/
    
  
$count=$i+1 ;  //count for IDs

$query = "UPDATE scheldue  SET scheldue.subject='$subject[$i]', scheldue.room='$room[$i]', scheldue.time='$time[0]' where scheldue.id='$count'" ; 
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
