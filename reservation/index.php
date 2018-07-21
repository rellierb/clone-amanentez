<?php
session_start();
include('../partials/header.php');

?>
  
  <?php
  
  include('../partials/navbar.php');
  
  ?>

  <div class="container">
    <h1>View Reservation</h1>
    <?php
    
    if(isset($_SESSION['view_reserve']['res_error_msg'])) {
      echo '<h4>' . $_SESSION['view_reserve']['res_error_msg'] . '</h4>';
    }
    
    ?>
    <div class="row">  
      <div class="col-4" style="padding-top: 20px;">
        <form action="../forms/viewReserved.php" method="POST">
          <div class="form-group">
            <label for="referenceNo">Reference No.</label>
            <input type="text" class="form-control" id="" name="referenceNo" required>
          </div>
          <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="" name="firstName" required>
          </div>
          <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="" name="lastName" required>
          </div>
          <button class="btn btn-primary" type="submit" value="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>


<?php

unset($_SESSION['view_reserve']['res_error_msg']);

include('../partials/scripts.php');
include('../partials/footer.php');

?>