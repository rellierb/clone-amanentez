<?php

session_start();
include('../partials/header.php');
require('../assets/config/connection.php');
$db = db_connection();

?>

  <?php

  include('../partials/navbar.php');

  ?>

  <div class="container">
    <div class="row">
      <form method="POST" action="../forms/login.php">
        <div class="form-group">
          <label for="">Username</label>
          <input type="text" name="username" class="form-control" id="" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" class="form-control" id="" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>


<?php

include('../partials/scripts.php');
include('../partials/footer.php');

?>