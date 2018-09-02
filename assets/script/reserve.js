var guest_count_input = document.getElementById('guest_count');
var check_in_out_date = document.getElementById('reserve-datepicker');
var nextBtn = document.querySelector('.sw-btn-next');
var totalPrice = 0;
var roomSelecetedByUser = [];
var overallGuestCount = parseInt(guest_count_input.value);

// ELement ID for validation
var form = document.getElementById('reservation_form');
var termsAndCondition = document.getElementById('terms-and-condition');

var firstName = document.getElementById('first-name');
var lastName = document.getElementById('last-name');
var address = document.getElementById('address');
var email = document.getElementById('client_email');
var contactNumber = document.getElementById('contact-number');
var birthday = document.getElementById('birthDay');

eventListeners();
var mainSubmitBtn = document.getElementById('primarySubmitBtn');
mainSubmitBtn.disabled = true;  


var guestNumberInput = document.querySelectorAll('[data-guest-number]');

function eventListeners() {
  // guest_count_input.addEventListener('blur', addInputToView);
  
  check_in_out_date.addEventListener('click', function() {
    var apply_btn = document.querySelector('.applyBtn');
    var apply_btn_exists = document.body.contains(apply_btn);
    if(apply_btn_exists) {
      apply_btn.addEventListener('click', addDateToShow);
    }
  });

  firstName.addEventListener('blur', validateFirstName);
  lastName.addEventListener('blur', validateLastName);
  address.addEventListener('blur', validateAddress);
  email.addEventListener('blur', validateEmail);
  contactNumber.addEventListener('blur', validateContactNumber);
  birthday.addEventListener('blur', validateBirthday);

  termsAndCondition.addEventListener('click', processForm);

 // guestNumberInput.addEventListener('blur', addGuestNumber);

}

var i = [];
function addGuestNumber(id) {
  // var el = parseInt(document.querySelector('input[data-guest-number*="' + id + '"]').value);
  // var input = document.querySelector('input[data-guest-number*="' + id + '"]');
  // console.log(el);

  // if(!i.includes(input)) {
    
  //   input.addEventListener('focus', function() {
  //     console.log(input.value);
  //     if(input.value !== '' || input.value !== 0) {
  //       overallGuestCount -= input.value;
  //       console.log(overallGuestCount);
  //     }
      
  //   })
  //   console.log(overallGuestCount);
  //   overallGuestCount += el;
  //   if(!isNaN(overallGuestCount)) {
  //     i.push(input);
  //     var guestCountView = document.getElementById('guest_count_show');
  //     guestCountView.innerText = overallGuestCount;
  //     guestCountView.classList.add('animated');
  //     guestCountView.classList.add('fadeIn');
  //   }
  // } 
  // else {
  //   overallGuestCount += el;
  //   var guestCountView = document.getElementById('guest_count_show');
  //   guestCountView.innerText = overallGuestCount;
  //   guestCountView.classList.add('animated');
  //   guestCountView.classList.add('fadeIn');
  // }

  // guest_count_input.value = overallGuestCount;
  // console.log(overallGuestCount);
  
}

function addInputToView() {
  // var count = guest_count_input.value;
  // var guestCountView = document.getElementById('guest_count_show');
  // guestCountView.innerText = count;
  // guestCountView.classList.add('animated');
  // guestCountView.classList.add('fadeIn');
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

var overallGuestCount = parseInt(guest_count_input.value);
function selectRoom(id) {
  var isRoomChecked = document.getElementById('room' + id);
  var roomName = document.getElementById('roomName' + id).innerText;
  var roomPrice = document.getElementById('roomPrice' + id).innerText;
  var roomCount = document.querySelector('select[name="guestNum'+ id+'"]').value;
  var roomsSelected = document.getElementById('roomsSelected');
  var noRoomSelected = document.getElementById('noRoomSelected');
  var roomList = document.getElementById('roomList');
  var getSelectBtn = document.getElementById('select-room-btn-' + id);
  var roomListContent = "";

  if(getSelectBtn.classList.contains('btn-success')) {
    getSelectBtn.addEventListener('click', function(event) {
      event.preventDefault();
    })
  } else {
    if(roomCount != '') {
      isRoomChecked.setAttribute("checked", true);
      if(document.body.contains(noRoomSelected)) {
        // roomsSelected.removeChild(noRoomSelected);
      }
      if(!roomSelecetedByUser.includes(roomName)){
        
        if(document.querySelector('input[data-guest-number*="' + id + '"]').value !== '') {
          roomSelecetedByUser.push(roomName);
          document.querySelectorAll('select[name*="guestNum"]').forEach(function(element) {
            if(this.value != '' && roomSelecetedByUser.length > 0) {
              $('.sw-btn-next').prop('disabled', false);
            }
          });

          var li = document.createElement('li');
          li.classList.add('animated');
          li.classList.add('fadeIn');
          roomListContent += '<p>' + roomName + '<span style="float: right">' + roomCount + ' X ' + roomPrice + '</span></p>';
          li.innerHTML = roomListContent;
          roomsSelected.appendChild(li);

          toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
          toastr.success("Room Successfully Added");
          if(typeof(noRoomSelected) != 'undefined' && noRoomSelected != null) {
            roomsSelected.removeChild(noRoomSelected);
          } 
          getSelectBtn.innerText = "Selected"
          getSelectBtn.classList.remove('btn-primary');
          getSelectBtn.classList.add('btn-success');

          // Room Count
          var reserveRoomCount = document.querySelector('input[data-guest-number*="' + id + '"]').value;
          overallGuestCount += parseInt(reserveRoomCount);

          var guestCountView = document.getElementById('guest_count_show');
          guestCountView.innerText = overallGuestCount;
          guestCountView.classList.add('animated');
          guestCountView.classList.add('fadeIn');
          guest_count_input.value = overallGuestCount;

          var price = document.getElementById('roomPrice' + id).getAttribute('data-price');
          var mainDiv = document.createElement('div');
          mainDiv.classList.add('card-footer');
          if(document.body.contains(document.querySelector('div.card-footer'))) {
            var totalPriceText = document.getElementById('totalPrice');
            totalPrice += parseFloat(price) * reserveRoomCount;
            totalPriceText.innerText = "P " + totalPrice.toLocaleString();     
          } else {
            var content = attachTotalPrice(id, price * reserveRoomCount);
            mainDiv.appendChild(content);
            document.querySelector('div.side-nav-res').appendChild(mainDiv);
          }

        } else {
          toastr.error("Please select guest number");
        }

      } 
      
    } else {
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      toastr.error("Please choose the number of rooms first");
    }
  }
}

function selectRoomRebook(id) {
  var isRoomChecked = document.getElementById('room' + id);
  var roomName = document.getElementById('roomName' + id).innerText;
  var roomPrice = document.getElementById('roomPrice' + id).innerText;
  var roomCount = document.querySelector('select[name="guestNum'+ id+'"]').value;
  var roomsSelected = document.getElementById('roomsSelected');
  var noRoomSelected = document.getElementById('noRoomSelected');
  var roomList = document.getElementById('roomList');
  var getSelectBtn = document.getElementById('select-room-btn-' + id);
  var roomListContent = "";


  if(document.querySelector('select[name*="guestNum'+id+'"]').value !== '') {
    isRoomChecked.setAttribute("checked", true);
    toastr.success("Room Successfully Added");
    getSelectBtn.innerText = "Selected"
    getSelectBtn.classList.remove('btn-primary');
    getSelectBtn.classList.add('btn-success');
  } else {
    alert("No of rooms not selected");
  }


  // if(getSelectBtn.classList.contains('btn-success')) {
  //   getSelectBtn.addEventListener('click', function(event) {
  //     event.preventDefault();
  //   })
  // } else {
  //   if(roomCount != '') {
  //     isRoomChecked.setAttribute("checked", true);
  //     if(document.body.contains(noRoomSelected)) {
  //       // roomsSelected.removeChild(noRoomSelected);
  //     }
  //     if(!roomSelecetedByUser.includes(roomName)){
        
  //       if(document.querySelector('input[data-guest-number*="' + id + '"]').value !== '') {
  //         roomSelecetedByUser.push(roomName);
  //         document.querySelectorAll('select[name*="guestNum"]').forEach(function(element) {
  //           if(this.value != '' && roomSelecetedByUser.length > 0) {
  //             $('.sw-btn-next').prop('disabled', false);
  //           }
  //         });

  //         var li = document.createElement('li');
  //         li.classList.add('animated');
  //         li.classList.add('fadeIn');
  //         roomListContent += '<p>' + roomName + '<span style="float: right">' + roomCount + ' X ' + roomPrice + '</span></p>';
  //         li.innerHTML = roomListContent;
  //         roomsSelected.appendChild(li);

  //         toastr.options = {
  //           "closeButton": false,
  //           "debug": false,
  //           "newestOnTop": false,
  //           "progressBar": false,
  //           "positionClass": "toast-top-right",
  //           "preventDuplicates": false,
  //           "onclick": null,
  //           "showDuration": "300",
  //           "hideDuration": "1000",
  //           "timeOut": "5000",
  //           "extendedTimeOut": "1000",
  //           "showEasing": "swing",
  //           "hideEasing": "linear",
  //           "showMethod": "fadeIn",
  //           "hideMethod": "fadeOut"
  //         }
  //         toastr.success("Room Successfully Added");
  //         if(typeof(noRoomSelected) != 'undefined' && noRoomSelected != null) {
  //           roomsSelected.removeChild(noRoomSelected);
  //         } 
  //         getSelectBtn.innerText = "Selected"
  //         getSelectBtn.classList.remove('btn-primary');
  //         getSelectBtn.classList.add('btn-success');

  //         // Room Count
  //         var reserveRoomCount = document.querySelector('input[data-guest-number*="' + id + '"]').value;
  //         overallGuestCount += parseInt(reserveRoomCount);

  //         var guestCountView = document.getElementById('guest_count_show');
  //         guestCountView.innerText = overallGuestCount;
  //         guestCountView.classList.add('animated');
  //         guestCountView.classList.add('fadeIn');
  //         guest_count_input.value = overallGuestCount;

  //         var price = document.getElementById('roomPrice' + id).getAttribute('data-price');
  //         var mainDiv = document.createElement('div');
  //         mainDiv.classList.add('card-footer');
  //         if(document.body.contains(document.querySelector('div.card-footer'))) {
  //           var totalPriceText = document.getElementById('totalPrice');
  //           totalPrice += parseFloat(price) * reserveRoomCount;
  //           totalPriceText.innerText = "P " + totalPrice.toLocaleString();     
  //         } else {
  //           var content = attachTotalPrice(id, price * reserveRoomCount);
  //           mainDiv.appendChild(content);
  //           document.querySelector('div.side-nav-res').appendChild(mainDiv);
  //         }

  //       } else {
  //         toastr.error("Please select guest number");
  //       }

  //     } 
      
  //   } else {
  //     toastr.options = {
  //       "closeButton": false,
  //       "debug": false,
  //       "newestOnTop": false,
  //       "progressBar": false,
  //       "positionClass": "toast-top-right",
  //       "preventDuplicates": false,
  //       "onclick": null,
  //       "showDuration": "300",
  //       "hideDuration": "1000",
  //       "timeOut": "5000",
  //       "extendedTimeOut": "1000",
  //       "showEasing": "swing",
  //       "hideEasing": "linear",
  //       "showMethod": "fadeIn",
  //       "hideMethod": "fadeOut"
  //     }
  //     toastr.error("Please choose the number of rooms first");
  //   }
  // }
}


function attachTotalPrice(id, price) {
  var div = document.createElement('div');
  totalPrice += parseFloat(price);
  var content = '<p class="animated fadeIn">Total <span style="float: right;" id="totalPrice">P ' + totalPrice.toLocaleString() + '</span></p>';
  div.innerHTML = content;
  return div;
}


function validateFirstName() {
  if(this.value == '') {
    if(this.classList.contains('green-fields')){
      this.classList.remove('green-fields');
      this.previousElementSibling.classList.remove('green-label');
    }
    this.classList.add('red-fields');
    this.previousElementSibling.classList.add('red-label');
    this.previousElementSibling.innerText = 'First Name is Missing';
  } else {
    this.classList.add('green-fields');
    this.previousElementSibling.classList.add('green-label');
    this.previousElementSibling.innerText = 'First Name';
  }
  validateAllFields();
}

function validateLastName() {
  if(this.value == '') {
    if(this.classList.contains('green-fields')){
      this.classList.remove('green-fields');
      this.previousElementSibling.classList.remove('green-label');
    }
    this.classList.add('red-fields');
    this.previousElementSibling.classList.add('red-label');
    this.previousElementSibling.innerText = 'Last Name is Missing';
  } else {
    this.classList.add('green-fields');
    this.previousElementSibling.classList.add('green-label');
    this.previousElementSibling.innerText = 'Last Name';
  }
  validateAllFields();
}

function validateAddress() {
  if(this.value == '') {
    if(this.classList.contains('green-fields')){
      this.classList.remove('green-fields');
      this.previousElementSibling.classList.remove('green-label');
    }
    this.classList.add('red-fields');
    this.previousElementSibling.classList.add('red-label');
    this.previousElementSibling.innerText = 'Address is Missing';
  } else {
    this.classList.add('green-fields');
    this.previousElementSibling.classList.add('green-label');
    this.previousElementSibling.innerText = 'Address';
  }
  validateAllFields();
}

function validateEmail() {

  var regEx = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
  var emailLabel = document.querySelector('label[for*="email"]');
  var inputEmail = this;
  if(inputEmail.value == '') {
    if(inputEmail.classList.contains('green-fields')){
      inputEmail.classList.remove('green-fields');
      emailLabel.classList.remove('green-label');
    }
    inputEmail.classList.add('red-fields');
    emailLabel.classList.add('red-label');
    emailLabel.innerText = 'Email Address is Missing';
  } else if (!regEx.test(inputEmail.value)) {
    if(inputEmail.classList.contains('green-fields')){
      inputEmail.classList.remove('green-fields');
      emailLabel.classList.remove('green-label');
    }
    inputEmail.classList.add('red-fields');
    emailLabel.classList.add('red-label');
    emailLabel.innerText = 'Email Address\'s format is incorrect';
  } else {

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        if(this.responseText == "true"){
          if(inputEmail.classList.contains('green-fields')){
            inputEmail.classList.remove('green-fields');
            emailLabel.classList.remove('green-label');
          }
          inputEmail.classList.add('red-fields');
          emailLabel.classList.add('red-label');
          emailLabel.innerText = 'Email Address is already taken';
        } else {
          inputEmail.classList.add('green-fields');
          inputEmail.previousElementSibling.classList.add('green-label');
          emailLabel.classList.add('green-label');    
          emailLabel.innerText = 'Email Address';
        }
      }
    }
    xml.open("POST", "../forms/validate_email.php", true);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("client_email=" + inputEmail.value);
  }
  validateAllFields();
}

function validateContactNumber() {

  if(this.value == '') {
    if(this.classList.contains('green-fields')){
      this.classList.remove('green-fields');
      this.previousElementSibling.classList.remove('green-label');
    }
    this.classList.add('red-fields');
    this.previousElementSibling.classList.add('red-label');
    this.previousElementSibling.innerText = 'Contact Number is Missing';
  } else {
    this.classList.add('green-fields');
    this.previousElementSibling.classList.add('green-label');
    this.previousElementSibling.innerText = 'Contact Number';
  }
  validateAllFields();
}

function validateBirthday() {
  if(this.value == '') {
    if(this.classList.contains('green-fields')){
      this.classList.remove('green-fields');
      this.previousElementSibling.classList.remove('green-label');
    }
    this.classList.add('red-fields');
    this.previousElementSibling.classList.add('red-label');
    this.previousElementSibling.innerText = 'Birthday is Missing';
  } else {
    this.classList.add('green-fields');
    this.previousElementSibling.classList.add('green-label');
    this.previousElementSibling.innerText = 'Birthday';
  }
  validateAllFields();
}

function validateAllFields() {
  var error = document.querySelectorAll('.red-fields');
  if(firstName.Value !== '' && lastName.Value !== '' && address.Value !== '' 
  && contactNumber.value !== '' && email.Value !== '' && birthday.Value !== '') {
    if(error.length === 0) {
      $('.sw-btn-next').prop("disabled", false);
    }
  } 
}

function processForm() {
  
  if(!this.hasAttribute("checked")) {
    this.setAttribute("checked", "true");
    var radioBtn = document.querySelectorAll('input[type*="radio"]:checked');
    console.log(radioBtn.length);
    if(radioBtn.length === 1) {
      mainSubmitBtn.disabled = false;
    }
  } else {
    this.removeAttribute("checked");
    mainSubmitBtn.disabled = true;
  }
  
}


document.querySelectorAll('label[for*="payment_type"]').forEach(function(element) {
  element.addEventListener('click', function() {
    var inputRadio = element.previousElementSibling;
    inputRadio.checked = true;
    if(!element.classList.contains('animated')) {
      element.classList.add('animated');
      element.classList.add('pulse');
    } else {
      element.classList.remove('animated');
      element.classList.remove('pulse');
    }
    
  })

});