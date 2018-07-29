var board = document.getElementById('board');
var addRoom = document.getElementById('addRoom');
// var addRoomForm = document.getElementById('addRoomForm');

// event listsners
loadEventListeners();

function loadEventListeners() {

  addRoom.addEventListener("click", loadAddRoomForm);
  // if(addRoomForm) {
  //   addRoomForm.addEventListener("submit", loadMessage);
  // }
  

}



function loadAddRoomForm() {

  var formFields = ["room_type", "description", "simple_description", "capacity", "rate"];

  var form = `
    <div class="row">
      <div class="col-8">
        <form method="POST" id="addRoomForm" action="../forms/admin/add_room.php">
          <div class="form-group">
            <label for="${formFields[0]}">Room Type</label>
            <input type="text" name="${formFields[0]}" id="${formFields[0]}" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="${formFields[1]}">Description</label>
            <input type="textarea" name="${formFields[1]}" id="${formFields[1]}" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="${formFields[2]}">Simple Description</label>
            <input type="text" name="${formFields[2]}" id="${formFields[2]}" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="${formFields[3]}">Capacity</label>
            <input type="text" name="${formFields[3]}" id="${formFields[3]}" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="${formFields[4]}">Rate</label>
            <input type="number" name="${formFields[4]}" id="${formFields[4]}" class="form-control" required>
          </div>
          <input type="submit" class="btn btn-primary" id="addRoomBtn">
        </form>
      </div>
    </div>
  `;

  board.innerHTML = form;

}

function loadMessage() {
  
  // var url = "../forms/admin/add_room.php";
  // var roomName = document.getElementById("room_type").value;
  // var description = document.getElementById("description").value;
  // var simple_description = document.getElementById("simple_description").value;
  // var capacity = document.getElementById("capacity").value;
  // var rate = document.getElementById("rate").value;

  // var data = "room_name=" + roomName + "&description=" + description + "&simple_description=" + simple_description + "&capacity" + capacity + "&rate" + rate;

  // console.log(data);

  // var xml = new XMLHttpRequest();

  // xml.onreadystatechange = function() {
  //   if (this.readyState == 4 && this.status == 200) {
  //       // var message = JSON.parse(this.responseText);
  //       console.log(this.responseText);
  //       // document.getElementById("message").innerHTML = myObj.name;
        
  //   }
  // };

  // xml.open("POST", url, true);
  // xml.setRequestHeader('Content-type', "application/x-www-form-urlencoded");
  // xml.send(data);


}
