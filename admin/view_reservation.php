<?php

session_start();

include('../partials/header.php');
include('../assets/config/connection.php');
$db = db_connection();

if(isset($_SESSION['account_type']) != 'Administrator') {
  header('Location: ../index.php');
}

if(!isset($_GET['reference_no'])) {
  header('Location: ../index.php');
}


?>

    <?php
    
    include('../partials/admin_topnav.php');
    
    ?>
    <div class="container-fluid">
      <div class="row">

    <?php
    
    include('../partials/admin_sidenav.php');

    ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Reservation Details</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <!-- <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button> -->
            </div>
          </div>

          <div class="row">
            <div class="col">
            
            <?php


            $reference_no = $_GET["reference_no"];

            echo '<h4>' . $reference_no . '</h4>';

            $query = "SELECT * FROM reservation r INNER JOIN client c ON r.client_id = c.id WHERE r.reference_no='$reference_no'";
            $result = mysqli_query($db, $query);

            if($result) {
              while($reservation_details = mysqli_fetch_assoc($result)) {
                $client_name = $reservation_details["first_name"] . "-" . $reservation_details["last_name"];
                echo '
                <table class="table">
                  <tr>
                    <td>Check In Date</td>
                    <td>' . $reservation_details["check_in"] . '</td>
                  </tr>
                  <tr>
                    <td>Check Out Date</td>
                    <td>' . $reservation_details["check_out"] . '</td>
                  </tr>
                  <tr>
                    <td>Reservation Type</td>
                    <td>' . $reservation_details["type"] . '</td>
                  </tr>
                  <tr>
                    <td>Reservation Status</td>
                    <td>' . $reservation_details["status"] . '</td>
                  </tr>
                  <tr>
                    <td>Date Reserved</td>
                    <td>' . $reservation_details["date_created"] . '</td>
                  </tr>
                  <tr>
                    <td>Client Name</td>
                    <td>' . $reservation_details["first_name"] . " ". $reservation_details["last_name"] . '</td>
                  </tr>
                  <tr>
                    <td>Contact Number</td>
                    <td>' . $reservation_details["contact_number"] . '</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>' . $reservation_details["email"] . '</td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td>' . $reservation_details["client_address"] . '</td>
                  </tr>
                  <tr>
                    <td>Birthday</td>
                    <td>' . $reservation_details["birthday"] . '</td>
                  </tr>
                ';   

                echo '
                  </table>
                  <a href="process_payment.php?reference_no='.$_GET["reference_no"].'&client_name='.$client_name.'&reservation_id='.$reservation_details["id"].'" class="btn btn-info">Process Payment</a>
                  <a href="process_payment.php?reference_no='.$_GET["reference_no"].'&client_name='.$client_name.'&reservation_id='.$reservation_details["id"].'" class="btn btn-success">Checkout</a>
                  <a href="add_expenses.php?reference_no='.$_GET["reference_no"].'&client_name='.$client_name.'&reservation_id='.$reservation_details["id"].'" class="btn btn-warning">Add Expenses</a>
                  <a href="#" class="btn btn-danger">Cancel Reservation</a>
                ';
              }
              
              
              
              
            }


            ?>
            
            <!-- <a href="#" class="btn btn-info"></a>
            <a href="#" class="btn btn-info"></a> -->
            

            </div>
          </div>

        </main>
      </div>
    </div>

<?php

include('../partials/scripts.php');
// include('../partials/footer.php');

?>