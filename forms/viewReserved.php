<?php

session_start();

require('../assets/config/connection.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {

  $db = db_connection();

  if(!empty($_POST['referenceNo'])) {
    $reference_no = mysqli_real_escape_string($db, $_POST['referenceNo']);
  } 

  if(!empty($_POST['emailAddress'])) {
    $email = mysqli_real_escape_string($db, $_POST['emailAddress']);
  } 

  // echo $reference_no;
  // echo $email;
  
  // Search for the reservation 
  $query = "SELECT * FROM reservation r INNER JOIN client c ON r.client_id = c.id WHERE r.reference_no='$reference_no' AND c.email='$email';";
  $result = mysqli_query($db, $query);
  
  echo $query;

  $reservation_id = 0;
  echo mysqli_num_rows($result);
  if(mysqli_num_rows($result) == 1) {
    while($client_detail = mysqli_fetch_assoc($result)) {
      var_dump($client_detail);
      if($client_detail) {
        $_SESSION['client_details'] = $client_detail;
        $reservation_id = $client_detail['id'];
        echo $reservation_id;
        if($client_detail['status'] == "CANCELLED") {
          $_SESSION['view_reserve']['res_error_msg'] = "Reference was not found in the record";
          header('Location: ../reservation/index.php');
        }

      }
    }
  } else {
    $_SESSION['view_reserve']['res_error_msg'] = "Reference was not found in the record";
    header('Location: ../reservation/index.php');
  }

  // Get the reservation details of the client and pass it to the view_reserve.php
  $query= "SELECT * FROM booking_rooms b_r INNER JOIN room ON b_r.room_id = room.id WHERE b_r.reservation_id = $reservation_id";
  $result = mysqli_query($db, $query);

  echo mysqli_num_rows($result);

  if(mysqli_num_rows($result) > 0) {
    $i = 0;
    while($reserve_room_client = mysqli_fetch_assoc($result)) {
      $_SESSION['client_room_res'][$i] = $reserve_room_client;
      print_r($_SESSION['client_room_res'][$i]);
      echo $i;
      $i++;
    }
  } else {
    $_SESSION['view_reserve']['res_error_msg'] = "Reference was not found in the record";
    header('Location: ../reservation/index.php');
  }

  if(isset($_SESSION['client_details']) && isset($_SESSION['client_room_res'])) {
    header('Location: ../reservation/view_reservation.php');
  }

}




