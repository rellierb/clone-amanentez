<?php

session_start();

include('../partials/header.php');
include('../assets/config/connection.php');
$db = db_connection();

if(isset($_SESSION['account_type']) != 'Administrator') {
  header('Location: ../index.php');
}

if(!(isset($_GET["reference_no"]) && isset($_GET["client_name"]) && isset($_GET["reservation_id"]))) {
  header('Location: ../admin/index.php');
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
            <h1 class="h2">Process Payment</h1>
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