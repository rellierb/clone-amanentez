<?php

session_start();

include('../partials/header.php');
include('../assets/config/connection.php');
$db = db_connection();

if(isset($_SESSION['account_type']) != 'Administrator') {
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
            <h1 class="h2">Reservation Status</h1>
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
              <h6>View By:</h6>

            </div>
          </div>

          <div class="row">
            <div class="col">

            <?php
            
            $query = "SELECT * FROM reservation";
            $result = mysqli_query($db, $query);

            if($result) {
              echo '
                <table class="table table-striped">
                  <thead class="thead-dark">
                    <th scope="col">#</th>
                    <th scope="col">Reference No.</th>
                    <th scope="col">Check In Date</th>
                    <th scope="col">Check Out Date</th>
                    <th scope="col">Person Count</th>
                    <th scope="col">Status</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date reserved</th>
                    <th scope="col">Action</th>
                  </thead>
              ';
              echo '<tbody>';
              while($reservation_details = mysqli_fetch_assoc($result)) {
                echo '
                  <tr>
                    <td>'.$reservation_details["id"].'</td>
                    <td>'.$reservation_details["reference_no"].'</td>
                    <td>'.$reservation_details["check_in"].'</td>
                    <td>'.$reservation_details["check_out"].'</td>
                    <td>'.$reservation_details["person_count"].'</td>
                    <td>'.$reservation_details["type"].'</td>
                    <td>'.$reservation_details["status"].'</td>
                    <td>'.$reservation_details["date_created"].'</td>
                    <td><a href="view_reservation.php?reference_no='.$reservation_details["reference_no"].'" class="btn btn-info">View</a></td>
                  </tr>
                ';
              }
              echo '</tbody>';
            } else {
              echo "false";
            }

            ?>

            </div>
          </div>

        </main>
      </div>
    </div>

<?php

include('../partials/scripts.php');
// include('../partials/footer.php');

?>