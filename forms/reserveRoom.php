<?php

session_start();

require('../assets/config/connection.php');

$db = db_connection();


function generateRefNum() {
  $db = db_connection();
  $ref_number = "AMNZ-";
	$source = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 
		'B', 'C', 'D', 'E', 'F');

	for($i = 1; $i <= 7; $i++) {
		$index = rand(0, 15);
		$ref_number = $ref_number . $source[$index];
  }
  
  $query = "SELECT reference_no FROM resevation WHERE ";

  if($db->query("SELECT reference_no FROM reservation WHERE reference_no='$ref_number'")) {
    $ref_number = generateRefNum();
  } else {
    return $ref_number;
  }
}


if($_SERVER['REQUEST_METHOD'] == 'POST') {

  $guest_number = mysqli_real_escape_string($db, trim($_POST['guestNumber']));

  // Dates
  $check_date = explode("-", mysqli_real_escape_string($db, trim($_POST['checkDate'])));
  $check_in_date = date("Y-m-d", strtotime($check_date[0]));
  $check_out_date = date("Y-m-d", strtotime($check_date[1]));

  // $days_diff = date_diff(date_create($check_in_date), date_create($check_out_date));
  // $no_of_days = intval($days_diff->format('%d'));
  // $_SESSION['days_book'] = $no_of_days;
  
  // Create an array that stores the rooms and capacity respectively
  $rooms = array();
  foreach($_POST['rooms'] as $r) {
    $capacity = 'guestNum' . $r;
    $rooms[$r] = $_POST[$capacity];
    $_SESSION["roomsReserved"][$r] = $_POST[$capacity];
  }

  // print_r($rooms);
  // foreach($rooms as $k => $v) {
  //   // 

  // }

  $first_name = mysqli_real_escape_string($db, trim($_POST['firstName']));
  $last_name = mysqli_real_escape_string($db, trim($_POST['lastName']));
  $client_address = mysqli_real_escape_string($db, trim($_POST['clientAddress']));
  $email = mysqli_real_escape_string($db, trim($_POST['email']));
  $contact_number = mysqli_real_escape_string($db, trim($_POST['contactNumber']));
  $birthday = mysqli_real_escape_string($db, trim($_POST['birthday']));

  $reference_num = mysqli_real_escape_string($db, trim(generateRefNum()));
  echo $reference_num;
  
  // client information
  // // $q =  "INSERT INTO client (first_name, last_name, contact_number, email, client_address, birthday, date_registered) VALUES ('$first_name', '$last_name', $contact_number, '$email', '$client_address', '$birthday', NOW())";
  // // $result = mysqli_query($db, $q);

  // // // reservation booking
  // // if($result) {
    
  // //   $client_id = $db->insert_id;
  // //   $_SESSION['client_id'] = $client_id;
  
  // //   $query = "INSERT INTO reservation(reference_no, check_in, check_out, client_id, person_count, status, date_created, date_updated) VALUES ('$reference_num', '$check_in_date', '$check_out_date', '$client_id', '$guest_number', 'FOR PAYMENT',NOW(), NOW())";
  // //   $result = mysqli_query($db, $query);

  // //   $reservation_id = $db->insert_id;
  // //   $_SESSION['reservation_id'] = $reservation_id;
  // //   foreach($rooms as $k => $v) {
  // //     for($i = 1; $i <= $v; $i++) {
  // //       $db->query("INSERT INTO booking_rooms(reservation_id, room_id) VALUES($reservation_id, $k)");
  // //     }
  // //   }


  // //   header('Location: ../booking/success.php');
  // }
  
}