<?php

include('../assets/config/connection.php');

include('../partials/header.php');

$db = db_connection();

?>

    <?php
    
    include('../partials/navbar.php');

    ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12" style="padding: 0px;">
        
        <div class="jumbotron jumbotron-fluid" style="margin-top: 70px; height: 70vh;">
          <div class="container-fluid">
            <!-- <h1 class="display-4">Our Rooms</h1>
            <p class="lead">Lorem ipsum dolor sit amet</p> -->
          </div>
        </div>
    
        </div>
      </div>
    </div>

    <div class="container" id="room-list">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="text-center" style="padding-top: 30px;">Amanente'z Beach Front Resort</h1>
          <p class="text-center">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p> 

          <h3 class="text-center" style="padding-top: 30px;">Our History</h3>
          <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

          <h3 class="text-center" style="padding-top: 30px;">Customer experience</h3>

          <p class="comment">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
          
          <p class="comment">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

          <p class="comment">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

          <p class="comment">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


        </div>
      </div>
    </div>  

    <?php

      include('../partials/company-details.php');
      
    ?>

    
<?php 

include('../partials/scripts.php');
include '../partials/footer.php';

?>