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

          <h3 class="text-center" style="padding-top: 50px;">Our History</h3>
          <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

          <h3 class="text-center" style="padding-top: 50px;">Customer experience</h3>

          <p class="comment">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
          
          <p class="comment">"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>

          <p class="comment">"Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."</p>

          <p class="comment">"Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

          <h3 class="text-center" style="padding-top: 50px;">Location</h3>
          <div>
            <div  style="display: block; margin: 0 auto; margin-bottom: 100px; margin-top: 30px;" class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=amanentez%20beach%20front%20resort&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
          </div>

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