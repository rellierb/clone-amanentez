var guest_count_input = document.getElementById('guest_count');
var check_in_out_date = document.getElementById('reserve-datepicker');

eventListeners();

function eventListeners() {
  guest_count_input.addEventListener('blur', addInputToView);
  check_in_out_date.addEventListener('blur', function() {
    console.log('trads');
  });
  
  check_in_out_date.addEventListener('click', function() {
    var apply_btn = document.querySelector('.applyBtn');
    var apply_btn_exists = document.body.contains(apply_btn);
    console.log(apply_btn_exists);
    if(apply_btn_exists) {
      apply_btn.addEventListener('click', addDateToShow);
    }
  })
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
  console.log(id);

}


