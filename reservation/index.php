<?php
session_start();
include('../partials/header.php');

?>
  
  <?php
  
  include('../partials/navbar.php');
  
  ?>

  <div class="container-fluid" id="view-reserve">
    <h1>View Reservation</h1>
    <?php
    
    if(isset($_SESSION['view_reserve']['res_error_msg'])) {
      echo '<h4>' . $_SESSION['view_reserve']['res_error_msg'] . '</h4>';
    }
    
    ?>
    
      
    <div class="row">  
      <div class="col-sm-12" style="padding-top: 20px; height: 100vh;">
        <div class="card">
          <form action="../forms/viewReserved.php" method="POST">
            <div class="form-group">
              <label for="referenceNo">Reference Number</label>
              <input type="text" class="form-control" id="" name="referenceNo" required>
            </div>
            <div class="form-group">
              <label for="emailAddress">Email Address</label>
              <input type="text" class="form-control" id="" name="emailAddress" required>
            </div>
            <button class="btn btn-primary" type="submit" value="submit" style="float: right">Submit</button>
          </form>
        </div>      
      </div>
    </div>  
  </div>

  <?php

  include('../partials/company-details.php');

  ?>


  

<?php

unset($_SESSION['view_reserve']['res_error_msg']);

include('../partials/scripts.php');
include('../partials/footer.php');

?>