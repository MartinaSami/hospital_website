$(document).ready(function(){
  $('#f').on('change',function(){
    var e = $(this).val();
    if(e)
    {
      $.get('go.php' , { f: e } , function(data){
        $('#s').html(data);
      } );
    }
    else
    {
      $('#s').html('<option> Select Specialization </option>');
    }
  });

});

$(document).ready(function(){
  $('.toast').toast('show');
  $('.toast').toast('show');
});


//function to validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
  // End function
  // varable 


