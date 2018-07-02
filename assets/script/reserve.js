var myRooms, txt = "";

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
        myRooms = JSON.parse(this.responseText);
        var roomValue = 0;
        for(var x = 0; x < myRooms.length; x++) {
            roomValue += 1;
            txt += '<div class="col-sm">';
            txt += '<img class="card-img-top" src="https://picsum.photos/500/?random" alt="Card image cap">'
            txt += '<div class="form-check">'
            txt += '<input class="form-check-input" type="checkbox" name="rooms[]" value="' + roomValue +'">'
            txt += '<h5>' + myRooms[x].type   + '</h5>';
            txt += '<p class="card-text ellipsis">' + myRooms[x].description + '</p>';
            txt += '<div class="form-group">';
            txt += '<label>Number of Rooms</label>';
            txt += '<select class="form-control" name="guestNum'+ roomValue +'" style="width: 67%; display: inline-block;">';
            for(var i = 0; i < 5; i++) {
                txt += '<option value="'+ i +'">'  + i + '</option>';
            }
            txt += '</select>';
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

