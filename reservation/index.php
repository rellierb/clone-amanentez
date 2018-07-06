<?php

include('../partials/header.php');

?>
  
  <?php
  
  include('../partials/navbar.php');
  
  ?>

  <div class="container">
    <div class="row">
      <div class="col">
        <form action="../forms/viewReserved.php" method="POST">
          <div class="form-group">
            <label for="referenceNo">Reference No.</label>
            <input type="text" class="form-control" id="" name="referenceNo">
          </div>
          <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="" name="firstName">
          </div>
          <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="" name="lastName">
          </div>
          <button class="btn btn-primary" type="submit" value="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>



<?php

include('../partials/footer.php');

?>