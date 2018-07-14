<?php

session_start();
include('../assets/config/connection.php');
include('../partials/header.php');

$db = db_connection();

?>

  <?php
  
  include('../partials/frontdesk_dashboard.php');
  
  ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">FRONT DESK Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <a href="../booking/reserve.php"><button class="btn btn-sm btn-outline-secondary">ADD Booking</button></a>
              <button class="btn btn-sm btn-outline-secondary"></button>
            </div>
            <!-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button> -->
          </div>
        </div>

        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

      </main>
    </div>
  </div>



<?php

include('../partials/scripts.php');
include('../partials/footer.php');


?>