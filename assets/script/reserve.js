var guest_count_input = document.getElementById('guest_count');
var check_in_out_date = document.getElementById('reserve-datepicker');
var nextBtn = document.querySelector('.sw-btn-next');
var totalPrice = 0;
// nextBtn.addEventListener('load', function() {
//   console.log(document.body.contains(nextBtn));
// })

// $(document).ready(function(){
  
//   $('.sw-btn-next').click(function() {
//     console.log("dada");
//   });

// });


eventListeners();

function eventListeners() {
  guest_count_input.addEventListener('blur', addInputToView);
  // check_in_out_date.addEventListener('blur', function() {
  // });
  
  check_in_out_date.addEventListener('click', function() {
    var apply_btn = document.querySelector('.applyBtn');
    var apply_btn_exists = document.body.contains(apply_btn);
    if(apply_btn_exists) {
      apply_btn.addEventListener('click', addDateToShow);
    }
  });

  // nextBtn.addEventListener('click', selectRoom);
}

function addInputToView() {
  var count = guest_count_input.value;
  var guestCountView = document.getElementById('guest_count_show');
  guestCountView.innerText = count;
  guestCountView.classList.add('animated');
  guestCountView.classList.add('fadeIn');
}

function addDateToShow() {
  var arrivalDate = document.getElementById('arrival_date_show');
  var departureDate = document.getElementById('departure_date_show');
  var numberOfDays = document.getElementById('no-of-days');

  var startDate = $('#reserve-datepicker').data('daterangepicker').startDate;
  var endDate = $('#reserve-datepicker').data('daterangepicker').endDate;  
  var numOfDays = endDate.diff(startDate, 'days');

  arrivalDate.innerText = startDate.format('MMM D YYYY');
  departureDate.innerText = endDate.format('MMM D YYYY');
  numberOfDays.innerText = numOfDays;

  arrivalDate.classList.add('animated');
  arrivalDate.classList.add('fadeIn');
  departureDate.classList.add('animated');
  departureDate.classList.add('fadeIn');
  numberOfDays.classList.add('animated');
  numberOfDays.classList.add('fadeIn');
}

function selectRoom(id) {
  
  var isRoomChecked = document.getElementById('room' + id);
  var roomName = document.getElementById('roomName' + id).innerText;
  var roomPrice = document.getElementById('roomPrice' + id).innerText;
  var roomCount = document.querySelector('select[name="guestNum'+ id+'"]').value;
  var roomsSelected = document.getElementById('roomsSelected');
  var noRoomSelected = document.getElementById('noRoomSelected');
  var roomList = document.getElementById('roomList');

  if(roomCount != '') {
    isRoomChecked.setAttribute("checked", true);
    if(document.body.contains(noRoomSelected)) {
      roomsSelected.removeChild(noRoomSelected);
    }
    var li = document.createElement('li');
    li.classList.add('animated');
    li.classList.add('fadeIn');
    var roomListContent = "";
    roomListContent += '<p>' + roomName + '<span style="float: right">' + roomCount + ' X ' + roomPrice + '</span></p>';
    
    li.innerHTML = roomListContent;
    roomsSelected.appendChild(li);

    var price = document.getElementById('roomPrice' + id).getAttribute('data-price');
    var mainDiv = document.createElement('div');
    mainDiv.classList.add('card-footer');
    if(document.body.contains(document.querySelector('div.card-footer'))) {
      var content = attachTotalPrice(id, price);
      mainDiv.appendChild(content);
      document.querySelector('div.side-nav-res').appendChild(mainDiv);
    } else {
      
      var content = attachTotalPrice(id, price);
      mainDiv.appendChild(content);
      document.querySelector('div.side-nav-res').appendChild(mainDiv);
    }
  } else {
    alert('False');
  }

}

function attachTotalPrice(id, price) {
  var div = document.createElement('div');
  totalPrice += parseFloat(price);
  var content = '<p class="animated fadeIn">Total <span style="float: right;">' + totalPrice + '</span></p>';
  div.innerHTML = content;
  return div;
}

function totalWithVAT(price) {

}


