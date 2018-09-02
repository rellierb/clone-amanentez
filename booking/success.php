<?php

session_start();
include('../partials/header.php');
require('../assets/config/connection.php');
$db = db_connection();

?>
  <?php

  include('../partials/reservation_nav.php');

  ?>
  
  <div class="container" id="success-reservation">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="text-center" style="display: block;">SUCCESSFUL BOOKING</h2>
        <p class="text-center">Thank you for booking with us. See the details below: </p>  
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <h4 class="card-title">Client</h4>
          
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
                    <th class="text-right" width="35%">Full Name</th>
                    <td width="65%">' . $client_details['first_name'] . " " . $client_details['last_name'] .'</td>
                  </tr>
                  <tr>
                    <th class="text-right">Address</th>
                    <td>'. $client_details['client_address'] .'</td>
                  </tr>
                  <tr>
                    <th class="text-right">Contact Number</th>
                    <td>'. $client_details['contact_number'] .'</td>
                  </tr>
                  <tr>
                    <th class="text-right">Email</th>
                    <td>'. $client_details['email'] .'</td>
                  </tr>
                  <tr>
                    <th class="text-right">Birthday</th>
                    <td>'. $client_details['birthday'] .'</td>
                  </tr>
              </table>';
            } 
          }
          ?>
         
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
        <h4 class="card-title">Reservation Details</h4>
          
          <?php

          $booking_query = "SELECT * FROM reservation WHERE reservation.client_id = $client_id";
          $result = mysqli_query($db, $booking_query);
          
          echo '<table class="table">';
          if(mysqli_num_rows($result) == 1) {
            while($reservation_details = mysqli_fetch_assoc($result)) {
              if($reservation_details) {
              echo '
                <tr>
                  <th class="text-right" width="35%">Reference Number</th>
                  <td width="65%">' . $reservation_details['reference_no'] . '</td>
                </tr>
                <tr>
                  <th class="text-right">Check In Date</th>
                  <td>' . $reservation_details['check_in'] . '</td>
                </tr>
                <tr>
                  <th class="text-right">Check Out Date</th>
                  <td >' . $reservation_details['check_out'] . '</td>
                </tr>
                <tr>
                  <th class="text-right">Number of Days</th>
                  <td>' . $_SESSION['days_book']  . '</td>
                </tr>
                <tr>
                  <th class="text-right">Reservation Type</th>
                  <td>' . $reservation_details['type'] . '</td>
                </tr>
                <tr>
                  <th class="text-right">Payment Type</th>
                  <td>' . $reservation_details['payment'] . '
                  </td>
                </tr>
                <tr>
                  <th class="text-right">Status</th>
                  <td>' . $reservation_details['status'] . '</td>
                </tr>
                <tr>
                  <th class="text-right">Guest Number</th>
                  <td>' . $reservation_details['person_count'] . '</td>
                </tr>';
              }
            }
          }
          echo '</table>';
          ?>

          <!-- <p>Check email address for your reference number.</p> -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
      
        <div class="card">
          <h4 class="card-title">Room  Details</h4>
          <?php 
          echo '<table class="table">';
          echo '
            <thead>
              <tr>
                <th width="20%" class="text-center">Room Type</th>
                <th width="40%" class="text-center">Description</th>
                <th width="10%" class="text-center">Unit Price</th>
                <th width="10%" class="text-center">Quantity</th>
                <th width="10%" class="text-center">Days Reserve</th>
                <th width="15%" class="text-center">Total Price</th>
              </tr>
            </thead>
          ';

          $reservation_id = $_SESSION['reservation_id'];
          $rooms_query = "SELECT DISTINCT * FROM room r INNER JOIN booking_rooms b_r ON b_r.room_id = r.id WHERE b_r.reservation_id = $reservation_id";
          $result = mysqli_query($db, $rooms_query);
          $total_price = 0;
          echo '<tbody>';
          if(mysqli_num_rows($result) > 0) {
            echo '<tr>';
            $roomsBooked = array();
            while($reservation_rooms = mysqli_fetch_assoc($result)) {
              echo '<td class="text-center">'.$reservation_rooms['type'].'</td>';
              echo '<td class="text-center">'.$reservation_rooms['simple_description'].'</td>';
              echo '<td class="text-center">'. number_format($reservation_rooms['rate'], 2).'</td>';
              echo '<td class="text-center">'.$_SESSION['roomsReserved'][$reservation_rooms['id']].'</td>';
              echo '<td class="text-center">'.$_SESSION['days_book'].'</td>';
              // $roomsBooked[] =  $_SESSION['roomsReserved'][$reservation_rooms['id']]. " " .$reservation_rooms['type'];
              echo '<td class="text-center">'. number_format($_SESSION['days_book'] * $reservation_rooms['rate'] * $_SESSION['roomsReserved'][$reservation_rooms['id']], 2).'</td>';
              $total_price += ($reservation_rooms['rate'] * $_SESSION['roomsReserved'][$reservation_rooms['id']]);
            }
            echo '</tr>';

            echo '
              <tr>
                <td class="text-center"><b>Total Amount</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>P ' . number_format(($_SESSION['days_book'] * $total_price), 2) . '</b></td>
              </tr>';
          }  
          echo '</tbody>';
          echo '</table>';
        ?>

        </div>
      
        


      </div>
    </div>
  </div>

<?php

include('../partials/scripts.php');
include('../partials/footer.php');

?>