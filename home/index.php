<?php

include('../assets/config/connection.php');

include('../partials/header.php');

$db = db_connection();

?>

    <?php
    
    include('../partials/navbar.php');
    
    include('../partials/carousel.php');

    ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-body">
                        <h3>Book your stay</h3>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="capacity">Guest Count:</label>
                                    <input type="number" name="guestNumber" class="form-control" id="guest_count" required>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <label for="capacity">Check in and Check out Date:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" name="checkDate" class="form-control" id="datepicker" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-primary" id="index-reserve" role="button" style="margin-top: 30px; color: white;" href="../booking/reserve.php">Book now!</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                    <?php
                    
                    $query = "SELECT * FROM room";
                    $result = mysqli_query($db, $query);
                    
                    if(mysqli_num_rows($result) > 0) {
                        
                        while($rooms = mysqli_fetch_assoc($result)) {
                            echo '
                            <div class="col-sm-4">
                                <div class="card">
                                    <img class="card-img-top" src="https://picsum.photos/150/150/?random" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>' . $rooms['type'] . '</strong></h5>
                                        <p class="card-text">' . $rooms['simple_description'] . '</p>
                                        <a href="../rooms.php?room_name='.str_replace(' ', '', $rooms['type']).'" class="btn btn-primary">Discover more</a>
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

        <div class="row">
            <div class="col-sm-12">
                <div class="card about">
                    <h2>About Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>

    </div>

    
<?php 

include('../partials/scripts.php');
include '../partials/footer.php';

?>