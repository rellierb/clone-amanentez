$(document).ready(function() {

  $('#guest_count').val(localStorage.getItem('guest_count'));
  $('#datepicker').val(localStorage.getItem('reservation_date'));

  // form progress field
  var list_count = 0, form_count_form, next_form, total_forms;
  
  var total_forms = $("fieldset").length;

  var list = document.querySelector('.progress-form').children;

  $(".next").click(function() {
    form_count_form = $(this).parent();
    next_form = $(this).parent().next();
    next_form.show();
    form_count_form.hide();
    list[++list_count].classList.add("active");
  })

  $(".previous").click(function() {
    form_count_form = $(this).parent();
    next_form = $(this).parent().prev();
    next_form.show();
    form_count_form.hide();
    list[list_count--].classList.remove("active");
  })


  $('#client_email').blur(function() {

    var email = $('#client_email').val();
    var regex = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;

    if (email == '' || !regex.test(email)){
      $('#invalid_email').show();  
      setTimeout(function() {
        $('#invalid_email').hide();
      }, 5000)
    } else {
      
      var ajax = new XMLHttpRequest();
      ajax.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          if(this.responseText === "true") {
            $('#taken_email').show();  
            setTimeout(function() {
              $('#taken_email').hide();
            }, 5000)
          } 
          
        }
      }

      ajax.open("POST", "../forms/validate_email.php", true);
      ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      ajax.send("client_email=" + email);
      

    }


  })


})