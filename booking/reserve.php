<?php

session_start();
include('../partials/header.php');
include('../assets/config/connection.php');

$db = db_connection();

if(!empty($_SESSION["checkin_checkout"])) {
    $check_date = explode("-", mysqli_real_escape_string($db, trim($_SESSION["checkin_checkout"])));
    $check_in_date = date("M d Y", strtotime($check_date[0]));
    $check_out_date = date("M d Y", strtotime($check_date[1]));
    $days_diff = date_diff(date_create($check_in_date), date_create($check_out_date));
    $no_of_days = intval($days_diff->format('%d'));
}

?>
    <?php

    if (isset($_SESSION['account_type']) && ($_SESSION['account_type'] == 'Administrator')) {
        include('../partials/admin_topnav.php');
    } else if(isset($_SESSION['account_type']) && ($_SESSION['account_type'] == 'Front Desk')) {
        include('../partials/frontdesk_dashboard.php');
    } else {
        include('../partials/reservation_nav.php');
    }

    ?>
    <form method="POST" action="../forms/reserveRoom.php" id="reservation_form">
    <div class="reservation-nav">
        <div class="container">
            <div class="row">

                <div class="col-sm-4 offset-sm-1">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input style="padding-left: 10%;" type="text" name="checkDate" class="form-control" id="reserve-datepicker" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Check in and Check out Date" value="<?php echo isset($_SESSION["checkin_checkout"]) ? $_SESSION["checkin_checkout"] : ""; ?>" required>
                    </div>   
                </div>

                <!-- <div class="col-sm-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-users"></i></span>
                        </div>
                        <input type="number" name="guestNumber" placeholder="Guest Count" class="form-control" id="guest_count" value="<?php echo isset($_SESSION["guest_number"]) ? $_SESSION["guest_number"] : ""; ?>" required>
                    </div>
                </div> -->
                    
                <!-- <div class="col-sm-2">
                    <div class="check-available">
                        <button class="btn btn-success" id="check-available-btn">Check Availability</button>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="check-available">
                        <button class="btn btn-danger" id="check-available-btn">Promos and Discount</button>
                    </div>
                </div> -->

            </div>
        </div>
    </div>

    <div class="container-fluid">
        
            <div class="row">
            
                <div class="col-sm-9">
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">ROOMS</a></li>
                            <li><a href="#step-2">CLIENT DETAILS</a></li>
                            <li><a href="#step-3">PAYMENT</a></li>
                        </ul>

                        <div>
                            <div id="step-1" class="">
                                <div id="reservation-process">
                                    <div class="col-sm-12">
                                    <h3 class="text-center">Rooms</h3>
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
                                                        <small class="text-right">Number of Rooms</small>
                                                        <select class="form-control" name="guestNum'.$id.'" placeholder="Guest Count">
                                                            <option value=""></option>                
                                            ';
                                            
                                            for($i = 1; $i <= $room_details['count(r_s.room_id)']; $i++) {
                                                echo '<option value='.$i.'>'.$i.'</option>';
                                            }
                                            echo '
                                                        </select>
                                                        <small>Number of Guests</small>
                                                        <input data-guest-number="'.$id.'" onblur="addGuestNumber('.$id.')" type="number" class="form-control" min="0">
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
                            </div>
                            <div id="step-2" class="">
                                <div class="row">
                                    <div class="col">
                                            <div class="form-group">
                                                <label for="firstName">First Name</label>
                                                <input type="text" name="firstName" class="form-control" id="first-name" >
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="lastName">Last Name</label>
                                                <input type="text" name="lastName" class="form-control" id="last-name" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" name="clientAddress" class="form-control" id="address" >
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="email" id="email_validate">Email Address</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">@</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="email" aria-label="Username" aria-describedby="basic-addon1" id="client_email" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="birthday">Birthday</label>
                                                <input type="date" name="birthday" id="birthDay" value="" class="form-control" id="birthday" >
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="contactNumber">Contact Number</label>
                                                <input type="number" name="contactNumber" class="form-control" id="contact-number" >
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div id="step-3" class="">
                                <ul class="payment-wrap row">
                                    <li class="col">
                                        <input class="form-check-input" type="radio" name="payment_type" id="cash" value="Cash">
                                        <label class="form-check-label" for="payment_type">    
                                            <img src="../assets/images/cash.png">
                                            
                                        </label>
                                        <h4 class="text-center">Cash</h4>
                                    </li>
                                    <li class="col">
                                        <input class="form-check-input" type="radio" name="payment_type" id="bank_deposit" value="Bank Deposit">
                                        <label class="form-check-label" for="payment_type">    
                                            <img src="../assets/images/bank.png">
                                        </label>
                                        <h4 class="text-center">Bank Deposit</h4>
                                    </li>
                                    <li class="col">
                                        <input class="form-check-input" type="radio" name="payment_type" id="paypal_payment" value="Paypal">
                                        <label class="form-check-label" for="payment_type">    
                                            <img src="../assets/images/paypal.png">
                                        </label>
                                        <h4 class="text-center">PayPal</h4>
                                    </li>                                
                                </ul>
                                
                                <br>
                                <br>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <h5 style="margin-left: 50px;">
                                            <input type="checkbox" class="form-check-input" id="terms-and-condition">
                                            I have agreed to the <a href="#">terms and condition</a> 
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            
                <div class="col-sm-3">
                    <div class="card side-nav-res">
                        <div class="side-nav-res-header">
                            <h5 class="card-title">Reservation Details</h5>
                        </div>
                        <div class="card-body" id="reservation-details">
                            <ul>
                                <li>
                                    <div class="col-sm-12">
                                        <span>Arrival Date</span>
                                        <b><span id="arrival_date_show" style="float: right;">
                                        <?php echo !empty($check_in_date) ? $check_in_date : ""; ?>
                                        </span></b>
                                    </div>
                                </li>
                                <li>
                                    <div class="col-sm-12">
                                        <span>Departure Date</span>
                                        <b><span id="departure_date_show" style="float: right;">
                                        <?php echo !empty($check_out_date) ? $check_out_date : ""; ?>
                                        </span></b>
                                    </div>
                                </li>
                                <li>
                                    <div class="col-sm-12">
                                        <span>No of Days</span>
                                        <b><span id="no-of-days" style="float: right;">
                                        <?php echo !empty($no_of_days) ? $no_of_days  : ""; ?>
                                        </span></b>
                                    </div>
                                </li>
                                <li>
                                    <div class="col-sm-12">
                                        <span>Guest Count</span>
                                        <b><span id="guest_count_show" style="float: right;"><?php echo isset($_SESSION["guest_number"]) ? $_SESSION["guest_number"] : ""; ?></span></b>
                                        <input type="hidden" name="guestNumber"  class="form-control" id="guest_count" value="0">
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="side-nav-res-header">
                            <h5 class="card-title">Room(s) Details</h5>
                        </div>
                        <div class="card-body" id="roomsSelected">
                            <ul id="roomList">
                            </ul>
                            <p class="text-center" id="noRoomSelected">No room(s) selected</p>
                        </div>

                    </div>
                    <button class="btn btn-primary" type="submit" id="primarySubmitBtn" style="width: 100%;">SUBMIT</button>        
                </div>
            </div>
        </form>
    </div> <!-- ./container -->

        
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    
    </script>
<?

unset($_SESSION["checkin_checkout"]);

include('../modal/term.php');
include('../partials/scripts.php');
include('../partials/footer.php');

?>