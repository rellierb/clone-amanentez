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
        include('../partials/navbar.php');
    }
    // include('../partials/navbar.php');
    ?>



    <div class="container-fluid">
        <h1 class="text-center">RESERVATION</h1>
        
        <div class="alert alert-danger" id="invalid_email" role="alert">
            The email you enter is <b>invalid</b>
        </div>

        <div class="alert alert-danger" id="taken_email" role="alert">
            The email you enter is <b>already taken</b>
        </div>

        <div class="row">
            <div class="col-sm-9">
                <div class="card">
                    <ul class="progress-form">
                        <li class="active" >Check in and Check out date</li>
                        <li>Rooms</li>
                        <li>Mode of Payment</li>
                        <li>Client Details</li>
                    </ul>

                    <form method="POST" action="../forms/reserveRoom.php" id="reservation_form">
                        
                        <fieldset class="row" id="step-1">        
                            <div class="col-sm-6 offset-md-3">
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

                        <fieldset id="step-2">

                        <?php
                        // show all rooms
                        $room_query = "SELECT DISTINCT count(r_s.room_id), r.id, r.type, r.simple_description, r.capacity, r.rate FROM room r INNER JOIN room_status r_s ON r.id = r_s.room_id GROUP BY r_s.room_id";
                        $room_results = mysqli_query($db, $room_query);
                        
                        $row_count = mysqli_num_rows($room_results); 
                        
                        if($row_count > 0) {
                            $id = 1;
                            while($room_details = mysqli_fetch_assoc($room_results)) {
                                
                                if(intval($room_details['id']) % 3 == 1) {
                                    echo '<div class="row">';
                                }
                                echo '
                                    <div class="col-sm">
                                        <img class="card-img-top" src="https://picsum.photos/500/?random" alt="Card image cap">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="rooms[]" value="'. $id .'">
                                            <h5>'. $room_details['type'] .'</h5>
                                            <p class="card-text ellipsis">'. $room_details['simple_description'] .'</p>
                                            <p class="card-text">'. $room_details['rate'] .'</p>
                                            <div class="form-group">
                                                <label>Number of Rooms</label>
                                                <select class="form-control" name="guestNum'.$id.'" style="width: 67%; display: inline-block;">
                                                    <option value="" selected></option>
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
                                $id++;
                            }
                        }
                        
                        ?>
                            <button type="button" class="previous btn btn-primary">Previous</button>
                            <button type="button" class="next btn btn-primary">Next</button>
                        </fieldset>

                            
                        <fieldset id="step-3">

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
                                        <input class="form-check-input" type="radio" name="payment_type" id="bank_depost" value="Bank Deposit" checked>
                                        <img src="../assets/images/bank.png">
                                        Bank Deposit
                                        
                                    </label>
                                
                                </li>
                                <li>
                                    <label class="form-check-label" for="payment_type">
                                        <input class="form-check-input" type="radio" name="payment_type" id="bank_deposti" value="Paypal" checked>
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
                                        <input type="text" name="firstName" class="form-control" id="" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" name="lastName" class="form-control" id="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="clientAddress" class="form-control" id="" required>
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

                            <button type="button" class="previous btn btn-primary">Previous</button>
                            <button class="btn btn-success" type="submit" value="submit">Submit</button>
                        </fieldset>

                    </form>
                </div>

                   <!-- <div class="reserve-set-button">
                        <button type="button" class="previous btn btn-primary">Previous</button>
                        <button type="button" class="next btn btn-primary">Next</button>
                    </div> -->
            </div>

            <div class="col-sm-3">
                <div class="card" id="reservation_summary">
                    <h5>Reservation Summary</h5>
                    
                </div>
            </div>
        </div>
        
        
        <?php
        
        // include('../partials/reserve_form.php');
        
        ?>
    </div> <!-- ./container -->

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