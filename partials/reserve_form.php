<h3>Step 1</h3>
<p>Check in and check out date</p>
<form method="POST" action="../forms/reserveRoom.php">
    <div class="row">        
        <div class="col-sm">
            <div class="form-group mx-sm-3 mb-2">
                <label for="capacity">Guest Number:</label>
                <input type="number" name="guestNumber" class="form-control" required>
            </div>
        </div>

        <div class="col-sm">
            <label for="date">Date</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="text" name="checkDate" class="form-control" id="datepicker" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
            </div>    
        </div>
    </div> 

    <br> 
    <hr>
    <br>

    <h3>Step 2</h3>
    <p>Rooms</p>


    <div id="roomsAvailable">
    <?php
    
    // show all rooms
    $room_query = "SELECT DISTINCT count(r_s.room_id), r.id, r.type, r.simple_description, r.capacity, r.rate FROM room r INNER JOIN room_status r_s ON r.id = r_s.room_id GROUP BY r_s.room_id";
    $room_results = mysqli_query($db, $room_query);
    
    
    $row_count = mysqli_num_rows($room_results); 
    
    if($row_count > 0) {
      while($room_details = mysqli_fetch_assoc($room_results)) {
          
        if(intval($room_details['id']) % 3 == 1) {
            echo '<div class="row">';
        }
        echo '
            <div class="col-sm">
                <img class="card-img-top" src="https://picsum.photos/500/?random" alt="Card image cap">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="rooms[]" value="1">
                    <h5>'. $room_details['type'] .'</h5>
                    <p class="card-text">'. $room_details['simple_description'] .'</p>
                    <div class="form-group">
                        <label>Number of Rooms</label>
                        <select class="form-control" name="guestNum1" style="width: 67%; display: inline-block;">
                            <option value="" selected>0</option>
        ';
        for($k = 1; $k <= $room_details['count(r_s.room_id)']; $k++) {
            echo '<option value="'.$k.'">'.$k.'</option>';
        }

        echo '
                        </select>
                    </div>
                </div>
            </div>';
            
        if(intval($room_details['id']) % 3 == 0) {
            echo '</div>';
        }
      }
    }
    
    ?>
    </div>

    <br>
    <hr>
    <br>

    <h3>Step 3</h3>   
    <p>Client Information</p>
    
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" class="form-control" id="exampleFormControlInput1" required>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" class="form-control" id="exampleFormControlInput1" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="clientAddress" class="form-control" id="exampleFormControlInput1" required>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="contactNumber">Email Address</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@</span>
                    </div>
                    <input type="text" class="form-control" name="email" aria-label="Username" aria-describedby="basic-addon1" required>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="contactNumber">Contact Number</label>
                <input type="number" name="contactNumber" class="form-control" id="exampleFormControlInput1" required>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" name="birthday" id="birthDay" value="" class="form-control" id="exampleFormControlInput1" required>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    I have read the <a href="" data-toggle="modal" data-target="#termsAndCondition">Terms and Condition</a>
                </label>
            </div>
        </div>
    </div>

    <hr>

    <button class="btn btn-primary" type="submit" value="submit">Submit</button>
</form>