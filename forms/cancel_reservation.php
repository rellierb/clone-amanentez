<?php

session_start();

include('../assets/config/connection.php');

$db = db_connection();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

  $reason = mysqli_real_escape_string($db, trim($_POST['reasonCancel']));

  $client_reservation = $_SESSION['client_details'];
  $client_reservation_id = $_SESSION['client_details']['id'];

  // print_r($client_reservation);

  $query = "UPDATE reservation r SET r.status='CANCELLED', r.date_updated=NOW() WHERE r.id=$client_reservation_id";

  $result = mysqli_query($db, $query);

  if($result) {

    $query= "INSERT INTO booking_cancelled(reservation_id, reason, date_cancelled) VALUES ($client_reservation_id, '$reason', NOW())";

    $result = mysqli_query($db, $query);

    if($result) {
      $_SESSION['msg_cancel_success'] = "Your RESERVATION in Successfully cancelled";
      print_r($_SESSION['msg_cancel_success']);
      header('Location: ../reservation/view_reservation.php');
    } else {
      $_SESSION['msg_cancel_failed'] = "Your reservation is not cancelled";
      print_r($_SESSION['msg_cancel_failed']);
    }
  }
  
}