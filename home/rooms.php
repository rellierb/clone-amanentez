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
            <h1 class="display-4">Our Rooms</h1>
            <p class="lead">Lorem ipsum dolor sit amet</p>
          </div>
        </div>
    
        </div>
      </div>
    </div>

    <div class="container" id="room-list">
      <div class="row">
        <div class="col-sm-12">
        
        <?php

        $query = "SELECT * FROM room";
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result) > 0) {

        while($rooms = mysqli_fetch_assoc($result)) {
          echo '
          <div class="card card-shadow" style="margin-bottom: 60px;">
            <div class="card-body row">
              <div class="col-3">
                <img src="https://picsum.photos/250/200/?random" alt="Room Name">
              </div>
              <div class="col-9">
                <h4 class="card-title">' . $rooms["type"] . '</h4>
                <p>' . $rooms["simple_description"] . '</p>
                <a href="room.php?room-rame=' . $rooms["type"] . '" class="see-details"><small><p>See more details</p></small></a>
              </div>
            </div> 
          </div>
        
          ';
          }
        }
        ?>

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