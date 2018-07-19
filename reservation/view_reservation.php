<?php

session_start();
require('../assets/config/connection.php');
include('../partials/header.php');

$db = db_connection();

?>

  <?php

  include('../partials/navbar.php');

  $a = $_SESSION['client_details'];
  $reservation_id = intval($a['id']);
  // print_r($_SESSION['client_details']);

  if(isset($_SESSION['msg_cancel_success'])) {
    echo '<h5>' . $_SESSION['msg_cancel_success'] . '</h5>';
  } 
  
  if(isset($_SESSION['msg_cancel_failed'])) {
    echo '<h5>' . $_SESSION['msg_cancel_failed'] . '</h5>';
  }

  if(isset($_SESSION['msg_rebook_success'])) {
    echo '<h5>' . $_SESSION['msg_rebook_success'] . '</h5>';
  }

  echo '<h1>CLIENT DETAILS</h1>';
  echo '
    <table class="table">
      <tr>
        <td>Client Name</td>
        <td>'. $a['first_name'] . " " . $a['last_name'].'</td>
      </tr>
      <tr>
        <td>Address</td>
        <td>'. $a['client_address'] . '</td>
      </tr>
      <tr>
        <td>Contact Number</td>
        <td>'. $a['contact_number'] . '</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>'. $a['email'] . '</td>
      </tr>
      <tr>
        <td>Birthday</td>
        <td>'. $a['birthday'] . '</td>
      </tr>
    </table>
  ';

  echo '<h1>RESERVATION DETAILS</h1>';
  echo '
    <table class="table">
      <tr>
        <td>Reference Number</td>
        <td>' . $a['reference_no'] . '</td>
      </tr>
      <tr>
        <td>Check in Date</td>
        <td>' . $a['check_in'] . '</td>
      </tr>
      <tr>
        <td>Check out Date</td>
        <td>' . $a['check_out'] . '</td>
      </tr>
      <tr>
        <td>Person Count</td>
        <td>' . $a['person_count'] . '</td>
      </tr>
      <tr>
        <td>Reservation Status</td>
        <td>' . $a['status'] . '</td>
      </tr>
    ';


  ?>


  <?php

  $query = "SELECT DISTINCT * FROM booking_rooms b_r INNER JOIN room r ON b_r.room_id = r.id WHERE b_r.reservation_id = $reservation_id";
  $result = mysqli_query($db, $query);
  $total_price = 0;
  $rooms = array();

  if(mysqli_num_rows($result) > 0) {
    echo '<tr>';
    echo '<td>Rooms</td>';
    echo '<td>';
    while($reservation_rooms = mysqli_fetch_assoc($result)) {
      $room_id = $reservation_rooms['id'];
      $room_query = "SELECT count(room_id) FROM booking_rooms b_r WHERE b_r.reservation_id = $reservation_id AND b_r.room_id = $room_id";
      $room_result = mysqli_query($db, $room_query);
      if(mysqli_num_rows($room_result) == 1) {
        while($number_of_rooms = mysqli_fetch_assoc($room_result)) {
          // $rooms[] = $number_of_rooms;
          echo $number_of_rooms['count(room_id)'] . " ";
          $total_price += ($number_of_rooms['count(room_id)'] * $reservation_rooms['rate']);
        }
      }
      echo $reservation_rooms['type'] . ", "; 
    }
    echo '</td>';
    echo '</tr>';
    echo '
      <tr>
        <td>Total Amount</td>
        <td>' . $total_price . '</td>
      </tr>
    ';

  }
  echo '</table>';

  ?>
  
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reBooking">
    Rebook Reservation
  </button>

  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelBooking">
    Cancel Booking
  </button>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="">
    Upload payment
  </button>

  <?php

  include('../modal/cancel_booking.php');
  include('../modal/rebooking.php');

  ?>

  <script src="../assets/script/reserve.js"></script>
  <script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
  </script>


<?php

include('../partials/scripts.php');
include('../partials/footer.php');

?>
