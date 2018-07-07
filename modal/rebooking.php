<div class="modal fade" id="reBooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancel Booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../forms/rebook_reservation.php" method="POST">
        <div class="modal-body">
          <div class="row">
            <div class="col">
            <label for="date">Date</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="checkDate" class="form-control" id="datepicker" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                </div> 
            </div>
          </div>
          <hr>
          <div id="roomsAvailable">
              <div class="row">
                  <div class="col-sm">
                      <img class="card-img-top" src="https://picsum.photos/500/?random" alt="Card image cap">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="rooms[]" value="1">
                          <h5>Standard Room</h5>
                          <p class="card-text"></p>
                          <div class="form-group">
                              <label>Number of Rooms</label>
                              <select class="form-control" name="guestNum1" style="width: 67%; display: inline-block;">
                                  <option value="" selected></option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm">
                      <img class="card-img-top" src="https://picsum.photos/500/?random" alt="Card image cap">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="rooms[]" value="2">
                          <h5>Standard Deluxe</h5>
                          <p class="card-text ellipsis"></p>
                          <div class="form-group">
                              <label>Number of Rooms</label>
                              <select class="form-control" name="guestNum2" style="width: 67%; display: inline-block;">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm">
                      <img class="card-img-top" src="https://picsum.photos/500/?random" alt="Card image cap">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="rooms[]" value="3">
                          <h5>Deluxe</h5>
                          <p class="card-text ellipsis"></p>
                          <div class="form-group">
                              <label>Number of Rooms</label>
                              <select class="form-control" name="guestNum3" style="width: 67%; display: inline-block;">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>  <!-- .row -->
              <div class="row">
                  <div class="col-sm">
                      <img class="card-img-top" src="https://picsum.photos/500/?random" alt="Card image cap">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="rooms[]" value="4">
                          <h5>Superior Room</h5>
                          <p class="card-text ellipsis"></p>
                          <div class="form-group">
                              <label>Number of Rooms</label>
                              <select class="form-control" name="guestNum4" style="width: 67%; display: inline-block;">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm">
                      <img class="card-img-top" src="https://picsum.photos/500/?random" alt="Card image cap">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="rooms[]" value="5">
                          <h5>Executive Room</h5>
                          <p class="card-text ellipsis"></p>
                          <div class="form-group">
                              <label>Number of Rooms</label>
                              <select class="form-control" name="guestNum5" style="width: 67%; display: inline-block;">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm">
                      <img class="card-img-top" src="https://picsum.photos/500/?random" alt="Card image cap">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="rooms[]" value="6">
                          <h5>VIP Beach Front</h5>
                          <p class="card-text ellipsis"></p>
                          <div class="form-group">
                              <label>Number of Rooms</label>
                              <select class="form-control" name="guestNum6" style="width: 67%; display: inline-block;">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                              </select>
                          </div>
                      </div>
                  </div>
              </div> <!-- ./row -->
            </div> <!-- #roomsAvailable-->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Rebook</button>
        </div>
      </form>
    </div>
  </div>
</div>