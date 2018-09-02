<?php

session_start();
require('../assets/config/connection.php');
include('../partials/header.php');

$db = db_connection();

?>
  <?php
  
  include('../partials/reservation_nav.php');
  
  ?>

  <div class="container">
    <div class="row">
      <div class="col-sm-12">

       <form action="../forms/rebook_reservation.php" method="POST">

        <div class="row">
          <div class="col-sm-4 offset-sm-4" style="margin-top: 30px; margin-bottom: 30px;">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-calendar-alt"></i></span>
              </div>
              <input style="padding-left: 10%;" type="text" name="checkDate" class="form-control" id="reserve-datepicker" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Check in and Check out Date" value="<?php echo isset($_SESSION["checkin_checkout"]) ? $_SESSION["client_details"]["check_in"] : ""; ?>" required>
            </div>   
          </div>

          <!-- <div class="col-sm-4" style="margin-top: 30px; margin-bottom: 40px;">
            <p style="font-size: 1.3em;">Check in Date:</p>

          </div>

          <div class="col-sm-4" style="margin-top: 30px; margin-bottom: 40px;">
            <p style="font-size: 1.3em;">Check Out Date:</p>
          
          </div> -->

        </div>
        

        <div class="row">
            <div class="col-sm-12">
            <?php
            $room_query = "SELECT DISTINCT count(r_s.room_id), r.id, r.type, r.simple_description, r.capacity, r.rate FROM room r INNER JOIN room_status r_s ON r.id = r_s.room_id GROUP BY r_s.room_id";
            $room_results = mysqli_query($db, $room_query);
            
            $row_count = mysqli_num_rows($room_results); 
            
            if($row_count > 0) {
                $id = 1;
                while($room_details = mysqli_fetch_assoc($room_results)) {    
                    echo '
                        <div class="row room-div"> 
                            <div class="room-img col-sm-3">
                                <img src="https://picsum.photos/200/200/?random" alt="Image of '. $room_details['type'].'">
                            </div>
                            <div class="room-details col-sm-6">
                                <h4 id="roomName'.$id.'">'.$room_details['type'].'</h4>
                                <p>'.$room_details['simple_description'].'</p>
                            </div>
                            <div class="room-form col-sm-3">
                                <p>'.$room_details['count(r_s.room_id)'].' Room(s) Left</p>
                                <p><small>Rate per night</small></p>
                                <p class="price" id="roomPrice'.$id.'" data-price="'.$room_details['rate'].'">P '. number_format($room_details['rate'], 2).'</p>
                                <input style="display: none;" class="form-check-input" id="room'.$room_details['id'].'" type="checkbox" name="rooms[]" value="' . $room_details['id'] . '">
                                <select class="form-control" name="guestNum'.$id.'" placeholder="Guest Count">
                                    <option value=""></option>                
                    ';
                    
                    for($i = 1; $i <= $room_details['count(r_s.room_id)']; $i++) {
                        echo '<option value='.$i.'>'.$i.'</option>';
                    }
                    echo '
                                </select>
                                <a href="#" class="btn btn-primary select-room-btn" id="select-room-btn-'.$id.'"  onclick="selectRoomRebook('.$id.')">Select Room</a>
                            </div>
                        </div>                
                    ';
                    $id++;
                }
            }
                
            ?>  
            </div>
        </div>
        
        
        <button type="submit" class="btn btn-primary" style="float: right; margin-bottom: 50px;">Rebook</button>
      </form>
        

      </div>
    </div>
  </div>

 
<?php

include('../partials/scripts.php');
include('../partials/footer.php');

?>
