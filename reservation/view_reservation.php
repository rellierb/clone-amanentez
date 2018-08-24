<?php

session_start();
require('../assets/config/connection.php');
include('../partials/header.php');

$db = db_connection();

?>
  <?php
  
  include('../partials/reservation_nav.php');
  
  if(isset($_SESSION["msg_payment_upload_success"])) {
    echo '<h5 class="text-center">' . $_SESSION['msg_payment_upload_success'] . '</h5>';
  }
  
  if(isset($_SESSION['msg_cancel_success'])) {
    echo '<h5 class="text-center">' . $_SESSION['msg_cancel_success'] . '</h5>';
  } 
  
  if(isset($_SESSION['msg_cancel_failed'])) {
    echo '<h5 class="text-center">' . $_SESSION['msg_cancel_failed'] . '</h5>';
  }
  
  if(isset($_SESSION['msg_rebook_success'])) {
    echo '<h5 class="text-center">' . $_SESSION['msg_rebook_success'] . '</h5>';
  }

  ?>

  <div class="container" id="view-full-reservation">
    <div class="row">
      <div class="col-sm-12" >
        <a href="../home/index.php" ><button class="btn btn-primary">Back to home</button></a>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reBooking" style="float: right;">
          Rebook Reservation
        </button>

        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelBooking" style="float: right;">
          Cancel Booking
        </button>
        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadPhoto" style="float: right;">
          Upload payment
        </button>
      
      </div>
    </div>

    <div class="row">

      <div class="col-sm-6">
        <div class="card">
          <?php

          $a = $_SESSION['client_details'];
          $reservation_id = intval($a['id']);
          
          echo '<h4 class="card-title">CLIENT DETAILS</h4>';
          echo '
          <table class="table">
            <tr>
              <th class="text-right" width="35%">Full Name</th>
              <td width="65%">' . $a['first_name'] . " " . $a['last_name'] .'</td>
            </tr>
            <tr>
              <th class="text-right">Address</th>
              <td>'. $a['client_address'] .'</td>
            </tr>
            <tr>
              <th class="text-right">Contact Number</th>
              <td>'. $a['contact_number'] .'</td>
            </tr>
            <tr>
              <th class="text-right">Email</th>
              <td>'. $a['email'] .'</td>
            </tr>
            <tr>
              <th class="text-right">Birthday</th>
              <td>'. $a['birthday'] .'</td>
            </tr>
          </table>

          ';

         
          ?>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="card">
        <?php 

        $check_in_date = date("Y-m-d", strtotime($a['check_in']));
        $check_out_date = date("Y-m-d", strtotime($a['check_out']));

        $days_diff = date_diff(date_create($check_in_date), date_create($check_out_date));
        $no_of_days = intval($days_diff->format('%d'));

        echo '<h4 class="card-title">RESERVATION DETAILS</h1>';
        echo '<table class="table">';
        echo '
          <tr>
            <th class="text-right" width="35%">Reference Number</th>
            <td width="65%">' . $a['reference_no'] . '</td>
          </tr>
          <tr>
            <th class="text-right">Check In Date</th>
            <td>' . $a['check_in'] . '</td>
          </tr>
          <tr>
            <th class="text-right">Check Out Date</th>
            <td >' . $a['check_out'] . '</td>
          </tr>
          <tr>
            <th class="text-right">Number of Days</th>
            <td>' . $no_of_days . '</td>
          </tr>
          <tr>
            <th class="text-right">Reservation Type</th>
            <td>' . $a['type'] . '</td>
          </tr>
          <tr>
            <th class="text-right">Payment Type</th>
            <td>' . $a['payment'] . '
            </td>
          </tr>
          <tr>
            <th class="text-right">Status</th>
            <td>' . $a['status'] . '</td>
          </tr>
          <tr>
            <th class="text-right">Guest Number</th>
            <td>' . $a['person_count'] . '</td>
          </tr>';
        echo '</table>';
                
        ?>

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="card">
          <h4 class="card-title">Payment Photo</h4>
          <div class="card-body">
            <?php
            
            $sql = "SELECT * FROM file_reservation WHERE reservation_id='$reservation_id'";
            $result = mysqli_query($db, $sql);

            if(mysqli_num_rows($result) == 1) {
              while($photo = mysqli_fetch_assoc($result)) {
                echo '
                  <img class="center-img" style="margin-bottom: 20px;" src="../uploads/' . $photo["file_name"] . '" alt="Photo of a payment picture">
                  <p class="text-center"><b>Date uploaded: ' . $photo["date_created"] . '</b></p>
                ';
              }
            } else {
              echo '<h6 class="text-center">No photo was uploaded</h6>';
            }

            ?>
          </div>
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
              <th width="15%" class="text-center">Unit Price</th>
              <th width="15%" class="text-center">Quantity</th>
              <th width="15%" class="text-center">Total Price</th>
            </tr>
          </thead>
        ';
        ?>

      <?php
      $query = "SELECT DISTINCT * FROM booking_rooms b_r INNER JOIN room r ON b_r.room_id = r.id WHERE b_r.reservation_id = $reservation_id";
      $result = mysqli_query($db, $query);
      $total_price = 0;
      $rooms = array();
      
      echo '<tbody>';
      if(mysqli_num_rows($result) > 0) {
        echo '<tr>';
        while($reservation_rooms = mysqli_fetch_assoc($result)) {
          echo '<td class="text-center">'.$reservation_rooms['type'].'</td>';
          echo '<td class="text-center">'.$reservation_rooms['simple_description'].'</td>';
          echo '<td class="text-center">'. number_format($reservation_rooms['rate'], 2).'</td>';
          
          $room_id = $reservation_rooms['id'];
          $room_query = "SELECT count(room_id) FROM booking_rooms b_r WHERE b_r.reservation_id = $reservation_id AND b_r.room_id = $room_id";
          $room_result = mysqli_query($db, $room_query);
          if(mysqli_num_rows($room_result) == 1) {
            while($number_of_rooms = mysqli_fetch_assoc($room_result)) {
              // $rooms[] = $number_of_rooms;
              echo '<td class="text-center">' . $number_of_rooms['count(room_id)'] . '</td>';
              echo '<td class="text-center">' . number_format($number_of_rooms['count(room_id)'] * $reservation_rooms['rate'], 2)   . '</td>';
              $total_price += ($number_of_rooms['count(room_id)'] * $reservation_rooms['rate']);
            }
          }
          //echo $reservation_rooms['type'] . ", "; 
        }
        echo '</td>';
        echo '</tr>';
        echo '
          <tr>
            <td class="text-center"><b>Total Amount</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-center"><b>P ' . number_format($total_price, 2) . '</b></td>
          </tr>
        ';

      }
      echo '</tbody>';
      echo '</table>';

      ?>

          

        </div>
      </div>
    </div>

  </div>

  <?php

  include('../modal/cancel_booking.php');
  include('../modal/rebooking.php');
  include('../modal/upload_photo.php');

  ?>

  <script src="../assets/script/reserve.js"></script>
  <script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
  </script>


<?php

unset($_SESSION["msg_payment_upload_success"]);
unset($_SESSION['msg_cancel_success']);
unset($_SESSION['msg_cancel_failed']);
unset($_SESSION['msg_rebook_success']);


include('../partials/scripts.php');
include('../partials/footer.php');

?>
