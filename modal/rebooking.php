<?php



?>


<div class="modal fade" id="reBooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rebooking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../forms/rebook_reservation.php" method="POST">
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
                            <input class="form-check-input" id="room'.$room_details['id'].'" type="checkbox" name="rooms[]" value="' . $room_details['id'] . '">
                            <select class="form-control" name="guestNum'.$id.'" placeholder="Guest Count">
                                <option value=""></option>                
                ';
                
                for($i = 1; $i <= $room_details['count(r_s.room_id)']; $i++) {
                    echo '<option value='.$i.'>'.$i.'</option>';
                }
                echo '
                            </select>
                            <a href="#" class="btn btn-primary select-room-btn" id="select-room-btn-'.$id.'"  onclick="selectRoom('.$id.')">Select Room</a>
                        </div>
                    </div>                
                ';
                $id++;
            }
        }
            
        ?>  
            </div>
        </div>
        
        


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Rebook</button>
        </div>
      </form>
    </div>
  </div>
</div>