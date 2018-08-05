$(document).ready(function() {

  
  $('#index-reserve').click(function() {

    var guest_number = $('#guest_count').val();
    var reservation_date =  $('#datepicker').val();

    localStorage.setItem('guest_count', `${guest_number}`);
    localStorage.setItem('reservation_date', `${reservation_date}`);
  });



})


