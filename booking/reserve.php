<?php

include('../partials/header.php');

?>
    <?php

    include('../partials/navbar.php');
    
    ?>

    <div class="container">
        <h1 class="text-center">RESERVATION</h1>
        
        <h3>Step 1</h3>
        <p>Check in and check out date</p>
        <form method="POST" action="../forms/reserveRoom.php">
            <div class="row">        
                <div class="col-sm">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="capacity">Guest Number:</label>
                        <input type="number" name="guestNumber" class="form-control" id="inputPassword2" required>
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

            <div class="row" id="roomsAvailable">

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
                            I have read the <a href="" data-toggle="modal" data-target="#exampleModal">Terms and Condition</a>
                        </label>
                    </div>
                </div>
            </div>

            <hr>

            <button class="btn btn-primary" type="submit" value="submit">Submit</button>
        </form>
    </div> <!-- ./container -->

    
    <script src="../assets/script/reserve.js"></script>
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