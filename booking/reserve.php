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
        
        <div class="row">        
            <div class="col-sm">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="capacity">Guest Number:</label>
                    <input type="number" class="form-control" id="inputPassword2">
                </div>
            </div>
    
            <div class="col-sm">
                <label for="date">Date</label>
                <div class="input-group">
                    
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="checkDate" class="form-control" id="datepicker" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    
                </div>    
            </div>
        </div> 

        <br> 
        <hr>
        <br>

        <h3>Step 2</h3>
        <p>Rooms</p>

        <div class="row" id="roomsAvailable">

            <div class="col-sm">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/500/?random" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Example select</label>
                            <select class="form-control" id="exampleFormControlSelect1" style="width: 67%; display: inline-block;">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Select</button>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-sm">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/500/?random" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Example select</label>
                            <select class="form-control" id="exampleFormControlSelect1" style="width: 67%; display: inline-block;">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Select</button>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-sm">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/500/?random" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Example select</label>
                            <select class="form-control" id="exampleFormControlSelect1" style="width: 67%; display: inline-block;">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Select</button>
                        </div>
                    </div>
                </div>
            </div>

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
                    <input type="text" name="firstName" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="contactNumber">Email Address</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="contactNumber">Contact Number</label>
                    <input type="text" name="contactNumber" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="birthday">Birthday</label>
                    <input type="date" name="birthday" id="birthDay" value="" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>
        </div>


    <div class="col-sm">
        <div class="card">
            <img class="card-img-top" src="https://picsum.photos/500/?random" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="form-group">
                    <label>Example select</label>
                    <select class="form-control" style="width: 67%; display: inline-block;">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Select</button>
                </div>
            </div>
        </div>
    </div>

    </div> <!-- ./container -->

    <script>
        var myRooms, txt = "";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                myRooms = JSON.parse(this.responseText);
                for(x in myRooms) {
                    txt += '<div class="col-sm">';
                    txt += ' <img class="card-img-top" src="https://picsum.photos/500/?random" alt="Card image cap">'
                    txt += '<h5>' + myRooms[x].type   + '</h5>';
                    txt += '<p class="card-text">' + myRooms[x].description + '</p>';
                    txt += '<div class="form-group">';
                    txt += '<label>Number of Rooms</label>';
                    txt += '<select class="form-control" style="width: 67%; display: inline-block;">';
                    for(var i = 1; i < 5; i++) {
                        txt += '<option>'  + i + '</option>';
                    }
                    txt += '</select>';
                    txt += '<button type="submit" class="btn btn-primary">Select</button>';
                    txt += '</div>';
                    txt += '</div>';
                    txt += '</div>';
                    txt += '</div>';
                }
                document.getElementById("roomsAvailable").innerHTML = txt;
            }
        };
        xmlhttp.open("GET", "../rooms/list_room.php", true);
        xmlhttp.send();
    </script>


<?

include('../partials/scripts.php');
include('../partials/footer.php');

?>