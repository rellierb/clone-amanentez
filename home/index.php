<?php

include('../assets/config/connection.php');

include('../partials/header.php');

$db = db_connection();

?>

    <?php
    
    include('../partials/navbar.php');
    
    include('../partials/carousel.php');

    ?>

    <nav class="navbar navbar-dark" style="background-color: rgba(0, 0, 0, .4)" id="booking-home-page">
        <form action="../forms/enter_date.php" method="POST">
            <div style="width: 60%; margin: 0 auto;" class="row booking-elements">
                    <div class="landing-booking">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-users"></i></span>
                            </div>
                            <input type="number" name="guestNumber" placeholder="Guest Count" class="form-control" id="guest_count">
                        </div>
                    </div>
                    <div class="landing-booking">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" name="checkDate" class="form-control" id="datepicker" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Check in and Check out Date">
                        </div>    
                    </div>
                    <div class="landing-booking">
                        <button type="submit" class="btn btn-primary" id="index-reserve" role="button">BOOK NOW</a>
                    </div>
            </div>
        </form>
    </nav>

    <div class="container-fluid">
    
        <div class="row about-section">
            <div class="col-sm-12">
                <h1 class="text-center">AMANENTEZ BEACH RESORT</h1>
                <hr>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
            </div>
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Fluid jumbotron</h1>
                    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                </div>
            </div>
        
            
        </div>

        <div class="row room-list" >
            <div class="col-sm-12">
                <h2 class="text-center">OUR ROOMS</h2>
                <hr>
                <div class="row">
                    
                    <?php
                    
                    $query = "SELECT * FROM room";
                    $result = mysqli_query($db, $query);
                    
                    if(mysqli_num_rows($result) > 0) {
                        
                        while($rooms = mysqli_fetch_assoc($result)) {
                            echo '
                            <div class="col-sm-4">
                                <div class="card">
                                    <img class="card-img-top image" src="https://picsum.photos/150/150/?random" alt="Card image cap">
                                    <div class="middle">
                                        <div>' . $rooms['simple_description'] . '</div>
                                    </div>
                                    <div class="card-body">
                                        
                                        <a href="../rooms.php?room_name='.str_replace(' ', '', $rooms['type']).'"><h5 class="card-title text-center"><strong>' . $rooms['type'] . '</strong></h5></a>
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
    </div>

     <div class="footer-bg-color">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h5 class="text-center"><i class="fas fa-map-marker-alt"></i>Location</h5>    
                    <hr>
                </div>
                <div class="col-sm-4">
                    <h5 class="text-center"><i class="fas fa-search"></i>Follow us</h5>
                    <hr>
                </div>
                <div class="col-sm-4">
                    <h5 class="text-center"><i class="fas fa-envelope"></i>Contact us</h5>
                    <hr>
                </div>

            </div>
        </div>
        
    </div>         

    
<?php 

include('../partials/scripts.php');
include '../partials/footer.php';

?>