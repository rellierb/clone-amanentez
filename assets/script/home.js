window.addEventListener('load', function() {
  var load_screen = document.getElementById('load_screen');
  var elem = document.getElementById('loading-bar');
  var width = 1;
  var id = setInterval(frame, 10);
  function frame() {
    if(width >= 100) {
      clearInterval(id);
    } else {
      width++;
      elem.style.width = width + '%';
    }
  }
  this.document.body.removeChild(load_screen);
  
});



var $document = $(document),
    $element = $('#main-nav'),
    navbarDefault = 'bg-primary',
    navbarTransparent = 'navbar-transparent'
    fadeInDown = 'fadeInDown';

$(document).ready(function() {

  window.onscroll = function() {
    if(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      $element.addClass(navbarDefault);
      $element.removeClass(navbarTransparent);
      $element.addClass(fadeInDown);
    } else {
      $element.addClass(navbarTransparent);
      $element.removeClass(navbarDefault);
      $element.removeClass(fadeInDown);
    }
  }

  $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
    if(stepPosition === 'first'){
        $(".sw-btn-prev").hide();
    }else if(stepPosition === 'final'){
        $(".sw-btn-next").hide()
        $(".sw-btn-prev").show();
    }else{
        $(".sw-btn-prev").show();
        $(".sw-btn-next").show()
    }
 });


  $('#smartwizard').smartWizard({
    selected: 0,  
    autoAdjustHeight:true, 
    cycleSteps: true, 
    backButtonSupport: false, 
    useURLhash: false, 
    lang: {  
        next: 'Next', 
        previous: 'Previous'
    },
    toolbarSettings: {
        toolbarPosition: 'top', 
        toolbarButtonPosition: 'right', 
        showNextButton: true, 
        showPreviousButton: true, 
    }, 
    anchorSettings: {
        anchorClickable: true, 
        enableAllAnchors: false, 
        markDoneStep: true, 
        enableAnchorOnDoneStep: false 
    },            
    contentURL: null,
    disabledSteps: [],    
    errorSteps: [],    
    transitionEffect: 'fade', 
    transitionSpeed: '400'
  });


});



// $('#index-reserve').click(function() {

//   var guest_number = $('#guest_count').val();
//   var reservation_date =  $('#datepicker').val();

//   localStorage.setItem('guest_count', `${guest_number}`);
//   localStorage.setItem('reservation_date', `${reservation_date}`);
// });




