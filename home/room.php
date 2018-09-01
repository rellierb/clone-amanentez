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
            <h1 class="display-4"><?php echo $_GET["room-rame"] ?></h1>
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
          
          $room_name =$_GET["room-rame"];
          $sql = "SELECT * FROM room WHERE room.type='$room_name'";
          $result = mysqli_query($db, $sql);

          while($details = mysqli_fetch_assoc($result)) {
            echo '
              <table class="table">
              <tr>
                <td width="20%"><h6 style="float: right;">Description</h6></td>
                <td width="80%">' . $details['description'] . '</td>
              </tr>
              <tr>
                <td width="20%"><h6 style="float: right;">Room Capacity</h6></td>
                <td width="80%">' . $details['capacity'] . '</td>
              </tr>
              <tr>
                <td width="20%"><h6 style="float: right;">Daily Rate</h6></td>
                <td width="80%">P ' . number_format($details['rate'], 2) . '</td>
              </tr>
            </table>
            ';
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