<?php

session_start();
include('../partials/header.php');
include('../assets/config/connection.php');

$db = db_connection();

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
                        <input type="text" name="checkDate" class="form-control" id="reserve-datepicker" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Check in and Check out Date" required>
                    </div>   
                </div>

                <div class="col-sm-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-users"></i></span>
                        </div>
                        <input type="number" name="guestNumber" placeholder="Guest Count" class="form-control" id="guest_count" required>
                    </div>
                </div>
                    
                <div class="col-sm-2">
                    <div class="check-available">
                        <button class="btn btn-success" id="check-available-btn">Check Availability</button>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="check-available">
                        <button class="btn btn-danger" id="check-available-btn">Promos and Discount</button>
                    </div>
                </div>

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
                                        <b><span id="arrival_date_show"></span></b>
                                    </div>
                                </li>
                                <li>
                                    <div class="col-sm-12">
                                        <span>Departure Date</span>
                                        <b><span id="departure_date_show"></span></b>
                                    </div>
                                </li>
                                <li>
                                    <div class="col-sm-12">
                                        <span>Guest Count</span>
                                        <b><span id="guest_count_show"></span></b>
                                    </div>
                                </li>
                                <li>
                                    <div class="col-sm-12">
                                        <span>No of Days</span>
                                        <b><span id="no-of-days"></span></b>
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

    

   
    <!-- <div class="container">
        
        <div class="alert alert-danger" id="invalid_email" role="alert">
            The email you enter is <b>invalid</b>
        </div>

        <div class="alert alert-danger" id="taken_email" role="alert">
            The email you enter is <b>already taken</b>
        </div>

        <div class="alert alert-danger" id="room_selected" role="alert">
            You have not selected any rooms
        </div>

        <div class="row">
            <div class="col-sm-12 ">
                <div class="card" id="center-div">
                    

                    <form method="POST" action="../forms/reserveRoom.php" id="reservation_form">
                        
                        <fieldset class="row" id="step-1">        
                            <div class="col-sm-4 offset-md-4">
                                <div>
                                    <label for="capacity">Guest Number:</label>
                                    <input type="number" id="guest_count" name="guestNumber" class="form-control" required>
                                </div>

                                <label for="date">Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" name="checkDate" class="form-control" id="datepicker" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                                </div>    
                                
                            </div>
                            <button type="button" class="next btn btn-primary">Next</button>
                        </fieldset> 

                        <fieldset id="step-2"> -->

                       
                                <!-- <button type="button" class="previous btn btn-primary">Previous</button>
                                <button type="button" class="next btn btn-primary" id="room-select-next">Next</button>
                            </fieldset> -->

                            
                        <!-- <fieldset id="step-3">

                            <ul class="payment-wrap">
                                <li>
                                    <label class="form-check-label" for="payment_type">
                                        <input class="form-check-input" type="radio" name="payment_type" id="cash" value="Cash" checked>
                                        <img src="../assets/images/cash.png">
                                            Cash
                                    </label>

                                </li>
                                <li>
                                
                                    <label class="form-check-label" for="payment_type">
                                        <input class="form-check-input" type="radio" name="payment_type" id="bank_depost" value="Bank Deposit">
                                        <img src="../assets/images/bank.png">
                                        Bank Deposit
                                        
                                    </label>
                                
                                </li>
                                <li>
                                    <label class="form-check-label" for="payment_type">
                                        <input class="form-check-input" type="radio" name="payment_type" id="bank_deposti" value="Paypal">
                                        <img src="../assets/images/paypal.png">
                                        PayPal
                                    </label>

                                </li>                                
                            </ul>

                            <button type="button" class="previous btn btn-primary">Previous</button>
                            <button type="button" class="next btn btn-primary">Next</button>
                        </fieldset>

                        <fieldset id="step-4">                    
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" name="firstName" class="form-control" id="first-name" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" name="lastName" class="form-control" id="last-name" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="clientAddress" class="form-control" id="address" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="contactNumber" id="email_validate">Email Address</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                            </div>
                                            <input type="text" class="form-control" name="email" aria-label="Username" aria-describedby="basic-addon1" id="client_email" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="contactNumber">Contact Number</label>
                                        <input type="number" name="contactNumber" class="form-control" id="contact-number" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="birthday">Birthday</label>
                                        <input type="date" name="birthday" id="birthDay" value="" class="form-control" id="birthday" required>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="previous btn btn-primary">Previous</button>
                            <button class="btn btn-success" id="btn-submit" type="submit" value="submit">Submit</button>
                        </fieldset>

                    </form>
                </div> -->

                   <!-- <div class="reserve-set-button">
                        <button type="button" class="previous btn btn-primary">Previous</button>
                        <button type="button" class="next btn btn-primary">Next</button>
                    </div> -->
            <!-- </div> -->

            <!-- <div class="col-sm-3">
                <div class="card" id="reservation_summary">
                    <h5>Reservation Summary</h5>
                    
                </div>
            </div> -->
        <!-- </div> -->
        
        
        <?php
        
        // include('../partials/reserve_form.php');
        
        ?>
    

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    
    </script>
<?

include('../modal/term.php');
include('../partials/scripts.php');
include('../partials/footer.php');

?>