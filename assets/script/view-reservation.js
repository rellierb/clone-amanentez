
// var refNo = document.getElementById('referenceNo');
// var photoDIr = document.getElementById('paymentPhoto');
// var photoSubmit = document.getElementById('photo-submit-btn');
// var uploadPhotoModal = document.getElementById('uploadPhoto');

// eventListeners();

// function eventListeners() {


//   if(document.body.contains(uploadPhotoModal)) {
//     photoSubmit.addEventListener('click', showMessage);
//   }
  

  

// }

// function showMessage() {
  
//   alert(refNo.value);
//   alert(photoDIr.value);

//   var ajax = new XMLHttpRequest();
//   ajax.onreadystatechange = function() {
//     if(ajax.readyState == 4 && ajax.status == 200) {
//       console.log(this.responseText);
//     }
//   }

//   ajax.open('POST', '../uploads/upload_photo_payment.php', true);
//   ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//   ajax.send();

// }