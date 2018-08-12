<?php

session_start();
include('../partials/header.php');
require('../assets/config/connection.php');
$db = db_connection();

?>
  <?php

  include('../partials/navbar.php');

  ?>
  
  <div class="container">
    <div class="row">
      <div class="col-sm-8 offset-sm-2">
        <h2 class="text-center">SUCCESSFUL BOOKING</h2>
        <p class="text-center">Thank you for booking with us. See the details below: </p>
        <div class="card">
          <h4>Client</h4>
          
          <?php
          
          $client_id = $_SESSION['client_id'];
          $client_query = "SELECT * FROM client c WHERE c.id = $client_id";
          $result = mysqli_query($db, $client_query);

          if(mysqli_num_rows($result) == 1) {
            $client_details = mysqli_fetch_assoc($result);
            if($client_details) {
              echo '
                <table class="table">
                  <tr>
                    <td>Full Name</td>
                    <td>' . $client_details['first_name'] . " " . $client_details['last_name'] .'</td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td>'. $client_details['client_address'] .'</td>
                  <tr>
                  <tr>
                    <td>Contact Number</td>
                    <td>'. $client_details['contact_number'] .'</td>
                  <tr>
                  <tr>
                    <td>Email</td>
                    <td>'. $client_details['email'] .'</td>
                  <tr>
                  <tr>
                    <td>Birthday</td>
                    <td>'. $client_details['birthday'] .'</td>
                  <tr>
              </table>';
            } 
          }
          ?>

          <h4>RESERVATION DETAILS</h4>
          
          <?php

          $booking_query = "SELECT * FROM reservation WHERE reservation.client_id = $client_id";
          $result = mysqli_query($db, $booking_query);

          echo '<table class="table">';
          if(mysqli_num_rows($result) == 1) {
            while($reservation_details = mysqli_fetch_assoc($result)) {
              if($reservation_details) {
              echo '
                <tr>
                  <td>Check In Date</td>
                  <td>' . $reservation_details['check_in'] . '</td>
                </tr>
                <tr>
                  <td>Check Out Date</td>
                  <td>' . $reservation_details['check_out'] . '</td>
                </tr>
                <tr>
                  <td>Reservation Type</td>
                  <td>' . $reservation_details['type'] . '</td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td>' . $reservation_details['status'] . '</td>
                </tr>
                <tr>
                  <td>Guest Number</td>
                  <td>' . $reservation_details['person_count'] . '</td>
                </tr>';
              }
            }
          }
          
          $reservation_id = $_SESSION['reservation_id'];
          $rooms_query = "SELECT DISTINCT * FROM room r INNER JOIN booking_rooms b_r ON b_r.room_id = r.id WHERE b_r.reservation_id = $reservation_id";
          $result = mysqli_query($db, $rooms_query);
          $total_price = 0;
          if(mysqli_num_rows($result) > 0) {
            echo '<tr>';
            echo '<td>Rooms</td>';
            $roomsBooked = array();
            while($reservation_rooms = mysqli_fetch_assoc($result)) {
              $roomsBooked[] =  $_SESSION['roomsReserved'][$reservation_rooms['id']]. " " .$reservation_rooms['type'];
              $total_price += ($reservation_rooms['rate'] * $_SESSION['roomsReserved'][$reservation_rooms['id']]);
            }
            echo '<td>' . implode(", " , $roomsBooked) . '</td>';
            echo '</tr>';
            echo '
              <tr>
                <td>Total Amount</td>
                <td>P ' . number_format(($_SESSION['days_book'] * $total_price), 2) . '</td>
              </tr>';
          }
          echo '</table>';
          ?>
          
          <p>Check email address for your reference number.</p>
        </div>
      </div>
    </div>
  </div>

<?php

include('../partials/scripts.php');
include('../partials/footer.php');

?>