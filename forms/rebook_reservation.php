<?php

session_start();

include('../assets/config/connection.php');

$db = db_connection();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

  $client_id = $_SESSION['client_details']['client_id'];
  $reservation_id = $_SESSION['client_details']['id'];

  $check_date = explode("-", mysqli_real_escape_string($db, trim($_POST['checkDate'])));
  $check_in_date = date("Y-m-d", strtotime($check_date[0]));
  $check_out_date = date("Y-m-d", strtotime($check_date[1]));
  $days_diff = date_diff(date_create($check_in_date), date_create($check_out_date));
  $no_of_days = intval($days_diff->format('%d'));
  $_SESSION['days_book'] = $no_of_days;
  
  // Create an array that stores the rooms and capacity respectively
  $rooms = array();
  foreach($_POST['rooms'] as $r) {
    $capacity = 'guestNum' . $r;
    $rooms[$r] = $_POST[$capacity];
    $_SESSION["roomsReserved"][$r] = $_POST[$capacity];
  }

  $query = "UPDATE reservation r SET r.check_in=$check_in_date, r.check_out=$check_out_date, r.date_updated=NOW() WHERE r.id=$reservation_id";
  $result = mysqli_query($db, $query);

  if($result) {
    $db->query("DELETE FROM booking_rooms WHERE reservation_id=$reservation_id");
    foreach($rooms as $k => $v) {
      for($i = 1; $i <= $v; $i++){
        $db->query("INSERT INTO booking_rooms(reservation_id, room_id) VALUES($reservation_id, $k)");
      }
    }

    $_SESSION['msg_rebook_success'] = "You have succesfully REBOOK your cancellation";
    header('Location: ../reservation/view_reservation.php');
  } else {
    
  }




}

