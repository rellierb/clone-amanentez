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
} else {
  $reservation_id = $_GET["reservation_id"];
  $reference_no = $_GET["reference_no"];
  $client_name = str_replace('-', ' ', $_GET["client_name"]);
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
            <h1 class="h2">Add Expenses</h1>
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
            <div class="col-8">
              
              <form method="POST" action="../forms/admin/reservation_expense.php">
                <div class="form-group">
                  <label for="">Reference Number:</label>
                  <input type="email" class="form-control" id="" value="<?php echo $reference_no; ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="">Client Name:</label>
                  <input type="email" class="form-control" id="" value="<?php echo $client_name; ?>" readonly>
                </div>
                
                <h5>Expenses</h5>
                
                <?php 
                
                $query = "SELECT * FROM expenses";
                $result = mysqli_query($db, $query);

                if(mysqli_num_rows($result) > 0) {
                  while($expenses = mysqli_fetch_assoc($result)) {
                    echo '
                        <div class="form-group row">
                          <label for="" class="col-sm-4 col-form-label">'.$expenses["name"].'</label>
                          <span class="col-sm-2">'.$expenses["amount"].'</span>
                          <div class="col-sm-2">
                            <input type="number" class="form-control" name="expense'.$expenses["id"].'" value="0">
                          </div>
                        </div>
                    ';
                  }
                  echo '<button class="btn btn-primary" type="submit">Add</button>';
                  echo '';
                }
                ?>

              </form>



            </div>
          </div>

        </main>
      </div>
    </div>

<?php

include('../partials/scripts.php');
// include('../partials/footer.php');

?>