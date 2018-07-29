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
            <h1 class="h2">Room Status</h1>
            <!-- <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div> -->
          </div>

          <div class="row">
            <div class="col">

            <?php
            
            $room_status_query = "SELECT r_s.id, r.type, r.capacity, r.rate, s.name FROM room_status r_s INNER JOIN room r ON r.id = r_s.room_id INNER JOIN status s ON r_s.status_id = s.id  ORDER BY r_s.id";
            $room_status_result = mysqli_query($db, $room_status_query);

            if(mysqli_num_rows($room_status_result) > 0) {
              echo '
              <table class="table table-striped">
                <thead class="thead-dark">
                  <th scope="col">Room Number</td>
                  <th scope="col">Type</td>
                  <th scope="col">Capacity</td>
                  <th scope="col">Rate</td>
                  <th scope="col">Status</td>
                </thead>
                <tbody>
              ';
              
              while($room_details = mysqli_fetch_assoc($room_status_result)) {
                echo '
                <tr>
                  <td>'. $room_details['id'] .'</td>
                  <td>'. $room_details['type'] .'</td>
                  <td>'. $room_details['capacity'] .'</td>
                  <td>'. $room_details['rate'] .'</td>
                  <td>'. $room_details['name'] .'</td>
                </tr>
                ';
              }
              echo '</tbody>';  
              echo '</table>';
            }
            
            ?>

            </div>
          </div>

        </main>
      </div>
    </div>

<?php

include('../partials/scripts.php');
include('../partials/footer.php');

?>